<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('products', ProductController::class)->only('index');

Route::resource('employees', EmployeeController::class);

Route::get('/archived_employees', [App\Http\Controllers\ArchivedEmployeesController::class, 'index'])
    ->name('archived_employees.index');

Route::post('/archived_employees/{id}/restore', [App\Http\Controllers\ArchivedEmployeesController::class, 'restore'])
    ->name('archived_employees.restore');

Route::post('/archived_employees/{id}/forceDelete', [App\Http\Controllers\ArchivedEmployeesController::class, 'forceDelete'])
    ->name('archived_employees.forceDelete');