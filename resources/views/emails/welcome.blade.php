@component('mail::message')
# Hello from appSolve.com

Welcome to our company, we will make your computing experience user friendly, by providing Helpful computing content
.Thank you for subscribing to our newsletter.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
