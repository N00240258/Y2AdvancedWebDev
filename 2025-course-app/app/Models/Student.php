<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    use HasFactory;

    protected $fillable = [
        'course_id',
        'student_name',
        'student_email',
        'age',
        'year',
        'average_grade'
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
