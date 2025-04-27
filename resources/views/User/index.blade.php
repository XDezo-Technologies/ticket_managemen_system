@extends('User.layout.main')

@section('container')
<div class="container">
    <h2>User Dashboard</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">🟢 Open Tickets</div>
                <div class="card-body">
                    <h3>{{ $openTickets }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">🔴 Closed Tickets</div>
                <div class="card-body">
                    <h3>{{ $closedTickets }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">📌 Total Tickets</div>
                <div class="card-body">
                    <h3>{{ $totalTickets }}</h3>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('Ticket.create') }}" class="btn btn-primary mb-3">Create Ticket</a>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Status</th>
                <th>Priority</th>
                <th>Created By</th>
                <th>Assigned To</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td><a href="{{ route('Ticket.show', $ticket->id) }}">{{ $ticket->title }}</a></td>
                    <td><span class="badge bg-{{ $ticket->status == 'open' ? 'success' : ($ticket->status == 'in_progress' ? 'warning' : 'danger') }}">{{ ucfirst($ticket->status) }}</span></td>
                    <td><span class="badge bg-primary">{{ ucfirst($ticket->priority) }}</span></td>
                    <td>{{ $ticket->creator->name }}</td>
                    <td>{{ $ticket->assigned_to ? $ticket->assignee->name : 'Not Assigned' }}</td>
                    <td>
                        <a href="{{ route('Ticket.show', $ticket->id) }}" class="btn btn-sm btn-info">View</a>
                      
                            {{-- <a href="{{ route('Tickets.edit', $ticket->id) }}" class="btn btn-sm btn-warning">Edit</a> --}}
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $tickets->links() }}
</div>
@endsection
