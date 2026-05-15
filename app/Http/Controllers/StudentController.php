<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $query = Student::query();

    // 🔍 Search (name or email)
    if ($request->search) {
        $query->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%');
    }

    // 🎯 Filter (course)
    if ($request->course) {
        $query->where('course', $request->course);
    }

    // 📄 Pagination
    $students = $query->paginate(20);

    return view('students.index', compact('students'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    // Saare departments uthayein taake dropdown mein nazar aayein
    $departments = \App\Models\Department::all();
    return view('students.create', compact('departments'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'course' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'course' => $request->course,
            'image' => $imagePath,
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Student Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'course' => 'required',
            'image' => 'nullable|image',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'course']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        $student->update($data);

        return redirect()->route('students.index')
            ->with('success', 'Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student Deleted Successfully');
    }
}
