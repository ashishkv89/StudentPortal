<title>Student Portal @yield('title')</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <b> Hello {{ Auth::user()->name }}, click to view user details.</b><br><br>
                    @foreach ($users as $user)
                        <li><a href='{{route('users.show', ['id' => $user->id])}}'>{{$user->name}} </a></li> <br>     
                    @endforeach
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
