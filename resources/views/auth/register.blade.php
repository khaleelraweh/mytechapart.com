@extends('layouts.auth')

@section('content')
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
          <div class="w-100 d-flex justify-content-center">
            <img
              src="{{ asset('frontend/img/illustrations/girl-with-laptop-light.png') }}"
              class="img-fluid scaleX-n1-rtl"
              alt="Login image"
              width="700"
              data-app-dark-img="illustrations/girl-with-laptop-dark.png"
              data-app-light-img="illustrations/girl-with-laptop-light.png" />
          </div>
        </div>
        <!-- /Left Text -->

        <!-- Register -->
        <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
          <div class="w-px-400 mx-auto mt-sm-12 mt-8">
            <h4 class="mb-1">{{ __('auth_custom.adventure_starts_here') }}</h4>
            <p class="mb-6">{{ __('auth_custom.make_app_management_easy') }}</p>

            <form id="formAuthentication" class="mb-6" action="{{ route('register') }}" method="POST">
              @csrf
              <div class="mb-6 form-control-validation">
                <label for="name" class="form-label">{{ __('auth_custom.name') }}</label>
                <input
                  type="text"
                  class="form-control @error('name') is-invalid @enderror"
                  id="name"
                  name="name"
                  value="{{ old('name') }}"
                  placeholder="{{ __('auth_custom.enter_name') }}"
                  required autocomplete="name" autofocus />
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-6 form-control-validation">
                <label for="email" class="form-label">{{ __('auth_custom.email') }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('auth_custom.enter_email') }}" required autocomplete="email" />
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="form-password-toggle mb-6 form-control-validation">
                <label class="form-label" for="password">{{ __('auth_custom.password') }}</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    required autocomplete="new-password" />
                  <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                </div>
                  @error('password')
                      <span class="invalid-feedback d-block" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="form-password-toggle form-control-validation">
                <label class="form-label" for="password-confirm">{{ __('auth_custom.confirm_password') }}</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password-confirm"
                    class="form-control"
                    name="password_confirmation"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    required autocomplete="new-password" />
                  <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                </div>
              </div>
              <div class="my-7 form-control-validation">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                  <label class="form-check-label" for="terms-conditions">
                    {{ __('auth_custom.i_agree_to') }}
                    <a href="javascript:void(0);">{{ __('auth_custom.privacy_policy_terms') }}</a>
                  </label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary d-grid w-100">{{ __('auth_custom.sign_up') }}</button>
            </form>

            <p class="text-center">
              <span>{{ __('auth_custom.already_have_account') }}</span>
              <a href="{{ route('login') }}">
                <span>{{ __('auth_custom.sign_in_instead') }}</span>
              </a>
            </p>

            <div class="divider my-6">
              <div class="divider-text">{{ __('frontend.or') }}</div>
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
            </div>
          </div>
        </div>
        <!-- /Register -->
@endsection
