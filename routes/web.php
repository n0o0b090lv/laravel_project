<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeathToThisGuy;
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/', function () {
    $posts = [];
    if(auth()->check()){
        $posts = auth()->user()->userPosts()->latest()->get();
    }
    return view('myeyes', ['posts' => $posts]);
});

Route::post('/register', [DeathToThisGuy::class, 'register']);
Route::post('/logout', [DeathToThisGuy::class, 'logout']);
Route::post('/login', [DeathToThisGuy::class, 'login']);

//Posts
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScene']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

Route::post('/create-event', [PostController::class, 'createPost']);