<!DOCTYPE html>
<html>
<head>
    <title>Register SaaS Company</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f3f4f6; padding: 50px; }
        .container { max-width: 500px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #1d4ed8; }
        h1 { text-align: center; color: #1f2937; }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ __('central.register_your_hotel') }}</h1>
        @if(session('success'))
            <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div style="color: red; margin-bottom: 10px;">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ route('central.register.submit') }}">
            @csrf
            <div><input type="text" name="name" placeholder="{{ __('central.hotel_name') }}" required></div>
            <div><input type="text" name="slug" placeholder="{{ __('central.subdomain') }}" required></div>
            <div><input type="email" name="email" placeholder="{{ __('central.admin_email') }}" required></div>
            <div><input type="text" name="phone" placeholder="{{ __('central.phone_number') }}"></div>
            <div><input type="text" name="admin_name" placeholder="{{ __('central.admin_full_name') }}" required></div>
            <div><input type="password" name="password" placeholder="{{ __('central.password') }}" required></div>
            <div><input type="password" name="password_confirmation" placeholder="{{ __('central.confirm_password') }}" required></div>
            <hr>
            <h3>Company Details</h3>
            <div><input type="text" name="company_name" placeholder="Company Name" required value="{{ old('company_name') }}"></div>
            <div>
                <select name="status" class="form-select" required style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px;">
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active (نشط)</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive (غير نشط)</option>
                </select>
            </div>
            <div>
                <label>Nazeel Expiry Date (تاريخ انتهاء صلاحية حساب نزيل)</label>
                <input type="date" name="nazeel_account_expiry" value="{{ old('nazeel_account_expiry') }}">
            </div>
            <div><input type="text" name="facility_code" placeholder="Facility Code (رمز المنشأة)" value="{{ old('facility_code') }}"></div>
            <div><input type="number" name="max_units" placeholder="Max Units (أقصى عدد للوحدات)" required min="1" value="{{ old('max_units', 100) }}"></div>
            <div><input type="text" name="account_type" placeholder="Account Type (حالة الحساب مثل أساسي) e.g., Basic" required value="{{ old('account_type', 'Basic') }}"></div>
            <div><input type="text" name="address" placeholder="Address (العنوان)" required value="{{ old('address') }}"></div>
            <div><input type="text" name="building_number" placeholder="Building Number (رقم المبنى)" value="{{ old('building_number') }}"></div>
            <div><input type="text" name="sub_number" placeholder="Sub Number (الرقم الفرعي)" value="{{ old('sub_number') }}"></div>
            <div><input type="text" name="postal_code" placeholder="Postal Code (الرمز البريدي)" value="{{ old('postal_code') }}"></div>

            <button type="submit" style="margin-top: 20px;">{{ __('central.create_tenant') }}</button>
        </form>
    </div>
</body>
</html>
