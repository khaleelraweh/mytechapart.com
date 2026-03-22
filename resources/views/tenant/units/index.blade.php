@extends('layouts.tenant')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center py-3 mb-4">
        <h4 class="mb-0">
            <span class="text-muted fw-light">
                <a href="{{ route('properties.index') }}" class="text-muted">Hotels</a> / 
                <a href="{{ route('floors.index', ['property_id' => $floor->property_id]) }}" class="text-muted">{{ $floor->property->name }}</a> / 
            </span>
            Floor {{ $floor->floor_number }} - Rooms
        </h4>
        <a href="{{ route('floors.index', ['property_id' => $floor->property_id]) }}" class="btn btn-secondary btn-sm">Back to Floors</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        <!-- Add Unit Form -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header border-bottom mb-3">
                    <h5 class="mb-0">Add New Room</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('units.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="floor_id" value="{{ $floor->id }}">
                        
                        <div class="mb-3">
                            <label class="form-label">Room Number</label>
                            <input type="text" name="unit_number" class="form-control" required placeholder="e.g. 101">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Room Type</label>
                            <input type="text" name="type" class="form-control" required placeholder="e.g. Suite, Standard">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price per Night</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" name="price" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Capacity (Pax)</label>
                                <input type="number" name="capacity" class="form-control" required min="1" value="2">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Beds</label>
                                <input type="number" name="beds" class="form-control" required min="1" value="1">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="available">Available</option>
                                <option value="booked">Booked</option>
                                <option value="maintenance">Under Maintenance</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100"><i class="bx bx-plus"></i> Add Room</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Units List -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="mb-0">Rooms on Floor {{ $floor->floor_number }}</h5>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Room #</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Capacity</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse($units as $unit)
                            <tr>
                                <td><strong><i class="bx bx-key"></i> {{ $unit->unit_number }}</strong></td>
                                <td>{{ $unit->type }}</td>
                                <td>${{ number_format($unit->price, 2) }}</td>
                                <td>{{ $unit->capacity }} Pax / {{ $unit->beds }} Beds</td>
                                <td>
                                    <span class="badge bg-label-{{ $unit->status == 'available' ? 'success' : ($unit->status == 'booked' ? 'danger' : 'warning') }}">
                                        {{ ucfirst($unit->status) }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('units.destroy', $unit) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this room completely?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger px-2"><i class="bx bx-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="6" class="text-center py-4">No rooms added to this floor yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
