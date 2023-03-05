<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TaxiDriverController;
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

Route::get('/order', [OrderController::class, 'index']);

Route::post('/order/submit', [OrderController::class, 'submit']);


Route::get('/taxidriver', [TaxiDriverController::class, 'index']);

Route::get('taxidriver/accounts/{id}', [TaxiDriverController::class, 'show'])->name('taxidriver.show')->middleware('auth');

// Show Register/Create Form
Route::get('/taxidriver/signup', [TaxiDriverController::class, 'create']);//->middleware('guest');

// Show Login Form
Route::get('/taxidriver/login', [TaxiDriverController::class, 'login']);//->name('login')->middleware('guest');

// Create New User
Route::post('/taxidriver/new', [TaxiDriverController::class, 'store']);

// Log In User
Route::post('/taxidriver/authenticate', [TaxiDriverController::class, 'authenticate']);

/*
// Create New User
Route::get('/taxidriver', [TaxiDriverController::class, 'store']);

// Log User Out
Route::post('/taxidriver/logout', [TaxiDriverController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/taxidriver/login', [TaxiDriverController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/taxidriver/authenticate', [TaxiDriverController::class, 'authenticate']);*/


