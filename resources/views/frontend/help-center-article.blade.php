@extends('layouts.app')

@section('content')
<section class="section-py first-section-pt">
      <div class="container">
        <div class="row g-6">
          <div class="col-lg-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mb-2">
                <li class="breadcrumb-item">
                  <a href="javascript:void(0);">{{ __('help-center-article.help_centre') }}</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="javascript:void(0);">{{ __('help-center-article.buying_and_item_support') }}</a>
                </li>
                <li class="breadcrumb-item active">{{ __('help-center-article.template_kits') }}</li>
              </ol>
            </nav>
            <h4 class="mb-2">{{ __('help-center-article.article_title') }}</h4>
            <p>{{ __('help-center-article.last_updated') }}</p>
            <hr class="my-6" />
            <p>
              {{ __('help-center-article.article_p1') }}
            </p>
            <p class="mb-0">
              {{ __('help-center-article.article_p2') }}
            </p>
            <div class="my-6">
              <img src="{{ asset('assets/img/front-pages/misc/product-image.png') }}" alt="product" class="img-fluid w-100" />
            </div>
            <p class="mb-0">
              {{ __('help-center-article.article_p3') }}
            </p>
            <div class="mt-6">
              <img src="{{ asset('assets/img/front-pages/misc/checkout-image.png') }}" alt="product" class="img-fluid w-100" />
            </div>
          </div>
          <div class="col-lg-4">
            <div class="input-group input-group-merge mb-6 mt-6 mt-lg-0">
              <span class="input-group-text" id="article-search"><i class="icon-base bx bx-search"></i></span>
              <input
                type="text"
                class="form-control"
                placeholder="{{ __('help-center-article.search') }}"
                aria-label="{{ __('help-center-article.search') }}"
                aria-describedby="article-search" />
            </div>
            <div class="bg-lighter py-2 px-4 rounded">
              <h5 class="mb-0">{{ __('help-center-article.articles_in_section') }}</h5>
            </div>
            <ul class="list-unstyled mt-4 mb-0">
              <li class="mb-4">
                <a href="javascript:void(0)" class="text-heading d-flex justify-content-between">
                  <span class="text-truncate me-2">{{ __('help-center-article.article_1') }}</span>
                  <i class="icon-base bx bx-chevron-right scaleX-n1-rtl text-body-secondary"></i>
                </a>
              </li>
              <li class="mb-4">
                <a href="javascript:void(0)" class="text-heading d-flex justify-content-between">
                  <span class="text-truncate me-2">{{ __('help-center-article.article_2') }}</span>
                  <i class="icon-base bx bx-chevron-right scaleX-n1-rtl text-body-secondary"></i>
                </a>
              </li>
              <li class="mb-4">
                <a href="javascript:void(0)" class="text-heading d-flex justify-content-between">
                  <span class="text-truncate me-2">{{ __('help-center-article.article_3') }}</span>
                  <i class="icon-base bx bx-chevron-right scaleX-n1-rtl text-body-secondary"></i>
                </a>
              </li>
              <li class="mb-4">
                <a href="javascript:void(0)" class="text-heading d-flex justify-content-between">
                  <span class="text-truncate me-2">{{ __('help-center-article.article_4') }}</span>
                  <i class="icon-base bx bx-chevron-right scaleX-n1-rtl text-body-secondary"></i>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)" class="text-heading d-flex justify-content-between">
                  <span class="text-truncate me-2">{{ __('help-center-article.article_5') }}</span>
                  <i class="icon-base bx bx-chevron-right scaleX-n1-rtl text-body-secondary"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
@endsection
