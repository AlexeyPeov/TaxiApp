<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', function (){
    return view('main');
});

Route::get('/customer', [CustomerController::class, 'index']);

Route::post('/order', [OrderController::class, 'index']);
Route::post('/order/submit', [OrderController::class, 'submit']);


Route::get('/taxidriver', function (){
    return view('taxidriver');
})->name('taxidriver');

/*Route::post('/order', function (){
    return view('order');
});*/



/*Route::post('/data.js', function (){
    //ddd(file('data.js'));
    return file('data.js');
});*/

