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
/*
Route::get('qrcode', function () {
    return view('qrcode');
});
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('auth/google', 'GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');


Route::get('teacher_dashboard', function () {
    return view('teacher_dashboard');
});
Route::get('teacher_dashboard/lecture/scanning', function () {
    return view('QRcodepage');
});

Route::get('login', function () {
    return view('loginpage');
});
Route::get('qr', function () {
    return view('QRcodepage');
});
