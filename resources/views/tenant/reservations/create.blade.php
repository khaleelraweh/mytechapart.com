@extends('layouts.tenant')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Reservations /</span> New Booking</h4>

    <div class="card mb-4">
        <div class="card-header border-bottom">
            <h5 class="mb-0">Create Reservation</h5>
        </div>
        <div class="card-body mt-3">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Select Guest (Customer)</label>
                        <select name="customer_id" class="form-select" required>
                            <option value="">-- Choose Customer --</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }} ({{ $customer->phone }})</option>
                            @endforeach
                        </select>
                        <small class="text-muted d-block mt-1">Guest not listed? <a href="{{ route('customers.index') }}" target="_blank">Add Customer First</a></small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Select Room / Unit</label>
                        <select name="unit_id" class="form-select" required>
                            <option value="">-- Choose Room --</option>
                            @foreach($units as $unit)
                                <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>
                                    {{ $unit->property->name }} - {{ $unit->type }} (Room {{ $unit->unit_number }}) - ${{ $unit->price }}/night
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Check-In Date</label>
                        <input type="date" name="check_in" class="form-control" required value="{{ old('check_in', date('Y-m-d')) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Check-Out Date</label>
                        <input type="date" name="check_out" class="form-control" required value="{{ old('check_out', date('Y-m-d', strtotime('+1 day'))) }}">
                    </div>
                </div>

                <div class="mt-4 border-top pt-3">
                    <button type="submit" class="btn btn-primary"><i class="bx bx-check-circle"></i> Confirm Booking</button>
                    <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
