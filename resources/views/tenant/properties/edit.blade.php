@extends('layouts.tenant')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">{{ __('tenant.properties') }} /</span> {{ __('tenant.edit') }} {{ $property->name }}</h4>

    <div class="card mb-4">
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('properties.update', $property) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">{{ __('tenant.property_hotel_name') }}</label>
                        <input type="text" name="name" class="form-control" required value="{{ old('name', $property->name) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">{{ __('tenant.city') }}</label>
                        <input type="text" name="city" class="form-control" required value="{{ old('city', $property->city) }}">
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
                        <textarea name="address" class="form-control" required rows="3">{{ old('address', $property->address) }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('tenant.update_property_details') }}</button>
                <a href="{{ route('properties.index') }}" class="btn btn-secondary">{{ __('tenant.cancel') }}</a>

            </form>
        </div>
    </div>
</div>
@endsection
