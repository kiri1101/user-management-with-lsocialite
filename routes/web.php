<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Userlist;
use App\Models\User;
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

Route::get('/', function () {
    return redirect()->route('login');
});

//Github Login
Route::get('/auth/redirect', [LoginController::class, 'redirectToProvider']);
Route::get('/auth/github/callback', [LoginController::class, 'handleProviderCallback']);

//Google Login
Route::get('/auth/google/redirect', [LoginController::class, 'redirectToGoogleProvider']);
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleProviderCallback']);

Route::middleware(['auth', 'verified'])->group(function() {
    Route::middleware(['isAdmin'])->group(function() {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/users', Userlist::class)->name('users.list');
    });

    Route::get('/users/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

require __DIR__.'/auth.php';
