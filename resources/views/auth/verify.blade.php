@extends('layouts.auth')

@section('content')
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
          <div class="w-100 d-flex justify-content-center">
            <img
              src="{{ asset('frontend/img/illustrations/boy-verify-email-light.png') }}"
              class="img-fluid"
              alt="Login image"
              width="700"
              data-app-dark-img="illustrations/boy-verify-email-dark.png"
              data-app-light-img="illustrations/boy-verify-email-light.png" />
          </div>
        </div>
        <!-- /Left Text -->

        <!--  Verify email -->
        <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
          <div class="w-px-400 mx-auto mt-sm-12 mt-8">
            <h4 class="mb-1">Verify your email ✉️</h4>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            <p class="text-start mb-0">
              Account activation link has been sent to your email address. Please follow the link inside to continue.
            </p>
            <a class="btn btn-primary w-100 my-6" href="{{ url('/') }}">Skip for now</a>
            <p class="text-center mb-0">
              Didn't get the mail?
              <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                  @csrf
                  <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Resend</button>
              </form>
            </p>
          </div>
        </div>
        <!-- / Verify email -->
@endsection
