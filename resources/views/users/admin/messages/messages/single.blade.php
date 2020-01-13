@extends('users.admin.layout.app')

@section('title', 'View Message')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 style="margin-bottom: 20px">View Message | ID - {{ $message->id }}</h3>
                @if(session('message'))
                    <p style="color: green">{{ session('message') }}</p>
                @endif
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Name</label>
                        <input type="text" class="form-control" id="validationCustom01"
                               value="{{ $message->name }}" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Last Name</label>
                        <input type="text" class="form-control" id="validationCustom02"
                               value="{{ $message->last_name }}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom03">Email</label>
                        <input type="text" class="form-control" id="validationCustom03"
                               aria-describedby="inputGroupPrepend"
                               value="{{ $message->email }}" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom04">Phone</label>
                        <input type="text" class="form-control" id="validationCustom04"
                               aria-describedby="inputGroupPrepend"
                               value="{{ $message->phone }}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom05">Created At</label>
                        <input type="text" class="form-control" id="validationCustom05"
                               aria-describedby="inputGroupPrepend"
                               value="{{ $message->created_at }}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-8 mb-6">
                        <label for="validationCustom10">Description(Armenian)</label>
                        <textarea id="validationCustom10" class="form-control" cols="30" rows="10"
                                  disabled>{{ $message->message }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
