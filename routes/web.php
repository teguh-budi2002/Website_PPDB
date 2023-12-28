<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormAdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentController;
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
Route::post('register/process', [RegisterController::class, 'register'])->name('register.process');
Route::post('login/process', [LoginController::class, 'login'])->name('login.process');

Route::middleware('auth')->group( function() {
  Route::post('logout/process', [LogoutController::class, 'logout'])->name('logout.process');

  // After Login Page
  Route::get('portal', [PageController::class,'afterLoginPage'])->name('after.login');
  Route::get('info-pembayaran-form-admin', [PageController::class,'infoPaymentPage'])->name('info.payment')->middleware('isUserCanPayFormAdmin');
  Route::get('pengumuman-hasil-seleksi', [PageController::class,'announcementOfSelectionResults'])->name('selection.results');
  Route::get('print-pdf', [StudentController::class, 'downloadPdfStudent'])->name('print.pdf');
  
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

Route::prefix('dashboard')->group(function () { 
  Route::get('/', [DashboardController::class, 'index'])->name('db.index');

  // Management Data Students
  Route::get('manage-data-students', [DashboardController::class, 'manage_data_students'])->name('manage.data_students');
  Route::get('manage-data-students/validate-student/{studentId}', [DashboardController::class, 'validate_student_score'])->name('validate_student_score');

  Route::patch('manage-data-students/approve-student/{studentId}', [StudentController::class, 'approvedStudent'])->name('approve_student');
  Route::patch('manage-data-students/declined-student/{studentId}', [StudentController::class, 'declinedStudent'])->name('declined_student');

  Route::get('settings', [DashboardController::class, 'manage_setting_forms'])->name('manage_settings');
});

Route::post('callback-midtrans', [MidtransController::class, 'handleCB'])->name('midtrans.cb');
