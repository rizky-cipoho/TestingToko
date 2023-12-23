<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\ResultResource;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public $userService;
    public function __construct() {
        $this->userService = new UserService;
    }
    public function list(): ResourceCollection{
        $userGet = $this->userService->list();
        
        return UserResource::collection($userGet);
    }
    public function create_proses(UserRequest $request){
        $result = $this->userService->create_proses($request);
        
        return ResultResource::collection($result);
        
    }
    public function detail(): UserResource{
        $userGet = $this->userService->detail();
        
        return new UserResource($userGet);
    }
    public function profile(): UserResource{
        $userGet = $this->userService->profile();
        
        return new UserResource($userGet);
    }
    public function edit_proses(Request $request, $id): ResultResource{
        $userGet = $this->userService->edit_proses($request, $id);
        
        return new ResultResource(collect(['result'=>'pengguna berhasil di ubah']));
    }
}
