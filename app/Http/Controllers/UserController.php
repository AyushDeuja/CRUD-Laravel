<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function regiser (Request $request) {
        $incomingFields = $request -> validate([
            'name' => ['required', 'min:3', 'max: 15'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6', 'max: 200'],

        ]);
        return 'Hello from Controller';
    }
}
