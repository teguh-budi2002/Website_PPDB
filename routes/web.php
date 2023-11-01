<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [PageController::class,'index'])->name('home');
Route::get('register', [PageController::class,'register'])->name('register');
Route::get('login', [PageController::class,'login'])->name('login');

// After Login Page
Route::get('portal', [PageController::class,'afterLoginPage'])->name('after.login')->middleware('auth');
Route::get('info-payment', [PageController::class,'infoPaymentPage'])->name('info.payment')->middleware('auth');

Route::prefix('auth')->group(function () { 
  Route::post('register/process', [RegisterController::class, 'register'])->name('register.process');
  Route::post('login/process', [LoginController::class, 'login'])->name('login.process');
  Route::post('logout/process', [LogoutController::class, 'logout'])->name('logout.process');
});

Route::post('callback-midtrans', [MidtransController::class, 'handleCB'])->name('midtrans.cb');
