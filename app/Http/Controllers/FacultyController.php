<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    // Saari faculties dikhane ke liye
    public function index()
    {
        $faculties = Faculty::withCount('departments')->get();
        return view('faculties.index', compact('faculties'));
    }

    // Kisi ek faculty ke andar ke departments dikhane ke liye
    public function show(Faculty $faculty)
    {
        // Faculty ke saath uske saare departments load ho rahe hain
        $faculty->load('departments');
        return view('faculties.show', compact('faculty'));
    }

    // Nayi faculty add karne ka form
    public function create()
    {
        return view('faculties.create');
    }
}