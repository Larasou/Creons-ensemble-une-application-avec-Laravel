@component('mail::message')
# Salut {{ $user->name }},

<p>
    L'article <a href="{{ url($post->path) }}"
                 style="text-decoration: none; font-weight: bold; color: rgba(255,43,13,0.6);"
    >{{ $post->name }}</a> vient d'être mise à ajour!.
</p>

@component('mail::button', ['url' => url($post->path)])
Voir l'article
@endcomponent

@component('mail::panel')
{!! $post->description !!}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
