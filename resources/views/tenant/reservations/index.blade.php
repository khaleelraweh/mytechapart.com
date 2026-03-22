@extends('layouts.tenant')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Operations /</span> Reservations</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Bookings</h5>
            <a href="{{ route('reservations.create') }}" class="btn btn-primary btn-sm"><i class="bx bx-plus"></i> New Booking</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Guest</th>
                        <th>Room/Unit</th>
                        <th>Dates</th>
                        <th>Nights</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($reservations as $res)
                    <tr>
                        <td><strong>{{ $res->customer->name }}</strong><br><small class="text-muted">{{ $res->customer->phone }}</small></td>
                        <td>{{ $res->unit->property->name }}<br><span class="badge bg-label-info">Room {{ $res->unit->unit_number }}</span></td>
                        <td>{{ $res->check_in->format('M d, Y') }}<br>to {{ $res->check_out->format('M d, Y') }}</td>
                        <td>{{ $res->nights }}</td>
                        <td><strong>${{ number_format($res->total_price, 2) }}</strong></td>
                        <td>
                            <form action="{{ route('reservations.update', $res) }}" method="POST" id="status-form-{{ $res->id }}">
                                @csrf @method('PUT')
                                <select name="status" class="form-select form-select-sm {{ $res->status == 'cancelled' ? 'text-danger' : ($res->status == 'checked_in' ? 'text-success' : 'text-primary') }}" onchange="document.getElementById('status-form-{{ $res->id }}').submit()">
                                    <option value="confirmed" {{ $res->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="checked_in" {{ $res->status == 'checked_in' ? 'selected' : '' }}>Checked In</option>
                                    <option value="checked_out" {{ $res->status == 'checked_out' ? 'selected' : '' }}>Checked Out (Finished)</option>
                                    <option value="cancelled" {{ $res->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('reservations.destroy', $res) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this reservation completely from history?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger px-2"><i class="bx bx-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center py-4">No reservations found in the system. <a href="{{ route('reservations.create') }}">Create one</a></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
