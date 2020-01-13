@component('mail::message')
# Introduction

<p>Name: {{ $data['name'] }}</p>
<p>Last Name: {{ $data['last_name'] }}</p>
<p>Email: {{ $data['email'] }}</p>
<p>Phone: {{ $data['phone'] }}</p>
<p>Message: {{ $data['message'] }}</p>



Thanks,<br>
{{ config('app.name') }}
@endcomponent
