<title>Student Portal @yield('title')</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        <a href='{{route('posts.create')}}'>Create Post</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        @foreach ($posts as $post)
                            <li><a href='{{route('posts.show', ['id' => $post->id])}}'>{{$post->title}} </a> [Author: <a href='{{route('users.show', ['id' => $post->user_id])}}'>{{$post->user->name}}]</li> </a>   
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
