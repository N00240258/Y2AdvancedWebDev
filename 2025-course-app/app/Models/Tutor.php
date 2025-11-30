<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'tutor_name',
        'tutor_email',
        'age',
        'years_of_experience'
    ];

    // links this table back to the courses table and the pivot table inbetween
    public function courses(){
        return $this->belongsToMany(Course::class);
    }
}

