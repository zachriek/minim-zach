<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\User\PasswordUserRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Menu;
use App\Models\User;

class UpdatePasswordUserController extends Controller
{
    public function edit()
    {
        $id = Auth::user()->id;

        $item = User::findOrFail($id);

        $menus = Menu::with(['sub_menus'])
                ->where('roles', 'USER')
                ->get();

        return view('pages.user.profile.password.edit', [
            'item' => $item,
            'menus' => $menus,
            'active' => 'Change Password'
        ]);
    }

    public function update(PasswordUserRequest $request)
    {
        if (Hash::check($request->current_password, Auth::user()->password)) {
            Auth::user()->update([
                'password' => Hash::make($request->password)
            ]);
            
            return redirect()->route('change-user-password')->with('success', 'Your password has been updated!');
        }

        return redirect()->route('change-user-password')->with('error', "Your current password doesn't match with our record!");
    }
}
