@props(['tutor_name', 'tutor_email', 'age', 'years_of_experience', 'created_at' ])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto">

    <h1 class="font-bold text-black-600 mb-2" style="font-size: 2em;">{{ $tutor_name }}</h1>

    <h2 class="text-gray-600 text-sm italic mb-2" style="font-size: 1.2rem">
        Tutor Email: {{ $tutor_email }}
    </h2>
    <h2 class="text-gray-600 text-sm italic mb-2" style="font-size: 1.2rem">
        Age: {{ $age }}
    </h2>
    <h2 class="text-gray-600 text-sm italic mb-4" style="font-size: 1.2rem">
        Experience: {{ $years_of_experience }} year(s)
    </h2>
</div>
