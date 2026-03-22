@extends('layouts.app')

@section('content')
<!-- Pricing Plans -->
    <section class="section-py first-section-pt">
      <div class="container">
        <h2 class="text-center mb-2">{{ __('pricing.pricing_plans') }}</h2>
        <p class="text-center mb-0">
          {{ __('pricing.pricing_desc1') }}<br />
          {{ __('pricing.pricing_desc2') }}
        </p>
        <div class="d-flex align-items-center justify-content-center flex-wrap gap-2 pt-9 pb-3 mb-2">
          <label class="switch switch-sm ms-sm-12 ps-sm-12 me-0">
            <span class="switch-label fs-6 text-body">{{ __('pricing.monthly') }}</span>
            <input type="checkbox" class="switch-input price-duration-toggler" checked />
            <span class="switch-toggle-slider">
              <span class="switch-on"></span>
              <span class="switch-off"></span>
            </span>
            <span class="switch-label fs-6 text-body">{{ __('pricing.annually') }}</span>
          </label>
          <div class="mt-n5 ms-n10 ml-2 mb-10 d-none d-sm-flex align-items-center gap-1">
            <img
              src="{{ asset('assets/img/pages/pricing-arrow-light.png') }}"
              alt="arrow img"
              class="scaleX-n1-rtl pt-1"
              data-app-dark-img="pages/pricing-arrow-dark.png"
              data-app-light-img="pages/pricing-arrow-light.png" />
            <span class="badge badge-sm bg-label-primary rounded-1 mb-3">{{ __('pricing.save_up_to_10') }}</span>
          </div>
        </div>

        <div class="row g-6">
          <!-- Basic -->
          <div class="col-lg">
            <div class="card border rounded shadow-none">
              <div class="card-body pt-12 px-5">
                <div class="mt-3 mb-5 text-center">
                  <img src="{{ asset('assets/img/icons/unicons/bookmark.png') }}" alt="Basic Image" width="120" />
                </div>
                <h4 class="card-title text-center text-capitalize mb-1">{{ __('pricing.basic') }}</h4>
                <p class="text-center mb-5">{{ __('pricing.basic_desc') }}</p>
                <div class="text-center h-px-50">
                  <div class="d-flex justify-content-center">
                    <sup class="h6 text-body pricing-currency mt-2 mb-0 me-1">$</sup>
                    <h1 class="mb-0 text-primary">0</h1>
                    <sub class="h6 text-body pricing-duration mt-auto mb-1 ms-1">{{ __('pricing.month') }}</sub>
                  </div>
                </div>

                <ul class="list-group my-5 pt-9">
                  <li class="mb-4 d-flex align-items-center">
                    <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                      ><i class="icon-base bx bx-check icon-xs"></i></span
                    ><span>{{ __('pricing.basic_f1') }}</span>
                  </li>
                  <li class="mb-4 d-flex align-items-center">
                    <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                      ><i class="icon-base bx bx-check icon-xs"></i></span
                    ><span>{{ __('pricing.basic_f2') }}</span>
                  </li>
                  <li class="mb-4 d-flex align-items-center">
                    <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                      ><i class="icon-base bx bx-check icon-xs"></i></span
                    ><span>{{ __('pricing.basic_f3') }}</span>
                  </li>
                  <li class="mb-4 d-flex align-items-center">
                    <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                      ><i class="icon-base bx bx-check icon-xs"></i></span
                    ><span>{{ __('pricing.basic_f4') }}</span>
                  </li>
                  <li class="mb-0 d-flex align-items-center">
                    <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                      ><i class="icon-base bx bx-check icon-xs"></i></span
                    ><span>{{ __('pricing.basic_f5') }}</span>
                  </li>
                </ul>
                <a href="{{ url('payment-page') }}" class="btn btn-label-success d-grid w-100">{{ __('pricing.your_current_plan') }}</a>
              </div>
            </div>
          </div>

          <!-- Pro -->
          <div class="col-lg">
            <div class="card border-primary border shadow-none">
              <div class="card-body position-relative pt-4">
                <div class="position-absolute end-0 me-5 top-0 mt-4">
                  <span class="badge bg-label-primary rounded-1">{{ __('pricing.popular') }}</span>
                </div>
                <div class="my-5 pt-6 text-center">
                  <img src="{{ asset('assets/img/icons/unicons/wallet-round.png') }}" alt="Pro Image" width="120" />
                </div>
                <h4 class="card-title text-center text-capitalize mb-1">{{ __('pricing.standard') }}</h4>
                <p class="text-center mb-5">{{ __('pricing.standard_desc') }}</p>
                <div class="text-center h-px-50">
                  <div class="d-flex justify-content-center">
                    <sup class="h6 text-body pricing-currency mt-2 mb-0 me-1">$</sup>
                    <h1 class="price-toggle price-yearly text-primary mb-0">7</h1>
                    <h1 class="price-toggle price-monthly text-primary mb-0 d-none">9</h1>
                    <sub class="h6 text-body pricing-duration mt-auto mb-1 ms-1">{{ __('pricing.month') }}</sub>
                  </div>
                  <small class="price-yearly price-yearly-toggle text-body-secondary">{{ __('pricing.usd_480_year') }}</small>
                </div>

                <ul class="list-group my-5 pt-9">
                  <li class="mb-4 d-flex align-items-center">
                    <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                      ><i class="icon-base bx bx-check icon-xs"></i></span
                    ><span>{{ __('pricing.std_f1') }}</span>
                  </li>
                  <li class="mb-4 d-flex align-items-center">
                    <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                      ><i class="icon-base bx bx-check icon-xs"></i></span
                    ><span>{{ __('pricing.std_f2') }}</span>
                  </li>
                  <li class="mb-4 d-flex align-items-center">
                    <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                      ><i class="icon-base bx bx-check icon-xs"></i></span
                    ><span>{{ __('pricing.std_f3') }}</span>
                  </li>
                  <li class="mb-4 d-flex align-items-center">
                    <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                      ><i class="icon-base bx bx-check icon-xs"></i></span
                    ><span>{{ __('pricing.std_f4') }}</span>
                  </li>
                  <li class="mb-0 d-flex align-items-center">
                    <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                      ><i class="icon-base bx bx-check icon-xs"></i></span
                    ><span>{{ __('pricing.std_f5') }}</span>
                  </li>
                </ul>
                <a href="{{ url('payment-page') }}" class="btn btn-primary d-grid w-100">{{ __('pricing.upgrade') }}</a>
              </div>
            </div>
          </div>

          <!-- Enterprise -->
          <div class="col-lg">
            <div class="card border rounded shadow-none">
              <div class="card-body pt-12">
                <div class="position-absolute end-0 me-5 top-0 mt-4">
                  <span class="badge bg-label-primary rounded-1">{{ __('pricing.popular') }}</span>
                </div>
                <div class="mt-3 mb-5 text-center">
                  <img src="{{ asset('assets/img/icons/unicons/briefcase-round.png') }}" alt="Pro Image" width="120" />
                </div>
                <h4 class="card-title text-center text-capitalize mb-1">{{ __('pricing.enterprise') }}</h4>
                <p class="text-center mb-5">{{ __('pricing.enterprise_desc') }}</p>

                <div class="text-center h-px-50">
                  <div class="d-flex justify-content-center">
                    <sup class="h6 text-body pricing-currency mt-2 mb-0 me-1">$</sup>
                    <h1 class="price-toggle price-yearly text-primary mb-0">16</h1>
                    <h1 class="price-toggle price-monthly text-primary mb-0 d-none">19</h1>
                    <sub class="h6 text-body pricing-duration mt-auto mb-1 ms-1">{{ __('pricing.month') }}</sub>
                  </div>
                  <small class="price-yearly price-yearly-toggle text-body-secondary">{{ __('pricing.usd_960_year') }}</small>
                </div>
                <ul class="list-group my-5 pt-9">
                  <li class="mb-4 d-flex align-items-center">
                    <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                      ><i class="icon-base bx bx-check icon-xs"></i></span
                    ><span>{{ __('pricing.ent_f1') }}</span>
                  </li>
                  <li class="mb-4 d-flex align-items-center">
                    <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                      ><i class="icon-base bx bx-check icon-xs"></i></span
                    ><span>{{ __('pricing.ent_f2') }}</span>
                  </li>
                  <li class="mb-4 d-flex align-items-center">
                    <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                      ><i class="icon-base bx bx-check icon-xs"></i></span
                    ><span>{{ __('pricing.ent_f3') }}</span>
                  </li>
                  <li class="mb-4 d-flex align-items-center">
                    <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                      ><i class="icon-base bx bx-check icon-xs"></i></span
                    ><span>{{ __('pricing.ent_f4') }}</span>
                  </li>
                  <li class="mb-0 d-flex align-items-center">
                    <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                      ><i class="icon-base bx bx-check icon-xs"></i></span
                    ><span>{{ __('pricing.ent_f5') }}</span>
                  </li>
                </ul>
                <a href="{{ url('payment-page') }}" class="btn btn-label-primary d-grid w-100">{{ __('pricing.upgrade') }}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/ Pricing Plans -->
    <!-- Pricing Free Trial -->
    <section class="pricing-free-trial bg-label-primary">
      <div class="container">
        <div class="position-relative">
          <div class="d-flex justify-content-between flex-column-reverse flex-lg-row align-items-center pt-12 pb-10">
            <div class="text-center text-lg-start">
              <h4 class="text-primary mb-2">{{ __('pricing.free_trial_title') }}</h4>
              <p class="text-body mb-6 mb-md-11">{{ __('pricing.free_trial_desc') }}</p>
              <a href="{{ url('payment-page') }}" class="btn btn-primary">{{ __('pricing.start_free_trial') }}</a>
            </div>
            <!-- image -->
            <div class="text-center">
              <img
                src="{{ asset('assets/img/illustrations/lady-with-laptop-light.png') }}"
                class="img-fluid me-lg-5 pe-lg-1 mb-3 mb-lg-0"
                alt="Api Key Image"
                width="202"
                data-app-light-img="illustrations/lady-with-laptop-light.png"
                data-app-dark-img="illustrations/lady-with-laptop-dark.png" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/ Pricing Free Trial -->
    <!-- Plans Comparison -->
    <section class="section-py pricing-plans-comparison">
      <div class="container">
        <div class="col-12 text-center mb-6">
          <h3 class="mb-2">{{ __('pricing.compare_title') }}</h3>
          <p>{{ __('pricing.compare_desc') }}</p>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive border border-top-0 rounded">
              <table class="table table-striped text-center mb-0">
                <thead>
                  <tr>
                    <th scope="col">
                      <p class="mb-50">{{ __('pricing.features') }}</p>
                      <small class="text-body fw-normal text-capitalize">{{ __('pricing.native_front_features') }}</small>
                    </th>
                    <th scope="col">
                      <p class="mb-50">{{ __('pricing.starter') }}</p>
                      <small class="text-body fw-normal text-capitalize">{{ __('pricing.free') }}</small>
                    </th>
                    <th scope="col">
                      <p class="mb-50 position-relative">
                        {{ __('pricing.pro') }}
                        <span class="badge badge-center rounded-pill bg-primary position-absolute mt-n2 ms-1"
                          ><i class="icon-base bx bx-star"></i
                        ></span>
                      </p>
                      <small class="text-body fw-normal text-capitalize">{{ __('pricing.7_5_month') }}</small>
                    </th>
                    <th scope="col">
                      <p class="mb-50">{{ __('pricing.enterprise') }}</p>
                      <small class="text-body fw-normal text-capitalize">{{ __('pricing.16_month') }}</small>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-heading">{{ __('pricing.14_days_free_trial') }}</td>
                    <td>
                      <span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary p-0">
                        <i class="icon-base bx bx-check"></i>
                      </span>
                    </td>
                    <td>
                      <span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary p-0">
                        <i class="icon-base bx bx-check"></i>
                      </span>
                    </td>
                    <td>
                      <span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary p-0">
                        <i class="icon-base bx bx-check"></i>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-heading">{{ __('pricing.no_user_limit') }}</td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-x"></i>
                      </span>
                    </td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-x"></i>
                      </span>
                    </td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-check"></i>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-heading">{{ __('pricing.product_support') }}</td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-x"></i>
                      </span>
                    </td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-check"></i>
                      </span>
                    </td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-check"></i>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-heading">{{ __('pricing.email_support') }}</td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-x"></i>
                      </span>
                    </td>
                    <td>
                      <span class="badge bg-label-primary badge-sm">{{ __('pricing.add_on_available') }}</span>
                    </td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-check"></i>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-heading">{{ __('pricing.integrations') }}</td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-x"></i>
                      </span>
                    </td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-check"></i>
                      </span>
                    </td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-check"></i>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-heading">{{ __('pricing.removal_of_front_branding') }}</td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-x"></i>
                      </span>
                    </td>
                    <td>
                      <span class="badge bg-label-primary badge-sm">{{ __('pricing.add_on_available') }}</span>
                    </td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-check"></i>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-heading">{{ __('pricing.active_maintenance') }}</td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-x"></i>
                      </span>
                    </td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-x"></i>
                      </span>
                    </td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-check"></i>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-heading">{{ __('pricing.data_storage') }}</td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-x"></i>
                      </span>
                    </td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-x"></i>
                      </span>
                    </td>
                    <td>
                      <span
                        class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary p-0 d-inline-flex align-items-center justify-content-center">
                        <i class="icon-base bx bx-check"></i>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>
                      <a href="{{ url('payment-page') }}" class="btn text-nowrap btn-label-primary">{{ __('pricing.choose_plan') }}</a>
                    </td>
                    <td>
                      <a href="{{ url('payment-page') }}" class="btn text-nowrap btn-primary">{{ __('pricing.choose_plan') }}</a>
                    </td>
                    <td>
                      <a href="{{ url('payment-page') }}" class="btn text-nowrap btn-label-primary">{{ __('pricing.choose_plan') }}</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/ Plans Comparison -->
    <!-- FAQS -->
    <section class="section-py pricing-faqs rounded-bottom bg-body">
      <div class="container">
        <div class="text-center mb-6">
          <h4 class="mb-2">{{ __('pricing.faqs') }}</h4>
          <p>{{ __('pricing.faqs_desc') }}</p>
        </div>
        <div class="accordion" id="pricingFaq">
          <div class="card accordion-item">
            <h2 class="accordion-header" id="headingone">
              <button
                type="button"
                class="accordion-button collapsed"
                data-bs-toggle="collapse"
                data-bs-target="#faq-1"
                aria-expanded="false"
                aria-controls="faq-1">
                {{ __('pricing.faq1_q') }}
              </button>
            </h2>
            <div
              id="faq-1"
              class="accordion-collapse collapse"
              aria-labelledby="headingone"
              data-bs-parent="#pricingFaq">
              <div class="accordion-body">
                {{ __('pricing.faq1_a') }}
              </div>
            </div>
          </div>
          <div class="card accordion-item active">
            <h2 class="accordion-header" id="headingTwo">
              <button
                type="button"
                class="accordion-button"
                data-bs-toggle="collapse"
                data-bs-target="#faq-2"
                aria-expanded="false"
                aria-controls="faq-2">
                {{ __('pricing.faq2_q') }}
              </button>
            </h2>
            <div
              id="faq-2"
              class="accordion-collapse collapse show"
              aria-labelledby="headingTwo"
              data-bs-parent="#pricingFaq">
              <div class="accordion-body">
                {{ __('pricing.faq2_a') }}
              </div>
            </div>
          </div>
          <div class="card accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button
                type="button"
                class="accordion-button collapsed"
                data-bs-toggle="collapse"
                data-bs-target="#faq-3"
                aria-expanded="false"
                aria-controls="faq-3">
                {{ __('pricing.faq3_q') }}
              </button>
            </h2>
            <div
              id="faq-3"
              class="accordion-collapse collapse"
              aria-labelledby="headingThree"
              data-bs-parent="#pricingFaq">
              <div class="accordion-body">
                {{ __('pricing.faq3_a') }}
              </div>
            </div>
          </div>
          <div class="card accordion-item">
            <h6 class="accordion-header" id="headingFour">
              <button
                type="button"
                class="accordion-button collapsed"
                data-bs-toggle="collapse"
                data-bs-target="#faq-4"
                aria-expanded="false"
                aria-controls="faq-4">
                {{ __('pricing.faq4_q') }}
              </button>
            </h6>
            <div
              id="faq-4"
              class="accordion-collapse collapse"
              aria-labelledby="headingFour"
              data-bs-parent="#pricingFaq">
              <div class="accordion-body">{{ __('pricing.faq4_a') }}</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/ FAQS -->
@endsection
