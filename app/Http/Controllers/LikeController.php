<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class LikeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        abort_if($post->isLikedBy(auth()->user()), 403);
        $post->likedBy()->attach(auth()->user()->id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        abort_if(!$post->isLikedBy(auth()->user()), 403);
        // $post->likedBy()->detach(auth()->user()->id);
        $post->likedBy->find(auth()->user())->pivot->update(['deleted_at' => now()]);
        return back();
    }
}
