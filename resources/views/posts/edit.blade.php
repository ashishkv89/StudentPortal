<title>Student Portal @yield('title')</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        <form method="POST" action="{{ route('posts.update', ['id' => $post->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                <x-input-label for="title" :value="('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{$post->title}}" required />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div> <br> 

                            <div>
                                <x-input-label for="description" :value="('Description')" />
                                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{$post->description}}" required />
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div> <br>

                            
                            <div class="form-group">
                                <x-input-label for="image" :value="('Image')" />
                                        <input type="file" name="image" id="image" class="block mt-1 w-full">
                                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                    </div> <br><br>

                            <x-primary-button class="ml-0">
                            <input type="submit" value="UPDATE">
                            </x-primary-button>
                            <a href="{{ route('posts.show', ['id' => $post->id]) }}"> Cancel</a>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>





