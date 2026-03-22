@extends('layouts.tenant')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center py-3 mb-4">
        <h4 class="mb-0">
            <span class="text-muted fw-light">Hotel Management / <a href="{{ route('properties.index') }}" class="text-muted fw-light">Properties</a> /</span> 
            {{ $property->name }} - Floors
        </h4>
        <a href="{{ route('properties.index') }}" class="btn btn-secondary btn-sm">Back to Hotels</a>
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
                    <h5 class="mb-0">Add New Floor</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('floors.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                        <div class="mb-3">
                            <label class="form-label">Floor Number/Name</label>
                            <input type="text" name="floor_number" class="form-control" required placeholder="e.g. 1, 2, Ground">
                        </div>
                        <button type="submit" class="btn btn-primary w-100"><i class="bx bx-plus"></i> Add Floor</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Floors List -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="mb-0">Floors in {{ $property->name }}</h5>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Floor Identification</th>
                                <th>Total Units/Rooms</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse($floors as $floor)
                            <tr>
                                <td><span class="badge bg-label-primary fs-6">Floor {{ $floor->floor_number }}</span></td>
                                <td>{{ $floor->units_count }} Rooms</td>
                                <td>
                                    <a href="{{ route('units.index', ['floor_id' => $floor->id]) }}" class="btn btn-sm btn-info">
                                        <i class="bx bx-door-open"></i> Manage Rooms
                                    </a>
                                    <form action="{{ route('floors.destroy', $floor) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this floor and all its rooms?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i> Remove</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="text-center py-4">No floors found for this hotel.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
