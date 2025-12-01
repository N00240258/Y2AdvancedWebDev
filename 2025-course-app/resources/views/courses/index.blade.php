<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("All Courses")}}
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
                    <div class="flex justify-between items-center pb-6">
                        <h3 style="font-size: 1.5rem" class="font-bold text-xl mb-4"> List of Courses:</h3>
                        <div class="flex space-x-4">

                            {{-- sort dropdown --}}
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button class="btn border border-slate-700 rounded-lg px-5 py-2.5 me-2 mb-2">
                                        <div class="flex space-x-2">
                                            <h3 >Sort</h3>
                                            <img style="width: 16px" src="{{ asset('images/svg/angle-down-solid.svg')}}" alt="">
                                        </div>
                                    </button>
                                </x-slot>

                                    {{-- clicking on this will reroute to courses.index with something attached to it. the CourseController controller will then check if or what is attached to it so then it knows what way to put the data into the course array--}}
                                    <a href="{{route('courses.index', 'namesAsc')}}">
                                        <x-dropdown-link class="flex items-center">
                                            <p>Name (A-Z)</p>
                                        </x-dropdown-link>
                                    </a>

                                    <a href="{{route('courses.index', 'namesDesc')}}">
                                        <x-dropdown-link class="flex items-center">
                                            <p>Name (Z-A)</p>
                                        </x-dropdown-link>
                                    </a>

                                    <a href="{{route('courses.index', 'pointsAsc')}}">
                                        <x-dropdown-link class="flex items-center">
                                            <p>Points (Low-High)</p>
                                        </x-dropdown-link>
                                    </a>

                                    <a href="{{route('courses.index', 'pointsDesc')}}">
                                        <x-dropdown-link class="flex items-center">
                                            <p>Points (High-Low)</p>
                                        </x-dropdown-link>
                                    </a>
                                </div>
                            </x-dropdown>

                            <form action="{{ route("courses.index")}}" method="GET">
                                <input name="search" placeholder="Search a course..." class="form-control w-100 rounded-lg" type="text">
                                <button class="btn bg-slate-700 hover:bg-slate-600 active:bg-slate-800 text-white rounded-lg px-5 py-2.5 me-2 mb-2">Search</button>
                            </form>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        {{-- if the sort dropdown has been used then it will load the courses in a different way --}}
                        @foreach($courses as $course)
                            <div class="border py-2 rounded-lg shadow-lg hover:bg-gray-200 hover:shadow-xl ">
                                {{-- links the course card/border to the show --}}
                                <a href="{{route("courses.show", $course) }}">
                                    {{-- calls the course card component and gets the course title and image to display on the index --}}
                                    <x-course-card :title="$course->title"  :image="$course->image"/>
                                </a>

                                {{-- checks if the current user is an admin to display the edit and delete buttons --}}
                                @if(auth()->user()->role === "admin")
                                    <div class="px-6 pb-3 flex justify-between ">
                                        {{-- link to the course edit form --}}
                                        <a href="{{route('courses.edit', $course)}}" class="text-white bg-yellow-400 hover:bg-yellow-500 font-bold py-2 px-4 rounded">
                                            Edit
                                        </a>

                                        {{-- delete button to delete a course which puts a confirmation pop up one the screen --}}
                                        <form action="{{route('courses.destroy', $course)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white bg-red-600 hover:bg-red-700 font-bold py-2 px-4 rounded">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
