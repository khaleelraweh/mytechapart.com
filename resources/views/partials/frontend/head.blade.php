    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title', 'Sneat - Bootstrap Dashboard PRO')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('frontend/vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <!-- build:css frontend/vendor/css/theme.css  -->

    <link rel="stylesheet" href="{{ asset('frontend/vendor/libs/pickr/pickr-themes.css') }}" />

    <link rel="stylesheet" href="{{ asset('frontend/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('frontend/vendor/css/pages/front-page.css') }}" />

    <!-- Vendors CSS -->

    <!-- endbuild -->

    <link rel="stylesheet" href="{{ asset('frontend/vendor/libs/nouislider/nouislider.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendor/libs/swiper/swiper.css') }}" />

    <!-- Page CSS -->
    @stack('page-style')

    <link rel="stylesheet" href="{{ asset('frontend/vendor/css/pages/front-page-landing.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('frontend/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script>
      const currentLaravelLocale = '{{ app()->getLocale() }}';
      const tplName = document.documentElement.getAttribute('data-template');
      if (tplName) {
        localStorage.setItem('templateCustomizer-' + tplName + '--Lang', currentLaravelLocale);
        localStorage.setItem('templateCustomizer-' + tplName + '--Rtl', currentLaravelLocale === 'ar' ? 'true' : 'false');
      }
    </script>
    <script src="{{ asset('frontend/vendor/js/template-customizer.js') }}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="{{ asset('frontend/js/front-config.js') }}"></script>
