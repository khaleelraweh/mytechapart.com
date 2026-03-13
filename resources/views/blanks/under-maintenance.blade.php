@extends('layouts.blank')

@section('title', 'Demo: Under Maintenance - Pages | Sneat - Bootstrap Dashboard PRO')

@section('page-style')
<link rel="stylesheet" href="{{ asset('frontend') }}/vendor/css/pages/page-misc.css" />
@endsection

@section('content')
<!--Under Maintenance -->
    <div class="container-xxl container-p-y">
      <div class="misc-wrapper">
        <h3 class="mb-2 mx-2">Under Maintenance! 🚧</h3>
        <p class="mb-6 mx-2">Sorry for the inconvenience but we're performing some maintenance at the moment</p>
        <a href="index.html" class="btn btn-primary">Back to home</a>
        <div class="mt-6">
          <img
            src="{{ asset('frontend/img/illustrations/girl-doing-yoga-light.png') }}"
            alt="girl-doing-yoga-light"
            width="500"
            class="img-fluid"
            data-app-light-img="illustrations/girl-doing-yoga-light.png"
            data-app-dark-img="illustrations/girl-doing-yoga-dark.png" />
        </div>
      </div>
    </div>
    <!-- /Under Maintenance -->
@endsection
