@props(['action', 'method', 'courses', 'course', 'tutor'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($method === 'PUT' || $method === 'PATCH')
            @method($method)
        @endif

    <div class="mb-4">
        <label for="tutor_name" class="block text-sm text-gray-700">Name</label>
        <input type="text" name="tutor_name" id="tutor_name" value="{{ old('tutor_name', $tutor->tutor_name ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

        @error('tutor_name')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="tutor_email" class="block text-sm text-gray-700">Email</label>
        <input type="text" name="tutor_email" id="tutor_email" value="{{ old('tutor_email', $tutor->tutor_email ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

        @error('tutor_email')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="age" class="block text-sm text-gray-700">Age</label>
        <input type="text" name="age" id="age" value="{{ old('age', $tutor->age ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

        @error('age')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="years_of_experience" class="block text-sm text-gray-700">Years of experience</label>
        <input type="text" name="years_of_experience" id="years_of_experience" value="{{ old('years_of_experience', $tutor->years_of_experience ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

        @error('years_of_experience')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="courses" class="block text-sm text-gray-700">Courses tutoring</label>
        <ul>
            @foreach ($courses as $course)
                <li class="flex gap-2">
                    <input
                    type="checkbox"
                    name="courses[]"
                    id="courses"
                    value="{{ old('courses', $course->id ?? '') }}"
                    {{ isset($tutor) && $tutor->courses->contains($course->id) ? 'checked' : '' }}
                    class="mt-1 block border-gray-300 rounded-md shadow-sm" />
                    {{$course->title}}
                </li>
            @endforeach
        </ul>

        @error('courses')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <x-primary-button>
            {{ isset($tutor) ? 'Update tutor' : 'Add tutor' }}
        </x-primary-button>
    </div>
</form>
