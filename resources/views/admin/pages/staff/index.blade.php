@extends('admin.inc.main')
@section('container')

<div class="container">
<div class="container mt-4">
    <h2>📌 Support Staff List</h2>

    <table class="table table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Assigned Tickets</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staff as $key => $member)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->tickets?->count() ?? 0 }}</td>
                    <td>
                        <a href="{{ route('support_staff.show', $member->id) }}" class="btn btn-info btn-sm">👀 View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
