@extends('layouts.app')

@section('content')
<section class="section-py bg-body first-section-pt">
      <div class="container">
        <!--/ Checkout Wizard -->
        <!-- Checkout Wizard -->
        <div id="wizard-checkout" class="bs-stepper wizard-icons wizard-icons-example">
          <div class="bs-stepper-header m-lg-auto border-0">
            <div class="step" data-target="#checkout-cart">
              <button type="button" class="step-trigger">
                <span class="bs-stepper-icon">
                  <svg viewBox="0 0 60 60">
                    <use xlink:href="{{ asset('assets/svg/icons/wizard-checkout-cart.svg#wizardCart') }}"></use>
                  </svg>
                </span>
                <span class="bs-stepper-label">{{ __('checkout.wizard_cart') }}</span>
              </button>
            </div>
            <div class="line">
              <i class="icon-base bx bx-chevron-right scaleX-n1-rtl icon-md"></i>
            </div>
            <div class="step" data-target="#checkout-address">
              <button type="button" class="step-trigger">
                <span class="bs-stepper-icon">
                  <svg viewBox="0 0 60 60">
                    <use xlink:href="{{ asset('assets/svg/icons/wizard-checkout-address.svg#wizardCheckoutAddress') }}"></use>
                  </svg>
                </span>
                <span class="bs-stepper-label">{{ __('checkout.wizard_address') }}</span>
              </button>
            </div>
            <div class="line">
              <i class="icon-base bx bx-chevron-right scaleX-n1-rtl icon-md"></i>
            </div>
            <div class="step" data-target="#checkout-payment">
              <button type="button" class="step-trigger">
                <span class="bs-stepper-icon">
                  <svg viewBox="0 0 60 60">
                    <use xlink:href="{{ asset('assets/svg/icons/wizard-checkout-payment.svg#wizardPayment') }}"></use>
                  </svg>
                </span>
                <span class="bs-stepper-label">{{ __('checkout.wizard_payment') }}</span>
              </button>
            </div>
            <div class="line">
              <i class="icon-base bx bx-chevron-right scaleX-n1-rtl icon-md"></i>
            </div>
            <div class="step" data-target="#checkout-confirmation">
              <button type="button" class="step-trigger">
                <span class="bs-stepper-icon">
                  <svg viewBox="0 0 60 60">
                    <use xlink:href="{{ asset('assets/svg/icons/wizard-checkout-confirmation.svg#wizardConfirm') }}"></use>
                  </svg>
                </span>
                <span class="bs-stepper-label">{{ __('checkout.wizard_confirmation') }}</span>
              </button>
            </div>
          </div>
          <div class="bs-stepper-content border-top">
            <form id="wizard-checkout-form" onSubmit="return false">
              <!-- Cart -->
              <div id="checkout-cart" class="content">
                <div class="row">
                  <!-- Cart left -->
                  <div class="col-xl-8 mb-6 mb-xl-0">
                    <!-- Offer alert -->
                    <div class="alert alert-success alert-dismissible mb-4" role="alert">
                      <div class="d-flex gap-4">
                        <div class="alert-icon flex-shrink-0 rounded-circle me-0">
                          <i class="icon-base bx bx-purchase-tag"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="alert-heading mb-1">{{ __('checkout.available_offers') }}</h5>
                          <ul class="list-unstyled mb-0">
                            <li>{{ __('checkout.offer_1') }}</li>
                            <li>{{ __('checkout.offer_2') }}</li>
                          </ul>
                        </div>
                      </div>
                      <button
                        type="button"
                        class="btn-close btn-pinned"
                        data-bs-dismiss="alert"
                        aria-label="Close"></button>
                    </div>

                    <!-- Shopping bag -->
                    <h5>{{ __('checkout.my_shopping_bag') }}</h5>
                    <ul class="list-group mb-4">
                      <li class="list-group-item p-6">
                        <div class="d-flex gap-4 flex-sm-row flex-column align-items-center">
                          <div class="flex-shrink-0 d-flex align-items-center">
                            <img src="{{ asset('assets/img/products/1.png') }}" alt="google home" class="w-px-100" />
                          </div>
                          <div class="flex-grow-1">
                            <div class="row text-center text-sm-start">
                              <div class="col-md-8">
                                <p class="me-3 mb-2">
                                  <a href="javascript:void(0)" class="fw-medium">
                                    <span class="text-heading">Google - Google Home - White</span></a
                                  >
                                </p>
                                <div
                                  class="text-body-secondary mb-2 d-flex flex-wrap justify-content-center justify-content-sm-start">
                                  <span class="me-1">{{ __('checkout.sold_by') }}</span> <a href="javascript:void(0)" class="me-4">Apple</a>
                                  <span class="badge bg-label-success">{{ __('checkout.in_stock') }}</span>
                                </div>
                                <div
                                  class="d-flex d-md-block align-items-center mb-2 gap-2 justify-content-center justify-content-sm-start">
                                  <div
                                    class="read-only-ratings raty mb-2"
                                    data-read-only="true"
                                    data-score="4"
                                    data-number="5"></div>
                                  <input
                                    type="number"
                                    class="form-control form-control-sm w-px-100"
                                    value="1"
                                    min="1"
                                    max="5" />
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="text-md-end">
                                  <button type="button" class="btn-close btn-pinned" aria-label="Close"></button>
                                  <div
                                    class="d-flex d-md-block align-items-center mb-2 gap-2 justify-content-center justify-content-sm-start">
                                    <div class="my-2 mt-md-8 mb-md-4">
                                      <span class="text-primary">$299/</span><s class="text-body">$359</s>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-label-primary">{{ __('checkout.move_to_wishlist') }}</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item p-6">
                        <div class="d-flex gap-4 flex-sm-row flex-column align-items-center">
                          <div class="flex-shrink-0 d-flex align-items-center">
                            <img src="{{ asset('assets/img/products/2.png') }}" alt="google home" class="w-px-100" />
                          </div>
                          <div class="flex-grow-1">
                            <div class="row text-center text-sm-start">
                              <div class="col-md-8">
                                <p class="me-3 mb-2">
                                  <a href="javascript:void(0)" class="fw-medium"
                                    ><span class="text-heading">Apple iPhone 11 (64GB, Black)</span></a
                                  >
                                </p>
                                <div
                                  class="text-body-secondary mb-2 d-flex flex-wrap justify-content-center justify-content-sm-start">
                                  <span class="me-1">{{ __('checkout.sold_by') }}</span>
                                  <a href="javascript:void(0)" class="me-4">Apple</a>
                                  <span class="badge bg-label-success">{{ __('checkout.in_stock') }}</span>
                                </div>
                                <div
                                  class="d-flex d-md-block align-items-center mb-2 gap-2 justify-content-center justify-content-sm-start">
                                  <div
                                    class="read-only-ratings raty mb-2"
                                    data-read-only="true"
                                    data-score="4"
                                    data-number="5"></div>
                                  <input
                                    type="number"
                                    class="form-control form-control-sm w-px-100"
                                    value="1"
                                    min="1"
                                    max="5" />
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="text-md-end">
                                  <button
                                    type="button"
                                    class="btn-close btn-pinned checkout-btn-close"
                                    aria-label="Close"></button>
                                  <div
                                    class="d-flex d-md-block align-items-center mb-2 gap-2 justify-content-center justify-content-sm-start">
                                    <div class="my-2 mt-md-8 mb-md-4">
                                      <span class="text-primary">$299/</span><s class="text-body">$359</s>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-label-primary">{{ __('checkout.move_to_wishlist') }}</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>

                    <!-- Wishlist -->
                    <div class="list-group">
                      <a
                        href="javascript:void(0)"
                        class="list-group-item text-primary border-primary d-flex justify-content-between">
                        <span class="fw-medium">{{ __('checkout.add_more_from_wishlist') }}</span>
                        <i class="icon-base bx icon-sm bx-right-arrow-alt scaleX-n1-rtl mt-50"></i>
                      </a>
                    </div>
                  </div>

                  <!-- Cart right -->
                  <div class="col-xl-4">
                    <div class="border rounded p-6 mb-4">
                      <!-- Offer -->
                      <h6>{{ __('checkout.offer') }}</h6>
                      <div class="row g-4 mb-4">
                        <div class="col-8 col-xxl-8 col-xl-12">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="{{ __('checkout.enter_promo_code') }}"
                            aria-label="Enter Promo Code" />
                        </div>
                        <div class="col-4 col-xxl-4 col-xl-12">
                          <div class="d-grid">
                            <button type="button" class="btn btn-label-primary">{{ __('checkout.apply') }}</button>
                          </div>
                        </div>
                      </div>

                      <!-- Gift wrap -->
                      <div class="bg-lighter rounded p-6">
                        <h6 class="mb-2">{{ __('checkout.buying_gift') }}</h6>
                        <p class="mb-2">{{ __('checkout.gift_wrap_desc') }}</p>
                        <a href="javascript:void(0)" class="fw-medium">{{ __('checkout.add_gift_wrap') }}</a>
                      </div>
                      <hr class="mx-n6 my-6" />

                      <!-- Price Details -->
                      <h6>{{ __('checkout.price_details') }}</h6>
                      <dl class="row mb-0 text-heading">
                        <dt class="col-6 fw-normal">{{ __('checkout.bag_total') }}</dt>
                        <dd class="col-6 text-end">$1198.00</dd>

                        <dt class="col-6 fw-normal">{{ __('checkout.coupon_discount') }}</dt>
                        <dd class="col-6 text-primary text-end">{{ __('checkout.apply_coupon') }}</dd>

                        <dt class="col-6 fw-normal">{{ __('checkout.order_total') }}</dt>
                        <dd class="col-6 text-end">$1198.00</dd>

                        <dt class="col-6 fw-normal">{{ __('checkout.delivery_charges') }}</dt>
                        <dd class="col-6 text-end">
                          <s class="text-body-secondary">$5.00</s> <span class="badge bg-label-success ms-1">{{ __('checkout.free') }}</span>
                        </dd>
                      </dl>
                      <hr class="mx-n6 my-6" />
                      <dl class="row mb-0">
                        <dt class="col-6 text-heading">{{ __('checkout.total') }}</dt>
                        <dd class="col-6 fw-medium text-end text-heading mb-0">$1198.00</dd>
                      </dl>
                    </div>
                    <div class="d-grid">
                      <button class="btn btn-primary btn-next">{{ __('checkout.place_order') }}</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Address -->
              <div id="checkout-address" class="content">
                <div class="row">
                  <!-- Address left -->
                  <div class="col-xl-8 mb-6 mb-xl-0">
                    <!-- Select address -->
                    <p class="fw-medium text-heading">{{ __('checkout.select_preferable_address') }}</p>
                    <div class="row mb-4 g-6">
                      <div class="col-md">
                        <div class="form-check custom-option custom-option-basic checked">
                          <label class="form-check-label custom-option-content" for="customRadioAddress1">
                            <input
                              name="customRadioTemp"
                              class="form-check-input"
                              type="radio"
                              value=""
                              id="customRadioAddress1"
                              checked="" />
                            <span class="custom-option-header mb-2">
                              <span class="fw-medium text-heading mb-0">John Doe (Default)</span>
                              <span class="badge bg-label-primary">{{ __('checkout.home') }}</span>
                            </span>
                            <span class="custom-option-body">
                              <small
                                >4135 Parkway Street, Los Angeles, CA, 90017.<br />
                                Mobile : 1234567890 Card / Cash on delivery available</small
                              >
                              <span class="my-3 border-bottom d-block"></span>
                              <span class="d-flex mb-1_5">
                                <a class="me-4" href="javascript:void(0)">{{ __('checkout.edit') }}</a>
                                <a href="javascript:void(0)">{{ __('checkout.remove') }}</a>
                              </span>
                            </span>
                          </label>
                        </div>
                      </div>
                      <div class="col-md">
                        <div class="form-check custom-option custom-option-basic">
                          <label class="form-check-label custom-option-content" for="customRadioAddress2">
                            <input
                              name="customRadioTemp"
                              class="form-check-input"
                              type="radio"
                              value=""
                              id="customRadioAddress2" />
                            <span class="custom-option-header mb-2">
                              <span class="fw-medium text-heading mb-0">ACME Inc.</span>
                              <span class="badge bg-label-success">{{ __('checkout.office') }}</span>
                            </span>
                            <span class="custom-option-body">
                              <small
                                >87 Hoffman Avenue, New York, NY, 10016.<br />Mobile : 1234567890 Card / Cash on
                                delivery available</small
                              >
                              <span class="my-3 border-bottom d-block"></span>
                              <span class="d-flex mb-1_5">
                                <a class="me-4" href="javascript:void(0)">{{ __('checkout.edit') }}</a>
                                <a href="javascript:void(0)">{{ __('checkout.remove') }}</a>
                              </span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>
                    <button
                      type="button"
                      class="btn btn-label-primary mb-6"
                      data-bs-toggle="modal"
                      data-bs-target="#addNewAddress">
                      {{ __('checkout.add_new_address') }}
                    </button>

                    <!-- Choose Delivery -->
                    <p class="fw-medium text-heading">{{ __('checkout.choose_delivery_speed') }}</p>
                    <div class="row mt-2">
                      <div class="col-md mb-md-0 mb-2">
                        <div class="form-check custom-option custom-option-icon position-relative checked">
                          <label class="form-check-label custom-option-content" for="customRadioDelivery1">
                            <span class="custom-option-body">
                              <i class="icon-base bx bx-user mb-2"></i>
                              <span class="custom-option-title mb-2">{{ __('checkout.standard') }}</span>
                              <span class="badge bg-label-success btn-pinned">{{ __('checkout.free') }}</span>
                              <small>{{ __('checkout.standard_desc') }}</small>
                            </span>
                            <input
                              name="customRadioIcon"
                              class="form-check-input"
                              type="radio"
                              value=""
                              id="customRadioDelivery1"
                              checked="" />
                          </label>
                        </div>
                      </div>
                      <div class="col-md mb-md-0 mb-2">
                        <div class="form-check custom-option custom-option-icon position-relative">
                          <label class="form-check-label custom-option-content" for="customRadioDelivery2">
                            <span class="custom-option-body">
                              <i class="icon-base bx bx-star mb-2"></i>
                              <span class="custom-option-title mb-2">{{ __('checkout.express') }}</span>
                              <span class="badge bg-label-secondary btn-pinned">$10</span>
                              <small>{{ __('checkout.express_desc') }}</small>
                            </span>
                            <input
                              name="customRadioIcon"
                              class="form-check-input"
                              type="radio"
                              value=""
                              id="customRadioDelivery2" />
                          </label>
                        </div>
                      </div>
                      <div class="col-md">
                        <div class="form-check custom-option custom-option-icon position-relative">
                          <label class="form-check-label custom-option-content" for="customRadioDelivery3">
                            <span class="custom-option-body">
                              <i class="icon-base bx bx-crown mb-2"></i>
                              <span class="custom-option-title mb-2">{{ __('checkout.overnight') }}</span>
                              <span class="badge bg-label-secondary btn-pinned">$15</span>
                              <small>{{ __('checkout.overnight_desc') }}</small>
                            </span>
                            <input
                              name="customRadioIcon"
                              class="form-check-input"
                              type="radio"
                              value=""
                              id="customRadioDelivery3" />
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Address right -->
                  <div class="col-xl-4">
                    <div class="border rounded p-6 mb-4">
                      <!-- Estimated Delivery -->
                      <h6>{{ __('checkout.estimated_delivery_date') }}</h6>
                      <ul class="list-unstyled">
                        <li class="d-flex gap-4 align-items-center py-2 mb-4">
                          <div class="flex-shrink-0">
                            <img src="{{ asset('assets/img/products/1.png') }}" alt="google home" class="w-px-50" />
                          </div>
                          <div class="flex-grow-1">
                            <p class="mb-0">
                              <a class="text-body" href="javascript:void(0)">Google - Google Home - White</a>
                            </p>
                            <p class="fw-medium mb-0">18th Nov 2021</p>
                          </div>
                        </li>
                        <li class="d-flex gap-4 align-items-center py-2">
                          <div class="flex-shrink-0">
                            <img src="{{ asset('assets/img/products/2.png') }}" alt="google home" class="w-px-50" />
                          </div>
                          <div class="flex-grow-1">
                            <p class="mb-0">
                              <a class="text-body" href="javascript:void(0)">Apple iPhone 11 (64GB, Black)</a>
                            </p>
                            <p class="fw-medium mb-0">20th Nov 2021</p>
                          </div>
                        </li>
                      </ul>

                      <hr class="mx-n6 my-6" />

                      <!-- Price Details -->
                      <h6>{{ __('checkout.price_details') }}</h6>
                      <dl class="row mb-0 text-heading">
                        <dt class="col-6 fw-normal">{{ __('checkout.order_total') }}</dt>
                        <dd class="col-6 text-end">$1198.00</dd>

                        <dt class="col-6 fw-normal">{{ __('checkout.delivery_charges') }}</dt>
                        <dd class="col-6 text-end">
                          <s class="text-body-secondary">$5.00</s> <span class="badge bg-label-success ms-2">{{ __('checkout.free') }}</span>
                        </dd>
                      </dl>
                      <hr class="mx-n6 my-6" />
                      <dl class="row mb-0">
                        <dt class="col-6 text-heading">{{ __('checkout.total') }}</dt>
                        <dd class="col-6 fw-medium text-end text-heading mb-0">$1198.00</dd>
                      </dl>
                    </div>
                    <div class="d-grid">
                      <button class="btn btn-primary btn-next">{{ __('checkout.place_order') }}</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Payment -->
              <div id="checkout-payment" class="content">
                <div class="row">
                  <!-- Payment left -->
                  <div class="col-xl-8 mb-6 mb-xl-0">
                    <!-- Offer alert -->
                    <div class="alert alert-success alert-dismissible mb-6" role="alert">
                      <div class="d-flex gap-4">
                        <div class="alert-icon flex-shrink-0 rounded-circle me-0">
                          <i class="icon-base bx bx-purchase-tag"></i>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="alert-heading mb-1">{{ __('checkout.available_offers') }}</h5>
                          <ul class="list-unstyled mb-0">
                            <li>{{ __('checkout.offer_1') }}</li>
                            <li>{{ __('checkout.offer_2') }}</li>
                          </ul>
                        </div>
                      </div>
                      <button
                        type="button"
                        class="btn-close btn-pinned"
                        data-bs-dismiss="alert"
                        aria-label="Close"></button>
                    </div>

                    <!-- Payment Tabs -->
                    <div class="col-xxl-6 col-lg-8">
                      <div class="nav-align-top">
                        <ul class="nav nav-pills row-gap-2 flex-wrap" id="paymentTabs" role="tablist">
                          <li class="nav-item" role="presentation">
                            <button
                              class="nav-link active"
                              id="pills-cc-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-cc"
                              type="button"
                              role="tab"
                              aria-controls="pills-cc"
                              aria-selected="true">
                              {{ __('checkout.tab_card') }}
                            </button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button
                              class="nav-link"
                              id="pills-cod-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-cod"
                              type="button"
                              role="tab"
                              aria-controls="pills-cod"
                              aria-selected="false">
                              {{ __('checkout.tab_cod') }}
                            </button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button
                              class="nav-link"
                              id="pills-gift-card-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-gift-card"
                              type="button"
                              role="tab"
                              aria-controls="pills-gift-card"
                              aria-selected="false">
                              {{ __('checkout.tab_gift_card') }}
                            </button>
                          </li>
                        </ul>
                      </div>
                      <div class="tab-content px-0 pb-0" id="paymentTabsContent">
                        <!-- Credit card -->
                        <div
                          class="tab-pane fade show active"
                          id="pills-cc"
                          role="tabpanel"
                          aria-labelledby="pills-cc-tab">
                          <div class="row g-6">
                            <div class="col-12">
                              <label class="form-label w-100" for="paymentCard">{{ __('checkout.card_number') }}</label>
                              <div class="input-group input-group-merge">
                                <input
                                  id="paymentCard"
                                  name="paymentCard"
                                  class="form-control credit-card-mask"
                                  type="text"
                                  placeholder="1356 3215 6548 7898"
                                  aria-describedby="paymentCard2" />
                                <span class="input-group-text cursor-pointer" id="paymentCard2"
                                  ><span class="card-type"></span
                                ></span>
                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <label class="form-label" for="paymentCardName">{{ __('checkout.name_on_card') }}</label>
                              <input type="text" id="paymentCardName" class="form-control" placeholder="John Doe" />
                            </div>
                            <div class="col-6 col-md-3">
                              <label class="form-label" for="paymentCardExpiryDate">{{ __('checkout.exp_date') }}</label>
                              <input
                                type="text"
                                id="paymentCardExpiryDate"
                                class="form-control expiry-date-mask"
                                placeholder="MM/YY" />
                            </div>
                            <div class="col-6 col-md-3">
                              <label class="form-label" for="paymentCardCvv">{{ __('checkout.cvv_code') }}</label>
                              <div class="input-group input-group-merge">
                                <input
                                  type="text"
                                  id="paymentCardCvv"
                                  class="form-control cvv-code-mask"
                                  maxlength="3"
                                  placeholder="654" />
                                <span class="input-group-text cursor-pointer" id="paymentCardCvv2"
                                  ><i
                                    class="icon-base bx bx-help-circle text-body-secondary"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Card Verification Value"></i
                                ></span>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-check form-switch mt-2 ms-2">
                                <input type="checkbox" class="form-check-input" id="cardFutureBilling" />
                                <label for="cardFutureBilling" class="form-check-label"
                                  >{{ __('checkout.save_card_future') }}</label
                                >
                              </div>
                            </div>
                            <div class="col-12">
                              <button type="button" class="btn btn-primary btn-next me-3">{{ __('checkout.save_changes') }}</button>
                              <button type="reset" class="btn btn-label-secondary">{{ __('checkout.cancel') }}</button>
                            </div>
                          </div>
                        </div>

                        <!-- COD -->
                        <div class="tab-pane fade" id="pills-cod" role="tabpanel" aria-labelledby="pills-cod-tab">
                          <p>
                            {{ __('checkout.cod_desc') }}
                          </p>
                          <button type="button" class="btn btn-primary btn-next">{{ __('checkout.pay_on_delivery') }}</button>
                        </div>

                        <!-- Gift card -->
                        <div
                          class="tab-pane fade"
                          id="pills-gift-card"
                          role="tabpanel"
                          aria-labelledby="pills-gift-card-tab">
                          <h6>{{ __('checkout.enter_gift_card_details') }}</h6>
                          <div class="row g-5">
                            <div class="col-12">
                              <label for="giftCardNumber" class="form-label">{{ __('checkout.gift_card_number') }}</label>
                              <input
                                type="number"
                                class="form-control"
                                id="giftCardNumber"
                                placeholder="Gift card number" />
                            </div>
                            <div class="col-12">
                              <label for="giftCardPin" class="form-label">{{ __('checkout.gift_card_pin') }}</label>
                              <input type="number" class="form-control" id="giftCardPin" placeholder="Gift card pin" />
                            </div>
                            <div class="col-12">
                              <button type="button" class="btn btn-primary btn-next">{{ __('checkout.redeem_gift_card') }}</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Address right -->
                  <div class="col-xl-4">
                    <div class="border rounded p-6">
                      <!-- Price Details -->
                      <h6>{{ __('checkout.price_details') }}</h6>
                      <dl class="row text-heading">
                        <dt class="col-6 fw-normal">{{ __('checkout.order_total') }}</dt>
                        <dd class="col-6 text-end">$1198.00</dd>

                        <dt class="col-6 fw-normal">{{ __('checkout.delivery_charges') }}</dt>
                        <dd class="col-6 text-end">
                          <s class="text-body-secondary">$5.00</s> <span class="badge bg-label-success ms-1">{{ __('checkout.free') }}</span>
                        </dd>
                      </dl>
                      <hr class="mx-n6 mb-6 mt-4" />
                      <dl class="row">
                        <dt class="col-6 text-heading mb-3">{{ __('checkout.total') }}</dt>
                        <dd class="col-6 fw-medium text-end text-heading mb-0">$1198.00</dd>

                        <dt class="col-6 fw-medium text-heading">{{ __('checkout.deliver_to') }}</dt>
                        <dd class="col-6 fw-medium text-end mb-0"><span class="badge bg-label-primary">{{ __('checkout.home') }}</span></dd>
                      </dl>
                      <!-- Address Details -->
                      <address>
                        <span class="text-heading fw-medium"> John Doe (Default),</span><br />
                        4135 Parkway Street, <br />
                        Los Angeles, CA, 90017. <br />
                        Mobile : +1 906 568 2332
                      </address>
                      <a href="javascript:void(0)" class="fw-medium">{{ __('checkout.change_address') }}</a>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Confirmation -->
              <div id="checkout-confirmation" class="content">
                <div class="row mb-6">
                  <div class="col-12 col-lg-8 mx-auto text-center mb-2">
                    <h4>{{ __('checkout.thank_you') }}</h4>
                    <p>
                      {!! str_replace('#1536548131', '<a href="javascript:void(0)" class="text-heading fw-medium">#1536548131</a>', __('checkout.order_placed')) !!}
                    </p>
                    <p>
                      {!! str_replace('john.doe@example.com', '<a href="mailto:john.doe@example.com" class="text-heading fw-medium">john.doe@example.com</a>', __('checkout.email_sent')) !!}
                    </p>
                    <p>
                      <span><i class="icon-base bx bx-time-five me-1 text-heading align-top"></i> {{ __('checkout.time_placed') }}</span>
                    </p>
                  </div>
                  <!-- Confirmation details -->
                  <div class="col-12">
                    <ul class="list-group list-group-horizontal-md">
                      <li class="list-group-item flex-fill p-6 text-body">
                        <h6 class="d-flex align-items-center gap-2"><i class="icon-base bx bx-map"></i> {{ __('checkout.shipping') }}</h6>
                        <address class="mb-0">
                          John Doe <br />
                          4135 Parkway Street,<br />
                          Los Angeles, CA 90017,<br />
                          USA
                        </address>
                        <p class="mb-0 mt-4">+123456789</p>
                      </li>
                      <li class="list-group-item flex-fill p-6 text-body">
                        <h6 class="d-flex align-items-center gap-2">
                          <i class="icon-base bx bx-credit-card"></i> {{ __('checkout.billing_address_title') }}
                        </h6>
                        <address class="mb-0">
                          John Doe <br />
                          4135 Parkway Street,<br />
                          Los Angeles, CA 90017,<br />
                          USA
                        </address>
                        <p class="mb-0 mt-4">+123456789</p>
                      </li>
                      <li class="list-group-item flex-fill p-6 text-body">
                        <h6 class="d-flex align-items-center gap-2">
                          <i class="icon-base bx bxs-ship"></i> {{ __('checkout.shipping_method') }}
                        </h6>
                        <p class="fw-medium mb-4">{{ __('checkout.preferred_method') }}</p>
                        {{ __('checkout.standard_delivery_desc') }}
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="row">
                  <!-- Confirmation items -->
                  <div class="col-xl-9 mb-6 mb-xl-0">
                    <ul class="list-group">
                      <li class="list-group-item p-6">
                        <div class="d-flex gap-4 flex-sm-row flex-column">
                          <div class="flex-shrink-0">
                            <img src="{{ asset('assets/img/products/1.png') }}" alt="google home" class="w-px-75" />
                          </div>
                          <div class="flex-grow-1">
                            <div class="row">
                              <div class="col-md-8">
                                <a href="javascript:void(0)">
                                  <h6 class="mb-2">Google - Google Home - White</h6>
                                </a>
                                <div class="text-body mb-2 d-flex flex-wrap">
                                  <span class="me-1">{{ __('checkout.sold_by') }}</span>
                                  <a href="javascript:void(0)" class="me-3">Google</a>
                                </div>
                                <span class="badge bg-label-success">{{ __('checkout.in_stock') }}</span>
                              </div>
                              <div class="col-md-4">
                                <div class="text-md-end">
                                  <div class="my-2 my-lg-6">
                                    <span class="text-primary">$299/</span><s class="text-body-secondary">$359</s>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item p-6">
                        <div class="d-flex gap-4 flex-sm-row flex-column">
                          <div class="flex-shrink-0">
                            <img src="{{ asset('assets/img/products/2.png') }}" alt="google home" class="w-px-75" />
                          </div>
                          <div class="flex-grow-1">
                            <div class="row">
                              <div class="col-md-8">
                                <a href="javascript:void(0)">
                                  <h6 class="mb-2">Apple iPhone 11 (64GB, Black)</h6>
                                </a>
                                <div class="text-body mb-2 d-flex flex-wrap">
                                  <span class="me-1">{{ __('checkout.sold_by') }}</span> <a href="javascript:void(0)">Apple</a>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="text-md-end">
                                  <div class="my-2 my-lg-6">
                                    <span class="text-primary">$299/</span><s class="text-body-secondary">$359</s>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <!-- Confirmation total -->
                  <div class="col-xl-3">
                    <div class="border rounded p-6">
                      <!-- Price Details -->
                      <h6>{{ __('checkout.price_details') }}</h6>
                      <dl class="row mb-0 text-heading">
                        <dt class="col-6 fw-normal">{{ __('checkout.order_total') }}</dt>
                        <dd class="col-6 text-end">$1198.00</dd>

                        <dt class="col-sm-6 text-heading fw-normal">{{ __('checkout.charges') }}</dt>
                        <dd class="col-sm-6 text-end">
                          <s class="text-body-secondary">$5.00</s> <span class="badge bg-label-success ms-1">{{ __('checkout.free') }}</span>
                        </dd>
                      </dl>
                      <hr class="mx-n6 mb-6" />
                      <dl class="row mb-0">
                        <dt class="col-6 text-heading">{{ __('checkout.total') }}</dt>
                        <dd class="col-6 fw-medium text-end text-heading mb-0">$1198.00</dd>
                      </dl>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!--/ Checkout Wizard -->

        <!-- Add new address modal -->
        <!-- Add New Address Modal -->
        <div class="modal fade" id="addNewAddress" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                  <h4 class="address-title mb-2">{{ __('checkout.add_new_address_title') }}</h4>
                  <p class="address-subtitle">{{ __('checkout.add_new_address_subtitle') }}</p>
                </div>
                <form id="addNewAddressForm" class="row g-6" onsubmit="return false">
                  <div class="col-12 form-control-validation">
                    <div class="row">
                      <div class="col-md mb-md-0 mb-4">
                        <div class="form-check custom-option custom-option-icon">
                          <label class="form-check-label custom-option-content" for="customRadioHome">
                            <span class="custom-option-body">
                              <i class="icon-base bx bx-home"></i>
                              <span class="custom-option-title">{{ __('checkout.home') }}</span>
                              <small> {{ __('checkout.delivery_time_1') }} </small>
                            </span>
                            <input
                              name="customRadioIcon"
                              class="form-check-input"
                              type="radio"
                              value=""
                              id="customRadioHome"
                              checked />
                          </label>
                        </div>
                      </div>
                      <div class="col-md mb-md-0 mb-4">
                        <div class="form-check custom-option custom-option-icon">
                          <label class="form-check-label custom-option-content" for="customRadioOffice">
                            <span class="custom-option-body">
                              <i class="icon-base bx bx-briefcase"></i>
                              <span class="custom-option-title"> {{ __('checkout.office') }} </span>
                              <small> {{ __('checkout.delivery_time_2') }} </small>
                            </span>
                            <input
                              name="customRadioIcon"
                              class="form-check-input"
                              type="radio"
                              value=""
                              id="customRadioOffice" />
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 form-control-validation col-md-6">
                    <label class="form-label" for="modalAddressFirstName">{{ __('checkout.first_name') }}</label>
                    <input
                      type="text"
                      id="modalAddressFirstName"
                      name="modalAddressFirstName"
                      class="form-control"
                      placeholder="John" />
                  </div>
                  <div class="col-12 form-control-validation col-md-6">
                    <label class="form-label" for="modalAddressLastName">{{ __('checkout.last_name') }}</label>
                    <input
                      type="text"
                      id="modalAddressLastName"
                      name="modalAddressLastName"
                      class="form-control"
                      placeholder="Doe" />
                  </div>
                  <div class="col-12">
                    <label class="form-label" for="modalAddressCountry">{{ __('checkout.country') }}</label>
                    <select
                      id="modalAddressCountry"
                      name="modalAddressCountry"
                      class="select2 form-select"
                      data-allow-clear="true">
                      <option value="">{{ __('checkout.select') }}</option>
                      <option value="Australia">Australia</option>
                      <option value="Bangladesh">Bangladesh</option>
                      <option value="Belarus">Belarus</option>
                      <option value="Brazil">Brazil</option>
                      <option value="Canada">Canada</option>
                      <option value="China">China</option>
                      <option value="France">France</option>
                      <option value="Germany">Germany</option>
                      <option value="India">India</option>
                      <option value="Indonesia">Indonesia</option>
                      <option value="Israel">Israel</option>
                      <option value="Italy">Italy</option>
                      <option value="Japan">Japan</option>
                      <option value="Korea">Korea, Republic of</option>
                      <option value="Mexico">Mexico</option>
                      <option value="Philippines">Philippines</option>
                      <option value="Russia">Russian Federation</option>
                      <option value="South Africa">South Africa</option>
                      <option value="Thailand">Thailand</option>
                      <option value="Turkey">Turkey</option>
                      <option value="Ukraine">Ukraine</option>
                      <option value="United Arab Emirates">United Arab Emirates</option>
                      <option value="United Kingdom">United Kingdom</option>
                      <option value="United States">United States</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label class="form-label" for="modalAddressAddress1">{{ __('checkout.address_line_1') }}</label>
                    <input
                      type="text"
                      id="modalAddressAddress1"
                      name="modalAddressAddress1"
                      class="form-control"
                      placeholder="12, Business Park" />
                  </div>
                  <div class="col-12">
                    <label class="form-label" for="modalAddressAddress2">{{ __('checkout.address_line_2') }}</label>
                    <input
                      type="text"
                      id="modalAddressAddress2"
                      name="modalAddressAddress2"
                      class="form-control"
                      placeholder="Mall Road" />
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label" for="modalAddressLandmark">{{ __('checkout.landmark') }}</label>
                    <input
                      type="text"
                      id="modalAddressLandmark"
                      name="modalAddressLandmark"
                      class="form-control"
                      placeholder="Nr. Hard Rock Cafe" />
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label" for="modalAddressCity">{{ __('checkout.city') }}</label>
                    <input
                      type="text"
                      id="modalAddressCity"
                      name="modalAddressCity"
                      class="form-control"
                      placeholder="Los Angeles" />
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label" for="modalAddressState">{{ __('checkout.state') }}</label>
                    <input
                      type="text"
                      id="modalAddressState"
                      name="modalAddressState"
                      class="form-control"
                      placeholder="California" />
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label" for="modalAddressZipCode">{{ __('checkout.zip_code') }}</label>
                    <input
                      type="number"
                      id="modalAddressZipCode"
                      name="modalAddressZipCode"
                      class="form-control"
                      placeholder="99950" />
                  </div>
                  <div class="col-12">
                    <div class="form-check form-switch my-2 ms-2">
                      <input type="checkbox" class="form-check-input" id="billingAddress" />
                      <label for="billingAddress" class="switch-label">{{ __('checkout.use_as_billing') }}</label>
                    </div>
                  </div>
                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ __('checkout.submit') }}</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                      {{ __('checkout.cancel') }}
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!--/ Add New Address Modal -->
      </div>
    </section>
@endsection
