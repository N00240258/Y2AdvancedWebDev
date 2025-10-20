@props(['title', 'image'])

<div class="px-6 py-3 transition duration-300">
    <h3 style="font-size: 1.4rem;" class="font-medium">

        {{-- if the length of the title is over 24 characters it will cut it and put "..." at the end to prevent the titles being on multiple lines --}}
        @if(strlen($title)>24)
        {{substr($title, 0, 24)."..."}}
        @endif
        @if(strlen($title)<24)
        {{$title}}
        @endif
    </h3>
    <img src="{{asset( "images/courses/" . $image )}}" alt="{{ $title }}" class="w-auto mt-4 rounded-lg object-cover overflow-hidden" style="height:280px">
</div>
