<?php

use App\Models\Course;
$courses = Course::orderBy('title')->get();

?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Course')}}
        </h2>
    </x-slot>
    <x-alert-success>
        {{session('success')}}
    </x-alert-success>
    <x-alert-error>
        {{session('error')}}
    </x-alert-error>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Tutor Details</h3>
                    <x-tutor-details
                        :tutor_name="$tutor->tutor_name"
                        :tutor_email="$tutor->tutor_email"
                        :age="$tutor->age"
                        :years_of_experience="$tutor->years_of_experience"
                    />

                    <div class="py-6 max-w-xl mx-auto">
                        <ul class="mt-4 space-x-4">
                            @foreach ($tutor->courses as $course)
                                <a href="{{route("courses.show", $course) }}">
                                    <li class="bg-gray-100 p-4 rounded-lg">
                                        <div class="flex space-x-4 items-center">
                                            <img class="aspect-square object-cover overflow-hidden" style="width: 20%" src="{{asset( "images/courses/" . $course->image )}}" alt="{{$course->title}}">

                                            <div class="">
                                                <p class="font-black" style="font-size: 1.5rem">{{ $course->title}}</p>
                                                <p class="font-grey">Students: {{count($course->students)}}</p>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
