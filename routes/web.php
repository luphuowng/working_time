<?php

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

Route::get('/admin', function () {
    return view('admin');
});
Route::get('/dayoff', function () {
    return view('dayoff.dayoff');
});
Route::get('/dayoff_register', function () {
    return view('dayoff.dayoff_register');
});
Route::get('/tracking_dayoff', function () {
    return view('dayoff.tracking_dayoff');
});