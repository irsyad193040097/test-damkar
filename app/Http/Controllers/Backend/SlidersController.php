<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sliders;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

class SlidersController extends Controller
{
    public function index()
    {
        return view('backend.sliders.index');
    }

    public function datatables(Datatables $datatables)
    {
        $query = Sliders::select(
                'id',
                'gambar',
                'created_at'
            )
            ->orderBy('created_at', 'DESC');

        $datatables = Datatables::of($query);

        $datatables->addColumn('image', function ($post) {
            return '<img src="' . Storage::url($post->gambar) . '" style="height:200px" class="img-fluid">';
        });

        $datatables->addColumn('createdAt', function ($post) {
            return \Carbon\Carbon::parse($post->created_at)->isoFormat('DD/MM/YYYY HH:mm:ss');
        });

        $datatables->addColumn('action', function ($post) {
            return $this->getActionButton($post);
        });

        $datatables->escapeColumns([]);
        return $datatables->addIndexColumn()->make(true);
    }

    public function getActionButton($post)
    {
        $viewButton = '';
		$viewButton .= '<a href="'.route('sliders.edit', ['id' => $post->id]).'" class="btn btn-info btn-sm edit_button" title="Edit"><i class="mdi mdi-pencil-outline"></i></a>&nbsp';
        $viewButton .= '<button class="btn waves-effect waves-light btn-danger btn-sm" data-button="delete-button" title="Hapus" data-id="' . $post['id'] . '"><i class="mdi mdi-delete-outline"></i></button>&nbsp';

        return $viewButton;
    }

    public function create()
    {
        return view('backend.sliders.create');
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

        $data = new Sliders();

        $file = $request->file('image');
        if($request->has('image'))
        {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $location = 'app/public/sliders/';
            $request->file('image')->move(storage_path($location), $filename);
        }

        $data->gambar = 'sliders/' . $filename;
        $data->save();

        return redirect()->route('sliders.index');
    }

    public function edit($id)
    {
        $data = Sliders::find($id);

        return view('backend.sliders.edit', compact('data'));
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

        $data = Sliders::find($id);

        $file = $request->file('image');
        if($request->has('image'))
        {
            // $image_path = storage_path().'/app/public/'.$data->gambar;
            if(Storage::exists('public/'.$data->gambar)) {
                Storage::delete('public/'.$data->gambar);
            }
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $location = 'app/public/sliders/';
            $request->file('image')->move(storage_path($location), $filename);


        }
        if($request->image != '') {
            $data->gambar = $data->gambar = 'sliders/' . $filename;
        }

        $data->update();

        return redirect()->route('sliders.index');
    }

    public function destroy($id)
    {
        $data = Sliders::find($id);

        $destination = 'public/'. $data->gambar;
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
