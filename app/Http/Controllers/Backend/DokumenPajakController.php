<?php

namespace App\Http\Controllers\Backend;

use Storage;
use App\Models\Pengumuman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Models\DetailDokumenPajak;
use App\Models\DokumenPajak;
use App\Models\Faq;

class DokumenPajakController extends Controller
{
    public function index()
    {
        return view('backend.dokumen_pajak.index');
    }

    public function datatables(Datatables $datatables)
    {
        $query = DokumenPajak::select(
                'id',
                'namapajak',
                'icon',
            )
            ->get();

        $datatables = Datatables::of($query);

        $datatables->addColumn('icon', function ($post) {
            return '<img src="' . env('APP_URL') . Storage::url($post->icon) . '" style="height:100px" class="img-fluid">';
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
		$viewButton .= '<a href="'.route('dokumenPajak.edit', ['id' => $post->id]).'" class="btn btn-info btn-sm edit_button" title="Edit"><i class="mdi mdi-pencil-outline"></i></a>&nbsp';
		$viewButton .= '<a href="'.url('admin/dokumen_pajak/view_document/'.$post->id).'" class="btn btn-warning btn-sm document_button" title="Dokumen"><i class="mdi mdi-text-box-multiple-outline"></i></a>&nbsp';
        $viewButton .= '<button class="btn waves-effect waves-light btn-danger btn-sm" data-button="delete-button" title="Hapus" data-id="' . $post['id'] . '"><i class="mdi mdi-delete-outline"></i></button>&nbsp';
        $viewButton .= '<a href="'.url('admin/dokumen_pajak/faq/'.$post->id).'" class="btn btn-primary btn-sm faq_button" title="FAQ"><i class="mdi mdi-help"></i></a>&nbsp';
        
        return $viewButton;
    }

    public function create()
    {
        return view('backend.dokumen_pajak.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'alur_pajak' => 'nullable|max:2550',
            'namapajak' => 'required',
            'nama_panjang' => 'required',
            'video_tutorial' => 'nullable|max:2550',
            'icon' => 'required|mimes:png,jpg,jpeg',
        ], [
            'icon.mimes' => 'format yang di izinkan : .png, .jpg & .jpeg',
            'namapajak.required' => 'Nama Pajak Tidak Boleh Kosong',
            'nama_panjang.required' => 'Nama Panjang Pajak Tidak Boleh Kosong',
            'alur_pajak.max' => 'Alur Pajak maksimal 2550 karakter',
            'video_tutorial.max' => 'Video Tutorial maksimal 2550 karakter'
        ]);

        $data = new DokumenPajak();

        $file = $request->file('icon');
        if($request->has('icon'))
        {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $location = 'app/public/dokumen_pajak/icon/';
            $request->file('icon')->move(storage_path($location), $filename);
        }

        $data->icon = '/dokumen_pajak/icon/' . $filename;

        $data->namapajak = $request->namapajak;
        $data->nama_panjang = $request->nama_panjang;
        $data->alur_pajak = $request->alur_pajak;
        $data->video_tutorial = $request->video_tutorial;
        $data->save();

        return redirect()->route('dokumenPajak.index');
    }

    public function edit($id)
    {
        $data = DokumenPajak::find($id);

        return view('backend.dokumen_pajak.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'alur_pajak' => 'nullable|max:2550',
            'namapajak' => 'required',
            'nama_panjang' => 'required',
            'video_tutorial' => 'nullable|max:2550',
        ], [
            'namapajak.required' => 'Nama Pajak Tidak Boleh Kosong',
            'nama_panjang.required' => 'Nama Panjang Pajak Tidak Boleh Kosong',
            'alur_pajak.max' => 'Alur Pajak maksimal 2550 karakter',
            'video_tutorial.max' => 'Video Tutorial maksimal 2550 karakter'
        ]);

        $data = DokumenPajak::find($id);

        $file = $request->file('icon');
        if($request->has('icon'))
        {
            if(Storage::exists('public/'.$data->icon)) {
                Storage::delete('public/'.$data->icon);
            }
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $location = 'app/public/dokumen_pajak/icon/';
            $request->file('icon')->move(storage_path($location), $filename);
        }

        $data->icon = '/dokumen_pajak/icon/' . $filename;

        $data->namapajak = $request->namapajak;
        $data->nama_panjang = $request->nama_panjang;
        $data->alur_pajak = $request->alur_pajak;
        $data->video_tutorial = $request->video_tutorial;
        $data->update();

        return redirect()->route('dokumenPajak.index');
    }

