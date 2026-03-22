@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">SaaS Management /</span> Hotels (Tenants)</h4>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Registered Hotels</h5>
            <a href="{{ route('backend.tenants.create') }}" class="btn btn-primary btn-sm">Register New Hotel</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Hotel Name</th>
                        <th>Domain</th>
                        <th>Admin Email</th>
                        <th>Subscription</th>
                        <th>Join Date</th>
                        <th>Actions</th>
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
                                <span class="badge bg-label-success">Active</span>
                            @else
                                <span class="badge bg-label-warning">None</span>
                            @endif
                        </td>
                        <td>{{ $tenant->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('backend.tenants.edit', $tenant) }}" class="btn btn-sm btn-info"><i class="bx bx-edit"></i> Edit</a>
                            <form action="{{ route('backend.tenants.destroy', $tenant) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this hotel and all its data?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No hotels registered yet.</td>
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
