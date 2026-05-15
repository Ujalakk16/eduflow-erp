<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    // 1. 'course' (string) ko hata kar 'course_id' add kiya gaya hai
protected $fillable = ['name', 'email', 'phone', 'image', 'department_id', 'course_id', 'teacher_id'];

    /**
     * Relationship: Student kis course mein hai.
     * Table mein 'course_id' column hona chahiye.
     */
    public function course() {
        return $this->belongsTo(Course::class);
    }

    // Student.php Model mein ye add karein

public function department()
{
    return $this->belongsTo(Department::class, 'department_id');
}

    /**
     * Relationship: Student ka teacher kaun hai?
     * Agar aap direct link nahi rakhna chahti, toh ye Course ke zariye milta hai.
     * Lekin agar student table mein 'teacher_id' hai, toh ye code sahi hai:
     */
    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function attendances() {
        return $this->hasMany(Attendance::class);
    }

    public function fees() {
        return $this->hasMany(Fee::class);
    }
}