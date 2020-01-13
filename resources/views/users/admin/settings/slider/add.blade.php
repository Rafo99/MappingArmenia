@extends('users.admin.layout.app')

@section('title', 'Add New Slider Item')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 style="margin-bottom: 20px">Home Page Slider Images</h3>
                @if(session('message'))
                    <p style="color: green">{{ session('message') }}</p>
                @endif
                <form action="{{ route('admin.slider.save') }}" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="inputGroupFile01">Change Picture</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input name="picture" type="file" class="custom-file-input"
                                           id="inputGroupFile01"
                                           aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="inputGroupFile02">Add Texts</label>
                            <input type="text" name="text[]" class="form-control"
                                   placeholder="Text 1">
                            <input type="text" name="text[]" class="form-control"
                                   placeholder="Text 2">
                            <button class="btn btn-primary" type="submit" style="float: right; margin: 40px 0">
                                Save
                            </button>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>

@endsection
