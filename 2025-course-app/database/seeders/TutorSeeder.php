<?php

namespace Database\Seeders;

use App\Models\Tutor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tutor::insert([
            [
                'tutor_name' => 'Jackie Chan',
                'tutor_email' => 'jackie@gmail.com',
                'age' => '71',
                'years_of_experience' => '2'
            ],
            [
                'tutor_name' => 'Bob Babbage',
                'tutor_email' => 'bobbybab@gmail.com',
                'age' => '42',
                'years_of_experience' => '12'
            ],
            [
                'tutor_name' => 'Timmy Tom',
                'tutor_email' => 'timtom@yahoo.com',
                'age' => '37',
                'years_of_experience' => '5'
            ],
            [
                'tutor_name' => 'Jor Jor-Well',
                'tutor_email' => 'jorjorbinks@hotmail.com',
                'age' => '67',
                'years_of_experience' => '6'
            ],
            [
                'tutor_name' => 'John Montayne',
                'tutor_email' => 'montayne@gmail.com',
                'age' => '43',
                'years_of_experience' => '10'
            ],
        ]);
    }
}


            // [
            //     'tutor_name' => '',
            //     'tutor_email' => '',
            //     'age' => '',
            //     'years_of_experience' => ''
            // ],
