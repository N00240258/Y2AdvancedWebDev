@props(['title', 'image'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h3 style="font-size: 1.5rem;">{{ $title }}</h3>
    <img src="{{asset( "images/courses/" . $image )}}" alt="{{ $title }}" class="w-auto mt-4 rounded-lg object-cover overflow-hidden" style="height:280px">
</div>
