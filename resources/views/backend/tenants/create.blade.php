@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __('backend.register_new_hotel') }}</h5>
                <a href="{{ route('backend.tenants.index') }}" class="btn btn-secondary btn-sm">{{ __('backend.back') }}</a>
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

                <form method="POST" action="{{ route('backend.tenants.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="tenant-name">{{ __('backend.hotel_name') }}</label>
                        <input type="text" class="form-control" id="tenant-name" name="name" value="{{ old('name') }}" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tenant-slug">{{ __('backend.subdomain_slug') }}</label>
                        <input type="text" class="form-control" id="tenant-slug" name="slug" value="{{ old('slug') }}" required />
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" for="tenant-admin-name">{{ __('backend.admin_name') }}</label>
                        <input type="text" class="form-control" id="tenant-admin-name" name="admin_name" value="{{ old('admin_name') }}" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tenant-email">{{ __('backend.email') }}</label>
                        <input type="email" class="form-control" id="tenant-email" name="email" value="{{ old('email') }}" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tenant-phone">{{ __('backend.phone') }}</label>
                        <input type="text" class="form-control" id="tenant-phone" name="phone" value="{{ old('phone') }}" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tenant-password">{{ __('backend.password') }}</label>
                        <input type="password" class="form-control" id="tenant-password" name="password" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tenant-password-confirmation">{{ __('backend.confirm_password') }}</label>
                        <input type="password" class="form-control" id="tenant-password-confirmation" name="password_confirmation" required />
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('backend.register_hotel') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
