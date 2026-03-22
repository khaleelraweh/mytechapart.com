@extends('layouts.tenant')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Hotel Management /</span> Our Properties</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center border-bottom mb-3">
            <h5 class="mb-0">Properties list</h5>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addPropertyModal">
                <i class="bx bx-plus"></i> Add New Property
            </button>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>City</th>
                        <th>Type</th>
                        <th>Floors</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($properties as $property)
                    <tr>
                        <td><strong>{{ $property->name }}</strong></td>
                        <td>{{ $property->city }}</td>
                        <td>{{ ucfirst($property->type) }}</td>
                        <td>{{ $property->floors_count ?? $property->total_floors }}</td>
                        <td>
                            <a href="{{ route('floors.index', ['property_id' => $property->id]) }}" class="btn btn-sm btn-info"><i class="bx bx-layer"></i> Manage Floors & Units</a>
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editPropertyModal{{ $property->id }}">
                                <i class="bx bx-edit"></i> Edit
                            </button>
                            <form action="{{ route('properties.destroy', $property) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this property completely? This will wipe all its rooms and reservations.');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Property Modal -->
                    <div class="modal fade" id="editPropertyModal{{ $property->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="{{ route('properties.update', $property) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit {{ $property->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Property Name</label>
                                                <input type="text" name="name" class="form-control" required value="{{ $property->name }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">City</label>
                                                <input type="text" name="city" class="form-control" required value="{{ $property->city }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Property Type</label>
                                                <select name="type" class="form-select" required>
                                                    <option value="hotel" {{ $property->type == 'hotel' ? 'selected' : '' }}>Hotel</option>
                                                    <option value="apartment" {{ $property->type == 'apartment' ? 'selected' : '' }}>Apartment Complex</option>
                                                    <option value="resort" {{ $property->type == 'resort' ? 'selected' : '' }}>Resort</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Total Number of Floors</label>
                                                <input type="number" class="form-control" value="{{ $property->total_floors }}" disabled>
                                                <small class="text-muted d-block mt-1">Floors cannot be modified here. Use Floor Manager.</small>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Address</label>
                                                <textarea name="address" class="form-control" required rows="3">{{ $property->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr><td colspan="5" class="text-center py-4">No properties found. Click "Add New Property" below.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Property Modal -->
<div class="modal fade" id="addPropertyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('properties.store') }}" method="POST">
                @csrf
                <div class="modal-header border-bottom mb-3 pb-3">
                    <h5 class="modal-title">Add New Property</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Property/Hotel Name</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control" required value="{{ old('city') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Property Type</label>
                            <select name="type" class="form-select" required>
                                <option value="hotel">Hotel</option>
                                <option value="apartment">Apartment Complex</option>
                                <option value="resort">Resort</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Total Number of Floors</label>
                            <input type="number" name="total_floors" class="form-control" min="1" required value="{{ old('total_floors', 1) }}">
                            <small class="text-muted d-block mt-1">Floors will be automatically generated upon creation.</small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" required rows="3">{{ old('address') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pb-0 border-top pt-3 mt-3">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-check"></i> Save Property</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
