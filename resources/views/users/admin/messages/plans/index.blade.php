@extends('users.admin.layout.app')

@section('title', 'All Planed Tours')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Planed Tours Table</h3>
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
                        @foreach($plans as $plan)
                            <tr style="font-weight: 900; {{ $plan->read == 0 ? 'background: bisque;' : '' }}">
                                <td>{{ $plan->id }}</td>
                                <td>{{ $plan->name }}</td>
                                <td>{{ $plan->last_name }}</td>
                                <td>{{ $plan->email }}</td>
                                <td>{{ $plan->phone }}</td>
                                <td>{{ $plan->created_at }}</td>
                                <td><a href="{{ route('admin.plans.show', $plan->id) }}" style="color: #858796"><i class="fas fa-arrow-right"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div style="float: right">
            {{ $plans->links() }}
        </div>
    </div>

@endsection

