@extends('layouts.admin')
@section('title', 'إضافة تخصيص نوع جديد')
@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card mb-4">
            <h5 class="card-header">إضافة نوع جديد</h5>
            <div class="card-body">
                <form action="{{ route('backend.unit-types.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name_ar">الاسم (عربي) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name_ar" name="name_ar" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="name_en">الاسم (إنجليزي)</label>
                        <input type="text" class="form-control" id="name_en" name="name_en" dir="ltr" />
                    </div>
                    <div class="mb-3 form-check form-switch ps-0">
                        <label class="form-check-label d-block mb-1" for="is_active">الحالة</label>
                        <input class="form-check-input ms-0 mt-0" type="checkbox" id="is_active" name="is_active" checked value="1">
                        <span class="ms-1">نشط</span>
                    </div>
                    <button type="submit" class="btn btn-primary d-grid w-100">حفظ وعودة</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
