@extends('layout')

@section('page_title')
    {{ __('app.page_title') }}
@endsection

@section('meta_description')
    {{ __('app.meta_description') }}
@endsection

@section('meta_keywords')
    {{ __('app.meta_keywords') }}
@endsection

@section('content')
    @php
        $packages = __('packages');
        $packages = is_array($packages) ? $packages : [];
        $breadcrumbs = $packages['breadcrumbs'] ?? [];
        $corporate = $packages['corporate'] ?? [];
        $personal = $packages['personal'] ?? [];
        $corporatePackages = $corporate['packages'] ?? [];
        $corporatePackages = is_array($corporatePackages) ? $corporatePackages : [];
        $personalPackages = $personal['packages'] ?? [];
        $personalPackages = is_array($personalPackages) ? $personalPackages : [];
        $corporateCustom = $corporate['custom'] ?? [];
        $corporateCustom = is_array($corporateCustom) ? $corporateCustom : [];
        $personalCustom = $personal['custom'] ?? [];
        $personalCustom = is_array($personalCustom) ? $personalCustom : [];
        $actions = $packages['actions'] ?? [];
        $forms = $packages['forms'] ?? [];
        $formLabels = $forms['labels'] ?? [];
        $formPlaceholders = $forms['placeholders'] ?? [];
        $locale = app()->getLocale();
        $dir = $locale === 'ar' ? 'rtl' : 'ltr';
        $showDetailsLabel = $actions['show_details'] ?? 'Show Details';
        $requestLabel = $actions['request_package'] ?? 'Request Package';
    @endphp

    <main class="main">
        <!-- Page Title -->
        <div class="page-title dark-background">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>{{ $packages['page_title'] ?? '' }}</h1>
                            <p class="mb-0">{{ $packages['page_subtitle'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{ route(app()->getLocale() == 'ar' ? 'index' : 'index_en') }}">{{ __('app.home') }}</a></li>
                        <li class="current">{{ $breadcrumbs['current'] ?? '' }}</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <!-- Corporate Communication Packages Section -->
        <section id="corporate-packages" class="packages section" lang="{{ $locale }}" dir="{{ $dir }}">
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ $corporate['title'] ?? '' }}</h2>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                {{-- @if (!empty($corporate['intro']) && is_array($corporate['intro']))
                    <div class="package-intro mb-5">
                        @if (!empty($corporate['intro']['heading']))
                            <h4 class="mb-3">{{ $corporate['intro']['heading'] }}</h4>
                        @endif

                        @if (!empty($corporate['intro']['paragraphs']) && is_array($corporate['intro']['paragraphs']))
                            @foreach ($corporate['intro']['paragraphs'] as $paragraph)
                                <p>{{ $paragraph }}</p>
                            @endforeach
                        @endif

                        @if (!empty($corporate['intro']['axes_title']))
                            <h5 class="mt-4">{{ $corporate['intro']['axes_title'] }}</h5>
                        @endif

                        @if (!empty($corporate['intro']['axes']) && is_array($corporate['intro']['axes']))
                            <ul class="package-axes">
                                @foreach ($corporate['intro']['axes'] as $axis)
                                    <li>{{ $axis }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if (!empty($corporate['intro']['closing']))
                            <p class="mt-3">{{ $corporate['intro']['closing'] }}</p>
                        @endif
                    </div>
                @endif --}}

                <div class="row gy-4">
                    @foreach ($corporatePackages as $package)
                        @php
                            $previewItems = $package['preview'] ?? [];
                            $previewItems = is_array($previewItems) ? $previewItems : [];
                            $sections = $package['sections'] ?? [];
                            $sections = is_array($sections) ? $sections : [];
                        @endphp

                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                            <div class="package-card">
                                <div>
                                    <h3>{{ $package['title'] ?? '' }}</h3>
                                    @if (!empty($package['note']))
                                        <p class="package-note">{{ $package['note'] }}</p>
                                    @endif
                                </div>

                                @if ($previewItems)
                                    <ul class="package-preview">
                                        @foreach ($previewItems as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <div class="package-full-details d-none package-details">
                                    @foreach ($sections as $section)
                                        @php
                                            $sectionItems = $section['items'] ?? [];
                                            $sectionItems = is_array($sectionItems) ? $sectionItems : [];
                                        @endphp

                                        @if (!empty($section['title']))
                                            <h6>{{ $section['title'] }}</h6>
                                        @endif

                                        @if ($sectionItems)
                                            <ul class="package-list">
                                                @foreach ($sectionItems as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endforeach

                                    {{-- @if (!empty($package['footer_note']))
                                        <p class="package-note mt-3">{{ $package['footer_note'] }}</p>
                                    @endif --}}
                                </div>

                                <div class="package-actions">
                                    <button class="btn btn-outline-secondary package-details-btn" type="button">
                                        {{ $showDetailsLabel }}
                                    </button>
                                    <button class="btn btn-package package-request-btn" type="button"
                                        data-package="{{ $package['title'] ?? '' }}"
                                        data-category="{{ $corporate['title'] ?? '' }}">
                                        {{ $requestLabel }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if ($corporateCustom)
                        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                            <div class="package-card">
                                <div>
                                    <h3>{{ $corporateCustom['title'] ?? '' }}</h3>
                                    @if (!empty($corporateCustom['note']))
                                        <p class="package-note">{{ $corporateCustom['note'] }}</p>
                                    @endif
                                </div>
                                <div class="custom-services">
                                    @include('partials.custom-package-services', [
                                        'idPrefix' => 'corporate',
                                        'type' => 'corporate',
                                    ])
                                    <div class="mt-4">
                                        <p class="text-danger d-none mb-3 custom-services-error">
                                            {{ $corporateCustom['error'] ?? '' }}
                                        </p>
                                        <button class="btn btn-package package-request-btn" type="button"
                                            data-package="{{ $corporateCustom['title'] ?? '' }}"
                                            data-category="{{ $corporate['title'] ?? '' }}"
                                            data-include-services="custom">
                                            {{ $requestLabel }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section><!-- /Corporate Communication Packages Section -->

        <!-- Personal Communication Packages Section -->
        <section id="personal-packages" class="packages section" lang="{{ $locale }}" dir="{{ $dir }}">
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ $personal['title'] ?? '' }}</h2>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    @foreach ($personalPackages as $package)
                        @php
                            $previewItems = $package['preview'] ?? [];
                            $previewItems = is_array($previewItems) ? $previewItems : [];
                            $table = $package['table'] ?? [];
                            $table = is_array($table) ? $table : [];
                            $columns = $table['columns'] ?? [];
                            $columns = is_array($columns) ? $columns : [];
                            $rows = $table['rows'] ?? [];
                            $rows = is_array($rows) ? $rows : [];
                        @endphp

                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                            <div class="package-card">
                                <div>
                                    <h3>{{ $package['title'] ?? '' }}</h3>
                                </div>

                                @if ($previewItems)
                                    <ul class="package-preview">
                                        @foreach ($previewItems as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <div class="package-full-details d-none package-details">
                                    @if (!empty($table['title']))
                                        <h6>{{ $table['title'] }}</h6>
                                    @endif

                                    @if ($rows)
                                        <ul class="package-list">
                                            @foreach ($rows as $row)
                                                @php
                                                    $row = is_array($row) ? $row : [];
                                                    $service = trim($row[1] ?? '');
                                                    $count = trim($row[2] ?? '');
                                                    $type = trim($row[3] ?? '');
                                                    $details = trim($row[4] ?? '');
                                                    $subItems = [];

                                                    // if ($count !== '') {
                                                    //     $label = $columns[2] ?? 'Count';
                                                    //     $subItems[] = $label . ' ' . $count;
                                                    // }
                                                    // if ($type !== '') {
                                                    //     $label = $columns[3] ?? 'Type';
                                                    //     $subItems[] = $label . ' ' . $type;
                                                    // }
                                                    if ($details !== '') {
                                                        $subItems[] = $details;
                                                    }
                                                @endphp
                                                @if ($service !== '' || $subItems)
                                                    <li>
                                                        @if ($service !== '')
                                                            <span>{{ $service }}</span>
                                                        @endif
                                                        @if ($subItems)
                                                            <ul class="package-list">
                                                                @foreach ($subItems as $item)
                                                                    <li>{{ $item }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif

                                    @if (!empty($package['min_duration']))
                                        <p class="package-note">{{ $package['min_duration'] }}</p>
                                    @endif
                                </div>

                                <div class="package-actions">
                                    <button class="btn btn-outline-secondary package-details-btn" type="button">
                                        {{ $showDetailsLabel }}
                                    </button>
                                    <button class="btn btn-package package-request-btn" type="button"
                                        data-package="{{ $package['title'] ?? '' }}"
                                        data-category="{{ $personal['title'] ?? '' }}">
                                        {{ $requestLabel }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if ($personalCustom)
                        <div class="col-lg-12">
                            <div class="package-card">
                                <div>
                                    <h3>{{ $personalCustom['title'] ?? '' }}</h3>
                                    @if (!empty($personalCustom['note']))
                                        <p class="package-note">{{ $personalCustom['note'] }}</p>
                                    @endif
                                </div>
                                <div class="custom-services">
                                    @include('partials.custom-package-services', [
                                        'idPrefix' => 'personal',
                                        'type' => 'personal',
                                    ])
                                    <div class="mt-4">
                                        <p class="text-danger d-none mb-3 custom-services-error">
                                            {{ $personalCustom['error'] ?? '' }}
                                        </p>
                                        <button class="btn btn-package package-request-btn" type="button"
                                            data-package="{{ $personalCustom['title'] ?? '' }}"
                                            data-category="{{ $personal['title'] ?? '' }}"
                                            data-include-services="custom">
                                            {{ $requestLabel }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section><!-- /Personal Communication Packages Section -->
        <div class="modal fade package-modal package-details-modal" id="packageDetailsModal" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h5 class="modal-title" id="packageDetailsTitle">
                            {{ $forms['details_title'] ?? '' }}
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div id="packageDetailsContent"></div>
                        <div class="mt-4 pt-3 border-top">
                            <h6 class="mb-3">{{ $forms['request_section_title'] ?? '' }}</h6>
                            <form id="packageDetailsForm" action="{{ route('package.request') }}" method="post"
                                class="php-email-form">
                                @csrf
                                <input type="hidden" name="package_name" id="detailsPackageNameInput">
                                <input type="hidden" name="package_category" id="detailsPackageCategoryInput">
                                <input type="hidden" name="selected_services" id="detailsSelectedServicesInput">
                                <input type="hidden" name="lang" value="{{ app()->getLocale() }}">

                                <div class="row gy-3">
                                    <div class="col-12">
                                        <label class="form-label">
                                            {{ $formLabels['requested_package'] ?? '' }}
                                        </label>
                                        <input type="text" class="form-control" id="detailsPackageDisplay" readonly>
                                    </div>
                                    <div class="col-12 d-none" id="detailsSelectedServicesWrapper">
                                        <label class="form-label">
                                            {{ $formLabels['selected_services'] ?? '' }}
                                        </label>
                                        <textarea class="form-control" id="detailsSelectedServicesDisplay" rows="3" readonly></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="{{ $formPlaceholders['name'] ?? '' }}" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="{{ $formPlaceholders['phone'] ?? '' }}" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="{{ $formPlaceholders['email'] ?? '' }}" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="entity" class="form-control"
                                            placeholder="{{ $formPlaceholders['entity'] ?? '' }}" required="">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="message" rows="4"
                                            placeholder="{{ $formPlaceholders['message'] ?? '' }}" required="">{{ $forms['default_message'] ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <div class="loading">{{ $forms['loading'] ?? '' }}</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">{{ $forms['sent'] ?? '' }}</div>

                                        <button type="submit" class="btn btn-package package-form-btn">
                                            {{ $forms['submit_request'] ?? '' }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade package-modal" id="packageRequestModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form id="packageRequestForm" action="{{ route('package.request') }}" method="post"
                        class="php-email-form">
                        @csrf
                        <input type="hidden" name="package_name" id="packageNameInput">
                        <input type="hidden" name="package_category" id="packageCategoryInput">
                        <input type="hidden" name="selected_services" id="selectedServicesInput">
                        <input type="hidden" name="lang" value="{{ app()->getLocale() }}">

                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            <h5 class="modal-title">{{ $forms['request_title'] ?? '' }}</h5>
                        </div>

                        <div class="modal-body">
                            <div class="row gy-3">
                                <div class="col-12">
                                    <label class="form-label">
                                        {{ $formLabels['requested_package'] ?? '' }}
                                    </label>
                                    <input type="text" class="form-control" id="packageDisplay" readonly>
                                </div>
                                <div class="col-12 d-none" id="selectedServicesWrapper">
                                    <label class="form-label">
                                        {{ $formLabels['selected_services'] ?? '' }}
                                    </label>
                                    <textarea class="form-control" id="selectedServicesDisplay" rows="3" readonly></textarea>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="{{ $formPlaceholders['name'] ?? '' }}" required="">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="{{ $formPlaceholders['phone'] ?? '' }}" required="">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="{{ $formPlaceholders['email'] ?? '' }}" required="">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="entity" class="form-control"
                                        placeholder="{{ $formPlaceholders['entity'] ?? '' }}" required="">
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="4"
                                        placeholder="{{ $formPlaceholders['message'] ?? '' }}" required="">{{ $forms['default_message'] ?? '' }}</textarea>
                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="loading">{{ $forms['loading'] ?? '' }}</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">{{ $forms['sent'] ?? '' }}</div>

                                    <button type="submit" class="btn btn-package package-form-btn">
                                        {{ $forms['submit_order'] ?? '' }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof bootstrap === 'undefined') {
                    return;
                }

                const requestModalElement = document.getElementById('packageRequestModal');
                const detailsModalElement = document.getElementById('packageDetailsModal');
                const requestModalInstance = requestModalElement ? new bootstrap.Modal(requestModalElement) : null;
                const detailsModalInstance = detailsModalElement ? new bootstrap.Modal(detailsModalElement) : null;
                const detailsTitle = document.getElementById('packageDetailsTitle');
                const detailsContent = document.getElementById('packageDetailsContent');
                const detailsPackageNameInput = document.getElementById('detailsPackageNameInput');
                const detailsPackageCategoryInput = document.getElementById('detailsPackageCategoryInput');
                const detailsSelectedServicesInput = document.getElementById('detailsSelectedServicesInput');
                const detailsPackageDisplay = document.getElementById('detailsPackageDisplay');
                const detailsSelectedServicesWrapper = document.getElementById('detailsSelectedServicesWrapper');
                const detailsSelectedServicesDisplay = document.getElementById('detailsSelectedServicesDisplay');
                const detailsButtons = document.querySelectorAll('.package-details-btn');
                const detailsTitleFallback = @json($forms['details_title'] ?? 'Package Details');

                detailsButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        if (!detailsModalInstance) {
                            return;
                        }

                        const card = this.closest('.package-card');
                        const details = card ? card.querySelector('.package-full-details') : null;

                        if (!details || !detailsTitle || !detailsContent) {
                            return;
                        }

                        const title = card && card.querySelector('h3') ?
                            card.querySelector('h3').textContent.trim() :
                            '';
                        const requestBtn = card ? card.querySelector('.package-request-btn') : null;
                        const packageName = requestBtn ? (requestBtn.getAttribute('data-package') ||
                            '') : title;
                        const packageCategory = requestBtn ? (requestBtn.getAttribute(
                            'data-category') || '') : '';

                        let selectedServices = '';
                        if (card) {
                            const checkedServices = Array.from(card.querySelectorAll(
                                    '.custom-service:checked'))
                                .map(service => service.value.trim())
                                .filter(Boolean);
                            if (checkedServices.length) {
                                selectedServices = checkedServices.join('\n');
                            }
                        }

                        detailsTitle.textContent = title || detailsTitleFallback;
                        detailsContent.innerHTML =
                            `<div class="package-details">${details.innerHTML}</div>`;

                        if (detailsPackageNameInput) {
                            detailsPackageNameInput.value = packageName;
                        }
                        if (detailsPackageCategoryInput) {
                            detailsPackageCategoryInput.value = packageCategory;
                        }
                        if (detailsSelectedServicesInput) {
                            detailsSelectedServicesInput.value = selectedServices;
                        }
                        if (detailsPackageDisplay) {
                            detailsPackageDisplay.value = packageCategory ?
                                `${packageName} - ${packageCategory}` : packageName;
                        }
                        if (detailsSelectedServicesWrapper && detailsSelectedServicesDisplay) {
                            if (selectedServices) {
                                detailsSelectedServicesWrapper.classList.remove('d-none');
                                detailsSelectedServicesDisplay.value = selectedServices;
                            } else {
                                detailsSelectedServicesWrapper.classList.add('d-none');
                                detailsSelectedServicesDisplay.value = '';
                            }
                        }

                        detailsModalInstance.show();
                    });
                });

                if (detailsModalElement) {
                    detailsModalElement.addEventListener('hidden.bs.modal', function() {
                        const detailsForm = document.getElementById('packageDetailsForm');
                        if (detailsForm) {
                            detailsForm.reset();
                        }
                        if (detailsSelectedServicesWrapper) {
                            detailsSelectedServicesWrapper.classList.add('d-none');
                        }
                        if (detailsSelectedServicesDisplay) {
                            detailsSelectedServicesDisplay.value = '';
                        }
                    });
                }

                if (!requestModalElement || !requestModalInstance) {
                    return;
                }

                const packageButtons = document.querySelectorAll('.package-request-btn');
                const packageNameInput = document.getElementById('packageNameInput');
                const packageCategoryInput = document.getElementById('packageCategoryInput');
                const selectedServicesInput = document.getElementById('selectedServicesInput');
                const packageDisplay = document.getElementById('packageDisplay');
                const selectedServicesWrapper = document.getElementById('selectedServicesWrapper');
                const selectedServicesDisplay = document.getElementById('selectedServicesDisplay');

                packageButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const packageName = this.getAttribute('data-package') || '';
                        const packageCategory = this.getAttribute('data-category') || '';
                        const includeServices = this.getAttribute('data-include-services') === 'custom';
                        const card = this.closest('.package-card');
                        let selectedServices = '';
                        let errorEl = null;

                        if (card) {
                            errorEl = card.querySelector('.custom-services-error');
                        }

                        if (errorEl) {
                            errorEl.classList.add('d-none');
                        }

                        if (includeServices && card) {
                            const checkedServices = Array.from(card.querySelectorAll(
                                    '.custom-service:checked'))
                                .map(service => service.value.trim())
                                .filter(Boolean);

                            if (checkedServices.length === 0) {
                                if (errorEl) {
                                    errorEl.classList.remove('d-none');
                                }
                                return;
                            }

                            selectedServices = checkedServices.join('\n');
                        }

                        packageNameInput.value = packageName;
                        packageCategoryInput.value = packageCategory;
                        selectedServicesInput.value = selectedServices;
                        packageDisplay.value = packageCategory ? `${packageName} - ${packageCategory}` :
                            packageName;

                        if (selectedServices) {
                            selectedServicesWrapper.classList.remove('d-none');
                            selectedServicesDisplay.value = selectedServices;
                        } else {
                            selectedServicesWrapper.classList.add('d-none');
                            selectedServicesDisplay.value = '';
                        }

                        requestModalInstance.show();
                    });
                });

                requestModalElement.addEventListener('hidden.bs.modal', function() {
                    const form = document.getElementById('packageRequestForm');
                    if (form) {
                        form.reset();
                    }
                    selectedServicesWrapper.classList.add('d-none');
                    selectedServicesDisplay.value = '';
                });
            });
        </script>
    </main>
@endsection
