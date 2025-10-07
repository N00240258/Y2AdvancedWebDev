@props(['title', 'courseCode', 'description', 'points', 'years', 'image' ])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto">


    <div class="overflow-hidden rounded-lg mb-4 flex justify-center">
        <img src="{{ asset('images/courses/' . $image)}}" alt="{{ $title }}" class="w-full max-w-xs h-auto object-fill">
    </div>

    <h1 class="font-bold text-black-600 mb-2" style="font-size: 2em;">{{ $title }}</h1>

    <h2 class="text-gray-600 text-sm italic mb-2" style="font-size: 1.2rem">
        Course Code: {{ $courseCode }}
    </h2>
    <h2 class="text-gray-600 text-sm italic mb-2" style="font-size: 1.2rem">
        Required Points: {{ $points }}
    </h2>
    <h2 class="text-gray-600 text-sm italic mb-4" style="font-size: 1.2rem">
        Duration: {{ $years }} year(s)
    </h2>

    <h2 class="text-gray-500 text-sm italic mb-4" style="font-size: 1rem">
        {{$description}}
    </h2>
</div>
