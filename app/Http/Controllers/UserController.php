<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function list(Request $request)
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
}
