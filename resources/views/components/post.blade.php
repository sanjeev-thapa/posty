@props(['post' => $post])

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
