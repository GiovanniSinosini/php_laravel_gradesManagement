<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UsersController;
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

Route::post('painel', [UsersController::class, 'login'])->name('users.login');
Route::get('painel', [UsersController::class, 'logout'])->name('users.logout');

Route::get('courses/', [CourseController::class, 'index'])->name('courses.index'); //show all courses
Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create'); //create form 
Route::post('courses/', [CourseController::class, 'insert'])->name('courses.insert'); //database register
Route::get('courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');  //redit form
Route::put('courses/{course}', [CourseController::class, 'save'])->name('courses.save'); //update database


Route::get('courses/{course}/delete', [CourseController::class, 'modal'])->name('courses.modal'); //select course to delete
Route::delete('courses/{course}', [CourseController::class, 'delete'])->name('courses.delete'); //select course to delete


Route::get('grades/', [GradeController::class, 'index'])->name('grades.index'); 
Route::get('grades/create', [GradeController::class, 'create'])->name('grades.create');  
Route::post('grades/', [GradeController::class, 'insert'])->name('grades.insert'); 
Route::get('grades/{grade}/edit', [GradeController::class, 'edit'])->name('grades.edit');  
Route::put('grades/{grade}', [GradeController::class, 'save'])->name('grades.save'); 

Route::delete('grades/{grade}', [GradeController::class, 'delete'])->name('grades.delete'); 
Route::get('grades/{grade}/delete', [GradeController::class, 'modal'])->name('grades.modal'); 


Route::get('students/', [StudentController::class, 'index'])->name('students.index'); //show all courses
Route::get('students/create', [StudentController::class, 'create'])->name('students.create'); //create form
Route::post('students', [StudentController::class, 'insert'])->name('students.insert'); //database register 
Route::get('students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');  //redit form
Route::put('students/{student}', [StudentController::class, 'save'])->name('students.save'); //update database
Route::get('students/{student}/delete', [StudentController::class, 'remove'])->name('students.remove'); //select course to delete
Route::delete('students/{student}', [StudentController::class, 'delete'])->name('students.delete'); //remove form database
Route::get('students/{student}/delete', [StudentController::class, 'modal'])->name('students.modal'); //select course to delete

Route::get('teachers/', [TeacherController::class, 'index'])->name('teachers.index'); //show all courses
Route::get('teachers/create', [TeacherController::class, 'create'])->name('teachers.create'); //create form 
Route::post('teachers', [TeacherController::class, 'insert'])->name('teachers.insert'); //database register
Route::get('teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');  //redit form
Route::put('teachers/{teacher}', [TeacherControllerController::class, 'save'])->name('teachers.save'); //update database
Route::get('teacher/{teacher}/delete', [TeacherControllerController::class, 'remove'])->name('teachers.remove'); //select course to delete
Route::delete('teachers/{teacher}', [TeacherController::class, 'delete'])->name('teachers.delete'); //remove form database
Route::get('teachers/{teacher}/delete', [TeacherController::class, 'modal'])->name('teachers.modal'); //select course to delete







