@extends('layouts.app')

@section('title') {{ $user->name }}'s Profile @endsection

@section('content')

<div class="w-75-lg px-4 mx-auto mt-4">
    <h3>{{ $user->name }}</h3>
    <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and recieved
        {{ $likesCount = $user->recievedLikesCount() }} {{ Str::plural('like', $likesCount) }}.</p>
</div>

<div class="w-75-lg bg-white px-4 pb-2 border mx-auto mt-4 rounded">

    <div class="mt-4 mb-3">
        @foreach ($posts as $post)
        <x-post :post="$post" />
        @endforeach
    </div>

    @if($posts->hasPages())
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
    @endif
</div>
@endsection
