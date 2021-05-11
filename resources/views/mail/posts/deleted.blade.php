@component('mail::message')
# Post has been deleted: {{ $post->title }}

{{ $post->short }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
