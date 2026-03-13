@extends('layouts.auth')

@section('content')
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
          <div class="w-100 d-flex justify-content-center">
            <img
              src="{{ asset('frontend/img/illustrations/girl-unlock-password-light.png') }}"
              class="img-fluid scaleX-n1-rtl"
              alt="Login image"
              width="700"
              data-app-dark-img="illustrations/girl-unlock-password-dark.png"
              data-app-light-img="illustrations/girl-unlock-password-light.png" />
          </div>
        </div>
        <!-- /Left Text -->

        <!-- Forgot Password -->
        <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
          <div class="w-px-400 mx-auto mt-sm-12 mt-8">
            <h4 class="mb-1">Forgot Password? 🔒</h4>
            <p class="mb-6">Enter your email and we'll send you instructions to reset your password</p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form id="formAuthentication" class="mb-6" action="{{ route('password.email') }}" method="POST">
              @csrf
              <div class="mb-6 form-control-validation">
                <label for="email" class="form-label">Email</label>
                <input
                  type="email"
                  class="form-control @error('email') is-invalid @enderror"
                  id="email"
                  name="email"
                  value="{{ old('email') }}"
                  placeholder="Enter your email"
                  required autocomplete="email" autofocus />
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <button type="submit" class="btn btn-primary d-grid w-100">Send Reset Link</button>
            </form>
            <div class="text-center">
              <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                <i class="bx bx-chevron-left icon-20px scaleX-n1-rtl me-1_5 align-top"></i>
                Back to login
              </a>
            </div>
          </div>
        </div>
        <!-- /Forgot Password -->
@endsection
