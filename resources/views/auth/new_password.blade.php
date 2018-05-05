@component('mail::message')
# Mot de passe perdu

Salut {{ $user->name }}, tu viens de demander un nouveau moit de passe. Le voic   :

@component('mail::panel')
{{ $password }}
@endcomponent

Pour changer ce mot de passe, tu peux le faire via <a href="{{ config('app.url') }}/account">ton espace membre</a>.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
