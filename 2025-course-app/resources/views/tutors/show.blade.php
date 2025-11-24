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
                        <h3 class="font-semibold text-xl text-m1 mt-3">Course List</h3>

                        @if($tutor->courses->isEmpty())
                            <p class="text-gray-600">Not tutoring any course.</p>
                        @else
                            <ul class="mt-4 space-x-4">
                                @foreach ($tutor->courses as $course)
                                    <a href="{{route("courses.show", $course) }}">
                                        <li class="bg-gray-100 p-4 rounded-lg">
                                            <div class="flex space-x-4 items-center">
                                                <img class="aspect-square object-cover overflow-hidden rounded-md" style="width: 25%" src="{{asset( "images/courses/" . $course->image )}}" alt="{{$course->title}}">

                                                <div class="">
                                                    <p class="font-black text-xl">{{ $course->title}}</p>
                                                    <p class="font-grey text-lg">Students: {{count($course->students)}}</p>
                                                </div>
                                            </div>
                                        </li>
                                    </a>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
