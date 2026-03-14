@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Roles Management</h5>
        <a href="{{ route('backend.roles.create') }}" class="btn btn-primary">Create New Role</a>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success mx-4">
            <p class="mb-0">{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td><span class="badge bg-label-primary me-1">{{ $role->name }}</span></td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{ route('backend.roles.edit', $role->id) }}">Edit</a>
                        <form action="{{ route('backend.roles.destroy', $role->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
