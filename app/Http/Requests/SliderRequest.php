<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\models\Slider;
use Illuminate\Support\Facades\Validator;
use App\Traits\ImageTrait;

class SliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    use ImageTrait;
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'judul_id'=>'required',
            'judul_en'=>'required',
            'link'=>'required',
        ];
    }
    public function add(){
        $validator = Validator::make($this->all(), [
            'gambar'=>'required'
        ]);
        $gambar = $this->resize($this->gambar);
        $gambar_original = $this->original($this->gambar);
        Slider::create([
            'judul_id'=>$this->judul_id,
            'judul_en'=>$this->judul_en,
            'gambar'=>'/'.$gambar->dirname.'/'.$gambar->basename,
            'gambar_original'=>$gambar_original['full'],
            'link'=>$this->link
        ]);
    }
    public function edit($id){
        // dd($this->all());
        if($this->gambar != null){
            $gambar = $this->resize($this->gambar);
            $gambar_original = $this->original($this->gambar);
            Slider::find($id)->update([
                'judul_id'=>$this->judul_id,
                'judul_en'=>$this->judul_en,
                'gambar'=>'/'.$gambar->dirname.'/'.$gambar->basename,
                'gambar_original'=>$gambar_original['full'],
                'link'=>$this->link
            ]);
        }else{
            Slider::find($id)->update([
                'judul_id'=>$this->judul_id,
                'judul_en'=>$this->judul_en,
                'link'=>$this->link
            ]);
        } 
    }
}
