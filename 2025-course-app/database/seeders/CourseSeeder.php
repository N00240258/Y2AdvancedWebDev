<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder{
    public function run(): void{
        Course::insert([
            [
                'courseCode' => "DL836",
                'title' => "Creative Computing",
                'description' => "Apply and develop your creativity in the thriving and dynamic area of computing. Gain the hands-on skills and knowledge to create solutions for today’s fast-paced world. Learn core computing skills such as programming, app development and databases, while keeping a focus on the design of the technology interaction with the user.",
                'points' => "210",
                'years' => "4",
                'image' => "CreativeComputing.jpg"
            ],
            [
                'courseCode' => "DL847",
                'title' => "3D Animation",
                'description' => "Do you want to create imaginary and realistic environments and characters and bring them to life? Learn to design, build and create digital worlds and tell the stories of tomorrow using advanced technologies.",
                'points' => "873",
                'years' => "4",
                'image' => "3DAnimation.jpg"
            ],
            [
                'courseCode' => "DL864",
                'title' => "Film Studies",
                'description' => "This Film Studies degree for people who want to think critically about film and write it – combining academic depth with practical creativity and opening a pathway to professional screenwriting.",
                'points' => "0",
                'years' => "3",
                'image' => "FilmStudies.jpg"
            ]
        ]);
    }
}
