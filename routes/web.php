<?php

use App\Http\Controllers\EmployeeController;
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


Route::group(['prefix' => '/employee'], function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/create', [EmployeeController::class, 'create']);
    Route::post('/store', [EmployeeController::class, 'store']);
    Route::get('/edit/{id}', [EmployeeController::class, 'edit']);
    Route::post('/update/{id}', [EmployeeController::class, 'update']);
    Route::get('/delete/{id}', [EmployeeController::class, 'destroy']);
});