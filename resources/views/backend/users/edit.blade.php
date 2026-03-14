@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit User</h5>
                <a href="{{ route('backend.users.index') }}" class="btn btn-secondary btn-sm">Back</a>
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

                <form method="POST" action="{{ route('backend.users.update', $user->id) }}">
                    @csrf
                    @method('PATCH')
                    
                    <div class="mb-3">
                        <label class="form-label" for="user-name">Name</label>
                        <input type="text" class="form-control" id="user-name" name="name" value="{{ $user->name }}" required />
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" for="user-email">Email</label>
                        <input type="email" class="form-control" id="user-email" name="email" value="{{ $user->email }}" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="user-password">Password (Leave blank to keep current)</label>
                        <input type="password" class="form-control" id="user-password" name="password" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="user-confirm-password">Confirm Password</label>
                        <input type="password" class="form-control" id="user-confirm-password" name="confirm-password" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Assign Roles</label>
                        <div class="row">
                            @foreach($roles as $role)
                            <div class="col-md-3 mb-2">
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role }}" id="role-{{ $role }}" {{ in_array($role, $userRole) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="role-{{ $role }}">
                                        {{ $role }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Assign Direct Permissions (Optional)</label>
                        <div class="row">
                            @foreach($permissions as $permission)
                            <div class="col-md-3 mb-2">
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission }}" id="perm-{{ $permission }}" {{ in_array($permission, $userPermissions) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="perm-{{ $permission }}">
                                        {{ $permission }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
