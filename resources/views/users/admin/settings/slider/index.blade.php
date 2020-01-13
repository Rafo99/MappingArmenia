@extends('users.admin.layout.app')

@section('title', 'Slider')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 style="margin-bottom: 20px">Home Page Slider Images
                    <button class="btn btn-primary" style="float: right;"><a href="{{ route('admin.slider.add') }}"
                                                                             style="color: #fff">Add new Slider item</a>
                    </button>
                </h3>
                @if(session('message'))
                    <p style="color: green">{{ session('message') }}</p>
                @endif
                @foreach($images as $image)
                    <form action="{{ route('admin.slider.update') }}" method="POST" enctype="multipart/form-data" id="slider{{ $image->id }}">
                        <input name="image_id" value="{{ $image->id }}" type="text" style="display: none">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Picture</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                       value="{{ $image->name }}" disabled>
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
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <img src="{{ asset('img/slider/'.$image->name) }}" alt="" style="width: 100%">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="text[]" class="form-control"
                                       value="{{ count($image->texts) && $image->texts[0]->text ?  $image->texts[0]->text : ''}}"
                                       placeholder="Text 1">
                                <input type="text" name="text[]" class="form-control"
                                       value="{{ count($image->texts) > 1 && $image->texts[1]->text ? $image->texts[1]->text : ''}}"
                                       placeholder="Text 2">
                                <div style="float: right; margin: 40px 0">
                                    <button class="btn btn-primary delete-slider" data-slider="{{ $image->id }}">
                                        <a href="" style="color:#fff;">Delete</a>
                                    </button>
                                    <button class="btn btn-primary" type="submit" >
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr class="sidebar-divider d-none d-md-block">
                        @csrf
                    </form>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.delete-slider').on('click', function (e) {
            let id = $(this).data('slider');
            if(!confirm('Are you Sure?')){
                alert('Cancelled!');
            } else {
                e.preventDefault();
                $.ajax({
                    url: '/admin/delete-slider',
                    type: 'delete',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id,
                    },
                    success: function (result) {
                        if (result.success)
                        {
                            $(`#slider${id}`).fadeOut();
                        }
                    },
                    error: function () {
                        alert('Something went wrong!');
                    }
                })
            }
        })

    </script>
@endpush
