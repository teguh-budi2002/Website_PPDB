<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormAdminController;
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


Route::middleware('auth')->group( function() {
  // After Login Page
  Route::get('portal', [PageController::class,'afterLoginPage'])->name('after.login');
  Route::get('info-payment', [PageController::class,'infoPaymentPage'])->name('info.payment');
  
  Route::get('portal/form-admin/step-one', [FormAdminController::class, 'createStepOne'])->name('form.step.one');
  Route::post('portal/form-admin/step-one', [FormAdminController::class, 'createStepOneProcess'])->name('form.step.one.process');
  Route::get('portal/form-admin/step-two', [FormAdminController::class, 'createStepTwo'])->name('form.step.two');
  Route::post('portal/form-admin/step-two', [FormAdminController::class, 'createStepTwoProcess'])->name('form.step.two.process');
  Route::get('portal/form-admin/step-three', [FormAdminController::class, 'createStepThree'])->name('form.step.three');
  Route::post('portal/form-admin/step-three', [FormAdminController::class, 'createStepThreeProcess'])->name('form.step.three.process');
  Route::get('portal/form-admin/step-four', [FormAdminController::class, 'createStepFour'])->name('form.step.four');
  Route::post('portal/form-admin/step-four', [FormAdminController::class, 'createStepFourProcess'])->name('form.step.four.process');
  Route::get('portal/form-admin/step-five', [FormAdminController::class, 'createStepFive'])->name('form.step.five');
  Route::post('portal/form-admin/step-five', [FormAdminController::class, 'createStepFiveProcess'])->name('form.step.five.process');
});

Route::prefix('auth')->group(function () { 
  Route::post('register/process', [RegisterController::class, 'register'])->name('register.process');
  Route::post('login/process', [LoginController::class, 'login'])->name('login.process');
  Route::post('logout/process', [LogoutController::class, 'logout'])->name('logout.process');
});

Route::prefix('dashboard')->group(function () { 
  Route::get('/', [DashboardController::class, 'index'])->name('db.index');

  // Management Data Students
  Route::get('manage-data-students', [DashboardController::class, 'manage_data_students'])->name('manage.data_students');
});

Route::post('callback-midtrans', [MidtransController::class, 'handleCB'])->name('midtrans.cb');
