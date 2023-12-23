<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Request\RoleRequest;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Services\RoleService;

class RoleController extends Controller
{
    public $serviceRole;
    public function __construct(){
        $this->serviceRole = new RoleService;
    }
    public function role(){
        $role = $this->serviceRole->role();
        return view('user/access',[
            'roles'=>$role
        ]);
    }
    public function edit_proses(Request $request, $id)  {
        $edit = $this->serviceRole->edit_proses($request, $id);

        return back()->with('success', 'Data berhasil di ubah');
    }
    public function add_proses(Request $request)  {
        $add = $this->serviceRole->add_proses($request);

        return back()->with('success', 'Data berhasil di tambahkan');
    }
    public function delete_proses($id){
        $delete = $this->serviceRole->delete_proses($id);

        return back()->with('success', 'Data berhasil di hapus');
    }
}
