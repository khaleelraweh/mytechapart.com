@extends('layouts.app')

@section('content')
<section class="section-py bg-body first-section-pt">
      <div class="container">
        <div class="card px-3">
          <div class="row">
            <div class="col-lg-7 card-body border-end p-md-8">
              <h4 class="mb-2">{{ __('payment.checkout') }}</h4>
              <p class="mb-0">
                {{ __('payment.checkout_desc1') }} <br />
                {{ __('payment.checkout_desc2') }}
              </p>
              <div class="row g-5 py-8">
                <div class="col-md col-lg-12 col-xl-6">
                  <div class="form-check custom-option custom-option-basic checked">
                    <label
                      class="form-check-label custom-option-content form-check-input-payment d-flex gap-4 align-items-center"
                      for="customRadioVisa">
                      <input
                        name="customRadioTemp"
                        class="form-check-input"
                        type="radio"
                        value="credit-card"
                        id="customRadioVisa"
                        checked />
                      <span class="custom-option-body">
                        <img
                          src="{{ asset('assets/img/icons/payments/visa-light.png') }}"
                          alt="visa-card"
                          width="58"
                          data-app-light-img="icons/payments/visa-light.png"
                          data-app-dark-img="icons/payments/visa-dark.png" />
                        <span class="ms-4 fw-medium text-heading">{{ __('payment.credit_card') }}</span>
                      </span>
                    </label>
                  </div>
                </div>
                <div class="col-md col-lg-12 col-xl-6">
                  <div class="form-check custom-option custom-option-basic">
                    <label
                      class="form-check-label custom-option-content form-check-input-payment d-flex gap-4 align-items-center"
                      for="customRadioPaypal">
                      <input
                        name="customRadioTemp"
                        class="form-check-input"
                        type="radio"
                        value="paypal"
                        id="customRadioPaypal" />
                      <span class="custom-option-body">
                        <img
                          src="{{ asset('assets/img/icons/payments/paypal-light.png') }}"
                          alt="paypal"
                          width="58"
                          data-app-light-img="icons/payments/paypal-light.png"
                          data-app-dark-img="icons/payments/paypal-dark.png" />
                        <span class="ms-4 fw-medium text-heading">{{ __('payment.paypal') }}</span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <h4 class="mb-6">{{ __('payment.billing_details') }}</h4>
              <form>
                <div class="row g-6">
                  <div class="col-md-6">
                    <label class="form-label" for="billings-email">{{ __('payment.email_address') }}</label>
                    <input type="text" id="billings-email" class="form-control" placeholder="{{ __('payment.email_placeholder') }}" />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="billings-password">{{ __('payment.password') }}</label>
                    <input type="password" id="billings-password" class="form-control" placeholder="{{ __('payment.password_placeholder') }}" />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="billings-country">{{ __('payment.country') }}</label>
                    <select id="billings-country" class="form-select" data-allow-clear="true">
                      <option value="">{{ __('payment.select') }}</option>
                      <option value="Australia">{{ __('payment.australia') }}</option>
                      <option value="Brazil">{{ __('payment.brazil') }}</option>
                      <option value="Canada">{{ __('payment.canada') }}</option>
                      <option value="China">{{ __('payment.china') }}</option>
                      <option value="France">{{ __('payment.france') }}</option>
                      <option value="Germany">{{ __('payment.germany') }}</option>
                      <option value="India">{{ __('payment.india') }}</option>
                      <option value="Turkey">{{ __('payment.turkey') }}</option>
                      <option value="Ukraine">{{ __('payment.ukraine') }}</option>
                      <option value="United Arab Emirates">{{ __('payment.uae') }}</option>
                      <option value="United Kingdom">{{ __('payment.uk') }}</option>
                      <option value="United States">{{ __('payment.us') }}</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="billings-zip">{{ __('payment.billing_zip') }}</label>
                    <input
                      type="text"
                      id="billings-zip"
                      class="form-control billings-zip-code"
                      placeholder="{{ __('payment.zip_placeholder') }}" />
                  </div>
                </div>
              </form>
              <div id="form-credit-card">
                <h4 class="mt-8 mb-6">{{ __('payment.credit_card_info') }}</h4>
                <form>
                  <div class="row g-6">
                    <div class="col-12">
                      <label class="form-label" for="billings-card-num">{{ __('payment.card_number') }}</label>
                      <div class="input-group input-group-merge">
                        <input
                          type="text"
                          id="billings-card-num"
                          class="form-control billing-card-mask"
                          placeholder="{{ __('payment.card_placeholder') }}"
                          aria-describedby="paymentCard" />
                        <span class="input-group-text cursor-pointer p-1" id="paymentCard"
                          ><span class="card-type"></span
                        ></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="billings-card-name">{{ __('payment.name') }}</label>
                      <input type="text" id="billings-card-name" class="form-control" placeholder="{{ __('payment.name_placeholder') }}" />
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="billings-card-date">{{ __('payment.exp_date') }}</label>
                      <input
                        type="text"
                        id="billings-card-date"
                        class="form-control billing-expiry-date-mask"
                        placeholder="{{ __('payment.exp_placeholder') }}" />
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="billings-card-cvv">{{ __('payment.cvv') }}</label>
                      <input
                        type="text"
                        id="billings-card-cvv"
                        class="form-control billing-cvv-mask"
                        maxlength="3"
                        placeholder="{{ __('payment.cvv_placeholder') }}" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-5 card-body p-md-8">
              <h4 class="mb-2">{{ __('payment.order_summary') }}</h4>
              <p class="mb-8">
                {{ __('payment.order_summary_desc1') }}<br />
                {{ __('payment.order_summary_desc2') }}
              </p>
              <div class="bg-lighter p-6 rounded">
                <p>{{ __('payment.plan_desc') }}</p>
                <div class="d-flex align-items-center mb-4">
                  <h1 class="text-heading mb-0">$59.99</h1>
                  <sub class="h6 text-body mb-n3">{{ __('payment.month') }}</sub>
                </div>
                <div class="d-grid">
                  <button
                    type="button"
                    data-bs-target="#pricingModal"
                    data-bs-toggle="modal"
                    class="btn btn-label-primary">
                    {{ __('payment.change_plan') }}
                  </button>
                </div>
              </div>
              <div class="mt-5">
                <div class="d-flex justify-content-between align-items-center">
                  <p class="mb-0">{{ __('payment.subtotal') }}</p>
                  <h6 class="mb-0">$85.99</h6>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-2">
                  <p class="mb-0">{{ __('payment.tax') }}</p>
                  <h6 class="mb-0">$4.99</h6>
                </div>
                <hr />
                <div class="d-flex justify-content-between align-items-center mt-4 pb-1">
                  <p class="mb-0">{{ __('payment.total') }}</p>
                  <h6 class="mb-0">$90.98</h6>
                </div>
                <div class="d-grid mt-5">
                  <button class="btn btn-success">
                    <span class="me-2">{{ __('payment.proceed_payment') }}</span>
                    <i class="icon-base bx bx-right-arrow-alt scaleX-n1-rtl"></i>
                  </button>
                </div>

                <p class="mt-8">
                  {{ __('payment.terms_accept') }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal -->
    <!-- Pricing Modal -->
    <div class="modal fade" id="pricingModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-simple modal-pricing">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <!-- Pricing Plans -->
            <div class="rounded-top">
              <h4 class="text-center mb-2">{{ __('payment.pricing_modal_title') }}</h4>
              <p class="text-center mb-0">
                {{ __('payment.pricing_modal_desc') }}
              </p>
              <div class="d-flex align-items-center justify-content-center flex-wrap gap-2 pt-12 pb-4">
                <label class="switch switch-sm ms-sm-12 ps-sm-12 me-0">
                  <span class="switch-label fs-6 text-body">{{ __('payment.monthly') }}</span>
                  <input type="checkbox" class="switch-input price-duration-toggler" checked />
                  <span class="switch-toggle-slider">
                    <span class="switch-on"></span>
                    <span class="switch-off"></span>
                  </span>
                  <span class="switch-label fs-6 text-body">{{ __('payment.annually') }}</span>
                </label>
                <div class="mt-n5 ms-n10 ml-2 mb-10 d-none d-sm-flex align-items-center gap-1">
                  <img
                    src="{{ asset('assets/img/pages/pricing-arrow-light.png') }}"
                    alt="arrow img"
                    class="scaleX-n1-rtl pt-1"
                    data-app-dark-img="pages/pricing-arrow-dark.png"
                    data-app-light-img="pages/pricing-arrow-light.png" />
                  <span class="badge badge-sm bg-label-primary rounded-1 mb-2">{{ __('payment.save_up_to_10') }}</span>
                </div>
              </div>

              <div class="row gy-6">
                <!-- Basic -->
                <div class="col-xl mb-md-0 px-3">
                  <div class="card border rounded shadow-none">
                    <div class="card-body pt-12">
                      <div class="mt-3 mb-5 text-center">
                        <img src="{{ asset('assets/img/icons/unicons/bookmark.png') }}" alt="Basic Image" width="120" />
                      </div>
                      <h4 class="card-title text-center text-capitalize mb-1">{{ __('payment.basic') }}</h4>
                      <p class="text-center mb-5">{{ __('payment.basic_desc') }}</p>
                      <div class="text-center h-px-50">
                        <div class="d-flex justify-content-center">
                          <sup class="h6 text-body pricing-currency mt-2 mb-0 me-1">$</sup>
                          <h1 class="mb-0 text-primary">0</h1>
                          <sub class="h6 text-body pricing-duration mt-auto mb-1">{{ __('payment.month') }}</sub>
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

                      <button type="button" class="btn btn-label-success d-grid w-100" data-bs-dismiss="modal">
                        {{ __('payment.your_current_plan') }}
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Pro -->
                <div class="col-xl mb-md-0 px-3">
                  <div class="card border-primary border shadow-none">
                    <div class="card-body position-relative pt-4">
                      <div class="position-absolute end-0 me-5 top-0 mt-4">
                        <span class="badge bg-label-primary rounded-1">{{ __('payment.popular') }}</span>
                      </div>
                      <div class="my-5 pt-6 text-center">
                        <img src="{{ asset('assets/img/icons/unicons/wallet-round.png') }}" alt="Pro Image" width="120" />
                      </div>
                      <h4 class="card-title text-center text-capitalize mb-1">{{ __('payment.standard') }}</h4>
                      <p class="text-center mb-5">{{ __('payment.standard_desc') }}</p>
                      <div class="text-center h-px-50">
                        <div class="d-flex justify-content-center">
                          <sup class="h6 text-body pricing-currency mt-2 mb-0 me-1">$</sup>
                          <h1 class="price-toggle price-yearly text-primary mb-0">7</h1>
                          <h1 class="price-toggle price-monthly text-primary mb-0 d-none">9</h1>
                          <sub class="h6 text-body pricing-duration mt-auto mb-1">{{ __('payment.month') }}</sub>
                        </div>
                        <small class="price-yearly price-yearly-toggle text-body-secondary">{{ __('payment.usd_480_year') }}</small>
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

                      <button type="button" class="btn btn-primary d-grid w-100" data-bs-dismiss="modal">
                        {{ __('payment.upgrade') }}
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Enterprise -->
                <div class="col-xl px-3">
                  <div class="card border rounded shadow-none">
                    <div class="card-body pt-12">
                      <div class="mt-3 mb-5 text-center">
                        <img src="{{ asset('assets/img/icons/unicons/briefcase-round.png') }}" alt="Pro Image" width="120" />
                      </div>
                      <h4 class="card-title text-center text-capitalize mb-1">{{ __('payment.enterprise') }}</h4>
                      <p class="text-center mb-5">{{ __('payment.enterprise_desc') }}</p>

                      <div class="text-center h-px-50">
                        <div class="d-flex justify-content-center">
                          <sup class="h6 text-body pricing-currency mt-2 mb-0 me-1">$</sup>
                          <h1 class="price-toggle price-yearly text-primary mb-0">16</h1>
                          <h1 class="price-toggle price-monthly text-primary mb-0 d-none">19</h1>
                          <sub class="h6 text-body pricing-duration mt-auto mb-1">{{ __('payment.month') }}</sub>
                        </div>
                        <small class="price-yearly price-yearly-toggle text-body-secondary">{{ __('payment.usd_960_year') }}</small>
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

                      <button type="button" class="btn btn-label-primary d-grid w-100" data-bs-dismiss="modal">
                        {{ __('payment.upgrade') }}
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--/ Pricing Plans -->
        </div>
      </div>
    </div>
    <!--/ Pricing Modal -->
    <script src="{{ asset('assets//js/pages-pricing.js') }}"></script>
    <!-- /Modal -->
@endsection
