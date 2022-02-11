<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    }); 

    Route::post('/products', [ProductsController::class, 'newProduct']);

    Route::get('/products', [ProductsController::class, 'getProducts']);

    Route::put('/products/{product}', [ProductsController::class, 'editProduct']);

    Route::get('/products/{product}', [ProductsController::class, 'getSpecificProduct']);

    Route::put('/products/{product}/activate', [ProductsController::class, 'activateProduct']);

    Route::put('/products/{product}/deactivate', [ProductsController::class, 'deactivateProduct']);

    Route::post('/users/register', [RegisterController::class, 'create']);

    Route::put('/users/{user}/admin', [UsersController::class, 'makeUserAdmin']);

    Route::put('users/{user}/update', [UsersController::class, 'editUserDetails']);

    Route::delete('users/{id}', [UsersController::class, 'deleteUser']);
});

