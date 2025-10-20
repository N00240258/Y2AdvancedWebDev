<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Create new course')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Add a new course</h3>
                    {{-- calls the course form which stores the course and the method tells the code if we are editing or creating a course --}}
                    <x-course-form
                        :action="route('courses.store')"
                        :method="'POST'"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
