<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list(){
        $user = User::with('attachment')->with('role')->get();
        // dd($user);
        return view('user.user-list', [
            'users'=>$user
        ]);
    }
}
