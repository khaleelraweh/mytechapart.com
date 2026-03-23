@extends('layouts.tenant')

@section('content')
<style>
    .data-label { font-size: 0.85rem; text-transform: uppercase; color: #a1acb8; margin-bottom: 0.25rem; font-weight: 600; }
    .data-value { font-size: 1rem; color: #566a7f; font-weight: 500; padding: 0.5rem; background-color: #f8f9fa; border-radius: 0.375rem; border: 1px solid #eceef1; min-height: 40px; display: flex; align-items: center; }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">المنشآت /</span> استعراض بيانات {{ $company->name }}</h4>

    <div class="card mb-4 shadow-sm">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center bg-lighter">
            <h5 class="mb-0 text-primary"><i class="bx mx-1 bx-building-house mb-1"></i> الملف التعريفي للمنشأة</h5>
            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary btn-sm"><i class="bx bx-edit"></i> تعديل البيانات</a>
        </div>
        <div class="card-body pt-4">
            <!-- Nav tabs -->
            <div class="nav-align-top mb-4">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#show-basic" aria-controls="show-basic" aria-selected="true">
                            <i class="tf-icons bx bx-building me-1"></i> البيانات الأساسية ومعلومات الزكاة
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#show-location" aria-controls="show-location" aria-selected="false">
                            <i class="tf-icons bx bx-map-pin me-1"></i> الموقع والتواصل
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#show-commercial" aria-controls="show-commercial" aria-selected="false">
                            <i class="tf-icons bx bx-briefcase me-1"></i> التفاصيل التجارية
                        </button>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content border-0 p-0 mt-4">
                    
                    <!-- Tab 1: Basic Info & ZATCA -->
                    <div class="tab-pane fade show active" id="show-basic" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="data-label">الشركة التابعة لها (Parent Company)</div>
                                <div class="data-value">{{ $company->parent_company_id ? \App\Models\Company::find($company->parent_company_id)?->name : 'لا يوجد (هذه هي الشركة الرئيسية)' }}</div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="data-label">حالة حساب نزيل</div>
                                <div class="data-value"><span class="badge bg-label-primary">{{ $company->status ?? '—' }}</span></div>
                            </div>

                            <div class="col-md-6">
                                <div class="data-label">تاريخ انتهاء صلاحية حساب نزيل</div>
                                <div class="data-value">{{ $company->nazeel_account_expiry ?? '—' }}</div>
                            </div>

                            <div class="col-md-6">
                                <div class="data-label">رمز المنشأة</div>
                                <div class="data-value">{{ $company->facility_code ?? '—' }}</div>
                            </div>

                            <div class="col-md-6">
                                <div class="data-label">اسم المنشأة</div>
                                <div class="data-value">{{ $company->name ?? '—' }}</div>
                            </div>

                            <div class="col-md-6">
                                <div class="data-label">الاسم المستخدم</div>
                                <div class="data-value">{{ $company->username ?? '—' }}</div>
                            </div>

                            <div class="col-md-6">
                                <div class="data-label">نوع المنشأة</div>
                                <div class="data-value">{{ $company->property_type ?? '—' }}</div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="data-label">الشعار</div>
                                <div class="d-flex align-items-center mt-2">
                                @if($company->logo)
                                    <img src="{{ asset('storage/'.$company->logo) }}" width="80" class="rounded border p-1 bg-white">
                                @else
                                    <span class="text-muted fst-italic">لا يوجد شعار مرفوع</span>
                                @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="data-label">أقصى عدد للوحدات</div>
                                <div class="data-value">{{ $company->max_units ?? '—' }}</div>
                            </div>

                            <div class="col-md-6">
                                <div class="data-label">اصدار الحساب</div>
                                <div class="data-value">{{ $company->account_type ?? '—' }}</div>
                            </div>

                            <div class="col-md-6">
                                <div class="data-label">نوع معرف هيئة الزكاة</div>
                                <div class="data-value">{{ $company->tax_authority_id_type ?? '—' }}</div>
                            </div>

                            <div class="col-md-6">
                                <div class="data-label">رقم معرف هيئة الزكاة</div>
                                <div class="data-value">{{ $company->tax_authority_id ?? '—' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab 2: Location & Contact -->
                    <div class="tab-pane fade" id="show-location" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="data-label">الدولة</div>
                                <div class="data-value">{{ $company->country ?? '—' }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="data-label">المنطقة</div>
                                <div class="data-value">{{ $company->region ?? '—' }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="data-label">المدينة</div>
                                <div class="data-value">{{ $company->city ?? '—' }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="data-label">الحيّ</div>
                                <div class="data-value">{{ $company->district ?? '—' }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="data-label">الشارع</div>
                                <div class="data-value">{{ $company->street ?? '—' }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="data-label">المنطقة الزمنية</div>
                                <div class="data-value" dir="ltr">{{ $company->timezone ?? '—' }}</div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="data-label">الإحداثيات (العرض، الطول)</div>
                                <div class="data-value" dir="ltr">{{ $company->latitude ?? '—' }}, {{ $company->longitude ?? '—' }}</div>
                            </div>

                            <div class="col-md-12">
                                <div class="data-label">العنوان المتكامل</div>
                                <div class="data-value">{{ $company->address ?? '—' }}</div>
                            </div>

                            <div class="col-md-3">
                                <div class="data-label">رقم المبنى</div>
                                <div class="data-value">{{ $company->building_number ?? '—' }}</div>
                            </div>
                            <div class="col-md-3">
                                <div class="data-label">الرقم الفرعي</div>
                                <div class="data-value">{{ $company->sub_number ?? '—' }}</div>
                            </div>
                            <div class="col-md-3">
                                <div class="data-label">الرمز البريدي</div>
                                <div class="data-value">{{ $company->postal_code ?? '—' }}</div>
                            </div>
                            <div class="col-md-3">
                                <div class="data-label">صندوق البريد</div>
                                <div class="data-value">{{ $company->po_box ?? '—' }}</div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="data-label">العنوان المختصر</div>
                                <div class="data-value">{{ $company->short_address ?? '—' }}</div>
                            </div>

                            <div class="col-12"><hr class="my-2"></div>
                            
                            <div class="col-md-4">
                                <div class="data-label">رقم الهاتف</div>
                                <div class="data-value" dir="ltr">{{ $company->phone ?? '—' }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="data-label">رقم الجوال</div>
                                <div class="data-value" dir="ltr">{{ $company->mobile ?? '—' }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="data-label">البريد الإلكتروني</div>
                                <div class="data-value">{{ $company->email ?? '—' }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="data-label">جوال مدير الفندق</div>
                                <div class="data-value" dir="ltr">{{ $company->manager_name ?? '—' }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="data-label">رقم الفاكس</div>
                                <div class="data-value" dir="ltr">{{ $company->fax ?? '—' }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="data-label">الخط الساخن</div>
                                <div class="data-value" dir="ltr">{{ $company->hotline ?? '—' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab 3: Commercial -->
                    <div class="tab-pane fade" id="show-commercial" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="data-label">نوع النشاط السياحي</div>
                                <div class="data-value">{{ $company->tourism_activity_type ?? '—' }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="data-label">رقم رخصة السياحة</div>
                                <div class="data-value">{{ $company->tourism_license_no ?? '—' }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="data-label">تاريخ انتهاء رخصة السياحة</div>
                                <div class="data-value">{{ $company->tourism_license_expiry ?? '—' }}</div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="data-label">ملف رخصة السياحة</div>
                                <div class="mt-2">
                                @if($company->tourism_license_file)
                                    <a href="{{ asset('storage/'.$company->tourism_license_file) }}" target="_blank" class="btn btn-sm btn-outline-primary"><i class="bx mx-1 bx-file"></i> عرض المرفق الحالي</a>
                                @else
                                    <span class="text-muted fst-italic">لا يوجد مرفق</span>
                                @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="data-label">ملف السجل التجاري</div>
                                <div class="mt-2">
                                @if($company->commercial_register_file)
                                    <a href="{{ asset('storage/'.$company->commercial_register_file) }}" target="_blank" class="btn btn-sm btn-outline-primary"><i class="bx mx-1 bx-file"></i> عرض المرفق الحالي</a>
                                @else
                                    <span class="text-muted fst-italic">لا يوجد مرفق</span>
                                @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="data-label">رقم السجل التجاري</div>
                                <div class="data-value">{{ $company->commercial_register_no ?? '—' }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="data-label">رقم رخصة النشاط التجاري</div>
                                <div class="data-value">{{ $company->business_license_no ?? '—' }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="data-label">رقم التسجيل الضريبي (VAT)</div>
                                <div class="data-value">{{ $company->vat_registration_no ?? '—' }}</div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="data-label">عدد الغرف المفعلة</div>
                                <div class="data-value">{{ $company->rooms_count ?? '—' }}</div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="data-label">عدد الأسرة المفعلة</div>
                                <div class="data-value">{{ $company->beds_count ?? '—' }}</div>
                            </div>

                            <div class="col-md-12">
                                <div class="data-label">المسافة من الحرم</div>
                                <div class="data-value">{{ $company->distance_from_haram ? $company->distance_from_haram . ' كيلو متر' : '—' }}</div>
                            </div>

                            <div class="col-md-12">
                                <div class="data-label">وصف المنشأة</div>
                                <div class="data-value" style="min-height:80px; align-items:flex-start;">{{ $company->property_description ?? '—' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-4 pt-4 border-top">
                <a href="{{ route('companies.index') }}" class="btn btn-secondary shadow-sm"><i class="bx mx-1 bx-arrow-back"></i> إغلاق وعودة للقائمة</a>
            </div>
        </div>
    </div>
</div>
@endsection
