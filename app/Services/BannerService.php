<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use App\Models\Banner;
use App\Traits\ImageTrait;

class BannerService
{
    use ImageTrait;
    public function list(): Collection{
        $banners = Banner::paginate(20);

        return $banners;
    }
    public function detail($id): Banner{
        $sumbers = Banner::findOrFail($id);

        return $sumbers;
    }
    public function add($request):void{
        $validator = Validator::make($request->all(), [
            'gambar'=>'required'
        ]);
        $gambar = $this->resize($request->gambar);
        $gambar_original = $this->original($request->gambar);
        Banner::create([
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
            Banner::find($id)->update([
                'judul_id'=>$request->judul_id,
                'judul_en'=>$request->judul_en,
                'gambar'=>'/'.$gambar->dirname.'/'.$gambar->basename,
                'gambar_original'=>$gambar_original['full'],
                'link'=>$request->link
            ]);
        }else{
            Banner::find($id)->update([
                'judul_id'=>$request->judul_id,
                'judul_en'=>$request->judul_en,
                'link'=>$request->link
            ]);
        } 
    }
    public function delete($id): void{
        $banner = Banner::find($id);
        if(File::exists($banner->gambar) && File::exists($banner->gambar_original)) {
            File::delete($banner->gambar);
            File::delete($banner->gambar_original);
        }
        Banner::find($id)->delete();
    }
}