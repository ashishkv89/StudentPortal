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
                        <li><big><b> {{$comment->post->title}} </li></b></big><br>
                        <li> {{$comment->post->description}} </li><br>
                        <li><b> Author: </b><a href='{{route('users.show', ['id' => $comment->post->user_id])}}'>{{$comment->post->user->name}} </a></li>
                        <li><b> Created: </b>{{$comment->post->created_at}} </li><br>   
                        @if ($comment->post->image)
                            <li> <img src="/storage/{{$comment->post->image}}" width="250"> </li><br>  
                        @endif
                    </ul>

                    <form method="POST" action="{{ route('posts.destroy', ['id' => $comment->post->id]) }}">
                        @csrf
                        @method('DELETE')
                        <x-primary-button class="ml-0">
                            <input type="submit" value="DELETE">
                        </x-primary-button>
                    </form>

                    <x-primary-button class="ml-0">
                        <p><a href="{{ route('posts.edit', ['id' => $comment->post->id]) }}">EDIT</a></p>
                    </x-primary-button>

                    <x-primary-button class="ml-0">
                        <p><a href="{{ route('posts.index') }}">BACK</a></p><br>
                    </x-primary-button>
                    <br>

                </div>
            </div>
        </div>
    </div>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <b> Edit your Comment </b><br><br>
                    <form method="POST" action="{{ route('comments.update', ['id' => $comment->id]) }}" >
                        @csrf
                        @method('PUT')
                        <div>
                            <input type="hidden" name="post_id" value="{{ $comment->post->id }}">
                            <x-text-input id="message" class="block mt-1 w-full" type="text" name="message" value="{{ $comment->message }}" required />
                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        </div> <br>
                        <x-secondary-button class="ml-0">
                            <input type="submit" value="SUBMIT">
                        </x-secondary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
