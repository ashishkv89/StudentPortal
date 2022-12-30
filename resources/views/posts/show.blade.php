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
                        <li><big><b> {{$post->title}} </li></b></big><br>
                        <li> {{$post->description}} </li><br>
                        <li><b> Author: </b><a href='{{route('users.show', ['id' => $post->user_id])}}'>{{$post->user->name}} </a></li>
                        <li><b> Created: </b>{{$post->created_at}} </li><br>   
                        @if ($post->image)
                            <li> <img src="/storage/{{$post->image}}" width="250"> </li><br>  
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
                    <b> Comment on the Post </b>
                    <form action="/posts/{{ $post->id }}/comments" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea name="message" cols="30" rows="3" class="form-control" placeholder="Type Something here"></textarea>
                        </div>
                        <input type="submit" value="Comment" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <b> Comments </b>
                    <br><br>
                    @if (count($post->comments) > 0)
                    @foreach ($post->comments as $comment) 
                        <div class="card mb-3">
                            <div class="card-header">
                                <p>{{ $comment->message }}</p>
                                <small>{{ $comment->user->name }} ({{ $comment->created_at }})</small>
                            </div>
                            <div class="card-body">
                                    @if (Auth::user()->id == $comment->user_id || Auth::user()->role_id == 1 || Auth::user()->id == $post->user_id)
                                        <a href="/comments/{{$comment->id}}" style="float:left" class="btn btn-primary">Edit</a>
                                        <form method="POST" action="" >
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" style="float:right" value="Delete" class="btn btn-danger">
                                        </form><br>
                                    @endif                                
                            </div>
                        </div> <br>
                    @endforeach 
                    @else
                        Be first to comment on this post
                    @endif

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
