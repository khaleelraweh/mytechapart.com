    <!-- Core JS -->
    <!-- build:js frontend/vendor/js/theme.js  -->

    <script src="{{ asset('frontend/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('frontend/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/vendor/libs/@algolia/autocomplete-js.js') }}"></script>

    <script src="{{ asset('frontend/vendor/libs/pickr/pickr.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('frontend/vendor/libs/nouislider/nouislider.js') }}"></script>
    <script src="{{ asset('frontend/vendor/libs/swiper/swiper.js') }}"></script>

    <!-- Main JS -->

    <script src="{{ asset('frontend/js/front-main.js') }}"></script>

    <!-- Page JS -->
    @stack('page-script')
    <script src="{{ asset('frontend/js/front-page-landing.js') }}"></script>
