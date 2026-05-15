<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Ek course mein bohot saare students ho sakte hain
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // Ek course ko parhane wala (Teacher)
    public function teacher()
    {
        return $this->hasOne(Teacher::class); 
    }
}