<x-app-layour>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("All Courses")}}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4"> List of Courses:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols2 lg:grid-cols-3 gap-6">
                        @foreach($courses as $course)
                        <a href="{{route("courses.show", $course) }}">
                            <x-course-card
                                :title="$course->title"
                                :image="$course->image"
                            />
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layour>
