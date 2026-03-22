@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __('backend.create_new_user') }}</h5>
                <a href="{{ route('backend.users.index') }}" class="btn btn-secondary btn-sm">{{ __('backend.back') }}</a>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>{{ __('backend.whoops_errors') }}</strong><br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('backend.users.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="user-name">{{ __('backend.name') }}</label>
                        <input type="text" class="form-control" id="user-name" name="name" placeholder="John Doe" required />
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" for="user-email">{{ __('backend.email') }}</label>
                        <input type="email" class="form-control" id="user-email" name="email" placeholder="john@example.com" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="user-password">{{ __('backend.password') }}</label>
                        <input type="password" class="form-control" id="user-password" name="password" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="user-confirm-password">{{ __('backend.confirm_password') }}</label>
                        <input type="password" class="form-control" id="user-confirm-password" name="confirm-password" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('backend.assign_roles') }}</label>
                        <div class="row">
                            @foreach($roles as $role)
                            <div class="col-md-3 mb-2">
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role }}" id="role-{{ $role }}">
                                    <label class="form-check-label" for="role-{{ $role }}">
                                        {{ $role }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('backend.assign_direct_permissions') }}</label>
                        <div class="row">
                            @foreach($permissions as $permission)
                            <div class="col-md-3 mb-2">
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission }}" id="perm-{{ $permission }}">
                                    <label class="form-check-label" for="perm-{{ $permission }}">
                                        {{ $permission }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">{{ __('backend.create_user') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
