@extends('layouts.admin')
@section('title', 'تصنيف الوحدات')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">تصنيف الوحدات</h5>
        <a href="{{ route('backend.unit-classifications.create') }}" class="btn btn-primary">إضافة تصنيف جديد</a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم (عربي)</th>
                    <th>الاسم (إنجليزي)</th>
                    <th>الحالة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse($classifications as $classification)
                <tr>
                    <td>{{ $classification->id }}</td>
                    <td>{{ $classification->name_ar }}</td>
                    <td>{{ $classification->name_en ?? '-' }}</td>
                    <td>
                        @if($classification->is_active)
                            <span class="badge bg-label-success">نشط</span>
                        @else
                            <span class="badge bg-label-danger">غير نشط</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-sm btn-icon btn-label-primary" href="{{ route('backend.unit-classifications.edit', $classification->id) }}"><i class="bx bx-edit"></i></a>
                        <form action="{{ route('backend.unit-classifications.destroy', $classification->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-icon btn-label-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')"><i class="bx bx-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">لا توجد سجلات</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
