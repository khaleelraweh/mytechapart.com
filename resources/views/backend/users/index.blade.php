@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Users Management</h5>
        <a href="{{ route('backend.users.create') }}" class="btn btn-primary">Create New User</a>
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
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                <span class="badge bg-label-primary">{{ $v }}</span>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{ route('backend.users.edit', $user->id) }}">Edit</a>
                        <form action="{{ route('backend.users.destroy', $user->id) }}" method="POST" style="display:inline">
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
