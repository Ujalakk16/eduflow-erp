<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Yeh line honi chahiye
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory; // Yeh line add karein

    protected $fillable = ['name', 'code'];

    // Relationship with Departments
    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}