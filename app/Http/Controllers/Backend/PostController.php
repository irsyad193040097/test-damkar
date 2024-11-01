<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Str;

class PostController extends Controller
{
    public function index()
    {
        return view ('backend.post.index');
    }

    public function datatables(Datatables $datatables)
    {
        $query = Post::with('author')->select(
                'id',
                'title',
                'uploaded_at',
                'published_at',
                'thumbnail',
                'is_published'
            )
            ->orderBy('published_at', 'DESC');

        $datatables = Datatables::of($query);

        $datatables->addColumn('collab', function ($post) {
            return $post->title . " || " . $post->published_at;
        });

        $datatables->addColumn('publishedAt', function ($post) {
            if($post->is_published == 1) {
                return \Carbon\Carbon::parse($post->published_at)->isoFormat('DD/MM/YYYY HH:mm:ss');
            } else {
                return '-';
            }
        });

        $datatables->addColumn('status', function ($post) {
            if($post->is_published == 1) {
                return '<span class="badge bg-success">Publish</span>';
            } else {
                return '<span class="badge bg-warning">Draft</span>';
            }
        });

        $datatables->addColumn('authors', function ($data) {
            $authors = [];
            foreach($data->postAuthors as $post) {
                $authors[] = '<p style="font-size:12px;line-height:1">' . $post->author->name . '</p>';
            }
            return $authors;
        });

        $datatables->addColumn('action', function ($post) {
            return $this->getActionButton($post);
        });

        $datatables->escapeColumns([]);
        return $datatables->make(true);
    }

    public function getActionButton($post)
    {
        $viewButton = '';
		$viewButton .= '<a href="'.url('admin/post/edit/'. $post['id']).'" class="btn btn-info btn-sm edit_button" title="Edit"><i class="mdi mdi-pencil-outline"></i></a>&nbsp';
        $viewButton .= '<a href="'.url('admin/post/show/'. $post['id']).'" class="btn btn-success btn-sm edit_button" title="Lihat"><i class="mdi mdi-eye-outline"></i></a>&nbsp';
        $viewButton .= '<button class="btn waves-effect waves-light btn-danger btn-sm" data-button="delete-button" title="Hapus" data-id="' . $post['id'] . '"><i class="mdi mdi-delete-outline"></i></button>&nbsp';

        return $viewButton;
    }

    public function create()
    {
        $categories = PostCategory::all();
        $authors = User::all();
        // $authors = User::role('Author')->get();

        return view ('backend.post.create', compact('categories', 'authors'));
    }

    public function store(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'title' => 'required',
                'category_id' => 'required',
                'thumbnail' => 'required|mimes:png,jpg,jpeg',
                'description' => 'required'
            ], [
                'title.required' => 'Judul tidak boleh kosong',
                'category_id.required' => 'Kategori tidak boleh kosong',
                'thumbnail.required' => 'Thumbnail tidak boleh kosong',
                'description.required' => 'Deskripsi tidak boleh kosong'
            ]);

            $file = $request->file('thumbnail');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $location = 'app/public/post/';
            $request->file('thumbnail')->move(storage_path($location), $filename);

            if($request->is_published == 1) {
                $publishedAt = date('Y-m-d H:i:s');
            } else {
                $publishedAt = null;
            }

            $post = Post::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'uploaded_at' => date('Y-m-d H:i:s'),
                'thumbnail' => 'post/' . $filename,
                'description' => $request->description,
                'published_at' => $publishedAt,
                'date_post' => date('Y-m-d'),
                'is_published' => $request->is_published,
                'category_id' => $request->category_id,
                'created_by' => auth()->user()->id
            ]);

            return redirect()->route('post')->with('success', 'Data berhasil di tambah');

        } catch(Throwable $e) {
            report($e);
            return false;
        }
    }

    public function show($id)
    {
        $data = Post::with('postCategories', 'postAuthors')->find($id);

        return view('backend.post.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Post::find($id);
        $categories = PostCategory::all();
        $authors = User::all();

        return view ('backend.post.edit', compact('data', 'categories', 'authors'));
    }

    public function update(Request $request, $id)
    {
        try {

            $validatedData = $request->validate([
                'title' => 'required',
                'category_id' => 'required',
                'thumbnail' => 'mimes:png,jpg,jpeg',
                'description' => 'required'
            ], [
                'title.required' => 'Judul tidak boleh kosong',
                'category_id.required' => 'Kategori tidak boleh kosong',
                'thumbnail.mimes' => 'format gambar harus .png, .jpg, .jpeg',
                'description.required' => 'Deskripsi tidak boleh kosong'
            ]);

            if($request->is_published == 1) {
                $publishedAt = date('Y-m-d H:i:s');
            } else {
                $publishedAt = null;
            }

            $data = Post::find($id);

            if($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $location = 'app/public/post/';
                $request->file('thumbnail')->move(storage_path($location), $filename);
                $data->thumbnail = 'post/' . $filename;
            }

            $data->title = $request->title;
            $data->slug =  Str::slug($request->title, '-');
            $data->uploaded_at = date('Y-m-d H:i:s');
            $data->description = $request->description;
            $data->published_at = $publishedAt;
            $data->is_published = $request->is_published;
            $data->category_id = $request->category_id;
            $data->created_by = auth()->user()->id;

            $data->update();

            return redirect()->route('post')->with('success', 'Data berhasil di tambah');

        } catch(Throwable $e) {
            report($e);
            return false;
        }
    }

    public function destroy($id)
    {
        $data = Post::find($id);

        $destination = 'public/'. $data->thumbnail;
        if(Storage::exists($destination)) {
            Storage::delete($destination);
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
