<?php

use App\Models\Item;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
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

Route::get('/inventory',[ItemController::class, 'inventory'])->name('inventory');
Route::resource('items',ItemController::class);

Route::resource('users',UserController::class);

// Route::controller(ItemController::class)->group(function() {
//     Route::get('/items', 'index');
//     Route::get('/items/{id}', 'show');
//     Route::get('/inventory', 'ItemController@inventory');
//     Route::get('/inventory/create','create');
// });
// Route::controller('items', 'ItemController');
