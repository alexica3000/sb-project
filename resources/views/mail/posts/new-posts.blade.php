@component('mail::message')
# Hello, {{ $user->name }}

New posts for last period:

@php
    foreach($posts as $post) {
    echo "[$post->title](".route('post_show_front', $post).").<br>";
    }
@endphp

Thanks,<br>
{{ config('app.name') }}
@endcomponent
