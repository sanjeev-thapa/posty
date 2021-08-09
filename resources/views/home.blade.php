@extends('layouts.app')

@section('content')
<div class="w-25 bg-white p-4 border mx-auto mt-4 rounded">
    @auth
    <p>Hello {{ auth()->user()->name }}</p>
    <a class="btn btn-primary" href="{{ route('dashboard') }}">View Dashboard</a>
    @endauth

    @guest
    <p class="m-0">Hello Guest!</p>
    @endguest
</div>
@endsection
