<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 1. Saare Users dikhane ke liye (Admin + Others)
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    // 2. Admins wala function bhi sahi kar dete hain 
    // Agar aap chahti hain ke yahan bhi sab nazar aayein, toh filter hata dein
    public function adminsIndex() 
    {
        // Yahan se ->where('role', 'admin') hata diya hai takay saare 3 users nazar aayein
        $users = User::latest()->paginate(10); 
        return view('admin.users.index', compact('users'));
    }
// app/Http/Controllers/UserController.php

public function show($id) 
{
    // User dhoondo, agar nahi milta toh 404 error do
    $user = User::findOrFail($id);
    
    // View ka path wahi rakhein jo aapne banaya hai
    return view('admin.users.show', compact('user'));
}
}