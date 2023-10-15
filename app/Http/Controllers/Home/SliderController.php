<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Slider;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function list(){
        $sliders = Slider::get();
        return view('home/slider/list',[
            'sliders'=>$sliders
        ]);
    }
    public function add_proses(SliderRequest $request){
        $request->add();
        return back()->with('success', 'Data berhasil ditambahkan');
    }
    public function edit_proses(SliderRequest $request, $id){
        $request->edit($id);
        return back()->with('success', 'Data berhasil diubah');
    }
    public function delete_proses($id){
        $slider = Slider::find($id);
        if(File::exists($slider->gambar) && File::exists($slider->gambar_original)) {
            File::delete($slider->gambar);
            File::delete($slider->gambar_original);
        }
        Slider::find($id)->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
