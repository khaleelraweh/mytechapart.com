@extends('layouts.tenant')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">{{ __('tenant.hotel_management') }}</span> {{ __('tenant.our_properties') }}</h4>

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
            <h5 class="mb-0">{{ __('tenant.properties_list') }}</h5>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addPropertyModal">
                <i class="bx bx-plus"></i> {{ __('tenant.add_new_property') }}
            </button>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('tenant.name') }}</th>
                        <th>{{ __('tenant.city') }}</th>
                        <th>{{ __('tenant.type') }}</th>
                        <th>{{ __('tenant.floors') }}</th>
                        <th>{{ __('tenant.actions') }}</th>
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
                            <a href="{{ route('floors.index', ['property_id' => $property->id]) }}" class="btn btn-sm btn-info"><i class="bx bx-layer"></i> {{ __('tenant.manage_floors_units') }}</a>
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editPropertyModal{{ $property->id }}">
                                <i class="bx bx-edit"></i> {{ __('tenant.edit') }}
                            </button>
                            <form action="{{ route('properties.destroy', $property) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('tenant.delete_property_completely') }}');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i> {{ __('tenant.delete') }}</button>
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
                                        <h5 class="modal-title">{{ __('tenant.edit') }} {{ $property->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">{{ __('tenant.property_name') }}</label>
                                                <input type="text" name="name" class="form-control" required value="{{ $property->name }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">{{ __('tenant.city') }}</label>
                                                <input type="text" name="city" class="form-control" required value="{{ $property->city }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">{{ __('tenant.property_type') }}</label>
                                                <select name="type" class="form-select" required>
                                                    <option value="hotel" {{ $property->type == 'hotel' ? 'selected' : '' }}>{{ __('tenant.hotel') }}</option>
                                                    <option value="apartment" {{ $property->type == 'apartment' ? 'selected' : '' }}>{{ __('tenant.apartment_complex') }}</option>
                                                    <option value="resort" {{ $property->type == 'resort' ? 'selected' : '' }}>{{ __('tenant.resort') }}</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">{{ __('tenant.total_number_of_floors') }}</label>
                                                <input type="number" class="form-control" value="{{ $property->total_floors }}" disabled>
                                                <small class="text-muted d-block mt-1">{{ __('tenant.floors_cannot_be_modified') }}</small>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">{{ __('tenant.address') }}</label>
                                                <textarea name="address" class="form-control" required rows="3">{{ $property->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('tenant.close') }}</button>
                                        <button type="submit" class="btn btn-primary">{{ __('tenant.save_changes') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr><td colspan="5" class="text-center py-4">{{ __('tenant.no_properties_found') }}</td></tr>
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
                    <h5 class="modal-title">{{ __('tenant.add_new_property') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">{{ __('tenant.property_hotel_name') }}</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">{{ __('tenant.city') }}</label>
                            <input type="text" name="city" class="form-control" required value="{{ old('city') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">{{ __('tenant.property_type') }}</label>
                            <select name="type" class="form-select" required>
                                <option value="hotel">{{ __('tenant.hotel') }}</option>
                                <option value="apartment">{{ __('tenant.apartment_complex') }}</option>
                                <option value="resort">{{ __('tenant.resort') }}</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">{{ __('tenant.total_number_of_floors') }}</label>
                            <input type="number" name="total_floors" class="form-control" min="1" required value="{{ old('total_floors', 1) }}">
                            <small class="text-muted d-block mt-1">{{ __('tenant.floors_will_be_generated') }}</small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">{{ __('tenant.address') }}</label>
                            <textarea name="address" class="form-control" required rows="3">{{ old('address') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pb-0 border-top pt-3 mt-3">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('tenant.close') }}</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-check"></i> {{ __('tenant.save_property') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
