<?php

use App\Models\Item;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('item.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('items',ItemController::class);


Route::get('/dashboard', function () {
    if (!session('user_id')) {
        return redirect('/login')->with('error', 'Please login first.');
    }
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/registration', function () {
    if (session('user_id')) {
        return redirect('/');
    }
    return view('registration');
});
Route::get('/login', function () {
    if (session('user_id')) {
        return redirect('/');
    }
    return view('login');
});

Route::post('/register', [UserRegisterController::class, 'store'])->name('user_register.store');
Route::post('/login', [UserRegisterController::class, 'login'])->name('user_register.login');
Route::get('/logout', [UserRegisterController::class, 'logout'])->name('user_register.logout');