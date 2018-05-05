@component('mail::message')
# Mot de passe perdu

Salut {{ $user->name }}, tu viens de faire une demande de réinitialisation de mot de passe.
Merci de cliquer sur le lien ce-dessous afin de continuer.

@component('mail::button', ['url' => config('app.url') . "/forget/$user->id/$user->reset", 'color' => 'green'])
Réinitialiser mon mot de passe.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
