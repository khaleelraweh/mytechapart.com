@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create New Role</h5>
                <a href="{{ route('backend.roles.index') }}" class="btn btn-secondary btn-sm">Back</a>
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

                <form method="POST" action="{{ route('backend.roles.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="role-name">Role Name</label>
                        <input type="text" class="form-control" id="role-name" name="name" placeholder="Enter Role Name" required />
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Assign Permissions</label>
                        <div class="row">
                            @foreach($permissions as $value)
                            <div class="col-md-3 mb-2">
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $value->name }}" id="perm-{{ $value->id }}">
                                    <label class="form-check-label" for="perm-{{ $value->id }}">
                                        {{ $value->name }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Create Role</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
