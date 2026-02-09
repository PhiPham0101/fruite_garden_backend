<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CategoryController::class, 'create']);

Route::prefix('/admin/category/')->group(function (){
    Route::get('add', [CategoryController::class, 'create']);
    Route::post('add', [CategoryController::class, 'store']);
    Route::get('list', [CategoryController::class, 'index']);
    Route::get('edit/{category}', [CategoryController::class, 'show']);
    Route::post('edit/{category}', [CategoryController::class, 'update']);
    Route::delete('destroy', [CategoryController::class, 'destroy']);
});


Route::prefix('/admin/products/')->group(function (){
    Route::get('add',[ProductController::class, 'create']);
    Route::post('add',[ProductController::class, 'store'])->name('admin.products.store');
    Route::get('list',[ProductController::class, 'index']);
    Route::get('edit/{product}',[ProductController::class, 'show']);
    Route::post('edit/{product}',[ProductController::class, 'update']);
    Route::delete('destroy', [ProductController::class, 'destroy']);
    //Upload
    Route::post('/upload_services', [ProductController::class, 'upload']);
});

Route::prefix('admin/orders')->group(function () {
    Route::get('list', [OrderController::class, 'index'])
        ->name('admin.orders.list');

    Route::get('listdetail/{order}', [OrderController::class, 'show'])
        ->name('admin.orders.show');

    Route::post('{order}/update-status', [OrderController::class, 'updateStatus'])
        ->name('admin.orders.updateStatus');
});

