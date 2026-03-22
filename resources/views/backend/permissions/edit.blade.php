@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __('backend.edit_permission') }}</h5>
                <a href="{{ route('backend.permissions.index') }}" class="btn btn-secondary btn-sm">{{ __('backend.back') }}</a>
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

                <form method="POST" action="{{ route('backend.permissions.update', $permission->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label" for="permission-name">{{ __('backend.permission_name') }}</label>
                        <input type="text" class="form-control" id="permission-name" name="name" value="{{ $permission->name }}" required />
                    </div>
                    
                    <button type="submit" class="btn btn-primary">{{ __('backend.update_permission') }}</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
