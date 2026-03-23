@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">الفنادق المسجلة / {{ $tenant->name }} /</span> إدارة الشركات</h4>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">المنشآت التابعة لـ {{ $tenant->name }}</h5>
            <div class="d-flex gap-2">
                <a href="{{ route('backend.tenants.index') }}" class="btn btn-secondary btn-sm">عودة</a>
                <a href="{{ route('backend.tenants.companies.create', $tenant) }}" class="btn btn-primary btn-sm"><i class="bx bx-plus"></i> إضافة منشأة/شركة</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>إسم المنشأة</th>
                        <th>الحالة</th>
                        <th>رمز المنشأة</th>
                        <th>أقصى عدد وحدات</th>
                        <th>تاريخ الإنتهاء</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($companies as $company)
                    <tr>
                        <td><strong>{{ $company->name }}</strong></td>
                        <td><span class="badge bg-label-info">{{ $company->status }}</span></td>
                        <td>{{ $company->facility_code ?? '-' }}</td>
                        <td>{{ $company->max_units }}</td>
                        <td>{{ $company->nazeel_account_expiry ? \Carbon\Carbon::parse($company->nazeel_account_expiry)->format('Y-m-d') : '-' }}</td>
                        <td>
                            <a href="{{ route('backend.tenants.companies.edit', [$tenant, $company->id]) }}" class="btn btn-sm btn-info"><i class="bx bx-edit"></i> تعديل</a>
                            <form action="{{ route('backend.tenants.companies.destroy', [$tenant, $company->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i> حذف</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">لا يوجد شركات مسجلة</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
