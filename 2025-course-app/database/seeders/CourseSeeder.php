<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CourseSeeder extends Seeder{
    public function run(): void{

        $currentTimestamp = Carbon::now();

        $courses = [
            [
                'courseCode' => "DL836",
                'title' => "Creative Computing",
                'description' => "Apply and develop your creativity in the thriving and dynamic area of computing. Gain the hands-on skills and knowledge to create solutions for today's fast-paced world. Learn core computing skills such as programming, app development and databases, while keeping a focus on the design of the technology interaction with the user.",
                'points' => "210",
                'years' => "4",
                'image' => "CreativeComputing.jpg",
                'tutors' => [5]
            ],
            [
                'courseCode' => "DL847",
                'title' => "3D Animation",
                'description' => "Do you want to create imaginary and realistic environments and characters and bring them to life? Learn to design, build and create digital worlds and tell the stories of tomorrow using advanced technologies.",
                'points' => "873",
                'years' => "4",
                'image' => "3DAnimation.jpg",
                'tutors' => [3, 2]
            ],
            [
                'courseCode' => "DL864",
                'title' => "Film Studies",
                'description' => "This Film Studies degree for people who want to think critically about film and write it – combining academic depth with practical creativity and opening a pathway to professional screenwriting.",
                'points' => "0",
                'years' => "3",
                'image' => "FilmStudies.jpg",
                'tutors' => [4]
            ],
            [
                'courseCode' => "DN150",
                'title' => "Electrical Engineering",
                'description' => "Electrical and Electronic Engineers have revolutionised the way we live today. As an electronic or electrical engineer, you can lead the way in designing technologies that will shape our world, using creative ways to generate and handle electricity and information. Electronic engineers have developed the technologies we use for communication, data analytics, eHealth, smart homes and vehicles, entertainment and many other things, including smartphones and the Internet. Electrical engineers are also developing new ways to solve the world's energy problems by harnessing renewable energy sources like wind and solar energy.",
                'points' => "577",
                'years' => "4",
                'image' => "ElectricalEngineering.jpg",
                'tutors' => [1]
            ],
            [
                'courseCode' => "DN410",
                'title' => "Radiography",
                'description' => "Radiographers are responsible for producing high-quality images to assist in the diagnosis and treatment of disease. While radiography is a caring profession, it's also one that requires considerable technological and scientific expertise in both the production of images and the responsible delivery of ionising radiation. If you're interested in science and you want to use your knowledge to care for people, Radiography at UCD may be a perfect fit for you.",
                'points' => "544",
                'years' => "4",
                'image' => "radiography.jpg",
                'tutors' => [1, 2, 3]
            ],
            [
                'courseCode' => "DN201",
                'title' => "Computer Science",
                'description' => "Do you ever wonder how Google, social media platforms, Stripe or computer games work? Would you like to develop the next generation of cutting-edge computing technologies? If you are a logical thinker who likes problem solving and you enjoy subjects like mathematics, a degree in Computer Science could well be for you.",
                'points' => "540",
                'years' => "4",
                'image' => "ComputerScience.jpg",
                'tutors' => [5]
            ],
            [
                'courseCode' => "NC009",
                'title' => "Business",
                'description' => "The BA (Honours) in Business is a modern, comprehensive and broad-based business degree, designed with modern businesses in mind and the requirement to produce graduates with relevant employability skills that also embrace broader societal needs in relation to sustainability and business ethics.",
                'points' => "300",
                'years' => "3",
                'image' => "NCIBusiness.jpg",
                'tutors' => [3]
            ],
            [
                'courseCode' => "NC010",
                'title' => "Psychology",
                'description' => "This degree offers a solid grounding in all the core areas of psychology including cognitive psychology, personality and individual differences, lifespan development, social psychology, research methods and biological psychology, as well as specialised topics such as workplace psychology and cyber-psychology.",
                'points' => "400",
                'years' => "3",
                'image' => "NCIPsychology.jpg",
                'tutors' => [4]
            ],
            [
                'courseCode' => "NC030",
                'title' => "Early Childhood Education and Care",
                'description' => "NCI's BA (Honours) in Early Childhood Education and Care provides a firm foundation in Early Childhood Education and Care (ECEC) to practice in a range of early childhood settings. During the course you will cover a range of subjects to gain a deep understanding of the holistic learning and development of babies and children from birth to six years of age. A specialised Education Play Lab at NCI provides opportunities for 'hands on' student learning. This is a full-time course delivered in the daytime.",
                'points' => "230",
                'years' => "4",
                'image' => "NCIEarlyChildhood.jpg",
                'tutors' => [4, 5]
            ]
        ];

        foreach($courses as $courseData){
            $tutors = $courseData['tutors'];
            unset($courseData['tutors']);

            $course = Course::create($courseData, ['created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp]);
            $course->tutors()->attach($tutors);
        }
    }
}
