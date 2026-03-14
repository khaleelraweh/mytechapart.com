@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Permissions Management</h5>
        <a href="{{ route('backend.permissions.create') }}" class="btn btn-primary">Create New Permission</a>
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
                @foreach ($permissions as $key => $permission)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td><span class="badge bg-label-success me-1">{{ $permission->name }}</span></td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{ route('backend.permissions.edit', $permission->id) }}">Edit</a>
                        <form action="{{ route('backend.permissions.destroy', $permission->id) }}" method="POST" style="display:inline">
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
