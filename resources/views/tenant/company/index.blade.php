@extends('layouts.tenant')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">المنشآت /</span> قائمة المنشآت المضافة</h4>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>اسم المنشأة</th>
                        <th>الحالة</th>
                        <th>رمز المنشأة</th>
                        <th>جوال مدير الفندق</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if($companies->count() > 0)
                        @foreach($companies as $company)
                            <tr>
                                <td><strong>{{ $company->name ?? '—' }}</strong></td>
                                <td><span class="badge bg-label-primary me-1">{{ $company->status }}</span></td>
                                <td>{{ $company->facility_code ?? '—' }}</td>
                                <td>{{ $company->manager_name ?? '—' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('companies.show', $company->id) }}"><i class="bx bx-show-alt me-1"></i> استعراض</a>
                                            <a class="dropdown-item" href="{{ route('companies.edit', $company->id) }}"><i class="bx bx-edit-alt me-1"></i> تعديل</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">لا يوجد منشآت مضافة بعد</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
