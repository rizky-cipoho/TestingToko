<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'artikel_id'=>'required',
            'artikel_en'=>'required',
            'kategori'=>'required',
            // 'status'=>'required',
        ];
    }
    public function add(){
        $page = Page::create([
            'judul_id'=>$this->judul_id,
            'judul_en'=>$this->judul_en,
            'artikel_id'=>$this->artikel_id,
            'artikel_en'=>$this->artikel_en,
            'status'=>$this->status != null ? $this->status :'Tidak Aktif',
            'kategori_id'=>$this->kategori,
            'id_user'=>Auth::user()->id
        ]);
    }
    public function edit($id){
        $page = Page::find($id)->update([
            'judul_id'=>$this->judul_id,
            'judul_en'=>$this->judul_en,
            'artikel_id'=>$this->artikel_id,
            'artikel_en'=>$this->artikel_en,
            'status'=>$this->status != null ? $this->status :'Tidak Aktif',
            'kategori_id'=>$this->kategori,
            'id_user'=>Auth::user()->id
        ]);
    }
}
