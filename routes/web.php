<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::middleware(['auth:sanctum', 'verified'])->get('teacher_dashboard', function () {
    return view('teacher_dashboard');
})->name('teacher_dashboard');

Route::get('auth/google', 'GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');


// Route::get('teacher_dashboard', function () {
//     return view('teacher_dashboard');
// });
Route::get('teacher_dashboard/lecture/scanning', 'ScanningController@index');
Route::get('teacher_dashboard/summary', 'SummaryController@index');

/* Route::get('login', function () {
    return view('loginpage');
}); */
Route::get('qr', function () {
    return view('QRcodepage');
});


Route::get('timetable/export/', 'TimeTableController@export');