<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Course')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Course Details</h3>
                    <x-course-details
                        :title="$course->title"
                        :image="$course->image"
                        :description="$course->description"
                        :points="$course->points"
                        :years="$course->years"
                        :courseCode="$course->courseCode"
                    />

                    <a href="{{route('students.create', $course)}}" class="text-white bg-purple-400 hover:bg-purple-500 font-bold py-2 px-4 rounded">
                        Enroll
                    </a>

                    <h4 class="font-sembold text-m1 mt-3">Students</h4>
                    @if($course->students->isEmpty())
                        <p class="text-gray-600">No students yet.</p>
                    @else
                        <ul class="mt-4 space-y-4">
                            @foreach($course->students as $student)
                                <li class="bg-gray-100 p-4 rounded-lg">
                                    <p class="font-semibold">{{ $student->student_name}}</p>
                                    <p>{{ $student->year}}</p>
                                    <p>{{ $student->student_email}}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
