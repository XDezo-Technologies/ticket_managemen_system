@extends('Support_Staff.layout.main')

@section('container')

<div class="container">
    <h2 class="mb-4 text-primary">📊 Staff Dashboard</h2>

    <!-- Dashboard Stats -->
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

    <!-- Assigned Tickets Table -->
    <div class="table-responsive mt-4">
        <h4>🎟️ Assigned Tickets</h4>
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($assignedTickets as $index => $ticket)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $ticket->title }}</td>
                    <td>
                        <span class="badge {{ $ticket->status == 'open' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($ticket->status) }}
                        </span>
                    </td>
                    <td>{{ $ticket->created_at->format('d M Y') }}</td>
                    <td>
                         <a href="{{ route('staffTicket.show', $ticket->id) }}" class="btn btn-sm btn-primary">
                            🔍 View
                        </a> 
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">No assigned tickets</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
