{{-- Language Switcher Dropdown --}}
<li class="nav-item dropdown dropdown-language me-1 me-sm-2">
  <a class="nav-link dropdown-toggle hide-arrow d-flex align-items-center gap-1"
     href="javascript:void(0);"
     data-bs-toggle="dropdown"
     title="{{ __('frontend.change_language') }}">
    <i class="icon-base bx bx-globe icon-md"></i>
    <span class="small d-none d-xl-inline fw-semibold">{{ strtoupper(app()->getLocale()) }}</span>
  </a>
  <ul class="dropdown-menu dropdown-menu-start">
    <li>
      <a class="dropdown-item d-flex align-items-center gap-2 {{ app()->getLocale() === 'en' ? 'active' : '' }}"
         href="{{ route('lang.switch', 'en') }}"
         data-language="en">
        🇺🇸 <span>English</span>
      </a>
    </li>
    <li>
      <a class="dropdown-item d-flex align-items-center gap-2 {{ app()->getLocale() === 'ar' ? 'active' : '' }}"
         href="{{ route('lang.switch', 'ar') }}"
         data-language="ar">
        🇸🇦 <span>العربية</span>
      </a>
    </li>
  </ul>
</li>
