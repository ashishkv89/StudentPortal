<title>Student Portal @yield('title')</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        <b> User Details </b><br>
                        <li> Full Name : {{$user->name}}</li>
                        <li> Email ID : {{$user->email}}</li>
                        <li> Phone No : 
                            @if ($user->phone)
                                {{$user->phone}}             
                            @else
                                Unknown
                            @endif  
                        <li> Role : {{$user->role->name}} </li>    
                        @if(Auth::user()->role->id == 1 || Auth::user() == $user)
                        </li><br><hr><br>                          
                        <b> Personal Information </b><br>
                        <li> Date of Birth : {{$user->personalInformation->date_of_birth}} </li>
                        <li> Address : {{$user->personalInformation->address}} </li>
                        <li> Emergency Contact Name : {{$user->personalInformation->emergency_contact_name}} </li>
                        <li> Emergency Contact Phone : {{$user->personalInformation->emergency_contact_phone}} </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                        @if (count($user->posts) > 0)
                        <b> Click to view {{$user->name}}'s Posts </b><br><br>
                        @foreach ($user->posts as $post) 
                            <div class="card mb-3">
                                <div class="card-header">
                                    <li><a href='{{ route('posts.show', ['id' => $post->id]) }}'>{{ $post->title }} <small><font color="grey">[Created At: {{ $post->created_at }}]</font></small></li></a>
                                </div>
                            </div> <br>
                        @endforeach 
                        @else
                        <b> User has not created any posts. </b>
                        @endif  
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                        @if (count($user->comments) > 0)
                        <b> Click to view {{$user->name}}'s Comments on Posts </b><br><br>
                        @foreach ($user->comments as $comment) 
                            <div class="card mb-3">
                                <div class="card-header">
                                    <li><a href='{{ route('posts.show', ['id' => $comment->post->id]) }}'>{{ $comment->message }} <small><font color="grey"> [Post Title: {{ $comment->post->title }} <a href='{{route('users.show', ['id' => $user->id])}}'>Post Author: {{ $comment->post->user->name }}]</font></small></li></a>
                                </div>
                            </div> <br>
                        @endforeach 
                        @else
                        <b> User has not posted any comments. </b>
                        @endif  
                </div>
            </div>
        </div>
    </div>




</x-app-layout>
