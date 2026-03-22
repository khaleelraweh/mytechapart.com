@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Hotel Details</h5>
                <a href="{{ route('backend.tenants.index') }}" class="btn btn-secondary btn-sm">Back</a>
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

                <form method="POST" action="{{ route('backend.tenants.update', $tenant->id) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label" for="tenant-name">Hotel Name</label>
                        <input type="text" class="form-control" id="tenant-name" name="name" value="{{ old('name', $tenant->name) }}" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tenant-slug">Subdomain (Slug)</label>
                        <input type="text" class="form-control" id="tenant-slug" name="slug" value="{{ old('slug', $tenant->slug) }}" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tenant-admin-name">Admin Name</label>
                        <input type="text" class="form-control" id="tenant-admin-name" name="admin_name" value="{{ old('admin_name', $admin_name) }}" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tenant-email">Email</label>
                        <input type="email" class="form-control" id="tenant-email" name="email" value="{{ old('email', $tenant->email) }}" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tenant-phone">Phone</label>
                        <input type="text" class="form-control" id="tenant-phone" name="phone" value="{{ old('phone', $tenant->phone) }}" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tenant-password">Password <small class="text-muted">(Leave blank to keep current)</small></label>
                        <input type="password" class="form-control" id="tenant-password" name="password" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tenant-password-confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="tenant-password-confirmation" name="password_confirmation" />
                    </div>

                    <button type="submit" class="btn btn-primary">Update Hotel & Admin</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
