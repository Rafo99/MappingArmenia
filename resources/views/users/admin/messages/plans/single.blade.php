@extends('users.admin.layout.app')

@section('title', 'View Plan')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 style="margin-bottom: 20px">View Plan | ID - {{ $plan->id }}</h3>
                @if(session('message'))
                    <p style="color: green">{{ session('message') }}</p>
                @endif
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Name</label>
                        <input type="text" class="form-control" id="validationCustom01"
                               value="{{ $plan->name }}" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Last Name</label>
                        <input type="text" class="form-control" id="validationCustom02"
                               value="{{ $plan->last_name }}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom03">Email</label>
                        <input type="text" class="form-control" id="validationCustom03"
                               aria-describedby="inputGroupPrepend"
                               value="{{ $plan->email }}" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom04">Phone</label>
                        <input type="text" class="form-control" id="validationCustom04"
                               aria-describedby="inputGroupPrepend"
                               value="{{ $plan->phone }}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom05">Start</label>
                        <input type="text" class="form-control" id="validationCustom05"
                               aria-describedby="inputGroupPrepend"
                               value="{{ $plan->start }}" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom06">End</label>
                        <input type="text" class="form-control" id="validationCustom06"
                               aria-describedby="inputGroupPrepend"
                               value="{{ $plan->end }}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom07">Number of Participants</label>
                        <input type="text" class="form-control" id="validationCustom07"
                               aria-describedby="inputGroupPrepend"
                               value="{{ $plan->number }}" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom09">Created At</label>
                        <input type="text" class="form-control" id="validationCustom09"
                               aria-describedby="inputGroupPrepend"
                               value="{{ $plan->created_at }}" disabled>
                    </div>
                </div>
                @if($plan->accent)
                    @foreach(array_chunk($plan->accent, 2) as $chunk)
                        <div class="form-row">
                            @foreach($chunk as $accent)
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom08">Accent Tours</label>
                                    <input type="text" class="form-control" id="validationCustom08"
                                           aria-describedby="inputGroupPrepend"
                                           value="{{ ucwords($accent) }}" disabled>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                @endif
                <div class="form-row">
                    <div class="col-md-8 mb-6">
                        <label for="validationCustom10">Description(Armenian)</label>
                        <textarea id="validationCustom10" class="form-control" cols="30" rows="10"
                                  disabled>{{ $plan->message }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
