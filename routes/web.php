<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
// Department
Route::get('departments', [MasterController::class, 'Departments'])->name('departments')->middleware('is_admin');
Route::post('store_department', [MasterController::class, 'store_department'])->name('store_department')->middleware('is_admin');
Route::post('deleteDepartment', [MasterController::class, 'deleteDepartment'])->name('deleteDepartment')->middleware('is_admin');
// Designation
Route::get('designation', [MasterController::class, 'Designation'])->name('designation')->middleware('is_admin');
Route::post('store_designation', [MasterController::class, 'store_designation'])->name('store_designation')->middleware('is_admin');
Route::post('deleteDesignation', [MasterController::class, 'deleteDesignation'])->name('deleteDesignation')->middleware('is_admin');
//Emplpoyee
Route::get('employee', [EmployeeController::class, 'Employee'])->name('employee')->middleware('is_admin');
Route::post('storeEmployee', [EmployeeController::class, 'storeEmployee'])->name('storeEmployee')->middleware('is_admin');
Route::post('deleteEmployee', [EmployeeController::class, 'deleteEmployee'])->name('deleteEmployee')->middleware('is_admin');

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

