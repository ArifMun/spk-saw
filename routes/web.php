<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/login-process', [LoginController::class, 'actionLogin'])->name('login-process');
Route::get('/log-out', [LoginController::class, 'logout'])->name('log-out')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
