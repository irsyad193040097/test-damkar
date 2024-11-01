<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use DB;
use Str;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $info = [
            'pages' => Page::where('parent_id', 0)->orderBy('order', 'ASC')->get()
        ];

        return view('backend.page.index', $info);
    }

    public function saveNestedPage(Request $request){
        
        $json = $request->nested_page;
        $decoded_json = json_decode($json, TRUE);

        $simplified_list = [];
        $this->recur1($decoded_json, $simplified_list);

        DB::beginTransaction();
        try {
            $info = [
                "success" => FALSE,
            ];

            foreach($simplified_list as $k => $v){
                $page = Page::find($v['id']);
                $page->fill([
                    "parent_id" => $v['parent_id'],
                    "order" => $v['order'],
                ]);

                $page->save();
            }

            DB::commit();
            $info['success'] = TRUE;
        } catch (\Exception $e) {
            DB::rollback();
            $info['success'] = FALSE;
        }

        if($info['success']){
            $request->session()->flash('success', "Halaman berhasil di update.");
        }else{
            $request->session()->flash('error', "Terjadi kesalahan.");
        }

        return redirect(route('page.index'));
    }

    public function recur1($nested_array=[], &$simplified_list=[]){
        
        static $counter = 0;
        
        foreach($nested_array as $k => $v){
            
            $order = $k+1;
            $simplified_list[] = [
                "id" => $v['id'], 
                "parent_id" => 0,
                "order" => $order
            ];
            
            if(!empty($v["children"])){
                $counter+=1;
                $this->recur2($v['children'], $simplified_list, $v['id']);
            }

        }
    }

    public function recur2($sub_nested_array=[], &$simplified_list=[], $parent_id = NULL){
        
        static $counter = 0;

        foreach($sub_nested_array as $k => $v){
            
            $order = $k+1;
            $simplified_list[] = [
                "id" => $v['id'], 
                "parent_id" => $parent_id, 
                "order" => $order
            ];
            
            if(!empty($v["children"])){
                $counter+=1;
                return $this->recur2($v['children'], $simplified_list, $v['id']);
            }
        }
    }

    public function edit(Request $request, $id)
    {
        $data = Page::find($id);

        return view('backend.page.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Page::find($id);

        $data->title = $request->title;
        $data->description = $request->description;
        $data->slug = Str::slug($request->title, '-');

        $data->update();

        return redirect()->route('page.index');
    }

    public function createPage(Request $request)
    {
        Page::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'parent_id' => 0,
            'active' => 1,
            'order' => 99,
            'created_by' => auth()->user()->id,
            'type' => $request->type,
            'page_type' => $request->page_type
        ]);

        return redirect()->back();
    }
}
