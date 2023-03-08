<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\CourseController;
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

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/{course_id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{course_id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{course_id}', [CourseController::class, 'destroy'])->name('courses.destroy');

Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');
Route::get('/classes/create', [ClassController::class, 'create'])->name('classes.create');
Route::post('/classes', [ClassController::class, 'store'])->name('classes.store');
Route::get('/classes/{course_id}/edit', [ClassController::class, 'edit'])->name('classes.edit');
Route::put('/classes/{course_id}', [ClassController::class, 'update'])->name('classes.update');
Route::delete('/classes/{course_id}', [ClassController::class, 'destroy'])->name('classes.destroy');