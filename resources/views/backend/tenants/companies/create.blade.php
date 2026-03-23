@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">الفنادق / {{ $tenant->name }} / الشركات /</span> إضافة شركة جديدة</h4>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center mb-3 border-bottom pb-3">
            <h5 class="mb-0 text-primary"><i class="bx mx-1 bx-building"></i>البيانات الإدارية للشركة الجديدة</h5>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('backend.tenants.companies.store', $tenant) }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">إسم الشركة/المنشأة <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">حالة الحساب <span class="text-danger">*</span></label>
                        <select name="status" class="form-select" required>
                            <option value="نشط (أساسي)" {{ old('status') == 'نشط (أساسي)' ? 'selected' : '' }}>نشط (أساسي)</option>
                            <option value="فرعي" {{ old('status') == 'فرعي' ? 'selected' : '' }}>فرعي</option>
                            <option value="موقوف" {{ old('status') == 'موقوف' ? 'selected' : '' }}>موقوف</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">تاريخ نهاية صلاحية الحساب (نزيل)</label>
                        <input type="date" name="nazeel_account_expiry" class="form-control" value="{{ old('nazeel_account_expiry') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">رمز المنشأة (Facility Code)</label>
                        <input type="text" name="facility_code" class="form-control" value="{{ old('facility_code') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">أقصى عدد للوحدات <span class="text-danger">*</span></label>
                        <input type="number" name="max_units" class="form-control" required min="1" value="{{ old('max_units', 100) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">نوع الحساب <span class="text-danger">*</span></label>
                        <select name="account_type" class="form-select" required>
                            <option value="أساسي" {{ old('account_type') == 'أساسي' ? 'selected' : '' }}>أساسي</option>
                            <option value="متقدم" {{ old('account_type') == 'متقدم' ? 'selected' : '' }}>متقدم</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">العنوان <span class="text-danger">*</span></label>
                        <input type="text" name="address" class="form-control" required value="{{ old('address') }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">رقم المبنى</label>
                        <input type="text" name="building_number" class="form-control" value="{{ old('building_number') }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">الرقم الفرعي</label>
                        <input type="text" name="sub_number" class="form-control" value="{{ old('sub_number') }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">الرمز البريدي</label>
                        <input type="text" name="postal_code" class="form-control" value="{{ old('postal_code') }}">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">البريد الإلكتروني للشركة <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                    </div>
                </div>

                <div class="mt-4 pt-2 border-top">
                    <button type="submit" class="btn btn-primary">حفظ الشركة</button>
                    <a href="{{ route('backend.tenants.companies.index', $tenant) }}" class="btn btn-outline-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
