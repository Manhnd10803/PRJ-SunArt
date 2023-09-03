<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use App\Models\Classroom;
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


Route::resource('students', StudentController::class);

Route::get('/', [ClassController::class, 'index']);
Route::resource('/classes', ClassController::class);
