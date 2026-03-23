@extends('layouts.tenant')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- Breadcrumb --}}
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">{{ __('tenant.company') }} /</span>
        {{ __('tenant.properties_data') }}
    </h4>

    {{-- Alerts --}}
    @if(session('success_tab1'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bx bx-check-circle me-1"></i> {{ session('success_tab1') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('success_tab2'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bx bx-check-circle me-1"></i> {{ session('success_tab2') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bx bx-error-circle me-1"></i>
            <ul class="mb-0">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Nav tabs --}}
    <ul class="nav nav-tabs mb-4" id="companyTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ session('success_tab2') ? '' : 'active' }}"
                    id="tab-facility-tab" data-bs-toggle="tab" data-bs-target="#tab-facility"
                    type="button" role="tab">
                <i class="bx bx-building me-1"></i>{{ __('tenant.edit_facility') }}
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ session('success_tab2') ? 'active' : '' }}"
                    id="tab-business-tab" data-bs-toggle="tab" data-bs-target="#tab-business"
                    type="button" role="tab">
                <i class="bx bx-file me-1"></i>{{ __('tenant.property_business_data') }}
            </button>
        </li>
    </ul>

    <div class="tab-content">

        {{-- ============================================================ --}}
        {{-- TAB 1 – تعديل المنشأة                                         --}}
        {{-- ============================================================ --}}
        <div class="tab-pane fade {{ session('success_tab2') ? '' : 'show active' }}" id="tab-facility" role="tabpanel">
            <form action="{{ route('company.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                {{-- ── Section: Header Info ── --}}
                <div class="card mb-4">
                    <div class="card-header border-bottom">
                        <h5 class="mb-0"><i class="bx bx-info-circle me-1 text-primary"></i>{{ __('tenant.basic_info') }}</h5>
                    </div>
                    <div class="card-body pt-4">

                        {{-- Active badge --}}
                        <div class="mb-4 d-flex align-items-center gap-3">
                            <span class="badge bg-label-success fs-6 px-3 py-2">
                                <i class="bx bx-check-circle me-1"></i>{{ __('tenant.facility_active') }}
                            </span>
                            @if($property)
                            <span class="text-muted small">
                                {{ __('tenant.property_code') }}: <strong>{{ $property->property_code }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="row g-3">
                            {{-- اسم المنشأة عربي --}}
                            <div class="col-md-6">
                                <label class="form-label">{{ __('tenant.facility_name') }} (عربي) <span class="text-danger">*</span></label>
                                <input type="text" name="name[ar]" class="form-control @error('name.ar') is-invalid @enderror"
                                    required value="{{ old('name.ar', $property?->getTranslation('name','ar',false)) }}"
                                    placeholder="اسم المنشأة بالعربية">
                                @error('name.ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            {{-- اسم المنشأة انجليزي --}}
                            <div class="col-md-6">
                                <label class="form-label">{{ __('tenant.facility_name') }} (English)</label>
                                <input type="text" name="name[en]" class="form-control"
                                    value="{{ old('name.en', $property?->getTranslation('name','en',false)) }}"
                                    placeholder="Property name in English">
                            </div>

                            {{-- الاسم المستخدم --}}
                            <div class="col-md-6">
                                <label class="form-label">{{ __('tenant.username') }}</label>
                                <input type="text" name="username" class="form-control"
                                    value="{{ old('username', $property?->username) }}"
                                    placeholder="{{ __('tenant.username') }}">
                            </div>

                            {{-- نوع المنشأة --}}
                            <div class="col-md-6">
                                <label class="form-label">{{ __('tenant.property_type') }} <span class="text-danger">*</span></label>
                                <select name="type" class="form-select" required>
                                    <option value="hotel" {{ old('type', $property?->type) == 'hotel' ? 'selected' : '' }}>{{ __('tenant.hotel') }}</option>
                                    <option value="apartment" {{ old('type', $property?->type) == 'apartment' ? 'selected' : '' }}>{{ __('tenant.apartment_complex') }}</option>
                                    <option value="resort" {{ old('type', $property?->type) == 'resort' ? 'selected' : '' }}>{{ __('tenant.resort') }}</option>
                                    <option value="serviced_apartments" {{ old('type', $property?->type) == 'serviced_apartments' ? 'selected' : '' }}>{{ __('tenant.serviced_apartments') }}</option>
                                </select>
                            </div>

                            {{-- الشعار --}}
                            <div class="col-md-12">
                                <label class="form-label">{{ __('tenant.logo') }}</label>
                                <div class="d-flex align-items-center gap-3">
                                    @if($property?->logo)
                                        <img src="{{ asset('storage/'.$property->logo) }}" alt="Logo" class="rounded border" style="height:80px;object-fit:contain;">
                                    @else
                                        <div class="bg-light rounded border d-flex align-items-center justify-content-center" style="width:120px;height:80px;">
                                            <i class="bx bx-image text-muted" style="font-size:2rem;"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <input type="file" name="logo" class="form-control" accept="image/jpg,image/jpeg,image/png">
                                        <small class="text-muted d-block mt-1">{{ __('tenant.logo_hint') }}</small>
                                    </div>
                                </div>
                            </div>

                            {{-- أقصى عدد للوحدات --}}
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.max_units') }}</label>
                                <input type="number" name="max_units" class="form-control" min="1"
                                    value="{{ old('max_units', $property?->max_units) }}">
                            </div>

                            {{-- اصدار الحساب --}}
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.account_edition') }}</label>
                                <input type="text" name="account_edition" class="form-control" readonly
                                    value="{{ old('account_edition', $property?->account_edition ?? __('tenant.standard')) }}">
                            </div>

                            {{-- حالة حساب نزيل --}}
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.guest_account_status') }}</label>
                                <input type="text" class="form-control" readonly value="{{ __('tenant.active') }}">
                            </div>

                            {{-- تاريخ انتهاء صلاحية حساب نزيل --}}
                            <div class="col-md-6">
                                <label class="form-label">{{ __('tenant.guest_account_expiry') }}</label>
                                <input type="text" class="form-control" readonly
                                    value="{{ $property?->guest_account_expiry ? \Carbon\Carbon::parse($property->guest_account_expiry)->format('d/m/Y') : '—' }}">
                            </div>

                            {{-- رمز المنشأة --}}
                            <div class="col-md-6">
                                <label class="form-label">{{ __('tenant.property_code') }}</label>
                                <input type="text" class="form-control" readonly
                                    value="{{ $property?->property_code ?? '—' }}">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ── Section: Tax/Zakat ── --}}
                <div class="card mb-4">
                    <div class="card-header border-bottom">
                        <h5 class="mb-0"><i class="bx bx-receipt me-1 text-primary"></i>{{ __('tenant.zakat_tax_info') }}</h5>
                    </div>
                    <div class="card-body pt-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('tenant.tax_authority_id_type') }}</label>
                                <select name="tax_authority_id_type" class="form-select">
                                    <option value="">-- {{ __('tenant.select') }} --</option>
                                    <option value="vat" {{ old('tax_authority_id_type', $property?->tax_authority_id_type) == 'vat' ? 'selected' : '' }}>{{ __('tenant.vat_id') }}</option>
                                    <option value="tin" {{ old('tax_authority_id_type', $property?->tax_authority_id_type) == 'tin' ? 'selected' : '' }}>{{ __('tenant.tin') }}</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('tenant.tax_authority_id_number') }}</label>
                                <input type="text" name="tax_authority_id" class="form-control"
                                    value="{{ old('tax_authority_id', $property?->tax_authority_id) }}"
                                    placeholder="XXXXXXXXXXXXXXX">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ── Section: Location ── --}}
                <div class="card mb-4">
                    <div class="card-header border-bottom">
                        <h5 class="mb-0"><i class="bx bx-map me-1 text-primary"></i>{{ __('tenant.location') }}</h5>
                    </div>
                    <div class="card-body pt-4">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.country') }} <span class="text-danger">*</span></label>
                                <input type="text" name="country" class="form-control @error('country') is-invalid @enderror"
                                    required value="{{ old('country', $property?->country) }}" placeholder="المملكة العربية السعودية">
                                @error('country')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.region') }} <span class="text-danger">*</span></label>
                                <input type="text" name="region" class="form-control @error('region') is-invalid @enderror"
                                    required value="{{ old('region', $property?->region) }}" placeholder="منطقة مكة المكرمة">
                                @error('region')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            {{-- المدينة عربي --}}
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.city') }} (عربي) <span class="text-danger">*</span></label>
                                <input type="text" name="city[ar]" class="form-control @error('city.ar') is-invalid @enderror"
                                    required value="{{ old('city.ar', $property?->getTranslation('city','ar',false)) }}"
                                    placeholder="مكة المكرمة">
                                @error('city.ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            {{-- المدينة انجليزي --}}
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.city') }} (English)</label>
                                <input type="text" name="city[en]" class="form-control"
                                    value="{{ old('city.en', $property?->getTranslation('city','en',false)) }}"
                                    placeholder="Makkah">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.district') }} <span class="text-danger">*</span></label>
                                <input type="text" name="district" class="form-control @error('district') is-invalid @enderror"
                                    required value="{{ old('district', $property?->district) }}" placeholder="حي العزيزية">
                                @error('district')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.street') }} <span class="text-danger">*</span></label>
                                <input type="text" name="street" class="form-control @error('street') is-invalid @enderror"
                                    required value="{{ old('street', $property?->street) }}" placeholder="شارع إبراهيم الخليل">
                                @error('street')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.timezone') }} <span class="text-danger">*</span></label>
                                <select name="timezone" class="form-select @error('timezone') is-invalid @enderror" required>
                                    <option value="">-- {{ __('tenant.select') }} --</option>
                                    <option value="Asia/Riyadh" {{ old('timezone', $property?->timezone) == 'Asia/Riyadh' ? 'selected' : '' }}>Asia/Riyadh (UTC+3)</option>
                                    <option value="Asia/Dubai"  {{ old('timezone', $property?->timezone) == 'Asia/Dubai'  ? 'selected' : '' }}>Asia/Dubai (UTC+4)</option>
                                    <option value="Asia/Kuwait" {{ old('timezone', $property?->timezone) == 'Asia/Kuwait' ? 'selected' : '' }}>Asia/Kuwait (UTC+3)</option>
                                    <option value="Africa/Cairo" {{ old('timezone', $property?->timezone) == 'Africa/Cairo' ? 'selected' : '' }}>Africa/Cairo (UTC+2)</option>
                                    <option value="UTC"         {{ old('timezone', $property?->timezone) == 'UTC'         ? 'selected' : '' }}>UTC</option>
                                </select>
                                @error('timezone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.latitude') }}</label>
                                <input type="number" step="any" name="latitude" class="form-control"
                                    value="{{ old('latitude', $property?->latitude) }}" placeholder="21.422510">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.longitude') }}</label>
                                <input type="number" step="any" name="longitude" class="form-control"
                                    value="{{ old('longitude', $property?->longitude) }}" placeholder="39.826168">
                            </div>

                            {{-- العنوان عربي --}}
                            <div class="col-md-6">
                                <label class="form-label">{{ __('tenant.address') }} (عربي) <span class="text-danger">*</span></label>
                                <input type="text" name="address[ar]" class="form-control @error('address.ar') is-invalid @enderror"
                                    required value="{{ old('address.ar', $property?->getTranslation('address','ar',false)) }}"
                                    placeholder="العنوان التفصيلي بالعربية">
                                @error('address.ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            {{-- العنوان انجليزي --}}
                            <div class="col-md-6">
                                <label class="form-label">{{ __('tenant.address') }} (English)</label>
                                <input type="text" name="address[en]" class="form-control"
                                    value="{{ old('address.en', $property?->getTranslation('address','en',false)) }}"
                                    placeholder="Full address in English">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">{{ __('tenant.building_number') }} <span class="text-danger">*</span></label>
                                <input type="text" name="building_number" class="form-control @error('building_number') is-invalid @enderror"
                                    required value="{{ old('building_number', $property?->building_number) }}" placeholder="1234">
                                @error('building_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">{{ __('tenant.sub_number') }}</label>
                                <input type="text" name="sub_number" class="form-control"
                                    value="{{ old('sub_number', $property?->sub_number) }}" placeholder="0000">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">{{ __('tenant.po_box') }}</label>
                                <input type="text" name="po_box" class="form-control"
                                    value="{{ old('po_box', $property?->po_box) }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">{{ __('tenant.postal_code') }} <span class="text-danger">*</span></label>
                                <input type="text" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror"
                                    required value="{{ old('postal_code', $property?->postal_code) }}" placeholder="12345">
                                @error('postal_code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('tenant.short_address') }}</label>
                                <input type="text" name="short_address" class="form-control"
                                    value="{{ old('short_address', $property?->short_address) }}" placeholder="XXXX0000">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ── Section: Contact ── --}}
                <div class="card mb-4">
                    <div class="card-header border-bottom">
                        <h5 class="mb-0"><i class="bx bx-phone me-1 text-primary"></i>{{ __('tenant.contact_info') }}</h5>
                    </div>
                    <div class="card-body pt-4">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.phone_number') }} <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                    required value="{{ old('phone', $property?->phone) }}" placeholder="+966 1X XXX XXXX">
                                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.mobile_number') }} <span class="text-danger">*</span></label>
                                <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror"
                                    required value="{{ old('mobile', $property?->mobile) }}" placeholder="+966 5X XXX XXXX">
                                @error('mobile')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.fax') }}</label>
                                <input type="text" name="fax" class="form-control"
                                    value="{{ old('fax', $property?->fax) }}" placeholder="+966 1X XXX XXXX">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.hotline') }}</label>
                                <input type="text" name="hotline" class="form-control"
                                    value="{{ old('hotline', $property?->hotline) }}" placeholder="920XXXXXX">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.email') }} <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    required value="{{ old('email', $property?->email) }}" placeholder="info@hotel.com">
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.website') }}</label>
                                <input type="url" name="website" class="form-control"
                                    value="{{ old('website', $property?->website) }}" placeholder="https://hotel.com">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.manager_mobile') }}</label>
                                <input type="text" name="manager_mobile" class="form-control"
                                    value="{{ old('manager_mobile', $property?->manager_mobile) }}" placeholder="+966 5X XXX XXXX">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mb-5">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bx bx-save me-1"></i>{{ __('tenant.save_changes') }}
                    </button>
                </div>
            </form>
        </div>

        {{-- ============================================================ --}}
        {{-- TAB 2 – بيانات المنشآت (Tourism & Commercial)                 --}}
        {{-- ============================================================ --}}
        <div class="tab-pane fade {{ session('success_tab2') ? 'show active' : '' }}" id="tab-business" role="tabpanel">
            <form action="{{ route('company.settings.business.update') }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                {{-- ── Tourism Info ── --}}
                <div class="card mb-4">
                    <div class="card-header border-bottom">
                        <h5 class="mb-0"><i class="bx bx-trophy me-1 text-primary"></i>{{ __('tenant.tourism_info') }}</h5>
                        <small class="text-muted">{{ __('tenant.manage_tourism_license') }}</small>
                    </div>
                    <div class="card-body pt-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('tenant.tourism_activity_type') }}</label>
                                <input type="text" name="tourism_activity_type" class="form-control"
                                    value="{{ old('tourism_activity_type', $property?->tourism_activity_type) }}"
                                    placeholder="{{ __('tenant.eg_hotel_apartments') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('tenant.tourism_license_no') }}</label>
                                <input type="text" name="tourism_license_no" class="form-control"
                                    value="{{ old('tourism_license_no', $property?->tourism_license_no) }}"
                                    placeholder="TL-XXXX-XXXX">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.tourism_license_expiry') }}</label>
                                <input type="date" name="tourism_license_expiry" class="form-control"
                                    value="{{ old('tourism_license_expiry', $property?->tourism_license_expiry) }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.rooms_count') }}</label>
                                <input type="number" name="rooms_count" class="form-control" min="0"
                                    value="{{ old('rooms_count', $property?->rooms_count) }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.beds_count') }}</label>
                                <input type="number" name="beds_count" class="form-control" min="0"
                                    value="{{ old('beds_count', $property?->beds_count) }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">{{ __('tenant.tourism_license_file') }}</label>
                                @if($property?->tourism_license_file)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/'.$property->tourism_license_file) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                            <i class="bx bx-download me-1"></i>{{ __('tenant.view_current_file') }}
                                        </a>
                                    </div>
                                @endif
                                <input type="file" name="tourism_license_file" class="form-control" accept=".pdf,.tiff">
                                <small class="text-muted">{{ __('tenant.file_hint_pdf_tiff') }}</small>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ── Commercial Info ── --}}
                <div class="card mb-4">
                    <div class="card-header border-bottom">
                        <h5 class="mb-0"><i class="bx bx-briefcase me-1 text-primary"></i>{{ __('tenant.commercial_info') }}</h5>
                    </div>
                    <div class="card-body pt-4">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.commercial_register_no') }} <span class="text-danger">*</span></label>
                                <input type="text" name="commercial_register_no"
                                    class="form-control @error('commercial_register_no') is-invalid @enderror"
                                    required value="{{ old('commercial_register_no', $property?->commercial_register_no) }}"
                                    placeholder="XXXXXXXXXX">
                                @error('commercial_register_no')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.business_license_no') }}</label>
                                <input type="text" name="business_license_no" class="form-control"
                                    value="{{ old('business_license_no', $property?->business_license_no) }}"
                                    placeholder="BL-XXXXX">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.vat_registration_no') }} <span class="text-danger">*</span></label>
                                <input type="text" name="vat_registration_no"
                                    class="form-control @error('vat_registration_no') is-invalid @enderror"
                                    required value="{{ old('vat_registration_no', $property?->vat_registration_no) }}"
                                    placeholder="3XXXXXXXXXXXXXXXX3">
                                @error('vat_registration_no')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">{{ __('tenant.commercial_register_file') }}</label>
                                @if($property?->commercial_register_file)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/'.$property->commercial_register_file) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                            <i class="bx bx-download me-1"></i>{{ __('tenant.view_current_file') }}
                                        </a>
                                    </div>
                                @endif
                                <input type="file" name="commercial_register_file" class="form-control" accept=".pdf,.tiff">
                                <small class="text-muted">{{ __('tenant.file_hint_pdf_tiff') }}</small>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('tenant.distance_from_haram') }}</label>
                                <div class="input-group">
                                    <input type="number" step="0.01" name="distance_from_haram" class="form-control"
                                        value="{{ old('distance_from_haram', $property?->distance_from_haram) }}"
                                        placeholder="0.00">
                                    <span class="input-group-text">{{ __('tenant.km') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ── Property Description ── --}}
                <div class="card mb-4">
                    <div class="card-header border-bottom">
                        <h5 class="mb-0"><i class="bx bx-text me-1 text-primary"></i>{{ __('tenant.property_description_label') }}</h5>
                    </div>
                    <div class="card-body pt-4">
                        <div class="row g-3">
                            {{-- وصف المنشأة عربي --}}
                            <div class="col-md-12">
                                <label class="form-label">{{ __('tenant.property_description_label') }} (عربي) <span class="text-danger">*</span></label>
                                <textarea name="property_description[ar]"
                                    class="form-control @error('property_description.ar') is-invalid @enderror"
                                    rows="4" required
                                    placeholder="وصف المنشأة باللغة العربية...">{{ old('property_description.ar', $property?->getTranslation('property_description','ar',false)) }}</textarea>
                                @error('property_description.ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                <small class="text-muted">{{ __('tenant.description_size_hint') }}</small>
                            </div>
                            {{-- وصف المنشأة انجليزي --}}
                            <div class="col-md-12">
                                <label class="form-label">{{ __('tenant.property_description_label') }} (English)</label>
                                <textarea name="property_description[en]" class="form-control" rows="4"
                                    placeholder="Property description in English...">{{ old('property_description.en', $property?->getTranslation('property_description','en',false)) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mb-5">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bx bx-save me-1"></i>{{ __('tenant.save_changes') }}
                    </button>
                </div>
            </form>
        </div>

    </div>{{-- end tab-content --}}
</div>
@endsection
