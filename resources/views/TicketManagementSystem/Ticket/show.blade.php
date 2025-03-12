@extends('layouts.main')

@section('container') 
<div class="container">
    <h2>🎫 Ticket Details</h2>

    <div class="card p-3">
        <div class="card shadow-lg p-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">🎫 {{ $ticket->title }}</h4>
            </div>
        
            <div class="card-body">
                <p><strong>📄 Description:</strong> {{ $ticket->description }}</p>
        
                <p>
                    <strong>📌 Status:</strong> 
                    <span class="badge 
                        {{ $ticket->status == 'open' ? 'bg-success' : 
                           ($ticket->status == 'in_progress' ? 'bg-warning' : 
                           ($ticket->status == 'resolved' ? 'bg-info' : 'bg-danger')) }}">
                        {{ ucfirst($ticket->status) }}
                    </span>
                </p>
        
                <p>
                    <strong>⚡ Priority:</strong> 
                    <span class="badge 
                        {{ $ticket->priority == 'low' ? 'bg-secondary' : 
                           ($ticket->priority == 'medium' ? 'bg-warning' : 'bg-danger') }}">
                        {{ ucfirst($ticket->priority) }}
                    </span>
                </p>
        
                <p>
                    <strong>📂 Category:</strong> 
                    <span class="text-muted">{{ $ticket->category ?? 'Not Specified' }}</span>
                </p>
        
                <p>
                    <strong>👤 Created By:</strong> 
                    <span class="text-primary">{{ $ticket->creator->name }}</span>
                </p>
        
                <p>
                    <strong>👨‍💻 Assigned To:</strong> 
                    <span class="text-danger">{{ $ticket->assignee->name ?? 'Not Assigned' }}</span>
                </p>
            </div>
        </div>
        
        <hr>
        <h4>📎 Attachments</h4>
        <ul>
            @foreach($ticket->attachments as $attachment)
                <li>
                    <a href="{{ asset('storage/' . $attachment->file_path) }}" target="_blank">
                        {{ basename($attachment->file_path) }}
                    </a> (Uploaded by: {{ $attachment->uploader->name }})
                </li>
            @endforeach
        </ul>

        
            <form action="{{ route('attachment.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                {{-- <input type="file" name="file" required> --}}
                <div class="mb-3">
                    <div class="img-scrapper">
                        {{-- <div class="form-group col-12 mb-0">
                            <label class="col-form-label">Image</label>
                        </div> --}}


                        <!-- image box where image from model come -->
                        <div class="input-group mb-3 col-12">
                            <input id="imagebox" type="text" class="form-control" disabled name="image">
                            <!-- img come above ☝ -->
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                                    data-bs-target="#modalId">
                                    Choose Image
                                </button>
                            </div>
                        </div>
                        <!-- we use modal to choose image -->
                        <div class="mb-3">
                            <!-- Modal trigger button -->

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <!-- styled to see which image is selected  as type radio opacity is 0-->
                                                <style>
                                                    [type=radio]:checked+img {
                                                        outline: 2px solid #f00;
                                                    }
                                                </style>


                                                <!-- for choosing 1 image from multiple option we use type radio -->
                                                @foreach ($files as $file)
                                                    <label class="col-4">
                                                        <input type="radio" name="image" value="{{ $file->image }}"
                                                            style="opacity: 0;">
                                                        <img src="{{ asset('uploads/' . $file->image) }}" alt="Image"
                                                            height="100px" width="100px" style="margin-right: 20px;">
                                                    </label>
                                                @endforeach
                                                {{-- uploads/ specifies that the image is stored in the public/uploads folder.
                                                $file->img is a variable holding the image filename (e.g., example.jpg) retrieved from your database. --}}


                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                                onclick=" firstFunction()">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Optional: Place to the bottom of scripts -->
                            <script>
                                const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

                                function firstFunction() {
                                    var x = document.querySelector('input[name=image]:checked').value;
                                    document.getElementById('imagebox').value = x; // use .innerHTML if we want data on label
                                }
                            </script>
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">📎 Upload Attachment</button>
            </form>
       

        <hr>
        <h4>💬 Comments</h4>
        @foreach($ticket->comments as $comment)
            <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->message }} ({{ $comment->created_at->diffForHumans() }})</p>
        @endforeach

        
            <form action="{{ route('comment.store') }}" method="POST">
                @csrf
                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                <textarea name="message" class="form-control" rows="3" placeholder="Write your comment..." required></textarea>
                <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
            </form>
       

        <hr>
        
            {{-- <h4>🔧 Manage Ticket</h4>
            <form action="{{ route('Ticket.update', $ticket->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label>Status:</label>
                <select name="status" class="form-control">
                    <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="in_progress" {{ $ticket->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="resolved" {{ $ticket->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                    <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>

                <label>Assign To:</label>
                <select name="assigned_to" class="form-control">
                    <option value="">Not Assigned</option>
                    @foreach($staff as $staffMember)
                        <option value="{{ $staffMember->id }}" {{ $ticket->assigned_to == $staffMember->id ? 'selected' : '' }}>
                            {{ $staffMember->name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-success mt-2">Update Ticket</button>
            </form> --}}
       
    </div>
</div>
@endsection
