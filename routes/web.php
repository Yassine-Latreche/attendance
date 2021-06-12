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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('teacher_dashboard', function () {
        return view('teacher_dashboard');
    })->name('teacher_dashboard');

    Route::get('teacher_dashboard/lecture/scanning', 'ScanningController@index')->name('scanning');
    Route::get('teacher_dashboard/summary', 'SummaryController@index')->name('summary');

    Route::get('timetable/export/', 'TimeTableController@export');
    Route::get('teacher_dashboard/export/', 'StudentController@exportget');
    Route::post('teacher_dashboard/export/', 'StudentController@export');

    /* ---- MODULE ---- */
    Route::get('teacher_dashboard/module/', 'CRUDController@moduleIndex')->name('moduleIndex');
    Route::post('teacher_dashboard/module/', 'CRUDController@moduleStore');
    Route::get('teacher_dashboard/module/{module}', 'CRUDController@moduleEdit');
    Route::post('teacher_dashboard/module/{module}', 'CRUDController@moduleUpdate');
    Route::get('teacher_dashboard/module/{module}/delete', 'CRUDController@moduleDelete');

    /* ---- LEVEL ---- */
    Route::get('teacher_dashboard/level/', 'CRUDController@levelIndex')->name('levelIndex');
    Route::post('teacher_dashboard/level/', 'CRUDController@levelStore');
    Route::get('teacher_dashboard/level/{level}', 'CRUDController@levelEdit');
    Route::post('teacher_dashboard/level/{level}', 'CRUDController@levelUpdate');
    Route::get('teacher_dashboard/level/{level}/delete', 'CRUDController@levelDelete');

    /* ---- SECTION ---- */
    Route::get('teacher_dashboard/level/{level}/section', 'CRUDController@sectionIndex')->name('sectionIndex');
    Route::post('teacher_dashboard/level/{level}/section', 'CRUDController@sectionStore');
    Route::get('teacher_dashboard/level/{level}/section/{section}', 'CRUDController@sectionEdit');
    Route::post('teacher_dashboard/level/{level}/section/{section}', 'CRUDController@sectionUpdate');
    Route::get('teacher_dashboard/level/{level}/section/{section}/delete', 'CRUDController@sectionDelete');

    /* ---- GROUP ---- */
    Route::get('teacher_dashboard/level/{level}/section/{section_Id}/group', 'CRUDController@groupIndex')->name('groupIndex');
    Route::post('teacher_dashboard/level/{level}/section/{section}/group', 'CRUDController@groupStore');
    Route::get('teacher_dashboard/level/{level}/section/{section}/group/{group}', 'CRUDController@groupEdit');
    Route::post('teacher_dashboard/level/{level}/section/{section}/group/{group}', 'CRUDController@groupUpdate');
    Route::get('teacher_dashboard/level/{level}/section/{section}/group/{group}/delete', 'CRUDController@groupDelete');

    /* ---- PROFESSORS ---- */
    Route::get('teacher_dashboard/professor/', 'CRUDController@professorIndex')->name('professorIndex');
    Route::post('teacher_dashboard/professor/', 'CRUDController@professorStore');
    Route::get('teacher_dashboard/professor/{professor}', 'CRUDController@professorEdit');
    Route::post('teacher_dashboard/professor/{professor}', 'CRUDController@professorUpdate');
    Route::get('teacher_dashboard/professor/{professor}/delete', 'CRUDController@professorDelete');

    /* ---- TIMETABLE ---- */
    Route::get('teacher_dashboard/timetable/', 'CRUDController@timetableIndex')->name('timetableIndex');
    Route::post('teacher_dashboard/timetable/', 'CRUDController@timetableStore');
    Route::get('teacher_dashboard/timetable/{timetable}', 'CRUDController@timetableEdit');
    Route::post('teacher_dashboard/timetable/{timetable}', 'CRUDController@timetableUpdate');
    Route::get('teacher_dashboard/timetable/{timetable}/delete', 'CRUDController@timetableDelete');
});
Route::get('auth/google', 'GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');
