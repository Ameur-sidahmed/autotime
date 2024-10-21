@component('mail::message')
# Votre Rendez-vous

Bonjour {{ $rendezvous->nom }},

Vous trouverez ci-joint le PDF de votre rendez-vous.

Merci,<br>
{{ config('app.name') }}
@endcomponent
