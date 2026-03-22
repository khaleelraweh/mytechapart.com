@extends('layouts.tenant')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center py-3 mb-4">
        <h4 class="mb-0">
            <span class="text-muted fw-light">{{ __('tenant.hotel_management') }} <a href="{{ route('properties.index') }}" class="text-muted fw-light">{{ __('tenant.properties') }}</a> /</span> 
            {{ $property->name }} - {{ __('tenant.floors') }}
        </h4>
        <a href="{{ route('properties.index') }}" class="btn btn-secondary btn-sm">{{ __('tenant.back_to_hotels') }}</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        <!-- Add Floor Form -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header border-bottom mb-3">
                    <h5 class="mb-0">{{ __('tenant.add_new_floor') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('floors.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                        <div class="mb-3">
                            <label class="form-label">{{ __('tenant.floor_number_name') }}</label>
                            <input type="text" name="floor_number" class="form-control" required placeholder="{{ __('tenant.eg_ground') }}">
                        </div>
                        <button type="submit" class="btn btn-primary w-100"><i class="bx bx-plus"></i> {{ __('tenant.add_floor') }}</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Floors List -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="mb-0">{{ __('tenant.floors_in') }} {{ $property->name }}</h5>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('tenant.floor_identification') }}</th>
                                <th>{{ __('tenant.total_units_rooms_table') }}</th>
                                <th>{{ __('tenant.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse($floors as $floor)
                            <tr>
                                <td><span class="badge bg-label-primary fs-6">{{ __('tenant.floor_prefix') }} {{ $floor->floor_number }}</span></td>
                                <td>{{ $floor->units_count }} {{ __('tenant.rooms') }}</td>
                                <td>
                                    <a href="{{ route('units.index', ['floor_id' => $floor->id]) }}" class="btn btn-sm btn-info">
                                        <i class="bx bx-door-open"></i> {{ __('tenant.manage_rooms') }}
                                    </a>
                                    <form action="{{ route('floors.destroy', $floor) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('tenant.delete_floor_and_rooms') }}');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i> {{ __('tenant.remove') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="text-center py-4">{{ __('tenant.no_floors_found') }}</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
