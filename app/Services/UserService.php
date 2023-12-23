<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserService
{
	public function list(): Collection{
		$user = User::with('attachment')->with('role')->paginate(20);
		
		return $user;
	}
	public function create_proses($request): Collection{
		$user = User::create([
			'name'=>$request->name,
			'username'=>$request->username,
			'jenis_kelamin'=>$request->jenis_kelamin,
			'password'=>Hash::make($request->password),
			'role_id'=>$request->role_id,
			'email'=>$request->email,
			'image'=>'/images/sample.png',
			'status'=>'aktif',
		]);
		
		return collect(['result'=>"pengguna berhasil di tambahkan"]);
	}
	public function detail($id): User
	{
		$user = User::with('role')->find($id);
		return $user;
	}
	public function profile(): User
	{
		$user = User::with('role')->find(Auth::user()->id);
		return $user;
	}
	public function edit_proses($request, $id): void
	{
		$user = User::find($id);
		$validator = Validator::make($request->all(), [
			'username' => ['required', Rule::unique('users')->ignore($id),],
		]);
		
		if($request->password != null){
			User::find($id)->update([
				'name'=>$request->name, 
				'username'=>$request->username,
				'email'=>$request->email,
				'jenis_kelamin'=>$request->jenis_kelamin,
				'status'=>$request->status,
				'image'=> $request->image != null ? $request->image : $data->image,
				'password'=> Hash::make($request->password),
			]);
		}else{
			User::find($id)->update([
				'name'=>$request->name, 
				'username'=>$request->username,
				'email'=>$request->email,
				'jenis_kelamin'=>$request->jenis_kelamin,
				'status'=>$request->status,
				'image'=> $request->image != null ? $request->image : $data->image,
			]);
		}
	}
}