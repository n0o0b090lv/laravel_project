<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeathToThisGuy;

Route::get('/', function () {
    return view('myeyes');
});

Route::post('/register', [DeathToThisGuy::class, 'register']);