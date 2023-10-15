<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'password' => 'confirmed',
        ];
    }
    public function update($data){
        // dd($this->all(), $data);

        if($this->password != null){
            User::find($data->id)->update([
              'name'=>$this->name, 
              'username'=>$this->username,
              'email'=>$this->email,
              'jenis_kelamin'=>$this->jenis_kelamin,
              'status'=>$this->status,
              'image'=> $this->image != null ? $this->image : $data->image,
              'password'=> Hash::make($this->password),
          ]);
        }else{
            User::find($data->id)->update([
              'name'=>$this->name, 
              'username'=>$this->username,
              'email'=>$this->email,
              'jenis_kelamin'=>$this->jenis_kelamin,
              'status'=>$this->status,
              'image'=> $this->image != null ? $this->image : $data->image,
          ]);
        }
    }
}
