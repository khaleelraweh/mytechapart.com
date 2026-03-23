@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">الفنادق / {{ $tenant->name }} / الشركات والمرافق /</span> إضافة جديدة</h4>

    <div class="card mb-4">
        <div class="card-header border-bottom">
            <h5 class="mb-0 text-primary"><i class="bx mx-1 bx-building"></i>بيانات الشركة / المنشأة</h5>
        </div>
        <div class="card-body pt-4">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('backend.tenants.companies.store', $tenant) }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Nav tabs -->
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#tab-basic" aria-controls="tab-basic" aria-selected="true">
                                <i class="tf-icons bx bx-building me-1"></i> البيانات الأساسية ومعلومات الزكاة
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#tab-location" aria-controls="tab-location" aria-selected="false">
                                <i class="tf-icons bx bx-map-pin me-1"></i> الموقع ومعلومات التواصل
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#tab-commercial" aria-controls="tab-commercial" aria-selected="false">
                                <i class="tf-icons bx bx-briefcase me-1"></i> إدارة ترخيص السياحة والتفاصيل التجارية
                            </button>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content border-0 p-0">
                    
                    <!-- Tab 1: Basic Info & ZATCA -->
                    <div class="tab-pane fade show active" id="tab-basic" role="tabpanel">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">الشركة التابعة لها (Parent Company)</label>
                                <select name="parent_company_id" class="form-select">
                                    <option value="">لا يوجد (هذه هي الشركة الرئيسية)</option>
                                    @foreach($companies as $comp)
                                        <option value="{{ $comp->id }}" {{ old('parent_company_id') == $comp->id ? 'selected' : '' }}>{{ $comp->facility_code }} - {{ $comp->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label">حالة حساب نزيل <span class="text-danger">*</span></label>
                                <select name="status" class="form-select" required>
                                    <option value="نشط (أساسي)" {{ old('status') == 'نشط (أساسي)' ? 'selected' : '' }}>نشط (أساسي)</option>
                                    <option value="نشط (Premium)" {{ old('status') == 'نشط (Premium)' ? 'selected' : '' }}>نشط (Premium)</option>
                                    <option value="فرعي" {{ old('status') == 'فرعي' ? 'selected' : '' }}>فرعي</option>
                                    <option value="موقوف" {{ old('status') == 'موقوف' ? 'selected' : '' }}>موقوف</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">تاريخ انتهاء صلاحية حساب نزيل</label>
                                <input type="date" name="nazeel_account_expiry" class="form-control" value="{{ old('nazeel_account_expiry') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">رمز المنشأة</label>
                                <input type="text" name="facility_code" class="form-control" value="{{ old('facility_code') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">اسم المنشأة <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">الاسم المستخدم</label>
                                <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">نوع المنشأة <span class="text-danger">*</span></label>
                                <select name="property_type" class="form-select" required>
                                    <option value="أجنحة فندقية" {{ old('property_type') == 'أجنحة فندقية' ? 'selected' : '' }}>أجنحة فندقية</option>
                                    <option value="فندق" {{ old('property_type') == 'فندق' ? 'selected' : '' }}>فندق</option>
                                    <option value="شقق مفروشة" {{ old('property_type') == 'شقق مفروشة' ? 'selected' : '' }}>شقق مفروشة</option>
                                    <option value="شاليهات" {{ old('property_type') == 'شاليهات' ? 'selected' : '' }}>شاليهات</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label">الشعار (رفع الشعار)</label>
                                <input type="file" name="logo" class="form-control" accept="image/*">
                                <small class="text-muted">الحد الأدنى للحجم 400 بكسل * 300 بكسل</small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">أقصى عدد للوحدات <span class="text-danger">*</span></label>
                                <input type="number" name="max_units" class="form-control" required min="1" value="{{ old('max_units', 100) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">اصدار الحساب <span class="text-danger">*</span></label>
                                <select name="account_type" class="form-select" required>
                                    <option value="اساسي" {{ old('account_type') == 'اساسي' ? 'selected' : '' }}>اساسي</option>
                                    <option value="متقدم" {{ old('account_type') == 'متقدم' ? 'selected' : '' }}>متقدم</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">نوع معرف هيئة الزكاة والضريبة والجمارك</label>
                                <input type="text" name="tax_authority_id_type" class="form-control" value="{{ old('tax_authority_id_type') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">رقم معرف هيئة الزكاة والضريبة والجمارك</label>
                                <input type="text" name="tax_authority_id" class="form-control" value="{{ old('tax_authority_id') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Tab 2: Location & Contact -->
                    <div class="tab-pane fade" id="tab-location" role="tabpanel">
                        <div class="row g-3">
                            <h6 class="mb-0 mt-3 text-muted">بيانات الموقع</h6>
                            <div class="col-md-4">
                                <label class="form-label">الدولة <span class="text-danger">*</span></label>
                                <input type="text" name="country" class="form-control" required value="{{ old('country', 'السعودية') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">المنطقة <span class="text-danger">*</span></label>
                                <input type="text" name="region" class="form-control" required value="{{ old('region') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">المدينة <span class="text-danger">*</span></label>
                                <input type="text" name="city" class="form-control" required value="{{ old('city') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">الحيّ <span class="text-danger">*</span></label>
                                <input type="text" name="district" class="form-control" required value="{{ old('district') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">الشارع</label>
                                <input type="text" name="street" class="form-control" value="{{ old('street') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">المنطقة الزمنية <span class="text-danger">*</span></label>
                                <input type="text" name="timezone" class="form-control" required value="{{ old('timezone', '(UTC+03:00) الكويت، الرياض') }}">
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label">خط العرض</label>
                                <input type="text" name="latitude" class="form-control" value="{{ old('latitude') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">خط الطول</label>
                                <input type="text" name="longitude" class="form-control" value="{{ old('longitude') }}">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">العنوان <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" required value="{{ old('address') }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">رقم المبنى <span class="text-danger">*</span></label>
                                <input type="text" name="building_number" class="form-control" required value="{{ old('building_number') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">الرقم الفرعي</label>
                                <input type="text" name="sub_number" class="form-control" value="{{ old('sub_number') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">الرمز البريدي <span class="text-danger">*</span></label>
                                <input type="text" name="postal_code" class="form-control" required value="{{ old('postal_code') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">صندوق البريد</label>
                                <input type="text" name="po_box" class="form-control" value="{{ old('po_box') }}">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">العنوان المختصر</label>
                                <input type="text" name="short_address" class="form-control" value="{{ old('short_address') }}">
                            </div>

                            <h6 class="mb-0 mt-4 text-muted">بيانات التواصل</h6>
                            <div class="col-md-4">
                                <label class="form-label">رقم الهاتف <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" required value="{{ old('phone') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">رقم الجوال</label>
                                <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">رقم الفاكس</label>
                                <input type="text" name="fax" class="form-control" value="{{ old('fax') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">الخط الساخن</label>
                                <input type="text" name="hotline" class="form-control" value="{{ old('hotline') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">البريد الإلكتروني <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">الموقع الإلكتروني</label>
                                <input type="text" name="website" class="form-control" value="{{ old('website') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">جوال مدير الفندق</label>
                                <input type="text" name="manager_name" class="form-control" value="{{ old('manager_name') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Tab 3: Commercial & Tourism -->
                    <div class="tab-pane fade" id="tab-commercial" role="tabpanel">
                        <div class="row g-3">
                            <h6 class="mb-0 mt-3 text-muted">ترخيص السياحة والمرافق</h6>
                            <div class="col-md-4">
                                <label class="form-label">نوع النشاط السياحي</label>
                                <input type="text" name="tourism_activity_type" class="form-control" value="{{ old('tourism_activity_type', 'الشقق المخدومة') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">رقم رخصة السياحة</label>
                                <input type="text" name="tourism_license_no" class="form-control" value="{{ old('tourism_license_no') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">تاريخ انتهاء رخصة السياحة</label>
                                <input type="date" name="tourism_license_expiry" class="form-control" value="{{ old('tourism_license_expiry') }}">
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label">عدد الغرف</label>
                                <input type="number" name="rooms_count" class="form-control" value="{{ old('rooms_count') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">عدد الأسرة</label>
                                <input type="number" name="beds_count" class="form-control" value="{{ old('beds_count') }}">
                            </div>
                            
                            <div class="col-md-12">
                                <label class="form-label">ملف رخصة السياحة</label>
                                <input type="file" name="tourism_license_file" class="form-control" accept=".pdf,.tiff,.jpg,.png">
                                <small class="text-muted">يتم دعم ملفات بصيغة الصور و الـ PDF</small>
                            </div>

                            <h6 class="mb-0 mt-4 text-muted">التفاصيل التجارية</h6>
                            <div class="col-md-4">
                                <label class="form-label">رقم السجل التجاري <span class="text-danger">*</span></label>
                                <input type="text" name="commercial_register_no" class="form-control" required value="{{ old('commercial_register_no') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">رقم رخصة النشاط التجاري</label>
                                <input type="text" name="business_license_no" class="form-control" value="{{ old('business_license_no') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">رقم التسجيل الضريبي (ضريبة القيمة المضافة) <span class="text-danger">*</span></label>
                                <input type="text" name="vat_registration_no" class="form-control" required value="{{ old('vat_registration_no') }}">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">ملف السجل التجاري</label>
                                <input type="file" name="commercial_register_file" class="form-control" accept=".pdf,.tiff,.jpg,.png">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">المسافة من الحرم (كم؟)</label>
                                <input type="number" step="0.01" name="distance_from_haram" class="form-control" value="{{ old('distance_from_haram') }}">
                            </div>
                            
                            <div class="col-md-12">
                                <label class="form-label">وصف المنشأة</label>
                                <textarea name="property_description" class="form-control" rows="3">{{ old('property_description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-4 border-top">
                    <button type="submit" class="btn btn-primary d-inline-flex align-items-center"><i class="bx bx-save me-1"></i> حفظ البيانات</button>
                    <a href="{{ route('backend.tenants.companies.index', $tenant) }}" class="btn btn-outline-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
