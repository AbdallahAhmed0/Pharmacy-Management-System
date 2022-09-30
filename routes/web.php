<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Psy\CodeCleaner\FunctionContextPass;

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


Route::group(['middleware' => 'auth'], function () {


    Route::get('/', function () {
        return view('auth.login');
    });

    Route::get('access-denied', function () {
        return view('layouts.admin.forbidden');
    })->name('access-denied');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth']);

    Route::get('/sales/report', [SalesController::class, 'report'])->name('sales.report');
    Route::post('/sales/report', [SalesController::class, 'getReport'])->name('sales.getReport');
    Route::get('/purchases/report', [PurchasesController::class, 'report'])->name('purchases.report');
    Route::post('/purchases/report', [PurchasesController::class, 'getReport'])->name('purchase.getReport');
    Route::get('/sales/archive', [SalesController::class, 'archive'])->name('sales.archive');


    Route::resources([
        'sales' => SalesController::class,
        'purchases' => PurchasesController::class,
    ]);
});

Route::group(['middleware' => 'auth', 'middleware' => 'isAdmin'], function () {

    Route::delete('/sales/{id}/destroyArchive', [SalesController::class, 'destroyArchive'])->name('sales.destroyArchive');
    Route::get('/sales/{id}/archive', [SalesController::class, 'restoreArchive'])->name('sales.restore');


    Route::prefix('suppliers')->group(function () {

        Route::get('archive', [SuppliersController::class, 'archive'])->name('suppliers.archive');
        Route::get('restoreArchive/{id}', [SuppliersController::class, 'restoreArchive'])->name('suppliers.restoreArchive');
        Route::delete('destroyArchive/{id}', [SuppliersController::class, 'destroyArchive'])->name('suppliers.destroyArchive');
    });

    Route::prefix('user')->group(function () {

        Route::get('archive', [UserController::class, 'archive'])->name('user.archive');
        Route::get('restoreArchive/{id}', [UserController::class, 'restoreArchive'])->name('user.restoreArchive');
        Route::delete('destroyArchive/{id}', [UserController::class, 'destroyArchive'])->name('user.destroyArchive');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('archive', [ProductsController::class, 'archive']);
        Route::delete('archive/{id}', [ProductsController::class, 'destroyArchive'])->name('products.destroyArchive');
        Route::delete('archive', [ProductsController::class, 'archive'])->name('products.archive');
        // Route::delete('departments/archive/delete', [DepartmentController::class,'destroyArchiveAll'])->name('departments.destroyArchiveAll');
        Route::get('archive/restore/{id}', [ProductsController::class, 'restoreArchive'])->name('products.restoreArchive');
    });


    Route::resources([
        'categories' => CategoriesController::class,
        'products' => ProductsController::class,
        'suppliers' => SuppliersController::class,
        'user' => UserController::class
    ]);
});


require __DIR__ . '/auth.php';
