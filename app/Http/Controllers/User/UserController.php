<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function list(){
        $user = User::with('attachment')->with('role')->get();
        // dd($user);
        return view('user.user-list', [
            'users'=>$user
        ]);
    }
    public function create(){
        $roles = Role::get();
        return view('user/create', [
            'roles'=>$roles
        ]);
    }
    public function create_proses(UserRequest $request){
        $request->add();
        // dd("ass");
        return back()->with('success', "Pengguna ditambahkan");
    }
}
