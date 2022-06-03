<?php

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('courses', [App\Http\Controllers\CourseController::class, 'index'])->name('courses.index');
Route::get('courses/show/{id}', [App\Http\Controllers\CourseController::class, 'show'])->name('courses.show');
Route::get('courses/create', [App\Http\Controllers\CourseController::class, 'create'])->name('courses.create');
Route::post('courses/store', [App\Http\Controllers\CourseController::class, 'store'])->name('courses.store');
Route::get('courses/edit/{id}', [App\Http\Controllers\CourseController::class, 'edit'])->name('courses.edit');
Route::post('courses/update/{id}', [App\Http\Controllers\CourseController::class, 'update'])->name('courses.update');
Route::get('courses/destroy/{id}', [App\Http\Controllers\CourseController::class, 'destroy'])->name('courses.destroy');
Route::get('courses/export', [App\Http\Controllers\CourseController::class, 'exportCourses'])->name('courses.exportCourses');



Route::get('teachers', [App\Http\Controllers\TeacherController::class, 'index'])->name('teachers.index');
Route::get('teachers/show/{id}', [App\Http\Controllers\TeacherController::class, 'show'])->name('teachers.show');
Route::get('teachers/create', [App\Http\Controllers\TeacherController::class, 'create'])->name('teachers.create');
Route::post('teachers/store', [App\Http\Controllers\TeacherController::class, 'store'])->name('teachers.store');
Route::get('teachers/edit/{id}', [App\Http\Controllers\TeacherController::class, 'edit'])->name('teachers.edit');
Route::post('teachers/update/{id}', [App\Http\Controllers\TeacherController::class, 'update'])->name('teachers.update');
Route::get('teachers/destroy/{id}', [App\Http\Controllers\TeacherController::class, 'destroy'])->name('teachers.destroy');
Route::get('teachers/export', [App\Http\Controllers\TeacherController::class, 'exportTeachers'])->name('teachers.exportTeachers');


Route::get('grades', [App\Http\Controllers\GradeController::class, 'index'])->name('grades.index');
Route::get('grades/show/{id}', [App\Http\Controllers\GradeController::class, 'show'])->name('grades.show');
Route::get('grades/create', [App\Http\Controllers\GradeController::class, 'create'])->name('grades.create');
Route::post('grades/store', [App\Http\Controllers\GradeController::class, 'store'])->name('grades.store');
Route::get('grades/edit/{id}', [App\Http\Controllers\GradeController::class, 'edit'])->name('grades.edit');
Route::post('grades/update/{id}', [App\Http\Controllers\GradeController::class, 'update'])->name('grades.update');
Route::get('grades/destroy/{id}', [App\Http\Controllers\GradeController::class, 'destroy'])->name('grades.destroy');
Route::get('grades/export', [App\Http\Controllers\GradeController::class, 'exportGrades'])->name('grades.exportGrades');


// users
Route::get('my-grades', [App\Http\Controllers\GradeController::class, 'showGrades'])->name('my-grades.index');
Route::get('my-grades/printGradeSlip', [App\Http\Controllers\GradeController::class, 'printGradeSlip'])->name('my-grades.printGradeSlip');
