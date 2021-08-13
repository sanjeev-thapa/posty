@component('mail::message')
# Your post has recieved a new like

{{ Str::title($user->name) }} has liked your post.

@component('mail::button', ['url' => route('posts.show', $post)])
View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
