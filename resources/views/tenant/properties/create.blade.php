@extends('layouts.tenant')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Properties /</span> Add New</h4>

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

            <form action="{{ route('properties.store') }}" method="POST">
                @csrf
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
                <button type="submit" class="btn btn-primary">Save Property Structure</button>
                <a href="{{ route('properties.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
