<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::insert([
            [
                'course_id' => '1',
                'student_name' => 'qwer',
                'student_email' => 'Admin@gmail.com',
                'age' => '45',
                'year' => '2',
                'average_grade' => '3.2'
            ],
            ['course_id' => '1','student_name' => 'Testersssss','student_email' => 'Admin@gmail.com','age' => '41','year' => '2','average_grade' => '3.2'],
            ['course_id' => '2','student_name' => 'euafoafayfoya','student_email' => 'Admin@gmail.com','age' => '45','year' => '1','average_grade' => '3.2'],
            ['course_id' => '1','student_name' => 'dasdadadsadsadadsa','student_email' => 'user@gmail.com','age' => '23','year' => '1','average_grade' => '2.5'],
            ['course_id' => '1','student_name' => 'aoagafoiuhfra','student_email' => 'admin@gmail.com','age' => '45','year' => '1','average_grade' => '2.5']
        ]);
    }
}
