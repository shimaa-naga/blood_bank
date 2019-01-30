@component('mail::message')
# Introduction

Blood Bank reset password.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

<p> Your Reset Code is : {{$code}} </p>

Thanks,<br>

{{ config('app.name') }}

@endcomponent
