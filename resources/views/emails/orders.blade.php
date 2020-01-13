@component('mail::message')
    # Introduction

    <p>Name: {{ $data['name'] }}</p>
    <p>Last Name: {{ $data['last_name'] }}</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>Phone: {{ $data['phone'] }}</p>
    <p>Start Date: {{ $data['start'] }}</p>
    <p>End Date: {{ $data['end'] }}</p>
    <p>Number of Participants: {{ $data['number'] }}</p>
    <p>Interested Tour: {{ ucwords(\App\Tour::find((int)$data['tour'])->getTranslation('en')->title) }}</p>
    <p>Message: {{ $data['message'] }}</p>



    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
