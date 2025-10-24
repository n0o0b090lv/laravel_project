<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DeathToThisGuy extends Controller
{
    public function register(Request $request) {
        $anythingYouWant = $request->validate([
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8','max:200']
        ]);

        $anythingYouWant['password'] = bcrypt($anythingYouWant['password']);
        $user = User::create($anythingYouWant);
        auth()->login($user);
        return redirect('/');
    }
    
    public function login(Request $request) {
        $AHHHH = $request->validate([
            'login_name' => 'required',
            'login_password' => 'required',
        ]);
        if (auth()->attempt(['name' => $AHHHH['login_name'], 'password' => $AHHHH['login_password']])) {
            $request->session()->regenerate();
        }
        return redirect('/');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }

}
