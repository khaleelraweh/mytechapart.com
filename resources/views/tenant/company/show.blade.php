@extends('layouts.tenant')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">{{ __('tenant.company') }} /</span> {{ $company->name }}</h4>

    <div class="card mb-4">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('tenant.company_details') }}</h5>
            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary btn-sm"><i class="bx bx-edit-alt me-1"></i>{{ __('tenant.edit') }}</a>
        </div>
        <div class="card-body pt-4">
            <div class="row mb-3">
                <div class="col-md-4"><strong>{{ __('tenant.name') }}:</strong></div>
                <div class="col-md-8">{{ $company->name ?? '—' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>{{ __('tenant.status') }}:</strong></div>
                <div class="col-md-8"><span class="badge bg-label-info">{{ $company->status }}</span></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>{{ __('tenant.guest_account_expiry') }}:</strong></div>
                <div class="col-md-8">{{ $company->nazeel_account_expiry ? \Carbon\Carbon::parse($company->nazeel_account_expiry)->format('Y-m-d') : '—' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>{{ __('tenant.property_code') }}:</strong></div>
                <div class="col-md-8">{{ $company->facility_code ?? '—' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>{{ __('tenant.max_units') }}:</strong></div>
                <div class="col-md-8">{{ $company->max_units ?? '—' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>{{ __('tenant.account_type') }}:</strong></div>
                <div class="col-md-8">{{ $company->account_type ?? '—' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>{{ __('tenant.address') }}:</strong></div>
                <div class="col-md-8">{{ $company->address ?? '—' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>{{ __('tenant.building_number') }}:</strong></div>
                <div class="col-md-8">{{ $company->building_number ?? '—' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>{{ __('tenant.sub_number') }}:</strong></div>
                <div class="col-md-8">{{ $company->sub_number ?? '—' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>{{ __('tenant.postal_code') }}:</strong></div>
                <div class="col-md-8">{{ $company->postal_code ?? '—' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>{{ __('tenant.email') }}:</strong></div>
                <div class="col-md-8">{{ $company->email ?? '—' }}</div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-md-4"><strong>{{ __('tenant.phone_number') }}:</strong></div>
                <div class="col-md-8">{{ $company->phone ?? '—' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>{{ __('tenant.manager_mobile') }}:</strong></div>
                <div class="col-md-8">{{ $company->manager_name ?? '—' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>{{ __('tenant.logo') }}:</strong></div>
                <div class="col-md-8">
                    @if($company->logo)
                        <img src="{{ asset('storage/'.$company->logo) }}" alt="Logo" class="rounded border" style="height:80px;object-fit:contain;">
                    @else
                        —
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('companies.index') }}" class="btn btn-secondary">{{ __('tenant.back') }}</a>
        </div>
    </div>
</div>
@endsection
