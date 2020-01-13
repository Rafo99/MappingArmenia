@extends('users.admin.layout.app')

@section('title', 'All Packages')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Blogs Table</h3>
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
                        @foreach($blogs as $blog)
                            <tr style="font-weight: 900; ">
                                <td><a type="button" class="btn tour-td"  style="font-weight: 900; ">{{ ucwords($blog->getTranslation('en')->title) }}</a></td>
                                <td>{{ $blog->picture ?? 'null' }}</td>
                                <td>{{ $blog->created_at }}</td>
                                <td>
                                    <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                                            data-target="#edit"><a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                                                   style="color: #fff;"><i class="fas fa-edit"></i></a>
                                    </button>
                                    <button class="btn btn-danger btn-xs delete-tour" data-title="Delete" onclick="callConfirm()">
                                        <a style="color: #fff;"><i class="fas fa-trash"></i></a>
                                    </button>
                                    <form action="{{ route('admin.blogs.delete', $blog->id) }}" method="POST">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
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
        })
    </script>
@endpush