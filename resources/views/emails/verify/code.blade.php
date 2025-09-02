@component('mail::message')
# Hello {{ $firstName ?? 'user' }},

Your verification code is:

@component('mail::panel')
**{{ $code }}**
@endcomponent

Enter this code on the verification page to activate your account.

Thanks,<br>
{{ config('app.name') }}
@endcomponent