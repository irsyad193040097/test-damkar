<?php

namespace App\Http\Controllers\Backend\Authentication;

use App\Models\Referensi\Instansi;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        // return User::with('roles')->get();
        return view('backend.auth.user.index');
    }

    public function datatables(Datatables $datatables)
    {

        DB::statement(DB::raw('set @rownum=0'));
        $query = User::select('users.*',DB::raw('@rownum  := @rownum  + 1 AS rownum'))->get();

        $datatables = Datatables::of($query);

        $datatables->addColumn('roles', function ($post) {
            return $post->getRoleNames();
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
		$viewButton .= '<a href="'.url('user/edit/'. $post['id']).'" class="btn btn-info btn-sm edit_button"><i class="mdi mdi-pencil-outline"></i> Ubah</a>&nbsp';
        $viewButton .= '<a href="'.url('user/add_roles/'. $post['id']).'" class="btn btn-success btn-sm edit_button"><i class="mdi mdi-lock-open-plus-outline"></i> Tambahkan Role</a>&nbsp';
        $viewButton .= '<button class="btn waves-effect waves-light btn-danger btn-sm" data-button="delete-button" title="Hapus" data-id="' . $post['id'] . '"><i class="mdi mdi-delete-outline"></i> Hapus</i></button>&nbsp';
        
        return $viewButton;
    }

    public function create()
    {
        return view('backend.auth.user.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'avatar' => 'mimes:png,jpg',
            'email' => 'required',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'avatar.mimes' => 'format yang di izinkan : .png & .jpg',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        $data = new User();

        $file = $request->file('avatar');
        if($request->has('avatar'))
        {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $location = 'app/public/user/' . $request->email . '/';
            $request->file('avatar')->move(storage_path($location), $filename);
        }

        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->place_of_birth = $request->place_of_birth;
        $data->date_of_birth = $request->date_of_birth;
        $data->avatar = 'user/'. $request->email . '/' . $filename;
        $data->bio = $request->bio;
        $data->password = Hash::make($request->password);
        $data->save();

        return redirect('user')->with('success','Pengguna Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('backend.auth.user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'avatar' => 'nullable|mimes:png,jpg',
            'email' => 'required',
            'password' => 'nullable|min:6'
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'avatar.mimes' => 'format yang di izinkan : .png & .jpg',
            'email.required' => 'Email tidak boleh kosong',
            'password.min' => 'Password minimal 6 karakter'
        ]);

        $data = User::find($id);

        $file = $request->file('avatar');
        if($request->has('avatar'))
        {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $location = 'app/public/user/' . $request->email . '/';
            $request->file('avatar')->move(storage_path($location), $filename);
        }
        $data->avatar = 'user/'. $request->email . '/' . $filename;
        $data->name = $request->name;
        $data->email = $request->email;
        if($request->password != ''){
            $data->password = Hash::make($request->password);
        }
        $data->update();

        return redirect('user')->with('success','Pengguna Berhasil Di Update');
    }

    public function delete(Request $request){
        if(Auth::user()->id == $request->id){
            return response()->json([
                'msg' => 'Tidak Dapat Menghapus Pengguna Sendiri Pada Saat Login Aplikasi'
            ],400);
        }else{
            $data = User::find($request->id);
            $data->delete();
    
            return response()->json([
                'code' => 200,
                'msg' => 'Pengguna Berhasil Dihapus'
            ]);
        }
    }

    public function createRoles($id)
    {
        $data = User::find($id);
        $roles = Role::get();

        return view('backend.auth.user.add_roles', compact('data', 'roles'));
    }

    public function addRoles(Request $request, $id)
    {
        $data = User::find($id)->assignRole($request->name);

        return redirect('/user');
    }
    
}
