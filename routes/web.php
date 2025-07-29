<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;

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

Route::get('/', [AuthController::class, 'index']);
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
Route::put('/employee/{employee}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employee/{employee}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/department', [DepartmentController::class, 'index'])->name('department');
Route::post('/department', [DepartmentController::class, 'store'])->name('department.store');
Route::put('/department/{department}', [DepartmentController::class, 'update'])->name('department.update');
Route::delete('/department/{department}', [DepartmentController::class, 'destroy'])->name('department.destroy');

Route::get('/shift', [ShiftController::class, 'index'])->name('shift');
Route::post('/shift', [ShiftController::class, 'store'])->name('shift.store');
Route::put('/shift/{shift}', [ShiftController::class, 'update'])->name('shift.update');
Route::delete('/shift/{shift}', [ShiftController::class, 'destroy'])->name('shift.destroy');
