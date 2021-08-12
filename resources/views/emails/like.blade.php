@component('mail::message')
# Your post has recieved a new like

{{ Str::title($user->name) }} has liked your post.

@component('mail::button', ['url' => ''])
View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
