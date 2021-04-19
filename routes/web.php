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

// Route::resource('/pizzaria', PizzaController::class);

Route::get('/pizzaria', [PizzaController::class,'index']);
Route::get('/pizzaria/create', [PizzaController::class,'create']);
Route::post('/pizzaria/create',[PizzaController::class, 'store']);
Route::delete('/pizzaria/{id}',[PizzaController::class, 'destroy']);