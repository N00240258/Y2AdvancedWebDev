@props(['action', 'method', 'student', 'course'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($method === 'PUT' || $method === 'PATCH')
            @method($method)
        @endif

    <div class="mb-4">
        <label for="student_name" class="block text-sm text-gray-700">Name</label>
        <input type="text" name="student_name" id="student_name" placeholder="Enter name..."value="{{ old('student_name', $student->student_name ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

        @error('student_name')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- when the user goes to enroll as a student it will set the email field to be there current email used when logging in this is used for verification when entering the edit for or reentering the creation form --}}

        <div class="mb-4">
            <label for="student_email" class="block text-sm text-gray-700">Email</label>
            {{-- if the current users role is not an admin it will lock the email field to stop the user from changing the email but if the user is an avmin --}}

            @if(auth()->user()->role === 'admin')
                <input type="text" name="student_email" id="student_email" value="{{ old('student_email', $student->student_email ?? auth()->user()->email) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-s"/>
            @else
                <input type="text" name="student_email" id="student_email" value="{{ old('student_email', $student->student_email ?? auth()->user()->email) }}" readonly required class="mt-1 block w-full border-gray-200 rounded-md shadow-sm text-gray-500 cursor-not-allowed" />
            @endif

            @error('student_email')
            <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


    <div class="mb-4">
        <label for="age" class="block text-sm text-gray-700">Age</label>
        <input type="text" name="age" id="age" value="{{ old('age', $student->age ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

        @error('age')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="year" class="block text-sm text-gray-700">Year</label>
        <input type="text" name="year" id="year" value="{{ old('year', $student->year ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

        @error('year')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="average_grade" class="block text-sm text-gray-700">Average grade</label>
        <input type="text" name="average_grade" id="average_grade" value="{{ old('average_grade', $student->average_grade ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

        @error('average_grade')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <x-primary-button>
            {{ isset($student) ? 'Update student' : 'Enroll' }}
        </x-primary-button>
    </div>

</form>
