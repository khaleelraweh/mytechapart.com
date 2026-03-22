@extends('layouts.tenant')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">{{ __('tenant.operations') }}</span> {{ __('tenant.customers') }}</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <!-- Add Customer Form -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header border-bottom mb-3">
                    <h5 class="mb-0">{{ __('tenant.add_new_guest') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('customers.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">{{ __('tenant.full_name') }}</label>
                            <input type="text" name="name" class="form-control" required placeholder="John Doe">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('tenant.phone_number') }}</label>
                            <input type="text" name="phone" class="form-control" required placeholder="+1 234 567 890">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('tenant.email_address_optional') }}</label>
                            <input type="email" name="email" class="form-control" placeholder="john@example.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('tenant.identity_passport_optional') }}</label>
                            <input type="text" name="identity_no" class="form-control" placeholder="ABC1234567">
                        </div>
                        <button type="submit" class="btn btn-primary w-100"><i class="bx bx-user-plus"></i> {{ __('tenant.save_customer') }}</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Customers List -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="mb-0">{{ __('tenant.customer_directory') }}</h5>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('tenant.name') }}</th>
                                <th>{{ __('tenant.phone') }}</th>
                                <th>{{ __('tenant.id_passport') }}</th>
                                <th>{{ __('tenant.actions') }}</th>

                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse($customers as $customer)
                            <tr>
                                <td><strong>{{ $customer->name }}</strong></td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->identity_no ?? '-' }}</td>
                                <td>
                                    <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('tenant.delete_customer_profile') }}');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger px-2"><i class="bx bx-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center py-4">{{ __('tenant.no_customers_registered') }}</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
