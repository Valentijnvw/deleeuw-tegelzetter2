<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function lijst(Request $request)
    {
        $users = User::all()->map(function($user) {
            $user['roles'] = $user->getRoleNames();
            return $user;
        });

        return view('gebruiker.lijst', [
            'userList' => $users,
            'roleList' => Role::all(),
        ]);
    }

    public function toevoegen(Request $request)
    {
        return view('gebruiker.toevoegen', [
            'roleList' => Role::all(),
        ]);
    }

    public function create(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password' => 'same:password_confirm',
            'role_id' => 'required',
        ]);

        $user = User::create([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::findOrFail($request->role_id);
        $user->assignRole($role);
        
        return Redirect::route('gebruiker.lijst');
    }

    // Edit

    public function updatePassword(Request $request)
    {

        $validated = $request->validate([
            'newPassword' => ['required'],
            'confirmPassword' => 'same:newPassword',
        ]);

        $user = User::findOrFail($request->id);

        $user->update([
            'password' => Hash::make($validated['newPassword']),
        ]);
        $user->save();
    }
}
