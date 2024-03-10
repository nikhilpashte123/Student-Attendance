<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Attendance;


class AttendanceController extends Controller
{
    public function markAttendanceForm()
    {
        $students = Student::all();
        return view('attendances.mark', compact('students'));
    }

    public function markAttendance(Request $request)
{
    $request->validate([
        'attendance_date' => 'required|date',
        'attendance' => 'required|array',
    ]);

    $attendanceDate = $request->input('attendance_date');
    $attendanceData = $request->input('attendance');

    foreach ($attendanceData as $studentId => $status) {
        Attendance::create([
            'student_id' => $studentId,
            'status' => $status,
            'attendance_date' => $attendanceDate,
        ]);
    }

    return redirect()->route('attendance.index')->with('success', 'Attendance marked successfully.');
}


    public function datewiseReportForm()
    {
        return view('attendances.reports');
    }

    public function datewiseReport(Request $request)
    {
        $date = $request->input('date');
        $attendances = Attendance::where('attendance_date', $date)->get();

        return view('attendances.reports', compact('attendances', 'date'));
    }

    public function editAttendanceForm(Request $request)
    {

        $students = Student::all();
        return view('attendances.edit', compact('students'));
    }

    public function editAttendance(Request $request)
    {
        $date = $request->input('attendance_date', now()->format('Y-m-d'));
        $attendances = Attendance::where('attendance_date', $date)->get();
        $students = Student::all();

        return view('attendances.edit', compact('attendances','students', 'attendance_date'));
    }

    public function updateAttendance(Request $request)
    {
        $date = $request->input('attendance_date', now()->format('Y-m-d'));
        $attendanceData = $request->input('attendance');

        foreach ($attendanceData as $studentId => $status) {
            Attendance::where([
                'student_id' => $studentId,
                'attendance_date' => $date,
            ])->update(['status' => $status]);
        }

        return redirect()->route('attendance.update', ['attendance_date' => $date])->with('success', 'Attendance updated successfully.');
    }

    public function index()
    {
        $attendances = Attendance::all();
        return view('attendances.index', compact('attendances'));
    }

}