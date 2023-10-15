<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserRequest extends FormRequest
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
            'name'=>'required',
            'username'=>'required',
            'jenis_kelamin'=>'required',
            'password'=>'required|confirmed',
            'role'=>'required',
            'email'=>'required',
        ];
    }
    public function add(){
        // dd($this->all());
        $user = User::create([
            'name'=>$this->name,
            'username'=>$this->username,
            'jenis_kelamin'=>$this->jenis_kelamin,
            'password'=>Hash::make($this->password),
            'role_id'=>$this->role,
            'email'=>$this->role,
            'image'=>'/images/sample.png',
            'status'=>0,
        ]);
    }
}
