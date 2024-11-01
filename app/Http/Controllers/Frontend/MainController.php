<?php

namespace App\Http\Controllers\Frontend;

use PDF;
use Date;
use VisitLog;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Post;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Sliders;
use App\Models\Visitor;
use App\Models\Pengumuman;
use App\Models\DokumenPajak;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Models\DetailDokumenPajak;
use App\Http\Controllers\Controller;
use DB;

class MainController extends Controller
{
    public function main()
    {
        $latestNews = Post::with(['postCategories' => function($q) {
            $q->where('post_category_id', 1);
        }])
        ->where('is_published', 1)
        ->orderBy('published_at', 'DESC')
        ->take(6)
        ->get();
        VisitLog::save();
        
        $sliders = Sliders::all();

        $pengumuman = Pengumuman::where('status',1)->orderBy('id','desc')->limit(2)->get();
    
        return view('layouts.frontend.main', compact('latestNews','sliders','pengumuman'));
    }

    public function postRead(Request $request, $slug)
    {
        $data = Post::where('slug', $slug)->first();

        views($data)->record();

        return view('layouts.frontend.post.read', compact('data'));
    }

    public function getPage($slug)
    {
        $page = Page::where('slug', $slug)->first();

        return view('layouts.frontend.pages.content', compact('page'));
    }
    
    public function getCategory($slug)
    {
        $category = PostCategory::where('slug', $slug)->first();
        $category->setRelation('posts', $category->posts()->paginate(16));

        return view('layouts.frontend.categories.main', compact('category'));
    }

    public function newsList()
    {
        $data = Post::where('is_published', 1)->orderBy('uploaded_at', 'DESC')->paginate(16);

        return view('layouts.frontend.news.main', compact('data'));
    }

    public function galleryList()
    {
        $data = Gallery::orderBy('created_at', 'DESC')->paginate(16);

        return view('layouts.frontend.gallery.main', compact('data'));
    }

    public function sendMessage(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'phone.required' => 'No. Handphone tidak boleh kosong',
            'subject.required' => 'Subjek Pesan tidak boleh kosong',
            'message.required' => 'Message tidak boleh kosong',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('message', 'Pesan Anda sudah kami terima, dan akan segera kami tindak lanjuti. Terima kasih');
    }

    public function getPengumuman(Request $request){
        
		$id = $request->rowid;

		$data = Pengumuman::where('id', '=', $id)
		->select("pengumuman.*", DB::raw('@rownum  := @rownum  + 1 AS rownum'))
		->first();

        return view('layouts.frontend.modal.pengumuman',['data' => $data]);
    }
}
