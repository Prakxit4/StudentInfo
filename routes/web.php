<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SearchController;

// StudentClass routes
Route::get('/classes', [StudentClassController::class, 'index'])->name('student_classes.index');
Route::get('/classes/create', [StudentClassController::class, 'create'])->name('student_classes.create');
Route::post('/classes', [StudentClassController::class, 'store'])->name('student_classes.store');
Route::get('/classes/{student_class}/edit', [StudentClassController::class, 'edit'])->name('student_classes.edit');
Route::put('/classes/{student_class}', [StudentClassController::class, 'update'])->name('student_classes.update');
Route::delete('/classes/{student_class}', [StudentClassController::class, 'destroy'])->name('student_classes.destroy');

// Student routes
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

// Subject routes
Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');
Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
Route::put('/subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');
Route::get('/search', [SearchController::class, 'search'])->name('search');
