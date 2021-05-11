@component('mail::message')
# Post has been created: {{ $post->title }}

{{ $post->short }}

@component('mail::button', ['url' => route('post_show_front', $post)])
Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
