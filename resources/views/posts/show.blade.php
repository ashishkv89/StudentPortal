<title>Student Portal @yield('title')</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        <li> Title: {{$post->title}}</li>
                        <li> Description: {{$post->description}}</li>
                        <li> Author: <a href='{{route('users.show', ['id' => $post->user_id])}}'>{{$post->user->name}} </li>    
                        <li> Pictures: <img src="{{$post->image->path}}"> </li>  
                    </ul>

                    <form method="POST"
                        action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                        @csrf
                        @method('DELETE')
                        <br><button type="submit">Delete</button>
                    </form>
                    <p><a href="{{ route('posts.index') }}">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
