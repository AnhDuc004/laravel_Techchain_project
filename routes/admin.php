<?php

use App\Http\Controllers\Admin\CatalogueController;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


// 
Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')
        ->as('admin.')
        ->group(function () {

            Route::get('/', function () {
                return view('admin.dashboard');
            })->name('dashboard');
            Route::prefix('catalogues')
                ->as('catalogues.')
                ->group(function () {
                    Route::get('/',                 [CatalogueController::class, 'index'])->name('index');
                    Route::get('create',            [CatalogueController::class, 'create'])->name('create');
                    Route::post('store',            [CatalogueController::class, 'store'])->name('store');
                    Route::get('show/{id}',         [CatalogueController::class, 'show'])->name('show');
                    Route::get('{id}/edit',         [CatalogueController::class, 'edit'])->name('edit');
                    Route::put('{id}/update',       [CatalogueController::class, 'update'])->name('update');
                    Route::get('{id}/destroy',   [CatalogueController::class, 'destroy'])->name('destroy');
                });
            Route::prefix('users')
                ->as('users.')
                ->group(function () {
                    Route::get('/',                 [UserController::class, 'index'])->name('index');
                    Route::get('show/{id}',         [UserController::class, 'show'])->name('show');
                    Route::get('{id}/edit',         [UserController::class, 'edit'])->name('edit');
                    Route::put('{id}/update',       [UserController::class, 'update'])->name('update');
                    Route::get('{id}/destroy',   [UserController::class, 'destroy'])->name('destroy');
                });


            Route::resource('products', ProductController::class);
        });
});