<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Tracks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                @if($tracks)
                    <h3 class="text-2xl">Tracks in the system:</h3>
                    <a href="{{ route('tracks.create') }}">Create Track</a>

                    <ul>
                        @foreach($tracks as $t)
                            <li><a href="{{ route('tracks.show', ['track' => $t]) }}">{{ $t->title }} ></a></li>
                        @endforeach
                    </ul>

                @else
                <p>There are not tracks yet.</p>
                    <a href="{{ route('tracks.create') }}">Create Track</a>
                @endif
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>