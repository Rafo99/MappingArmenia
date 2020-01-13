@extends('users.admin.layout.app')

@section('title', 'View Order')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 style="margin-bottom: 20px">View Order | ID - {{ $order->id }}</h3>
                @if(session('message'))
                    <p style="color: green">{{ session('message') }}</p>
                @endif
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Name</label>
                        <input type="text" class="form-control" id="validationCustom01"
                               value="{{ $order->name }}" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Last Name</label>
                        <input type="text" class="form-control" id="validationCustom02"
                               value="{{ $order->last_name }}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom03">Email</label>
                        <input type="text" class="form-control" id="validationCustom03"
                               aria-describedby="inputGroupPrepend"
                               value="{{ $order->email }}" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom04">Phone</label>
                        <input type="text" class="form-control" id="validationCustom04"
                               aria-describedby="inputGroupPrepend"
                               value="{{ $order->phone }}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom05">Start</label>
                        <input type="text" class="form-control" id="validationCustom05"
                               aria-describedby="inputGroupPrepend"
                               value="{{ $order->start }}" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom06">End</label>
                        <input type="text" class="form-control" id="validationCustom06"
                               aria-describedby="inputGroupPrepend"
                               value="{{ $order->end }}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom07">Number of Participants</label>
                        <input type="text" class="form-control" id="validationCustom07"
                               aria-describedby="inputGroupPrepend"
                               value="{{ $order->number }}" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom08">Tour</label>
                        <input type="text" class="form-control" id="validationCustom08"
                               aria-describedby="inputGroupPrepend"
                               value="{{ ucwords(\App\Tour::find($order->tour)->getTranslation('en')->title) }}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom09">Created At</label>
                        <input type="text" class="form-control" id="validationCustom09"
                               aria-describedby="inputGroupPrepend"
                               value="{{ $order->created_at }}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-8 mb-6">
                        <label for="validationCustom10">Description(Armenian)</label>
                        <textarea id="validationCustom10" class="form-control" cols="30" rows="10"
                                  disabled>{{ $order->message }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
