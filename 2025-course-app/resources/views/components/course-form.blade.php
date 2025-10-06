@props(['action', 'method'])


<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($method === 'PUT' || $method === 'PATCH')
            @method($method)
        @endif

    <div class="mb-4">
        <label for="courseCode" class="block text-sm text-gray-700">Course Code</label>
        <input type="text" name="courseCode" id="courseCode" value="{{ old('courseCode', $course->courseCode ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

        @error('courseCode')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="title" class="block text-sm text-gray-700">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $course->title ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

        @error('title')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm text-gray-700">Description</label>
        <input type="text" name="description" id="description" value="{{ old('description', $course->description ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

        @error('description')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="points" class="block text-sm text-gray-700">Required Points</label>
        <input type="text" name="points" id="points" value="{{ old('points', $course->points ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

        @error('points')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="years" class="block text-sm text-gray-700">Duration in years</label>
        <input type="text" name="years" id="years" value="{{ old('years', $course->years ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

        @error('years')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Course Cover Image</label>
        <input type="file" name="image" id="image" {{ isset($course) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @isset($course->image)
        <div class="mb-4">
            <img src="{{ asset($course->image) }}" alt="course cover" class="w-24 h-32 object-cover">
        </div>
    @endisset

    <div>
        <x-primary-button>
            {{ isset($course) ? 'Update course' : 'Add course' }}
        </x-primary-button>
    </div>
</form>
