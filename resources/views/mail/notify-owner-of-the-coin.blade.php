@component('mail::message')
# Coin: {{ $story->coin->phrase }} - {{ $story->coin->number }}

A new connection from your coin has been created!

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

Thanks,<br>
The Connection Coin Team
@endcomponent
