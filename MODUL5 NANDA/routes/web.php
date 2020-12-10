<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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

Route::view('/', 'home')->name('home');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');

Route::view('/product/add', 'addproduct')->name('product.add_view');
Route::post('/product/add', [ProductController::class, 'add'])->name('product.add');

Route::get('/product/update/{id}', [ProductController::class, 'update_view'])->name('product.update_view');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');

Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/order/history', [OrderController::class, 'history'])->name('order.history');

Route::get('/order/{id}', [OrderController::class, 'process_view'])->name('order.process_view');
Route::post('/order/{id}', [OrderController::class, 'process'])->name('order.process');

