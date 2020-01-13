@extends('users.admin.layout.app')

@section('title', 'Contacts Image')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 style="margin-bottom: 20px">Home Page Contacts Image</h3>
                @if(session('message'))
                    <p style="color: green">{{ session('message') }}</p>
                @endif
                <form action="{{ route('admin.contact.save') }}" method="POST" enctype="multipart/form-data">
                    <input name="image_id" value="{{ $contact_img->id }}" type="text" style="display: none">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Picture</label>
                            <input type="text" class="form-control" id="validationCustom01"
                                   value="{{ $contact_img->name }}" disabled>
                        </div>
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
                        <div class="col-md-4 mb-3" style="display: flex; align-items: flex-end">
                            <button class="btn btn-primary" type="submit">
                                Save
                            </button>
                        </div>
                    </div>

                    <hr class="sidebar-divider d-none d-md-block">
                    @csrf
                </form>
            </div>
        </div>
    </div>

@endsection

