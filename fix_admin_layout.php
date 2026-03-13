<?php
// Let's re-extract the backend securely by validating the DOM or just copying the exact structure.
// The issue is likely that "layout-navbar" or "content-wrapper" needs to be wrapped or closed correctly.

$layout_path = 'c:/xampp/htdocs/FuadNazel/resources/views/layouts/admin.blade.php';

$layout_html = <<<HTML
<!doctype html>

<html
  lang="en"
  class="layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-skin="default"
  data-assets-path="{{ asset('backend') }}/"
  data-template="vertical-menu-template-starter"
  data-bs-theme="light">
  
  @include('partials.backend.head')

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        
        <!-- Menu -->
        @include('partials.backend.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          
          <!-- Navbar -->
          @include('partials.backend.navbar')
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                @yield('content')
            </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('partials.backend.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    @include('partials.backend.scripts')
  </body>
</html>
HTML;

file_put_contents($layout_path, $layout_html);
echo "Rewrote admin.blade.php\n";
?>
