@extends('layouts.tenant')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">{{ __('tenant.company') }} /</span> {{ __('tenant.companies_list') }}</h4>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('tenant.name') }}</th>
                        <th>{{ __('tenant.status') }}</th>
                        <th>{{ __('tenant.facility_code') }}</th>
                        <th>{{ __('tenant.manager_name') }}</th>
                        <th>{{ __('tenant.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($companies as $company)
                        <tr>
                            <td><strong>{{ $company->name ?? '—' }}</strong></td>
                            <td><span class="badge bg-label-primary me-1">{{ $company->status }}</span></td>
                            <td>{{ $company->facility_code ?? '—' }}</td>
                            <td>{{ $company->manager_name ?? '—' }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('companies.show', $company->id) }}"><i class="bx bx-show-alt me-1"></i> {{ __('tenant.show') }}</a>
                                        <a class="dropdown-item" href="{{ route('companies.edit', $company->id) }}"><i class="bx bx-edit-alt me-1"></i> {{ __('tenant.edit') }}</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">{{ __('tenant.no_records_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
