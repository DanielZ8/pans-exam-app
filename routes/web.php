<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PytaniaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

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

Route::get('/', function () {
    return view('welcome');
})->name('mainpage');

Route::get('pytania', [PytaniaController::class, 'index']) ->name('pytania');

Route::get('/admin', [LoginController::class, 'index']) -> name('admin-login');
Route::post('/admin', [LoginController::class, 'login']);



Route::group(['middleware' => 'auth'], function () {
    Route::get('/pytanie-edit/{id}', [PytaniaController::class, 'index_edit']) -> name('pytanie-edit');
    Route::post('/pytanie-edit/{id}', [PytaniaController::class, 'update']) -> name('pytanie-update');

    Route::get('/logout', [LogoutController::class, 'logout']) -> name('logout');
});
