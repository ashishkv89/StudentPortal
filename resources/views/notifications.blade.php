 <title>Student Portal @yield('title')</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    @include('layouts.alert')

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <b> Hello {{ Auth::user()->name }}, your notifications are listed below.</b>
                    <br><br>
                    <div class="dropdown-menu dropdown-menu-right" role="alert" aria-labelledby="navbarDropdownMenuLink">
                        @if ($notifications->count() > 0 )
                        <hr>
                        @foreach($notifications as $notification)
                        <form method="post" action="{{ route('notifications.read', ['id' => Auth::user()->id]) }}">
                            <div class="alert alert-light" role="alert">
                            <br><p class="dropdown-item"><b> {{ $notification->data['name'] }} </b>commented on your post <b>{{ $notification->data['post'] }}.</b></p><br>
                            @csrf
                            @method('PUT')
                            </div>
                        <hr>
                        @endforeach
                        <br>
                        <x-primary-button class="ml-0">
                            <input type="submit" value="Mark all as read">
                        </x-primary-button>
                        </form>
                        <br>
                        @else
                        <p> There are no new notifications </p>
                        @endif
                     </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>