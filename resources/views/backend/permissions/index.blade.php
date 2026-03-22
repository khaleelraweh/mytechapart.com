@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ __('backend.permissions_management') }}</h5>
        <a href="{{ route('backend.permissions.create') }}" class="btn btn-primary">{{ __('backend.create_new_permission') }}</a>
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
                    <th>{{ __('backend.no') }}</th>
                    <th>{{ __('backend.name') }}</th>
                    <th>{{ __('backend.actions') }}</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($permissions as $key => $permission)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td><span class="badge bg-label-success me-1">{{ $permission->name }}</span></td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{ route('backend.permissions.edit', $permission->id) }}">{{ __('backend.edit') }}</a>
                        <form action="{{ route('backend.permissions.destroy', $permission->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('backend.are_you_sure') }}')">{{ __('backend.delete') }}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
