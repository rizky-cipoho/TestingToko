<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\View\View;

class UserController extends Controller
{
    public $userService;
    public function __construct(){
        $this->userService = new UserService;
    }
    public function list(){
        $list = $this->userService->list();
        return view('user.user-list', [
            'users'=>$list
        ]);
    }
    public function create(){
        $roles = Role::get();
        return view('user/create', [
            'roles'=>$roles
        ]);
    }
    public function create_proses(UserRequest $request){
        $list = $this->userService->create_proses();

        return back()->with('success', "Pengguna ditambahkan");
    }
}
