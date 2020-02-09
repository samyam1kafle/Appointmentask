@component('mail::message')
# Greetings Mr/Mrs : {{$name}}

Thank you for logging into our site.
<hr>
Your email to login to our site {{$email}}
<hr>
Use the provided password to login to our site <strong><u>{{$mail_password}}</u></strong>
<hr>
@component('mail::button', ['url' => 'http://localhost:8000','color' => 'blue'])
home
@endcomponent
<hr>
Thank you,<br>
{{ config('app.name') }}
@endcomponent
