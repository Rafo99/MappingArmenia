@component('mail::message')
    # Introduction

    <p>Name: {{ $data['name'] }}</p>
    <p>Last Name: {{ $data['last_name'] }}</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>Phone: {{ $data['phone'] }}</p>
    <p>Start Date: {{ $data['start'] }}</p>
    <p>End Date: {{ $data['end'] }}</p>
    <p>Number of Participants: {{ $data['number'] }}</p>
    @if($data['accent'])
        <p>Interested Tour:
            @foreach(json_decode($data['accent']) as $accent)
                {{ ucwords(\App\Tour::find((int)$accent)->getTranslation('en')->title) }}<br>
            @endforeach
        </p>
    @endif
    <p>Message: {{ $data['message'] }}</p>



    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
