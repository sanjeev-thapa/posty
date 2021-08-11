@extends('layouts.app')

@section('content')
<div class="w-25-lg bg-white p-4 border mx-auto mt-4 rounded">
    @auth
    <p>Hello {{ auth()->user()->name }}</p>
    <a class="btn btn-primary" href="{{ route('dashboard') }}">View Dashboard</a>
    @endauth

    @guest
    <p class="m-0">Hello Guest!</p>
    <div class="d-flex mt-2">
        <a href="{{ route('login') }}" class="btn btn-primary mr-2">Login</a>
        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
    </div>
    @endguest
</div>
@endsection
