<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;
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

Route::get('/', function () {
    return redirect()->route('students.index');
});

// Show the list of students
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
// Show the form to create a new student
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
// Store a new student
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
// Show a specific student
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
// Show the form to edit a specific student
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
// Update a specific student
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
// Delete a specific student
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');



Route::get('attendences/index', [AttendanceController::class, 'index'])->name('attendance.index');

Route::get('attendances', [AttendanceController::class, 'markAttendanceForm'])->name('markAttendance.form');
Route::post('attendances', [AttendanceController::class, 'markAttendance'])->name('markAttendance');

Route::get('attendances/datewise-report', [AttendanceController::class, 'datewiseReportForm'])->name('attendance.datewise.report.form');
Route::post('attendances/datewise-report', [AttendanceController::class, 'datewiseReport'])->name('attendance.datewise.report');

Route::get('attendances/edit', [AttendanceController::class, 'editAttendanceForm'])->name('attendance.edit.form');
Route::post('attendances/edit', [AttendanceController::class, 'editAttendance'])->name('attendance.edit');
Route::put('attendances/{attendance_date}/update', [AttendanceController::class, 'updateAttendance'])->name('attendance.update');

