@extends('users.admin.layout.app')

@section('title', 'All Tours')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Tours Table</h3>
                @if(session('message'))
                    <p style="color: green">{{ session('message') }}</p>
                @endif
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <th>Title</th>
                        <th>Picture</th>
                        <th>Created At</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @foreach($tours as $tour)
                            <tr style="font-weight: 900; ">
                                <td><a type="button" class="btn tour-td" data-tour="td{{ $tour->id }}"  style="font-weight: 900; ">{{ ucwords($tour->getTranslation('en')->title) }}&nbsp; <i class="fas fa-arrow-down"></i></a></td>
                                <td>{{ $tour->picture ?? 'null' }}</td>
                                <td>{{ $tour->created_at }}</td>
                                <td>
                                    <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                                            data-target="#edit"><a href="{{ route('admin.tours.edit', $tour->id) }}"
                                                                   style="color: #fff;"><i class="fas fa-edit"></i></a>
                                    </button>
                                    <button class="btn btn-danger btn-xs delete-tour" data-title="Delete" onclick="return confirm('Are you sure?')">
                                        <a style="color: #fff;"><i class="fas fa-trash"></i></a>
                                    </button>
                                    <form action="{{ route('admin.tours.delete', $tour->id) }}" method="POST">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @if($tour->has('children'))
                                @foreach($tour->children as $child)
                                    <tr class="td{{ $tour->id }}" style="display: none;">
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ ucwords($child->getTranslation('en')->title) }}</td>
                                        <td>{{ $child->picture ?? 'null' }}</td>
                                        <td>{{ $child->created_at }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit">
                                                <a href="{{ route('admin.tours.edit', $child->id) }}" style="color: #fff;"><i class="fas fa-edit"></i></a>
                                            </button>
                                            <button class="btn btn-danger btn-xs delete-tour" data-title="Delete" onclick="return confirm('Are you sure?')">
                                                <a style="color: #fff;"><i class="fas fa-trash"></i></a>
                                            </button>
                                            <form action="{{ route('admin.tours.delete', $child->id) }}" method="POST">
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        $('button.delete-tour').on('click', function () {
            if (confirm('Are you Sure?'))
                $(this).next($('form')).submit();
            else
                alert('Canceled!')
        });

        $('.tour-td').on('click', function () {
            let a = $(this).data('tour');
            $('.' + a).toggle();
        })
    </script>
@endpush
