<title>Student Portal @yield('title')</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    @include('layouts.alert')

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="view_count" value="{{ 0 }}">

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

                            
                            <div class="form-group">
                                <x-input-label for="image" :value="('Image')" />
                                        <input type="file" name="image" id="image" class="block mt-1 w-full">
                                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div> <br><br>

                            <x-primary-button class="ml-0">
                            <input type="submit" value="SUBMIT">
                            </x-primary-button>
                            <a href="{{ route('posts.index') }}"> Cancel</a>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>





