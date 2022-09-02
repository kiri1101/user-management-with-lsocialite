<?php

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

Route::middleware(['auth', 'verified'])->group(function() {
    Route::middleware(['isAdmin'])->group(function() {
        Route::get('/dashboard', function() {
            return view('dashboard',[
                'users' => User::latest()->paginate(4)
            ]);
        })->name('dashboard');
        
        Route::get('/users', Userlist::class)->name('users.list');
    });

    Route::get('/users/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

require __DIR__.'/auth.php';
