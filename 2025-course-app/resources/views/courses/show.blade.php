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
                    <h3 class="font-semibold text-lg mb-4">Course Details</h3>
                    <x-course-details
                        :title="$course->title"
                        :image="$course->image"
                        :description="$course->description"
                        :points="$course->points"
                        :years="$course->years"
                        :courseCode="$course->courseCode"
                    />

                    {{-- Student List --}}
                    <div class="py-6 max-w-xl mx-auto">
                        <div class="flex justify-between">
                            <h3 class="font-semibold text-xl text-m1 mt-3">Students List</h3>

                            <a href="{{route('students.create', $course)}}" class="text-white bg-purple-400 hover:bg-purple-500 font-bold py-2 px-4 rounded">
                                Enroll
                            </a>
                            {{-- @if(auth()->user()->role === "admin")
                                <a href="{{route('students.create', $course)}}" class="text-white bg-purple-400 hover:bg-purple-500 font-bold py-2 px-4 rounded">
                                    Enroll
                                </a>
                            @else
                                @foreach($students as $student)
                                    @if(auth()->user()->email === $student->student_email)
                                        @continue
                                    @elseif(auth()->user()->email !== $student->student_email)
                                        <a href="{{route('students.create', $course)}}" class="text-white bg-purple-400 hover:bg-purple-500 font-bold py-2 px-4 rounded">
                                            Enroll
                                        </a>
                                        @break

                                    @endif


                                    @break;
                                @endforeach
                            @endif --}}
                        </div>

                        @if($course->students->isEmpty())
                            <p class="text-gray-600">No students yet.</p>
                        @else
                            {{-- Shows your student account at the top of the list if you have one --}}
                            <ul class="mt-4 space-y-4">
                                @if(auth()->user()->role === "user")
                                    @foreach($course->students as $student)
                                    {{-- Finds a student account with the users email and shows its info --}}
                                        @if(auth()->user()->email === $student->student_email)
                                        <li class="bg-gray-100 p-4 rounded-lg flex justify-between">
                                            <div>
                                                <div class="flex space-x-4 items-baseline">
                                                    <p class="font-black text-lg">{{ $student->student_name}}</p>
                                                    <p class="text-gray-600">{{ $student->student_email}}</p>
                                                </div>
                                                <div class="flex space-x-1">
                                                <p>Year:<p class="font-bold">{{$student->year}}</p></p>
                                                </div>
                                            </div>

                                            @if(auth()->user()->email === $student->student_email || auth()->user()->role === "admin")
                                                <div class="flex space-x-4 items-center">
                                                    <a href="{{route('students.edit', $student, $course)}}" class="text-white bg-yellow-400 hover:bg-yellow-500 font-bold py-2 px-4 rounded">
                                                        Edit
                                                    </a>

                                                    <form action="{{route('students.destroy', $student, $course)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-white bg-red-600 hover:bg-red-700 font-bold py-2 px-4 rounded">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        </li>
                                        @endif
                                    @endforeach

                                {{-- Other Students --}}
                                <p class="font-semibold text-m1 mt-3 pt-4">Other Students</p>
                                @endif

                                @foreach($course->students as $student)
                                    @if(auth()->user()->email !== $student->student_email || auth()->user()->role === 'admin')
                                    <li class="bg-gray-100 p-4 rounded-lg flex justify-between">
                                        <div>
                                            <div class="flex space-x-4 items-baseline">
                                                <p class="font-black text-lg">{{ $student->student_name}}</p>
                                                <p class="text-gray-600">{{ $student->student_email}}</p>
                                            </div>
                                            <div class="flex space-x-1">
                                            <p>Year:<p class="font-bold">{{$student->year}}</p></p>
                                            </div>
                                        </div>


                                        @if(auth()->user()->email === $student->student_email || auth()->user()->role === "admin")
                                            <div class="flex space-x-4 items-center">
                                                <a href="{{route('students.edit', $student)}}" class="text-white bg-yellow-400 hover:bg-yellow-500 font-bold py-2 px-4 rounded">
                                                    Edit
                                                </a>

                                                <form action="{{route('students.destroy', $student)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-white bg-red-600 hover:bg-red-700 font-bold py-2 px-4 rounded">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
