<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubjectController;

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

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('post-register', [RegisterController::class, 'postRegister'])->name('register.post');

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('post-login', [LoginController::class, 'postLogin'])->name('login.post');

Route::get('dashboard', [SubjectController::class, 'dashboard'])->name('dashboard');
Route::post('/saveSubject', [SubjectController::class,'saveSubject'])->name('saveSubject');
Route::post('/markDeleteRoute/{id}', [SubjectController::class, 'markDelete'])->name('markDelete');
Route::post('/markUpdateRoute/{id}', [SubjectController::class, 'markUpdate'])->name('markUpdate');

Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
