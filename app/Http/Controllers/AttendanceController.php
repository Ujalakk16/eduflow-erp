<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // 1. Attendance marking page dikhane ke liye
// app/Http/Controllers/AttendanceController.php

public function index(Request $request)
{
    // 1. Date pakrein (taake purani attendance bhi dekh saken)
    $date = $request->input('date', date('Y-m-d'));
    $students = Student::all();
    return view('attendance.index', compact('students', 'date'));
}
    // 2. Attendance save karne ke liye
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'status' => 'required|array', // Status ek array hoga (student_id => status)
        ]);

        foreach ($request->status as $studentId => $status) {
            // Agar pehle se is date ki attendance hai toh update karo, warna nayi banao
            Attendance::updateOrCreate(
                [
                    'student_id' => $studentId,
                    'attendance_date' => $request->date,
                ],
                [
                    'status' => $status,
                ]
            );
        }

        return redirect()->back()->with('success', 'Attendance marked successfully!');
    }
public function report(Request $request)
{
    // Agar month select nahi kiya toh aaj ka month le lo
    $month = $request->input('month', date('n')); // 'n' returns 1 to 12
    $year = date('Y'); 

    // Query ko debug karne ke liye simple rakhte hain
    $students = Student::withCount([
        'attendances as presents_count' => function ($query) use ($month, $year) {
            $query->whereMonth('attendance_date', $month)
                  ->whereYear('attendance_date', $year)
                  ->where('status', 'present');
        },
        'attendances as absents_count' => function ($query) use ($month, $year) {
            $query->whereMonth('attendance_date', $month)
                  ->whereYear('attendance_date', $year)
                  ->where('status', 'absent');
        }
    ])->get();

    return view('attendance.report', compact('students', 'month', 'year'));
}
}