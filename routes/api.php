<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Level;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// level
Route::get('level', 'LevelController@index');
Route::get('level/{level}', 'LevelController@show');
Route::post('level', 'LevelController@store');
Route::put('level/{level}', 'LevelController@update');
Route::delete('level/{level}', 'LevelController@delete');
// section
Route::get('level/{level}/section', 'SectionController@index');
Route::get('level/{level}/section/{section}', 'SectionController@show');
Route::post('level/{level}/section', 'SectionController@store');
Route::put('level/{level}/section/{section}', 'SectionController@update');
Route::delete('level/{level}/section/{section}', 'SectionController@delete');
// group
Route::get('level/{level}/section/{section}/group', 'GroupController@index');
Route::get('level/{level}/section/{section}/group/{group}', 'GroupController@show');
Route::post('level/{level}/section/{section}/group', 'GroupController@store');
Route::put('level/{level}/section/{section}/group/{group}', 'GroupController@update');
Route::delete('level/{level}/section/{section}/group/{group}', 'GroupController@delete');
// student
Route::get('level/{level}/section/{section}/group/{group}/student', 'StudentController@index');
Route::get('level/{level}/section/{section}/group/{group}/student/{student}', 'StudentController@show');
Route::post('level/{level}/section/{section}/group/{group}/student', 'StudentController@store');
Route::put('level/{level}/section/{section}/group/{group}/student/{student}', 'StudentController@update');
Route::delete('level/{level}/section/{section}/group/{group}/student/{student}', 'StudentController@delete');
// professor
Route::get('professor', 'ProfessorController@index');
Route::get('professor/{professor}', 'ProfessorController@show');
Route::post('professor', 'ProfessorController@store');
Route::put('professor/{professor}', 'ProfessorController@update');
Route::delete('professor/{professor}', 'ProfessorController@delete');
// room
Route::get('room', 'RoomController@index');
Route::get('room/{room}', 'RoomController@show');
Route::post('room', 'RoomController@store');
Route::put('room/{room}', 'RoomController@update');
Route::delete('room/{room}', 'RoomController@delete');
// session
Route::get('session', 'SessionController@index');
Route::get('session/{session}', 'SessionController@show');
Route::post('session', 'SessionController@store');
Route::put('session/{session}', 'SessionController@update');
Route::delete('session/{session}', 'SessionController@delete');
// record
Route::get('record', 'RecordController@index');
Route::get('record/{record}', 'RecordController@show');
Route::post('record', 'RecordController@store');
/* Route::put('record/{record}', 'RecordController@update');
Route::delete('record/{record}', 'RecordController@delete'); */
// generate_qr_code
Route::get('generate_qr_code', 'GeneratedQrCodeController@index');
Route::get('generate_qr_code/{qr_code}', 'GeneratedQrCodeController@show');
Route::post('generate_qr_code', 'GeneratedQrCodeController@store');
/* Route::put('generate_qr_code/{qr_code}', 'GeneratedQrCodeController@update');
Route::delete('generate_qr_code/{qr_code}', 'GeneratedQrCodeController@delete'); */