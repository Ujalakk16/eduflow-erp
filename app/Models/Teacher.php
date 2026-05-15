<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    // 1. Fillable mein 'course_id' hona chahiye agar hum relationship use kar rahe hain
    protected $fillable = ['name', 'email', 'phone', 'course_id'];

    /**
     * Relationship: Teacher belongs to a Course.
     * Iske liye teachers table mein 'course_id' column hona zaroori hai.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Relationship: Students jo is teacher ke course mein hain.
     * Teacher -> Course -> Students
     */
    public function students()
    {
        // hasManyThrough(Target, Intermediate)
        return $this->hasManyThrough(
            Student::class, 
            Course::class,
            'id',          // Foreign key on courses table (Course ID)
            'course_id',   // Foreign key on students table
            'course_id',   // Local key on teachers table
            'id'           // Local key on courses table
        );
    }
}