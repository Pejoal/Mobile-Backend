<?php

use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {  
  Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
  Route::patch('/posts/{post:id}/update', [PostController::class, 'update'])->name('posts.update');
  Route::delete('/posts/{post:id}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');
});


// Content-Type & Accept should be application/json

Route::group([], function () {
  // Posts Routes
  Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
  Route::get('/posts/{post:id}/show', [PostController::class, 'show'])->name('posts.show');

  Route::post('/register', [RegisterController::class, 'register'])->name('user.register');
  Route::post('/login', [RegisterController::class, 'login'])->name('user.login');

});
