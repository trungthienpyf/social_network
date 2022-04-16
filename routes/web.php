<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['web'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    Route::post('/signup',[UserController::class,'postSignUp'])->name('signup');
    Route::post('/signin',[UserController::class,'postSignIn'])->name('signin');
    Route::get('/dashboard',[PostController::class,'dashboard'])->name('dashboard')->middleware('auth');
    Route::get('/logout',[UserController::class,'getLogout'])->name('logout');

    Route::post('/createpost',[PostController::class,'postCreatePost'])->name('post.create');
    Route::post('/edit',[PostController::class,'postEditPost'])->name('post.edit');
    Route::post('/like',[PostController::class,'postLikePost'])->name('post.like');
    Route::delete('/destroy/{post_id}', [PostController::class, 'destroy'])->name('post.destroy');
});
