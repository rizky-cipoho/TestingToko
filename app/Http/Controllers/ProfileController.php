<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function detail($id): View
    {
        $user = User::with('role')->find($id);
        return view('profile.detail', [
            'user' => $user,
        ]);
    }
    public function edit($id): View
    {
        $user = User::with('role')->find($id);
        $roles = Role::get();
        return view('profile.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }
    public function edit_proses(ProfileUpdateRequest $request, $id){
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'username' => ['required', Rule::unique('users')->ignore($id),],
        ]);
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        $request->update($user);
        return back()->with('success', "Data berhasil diubah");
    }
}
