<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

class GalleryController extends Controller
{
    public function index()
    {
        return view('backend.gallery.index');
    }

    public function datatables(Datatables $datatables)
    {
        $query = Gallery::select(
                'id',
                'image',
                'description',
                'created_at'
            )
            ->orderBy('created_at', 'DESC');

        $datatables = Datatables::of($query);

        $datatables->addColumn('image', function ($post) {
            return '<img src="' . Storage::url($post->image) . '" class="img-fluid">';
        });

        $datatables->addColumn('createdAt', function ($post) {
            return \Carbon\Carbon::parse($post->created_at)->isoFormat('DD/MM/YYYY HH:mm:ss');
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
		$viewButton .= '<a href="'.route('gallery.edit', ['id' => $post->id]).'" class="btn btn-info btn-sm edit_button" title="Edit"><i class="mdi mdi-pencil-outline"></i></a>&nbsp';
        $viewButton .= '<button class="btn waves-effect waves-light btn-danger btn-sm" data-button="delete-button" title="Hapus" data-id="' . $post['id'] . '"><i class="mdi mdi-delete-outline"></i></button>&nbsp';

        return $viewButton;
    }

    public function create()
    {
        return view('backend.gallery.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg',
            'description' => 'nullable|max:255',
        ], [
            'image.mimes' => 'format yang di izinkan : .png, .jpg & .jpeg',
            'description.max' => 'Keterangan maksimal 255 karakter'
        ]);

        $data = new Gallery();

        $file = $request->file('image');
        if($request->has('image'))
        {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $location = 'app/public/gallery/' . $request->email . '/';
            $request->file('image')->move(storage_path($location), $filename);
        }

        $data->image = 'gallery/' . $filename;
        $data->description = $request->description;

        $data->save();

        return redirect()->route('gallery.index');
    }

    public function edit($id)
    {
        $data = Gallery::find($id);

        return view('backend.gallery.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'description' => 'nullable|max:255',
        ], [
            'image.mimes' => 'format yang di izinkan : .png, .jpg & .jpeg',
            'description.max' => 'Keterangan maksimal 255 karakter'
        ]);

        $data = Gallery::find($id);

        $file = $request->file('image');
        if($request->has('image'))
        {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $location = 'app/public/gallery/' . $request->email . '/';
            $request->file('image')->move(storage_path($location), $filename);
        }
        if($request->image != '') {
            $data->image = $data->image = 'gallery/' . $filename;
        }
        $data->description = $request->description;

        $data->update();

        return redirect()->route('gallery.index');
    }

    public function destroy($id)
    {
        $data = Gallery::find($id);

        $destination = 'public/'. $data->image;
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
