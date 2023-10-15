<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Kategori_page;
use App\Models\Page;

class KategoriPageRequest extends FormRequest
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
            'kategori_id'=>'required',
            'kategori_en'=>'required'
        ];
    }
    public function add(){
        Kategori_page::create([
            'kategori_id'=>$this->kategori_id,
            'kategori_en'=>$this->kategori_en
        ]);
    }
    public function edit($id){
        Kategori_page::find($id)->update([
            'kategori_id'=>$this->kategori_id,
            'kategori_en'=>$this->kategori_en
        ]);
    }
    public function delete($id){
        Page::where('id_kategori', $id)->update([
            'status'=>'Tidak Aktif',
            'kategori_id'=>'none'
        ]);
        Kategori_page::find($id)->delete();
    }
}
