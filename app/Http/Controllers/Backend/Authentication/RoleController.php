<?php

namespace App\Http\Controllers\Backend\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        return view('backend.auth.role.index');
    }

    public function datatables(Datatables $datatables)
    {

        DB::statement(DB::raw('set @rownum=0'));
        $query = Role::select('roles.*',DB::raw('@rownum  := @rownum  + 1 AS rownum'))->get();

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
        $viewButton .= '<a href="'.url('role/edit/'. $post['id']).'" class="btn btn-info btn-sm edit_button"><i class="mdi mdi-pencil-outline"></i> Ubah</a>&nbsp';
        $viewButton .= '<button class="btn waves-effect waves-light btn-danger btn-sm" data-button="delete-button" title="Hapus" data-id="' . $post['id'] . '"><i class="mdi mdi-trash-can-outline"></i> Hapus</i></button>&nbsp';
        $viewButton .= '<a href="'.url('role/add_permissions/'. $post['id']).'" class="btn btn-success btn-sm edit_button"><i class="mdi mdi-lock-open-check-outline"></i> Permissions</a>&nbsp';

        return $viewButton;
    }

    public function create()
    {
        return view('backend.auth.role.create');
    }

    public function store(Request $request)
    {
        Role::create(['name' => $request->name]);

        return redirect('/role');
    }

    public function createPermissions($id)
    {
        $data = Role::find($id);
        $permissions = Permission::get();

        return view('backend.auth.role.add_permissions', compact('data', 'permissions'));
    }

    public function addPermissions(Request $request, $id)
    {
        $data = Role::find($id)->syncPermissions($request->name);

        return redirect('/role');
    }
}
