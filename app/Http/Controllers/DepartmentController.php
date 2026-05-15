<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
   public function index()
{
    // withCount('students') likhne se $dept->students_count ka variable khud ban jata hai
    $departments = Department::withCount('students')->get();
    
    return view('departments.index', compact('departments'));
}

    public function create()
    {
        return view('departments.create');
    }
    public function show(Department $department)
{
    // Department ke sath uske students ko load karein
    $department->load('students');
    return view('departments.show', compact('department'));
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments',
            'code' => 'required|unique:departments',
        ]);

        Department::create($request->all());
        return redirect()->route('departments.index')->with('success', 'Department created successfully!');
    }
}