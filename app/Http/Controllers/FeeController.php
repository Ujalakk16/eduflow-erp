<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;

class FeeController extends Controller
{
    public function index()
{
    $students = \App\Models\Student::with('fees')->get();
    return view('fees.index', compact('students'));
}

public function store(Request $request)
{
    $request->validate([
        'student_id' => 'required',
        'amount' => 'required|numeric',
        'month' => 'required',
    ]);

    Fee::create([
        'student_id' => $request->student_id,
        'amount' => $request->amount,
        'month' => $request->month,
        'year' => date('Y'),
        'status' => 'paid',
        'payment_date' => now(),
    ]);

    return redirect()->back()->with('success', 'Fee payment recorded!');
}
public function receipt($id)
{
    $fee = Fee::with('student')->findOrFail($id);
    return view('fees.receipt', compact('fee'));
}
    //
}
