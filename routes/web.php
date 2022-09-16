<?php

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

// Home Routes
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth Login Routes
Route::controller(\App\Http\Controllers\Auth\LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login');
    Route::any('/logout', 'logout')->name('logout');
});

// Auth Register Routes
Route::controller(\App\Http\Controllers\Auth\RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register');
    Route::post('/register', 'register');
});


// Categories Routes
Route::controller(\App\Http\Controllers\CategoriesController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories');
    Route::get('/categories/{id}', 'view')->name('categories.view');;
});

// Cart Routes
Route::controller(\App\Http\Controllers\CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart');
    Route::post('/cart', 'checkout');
    Route::post('/cart/add', 'add')->name('cart.add');
    Route::post('/cart/remove', 'remove')->name('cart.remove');
    Route::post('/cart/update', 'update')->name('cart.update');
});

Route::get('/faqs', function () { return view('faqs'); })->name('faqs');
Route::get('/orders', [\App\Http\Controllers\OrdersController::class, 'index'])->name('orders');





// Admin Routes
Route::group(['prefix' => 'admin'], function () {
    // Product Routes
    Route::controller(\App\Http\Controllers\Admin\ProductsController::class)->group(function () {
        Route::get('/products', 'index')->name('admin.products');
        Route::get('/products/delete/{id}', 'delete')->name('admin.products.delete');
        Route::get('/products/update/{id}', 'edit')->name('admin.products.update');
        Route::post('/products/update/{id}', 'update');
        Route::get('/products/create', 'create')->name('admin.products.create');
        Route::post('/products/create', 'store');
    });

    // Category Routes
    Route::controller(\App\Http\Controllers\Admin\CategoriesController::class)->group(function () {
        Route::get('/categories', 'index')->name('admin.categories');
        Route::get('/categories/delete/{id}', 'delete')->name('admin.categories.delete');
        Route::get('/categories/update/{id}', 'edit')->name('admin.categories.update');
        Route::post('/categories/update/{id}', 'update');
        Route::get('/categories/create', 'create')->name('admin.categories.create');
        Route::post('/categories/create', 'store');
    });

    // Orders Routes
    Route::controller(\App\Http\Controllers\Admin\OrdersController::class)->group(function () {
        Route::get('/orders', 'index')->name('admin.orders');
        Route::get('/orders/update', 'update')->name('admin.orders.update');
    });
});

