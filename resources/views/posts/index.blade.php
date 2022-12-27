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
                        <x-primary-button class="ml-0">
                            <a href='{{route('posts.create')}}'>CREATE A NEW POST</a>
                        </x-primary-button> 
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <b> Hello {{ Auth::user()->name }}, stay engaged with your school activities !</b>
                    <br><br><br>
                        @foreach ($posts as $post)
                            <li><a href='{{route('posts.show', ['id' => $post->id])}}'>{{$post->title}} </a> [Author: <a href='{{route('users.show', ['id' => $post->user_id])}}'>{{$post->user->name}}]</li> </a><br>   
                        @endforeach
                        {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
