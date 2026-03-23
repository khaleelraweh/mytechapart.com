@extends('layouts.tenant')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">{{ __('tenant.company') }} /</span> {{ __('tenant.edit') }}</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header border-bottom">
            <h5 class="mb-0">{{ __('tenant.company_details') }}</h5>
            <small class="text-muted">{{ __('tenant.some_fields_readonly') }}</small>
        </div>
        <div class="card-body pt-4">
            <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3 mb-4">
                    <h6 class="mb-0 text-primary">Editable Information (معلومات قابلة للتعديل)</h6>
                    
                    <div class="col-md-6">
                        <label class="form-label">{{ __('tenant.name') }} <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required value="{{ old('name', $company->name) }}">
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">{{ __('tenant.phone_number') }}</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $company->phone) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">{{ __('tenant.manager_mobile') }}</label>
                        <input type="text" name="manager_name" class="form-control" value="{{ old('manager_name', $company->manager_name) }}">
                    </div>
                    
                    <div class="col-md-12">
                        <label class="form-label">{{ __('tenant.logo') }}</label>
                        <div class="d-flex align-items-center gap-3">
                            @if($company->logo)
                                <img src="{{ asset('storage/'.$company->logo) }}" alt="Logo" class="rounded border" style="height:80px;object-fit:contain;">
                            @endif
                            <input type="file" name="logo" class="form-control" accept="image/jpg,image/jpeg,image/png">
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row g-3">
                    <h6 class="mb-0 text-muted">Administrative Information (معلومات إدارية القراءة فقط)</h6>

                    <div class="col-md-4">
                        <label class="form-label">{{ __('tenant.status') }}</label>
                        <input type="text" class="form-control" readonly value="{{ $company->status }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">{{ __('tenant.guest_account_expiry') }}</label>
                        <input type="text" class="form-control" readonly value="{{ $company->nazeel_account_expiry ? \Carbon\Carbon::parse($company->nazeel_account_expiry)->format('Y-m-d') : '' }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">{{ __('tenant.property_code') }}</label>
                        <input type="text" class="form-control" readonly value="{{ $company->facility_code }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">{{ __('tenant.max_units') }}</label>
                        <input type="text" class="form-control" readonly value="{{ $company->max_units }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">{{ __('tenant.account_type') }}</label>
                        <input type="text" class="form-control" readonly value="{{ $company->account_type }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">{{ __('tenant.email') }}</label>
                        <input type="text" class="form-control" readonly value="{{ $company->email }}">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">{{ __('tenant.address') }}</label>
                        <textarea class="form-control" readonly rows="2">{{ $company->address }}</textarea>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">{{ __('tenant.building_number') }}</label>
                        <input type="text" class="form-control" readonly value="{{ $company->building_number }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">{{ __('tenant.sub_number') }}</label>
                        <input type="text" class="form-control" readonly value="{{ $company->sub_number }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">{{ __('tenant.postal_code') }}</label>
                        <input type="text" class="form-control" readonly value="{{ $company->postal_code }}">
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-end gap-2">
                    <a href="{{ route('companies.index') }}" class="btn btn-secondary">{{ __('tenant.back') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('tenant.save_changes') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
