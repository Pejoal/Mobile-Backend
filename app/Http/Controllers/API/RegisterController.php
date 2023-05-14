<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request) {
      
      $validated = $request->validate([
        'name' => ['required'],
        'email' => ['required'],
        'password' => ['required', 'confirmed'],
      ]);

      return User::create([
        ...$validated,
        'password' => bcrypt($request->password),
      ]);
    }

    public function login() {

    }
}
