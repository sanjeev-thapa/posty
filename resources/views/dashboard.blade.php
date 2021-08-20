@extends('layouts.app')

@section('title') Dashboard @endsection

@section('content')
<div class="w-25-lg bg-white p-4 border mx-auto mt-4 rounded">
    <p>Welcome {{ Str::title(auth()->user()->name) }}</p>

    <a class="btn btn-primary" href="{{ route('profiles.show', auth()->user()) }}">View Profile</a>
    <a class="btn btn-primary" href="{{ route('posts.index') }}">View Posts</a>
    <form action="{{ route('logout') }}" class="d-inline" method="post">
        @csrf
        <button class="btn btn-red mt-lg-2">Logout</button>
    </form>
</div>
@endsection
