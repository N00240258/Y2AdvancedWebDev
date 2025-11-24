@props(['tutor_name', 'tutor_email', 'years_of_experience'])

<li class="bg-gray-100 p-4 rounded-lg">
    <div class="flex space-x-4 items-baseline">
        <p class="font-black text-lg">{{ $tutor_name }}</p>
        <p class="text-gray-600">{{ $tutor_email }}</p>
    </div>
    <div class="flex space-x-1">
        <p>Years of Experience:<p class="font-bold">{{$years_of_experience}}</p></p>
    </div>
</li>

