<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'faculty_id'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
    // app/Models/Department.php

public function students()
{
    // Ek department mein bohot saare students ho sakte hain
    return $this->hasMany(Student::class);
}
}