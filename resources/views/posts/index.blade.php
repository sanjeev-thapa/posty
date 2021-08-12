@extends('layouts.app')

@section('title') Posts @endsection

@section('content')
<div class="w-75-lg bg-white pt-4 px-4 pb-2 border mx-auto mt-4 rounded">
    @auth
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="form-group">
            <textarea class="form-control bg-light border-2 focus-primary py-2 @error('body') is-invalid @enderror"
                placeholder="Post Something..." rows="5" name="body">{{ old('body') }}</textarea>
            @error('body') <p class="text-danger m-0 font-90"> {{ $message }} </p> @enderror
        </div>
        <button class="btn btn-primary">Post</button>
    </form>
    @endauth

    @guest
    <div class="alert alert-danger"><a class="font-weight-bold text-dark" href="{{ route('login') }}">Login</a> to
        Post or Like the Post!
    </div>
    @endguest

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
