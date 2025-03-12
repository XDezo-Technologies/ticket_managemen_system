@extends('layouts.main')

@section('container') 
    <div class="container mt-3">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="background-color: rgb(213, 203, 203)">
                <h5 class="mb-0">Create Files</h5>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" method="post" action="{{ route('file.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Title</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Title"
                                aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" name="title" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control d-none" id="basic-icon-default-fullname"
                                placeholder="John Doe" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"
                                name="user_id" value="{{ auth()->user()->id }}" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Image</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bx-buildings"></i></span>
                            <input type="file" id="basic-icon-default-company" class="form-control"
                                placeholder="ACME Inc." aria-label="ACME Inc."
                                aria-describedby="basic-icon-default-company2" name="image" />
                        </div>
                    </div>
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
