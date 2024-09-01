<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->middleware('auth:api')->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'products'
], function ($router) {
   Route::get('/', [ProductController::class, 'index'])->middleware('auth:api')->name('products.index');
   Route::post('/', [ProductController::class, 'store'])->middleware('auth:api')->name('products.store');
   Route::get('/{id}', [ProductController::class, 'show'])->middleware('auth:api')->name('products.show');
   Route::put('/{id}', [ProductController::class, 'update'])->middleware('auth:api')->name('products.update');
   Route::delete('/{id}', [ProductController::class, 'destroy'])->middleware('auth:api')->name('products.destroy');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'category'
], function ($router) {
   Route::get('/', [CategoryController::class, 'index'])->middleware('auth:api')->name('products.index');
   Route::post('/', [CategoryController::class, 'store'])->middleware('auth:api')->name('products.store');
   Route::get('/{id}', [CategoryController::class, 'show'])->middleware('auth:api')->name('products.show');
   Route::put('/{id}', [CategoryController::class, 'update'])->middleware('auth:api')->name('products.update');
   Route::delete('/{id}', [CategoryController::class, 'destroy'])->middleware('auth:api')->name('products.destroy');
});

