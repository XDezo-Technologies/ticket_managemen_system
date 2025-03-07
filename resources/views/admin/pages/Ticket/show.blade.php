@extends('admin.inc.main')
@section('container')

<div class="container mt-4"> 

    <h2 class="mb-4">🎫 Ticket Details</h2>

    <div class="card shadow-lg p-4">
        <h4 class="text-primary">{{ $ticket->title }}</h4>
        <p><strong>Description:</strong> {{ $ticket->description }}</p>

        <p>
            <strong>Status:</strong> 
            <span class="badge 
                {{ $ticket->status == 'open' ? 'bg-success' : 
                   ($ticket->status == 'in_progress' ? 'bg-warning' : 
                   ($ticket->status == 'resolved' ? 'bg-info' : 'bg-danger')) }}">
                {{ ucfirst($ticket->status) }}
            </span>
        </p>

        <p>
            <strong>Priority:</strong> 
            <span class="badge 
                {{ $ticket->priority == 'low' ? 'bg-secondary' : 
                   ($ticket->priority == 'medium' ? 'bg-warning' : 'bg-danger') }}">
                {{ ucfirst($ticket->priority) }}
            </span>
        </p>

        <p><strong>Category:</strong> {{ $ticket->category ?? 'Not Specified' }}</p>
        <p><strong>Created By:</strong> {{ $ticket->creator->name }}</p>
        <p><strong>Assigned To:</strong> {{ $ticket->assignee->name ?? 'Not Assigned' }}</p>

        <hr>
        <h4>📎 Attachments</h4>
        <ul class="list-group">
            @foreach($ticket->attachments as $attachment)
                <li class="list-group-item">
                    <a href="{{ asset('storage/' . $attachment->file_path) }}" target="_blank">
                        📄 {{ basename($attachment->file_path) }}
                    </a> 
                    <small class="text-muted">(Uploaded by: {{ $attachment->uploader->name }})</small>
                </li>
            @endforeach
        </ul>

        <hr>
        <h4>💬 Comments</h4>
        <div class="comments-section">
            @foreach($ticket->comments as $comment)
                <div class="alert alert-light">
                    <strong>{{ $comment->user->name }}:</strong> 
                    {{ $comment->message }} 
                    <small class="text-muted">({{ $comment->created_at->diffForHumans() }})</small>
                </div>
            @endforeach

            <form action="{{ route('comment.store') }}" method="POST">
                @csrf
                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                <textarea name="message" class="form-control" rows="3" placeholder="Write your comment..." required></textarea>
                <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
            </form>
        </div>

        <hr>
        <h4>🔧 Manage Ticket</h4>
        <form action="{{ route('AdminTicket.update', $ticket->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Status:</label>
                <select name="status" class="form-control">
                    <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="in_progress" {{ $ticket->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="resolved" {{ $ticket->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                    <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Assign To:</label>
                <select name="assigned_to" class="form-control">
                    <option value="">Not Assigned</option>
                    @foreach($staff as $staffMember)
                        <option value="{{ $staffMember->id }}" {{ $ticket->assigned_to == $staffMember->id ? 'selected' : '' }}>
                            {{ $staffMember->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">✅ Update Ticket</button>
        </form>

    </div>
</div>

@endsection
