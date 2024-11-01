<?php

namespace App\Http\Controllers\Backend;

use Storage;
use App\Models\Sliders;
use App\Models\Pengumuman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class PengumumanController extends Controller
{
    public function index()
    {
        return view('backend.pengumuman.index');
    }

    public function datatables(Datatables $datatables)
    {
        $query = Pengumuman::select(
                'id',
                'judul',
                'tanggal',
                'status',
                'created_at'
            )
            ->orderBy('tanggal', 'DESC');

        $datatables = Datatables::of($query);

        $datatables->addColumn('tgl', function ($post) {
            return \Carbon\Carbon::parse($post->tanggal)->isoFormat('DD/MM/YYYY');
        });
        
        $datatables->addColumn('status', function ($post) {
            return $post->status == 1 ? 'Aktif' : 'Tidak Aktif';
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
		$viewButton .= '<a href="'.route('pengumuman.edit', ['id' => $post->id]).'" class="btn btn-info btn-sm edit_button" title="Edit"><i class="mdi mdi-pencil-outline"></i></a>&nbsp';
        $viewButton .= '<button class="btn waves-effect waves-light btn-danger btn-sm" data-button="delete-button" title="Hapus" data-id="' . $post['id'] . '"><i class="mdi mdi-delete-outline"></i></button>&nbsp';
        
        return $viewButton;
    }

    public function create()
    {
        return view('backend.pengumuman.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'isi_pengumuman' => 'nullable|max:2550',
            'judul' => 'required',
            'tanggal' => 'required',
        ], [
            'judul.required' => 'Judul Pengumuman Tidak Boleh Kosong',
            'tanggal.required' => 'Tanggal Pengumuman Tidak Boleh Kosong',
            'isi_pengumuman.max' => 'Isi Pengumuman maksimal 2550 karakter'
        ]);

        $data = new Pengumuman();
        $data->judul = $request->judul;
        $data->slug = Str::slug($request->judul, '-');
        $data->tanggal = $request->tanggal;
        $data->isi_pengumuman = $request->isi_pengumuman;
        $data->status = 1;
        $data->save();

        return redirect()->route('pengumuman.index');
    }

    public function edit($id)
    {
        $data = Pengumuman::find($id);

        return view('backend.pengumuman.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'isi_pengumuman' => 'nullable|max:2550',
            'judul' => 'required',
            'tanggal' => 'required',
        
        ], [
            'judul.required' => 'Judul Pengumuman Tidak Boleh Kosong',
            'tanggal.required' => 'Tanggal Pengumuman Tidak Boleh Kosong',
        
            'isi_pengumuman.max' => 'Isi Pengumuman maksimal 2550 karakter'
        ]);

        $data = Pengumuman::find($id);
        $data->judul = $request->judul;
        $data->slug = Str::slug($request->judul, '-');
        $data->tanggal = $request->tanggal;
        $data->isi_pengumuman = $request->isi_pengumuman;
        $data->status = $request->status;
        $data->update();

        return redirect()->route('pengumuman.index');
    }

    public function destroy($id)
    {
        $data = Pengumuman::find($id);
        if($data->delete()) {
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
