<?php

use App\Http\Controllers\Web\AccountController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ProductController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=> '', 'middleware'=>'check_login'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

});

Route::group(['prefix'=> 'account', 'as' => 'account.'], function () {
    Route::get('/register', [AccountController::class, 'registerForm'])->name('registerForm');
    Route::post('/register', [AccountController::class, 'registerAction'])->name('registerAction');


    Route::get('/login', [AccountController::class, 'loginForm'])->name('loginForm'); 
    Route::post('/login', [AccountController::class, 'loginAction'])->name('loginAction'); 


    Route::get('/logout', [AccountController::class, 'logout'])->name('logout');
});
Route::group(['prefix'=> 'products', 'as' => 'product.'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::get('/{id}', [ProductController::class,'show'])->name('show');
    Route::post('/', [ProductController::class,'store'])->name('store');
    Route::get('/edit/{id}', [ProductController::class,'edit'])->name('edit');
    Route::put('/{product}', [ProductController::class,'updateProduct'])->name('update');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
});
    