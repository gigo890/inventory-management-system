<?php

use App\Models\Item;
use App\Models\Branch;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\OrderedItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckPermission;
use App\Models\OrderedItem;

Route::get('/', function () {
    return view('auth.login');
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


Route::controller(BranchController::class)->group(function(){
    Route::get('/branches', 'index')->name('branch.index')->middleware(CheckPermission::class . ':Admin' );
    Route::get('/branches/{branch}/items', 'show')->name('branch.show');
    Route::get('/branches/{branch}/report', 'report')->name('branch.report')->middleware(CheckPermission::class . ':Admin' );
    Route::get('/branches/{branch}/sales', 'sales')->name('branch.sales')->middleware(CheckPermission::class . ':Admin' );
});
Route::controller(ItemController::class)->group(function(){
    Route::get('/items/search', 'search')->name('items.search');
    Route::resource('/items',ItemController::class);

});

Route::controller(SaleController::class)->group(function(){
    Route::get('/branches/{branch}/sales/{sale}', 'show')->name('sale.show')->middleware(CheckPermission::class . ':Admin' );
    Route::get('/sale/create/{order_id}', 'create')->name('sale.create')->middleware(CheckPermission::class . ':Staff' );
    Route::post('/sale/store/{order_id}', 'store')->name('sale.store')->middleware(CheckPermission::class . ':Staff' );
});
Route::controller(OrderController::class)->group(function(){
    Route::get('/order/add', 'add')->name('order.add')->middleware(CheckPermission::class . ':Staff' );
    Route::resource('/order',OrderController::class);
});
Route::controller(OrderedItemController::class)->group(function(){
    Route::get('/order/add/{order_id}/{item_id}', 'create')->name('ordereditem.create')->middleware(CheckPermission::class . ':Staff' );
    Route::post('/ordereditem/store/{order_id}/{item_id}', 'store')->middleware(CheckPermission::class . ':Staff' );
});
Route::resource('/users',UserController::class)->middleware(CheckPermission::class . ':Admin' );

Route::resource('/products', ProductController::class)->middleware(CheckPermission::class . ':Admin' );

// Route::controller(ItemController::class)->group(function() {
//     Route::get('/items', 'index');
//     Route::get('/items/{id}', 'show');
//     Route::get('/inventory', 'ItemController@inventory');
//     Route::get('/inventory/create','create');
// });
// Route::controller('items', 'ItemController');
