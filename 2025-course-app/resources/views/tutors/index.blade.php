<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("All Tutors")}}
        </h2>

    </x-slot>
    <x-alert-success>
        {{session('success')}}
    </x-alert-success>
    <x-alert-error>
        {{session('error')}}
    </x-alert-error>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center pb-6">
                        <h3 style="font-size: 1.5rem" class="font-bold text-xl mb-4"> List of Tutors:</h3>
                        <div>
                            <form action="{{ route("tutors.index")}}" method="GET">
                                <input name="search" placeholder="Search a tutor..." class="form-control w-100 rounded-lg" type="text">
                                <button class="btn bg-slate-700 hover:bg-slate-600 active:bg-slate-800 text-white rounded-lg px-5 py-2.5 me-2 mb-2">Search</button>
                            </form>
                        </div>
                    </div>

                    <ul class="mt-4 space=y-4 flex grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($tutors as $tutor)
                        <div class="border p-2 rounded-lg shadow-lg hover:bg-gray-200 hover:shadow-xl ">
                            <div class="grid gap-2">
                                <a href="{{route("tutors.show", $tutor) }}">
                                    <x-tutor-card
                                        :tutor_name="$tutor->tutor_name"
                                        :tutor_email="$tutor->tutor_email"
                                        :years_of_experience="$tutor->years_of_experience"
                                    />
                                </a>

                                @if (auth()->user()->role === "admin")
                                    <div class="flex justify-between ">
                                    {{-- link to the course edit form --}}
                                        <a href="{{route('tutors.edit', $tutor)}}" class="text-black bg-yellow-400 hover:bg-yellow-500 font-bold py-2 px-4 rounded">
                                            Edit
                                        </a>

                                        <form action="{{route('tutors.destroy', $tutor)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this tutor?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white bg-red-600 hover:bg-red-700 font-bold py-2 px-4 rounded">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
