<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Controller;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\EmployeeController;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/create-employee', [App\Http\Controllers\EmployeeController::class, 'create_employee'])->name('create.employee');
Route::post('/create-employee', [App\Http\Controllers\EmployeeController::class, 'store_employee'])->name('store.employee');
Route::get('/employee-list', [App\Http\Controllers\EmployeeController::class, 'employee_list'])->name('employee.list');
Route::get('/employee/{id}', [App\Http\Controllers\EmployeeController::class, 'employee_edit'])->name('employee.edit');
Route::put('/employee/{id}', [App\Http\Controllers\EmployeeController::class, 'employee_update'])->name('employee.update');
Route::delete('/employee/{id}', [App\Http\Controllers\EmployeeController::class, 'employee_delete'])->name('employee.delete');
