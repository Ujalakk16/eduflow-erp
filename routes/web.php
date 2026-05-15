<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\DepartmentController;

Route::get('/', function () {
    return view('welcome');
});

// Auth and Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin Protected Routes
// Sab ke liye
Route::resource('students', StudentController::class)->only(['index', 'show']);

// Sirf Admin ke liye
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('students', StudentController::class)->except(['index', 'show']);
});
 // 1. Create wala route hamesha ID {teacher} se upar hona chahiye
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::post('teachers', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::put('teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
    Route::delete('teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
});

// 2. Index aur Show routes ko niche rakhein
Route::middleware(['auth'])->group(function () {
    Route::get('teachers', [TeacherController::class, 'index'])->name('teachers.index');
    
    // Is line ko sab se niche rakhein
    Route::get('teachers/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
});


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/admins', [UserController::class, 'adminsIndex'])->name('admins.index');
// web.php mein 'admin' ko 'admins' kar dein
Route::get('/admins/users/{user}', [UserController::class, 'show'])->name('users.show');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::get('/attendance/report', [AttendanceController::class, 'report'])->name('attendance.report');
});


Route::get('/fees', [FeeController::class, 'index'])->name('fees.index');
Route::post('/fees', [FeeController::class, 'store'])->name('fees.store');
Route::get('/fees/receipt/{id}', [FeeController::class, 'receipt'])->name('fees.receipt');



// Faculty Routes
Route::resource('faculties', FacultyController::class);

// Department Routes
Route::resource('departments', DepartmentController::class);