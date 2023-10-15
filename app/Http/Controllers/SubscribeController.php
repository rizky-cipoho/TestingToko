<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscribe;

class SubscribeController extends Controller
{
    public function list(){
        $subscribes = Subscribe::orderBy('id', 'desc')->get();
        return view('subscribe/list',[
            'subscribes'=>$subscribes
        ]);
    }
    public function add_proses(Request $request){
        $request->validate([
            'email'=>'required|email'
        ]);
        Subscribe::create([
            'email'=>$request->email
        ]);
        $subscribes = Subscribe::orderBy('id', 'desc')->get();
        return $subscribes;
    }
}
