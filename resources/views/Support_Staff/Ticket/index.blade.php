@extends('support_staff.layout.main')
@section('container')
<div class="container mt-4">
    <h2 class="mb-4 text-center text-primary">🎟️ Assigned Tickets</h2>

    <!-- Search & Filter -->
    <div class="row mb-3">
        <div class="col-md-6">
            <input type="text" id="search" class="form-control" placeholder="🔍 Search tickets...">
        </div>
        <div class="col-md-3">
            <select id="statusFilter" class="form-select">
                <option value="">📌 All Status</option>
                <option value="open">🟢 Open</option>
                <option value="closed">🔴 Closed</option>
            </select>
        </div>
    </div>

    <!-- Bootstrap Responsive Table -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tickets as $index => $ticket)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ Str::limit($ticket->description, 50) }}</td>
                    <td>
                        <span class="badge {{ $ticket->status == 'open' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($ticket->status) }}
                        </span>
                    </td>
                    <td>{{ $ticket->created_at->format('d M Y') }}</td>
                    <td>
                        {{-- <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-sm btn-primary">
                            🔍 View
                        </a> --}}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No assigned tickets</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


@endsection
