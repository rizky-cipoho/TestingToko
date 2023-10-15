<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Banner;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function list(){
        $banners = Banner::get();
        return view('home/banner/list',[
            'banners'=>$banners
        ]);
    }
    public function add_proses(BannerRequest $request){
        $request->add();
        return back()->with('success', 'Data berhasil ditambahkan');
    }
    public function edit_proses(BannerRequest $request, $id){
        $request->edit($id);
        return back()->with('success', 'Data berhasil diubah');
    }
    public function delete_proses($id){
        $banner = Banner::find($id);
        if(File::exists($banner->gambar) && File::exists($banner->gambar_original)) {
            File::delete($banner->gambar);
            File::delete($banner->gambar_original);
        }
        Banner::find($id)->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
