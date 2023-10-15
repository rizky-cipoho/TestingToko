<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class RolePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function update(User $user, $role){
        $currentPath= Route::getFacadeRoot()->current()->action['as'];
        dd($currentPath);
        // $user->with('role')->first()
        // Auth::user()->with('role')->get()
        // $rules = Role::
        // return 
    }
}
