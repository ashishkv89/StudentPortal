@extends('layouts.default')

@section('title', 'Users Index')

@section('content')
    <p> Below are the list of users registered:</p>
    <ul>
        @foreach ($users as $user)
            <li> {{ $user->name }} </li>     
        @endforeach
    </ul>
@endsection