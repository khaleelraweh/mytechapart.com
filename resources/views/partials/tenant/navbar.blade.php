<nav
            class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                <i class="icon-base bx bx-menu icon-md"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center justify-content-between w-100" id="navbar-collapse">
              {{-- Active Company Badge --}}
              <div class="d-none d-xl-flex align-items-center">
                <span class="badge bg-label-primary fs-6 px-3 py-2">
                  <i class="bx bx-buildings me-1"></i> {{ isset($activeCompany) ? $activeCompany->name : tenant('name') }}
                </span>
              </div>

              <ul class="navbar-nav flex-row align-items-center ms-md-auto">
                {{-- Language Switcher --}}
                @include('partials.shared.language-switcher')

                {{-- Theme toggle --}}
                <li class="nav-item dropdown me-2 me-xl-0">
                  <a class="nav-link dropdown-toggle hide-arrow" id="nav-theme" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="icon-base bx bx-sun icon-md theme-icon-active"></i>
                    <span class="d-none ms-2" id="nav-theme-text">Toggle theme</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="nav-theme-text">
                    <li>
                      <button type="button" class="dropdown-item align-items-center active" data-bs-theme-value="light">
                        <span><i class="icon-base bx bx-sun icon-md me-3" data-icon="sun"></i>{{ __('app.light') }}</span>
                      </button>
                    </li>
                    <li>
                      <button type="button" class="dropdown-item align-items-center" data-bs-theme-value="dark">
                        <span><i class="icon-base bx bx-moon icon-md me-3" data-icon="moon"></i>{{ __('app.dark') }}</span>
                      </button>
                    </li>
                    <li>
                      <button type="button" class="dropdown-item align-items-center" data-bs-theme-value="system">
                        <span><i class="icon-base bx bx-desktop icon-md me-3" data-icon="desktop"></i>{{ __('app.system') }}</span>
                      </button>
                    </li>
                  </ul>

                </li>

                {{-- User Dropdown --}}
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{ asset('backend/img/avatars/1.png') }}" alt class="rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{ asset('backend/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-0">{{ auth()->user()->name ?? __('app.hotel_admin') }}</h6>
                            <small class="text-body-secondary">{{ tenant('name') }}</small>
                          </div>

                        </div>
                      </a>
                    </li>
                    <li><div class="dropdown-divider my-1"></div></li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="icon-base bx bx-user icon-md me-3"></i><span>{{ __('app.my_profile') }}</span>
                      </a>
                    </li>
                    
                    @if(isset($tenantCompanies) && $tenantCompanies->count() > 1)
                    <li><div class="dropdown-divider my-1"></div></li>
                    <li>
                      <div class="px-3 py-2">
                        <label for="companySwitcher" class="form-label text-uppercase text-muted" style="font-size: 0.75rem;">تغيير المنشأة النشطة</label>
                        <form action="{{ route('tenant.change_company') }}" method="POST" id="companySwitcherForm">
                            @csrf
                            <select name="company_id" id="companySwitcher" class="form-select form-select-sm" onchange="document.getElementById('companySwitcherForm').submit()">
                                @foreach($tenantCompanies as $comp)
                                    <option value="{{ $comp->id }}" {{ (isset($activeCompany) && $activeCompany->id == $comp->id) ? 'selected' : '' }}>
                                        {{ $comp->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                      </div>
                    </li>
                    @endif
                    
                    <li><div class="dropdown-divider my-1"></div></li>
                    <li>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault(); document.getElementById('tenant-logout-form').submit();">
                        <i class="icon-base bx bx-power-off icon-md me-3"></i><span>{{ __('app.logout') }}</span>
                      </a>





                      <form id="tenant-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>




                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
