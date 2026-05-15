<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = ['student_id', 'amount', 'month', 'year', 'status', 'payment_date'];

    // YEH LINE ADD KAREIN
    protected $casts = [
        'payment_date' => 'date',
    ];

    public function student() {
        return $this->belongsTo(Student::class);
    }
}
