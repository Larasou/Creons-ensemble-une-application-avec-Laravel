@component('mail::message')
# Binvenue chez Larasou

Salut {{ $user->name }}, ci-dessous il y a un lien afin de valider ton compte.

@component('mail::button', ['url' => config('app.url') . "/validation/$user->id/$user->token"])
Valider mon compte
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
