@extends('layouts.auth')

@section('content')
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
          <div class="w-100 d-flex justify-content-center">
            <img
              src="{{ asset('frontend/img/illustrations/boy-with-rocket-light.png') }}"
              class="img-fluid"
              alt="Login image"
              width="700"
              data-app-dark-img="illustrations/boy-with-rocket-dark.png"
              data-app-light-img="illustrations/boy-with-rocket-light.png" />
          </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
          <div class="w-px-400 mx-auto mt-sm-12 mt-8">
            @if(function_exists('tenant') && tenant())
              <div class="d-flex align-items-center gap-2 mb-3">
                <i class="bx bx-buildings fs-4 text-primary"></i>
                <span class="badge bg-label-primary fs-6 px-3 py-2">{{ tenant('name') }}</span>
              </div>
              <h4 class="mb-1">{{ __('auth_custom.hotel_admin_login') }}</h4>
              <p class="mb-6">{{ __('auth_custom.sign_in_to_manage') }} <strong>{{ tenant('name') }}</strong></p>
            @else
              <h4 class="mb-1">{{ __('auth_custom.admin_panel_login') }}</h4>
              <p class="mb-6">{{ __('auth_custom.sign_in_system_admin') }}</p>
            @endif

            <form id="formAuthentication" class="mb-6" action="{{ route('login') }}" method="POST">
              @csrf
              <div class="mb-6 form-control-validation">
                <label for="email" class="form-label">{{ __('auth_custom.email') }}</label>
                <input
                  type="email"
                  class="form-control @error('email') is-invalid @enderror"
                  id="email"
                  name="email"
                  value="{{ old('email') }}"
                  placeholder="{{ __('auth_custom.enter_email') }}"
                  required autocomplete="email" autofocus />
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="form-password-toggle form-control-validation">
                <label class="form-label" for="password">{{ __('auth_custom.password') }}</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    required autocomplete="current-password" />
                  <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                </div>
                  @error('password')
                      <span class="invalid-feedback d-block" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="my-7">
                <div class="d-flex justify-content-between">
                  <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember-me" {{ old('remember') ? 'checked' : '' }} />
                    <label class="form-check-label" for="remember-me">{{ __('auth_custom.remember_me') }}</label>
                  </div>
                  @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}">
                    <p class="mb-0">{{ __('auth_custom.forgot_password') }}</p>
                  </a>
                  @endif
                </div>
              </div>
              <button type="submit" class="btn btn-primary d-grid w-100">{{ __('auth_custom.sign_in') }}</button>
            </form>

            {{-- <p class="text-center">
              <span>New on our platform?</span>
              <a href="{{ route('register') }}">
                <span>Create an account</span>
              </a>
            </p> --}}

            {{-- <div class="divider my-6">
              <div class="divider-text">or</div>
            </div>

            <div class="d-flex justify-content-center">
              <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-facebook me-1_5">
                <i class="icon-base bx bxl-facebook-circle icon-20px"></i>
              </a>

              <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-twitter me-1_5">
                <i class="icon-base bx bxl-twitter icon-20px"></i>
              </a>

              <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-github me-1_5">
                <i class="icon-base bx bxl-github icon-20px"></i>
              </a>

              <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-google-plus">
                <i class="icon-base bx bxl-google icon-20px"></i>
              </a>
            </div> --}}
          </div>
        </div>
        <!-- /Login -->
@endsection
