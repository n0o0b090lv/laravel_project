<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DeathToThisGuy extends Controller
{
    public function register(Request $request) {
        $anythingYouWant = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8','max:200']
        ]);

        $anythingYouWant['password'] = bcrypt($anythingYouWant['password']);
        $user = User::create($anythingYouWant);
        auth()->login(user);
        return redirect('/');
    }
}
