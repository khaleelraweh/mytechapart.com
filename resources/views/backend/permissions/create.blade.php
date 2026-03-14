@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create New Permission</h5>
                <a href="{{ route('backend.permissions.index') }}" class="btn btn-secondary btn-sm">Back</a>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('backend.permissions.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="permission-name">Permission Name</label>
                        <input type="text" class="form-control" id="permission-name" name="name" placeholder="Enter Permission Name" required />
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Create Permission</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
