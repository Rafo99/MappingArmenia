@extends('users.admin.layout.app')

@section('title', 'Edit Package')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 style="margin-bottom: 20px">Edit Package / <a href="{{ route('tour.show', $package->tour_id) }}" target="_blank" style="text-decoration: underline">{{ ucwords($package->getTranslation('en')->title) }}</a></h3>
                @if(session('message'))
                    <p style="color: green">{{ session('message') }}</p>
                @endif
                <form action="{{ route('admin.packages.update', $package->id) }}" method="POST" class="needs-validation" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="tour_parent">Parent Tour</label>
                            <select name="parent_id" id="tour_parent" class="form-control">
                                <option value="">Null</option>
                                @foreach($tours as $item)
                                    <option value="{{ $item->id }}" {{ $package->tour_id == $item->id ? 'selected' : '' }}>{{ ucwords($item->getTranslation('en')->title) }}</option>
                                    @foreach($item->children as $child)
                                        <option value="{{ $child->id }}" {{ $package->tour_id == $child->id ? 'selected' : '' }}>
                                            &nbsp;&nbsp;&nbsp;{{ ucwords($child->getTranslation('en')->title) }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="inputGroupFile01">Picture - {{ $package->picture ?? 'null' }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input name="picture" type="file" class="custom-file-input" id="inputGroupFile01"
                                           aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Title(Armenian)</label>
                            <input name="title_hy" type="text" class="form-control" id="validationCustom01"
                                   placeholder="Armenian"
                                   value="{{ ucwords($package->getTranslation('en')->title) }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Title(Russian)</label>
                            <input name="title_ru" type="text" class="form-control" id="validationCustom02"
                                   placeholder="Russian"
                                   value="{{ ucwords($package->getTranslation('en')->title) }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustomUsername">Title(English)</label>
                            <input name="title_en" type="text" class="form-control" id="validationCustom03"
                                   placeholder="English" aria-describedby="inputGroupPrepend"
                                   value="{{ ucwords($package->getTranslation('en')->title) }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8 mb-6">
                            <label for="validationCustom01">Description(Armenian)</label>
                            <textarea name="desc_hy" class="form-control" cols="30" rows="10" placeholder="Armenian"
                                      required>{{ $package->getTranslation('en')->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8 mb-6">
                            <label for="validationCustom02">Description(Russian)</label>
                            <textarea name="desc_ru" class="form-control" cols="30" rows="10" placeholder="Russian"
                                      required>{{ $package->getTranslation('en')->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8 mb-6">
                            <label for="validationCustomUsername">Description(English)</label>
                            <textarea name="desc_en" class="form-control" cols="30" rows="10" placeholder="English"
                                      required>{{ $package->getTranslation('en')->description }}</textarea>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit" style="float: right; margin: 40px 0">Save</button>
                    @csrf
                </form>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('textarea').ckeditor();
    </script>
@endpush