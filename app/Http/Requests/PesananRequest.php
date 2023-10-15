<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesanan;

class PesananRequest extends FormRequest
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
            'produk'=>'required',
            'qty'=>'required',
            'status'=>'required',
            'alamat'=>'required',
            'nama'=>'required',
            'telepon'=>'required',
            'sumber'=>'required'
        ];
    }
    public function add(){
        Pesanan::create([
           'produk_id'=>$this->produk, 
           'nama'=>$this->nama, 
           'qty'=>$this->qty,
           'status'=>$this->status, 
           'user_id'=>Auth::user()->id, 
           'sumber_id'=>$this->sumber, 
           'deskripsi'=>$this->deskripsi, 
           'alamat'=>$this->alamat,
           'telepon'=>$this->telepon,
       ]);
    }
    public function edit($id){
        $pesanan = Pesanan::find($id);
        Pesanan::find($id)->update([
           'produk_id'=>$this->produk, 
           'nama'=>$this->nama, 
           'qty'=>$this->qty,
           'sumber_id'=>$this->sumber, 
           'status'=>$this->status, 
           'deskripsi'=>$this->deskripsi == null ? $pesanan->deskripsi : $this->deskripsi, 
           'alamat'=>$this->alamat,
           'telepon'=>$this->telepon,
       ]);
    }
    
}
