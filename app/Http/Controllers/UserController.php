<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginEmail' => ['required'],
            'loginPassword' => ['required']
        ]);
        if(auth() -> attempt(['email' => $incomingFields['loginEmail'], 'password' => $incomingFields['loginPassword']])){
            $request -> session() -> regenerate();
        }
        return redirect('/');
    }

    public function logout()  {
        auth() -> logout();
        return redirect('/');
    }

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
