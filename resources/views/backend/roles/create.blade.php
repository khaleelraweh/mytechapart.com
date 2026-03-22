@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __('backend.create_new_role') }}</h5>
                <a href="{{ route('backend.roles.index') }}" class="btn btn-secondary btn-sm">{{ __('backend.back') }}</a>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        {{ __('backend.whoops_errors') }}<br><br>
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
                        <label class="form-label" for="role-name">{{ __('backend.role_name') }}</label>
                        <input type="text" class="form-control" id="role-name" name="name" placeholder="{{ __('backend.role_name') }}" required />
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">{{ __('backend.assign_permissions') }}</label>
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
                    
                    <button type="submit" class="btn btn-primary">{{ __('backend.create_role') }}</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
