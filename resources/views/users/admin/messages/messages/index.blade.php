@extends('users.admin.layout.app')

@section('title', 'All Messages')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Messages Table</h3>
                <div class="round"></div><span>Unread Messages</span>
                @if(session('message'))
                    <p style="color: green">{{ session('message') }}</p>
                @endif
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Created At</th>
                        <th>View</th>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                            <tr style="font-weight: 900; {{ $message->read == 0 ? 'background: bisque;' : '' }}">
                                <td>{{ $message->id }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->last_name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->phone }}</td>
                                <td>{{ $message->created_at }}</td>
                                <td><a href="{{ route('admin.messages.show', $message->id) }}" style="color: #858796"><i class="fas fa-arrow-right"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div style="float: right">
            {{ $messages->links() }}
        </div>
    </div>

@endsection

