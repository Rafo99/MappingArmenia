@extends('users.admin.layout.app')

@section('title', 'All Orders')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Orders Table</h3>
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
                        @foreach($orders as $order)
                            <tr style="font-weight: 900; {{ $order->read == 0 ? 'background: bisque;' : '' }}">
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->last_name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td><a href="{{ route('admin.orders.show', $order->id) }}" style="color: #858796"><i class="fas fa-arrow-right"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div style="float: right">
            {{ $orders->links() }}
        </div>
    </div>

@endsection

