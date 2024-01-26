<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PytaniaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ImageController;

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

Route::get('/egzamin-symulacja', [PytaniaController::class, 'egzamin_index']) -> name('egzamin-test');

Route::get('/api/egzamin-losowanie', [PytaniaController::class, 'random_index']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/pytanie-edit/{id}', [PytaniaController::class, 'index_edit']) -> name('pytanie-edit');
    Route::post('/pytanie-edit/{id}', [PytaniaController::class, 'update']) -> name('pytanie-update');

    Route::get('/haslo', [LoginController::class, 'change_pswd_index']) -> name('admin-password');
    Route::post('/haslo-change', [LoginController::class, 'change_pswd']) -> name('admin-password-change');

    Route::get('/logout', [LogoutController::class, 'logout']) -> name('logout');

    
    Route::post('/upload-image-pytanie', [ImageController::class, 'upload'])->name('upload-image');

});
