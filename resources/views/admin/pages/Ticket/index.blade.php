@extends('admin.inc.main')
@section('container')

<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <h2>All Tickets</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Priority</th>
                <th>Category</th>
                <th>Created By</th>
                <th>Assigned To</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr>
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->title }}</td>
                <td><span class="badge bg-info">{{ ucfirst($ticket->status) }}</span></td>
                <td><span class="badge bg-warning">{{ ucfirst($ticket->priority) }}</span></td>
                <td>{{ $ticket->category ?? 'N/A' }}</td>
                <td>{{ $ticket->creator->name }}</td>
                <td>{{ $ticket->assigned_to ? $ticket->assignee->name : 'Not Assigned' }}</td>
                <td>{{ $ticket->created_at->format('d M Y, H:i A') }}</td>
                <td>
                    <a href="{{ route('AdminTicket.show', $ticket->id) }}" class="btn btn-primary btn-sm">View</a>
                    <form action="{{ route('AdminTicket.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this ticket?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection