<title>Student Portal @yield('title')</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>

    @include('layouts.alert')

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        <li><big><b> {{$post->title}} </li></b></big><br>
                        <li> {{$post->description}} </li><br>
                        <li><b> Author: </b><a href='{{route('users.show', ['id' => $post->user_id])}}'>{{$post->user->name}} </a></li>
                        <li><b> Created: </b>{{$post->created_at}} </li>  
                        @if (Auth::user()->id == $post->user_id || Auth::user()->role_id == 1)
                            <li><b> Views: </b>{{$post->view_count}} </li>
                        @endif    
                        @if ($post->image)
                            <br><li> <img src="/storage/{{$post->image}}" width="250"> </li><br>  
                        @endif
                    </ul>

                    <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                        @csrf
                        @method('DELETE')
                        <x-primary-button class="ml-0">
                            <input type="submit" value="DELETE">
                        </x-primary-button>
                    </form>

                    <x-primary-button class="ml-0">
                        <p><a href="{{ route('posts.edit', ['id' => $post->id]) }}">EDIT</a></p>
                    </x-primary-button>

                    <x-primary-button class="ml-0">
                        <p><a href="{{ route('dashboard') }}">BACK</a></p><br>
                    </x-primary-button>
                    <br>

                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (!$post->likedBy(auth()->user()))
                    <form method="POST" action="{{ route('posts.like', $post->id) }}">
                        @csrf
                        <x-secondary-button class="ml-0" type="submit">Like</x-secondary-button>
                    </form>
                    @else
                    <form method="POST" action="{{ route('posts.unlike', $post->id) }}">
                        @csrf
                        @method('delete')
                        <x-secondary-button class="ml-0" type="submit">UnLike</x-secondary-button>
                    </form>
                    @endif

                    @if ($post->likes->count() > 0)
                        <span><b>
                        {{ $post->likes->count() }}
                        @if ($post->likes->count() > 1)
                            Likes
                        @else
                            Like
                        @endif
                        </b></span>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <b> Comment on the Post </b><br><br>
                    <form method="POST" action="{{ route('comments.store') }}" >
                        @csrf

                        <div>
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <x-text-input id="message" class="block mt-1 w-full" type="text" name="message" placeholder="Type your comment here" value="{{ old('message') }}" required />
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

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                @if ($post->comments->count() > 0)
                <span><b>
                    {{ $post->comments->count() }}
                    @if ($post->comments->count() > 1)
                        Comments
                    @else
                        Comment
                    @endif
                </b></span>
                <br><br>
                @endif
                    @if (count($post->comments) > 0)
                    @foreach ($post->comments as $comment) 
                        <div class="card mb-3">
                            <div class="card-header">
                                <p><b><a href='{{route('users.show', ['id' => $comment->user->id])}}'>{{ $comment->user->name }}</b></a> : {{ $comment->message }}</p>
                                <small>Created: ({{ $comment->created_at }})<br>
                                <b>
                                @if ($comment->likes->count() > 0)
                                    {{ $comment->likes->count() }}
                                    @if ($comment->likes->count() > 1)
                                        Likes
                                    @else
                                        Like
                                @endif
                                <br>
                            @endif
                            </b></small>    
                            @if (!$comment->likedBy(auth()->user()))
                            <form method="POST" action="{{ route('comments.like', $comment->id) }}" style="margin:0px;float:left">
                                @csrf
                                <input type="submit" style="margin:5px;float:left" value="Like">
                            </form>
                            @else
                            <form method="POST" action="{{ route('comments.unlike', $comment->id) }}" style="margin:0px;float:left">
                                @csrf
                                @method('delete')
                                <input type="submit" style="margin:5px;float:left" value="Unlike">
                            </form>
                            @endif

                            @if (Auth::user()->id == $comment->user_id || Auth::user()->id == $post->user_id)
                                <a href="{{ route('comments.edit', ['id' => $comment->id]) }}" style="margin:5px;float:left">Edit</a>
                            @endif   
                            @if (Auth::user()->id == $comment->user_id || Auth::user()->role_id == 1 || Auth::user()->id == $post->user_id)
                                <form method="POST" style="margin:0px;float:left" action="{{ route('comments.destroy', ['id' => $comment->id]) }}" >
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" style="margin:5px;float:left" value="Delete">
                                </form>
                            @endif  
            
                            </div><br>
                        </div> <br>
                    @endforeach 
                    @else
                        Be first to comment on this post.
                    @endif

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
