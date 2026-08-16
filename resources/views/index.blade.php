@extends('layout')

@section('page_title', __('app.page_title'))
@section('meta_description', __('app.meta_description'))
@section('meta_keywords', __('app.meta_keywords'))

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="relative min-h-screen flex items-center pt-24 pb-12 overflow-hidden">
        <div class="container mx-auto px-6 relative z-10 text-center lg:text-start flex flex-col lg:flex-row items-center gap-12">
            <div class="flex-1 space-y-8" data-aos="fade-up">
                <div class="text-lg md:text-2xl font-bold text-secondary tracking-wide">
                    {!! __('app.hero_title') !!}
                </div>
                
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-normal">
                    {{ __('app.hero_subtitle_1') }} <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary to-yellow-200 inline-block py-2">
                        {{ __('app.hero_subtitle_2') }}
                    </span>
                </h1>
                
                <div class="flex flex-wrap justify-center lg:justify-start gap-4 pt-4">
                    <a href="#about" class="px-8 py-3 rounded-full bg-secondary text-dark font-bold hover:bg-white hover:shadow-[0_0_20px_rgba(191,148,72,0.4)] transition-all duration-300">
                        {{ __('app.discover_more') }}
                    </a>
                    <a href="#services" class="px-8 py-3 rounded-full bg-white/5 border border-white/10 text-white font-bold hover:bg-white/10 transition-all duration-300">
                        {{ __('app.services') }}
                    </a>
                </div>
            </div>
            
            <div class="flex-1 relative hidden md:block">
                <!-- Abstract visual element replacing standard image -->
                <div class="relative w-full max-w-lg mx-auto aspect-square rounded-full border border-white/5 flex items-center justify-center before:absolute before:inset-10 before:rounded-full before:border before:border-secondary/20 before:animate-[spin_20s_linear_infinite] after:absolute after:inset-20 after:rounded-full after:border after:border-white/10 after:animate-[spin_15s_linear_infinite_reverse]">
                    <img src="{{ vasset('assets/img/logo.png') }}" class="w-48 h-48 object-contain drop-shadow-[0_0_30px_rgba(191,148,72,0.5)] z-10" alt="JWC">
                </div>
            </div>
        </div>
    </section>

    <!-- Chairman Message -->
    <section class="py-16 relative border-t border-white/5 bg-gradient-to-b from-transparent to-primary/5">
        <div class="container mx-auto px-6 relative z-10">
            <div class="glass-card p-8 md:p-12 relative overflow-hidden text-start">
                <div class="absolute -top-10 -right-10 text-9xl text-white/5 font-serif">"</div>
                <h3 class="text-2xl md:text-3xl font-bold text-secondary mb-6">{{ __('app.chairman_message_title') }}</h3>
                <p class="text-gray-300 text-lg leading-relaxed mb-4">{{ __('app.chairman_message') }}</p>
                <p class="text-gray-300 text-lg leading-relaxed">{{ __('app.chairman_message_2') }}</p>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-24 relative">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-start mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">{{ __('app.about_us') }}</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-transparent via-secondary to-transparent mb-8 inline-block"></div>
                <p class="text-gray-400 text-lg leading-relaxed">
                    {{ __('app.about_description') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <div class="glass-card p-8 text-start group glass-card-hover border-t-4 border-t-secondary">
                    <h4 class="text-2xl font-bold text-white mb-4">{{ __('app.vision_title') }}</h4>
                    <p class="text-gray-400">{{ __('app.vision_desc') }}</p>
                </div>
                <div class="glass-card p-8 text-start group glass-card-hover border-t-4 border-t-secondary">
                    <h4 class="text-2xl font-bold text-white mb-4">{{ __('app.mission_title') }}</h4>
                    <p class="text-gray-400">{{ __('app.mission_desc') }}</p>
                </div>
            </div>

            <!-- Our Compass (Values) -->
            <div class="text-start mb-10">
                <h3 class="text-2xl font-bold text-white mb-6">{{ __('app.compass_title') }}</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @for($i=1; $i<=5; $i++)
                <div class="glass-card p-6 text-start group glass-card-hover">
                    <h5 class="text-lg font-bold text-secondary mb-3">{{ __('app.compass_'.$i.'_title') }}</h5>
                    <p class="text-gray-400 text-sm">{{ __('app.compass_'.$i.'_desc') }}</p>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Numbers Section -->
    <section id="stats" class="py-20 relative bg-black/40 border-y border-white/5">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-white mb-4">{{ __('app.numbers_title') }}</h2>
                <div class="w-24 h-1 bg-secondary mx-auto"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 text-center">
                @for($i=1; $i<=5; $i++)
                <div class="p-4">
                    <div class="text-4xl md:text-5xl font-bold text-secondary mb-2 counter" data-target="{{ intval(str_replace(['+','K','M'], '', __('app.num_'.$i.'_val'))) }}">
                        {{ __('app.num_'.$i.'_val') }}
                    </div>
                    <div class="text-sm text-gray-400">{{ __('app.num_'.$i.'_text') }}</div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-24 relative">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ __('app.core_services') }}</h2>
                <div class="w-24 h-1 bg-secondary mx-auto mb-6"></div>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">{{ __('app.services_description') }}</p>
            </div>

            <!-- Tabs Navigation -->
            <div class="flex flex-wrap justify-center gap-2 sm:gap-4 mb-12 scroll-mt-24" id="services-tabs">
                <button class="px-4 py-2 sm:px-6 sm:py-3 text-sm sm:text-base rounded-full bg-secondary text-dark font-bold transition-all" data-tab="pillar-1">{{ __('app.pillar_1_title') }}</button>
                <button class="px-4 py-2 sm:px-6 sm:py-3 text-sm sm:text-base rounded-full bg-white/5 text-white border border-white/10 hover:bg-white/10 font-bold transition-all" data-tab="pillar-2">{{ __('app.pillar_2_title') }}</button>
                <button class="px-4 py-2 sm:px-6 sm:py-3 text-sm sm:text-base rounded-full bg-white/5 text-white border border-white/10 hover:bg-white/10 font-bold transition-all" data-tab="pillar-3">{{ __('app.pillar_3_title') }}</button>
            </div>

            <style>
                @keyframes tabFadeIn {
                    from { opacity: 0; transform: translateY(15px); }
                    to { opacity: 1; transform: translateY(0); }
                }
                .tab-animate {
                    animation: tabFadeIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
                }
                @keyframes fadeInModal {
                    from { opacity: 0; }
                    to { opacity: 1; }
                }
                @keyframes scaleUpModal {
                    from { opacity: 0; transform: scale(0.95); }
                    to { opacity: 1; transform: scale(1); }
                }
                .animate-fade-in-modal {
                    animation: fadeInModal 0.25s ease-out forwards;
                }
                .animate-scale-up-modal {
                    animation: scaleUpModal 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
                }
            </style>

            <!-- Tabs Content -->
            <div id="services-content-wrapper" class="scroll-mt-28">
                <div class="tab-content" id="pillar-1">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach(__('app.pillar_1_services') as $service)
                    @if($loop->last && $loop->count % 2 !== 0)
                    <div class="md:col-span-2 flex justify-center">
                        <div class="glass-card p-6 glass-card-hover flex gap-4 text-start w-full md:w-1/2 cursor-pointer" onclick="openServiceModal(this)">
                            <div class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold mb-2">{{ $service['title'] }}</h4>
                                <p class="text-gray-400 text-sm mb-0">{{ $service['desc'] }}</p>
                                <div class="hidden service-full-details">{!! $service['details'] !!}</div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="glass-card p-6 glass-card-hover flex gap-4 text-start cursor-pointer" onclick="openServiceModal(this)">
                        <div class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-white font-bold mb-2">{{ $service['title'] }}</h4>
                            <p class="text-gray-400 text-sm mb-0">{{ $service['desc'] }}</p>
                            <div class="hidden service-full-details">{!! $service['details'] !!}</div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>

            <div class="tab-content hidden" id="pillar-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach(__('app.pillar_2_services') as $service)
                    @if($loop->last && $loop->count % 2 !== 0)
                    <div class="md:col-span-2 flex justify-center">
                        <div class="glass-card p-6 glass-card-hover flex gap-4 text-start w-full md:w-1/2 cursor-pointer" onclick="openServiceModal(this)">
                            <div class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold mb-2">{{ $service['title'] }}</h4>
                                <p class="text-gray-400 text-sm mb-0">{{ $service['desc'] }}</p>
                                <div class="hidden service-full-details">{!! $service['details'] !!}</div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="glass-card p-6 glass-card-hover flex gap-4 text-start cursor-pointer" onclick="openServiceModal(this)">
                        <div class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-white font-bold mb-2">{{ $service['title'] }}</h4>
                            <p class="text-gray-400 text-sm mb-0">{{ $service['desc'] }}</p>
                            <div class="hidden service-full-details">{!! $service['details'] !!}</div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>

            <div class="tab-content hidden" id="pillar-3">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach(__('app.pillar_3_services') as $service)
                    @if($loop->last && $loop->count % 2 !== 0)
                    <div class="md:col-span-2 flex justify-center">
                        <div class="glass-card p-6 glass-card-hover flex gap-4 text-start w-full md:w-1/2 cursor-pointer" onclick="openServiceModal(this)">
                            <div class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold mb-2">{{ $service['title'] }}</h4>
                                <p class="text-gray-400 text-sm mb-0">{{ $service['desc'] }}</p>
                                <div class="hidden service-full-details">{!! $service['details'] !!}</div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="glass-card p-6 glass-card-hover flex gap-4 text-start cursor-pointer" onclick="openServiceModal(this)">
                        <div class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-white font-bold mb-2">{{ $service['title'] }}</h4>
                            <p class="text-gray-400 text-sm mb-0">{{ $service['desc'] }}</p>
                            <div class="hidden service-full-details">{!! $service['details'] !!}</div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            </div>

            <!-- Service Details Modal -->
            <div id="service-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/80 backdrop-blur-md animate-fade-in-modal" onclick="handleBackdropClick(event)">
                <div class="relative w-full max-w-2xl glass-card p-8 md:p-10 border border-white/10 shadow-2xl rounded-2xl flex flex-col max-h-[85vh] animate-scale-up-modal">
                    <!-- Close Button -->
                    <button onclick="closeServiceModal()" class="absolute top-4 end-4 text-gray-400 hover:text-white transition-colors p-2 rounded-full hover:bg-white/10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    
                    <!-- Modal Header -->
                    <div class="mb-6 text-start pe-12">
                        <h4 id="modal-title" class="text-2xl md:text-3xl font-bold text-secondary mb-0"></h4>
                        <div class="w-16 h-1 bg-secondary mt-3"></div>
                    </div>
                    
                    <!-- Modal Body (Scrollable) -->
                    <div id="modal-body" class="overflow-y-auto pr-2 text-gray-300 text-base md:text-lg leading-relaxed text-start space-y-4">
                        <!-- Content will be injected here -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why JWC Section -->
    <section id="why_us" class="py-24 relative border-t border-white/5 bg-gradient-to-t from-primary/5 to-transparent">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ __('app.why_us_title') }}</h2>
                <div class="w-24 h-1 bg-secondary mx-auto mb-6"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-6">
                @for($i=1; $i<=5; $i++)
                <div class="glass-card p-8 group glass-card-hover text-center w-full md:col-span-1 lg:col-span-2 {{ $i == 4 ? 'lg:col-start-2' : '' }} {{ $i == 5 ? 'md:col-span-2 lg:col-span-2 md:w-1/2 lg:w-full md:mx-auto lg:mx-0' : '' }}">
                    <div class="w-16 h-16 rounded-full bg-secondary/10 text-secondary flex items-center justify-center text-2xl font-bold mx-auto mb-4 group-hover:bg-secondary group-hover:text-dark transition-all">{{ $i }}</div>
                    <h4 class="text-xl font-bold text-white mb-3">{{ __('app.why_'.$i.'_title') }}</h4>
                    <p class="text-gray-400 text-sm">{{ __('app.why_'.$i.'_desc') }}</p>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Methodology & Journey -->
    <section id="methodology" class="py-24 relative border-t border-white/5">
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Methodology -->
                <div>
                    <h2 class="text-3xl font-bold text-white mb-4">{{ __('app.methodology_title') }}</h2>
                    <div class="w-16 h-1 bg-secondary mb-10"></div>
                    <div class="space-y-6">
                        @for($i=1; $i<=4; $i++)
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-secondary shrink-0 font-bold">{{ $i }}</div>
                            <div>
                                <h4 class="text-white font-bold mb-1">{{ __('app.method_'.$i.'_title') }}</h4>
                                <p class="text-gray-400 text-sm">{{ __('app.method_'.$i.'_desc') }}</p>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>

                <!-- Journey -->
                <div>
                    <h2 class="text-3xl font-bold text-white mb-4">{{ __('app.journey_title') }}</h2>
                    <div class="w-16 h-1 bg-secondary mb-10"></div>
                    <div class="relative border-s border-white/10 ms-4 space-y-8">
                        @for($i=1; $i<=4; $i++)
                        <div class="relative ps-8">
                            <div class="absolute w-4 h-4 rounded-full bg-secondary -start-2 top-1 border-4 border-dark"></div>
                            <h4 class="text-white font-bold mb-1">{{ __('app.journey_'.$i) }}</h4>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Target Sectors -->
    <section id="sectors" class="py-24 relative border-t border-white/5 bg-black/40">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ __('app.target_sectors_title') }}</h2>
                <div class="w-24 h-1 bg-secondary mx-auto mb-6"></div>
                <p class="text-gray-400 text-lg">{{ __('app.target_sectors_desc') }}</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @for($i=1; $i<=4; $i++)
                <div class="glass-card p-6 text-center group glass-card-hover">
                    <h4 class="text-xl font-bold text-secondary mb-3">{{ __('app.sector_'.$i) }}</h4>
                    <p class="text-gray-400 text-sm">{{ __('app.sector_'.$i.'_desc') }}</p>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Social Responsibility -->
    <section id="social" class="py-24 relative border-t border-white/5">
        <div class="container mx-auto px-6 relative z-10 text-center max-w-4xl">
            <div class="w-20 h-20 rounded-full bg-secondary/10 flex items-center justify-center text-secondary mx-auto mb-8">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">{{ __('app.social_responsibility_title') }}</h2>
            <p class="text-gray-300 text-lg leading-relaxed">{{ __('app.social_responsibility_desc') }}</p>
        </div>
    </section>

    <!-- International Presence Section -->
    <section id="international_presence" class="py-24 relative border-t border-white/5 bg-black/20">
        <div class="container mx-auto px-6 relative z-10">
            <div class="mb-8 md:mb-12 text-center md:text-start">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ __('app.international_presence') }}</h2>
                <div class="w-24 h-1 bg-secondary mx-auto md:mx-0"></div>
            </div>

            <div class="glass-card p-2 sm:p-4 md:p-10 mb-8 md:mb-12 relative overflow-hidden" id="interactive-map-wrapper">
                <div id="interactive-map" class="w-full h-[300px] sm:h-[400px] md:h-[500px] mx-auto" style="direction: ltr;"></div>
                
                <!-- Custom Pointer with Label -->
                <div id="map-pointer-pin" style="position: absolute; transform: translate(-50%, -100%); opacity: 0; pointer-events: none; z-index: 10; transition: opacity 0.3s ease; display: flex; flex-direction: column; align-items: center;">
                    <div id="map-pointer-label" style="background-color: #333; color: #fff; padding: 4px 10px; border-radius: 4px; font-size: 13px; margin-bottom: 2px; white-space: nowrap; font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);"></div>
                    <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 384 512' fill='%23bf9448'><path d='M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z'/></svg>" style="width: 24px; height: 24px;">
                </div>
            </div>

            <div class="flex flex-col items-center gap-6 md:gap-10 international-flags-interactive">
                @php
                    $countries = [
                        ['code' => 'sa', 'name' => 'country_saudi'],
                        ['code' => 'in', 'name' => 'country_india'],
                        ['code' => 'eg', 'name' => 'country_egypt'],
                        ['code' => 'bh', 'name' => 'country_bahrain'],
                        ['code' => 'gb', 'name' => 'country_uk'],
                        ['code' => 'it', 'name' => 'country_italy'],
                        ['code' => 'ae', 'name' => 'country_uae'],
                        ['code' => 'tr', 'name' => 'country_turkey'],
                        ['code' => 'sy', 'name' => 'country_syria'],
                    ];
                @endphp
                
                <style>
                    /* Override Syrian Flag with the Revolution Flag matching old project */
                    .fi.fi-sy, .fi.fi-sy.fis {
                        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600"><rect width="600" height="600" fill="%23000"/><rect width="600" height="400" fill="%23fff"/><rect width="600" height="200" fill="%23007a3d"/><g fill="%23ce1126"><path d="M 150,230 L 165,275 L 210,275 L 175,305 L 190,350 L 150,320 L 110,350 L 125,305 L 90,275 L 135,275 Z" /><path d="M 300,230 L 315,275 L 360,275 L 325,305 L 340,350 L 300,320 L 260,350 L 275,305 L 240,275 L 285,275 Z" /><path d="M 450,230 L 465,275 L 510,275 L 475,305 L 490,350 L 450,320 L 410,350 L 425,305 L 390,275 L 435,275 Z" /></g></svg>') !important;
                    }
                    
                    /* Force perfect circles for flags */
                    .flag-custom-size {
                        width: 50px !important;
                        height: 50px !important;
                    }
                    @media (max-width: 768px) {
                        .flag-custom-size {
                            width: 40px !important;
                            height: 40px !important;
                        }
                    }
                </style>
                
                <!-- Flags Container -->
                <div class="text-center mb-10">
                    <p class="text-gray-300 text-lg md:text-xl max-w-5xl mx-auto">{{ app()->getLocale() == 'ar' ? 'تواجدنا في العديد من المناطق والدول حول العالم لتقديم خدمات الاستشارات التواصلية وتنفيذ حملات العلاقات العامة والاتصال' : 'Our presence in many regions and countries around the world to provide communication consulting services and execute PR and communication campaigns' }}</p>
                </div>
                <div class="flex flex-wrap justify-center gap-4 md:gap-8 lg:gap-10">
                    @foreach($countries as $index => $country)
                    <div class="flag-item flex flex-col items-center justify-center gap-2 cursor-pointer transition-transform duration-300 w-[50px] sm:w-[60px] md:w-[60px] lg:w-[70px]" data-country="{{ $country['code'] }}">
                        <span class="fi fi-{{ $country['code'] }} fis rounded-full shadow-lg shadow-black/50 border border-white/10 shrink-0 flag-custom-size" style="background-size: cover; background-position: center;"></span>
                        <span class="text-[10px] md:text-xs font-medium text-gray-300 text-center whitespace-nowrap">{{ __('app.'.$country['name']) }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <style>
                .jvm-marker {
                    transition: opacity 0.3s ease, r 0.3s ease, fill 0.3s ease, stroke 0.3s ease !important;
                }
                @keyframes bouncePin {
                    0%, 100% { transform: translate(-50%, -100%); }
                    50% { transform: translate(-50%, -120%); }
                }
                .pin-bouncing {
                    animation: bouncePin 1s infinite ease-in-out;
                }
                .jvm-tooltip {
                    display: none !important;
                }
            </style>
        </div>
    </section>

    <!-- Clients Section -->
    <section id="clients" class="py-24 relative border-t border-white/5 overflow-hidden">
        <div class="container mx-auto px-6 relative z-10 mb-12 text-center md:text-start">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ __('app.clients') }}</h2>
            <div class="w-24 h-1 bg-secondary mx-auto md:mx-0 mb-6"></div>
            <p class="text-gray-400 text-lg">{{ __('app.clients_description') }}</p>
        </div>

        <style>
            .marquee-track { display: flex; width: max-content; animation: scroll 40s linear infinite; }
            .marquee-track.reverse { animation-direction: reverse; }
            .marquee-track:hover { animation-play-state: paused; }
            @keyframes scroll { from { transform: translateX(0); } to { transform: translateX(-50%); } }
            .client-img { 
                filter: grayscale(100%) invert(1) opacity(60%); 
                mix-blend-mode: screen;
                padding: 0.5rem;
                border-radius: 0.5rem;
                background-color: transparent;
                transition: all 0.3s ease; 
            }
            .client-img:hover { 
                filter: grayscale(0%) invert(0) opacity(100%) drop-shadow(0 0 1px rgba(255,255,255,0.3)); 
                mix-blend-mode: normal;
                background-color: rgba(255, 255, 255, 0.6);
                backdrop-filter: blur(4px);
                box-shadow: 0 4px 15px rgba(0,0,0,0.2);
                transform: scale(1.1); 
            }
        </style>
        
        <div class="flex flex-col gap-16 direction-ltr" dir="ltr">
            <!-- Row 1 -->
            <div class="marquee-track">
                <div class="flex gap-16 pr-16 items-center">
                    @for($i=1; $i<=15; $i++)
                        <img src="{{ vasset('assets/img/clients/client-'.$i.'.png') }}" alt="Client" class="h-16 w-auto object-contain client-img">
                    @endfor
                </div>
                <div class="flex gap-16 pr-16 items-center">
                    @for($i=1; $i<=15; $i++)
                        <img src="{{ vasset('assets/img/clients/client-'.$i.'.png') }}" alt="Client" class="h-16 w-auto object-contain client-img">
                    @endfor
                </div>
            </div>
            
            <!-- Row 2 -->
            <div class="marquee-track reverse">
                <div class="flex gap-16 pr-16 items-center">
                    @for($i=16; $i<=29; $i++)
                        <img src="{{ vasset('assets/img/clients/client-'.$i.'.png') }}" alt="Client" class="h-16 w-auto object-contain client-img">
                    @endfor
                </div>
                <div class="flex gap-16 pr-16 items-center">
                    @for($i=16; $i<=29; $i++)
                        <img src="{{ vasset('assets/img/clients/client-'.$i.'.png') }}" alt="Client" class="h-16 w-auto object-contain client-img">
                    @endfor
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 relative border-t border-white/5">
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <div>
                    <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ __('app.contact') }}</h2>
                    <div class="w-24 h-1 bg-secondary mb-6"></div>
                    <p class="text-gray-400 text-lg mb-8">{{ __('app.contact_description') }}</p>
                    
                    <div class="glass-card p-8 space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold">{{ app()->getLocale() == 'ar' ? 'الفرع الرئيسي - الرياض' : 'Headquarters - Riyadh' }}</h4>
                                <p class="text-gray-400 text-sm">{{ __('app.address') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold">{{ app()->getLocale() == 'ar' ? 'دمشق' : 'Damascus' }}</h4>
                                <p class="text-gray-400 text-sm">{{ __('app.address3') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold">{{ app()->getLocale() == 'ar' ? 'دبي' : 'Dubai' }}</h4>
                                <p class="text-gray-400 text-sm">{{ __('app.address2') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center text-secondary">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold">{{ app()->getLocale() == 'ar' ? 'الهاتف' : 'Phone' }}</h4>
                                <p class="text-gray-400 text-sm" dir="ltr">+963 943 777 056</p>
                                <p class="text-gray-400 text-sm" dir="ltr">+966 506 123 777</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center text-secondary">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold">{{ app()->getLocale() == 'ar' ? 'البريد الإلكتروني' : 'Email' }}</h4>
                                <p class="text-gray-400 text-sm">info@jwc.sa</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-8">
                    <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <input type="text" name="name" class="w-full bg-dark/50 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-secondary focus:ring-1 focus:ring-secondary transition-colors" placeholder="{{ __('app.name') }}" required>
                            </div>
                            <div>
                                <input type="email" name="email" class="w-full bg-dark/50 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-secondary focus:ring-1 focus:ring-secondary transition-colors" placeholder="{{ __('app.email') }}" required>
                            </div>
                        </div>
                        <div>
                            <input type="text" name="subject" class="w-full bg-dark/50 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-secondary focus:ring-1 focus:ring-secondary transition-colors" placeholder="{{ __('app.subject') }}" required>
                        </div>
                        <div>
                            <textarea name="message" rows="5" class="w-full bg-dark/50 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-secondary focus:ring-1 focus:ring-secondary transition-colors" placeholder="{{ __('app.message') }}" required></textarea>
                        </div>
                        <button type="submit" class="w-full py-4 rounded-xl bg-secondary text-dark font-bold hover:bg-white hover:shadow-[0_0_20px_rgba(191,148,72,0.4)] transition-all duration-300">
                            {{ __('app.send_message') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Services Modal Functions
    window.openServiceModal = function(card) {
        const title = card.querySelector('h4').innerText;
        const details = card.querySelector('.service-full-details').innerHTML;
        
        document.getElementById('modal-title').innerText = title;
        document.getElementById('modal-body').innerHTML = details;
        
        const modal = document.getElementById('service-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    };

    window.closeServiceModal = function() {
        const modal = document.getElementById('service-modal');
        if (modal) {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
        document.body.classList.remove('overflow-hidden');
    };

    window.handleBackdropClick = function(event) {
        if (event.target.id === 'service-modal') {
            window.closeServiceModal();
        }
    };

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            window.closeServiceModal();
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Services Tabs
        const tabBtns = document.querySelectorAll('#services-tabs button');
        const tabContents = document.querySelectorAll('.tab-content');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active classes
                tabBtns.forEach(b => {
                    b.classList.remove('bg-secondary', 'text-dark');
                    b.classList.add('bg-white/5', 'text-white', 'border', 'border-white/10', 'hover:bg-white/10');
                });
                
                tabContents.forEach(c => {
                    c.classList.add('hidden');
                    c.classList.remove('tab-animate');
                });

                // Add active class to clicked
                btn.classList.remove('bg-white/5', 'text-white', 'border', 'border-white/10', 'hover:bg-white/10');
                btn.classList.add('bg-secondary', 'text-dark');
                
                // Show content with animation
                const activeTab = document.getElementById(btn.dataset.tab);
                if (activeTab) {
                    activeTab.classList.remove('hidden');
                    activeTab.classList.add('tab-animate');
                }

                // Smooth scroll to tabs navigation on mobile (width < 768px)
                if (window.innerWidth < 768) {
                    const tabsContainer = document.getElementById('services-tabs');
                    if (tabsContainer) {
                        tabsContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
            });
        });

        // Map setup
        if (typeof jsVectorMap !== 'undefined') {
            const markers = [
                { name: "{{ __('app.country_saudi') }}", coords: [23.8859, 45.0792], id: 'sa' },
                { name: "{{ __('app.country_uae') }}", coords: [23.4241, 53.8478], id: 'ae' },
                { name: "{{ __('app.country_uk') }}", coords: [55.3781, -3.4360], id: 'gb' },
                { name: "{{ __('app.country_bahrain') }}", coords: [26.0667, 50.5577], id: 'bh' },
                { name: "{{ __('app.country_egypt') }}", coords: [26.8206, 30.8025], id: 'eg' },
                { name: "{{ __('app.country_india') }}", coords: [20.5937, 78.9629], id: 'in' },
                { name: "{{ __('app.country_italy') }}", coords: [42.5041, 12.5226], id: 'it' },
                { name: "{{ __('app.country_syria') }}", coords: [34.8021, 38.9968], id: 'sy' },
                { name: "{{ __('app.country_turkey') }}", coords: [38.9637, 35.2433], id: 'tr' }
            ];

            const map = new jsVectorMap({
                selector: "#interactive-map",
                map: "world",
                focusOn: { coords: [20, 0], scale: 1, animate: false },
                zoomOnScroll: false, zoomButtons: false,
                regionStyle: {
                    initial: { fill: '#15243b', stroke: '#0a101d', strokeWidth: 0.5, fillOpacity: 1 },
                    hover: { fill: '#2a3b5c', fillOpacity: 1 }
                },
                markers: markers,
                markerStyle: {
                    initial: { fill: '#bf9448', r: 6, stroke: '#fff', strokeWidth: 2, strokeOpacity: 0.8 },
                    hover: { fill: '#ffffff', stroke: '#bf9448', strokeWidth: 3, r: 8 }
                }
            });

            let trackAnimFrame;
            let isZoomed = false;
            let currentHoveredCountryCode = null;
            let globalZoomTimeout;
            
            const pin = document.getElementById('map-pointer-pin');
            const mapWrapper = document.getElementById('interactive-map-wrapper');
            const flagItems = document.querySelectorAll('.flag-item');
            const flagsContainer = document.querySelector('.international-flags-interactive');

            function clearCountryHighlight(countryCode) {
                if (!countryCode) return;
                const index = markers.findIndex(m => m.id === countryCode);
                if(index !== -1) {
                    const flagItem = document.querySelector(`.flag-item[data-country="${countryCode}"]`);
                    if (flagItem) flagItem.style.transform = 'scale(1)';

                    const markerElement = document.querySelector(`.jvm-marker[data-index="${index}"]`);
                    if (markerElement) {
                        markerElement.setAttribute('fill', '#bf9448');
                        markerElement.setAttribute('stroke', '#fff');
                        markerElement.setAttribute('r', '6');
                    }
                }
                pin.style.opacity = '0';
                pin.classList.remove('pin-bouncing');
                cancelAnimationFrame(trackAnimFrame);
                document.querySelectorAll('.jvm-marker').forEach(m => m.classList.remove('is-active'));
            }

            function triggerHover(countryCode) {
                clearTimeout(globalZoomTimeout);
                const index = markers.findIndex(m => m.id === countryCode);
                document.querySelectorAll('.jvm-marker').forEach(m => m.classList.remove('is-active'));
                
                if(index !== -1) {
                    const flagItem = document.querySelector(`.flag-item[data-country="${countryCode}"]`);
                    if (flagItem) flagItem.style.transform = 'scale(1.1)';

                    const markerElement = document.querySelector(`.jvm-marker[data-index="${index}"]`);
                    if (markerElement) {
                        markerElement.classList.add('is-active');
                        markerElement.setAttribute('fill', '#ffffff');
                        markerElement.setAttribute('stroke', '#bf9448');
                        markerElement.setAttribute('r', '9');
                        
                        cancelAnimationFrame(trackAnimFrame);
                        pin.style.opacity = '1';
                        pin.classList.add('pin-bouncing');
                        
                        // Set the country name in the custom label
                        const markerData = markers[index];
                        if (markerData) {
                            document.getElementById('map-pointer-label').innerText = markerData.name;
                        }
                        
                        function track() {
                            const rect = markerElement.getBoundingClientRect();
                            const wrapRect = mapWrapper.getBoundingClientRect();
                            pin.style.left = (rect.left - wrapRect.left + rect.width/2) + 'px';
                            pin.style.top = (rect.top - wrapRect.top - 8) + 'px';
                            trackAnimFrame = requestAnimationFrame(track);
                        }
                        track();
                    }
                    
                    if (!isZoomed) {
                        try {
                            map.setFocus({ coords: [35, 38], scale: 2.5, animate: true });
                            isZoomed = true;
                        } catch(e) {}
                    }
                }
            }

            function handleGlobalLeave() {
                globalZoomTimeout = setTimeout(() => {
                    if (currentHoveredCountryCode) {
                        clearCountryHighlight(currentHoveredCountryCode);
                        currentHoveredCountryCode = null;
                    }
                    if (isZoomed) {
                        try {
                            map.setFocus({ coords: [20, 0], scale: 1, animate: true });
                        } catch(e) {}
                        isZoomed = false;
                    }
                }, 150);
            }

            function handleGlobalEnter() {
                clearTimeout(globalZoomTimeout);
            }

            flagItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    if (currentHoveredCountryCode) clearCountryHighlight(currentHoveredCountryCode);
                    currentHoveredCountryCode = this.getAttribute('data-country');
                    triggerHover(currentHoveredCountryCode);
                });
                item.addEventListener('mouseleave', function() {
                    clearCountryHighlight(currentHoveredCountryCode);
                    currentHoveredCountryCode = null;
                });
            });

            mapWrapper.addEventListener('mouseenter', handleGlobalEnter);
            mapWrapper.addEventListener('mouseleave', handleGlobalLeave);
            if (flagsContainer) {
                flagsContainer.addEventListener('mouseenter', handleGlobalEnter);
                flagsContainer.addEventListener('mouseleave', handleGlobalLeave);
            }

            document.getElementById('interactive-map').addEventListener('mouseover', function(e) {
                handleGlobalEnter();
                let target = e.target;
                if (target && target.classList && target.classList.contains('jvm-marker')) {
                    const index = target.getAttribute('data-index');
                    if (index !== null && markers[index]) {
                        const newCountry = markers[index].id;
                        if (currentHoveredCountryCode !== newCountry) {
                            if (currentHoveredCountryCode) clearCountryHighlight(currentHoveredCountryCode);
                            currentHoveredCountryCode = newCountry;
                            triggerHover(newCountry);
                        }
                    }
                }
                else if (target && target.classList && target.classList.contains('jvm-region')) {
                    const regionCode = target.getAttribute('data-code');
                    if (regionCode) {
                        const countryCode = regionCode.toLowerCase();
                        const isTargetCountry = markers.some(m => m.id === countryCode);
                        if (isTargetCountry) {
                            if (currentHoveredCountryCode !== countryCode) {
                                if (currentHoveredCountryCode) clearCountryHighlight(currentHoveredCountryCode);
                                currentHoveredCountryCode = countryCode;
                                triggerHover(countryCode);
                            }
                        }
                    }
                }
            });
        }
    });
</script>
@endpush
