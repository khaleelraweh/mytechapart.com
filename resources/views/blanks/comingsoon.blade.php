@extends('layouts.blank')

@section('title', 'Demo: Coming Soon - Pages | Sneat - Bootstrap Dashboard PRO')

@section('page-style')
<link rel="stylesheet" href="{{ asset('frontend') }}/vendor/css/pages/page-misc.css" />
@endsection

@section('content')
<!-- Coming Soon -->
    <div class="container-xxl py-4">
      <div class="misc-wrapper">
        <h3 class="mb-2 mx-2">We are launching soon 🚀</h3>
        <p class="mb-6 mx-2">Our website is opening soon. Please register to get notified when it's ready!</p>
        <form onsubmit="return false">
          <div>
            <div class="mb-1 d-flex gap-4">
              <input type="email" class="form-control" placeholder="Enter your email" autofocus />
              <button type="submit" class="btn btn-primary">Notify</button>
            </div>
          </div>
        </form>
        <div class="mt-12">
          <img
            src="{{ asset('frontend/img/illustrations/boy-with-rocket-light.png') }}"
            alt="boy-with-rocket-light"
            width="500"
            class="img-fluid"
            data-app-light-img="illustrations/boy-with-rocket-light.png"
            data-app-dark-img="illustrations/boy-with-rocket-dark.png" />
        </div>
      </div>
    </div>
    <!-- /Coming Soon -->
@endsection
