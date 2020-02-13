@component('mail::message')
Hi {{ $message->recipient->first_name }},

{{ $message->user->first_name }} sent you a message.
<small> {{ $message->text }}</small>

@component('mail::button', ['url' => '/messages/' . $message->from_user_id])
View Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
