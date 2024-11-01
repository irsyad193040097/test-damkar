<?php

namespace App\Http\Controllers\Backend\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public function index()
    {
        return view('backend.auth.permission.index');
    }

    public function datatables(Datatables $datatables)
    {

        DB::statement(DB::raw('set @rownum=0'));
        $query = Permission::select('permissions.*',DB::raw('@rownum  := @rownum  + 1 AS rownum'))->get();

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
		$viewButton .= '<a href="'.url('permission/edit/'. $post['id']).'" class="btn btn-info btn-sm edit_button">Ubah</a>&nbsp';
        if($post->username != 'admin'){
            $viewButton .= '<button class="btn waves-effect waves-light btn-danger btn-sm" data-button="delete-button" title="Hapus" data-id="' . $post['id'] . '">Hapus</i></button>&nbsp';
        }
        
        return $viewButton;
    }

    public function create()
    {
        return view('backend.auth.permission.create');
    }

    public function store(Request $request)
    {
        Permission::create(['name' => $request->name]);

        return redirect('/permission');
    }
}
