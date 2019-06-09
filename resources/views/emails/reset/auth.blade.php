@component('mail::message')
# Introduction

<h1>Blood Bank Reset Password</h1>

<p>Hello {{ $user->name }}</p>


<p>Your reset code is : {{ $user->pin_code }}</p>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
