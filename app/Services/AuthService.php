<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class AuthService
{
	public function loginToken($request): Collection{
		if(Auth::attempt(['username'=>$request->username, 'password'=>$request->password, 'status'=>'aktif'])){
			$auth = Auth::user();
			$token = $auth->createToken('auth_token')->plainTextToken;
			return collect(['result'=>$token]);
		}else{
			return collect(['result'=>"username atau password salah"]);
		}
	}
}