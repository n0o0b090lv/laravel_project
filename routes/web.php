<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeathToThisGuy;

Route::get('/', function () {
    return view('myeyes');
});

Route::post('/register', [DeathToThisGuy::class, 'register']);
Route::post('/logout', [DeathToThisGuy::class, 'logout']);
Route::post('/login', [DeathToThisGuy::class, 'login']);