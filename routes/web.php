<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeathToThisGuy;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Models\Post;
use App\Models\Event;

Route::get('/', function () {
    $events = Event::all();
    return view('myeyes', ['events' => $events]);
});

Route::post('/register', [DeathToThisGuy::class, 'register']);
Route::post('/logout', [DeathToThisGuy::class, 'logout']);
Route::post('/login', [DeathToThisGuy::class, 'login']);

//Posts
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScene']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

//Events
Route::post('/create-event', [EventController::class, 'createEvent']);
Route::get('/edit-event/{event}', [EventController::class, 'showEditScene']);
Route::put('/edit-event/{event}', [EventController::class, 'updateEvent']);
Route::delete('/delete-event/{event}', [EventController::class, 'deleteEvent']);
Route::post('/create-event', [EventController::class, 'flagParticipation']);