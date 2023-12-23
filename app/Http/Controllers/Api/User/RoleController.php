<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Http\Resources\ResultResource;
use Illuminate\Http\Request;
use App\Services\RoleService;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleController extends Controller
{
    public $serviceRole;
    public function __construct(){
        $this->serviceRole = new RoleService;
    }
    public function role(): ResourceCollection{
        $roleList = $this->serviceRole->role();
    
        return RoleResource::collection($roleList);
    }
    public function edit_proses(Request $request, $id): JsonResource  {
        $edit = $this->serviceRole->edit_proses($request, $id);

        return new ResultResource($edit);
    }
    public function add_proses(Request $request): JsonResource  {
        $add = $this->serviceRole->add_proses($request);

        return new ResultResource($add);
    }
    public function delete_proses($id): JsonResource  {
        $delete = $this->serviceRole->delete_proses($id);

        return new ResultResource($delete);
    }
}
