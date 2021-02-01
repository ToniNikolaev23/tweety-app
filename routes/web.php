<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetLikesController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/tweets', [TweetController::class, 'index'])->name('home');
Route::post('/tweets', [TweetController::class,'store']);
Route::post('/profiles/{user:username}/follow', [FollowsController::class, 'store'])->middleware('auth');
Route::get('/profiles/{user:username}', [ProfileController::class, 'show'])->name('profile');
Route::get('/profiles/{user:username}/edit', [ProfileController::class, 'edit'])->middleware('auth');
Route::patch('/profiles/{user:username}', [ProfileController::class, 'update'])->middleware('can:edit,user');
Route::post('/tweets/{tweet}/like', [TweetLikesController::class, 'store'])->middleware('auth');
Route::delete('/tweets/{tweet}/like', [TweetLikesController::class, 'destroy'])->middleware('auth');
Route::get('/explore', [ExploreController::class, 'index'])->middleware('auth');
