<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('send-message');
    Route::get('/get-messages/{user_to}', [ChatController::class, 'index'])->name('chat');
    Route::get('/me' , [UserController::class, 'me'])->name('user.me');
    Route::get('/users', [UserController::class, 'allUsers'])->name('users');
});

