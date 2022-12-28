<title>Student Portal @yield('title')</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        <li> Full Name: {{$user->name}}</li>
                        <li> Email ID: {{$user->email}}</li>
                        <li> Phone No: 
                            @if ($user->phone)
                                {{$user->phone}}             
                            @else
                                Unknown
                            @endif                              
                        </li>
                        <li> Address: 
                            @if ($user->address)
                                {{$user->address}}             
                            @else
                                Unknown
                            @endif                              
                        </li>
                        <li> Role: {{$user->role->name}} </li>   
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
