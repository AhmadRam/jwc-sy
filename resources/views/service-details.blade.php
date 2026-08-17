@extends('layout')

@php
    $locale = app()->getLocale();
    $isAr = $locale === 'ar';
    $currentPillarSlug = $pillar ?? 'administrative';
    $servicesList = $currentPillar['services'] ?? [];
@endphp

@section('page_title')
    {{ $currentPillar['title'] }} - {{ __('app.hero_subtitle_1') }}
@endsection

@section('meta_description')
    {{ $currentPillar['desc'] ?? __('app.meta_description') }}
@endsection

@section('content')
<main class="min-h-screen pt-24 pb-16">
    <!-- Hero Section -->
    <section class="relative pt-12 pb-16 lg:pt-20 lg:pb-24 overflow-hidden bg-gradient-to-br from-[#06121e] via-[#091a2a] to-[#0d2a40] border-b border-white/10">
        <!-- Background Light Effects -->
        <div class="absolute inset-0 z-0 pointer-events-none opacity-40">
            <div class="absolute -top-24 right-1/4 w-[500px] h-[500px] bg-secondary/15 rounded-full blur-[140px]"></div>
            <div class="absolute bottom-0 left-1/3 w-[450px] h-[450px] bg-primary/30 rounded-full blur-[120px]"></div>
            <div class="absolute top-0 right-0 w-[50vw] h-full bg-gradient-to-l from-[#133c5c]/20 to-transparent transform -skew-x-12"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center" data-aos="fade-up">
            <!-- Back to Home & Breadcrumbs Row -->
            <div class="flex flex-wrap items-center justify-center gap-3 md:gap-5 mb-6">
                <a href="/{{ $locale }}#services" 
                   onclick="goBackToServices(event, '{{ $currentPillarSlug }}')" 
                   class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/5 border border-white/10 hover:bg-white/15 hover:border-secondary/40 text-gray-200 hover:text-white text-xs md:text-sm font-semibold transition-all duration-300 shadow-sm group">
                    <svg class="w-4 h-4 rtl:rotate-180 transform group-hover:-translate-x-1 rtl:group-hover:translate-x-1 transition-transform text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>{{ __('services.back_to_home') }}</span>
                </a>

                <nav class="flex items-center gap-2 text-xs md:text-sm text-gray-400">
                    <a href="/{{ $locale }}#hero" class="hover:text-secondary transition-colors">{{ __('services.home') }}</a>
                    <span>/</span>
                    <a href="/{{ $locale }}#services" class="hover:text-secondary transition-colors">{{ __('services.services') }}</a>
                    <span>/</span>
                    <span class="text-secondary font-semibold">{{ $currentPillar['title'] }}</span>
                </nav>
            </div>

            <!-- Pillar Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-secondary/10 border border-secondary/30 text-secondary text-xs md:text-sm font-bold mb-4" data-aos="fade-up" data-aos-delay="50">
                <span>{{ $currentPillar['number'] }}</span>
                <span>•</span>
                <span>{{ __('services.all_pillars') }}</span>
            </div>

            <!-- Main Pillar Title -->
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-white mb-6 drop-shadow-lg" data-aos="fade-up" data-aos-delay="100">
                {{ $currentPillar['title'] }}
            </h1>

            <p class="text-base md:text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed mb-10" data-aos="fade-up" data-aos-delay="150">
                {{ $currentPillar['desc'] }}
            </p>

            <!-- Pillars Switcher Tabs -->
            <div class="flex flex-wrap justify-center gap-3 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                @foreach($pillarsConfig as $slug => $pConfig)
                    @php
                        $isActive = $slug === $currentPillarSlug;
                        $routeTarget = $isAr ? route('service.details', ['service' => $slug]) : route('service.details_en', ['service' => $slug]);
                    @endphp
                    <a href="{{ $routeTarget }}" 
                       class="px-5 py-3 rounded-full text-sm md:text-base font-bold transition-all duration-300 flex items-center gap-2 shadow-lg {{ $isActive ? 'bg-secondary text-dark shadow-secondary/25 scale-105' : 'bg-white/5 text-white/80 border border-white/10 hover:bg-white/10 hover:text-white hover:border-secondary/40' }}">
                        <span class="text-xs opacity-75 font-mono">{{ $pConfig['number'] }}</span>
                        <span>{{ $pConfig['title'] }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Services Detailed Content -->
    <section class="py-16 lg:py-24 relative z-10">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-12 gap-8 lg:gap-12 items-start">
                
                <!-- Quick Navigation Sidebar (Desktop Sticky) -->
                <aside class="col-span-12 lg:col-span-4 xl:col-span-4 sticky top-28 space-y-6" data-aos="fade-up">
                    <div class="glass-card p-6 border border-white/10 shadow-2xl rounded-2xl">
                        <!-- Quick Back Button in Sidebar -->
                        <div class="pb-4 mb-4 border-b border-white/10">
                            <a href="/{{ $locale }}#services" 
                               onclick="goBackToServices(event, '{{ $currentPillarSlug }}')" 
                               class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 hover:bg-secondary hover:text-dark hover:border-secondary text-gray-200 text-xs md:text-sm font-bold transition-all duration-300 shadow-sm group">
                                <svg class="w-4 h-4 rtl:rotate-180 text-secondary group-hover:text-dark transform group-hover:-translate-x-1 rtl:group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                <span>{{ __('services.back_to_home') }}</span>
                            </a>
                        </div>

                        <div class="flex items-center justify-between pb-4 mb-4 border-b border-white/10">
                            <h3 class="text-lg font-bold text-white flex items-center gap-2">
                                <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                </svg>
                                {{ __('services.quick_nav') }}
                            </h3>
                            <span class="text-xs px-2.5 py-1 rounded-full bg-secondary/20 text-secondary font-bold font-mono">
                                {{ count($servicesList) }}
                            </span>
                        </div>

                        <!-- Sidebar Nav Items -->
                        <nav class="space-y-1.5" id="services-sidebar-nav">
                            @foreach($servicesList as $index => $item)
                                <a href="#{{ $item['id'] }}" 
                                   data-target="{{ $item['id'] }}"
                                   class="sidebar-nav-link flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-300 hover:text-white hover:bg-white/10 transition-all duration-200 group">
                                    <span class="w-6 h-6 rounded-lg bg-white/5 group-hover:bg-secondary group-hover:text-dark flex items-center justify-center text-xs font-mono text-secondary shrink-0 transition-colors">
                                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                    <span class="truncate group-hover:translate-x-1 transition-transform rtl:group-hover:-translate-x-1">
                                        {{ $item['title'] }}
                                    </span>
                                </a>
                            @endforeach
                        </nav>
                    </div>

                    <!-- Sidebar CTA Card -->
                    <div class="glass-card p-6 border border-secondary/30 bg-gradient-to-b from-secondary/10 to-transparent rounded-2xl text-center space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-secondary/20 text-secondary flex items-center justify-center mx-auto">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-white">{{ __('services.download_profile') }}</h4>
                        <p class="text-xs text-gray-400">{{ __('app.footer_description') }}</p>
                        @php
                            $pdfUrl = $locale === 'en'
                                ? vasset('assets/files/JWC COMPANY PROFILE ENGLISH.pdf')
                                : vasset('assets/files/JWC COMPANY PROFILE ARABIC.pdf');
                        @endphp
                        <a href="{{ $pdfUrl }}" target="_blank" class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-4 rounded-xl bg-secondary text-dark text-sm font-bold hover:bg-white transition-all shadow-md">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            {{ __('services.download_now') }}
                        </a>
                    </div>
                </aside>

                <!-- Detailed Services Cards List -->
                <div class="col-span-12 lg:col-span-8 xl:col-span-8 space-y-10">
                    @foreach($servicesList as $index => $item)
                        @php
                            $hasPoints = isset($item['points']) && !empty($item['points']);
                            $isAssoc = $hasPoints && (array_keys($item['points']) !== range(0, count($item['points']) - 1));
                        @endphp
                        
                        <article id="{{ $item['id'] }}" class="service-target-card glass-card p-6 md:p-10 border border-white/10 rounded-3xl relative overflow-hidden transition-all duration-500 scroll-mt-28 group hover:border-secondary/40 hover:shadow-2xl hover:shadow-secondary/10" data-aos="fade-up" data-aos-delay="{{ min($index * 60, 200) }}">
                            <!-- Subtle Ambient Background Light -->
                            <div class="absolute -right-20 -top-20 w-48 h-48 bg-secondary/10 rounded-full blur-[80px] pointer-events-none group-hover:bg-secondary/20 transition-all"></div>
                            
                            <!-- Header Info -->
                            <div class="flex flex-wrap items-center justify-between gap-4 mb-6 relative z-10">
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 rounded-2xl bg-secondary/10 border border-secondary/30 flex items-center justify-center text-secondary shrink-0 group-hover:bg-secondary group-hover:text-dark transition-all duration-300 shadow-lg">
                                        @include('partials.service-icon', ['id' => $item['id']])
                                    </div>
                                    <div>
                                        <h2 class="text-2xl md:text-3xl font-bold text-white group-hover:text-secondary transition-colors">
                                            {{ $item['title'] }}
                                        </h2>
                                    </div>
                                </div>
                            </div>

                            <!-- Short Desc / Subtitle -->
                            @if(!empty($item['desc']))
                                <div class="p-4 rounded-xl bg-white/[0.03] border border-white/5 text-secondary text-sm md:text-base font-medium mb-6 relative z-10 flex items-center gap-3">
                                    <svg class="w-5 h-5 text-secondary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $item['desc'] }}</span>
                                </div>
                            @endif

                            <!-- Main Details Paragraph -->
                            @if(!empty($item['details']))
                                <div class="text-gray-300 text-sm md:text-base leading-relaxed space-y-4 mb-6 relative z-10">
                                    {!! nl2br($item['details']) !!}
                                </div>
                            @endif

                            <!-- Structured Points / Sub-items -->
                            @if($hasPoints)
                                <div class="mt-8 pt-6 border-t border-white/10 relative z-10">
                                    <h3 class="text-lg md:text-xl font-bold text-white mb-6 flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-secondary"></span>
                                        {{ __('services.service_scope') }}
                                    </h3>

                                    @if($isAssoc)
                                        <!-- Key-Value Points Grid (e.g. Admin-1, Media-1) -->
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            @foreach($item['points'] as $pointTitle => $pointDesc)
                                                <div class="p-5 rounded-2xl bg-white/[0.02] border border-white/5 hover:border-secondary/40 hover:bg-white/[0.05] transition-all duration-300 flex flex-col justify-start">
                                                    <div class="flex items-center gap-3 mb-2.5 text-white font-bold text-base">
                                                        <div class="w-8 h-8 rounded-xl bg-secondary/15 text-secondary flex items-center justify-center shrink-0 border border-secondary/20 shadow-sm">
                                                            @include('partials.point-icon', ['title' => $pointTitle, 'index' => $loop->index])
                                                        </div>
                                                        <span>{{ $pointTitle }}</span>
                                                    </div>
                                                    <p class="text-gray-400 text-xs md:text-sm leading-relaxed mb-0">
                                                        {{ $pointDesc }}
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <!-- List Points Grid (e.g. Media-2, Media-3, Media-4) -->
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                            @foreach($item['points'] as $point)
                                                <div class="flex items-center gap-3 p-3.5 rounded-xl bg-white/[0.02] border border-white/5 hover:border-secondary/30 hover:bg-white/[0.04] transition-all duration-200">
                                                    <div class="w-7 h-7 rounded-lg bg-secondary/15 text-secondary flex items-center justify-center shrink-0 border border-secondary/20 shadow-sm">
                                                        @include('partials.point-icon', ['point' => $point, 'index' => $loop->index])
                                                    </div>
                                                    <span class="text-gray-200 text-sm font-medium leading-normal">
                                                        {{ $point }}
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <!-- Bottom Card Actions -->
                            <div class="mt-8 pt-6 border-t border-white/5 flex flex-wrap items-center justify-between gap-4 relative z-10">
                                <a href="/{{ $locale }}#contact" 
                                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-secondary/15 text-secondary border border-secondary/30 hover:bg-secondary hover:text-dark text-xs md:text-sm font-bold transition-all duration-300 shadow-sm">
                                    <span>{{ __('services.cta_btn') }}</span>
                                    <svg class="w-4 h-4 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>

                                <a href="/{{ $locale }}#services" 
                                   onclick="goBackToServices(event, '{{ $currentPillarSlug }}')" 
                                   class="text-xs text-gray-400 hover:text-white transition-colors flex items-center gap-1.5 cursor-pointer">
                                    <svg class="w-3.5 h-3.5 rtl:rotate-180 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                                    <span>{{ __('services.back_to_home') }}</span>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    <!-- Bottom Full-Width CTA Section -->
    <section class="py-16 relative z-10">
        <div class="container mx-auto px-6" data-aos="zoom-in">
            <div class="glass-card p-8 md:p-14 border border-secondary/30 rounded-3xl text-center bg-gradient-to-r from-secondary/10 via-primary/20 to-secondary/10 relative overflow-hidden shadow-2xl">
                <!-- Background decoration -->
                <div class="absolute -left-10 -top-10 w-48 h-48 bg-secondary/20 rounded-full blur-[90px] pointer-events-none"></div>
                <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-primary/40 rounded-full blur-[90px] pointer-events-none"></div>

                <div class="relative z-10 max-w-3xl mx-auto space-y-6">
                    <h2 class="text-2xl md:text-4xl font-bold text-white">
                        {{ __('services.cta_title') }}
                    </h2>
                    <p class="text-gray-300 text-sm md:text-lg leading-relaxed">
                        {{ __('services.cta_desc') }}
                    </p>
                    <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
                        <a href="/{{ $locale }}#contact" class="px-8 py-3.5 rounded-full bg-secondary text-dark font-bold text-base hover:bg-white hover:shadow-[0_0_25px_rgba(191,148,72,0.4)] transition-all duration-300">
                            {{ __('services.cta_btn') }}
                        </a>
                        <a href="{{ $pdfUrl }}" target="_blank" class="px-6 py-3.5 rounded-full bg-white/5 text-white border border-white/10 hover:bg-white/10 font-bold text-base transition-all duration-300 flex items-center gap-2">
                            <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            {{ __('services.download_profile') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
    @keyframes targetGlow {
        0% {
            box-shadow: 0 0 0 rgba(191, 148, 72, 0);
            border-color: rgba(255, 255, 255, 0.1);
        }
        50% {
            box-shadow: 0 0 35px rgba(191, 148, 72, 0.5);
            border-color: #bf9448;
            background-color: rgba(255, 255, 255, 0.08);
        }
        100% {
            box-shadow: 0 0 20px rgba(191, 148, 72, 0.25);
            border-color: rgba(191, 148, 72, 0.6);
            background-color: rgba(255, 255, 255, 0.05);
        }
    }

    .service-highlight-active {
        animation: targetGlow 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    .sidebar-nav-active {
        background-color: rgba(191, 148, 72, 0.15) !important;
        color: #fff !important;
        border: 1px solid rgba(191, 148, 72, 0.4) !important;
    }
    .sidebar-nav-active span:first-child {
        background-color: #bf9448 !important;
        color: #0a101d !important;
    }
</style>

@push('scripts')
<script>
    // Smart Back Handler
    window.goBackToServices = function(e, targetPillar) {
        if (e) e.preventDefault();
        const locale = '{{ $locale }}';
        const fallbackUrl = '/' + locale + '#services';

        try {
            if (document.referrer && document.referrer.indexOf(window.location.host) !== -1) {
                const referrerUrl = new URL(document.referrer);
                const path = referrerUrl.pathname.replace(/\/+$/, '');
                const expectedPaths = ['', '/' + locale];
                if (expectedPaths.includes(path)) {
                    window.history.back();
                    return;
                }
            }
        } catch (err) {}

        window.location.href = fallbackUrl;
    };

    document.addEventListener("DOMContentLoaded", function() {
        // Precise scroll helper to always position at the start/top of the target item
        function scrollToTargetElement(targetEl) {
            if (!targetEl) return;
            const navbar = document.querySelector('header') || document.querySelector('nav');
            const navHeight = navbar ? navbar.offsetHeight : 80;
            const extraOffset = 25;
            const elementTop = targetEl.getBoundingClientRect().top + window.pageYOffset;
            const targetScrollY = Math.max(0, elementTop - navHeight - extraOffset);

            window.scrollTo({
                top: targetScrollY,
                behavior: 'smooth'
            });
        }

        // Handle hash navigation and focus highlight
        function handleTargetHighlight() {
            const hash = window.location.hash;
            if (!hash) return;

            const targetEl = document.querySelector(hash);
            if (targetEl && targetEl.classList.contains('service-target-card')) {
                // Remove previous highlights
                document.querySelectorAll('.service-target-card').forEach(el => {
                    el.classList.remove('service-highlight-active');
                });

                // Add highlight class
                targetEl.classList.add('service-highlight-active');

                // Smooth scroll accurately to the beginning of the card
                setTimeout(() => {
                    scrollToTargetElement(targetEl);
                }, 120);

                // Highlight corresponding sidebar link
                updateSidebarNav(hash.substring(1));
            }
        }

        function updateSidebarNav(activeId) {
            document.querySelectorAll('.sidebar-nav-link').forEach(link => {
                if (link.getAttribute('data-target') === activeId) {
                    link.classList.add('sidebar-nav-active');
                } else {
                    link.classList.remove('sidebar-nav-active');
                }
            });
        }

        // Initialize highlight on load
        handleTargetHighlight();

        // Listen for hash changes
        window.addEventListener('hashchange', handleTargetHighlight);

        // Sidebar link clicks
        document.querySelectorAll('.sidebar-nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('data-target');
                const targetEl = document.getElementById(targetId);
                if (targetEl) {
                    history.pushState(null, null, '#' + targetId);
                    document.querySelectorAll('.service-target-card').forEach(el => {
                        el.classList.remove('service-highlight-active');
                    });
                    targetEl.classList.add('service-highlight-active');
                    scrollToTargetElement(targetEl);
                    updateSidebarNav(targetId);
                }
            });
        });

        // IntersectionObserver to sync sidebar active state on scroll
        const cards = document.querySelectorAll('.service-target-card');
        if ('IntersectionObserver' in window && cards.length > 0) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        updateSidebarNav(entry.target.id);
                    }
                });
            }, {
                rootMargin: '-20% 0px -60% 0px',
                threshold: 0
            });

            cards.forEach(card => observer.observe(card));
        }
    });
</script>
@endpush
@endsection
