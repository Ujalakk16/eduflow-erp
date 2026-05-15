<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // Teacher add karne ka form dikhane ke liye

// app/Http/Controllers/TeacherController.php

public function index() {
    // Agar Step 1 wala relation set hai toh ye line error nahi degi
    $teachers = Teacher::with('course')->withCount('students')->get();
    return view('teachers.index', compact('teachers'));
}
  public function create() {

    return view('teachers.create'); 
}
    // Data database mein save karne ke liye
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:teachers',
            'course_name' => 'required',
        ]);

        Teacher::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Teacher added successfully!');
    }

    public function edit(Teacher $teacher)
{
    return view('teachers.edit', compact('teacher'));
}
//  Update Logic
public function update(Request $request, Teacher $teacher)
{
    $request->validate([
        'name' => 'required',
        'course_name' => 'required',
    ]);

    $teacher->update($request->all());

    return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully!');
}
//Delete Logic
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully!');
    }

}