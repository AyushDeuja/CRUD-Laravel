<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function regiser (Request $request) {
        $incomingFields = $request -> validate([
            'name' => ['required', 'min:3', 'max: 15'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'max: 200'],

        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth() -> login($user);
        return redirect('/');
    }
}
