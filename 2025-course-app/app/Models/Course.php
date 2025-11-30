<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model{
    use HasFactory;

    // all the columns in the datavase that can be updated
    protected $fillable = [
        'courseCode',
        'title',
        'description',
        'points',
        'years',
        'image'
    ];

    // when migrating it will link this table to the student table with a one to many connection because you can have one course with many students
    public function students(){
        return $this->hasMany(Student::class);
    }

    // when migrating it will link this table to the tutors table and because it is using "belongsToMany" it will join them using a pivot table because you can have many tutors on many courses
    public function tutors(){
        return $this->belongsToMany(Tutor::class);
    }
}
