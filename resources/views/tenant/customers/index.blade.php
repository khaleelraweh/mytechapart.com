@extends('layouts.tenant')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Operations /</span> Customers</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <!-- Add Customer Form -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header border-bottom mb-3">
                    <h5 class="mb-0">Add New Guest</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('customers.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" required placeholder="John Doe">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control" required placeholder="+1 234 567 890">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address (Optional)</label>
                            <input type="email" name="email" class="form-control" placeholder="john@example.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Identity ID / Passport No (Optional)</label>
                            <input type="text" name="identity_no" class="form-control" placeholder="ABC1234567">
                        </div>
                        <button type="submit" class="btn btn-primary w-100"><i class="bx bx-user-plus"></i> Save Customer</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Customers List -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="mb-0">Customer Directory</h5>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>ID / Passport</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse($customers as $customer)
                            <tr>
                                <td><strong>{{ $customer->name }}</strong></td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->identity_no ?? '-' }}</td>
                                <td>
                                    <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this customer profile?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger px-2"><i class="bx bx-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center py-4">No customers registered yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
