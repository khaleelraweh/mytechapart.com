@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">{{ __('backend.saas_management') }}</span> {{ __('backend.hotels_tenants') }}</h4>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('backend.registered_hotels') }}</h5>
            <a href="{{ route('backend.tenants.create') }}" class="btn btn-primary btn-sm">{{ __('backend.register_new_hotel') }}</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('backend.hotel_name') }}</th>
                        <th>{{ __('backend.domain') }}</th>
                        <th>{{ __('backend.admin_email') }}</th>
                        <th>{{ __('backend.subscription') }}</th>
                        <th>{{ __('backend.join_date') }}</th>
                        <th>{{ __('backend.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($tenants as $tenant)
                    <tr>
                        <td><strong>{{ $tenant->name }}</strong></td>
                        <td>
                            @foreach($tenant->domains as $domain)
                                <a href="{{ request()->getScheme() }}://{{ $domain->domain }}{{ request()->getPort() == 80 || request()->getPort() == 443 ? '' : ':' . request()->getPort() }}" target="_blank">{{ $domain->domain }}</a><br>
                            @endforeach
                        </td>
                        <td>{{ $tenant->email }}</td>
                        <td>
                            @if($tenant->subscriptions->count() > 0)
                                <span class="badge bg-label-success">{{ __('backend.active') }}</span>
                            @else
                                <span class="badge bg-label-warning">{{ __('backend.none') }}</span>
                            @endif
                        </td>
                        <td>{{ $tenant->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('backend.tenants.companies.index', $tenant) }}" class="btn btn-sm btn-primary"><i class="bx bx-building"></i>الشركات</a>
                            <a href="{{ route('backend.tenants.companies.create', $tenant) }}" class="btn btn-sm btn-success" title="Add Company"><i class="bx bx-plus"></i></a>
                            <a href="{{ route('backend.tenants.edit', $tenant) }}" class="btn btn-sm btn-info"><i class="bx bx-edit"></i> {{ __('backend.edit') }}</a>
                            <form action="{{ route('backend.tenants.destroy', $tenant) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('backend.are_you_sure_delete_hotel') }}');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i> {{ __('backend.delete') }}</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">{{ __('backend.no_hotels_registered') }}</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($tenants->hasPages())
        <div class="card-footer">
            {{ $tenants->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
