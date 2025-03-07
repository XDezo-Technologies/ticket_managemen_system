@extends('layouts.main')

@section('container') 
<div class="container">
    <h2>🎟️ Ticket List</h2>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Filter Section -->
    <form action="{{ route('Ticket.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <select name="status" class="form-control">
                    <option value="">Filter by Status</option>
                    <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
                    <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="priority" class="form-control">
                    <option value="">Filter by Priority</option>
                    <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>
                    <option value="urgent" {{ request('priority') == 'urgent' ? 'selected' : '' }}>Urgent</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Apply Filters</button>
            </div>
        </div>
    </form>

    <!-- Tickets Table -->
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