    public function destroy($id)
    {
        $data = DokumenPajak::find($id);
        $destination = 'public/'. $data->icon;
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

    // view document
    public function viewDocument($id)
    {
        return view('backend.dokumen_pajak.view_document',compact('id'));
    }

    public function documentDatatables(Datatables $datatables, $id)
    {
        $query = DetailDokumenPajak::select(
                'id',
                'dokumen_pajak_id',
                'path',
                'nama_dokumen',
            )
            ->where('dokumen_pajak_id',$id)
            ->get();

        $datatables = Datatables::of($query);

        $datatables->addColumn('path', function ($post) {
            return '<a href="' . env('APP_URL') . Storage::url($post->path) . '" target="_blank" class="btn btn-sm btn-info" >Download</a>';
        });

        $datatables->addColumn('action', function ($post) {
            return $this->getActionButtonDocument($post);
        });

        $datatables->escapeColumns([]);
        return $datatables->addIndexColumn()->make(true);
    }

    public function getActionButtonDocument($post)
    {
        $viewButton = '';
        $viewButton .= '<button class="btn waves-effect waves-light btn-danger btn-sm" data-button="delete-button" title="Hapus" data-id="' . $post['id'] . '"><i class="mdi mdi-delete-outline"></i></button>&nbsp';
        
        return $viewButton;
    }

    public function documentCreate($id)
    {
        return view('backend.dokumen_pajak.create_document', compact('id'));
    }

    public function documentStore(Request $request)
    {
        $validatedData = $request->validate([
            'nama_dokumen' => 'required',
            'path' => 'nullable|mimes:pdf,docx',
        ], [
            'nama_dokumen.required' => 'Nama Pajak Tidak Boleh Kosong',
            'path.mimes' => 'format yang di izinkan : .pdf, .docx',
        ]);

        $data = new DetailDokumenPajak();

        $file = $request->file('path');
        if($request->has('path'))
        {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $location = 'app/public/dokumen_pajak/';
            $request->file('path')->move(storage_path($location), $filename);
        }

        $data->path = '/dokumen_pajak/' . $filename;

        $data->dokumen_pajak_id = $request->dokumen_pajak_id;
        $data->nama_dokumen = $request->nama_dokumen;
        $data->save();

        return redirect('admin/dokumen_pajak/view_document/'.$request->dokumen_pajak_id);
    }

    public function documentDestroy($id)
    {
        $data = DetailDokumenPajak::find($id);

        $destination = 'public/'. $data->path;
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

    public function viewFaq($id)
    {
        $data = DokumenPajak::find($id);
        $faq = Faq::where('dokumen_pajak_id',$id)->get();
        return view('backend.dokumen_pajak.view_faq',compact('id','data','faq'));
    }

    public function storeFaq(Request $request)
    {

        try {
            $pertanyaan = $request->pertanyaan;
            $jawaban = $request->jawaban;
            $cek = Faq::where('dokumen_pajak_id',$request->dokumen_pajak_id);
            

            if($pertanyaan == NULL){
                $cek->delete();
                return redirect('admin/dokumen_pajak/faq/'.$request->dokumen_pajak_id)->with('success', 'FAQ Berhasil Di Update');
            }else{
                if($cek->count() > 0){
                    $cek->delete();
                }
                
                for($i=0; $i<count($pertanyaan); $i++){
    
                    $data = new Faq();
                    $data->dokumen_pajak_id = $request->dokumen_pajak_id;
                    $data->pertanyaan = $pertanyaan[$i];
                    $data->jawaban = $jawaban[$i];
                    $data->save();
                }
    
                return redirect('admin/dokumen_pajak/faq/'.$request->dokumen_pajak_id)->with('success', 'FAQ Berhasil Di Update');
            }

        } catch (\Exception $e) {
            echo "<script>alert(".$e->getMessage().")</script>";
        }

        
    }
}
