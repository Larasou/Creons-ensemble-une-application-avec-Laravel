@component('mail::message')
 ## Salut {{ $user->name }},

## {{ $comment->user->name }} vient de commenter l'article {{ $post->name }}.

@component('mail::button', ['url' => url($post->path)])
Voir l'article
@endcomponent

@component('mail::panel')
 {{ $comment->body }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
