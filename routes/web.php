<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::get('/storage-link', function () {
//     $targetFolder = storage_path('app/public');
//     $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
//     symlink($targetFolder, $linkFolder);
// });


//AUTH ROUTES START
//Registration Feature
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/register/cookie', [RegisterController::class, 'cookie'])->name('register.cookie');

//Login Feature
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

//Forgot Password Feature
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password.index');
Route::post('/forgot-password', [ForgotPasswordController::class, 'validation'])->name('forgot-password.validation');
Route::get('/reset-password/create/', [ForgotPasswordController::class, 'create'])->name('reset-password.create');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('reset-password.reset');
//END OF AUTH ROUTES


//CORE FEATURE START
//Dashboard Feature
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');
//END OF CORE FEATURE

//SIDE FEATURES START
//Employees Features
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index')->middleware('auth');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create')->middleware('auth');
Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store')->middleware('auth');
Route::get('/employee-lists', [EmployeeController::class, 'show'])->name('employee.show')->middleware('auth');
Route::get('/storage/employees-profile-picture/{filename}', [EmployeeController::class, 'showProfile'])->name('employee.showProfile')->middleware('auth');
Route::get('/employee/{user_id}/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit')->middleware('auth');
Route::put('/employee/{employee}', [EmployeeController::class, 'update'])->name('employee.update')->middleware('auth');
Route::delete('/employee/{user_id}/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy')->middleware('auth');
//END OF SIDE FEATURES
