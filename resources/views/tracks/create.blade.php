<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Track') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-bold">Create a New Track</h3>
                    <form action="{{ route('tracks.store') }}" method="POST">
                        @csrf
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="title">Title</label>
                            <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="title" type="text" name="title" required="required" autofocus="autofocus">
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="track_type">Track Type</label>
                            <select name="track_type">
                                <option>Select a type</option>
                                <option value="original_mix">Original Mix</option>
                                <option value="remix">Remix</option>
                                <option value="bonus">Bonus Track</option>

                            </select>
                        </div>

                     
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="price_fiat">Fiat Price</label>
                            <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="price_fiat" type="number" name="price_fiat" required="required" autofocus="autofocus" step="0.000001">
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="price_ergo">Ergo Price</label>
                            <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="price_ergo" type="number" name="price_ergo" required="required" autofocus="autofocus" step="0.000001">
                        </div>

                        <button type="submit">Submit</button>
                       
                    </form>
               
                </div>
            </div>
        </div>
    </div>
</x-app-layout>