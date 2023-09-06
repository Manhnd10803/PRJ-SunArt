<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
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

Route::get('/', [ClassController::class, 'index']);
Route::resource('/classes', ClassController::class);
Route::prefix('/students')->group(function(){
    Route::get('class/{class}/', [StudentController::class, 'index'])->name('students.index');
    Route::get('create', [StudentController::class, 'create'])->name('students.create');
    Route::post('store', [StudentController::class, 'store'])->name('students.store');
    Route::get('{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('{student}', [StudentController::class, 'destroy'])->name('students.destroy');
});