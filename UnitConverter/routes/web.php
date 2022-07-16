<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', function () {
    return view('welcome');
});

//Units Managment
Route::get('/units_table', [UnitController::class, 'table'])->name('units_table');
Route::get('/add_unit/{parent_id?}/{id?}', [UnitController::class, 'the_form'])->name('add_unit');
Route::post('/add_unit', [UnitController::class, 'post_form']);
Route::get('/delete_unit/{id}', [UnitController::class, 'delete'])->name('delete_unit');

//Products Managment
Route::get('/products_table', [ProductController::class, 'table'])->name('products_table');
Route::get('/add_product/{id?}', [ProductController::class, 'the_form'])->name('add_product');
Route::post('/add_product', [ProductController::class, 'post_form']);
Route::get('/delete_product/{id}', [ProductController::class, 'delete'])->name('delete_product');
