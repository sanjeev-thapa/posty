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
        <div class="mt-3">
            <strong>{{ $post->user->name }}</strong>
            <span class="text-muted small font-weight-bold mb-0 ml-1">{{ $post->created_at->diffForHumans() }}</span>
            <p class="mb-0">{{ $post->body }}</p>
            <div class="d-flex align-items-end">

                @auth
                @if(!$post->isLikedBy(auth()->user()))
                <form class="d-inline" action="{{ route('likes.store', $post) }}" method="post">
                    @csrf
                    <button class="btn text-primary border-0 p-0 mr-1">Like</button>
                </form>
                @else
                <form class="d-inline" action="{{ route('likes.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn text-primary border-0 p-0 mr-1">Unlike</button>
                </form>
                @endif
                @endauth

                @can('delete', $post)
                <form class="d-inline" action="{{ route('posts.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn text-primary border-0 p-0 mr-1">Delete</button>
                </form>
                @endcan

                <p class="my-0">{{ $post->likedBy->count() }} Likes</p>

            </div>
        </div>
        @endforeach
    </div>

    @if($posts->hasPages())
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
    @endif

</div>
@endsection
