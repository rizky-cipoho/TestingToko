<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kontak;
use App\Http\Resources\ResultResource;

class KontakController extends Controller
{
    public function addKontak(Request $request){
        $request->validate([
            "name"=>'required',
            "email"=>'required',
            "description"=>'required',
        ]);

        Kontak::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "description"=>$request->description,
        ]);

        return new ResultResource(collect(['result'=>'berhasil di tambahkan']));
    }
}
