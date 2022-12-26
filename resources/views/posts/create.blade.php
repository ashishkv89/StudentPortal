<title>Student Portal @yield('title')</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        <form method="POST" action="{{ route('posts.store') }}">
                            @csrf

                            <div>
                                <x-input-label for="title" :value="('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ old('title') }}" required />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div> <br> 

                            <div>
                                <x-input-label for="description" :value="('Description')" />
                                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{ old('description') }}" required />
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div> <br> 

                            <x-primary-button class="ml-0">
                            <input type="submit" value="Submit">
                            </x-primary-button>
                            <a href="{{ route('posts.index') }}"> Cancel</a>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>





