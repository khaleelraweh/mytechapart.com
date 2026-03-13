@extends('layouts.app')

@section('content')
<section class="section-py bg-body first-section-pt">
      <div class="container">
        <div class="card px-3">
          <div class="row">
            <div class="col-lg-7 card-body border-end p-md-8">
              <h4 class="mb-2">Checkout</h4>
              <p class="mb-0">
                All plans include 40+ advanced tools and features to boost your product. <br />
                Choose the best plan to fit your needs.
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
                        <span class="ms-4 fw-medium text-heading">Credit Card</span>
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
                        <span class="ms-4 fw-medium text-heading">Paypal</span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <h4 class="mb-6">Billing Details</h4>
              <form>
                <div class="row g-6">
                  <div class="col-md-6">
                    <label class="form-label" for="billings-email">Email Address</label>
                    <input type="text" id="billings-email" class="form-control" placeholder="john.doe@gmail.com" />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="billings-password">Password</label>
                    <input type="password" id="billings-password" class="form-control" placeholder="Password" />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="billings-country">Country</label>
                    <select id="billings-country" class="form-select" data-allow-clear="true">
                      <option value="">Select</option>
                      <option value="Australia">Australia</option>
                      <option value="Brazil">Brazil</option>
                      <option value="Canada">Canada</option>
                      <option value="China">China</option>
                      <option value="France">France</option>
                      <option value="Germany">Germany</option>
                      <option value="India">India</option>
                      <option value="Turkey">Turkey</option>
                      <option value="Ukraine">Ukraine</option>
                      <option value="United Arab Emirates">United Arab Emirates</option>
                      <option value="United Kingdom">United Kingdom</option>
                      <option value="United States">United States</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="billings-zip">Billing Zip / Postal Code</label>
                    <input
                      type="text"
                      id="billings-zip"
                      class="form-control billings-zip-code"
                      placeholder="Zip / Postal Code" />
                  </div>
                </div>
              </form>
              <div id="form-credit-card">
                <h4 class="mt-8 mb-6">Credit Card Info</h4>
                <form>
                  <div class="row g-6">
                    <div class="col-12">
                      <label class="form-label" for="billings-card-num">Card number</label>
                      <div class="input-group input-group-merge">
                        <input
                          type="text"
                          id="billings-card-num"
                          class="form-control billing-card-mask"
                          placeholder="7465 8374 5837 5067"
                          aria-describedby="paymentCard" />
                        <span class="input-group-text cursor-pointer p-1" id="paymentCard"
                          ><span class="card-type"></span
                        ></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="billings-card-name">Name</label>
                      <input type="text" id="billings-card-name" class="form-control" placeholder="John Doe" />
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="billings-card-date">EXP. Date</label>
                      <input
                        type="text"
                        id="billings-card-date"
                        class="form-control billing-expiry-date-mask"
                        placeholder="MM/YY" />
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="billings-card-cvv">CVV</label>
                      <input
                        type="text"
                        id="billings-card-cvv"
                        class="form-control billing-cvv-mask"
                        maxlength="3"
                        placeholder="965" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-5 card-body p-md-8">
              <h4 class="mb-2">Order Summary</h4>
              <p class="mb-8">
                It can help you manage and service orders before,<br />
                during and after fulfilment.
              </p>
              <div class="bg-lighter p-6 rounded">
                <p>A simple start for everyone</p>
                <div class="d-flex align-items-center mb-4">
                  <h1 class="text-heading mb-0">$59.99</h1>
                  <sub class="h6 text-body mb-n3">/month</sub>
                </div>
                <div class="d-grid">
                  <button
                    type="button"
                    data-bs-target="#pricingModal"
                    data-bs-toggle="modal"
                    class="btn btn-label-primary">
                    Change Plan
                  </button>
                </div>
              </div>
              <div class="mt-5">
                <div class="d-flex justify-content-between align-items-center">
                  <p class="mb-0">Subtotal</p>
                  <h6 class="mb-0">$85.99</h6>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-2">
                  <p class="mb-0">Tax</p>
                  <h6 class="mb-0">$4.99</h6>
                </div>
                <hr />
                <div class="d-flex justify-content-between align-items-center mt-4 pb-1">
                  <p class="mb-0">Total</p>
                  <h6 class="mb-0">$90.98</h6>
                </div>
                <div class="d-grid mt-5">
                  <button class="btn btn-success">
                    <span class="me-2">Proceed with Payment</span>
                    <i class="icon-base bx bx-right-arrow-alt scaleX-n1-rtl"></i>
                  </button>
                </div>

                <p class="mt-8">
                  By continuing, you accept to our Terms of Services and Privacy Policy. Please note that payments are
                  non-refundable.
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
              <h4 class="text-center mb-2">Pricing Plans</h4>
              <p class="text-center mb-0">
                All plans include 40+ advanced tools and features to boost your product. Choose the best plan to fit
                your needs.
              </p>
              <div class="d-flex align-items-center justify-content-center flex-wrap gap-2 pt-12 pb-4">
                <label class="switch switch-sm ms-sm-12 ps-sm-12 me-0">
                  <span class="switch-label fs-6 text-body">Monthly</span>
                  <input type="checkbox" class="switch-input price-duration-toggler" checked />
                  <span class="switch-toggle-slider">
                    <span class="switch-on"></span>
                    <span class="switch-off"></span>
                  </span>
                  <span class="switch-label fs-6 text-body">Annually</span>
                </label>
                <div class="mt-n5 ms-n10 ml-2 mb-10 d-none d-sm-flex align-items-center gap-1">
                  <img
                    src="{{ asset('assets/img/pages/pricing-arrow-light.png') }}"
                    alt="arrow img"
                    class="scaleX-n1-rtl pt-1"
                    data-app-dark-img="pages/pricing-arrow-dark.png"
                    data-app-light-img="pages/pricing-arrow-light.png" />
                  <span class="badge badge-sm bg-label-primary rounded-1 mb-2">Save up to 10%</span>
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
                      <h4 class="card-title text-center text-capitalize mb-1">Basic</h4>
                      <p class="text-center mb-5">A simple start for everyone</p>
                      <div class="text-center h-px-50">
                        <div class="d-flex justify-content-center">
                          <sup class="h6 text-body pricing-currency mt-2 mb-0 me-1">$</sup>
                          <h1 class="mb-0 text-primary">0</h1>
                          <sub class="h6 text-body pricing-duration mt-auto mb-1">/month</sub>
                        </div>
                      </div>

                      <ul class="list-group my-5 pt-9">
                        <li class="mb-4 d-flex align-items-center">
                          <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                            ><i class="icon-base bx bx-check icon-xs"></i></span
                          ><span>100 responses a month</span>
                        </li>
                        <li class="mb-4 d-flex align-items-center">
                          <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                            ><i class="icon-base bx bx-check icon-xs"></i></span
                          ><span>Unlimited forms and surveys</span>
                        </li>
                        <li class="mb-4 d-flex align-items-center">
                          <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                            ><i class="icon-base bx bx-check icon-xs"></i></span
                          ><span>Unlimited fields</span>
                        </li>
                        <li class="mb-4 d-flex align-items-center">
                          <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                            ><i class="icon-base bx bx-check icon-xs"></i></span
                          ><span>Basic form creation tools</span>
                        </li>
                        <li class="mb-0 d-flex align-items-center">
                          <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                            ><i class="icon-base bx bx-check icon-xs"></i></span
                          ><span>Up to 2 subdomains</span>
                        </li>
                      </ul>

                      <button type="button" class="btn btn-label-success d-grid w-100" data-bs-dismiss="modal">
                        Your Current Plan
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Pro -->
                <div class="col-xl mb-md-0 px-3">
                  <div class="card border-primary border shadow-none">
                    <div class="card-body position-relative pt-4">
                      <div class="position-absolute end-0 me-5 top-0 mt-4">
                        <span class="badge bg-label-primary rounded-1">Popular</span>
                      </div>
                      <div class="my-5 pt-6 text-center">
                        <img src="{{ asset('assets/img/icons/unicons/wallet-round.png') }}" alt="Pro Image" width="120" />
                      </div>
                      <h4 class="card-title text-center text-capitalize mb-1">Standard</h4>
                      <p class="text-center mb-5">For small to medium businesses</p>
                      <div class="text-center h-px-50">
                        <div class="d-flex justify-content-center">
                          <sup class="h6 text-body pricing-currency mt-2 mb-0 me-1">$</sup>
                          <h1 class="price-toggle price-yearly text-primary mb-0">7</h1>
                          <h1 class="price-toggle price-monthly text-primary mb-0 d-none">9</h1>
                          <sub class="h6 text-body pricing-duration mt-auto mb-1">/month</sub>
                        </div>
                        <small class="price-yearly price-yearly-toggle text-body-secondary">USD 480 / year</small>
                      </div>

                      <ul class="list-group my-5 pt-9">
                        <li class="mb-4 d-flex align-items-center">
                          <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                            ><i class="icon-base bx bx-check icon-xs"></i></span
                          ><span>Unlimited responses</span>
                        </li>
                        <li class="mb-4 d-flex align-items-center">
                          <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                            ><i class="icon-base bx bx-check icon-xs"></i></span
                          ><span>Unlimited forms and surveys</span>
                        </li>
                        <li class="mb-4 d-flex align-items-center">
                          <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                            ><i class="icon-base bx bx-check icon-xs"></i></span
                          ><span>Instagram profile page</span>
                        </li>
                        <li class="mb-4 d-flex align-items-center">
                          <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                            ><i class="icon-base bx bx-check icon-xs"></i></span
                          ><span>Google Docs integration</span>
                        </li>
                        <li class="mb-0 d-flex align-items-center">
                          <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                            ><i class="icon-base bx bx-check icon-xs"></i></span
                          ><span>Custom “Thank you” page</span>
                        </li>
                      </ul>

                      <button type="button" class="btn btn-primary d-grid w-100" data-bs-dismiss="modal">
                        Upgrade
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
                      <h4 class="card-title text-center text-capitalize mb-1">Enterprise</h4>
                      <p class="text-center mb-5">Solution for big organizations</p>

                      <div class="text-center h-px-50">
                        <div class="d-flex justify-content-center">
                          <sup class="h6 text-body pricing-currency mt-2 mb-0 me-1">$</sup>
                          <h1 class="price-toggle price-yearly text-primary mb-0">16</h1>
                          <h1 class="price-toggle price-monthly text-primary mb-0 d-none">19</h1>
                          <sub class="h6 text-body pricing-duration mt-auto mb-1">/month</sub>
                        </div>
                        <small class="price-yearly price-yearly-toggle text-body-secondary">USD 960 / year</small>
                      </div>

                      <ul class="list-group my-5 pt-9">
                        <li class="mb-4 d-flex align-items-center">
                          <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                            ><i class="icon-base bx bx-check icon-xs"></i></span
                          ><span>PayPal payments</span>
                        </li>
                        <li class="mb-4 d-flex align-items-center">
                          <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                            ><i class="icon-base bx bx-check icon-xs"></i></span
                          ><span>Logic Jumps</span>
                        </li>
                        <li class="mb-4 d-flex align-items-center">
                          <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                            ><i class="icon-base bx bx-check icon-xs"></i></span
                          ><span>File upload with 5GB storage</span>
                        </li>
                        <li class="mb-4 d-flex align-items-center">
                          <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                            ><i class="icon-base bx bx-check icon-xs"></i></span
                          ><span>Custom domain support</span>
                        </li>
                        <li class="mb-0 d-flex align-items-center">
                          <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"
                            ><i class="icon-base bx bx-check icon-xs"></i></span
                          ><span>Stripe integration</span>
                        </li>
                      </ul>

                      <button type="button" class="btn btn-label-primary d-grid w-100" data-bs-dismiss="modal">
                        Upgrade
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
