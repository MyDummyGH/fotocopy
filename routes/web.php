<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\Home;
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

Route::get('/', [Home::class, 'index']);
Route::get('/listDatas', [Home::class, 'listdata']);
Route::get('/editOrder/{id}', [Home::class, 'edit']);
Route::post('/inputOrder', [Home::class, 'store']);
Route::post('/updateOrder/{id}', [Home::class, 'update']);
Route::get('/deleteOrder/{id}', [Home::class, 'destroy']);

// API
Route::get('/getharga/{product}', [Home::class, 'getHarga']);

