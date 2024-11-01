<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostCategory;
use Yajra\Datatables\Datatables;
use Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('backend.category.index');
    }

    public function datatables(Datatables $datatables)
    {
        $query = PostCategory::select(
                'id',
                'category_name',
                'slug'
            );

        $datatables = Datatables::of($query);

        $datatables->addColumn('action', function ($post) {
            return $this->getActionButton($post);
        });

        $datatables->escapeColumns([]);
        return $datatables->make(true);
    }

    public function getActionButton($post)
    {
        $viewButton = '';
		$viewButton .= '<a href="'.route('category.edit', ['id' => $post->id]).'" class="btn btn-info btn-sm edit_button" title="Edit"><i class="mdi mdi-pencil-outline"></i></a>&nbsp';
        $viewButton .= '<button class="btn waves-effect waves-light btn-danger btn-sm" data-button="delete-button" title="Hapus" data-id="' . $post->id . '"><i class="mdi mdi-delete-outline"></i></button>&nbsp';
        
        return $viewButton;
    }

    public function create(Request $request)
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required'
        ], [
            'category_name.required' => 'Nama Kategori tidak boleh kosong'
        ]);

        PostCategory::create([
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->category_name, '-'),
            'created_by' => auth()->user()->id
        ]);

        return redirect()->route('category');
    }

    public function edit(Request $request, $id)
    {
        $data = PostCategory::find($id);

        return view('backend.category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_name' => 'required'
        ], [
            'category_name.required' => 'Nama Kategori tidak boleh kosong'
        ]);

        $data = PostCategory::find($id);

        $data->category_name = $request->category_name;
        $data->slug = Str::slug($request->category_name, '-');
        $data->created_by = auth()->user()->id;

        $data->update();

        return redirect()->route('category');
    }

    public function destroy($id)
    {
        $data = PostCategory::find($id);

        if($data) {
            $data->delete();
            
            return response()->json([
                'code' => 200,
                'msg' => 'Data Berhasil Dihapus'
            ]);
        } else {
            return response()->json([
                'code' => 404,
                'msg' => 'Data Tidak ditemukan'
            ], 404);
        }
    }
}
