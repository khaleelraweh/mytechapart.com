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
        <h1>Register your Hotel</h1>
        @if(session('success'))
            <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div style="color: red; margin-bottom: 10px;">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ route('central.register.submit') }}">
            @csrf
            <div><input type="text" name="name" placeholder="Hotel Name" required></div>
            <div><input type="text" name="slug" placeholder="Subdomain (e.g. hilton)" required></div>
            <div><input type="email" name="email" placeholder="Admin Email" required></div>
            <div><input type="text" name="phone" placeholder="Phone Number"></div>
            <div><input type="text" name="admin_name" placeholder="Admin Full Name" required></div>
            <div><input type="password" name="password" placeholder="Password" required></div>
            <div><input type="password" name="password_confirmation" placeholder="Confirm Password" required></div>
            <button type="submit">Create Tenant</button>
        </form>
    </div>
</body>
</html>
