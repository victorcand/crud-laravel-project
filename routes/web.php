<?php

use App\Http\Controllers\PizzaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pizzaria', [PizzaController::class, 'index'])->name('list_pizzas');
Route::get('/pizzaria/create', [PizzaController::class, 'create'])->name('form_pizza');
Route::get('/pizzaria/search', [PizzaController::class, 'search'])->name('filter_pizza');
Route::post('/pizzaria/create', [PizzaController::class, 'store'])->name('create_pizza');
Route::delete('/pizzaria/{id}', [PizzaController::class, 'destroy'])->name('delete_pizza');
Route::post('/pizzaria/{id}/edit', [PizzaController::class, 'edit']);
