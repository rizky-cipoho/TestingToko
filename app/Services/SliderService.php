<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use App\Models\Slider;
use App\Traits\ImageTrait;

class SliderService
{
    use ImageTrait;
    public function list(): Collection{
        $sliders = Slider::paginate(20);
        return $sliders;
    }
    public function detail($id): Sumber_pesanan{
        $sumbers = Slider::findOrFail($id);

        return $sumbers;
    }
    public function add($request):void{
        $gambar = $this->resize($request->gambar);
        $gambar_original = $this->original($request->gambar);
        Slider::create([
            'judul_id'=>$request->judul_id,
            'judul_en'=>$request->judul_en,
            'gambar'=>'/'.$gambar->dirname.'/'.$gambar->basename,
            'gambar_original'=>$gambar_original['full'],
            'link'=>$request->link
        ]);
    }

    public function edit_Proses($request, $id): void{
        if($request->gambar != null){
            $gambar = $this->resize($request->gambar);
            $gambar_original = $this->original($request->gambar);
            Slider::find($id)->update([
                'judul_id'=>$request->judul_id,
                'judul_en'=>$request->judul_en,
                'gambar'=>'/'.$gambar->dirname.'/'.$gambar->basename,
                'gambar_original'=>$gambar_original['full'],
                'link'=>$request->link
            ]);
        }else{
            Slider::find($id)->update([
                'judul_id'=>$request->judul_id,
                'judul_en'=>$request->judul_en,
                'link'=>$request->link
            ]);
        } 
    }
    public function delete($id): void{
        $slider = Slider::find($id);
        if(File::exists($slider->gambar) && File::exists($slider->gambar_original)) {
            File::delete($slider->gambar);
            File::delete($slider->gambar_original);
        }
        Slider::find($id)->delete();
    }
}