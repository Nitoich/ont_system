<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('home');
})->name('mainpage');

Route::get('/rasp', [\App\Http\Controllers\RaspController::class, 'getRaspByGroup']);

Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::get('/logout', function() {
    if(Auth::check()) {
        Auth::logout();
    }
    return redirect('/#login');
});

Route::get('/izm', [\App\Http\Controllers\IzmController::class, 'getIzm']);
Route::get('/izm/date', [\App\Http\Controllers\IzmController::class, 'getIzmById']);

Route::middleware('auth')->group(function() {
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'getPage']);
    Route::get('/admin/template', [\App\Http\Controllers\AdminController::class, 'getTemplate']);

    // Teacher
    Route::get('/admin/teacher', [\App\Http\Controllers\AdminController::class, 'getTeacherInfo']);
    Route::get('/admin/teacher/list', [\App\Http\Controllers\AdminController::class, 'getTeachersTemplates']);
    Route::post('/admin/teacher', [\App\Http\Controllers\AdminController::class, 'addTeacher']);
    Route::delete('/admin/teacher', [\App\Http\Controllers\AdminController::class, 'delTeacher']);
    Route::post('/admin/teacher/update', [\App\Http\Controllers\AdminController::class, 'updateTeacher']);


    // Group
    Route::post('/admin/group', [\App\Http\Controllers\GroupController::class, 'addGroup']);
});
