<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $posts =[];
    if (auth()->check()){

        $posts = auth()->user()->usersCoolPosts()->latest()->get();
    }
    return view('home/home',['posts'=> $posts]);
});

Route::post('/register', [UserController::class,'register']); 
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);
// Route::put('/home/{task}', [TaskController::class, 'update']);
// Route::delete('/home/{task}', [TaskController::class, 'destroy']);

// Blog postrelated routes
Route::post('/create-post',[PostController::class,'createPost']);
Route::get('/edit-post/{post}',[PostController::class,'showEditScreen']);
Route::put('/edit-post/{post}',[PostController::class,'actuallyUpdatePost']);
Route::delete('/delete-post/{post}',[PostController::class,'deletePost']);

Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::put('/tasks/{task}', [TaskController::class, 'update']);
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
