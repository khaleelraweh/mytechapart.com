<!doctype html>

<html
  lang="en"
  class="layout-navbar-fixed layout-wide"
  dir="ltr"
  data-skin="default"
  data-assets-path="{{ asset('frontend') }}/"
  data-template="front-pages"
  data-bs-theme="light">
  <head>
    @include('partials.frontend.head')
  </head>

  <body>
    <script src="{{ asset('frontend/vendor/js/dropdown-hover.js') }}"></script>
    <script src="{{ asset('frontend/vendor/js/mega-dropdown.js') }}"></script>
    
    <!-- Navbar: Start -->
    @include('partials.frontend.navbar')
    <!-- Navbar: End -->

    <!-- Sections:Start -->
    <div data-bs-spy="scroll" class="scrollspy-example">
        @yield('content')
    </div>
    <!-- / Sections:End -->

    <!-- Footer: Start -->
    @include('partials.frontend.footer')
    <!-- Footer: End -->

    @include('partials.frontend.scripts')
  </body>
</html>
