@extends('layouts.tenant')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">{{ __('tenant.hotel') }} /</span> {{ __('app.dashboard') }}
</h4>


<div class="row gy-4">
    <!-- Total Properties -->
    <div class="col-sm-6 col-xl-3">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="avatar avatar-xl bg-label-primary rounded">
                    <i class="bx bx-buildings bx-lg"></i>
                </div>
                <div>
                    <p class="mb-0 text-muted small">{{ __('tenant.total_properties') }}</p>
                    <h3 class="mb-0 fw-bold">{{ $metrics['total_properties'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Units -->
    <div class="col-sm-6 col-xl-3">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="avatar avatar-xl bg-label-success rounded">
                    <i class="bx bx-door-open bx-lg"></i>
                </div>
                <div>
                    <p class="mb-0 text-muted small">{{ __('tenant.total_units_rooms') }}</p>
                    <h3 class="mb-0 fw-bold">{{ $metrics['total_units'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Reservations -->
    <div class="col-sm-6 col-xl-3">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="avatar avatar-xl bg-label-warning rounded">
                    <i class="bx bx-calendar-star bx-lg"></i>
                </div>
                <div>
                    <p class="mb-0 text-muted small">{{ __('tenant.total_reservations') }}</p>
                    <h3 class="mb-0 fw-bold">{{ $metrics['total_reservations'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Occupancy Rate -->
    <div class="col-sm-6 col-xl-3">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="avatar avatar-xl bg-label-danger rounded">
                    <i class="bx bx-bar-chart-alt-2 bx-lg"></i>
                </div>
                <div>
                    <p class="mb-0 text-muted small">{{ __('tenant.occupancy_rate') }}</p>
                    <h3 class="mb-0 fw-bold">{{ $metrics['occupancy_rate'] }}%</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
