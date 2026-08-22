@extends('layout')

@section('page_title', __('app.page_title'))
@section('meta_description', __('app.meta_description'))
@section('meta_keywords', __('app.meta_keywords'))

@section('content')
    <section id="hero" class="relative min-h-[auto] lg:min-h-screen flex items-start lg:items-center pt-[88px] pb-8 md:pt-24 md:pb-12 overflow-hidden">
        <div class="container mx-auto px-6 relative z-10 text-center lg:text-start flex flex-col lg:flex-row items-center gap-8 lg:gap-12">
            <div class="flex-1 space-y-8 order-2 lg:order-1" data-aos="fade-up">
                <div class="text-lg md:text-2xl font-bold text-secondary tracking-wide" data-aos="fade-up" data-aos-delay="100">
                    {!! __('app.hero_title') !!}
                </div>
                
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-normal" data-aos="fade-up" data-aos-delay="200">
                    {{ __('app.hero_subtitle_1') }} <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary to-yellow-200 inline-block py-2">
                        {{ __('app.hero_subtitle_2') }}
                    </span>
                </h1>
                
                <div class="flex flex-wrap justify-center lg:justify-start gap-4 pt-4" data-aos="fade-up" data-aos-delay="300">
                    <a href="#about" class="px-8 py-3 rounded-full bg-secondary text-dark font-bold hover:bg-white hover:shadow-[0_0_20px_rgba(191,148,72,0.4)] transition-all duration-300">
                        {{ __('app.discover_more') }}
                    </a>
                    <a href="#services" class="px-8 py-3 rounded-full bg-white/5 border border-white/10 text-white font-bold hover:bg-white/10 transition-all duration-300">
                        {{ __('app.services') }}
                    </a>
                </div>
            </div>
            
            <div class="flex-1 relative order-1 lg:order-2 w-full flex justify-center" data-aos="zoom-in" data-aos-delay="200">
                <!-- Abstract visual element replacing standard image -->
                <div class="relative w-full max-w-[260px] md:max-w-lg mx-auto aspect-square rounded-full border border-white/5 flex items-center justify-center before:absolute before:inset-6 md:before:inset-10 before:rounded-full before:border before:border-secondary/20 before:animate-[spin_20s_linear_infinite] after:absolute after:inset-12 md:after:inset-20 after:rounded-full after:border after:border-white/10 after:animate-[spin_15s_linear_infinite_reverse]">
                    <img src="{{ vasset('assets/img/logo.png') }}" class="w-28 h-28 md:w-48 md:h-48 object-contain drop-shadow-[0_0_30px_rgba(191,148,72,0.5)] z-10" alt="JWC">
                </div>
            </div>
        </div>
    </section>

    <!-- Chairman Message -->
    <section class="py-16 relative border-t border-white/5 bg-gradient-to-b from-transparent to-primary/5">
        <div class="container mx-auto px-6 relative z-10" data-aos="fade-up">
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
            <div class="text-start mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">{{ __('app.about_us') }}</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-transparent via-secondary to-transparent mb-8 inline-block"></div>
                <p class="text-gray-400 text-lg leading-relaxed">
                    {{ __('app.about_description') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <div class="glass-card p-8 text-start group glass-card-hover border-t-4 border-t-secondary" data-aos="fade-right" data-aos-delay="100">
                    <h4 class="text-2xl font-bold text-white mb-4">{{ __('app.vision_title') }}</h4>
                    <p class="text-gray-400">{{ __('app.vision_desc') }}</p>
                </div>
                <div class="glass-card p-8 text-start group glass-card-hover border-t-4 border-t-secondary" data-aos="fade-left" data-aos-delay="200">
                    <h4 class="text-2xl font-bold text-white mb-4">{{ __('app.mission_title') }}</h4>
                    <p class="text-gray-400">{{ __('app.mission_desc') }}</p>
                </div>
            </div>

            <!-- Our Compass (Values) -->
            <div class="text-start mb-10" data-aos="fade-up">
                <h3 class="text-2xl font-bold text-white mb-6">{{ __('app.compass_title') }}</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @for($i=1; $i<=5; $i++)
                <div class="glass-card p-6 text-start group glass-card-hover" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
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
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-white mb-4">{{ __('app.numbers_title') }}</h2>
                <div class="w-24 h-1 bg-secondary mx-auto"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 text-center">
                @for($i=1; $i<=5; $i++)
                <div class="p-4" data-aos="zoom-in" data-aos-delay="{{ $i * 100 }}">
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
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ __('app.core_services') }}</h2>
                <div class="w-24 h-1 bg-secondary mx-auto mb-6"></div>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">{{ __('app.services_description') }}</p>
            </div>

            <!-- Tabs Navigation -->
            <div class="flex flex-wrap justify-center gap-2 sm:gap-4 mb-12 scroll-mt-24" id="services-tabs" data-aos="fade-up" data-aos-delay="100">
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
            </style>

            <!-- Tabs Content -->
            <div id="services-content-wrapper" class="scroll-mt-28">
                <!-- Pillar 1: Administrative -->
                <div class="tab-content" id="pillar-1">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach(__('app.pillar_1_services') as $service)
                        @php
                            $serviceUrl = route(app()->getLocale() == 'ar' ? 'service.details' : 'service.details_en', ['service' => 'administrative']) . '#' . $service['id'];
                        @endphp
                        <div class="{{ ($loop->last && $loop->count % 2 !== 0) ? 'md:col-span-2 flex justify-center' : '' }}" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                            <a href="{{ $serviceUrl }}" class="glass-card p-5 md:p-6 glass-card-hover flex flex-col justify-between text-start border border-white/10 hover:border-secondary/50 transition-all duration-300 group w-full {{ ($loop->last && $loop->count % 2 !== 0) ? 'md:w-1/2' : '' }}">
                                <div>
                                    <div class="flex items-center gap-3.5 mb-2.5">
                                        <div class="service-icon-box w-11 h-11 md:w-12 md:h-12 rounded-xl bg-secondary/10 border border-secondary/20 flex items-center justify-center text-secondary shrink-0 group-hover:bg-secondary group-hover:text-dark transition-all duration-300 shadow-sm">
                                            @include('partials.service-icon', ['id' => $service['id']])
                                        </div>
                                        <h4 class="text-white font-bold text-base md:text-lg group-hover:text-secondary transition-colors leading-snug mb-0">
                                            {{ $service['title'] }}
                                        </h4>
                                    </div>
                                    <p class="text-gray-400 text-xs md:text-sm mb-3 leading-relaxed">{{ $service['desc'] }}</p>
                                </div>
                                <div class="flex items-center gap-2 text-secondary text-xs font-bold pt-3 border-t border-white/5 mt-auto">
                                    <span>{{ __('services.view_details') }}</span>
                                    <svg class="w-4 h-4 rtl:rotate-180 transform group-hover:translate-x-1.5 rtl:group-hover:-translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Pillar 2: Media -->
                <div class="tab-content hidden" id="pillar-2">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach(__('app.pillar_2_services') as $service)
                        @php
                            $serviceUrl = route(app()->getLocale() == 'ar' ? 'service.details' : 'service.details_en', ['service' => 'media']) . '#' . $service['id'];
                        @endphp
                        <div class="{{ ($loop->last && $loop->count % 2 !== 0) ? 'md:col-span-2 flex justify-center' : '' }}" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                            <a href="{{ $serviceUrl }}" class="glass-card p-5 md:p-6 glass-card-hover flex flex-col justify-between text-start border border-white/10 hover:border-secondary/50 transition-all duration-300 group w-full {{ ($loop->last && $loop->count % 2 !== 0) ? 'md:w-1/2' : '' }}">
                                <div>
                                    <div class="flex items-center gap-3.5 mb-2.5">
                                        <div class="service-icon-box w-11 h-11 md:w-12 md:h-12 rounded-xl bg-secondary/10 border border-secondary/20 flex items-center justify-center text-secondary shrink-0 group-hover:bg-secondary group-hover:text-dark transition-all duration-300 shadow-sm">
                                            @include('partials.service-icon', ['id' => $service['id']])
                                        </div>
                                        <h4 class="text-white font-bold text-base md:text-lg group-hover:text-secondary transition-colors leading-snug mb-0">
                                            {{ $service['title'] }}
                                        </h4>
                                    </div>
                                    <p class="text-gray-400 text-xs md:text-sm mb-3 leading-relaxed">{{ $service['desc'] }}</p>
                                </div>
                                <div class="flex items-center gap-2 text-secondary text-xs font-bold pt-3 border-t border-white/5 mt-auto">
                                    <span>{{ __('services.view_details') }}</span>
                                    <svg class="w-4 h-4 rtl:rotate-180 transform group-hover:translate-x-1.5 rtl:group-hover:-translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Pillar 3: Financial -->
                <div class="tab-content hidden" id="pillar-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach(__('app.pillar_3_services') as $service)
                        @php
                            $serviceUrl = route(app()->getLocale() == 'ar' ? 'service.details' : 'service.details_en', ['service' => 'financial']) . '#' . $service['id'];
                        @endphp
                        <div class="{{ ($loop->last && $loop->count % 2 !== 0) ? 'md:col-span-2 flex justify-center' : '' }}" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                            <a href="{{ $serviceUrl }}" class="glass-card p-5 md:p-6 glass-card-hover flex flex-col justify-between text-start border border-white/10 hover:border-secondary/50 transition-all duration-300 group w-full {{ ($loop->last && $loop->count % 2 !== 0) ? 'md:w-1/2' : '' }}">
                                <div>
                                    <div class="flex items-center gap-3.5 mb-2.5">
                                        <div class="service-icon-box w-11 h-11 md:w-12 md:h-12 rounded-xl bg-secondary/10 border border-secondary/20 flex items-center justify-center text-secondary shrink-0 group-hover:bg-secondary group-hover:text-dark transition-all duration-300 shadow-sm">
                                            @include('partials.service-icon', ['id' => $service['id']])
                                        </div>
                                        <h4 class="text-white font-bold text-base md:text-lg group-hover:text-secondary transition-colors leading-snug mb-0">
                                            {{ $service['title'] }}
                                        </h4>
                                    </div>
                                    <p class="text-gray-400 text-xs md:text-sm mb-3 leading-relaxed">{{ $service['desc'] }}</p>
                                </div>
                                <div class="flex items-center gap-2 text-secondary text-xs font-bold pt-3 border-t border-white/5 mt-auto">
                                    <span>{{ __('services.view_details') }}</span>
                                    <svg class="w-4 h-4 rtl:rotate-180 transform group-hover:translate-x-1.5 rtl:group-hover:-translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why JWC Section -->
    <section id="why_us" class="py-24 relative border-t border-white/5 bg-gradient-to-t from-primary/5 to-transparent">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ __('app.why_us_title') }}</h2>
                <div class="w-24 h-1 bg-secondary mx-auto mb-6"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-6">
                @for($i=1; $i<=5; $i++)
                <div class="glass-card p-8 group glass-card-hover text-center w-full md:col-span-1 lg:col-span-2 {{ $i == 4 ? 'lg:col-start-2' : '' }} {{ $i == 5 ? 'md:col-span-2 lg:col-span-2 md:w-1/2 lg:w-full md:mx-auto lg:mx-0' : '' }}" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="w-16 h-16 rounded-full bg-secondary/10 text-secondary flex items-center justify-center text-2xl font-bold mx-auto mb-4 group-hover:bg-secondary group-hover:text-dark transition-all">{{ $i }}</div>
                    <h4 class="text-xl font-bold text-white mb-3">{{ __('app.why_'.$i.'_title') }}</h4>
                    <p class="text-gray-400 text-sm">{{ __('app.why_'.$i.'_desc') }}</p>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Methodology Section -->
    <section id="methodology" class="py-24 relative border-t border-white/5 bg-gradient-to-b from-primary/5 to-transparent">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ __('app.methodology_title') }}</h2>
                <div class="w-24 h-1 bg-secondary mx-auto mb-6"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @for($i=1; $i<=4; $i++)
                <div class="glass-card p-8 relative overflow-hidden group glass-card-hover border-t-4 border-t-secondary/60 hover:border-t-secondary transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $i * 150 }}">
                    <!-- Faded background number -->
                    <div class="absolute -right-4 -top-8 text-8xl font-black text-white/[0.02] select-none group-hover:text-white/[0.06] transition-all duration-300 pointer-events-none">0{{ $i }}</div>
                    
                    <!-- Top Badge with Icon -->
                    <div class="w-12 h-12 rounded-xl bg-secondary/10 border border-secondary/20 flex items-center justify-center mb-6 group-hover:bg-secondary transition-all duration-300">
                        @if($i == 1)
                        <svg class="w-6 h-6 text-secondary group-hover:text-dark transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        @elseif($i == 2)
                        <svg class="w-6 h-6 text-secondary group-hover:text-dark transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        @elseif($i == 3)
                        <svg class="w-6 h-6 text-secondary group-hover:text-dark transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        @elseif($i == 4)
                        <svg class="w-6 h-6 text-secondary group-hover:text-dark transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        @endif
                    </div>
                    
                    <!-- Title -->
                    <h4 class="text-xl font-bold text-white mb-3 group-hover:text-secondary transition-colors">{{ __('app.method_'.$i.'_title') }}</h4>
                    
                    <!-- Description -->
                    <p class="text-gray-400 text-sm leading-relaxed">{{ __('app.method_'.$i.'_desc') }}</p>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Journey Section -->
    <section id="journey" class="py-20 lg:py-24 relative border-t border-white/5 bg-gradient-to-t from-primary/5 to-transparent overflow-hidden">
        <style>
            .cloud-shape-1 {
                border-radius: 65% 35% 65% 35% / 40% 60% 40% 60%;
            }
            .cloud-shape-2 {
                border-radius: 40% 60% 50% 70% / 60% 40% 70% 50%;
            }
            .cloud-shape-3 {
                border-radius: 55% 45% 70% 45% / 45% 65% 45% 55%;
            }
            .cloud-shape-4 {
                border-radius: 70% 30% 60% 40% / 50% 65% 35% 50%;
            }
            
            /* Gentle floating animation for clouds */
            @keyframes float-cloud {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-7px) rotate(1deg); }
            }
            .cloud-float-1 { animation: float-cloud 5s ease-in-out infinite; }
            .cloud-float-2 { animation: float-cloud 6s ease-in-out infinite 1s; }
            .cloud-float-3 { animation: float-cloud 5.5s ease-in-out infinite 0.5s; }
            .cloud-float-4 { animation: float-cloud 6.5s ease-in-out infinite 1.5s; }

            /* Sequential Path Drawing & Arrowhead Fade animations */
            @keyframes draw-1 {
                0% { stroke-dashoffset: 400; opacity: 0; }
                2% { opacity: 1; }
                28% { stroke-dashoffset: 0; opacity: 1; }
                90% { stroke-dashoffset: 0; opacity: 1; }
                98%, 100% { stroke-dashoffset: 0; opacity: 0; }
            }
            @keyframes draw-2 {
                0%, 28% { stroke-dashoffset: 400; opacity: 0; }
                30% { opacity: 1; }
                58% { stroke-dashoffset: 0; opacity: 1; }
                90% { stroke-dashoffset: 0; opacity: 1; }
                98%, 100% { stroke-dashoffset: 0; opacity: 0; }
            }
            @keyframes draw-3 {
                0%, 58% { stroke-dashoffset: 400; opacity: 0; }
                60% { opacity: 1; }
                88% { stroke-dashoffset: 0; opacity: 1; }
                90% { stroke-dashoffset: 0; opacity: 1; }
                98%, 100% { stroke-dashoffset: 0; opacity: 0; }
            }

            @keyframes arrow-1 {
                0%, 27% { opacity: 0; }
                28%, 90% { opacity: 1; }
                98%, 100% { opacity: 0; }
            }
            @keyframes arrow-2 {
                0%, 57% { opacity: 0; }
                58%, 90% { opacity: 1; }
                98%, 100% { opacity: 0; }
            }
            @keyframes arrow-3 {
                0%, 87% { opacity: 0; }
                88%, 90% { opacity: 1; }
                98%, 100% { opacity: 0; }
            }

            .path-anim-1 {
                stroke-dasharray: 400;
                animation: draw-1 6s linear infinite;
            }
            .path-anim-2 {
                stroke-dasharray: 400;
                animation: draw-2 6s linear infinite;
            }
            .path-anim-3 {
                stroke-dasharray: 400;
                animation: draw-3 6s linear infinite;
            }
            .arrow-anim-1 {
                animation: arrow-1 6s linear infinite;
            }
            .arrow-anim-2 {
                animation: arrow-2 6s linear infinite;
            }
            .arrow-anim-3 {
                animation: arrow-3 6s linear infinite;
            }
        </style>

        <div class="container mx-auto px-4 sm:px-6 relative z-10">
            <div class="text-center mb-14 lg:mb-20" data-aos="fade-up">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-4">{{ __('app.journey_title') }}</h2>
                <div class="w-20 sm:w-24 h-1 bg-secondary mx-auto mb-6"></div>
                <p class="text-gray-400 text-xs sm:text-sm md:text-base max-w-xl mx-auto leading-relaxed">
                    {{ app()->getLocale() == 'ar' ? 'رحلتنا مع شركائنا تبدأ بخطوات واضحة ومدروسة لضمان تحقيق أفضل النتائج وتلبية تطلعاتكم' : 'Our journey with our partners starts with clear and deliberate steps to ensure the best results.' }}
                </p>
            </div>
            
            <!-- Desktop Layout (>= 1024px: Winding Curve Roadmap) -->
            <div class="hidden lg:block lg:h-[540px] xl:h-[620px] relative w-full max-w-[1240px] mx-auto pt-6 pb-12">
                <!-- Desktop Winding Connectors Layer -->
                <div class="absolute inset-0 w-full h-full pointer-events-none z-10 rtl:-scale-x-100 origin-center">
                    <svg class="w-full h-full text-secondary" viewBox="0 0 1000 520" fill="none" preserveAspectRatio="none">
                        <!-- Custom Arrowhead Markers with orient auto and sequential fade -->
                        <defs>
                            <marker id="flow-arrow-1" viewBox="0 0 12 12" refX="9" refY="6" markerWidth="9" markerHeight="9" orient="auto">
                                <path d="M 1 2 L 10 6 L 1 10 L 4 6 Z" fill="#bf9448" class="arrow-anim-1" />
                            </marker>
                            <marker id="flow-arrow-2" viewBox="0 0 12 12" refX="9" refY="6" markerWidth="9" markerHeight="9" orient="auto">
                                <path d="M 1 2 L 10 6 L 1 10 L 4 6 Z" fill="#bf9448" class="arrow-anim-2" />
                            </marker>
                            <marker id="flow-arrow-3" viewBox="0 0 12 12" refX="9" refY="6" markerWidth="9" markerHeight="9" orient="auto">
                                <path d="M 1 2 L 10 6 L 1 10 L 4 6 Z" fill="#bf9448" class="arrow-anim-3" />
                            </marker>
                        </defs>

                        <!-- Path 1 (Node 1 border -> Node 2 border) -->
                        <path d="M 200,185 C 230,215 245,255 270,290" stroke="#bf9448" stroke-width="4.5" stroke-linecap="round" class="path-anim-1" marker-end="url(#flow-arrow-1)" />
                        
                        <!-- Path 2 (Node 2 border -> Loop -> Node 3 border) -->
                        <path d="M 430,280 C 475,245 520,165 485,190 C 455,220 465,325 510,285 C 530,260 540,225 545,190" stroke="#bf9448" stroke-width="4.5" stroke-linecap="round" class="path-anim-2" marker-end="url(#flow-arrow-2)" />
                        
                        <!-- Path 3 (Node 3 border -> Node 4 border) -->
                        <path d="M 700,185 C 730,215 760,255 790,295" stroke="#bf9448" stroke-width="4.5" stroke-linecap="round" class="path-anim-3" marker-end="url(#flow-arrow-3)" />
                    </svg>
                </div>

                @for($i=1; $i<=4; $i++)
                <div class="absolute z-20 @if($i == 1) start-0 top-[4%] cloud-float-1 @elseif($i == 2) start-[25%] top-[48%] cloud-float-2 @elseif($i == 3) start-[51%] top-[6%] cloud-float-3 @elseif($i == 4) end-0 top-[50%] cloud-float-4 @endif" data-aos="zoom-in" data-aos-delay="{{ $i * 150 }}">
                    <!-- Desktop Cloud Node -->
                    <div class="w-[220px] h-[205px] lg:w-[230px] lg:h-[215px] xl:w-[275px] xl:h-[250px] 2xl:w-[288px] 2xl:h-[256px] glass-card flex flex-col items-center justify-center text-center p-4 lg:p-5 xl:p-7 relative group hover:border-secondary transition-all duration-500 shadow-2xl shadow-black/80 bg-[#101b2d]/95 backdrop-blur-xl border border-white/15 hover:scale-105 cursor-pointer cloud-shape-{{ $i }}">
                        <!-- Step Badge -->
                        <div class="absolute -top-3 bg-secondary text-dark text-xs font-bold px-3.5 py-1 rounded-full shadow-lg uppercase tracking-wider">
                            {{ app()->getLocale() == 'ar' ? 'الخطوة' : 'Step' }} 0{{ $i }}
                        </div>

                        <!-- Icon Container -->
                        <div class="w-12 h-12 lg:w-13 lg:h-13 xl:w-16 xl:h-16 rounded-full bg-secondary/10 border border-secondary/20 flex items-center justify-center text-secondary mb-3 xl:mb-4 group-hover:bg-secondary group-hover:text-dark group-hover:scale-110 transition-all duration-300">
                            @if($i == 1)
                            <!-- Chat/Meeting Icon -->
                            <svg class="w-6 h-6 xl:w-8 xl:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            @elseif($i == 2)
                            <!-- Proposal/Document Icon -->
                            <svg class="w-6 h-6 xl:w-8 xl:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            @elseif($i == 3)
                            <!-- Handshake/Agreement Icon -->
                            <svg class="w-6 h-6 xl:w-8 xl:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            @elseif($i == 4)
                            <!-- Report/Followup Icon -->
                            <svg class="w-6 h-6 xl:w-8 xl:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            @endif
                        </div>

                        <!-- Title -->
                        <h4 class="text-xs sm:text-sm xl:text-base font-bold text-white mb-0 group-hover:text-secondary transition-colors px-2 leading-relaxed max-w-[180px] xl:max-w-[220px]">
                            {{ __('app.journey_'.$i) }}
                        </h4>
                    </div>
                </div>
                @endfor
            </div>

            <!-- Mobile & Tablet Layout (< 1024px: Vertical Flow with Animated Arrows) -->
            <div class="lg:hidden max-w-md sm:max-w-lg mx-auto flex flex-col items-center gap-0 relative px-2">
                @for($i=1; $i<=4; $i++)
                <div class="w-full flex flex-col items-center" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <!-- Mobile Card -->
                    <div class="w-full max-w-[290px] sm:max-w-xs h-auto min-h-[190px] glass-card flex flex-col items-center justify-center text-center p-6 relative group hover:border-secondary transition-all duration-300 shadow-2xl shadow-black/80 bg-[#101b2d]/95 backdrop-blur-xl border border-white/15 cloud-shape-{{ $i }}">
                        <!-- Step Badge -->
                        <div class="absolute -top-3 bg-secondary text-dark text-xs sm:text-sm font-bold px-3.5 py-1 rounded-full shadow-lg uppercase tracking-wider">
                            {{ app()->getLocale() == 'ar' ? 'الخطوة' : 'Step' }} 0{{ $i }}
                        </div>

                        <!-- Icon Container -->
                        <div class="w-14 h-14 rounded-full bg-secondary/10 border border-secondary/20 flex items-center justify-center text-secondary mb-4 group-hover:bg-secondary group-hover:text-dark transition-all duration-300">
                            @if($i == 1)
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            @elseif($i == 2)
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            @elseif($i == 3)
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            @elseif($i == 4)
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            @endif
                        </div>

                        <!-- Title -->
                        <h4 class="text-sm sm:text-base font-bold text-white mb-0 group-hover:text-secondary transition-colors px-3 leading-relaxed max-w-[220px]">
                            {{ __('app.journey_'.$i) }}
                        </h4>
                    </div>

                    <!-- Animated Downward Connector Arrow between steps -->
                    @if($i < 4)
                    <div class="flex flex-col items-center my-3.5 h-12 w-8 relative z-0">
                        <svg class="w-full h-full text-secondary" viewBox="0 0 24 48" fill="none">
                            <defs>
                                <marker id="flow-arrow-m-{{ $i }}" viewBox="0 0 12 12" refX="6" refY="9" markerWidth="6" markerHeight="6" orient="auto">
                                    <path d="M 1 2 L 6 10 L 11 2 L 6 5 Z" fill="#bf9448" class="arrow-anim-{{ $i }}" />
                                </marker>
                            </defs>
                            <path d="M 12,0 L 12,38" stroke="#bf9448" stroke-width="3.5" stroke-dasharray="5 4" class="path-anim-{{ $i }}" marker-end="url(#flow-arrow-m-{{ $i }})" />
                        </svg>
                    </div>
                    @endif
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Target Sectors -->
    <section id="sectors" class="py-24 relative border-t border-white/5 bg-black/40">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ __('app.target_sectors_title') }}</h2>
                <div class="w-24 h-1 bg-secondary mx-auto mb-6"></div>
                <p class="text-gray-400 text-lg">{{ __('app.target_sectors_desc') }}</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @for($i=1; $i<=4; $i++)
                <div class="glass-card p-6 text-center group glass-card-hover" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <h4 class="text-xl font-bold text-secondary mb-3">{{ __('app.sector_'.$i) }}</h4>
                    <p class="text-gray-400 text-sm">{{ __('app.sector_'.$i.'_desc') }}</p>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Social Responsibility -->
    <section id="social" class="py-24 relative border-t border-white/5">
        <div class="container mx-auto px-6 relative z-10 text-center max-w-4xl" data-aos="zoom-in">
            <div class="w-20 h-20 rounded-full bg-secondary/10 flex items-center justify-center text-secondary mx-auto mb-8">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">{{ __('app.social_responsibility_title') }}</h2>
            <p class="text-gray-200 text-lg sm:text-xl md:text-2xl leading-relaxed font-light">{{ __('app.social_responsibility_desc') }}</p>
        </div>
    </section>

    <!-- International Presence Section -->
    <section id="international_presence" class="py-24 relative border-t border-white/5 bg-black/20">
        <div class="container mx-auto px-6 relative z-10">
            <div class="mb-8 md:mb-12 text-center md:text-start" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ __('app.international_presence') }}</h2>
                <div class="w-24 h-1 bg-secondary mx-auto md:mx-0"></div>
            </div>

            <div class="glass-card p-2 sm:p-4 md:p-10 mb-8 md:mb-12 relative overflow-hidden bg-gradient-to-b from-[#132035]/95 via-[#0e1828]/95 to-[#09101d]/95 border border-secondary/25 shadow-2xl" id="interactive-map-wrapper" data-aos="zoom-in" data-aos-delay="100">
                <div id="interactive-map" class="w-full h-[300px] sm:h-[400px] md:h-[500px] mx-auto" style="direction: ltr;"></div>
                
                <!-- Custom Pointer with Label -->
                <div id="map-pointer-pin" style="position: absolute; transform: translate(-50%, -100%); opacity: 0; pointer-events: none; z-index: 10; transition: opacity 0.3s ease; display: flex; flex-direction: column; align-items: center;">
                    <div id="map-pointer-label" style="background-color: #333; color: #fff; padding: 4px 10px; border-radius: 4px; font-size: 13px; margin-bottom: 2px; white-space: nowrap; font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);"></div>
                    <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 384 512' fill='%23bf9448'><path d='M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z'/></svg>" style="width: 24px; height: 24px;">
                </div>
            </div>

            <div class="flex flex-col items-center gap-6 md:gap-10 international-flags-interactive" data-aos="fade-up" data-aos-delay="150">
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
                    
                    /* Force 100% perfect geometric circles for flags */
                    .flag-circle-wrapper {
                        width: 52px !important;
                        height: 52px !important;
                        min-width: 52px !important;
                        min-height: 52px !important;
                        max-width: 52px !important;
                        max-height: 52px !important;
                        border-radius: 50% !important;
                        overflow: hidden !important;
                        aspect-ratio: 1 / 1 !important;
                        box-sizing: border-box !important;
                        display: flex !important;
                        align-items: center !important;
                        justify-content: center !important;
                        border: 1.5px solid rgba(255, 255, 255, 0.15) !important;
                        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.4) !important;
                        flex-shrink: 0 !important;
                    }
                    .flag-circle-wrapper .fi {
                        width: 100% !important;
                        height: 100% !important;
                        border-radius: 50% !important;
                        display: block !important;
                        background-size: cover !important;
                        background-position: center !important;
                        margin: 0 !important;
                        padding: 0 !important;
                    }
                    .flag-circle-wrapper .fi::before {
                        display: none !important;
                        content: "" !important;
                    }
                    @media (max-width: 768px) {
                        .flag-circle-wrapper {
                            width: 42px !important;
                            height: 42px !important;
                            min-width: 42px !important;
                            min-height: 42px !important;
                            max-width: 42px !important;
                            max-height: 42px !important;
                        }
                    }
                </style>
                
                <!-- Flags Container -->
                <div class="text-center mb-10">
                    <p class="text-gray-300 text-lg md:text-xl max-w-5xl mx-auto">{{ app()->getLocale() == 'ar' ? 'تواجدنا في العديد من المناطق والدول حول العالم لتقديم خدمات الاستشارات التواصلية وتنفيذ حملات العلاقات العامة والاتصال' : 'Our presence in many regions and countries around the world to provide communication consulting services and execute PR and communication campaigns' }}</p>
                </div>
                <div class="flex flex-wrap justify-center gap-4 md:gap-8 lg:gap-10">
                    @foreach($countries as $index => $country)
                    <div class="flag-item flex flex-col items-center justify-center gap-2 cursor-pointer transition-transform duration-300 w-[52px] sm:w-[60px] md:w-[65px] lg:w-[75px]" data-country="{{ $country['code'] }}" data-aos="zoom-in" data-aos-delay="{{ 100 + $index * 50 }}">
                        <div class="flag-circle-wrapper">
                            <span class="fi fi-{{ $country['code'] }} fis"></span>
                        </div>
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
        <div class="container mx-auto px-6 relative z-10 mb-12 text-center md:text-start" data-aos="fade-up">
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
        
        <div class="flex flex-col gap-16 direction-ltr" dir="ltr" data-aos="fade-up" data-aos-delay="100">
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
                <div data-aos="fade-up">
                    <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ __('app.contact') }}</h2>
                    <div class="w-24 h-1 bg-secondary mb-6"></div>
                    <p class="text-gray-400 text-lg mb-8">{{ __('app.contact_description') }}</p>
                    
                    <div class="glass-card p-8 space-y-6" data-aos="fade-up" data-aos-delay="100">
                        <!-- Damascus Address -->
                        <a href="https://maps.app.goo.gl/7X6bsdDjMtLcyUTX8" target="_blank" class="flex items-center gap-4 group hover:opacity-85 transition-opacity">
                            <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center text-secondary shrink-0 group-hover:bg-secondary/20 transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold mb-0 group-hover:text-secondary transition-colors">{{ app()->getLocale() == 'ar' ? 'دمشق' : 'Damascus' }}</h4>
                                <p class="text-gray-400 text-sm mb-0">{{ __('app.address3') }}</p>
                            </div>
                        </a>
                        
                        <!-- Riyadh Address -->
                        <a href="https://maps.app.goo.gl/xHnvG29ScCekNrB49?g_st=iw" target="_blank" class="flex items-center gap-4 group hover:opacity-85 transition-opacity">
                            <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center text-secondary shrink-0 group-hover:bg-secondary/20 transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold mb-0 group-hover:text-secondary transition-colors">{{ app()->getLocale() == 'ar' ? 'الرياض' : 'Riyadh' }}</h4>
                                <p class="text-gray-400 text-sm mb-0">{{ __('app.address') }}</p>
                            </div>
                        </a>

                        <!-- Dubai Address -->
                        <a href="https://maps.app.goo.gl/8Dqt6aswsQbeySEt5?g_st=iw" target="_blank" class="flex items-center gap-4 group hover:opacity-85 transition-opacity">
                            <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center text-secondary shrink-0 group-hover:bg-secondary/20 transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold mb-0 group-hover:text-secondary transition-colors">{{ app()->getLocale() == 'ar' ? 'دبي' : 'Dubai' }}</h4>
                                <p class="text-gray-400 text-sm mb-0">{{ __('app.address2') }}</p>
                            </div>
                        </a>

                        <!-- Phone -->
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center text-secondary shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold mb-1">{{ app()->getLocale() == 'ar' ? 'الهاتف' : 'Phone' }}</h4>
                                <a href="tel:+963943777056" class="block text-gray-400 hover:text-secondary text-sm transition-colors" dir="ltr">+963 943 777 056</a>
                                <a href="tel:+966506123777" class="block text-gray-400 hover:text-secondary text-sm transition-colors" dir="ltr">+966 506 123 777</a>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center text-secondary shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold mb-1">{{ app()->getLocale() == 'ar' ? 'البريد الإلكتروني' : 'Email' }}</h4>
                                <a href="mailto:info@jwc.sa" class="block text-gray-400 hover:text-secondary text-sm transition-colors">info@jwc.sa</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-8" data-aos="fade-up" data-aos-delay="200">
                    <form id="main-contact-form" action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                        @csrf
                        <div id="contact-form-alert" class="hidden p-4 rounded-xl text-sm font-semibold transition-all"></div>

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
                        <button type="submit" id="contact-submit-btn" class="w-full py-4 rounded-xl bg-secondary text-dark font-bold hover:bg-white hover:shadow-[0_0_20px_rgba(191,148,72,0.4)] transition-all duration-300 flex items-center justify-center gap-2">
                            <span id="contact-submit-text">{{ __('app.send_message') }}</span>
                            <svg id="contact-submit-spinner" class="hidden animate-spin h-5 w-5 text-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
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

                // Refresh AOS so animations trigger on new tab items
                if (window.AOS) {
                    setTimeout(() => {
                        window.AOS.refresh();
                    }, 50);
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

        // Sync active tab with URL hash if present
        function syncTabFromHash() {
            const h = window.location.hash;
            if (!h) return;
            let targetTab = null;
            if (h === '#pillar-1' || h === '#administrative') targetTab = 'pillar-1';
            else if (h === '#pillar-2' || h === '#media') targetTab = 'pillar-2';
            else if (h === '#pillar-3' || h === '#financial') targetTab = 'pillar-3';
            
            if (targetTab) {
                const btn = document.querySelector(`[data-tab="${targetTab}"]`);
                if (btn) btn.click();
            }

            if (h === '#services' || targetTab) {
                const servicesSec = document.getElementById('services') || document.getElementById('services-tabs');
                if (servicesSec) {
                    setTimeout(() => {
                        const nav = document.querySelector('header') || document.querySelector('nav');
                        const navH = nav ? nav.offsetHeight : 80;
                        const topPos = servicesSec.getBoundingClientRect().top + window.pageYOffset - navH - 20;
                        window.scrollTo({ top: topPos, behavior: 'smooth' });
                    }, 150);
                }
            }
        }
        syncTabFromHash();
        window.addEventListener('hashchange', syncTabFromHash);

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
                    initial: { 
                        fill: '#243b61', 
                        fillOpacity: 1,
                        stroke: '#3b5885', 
                        strokeWidth: 0.6 
                    },
                    hover: { 
                        fill: '#bf9448', 
                        fillOpacity: 1 
                    }
                },
                markers: markers,
                markerStyle: {
                    initial: { fill: '#bf9448', r: 6, stroke: '#ffffff', strokeWidth: 2, strokeOpacity: 0.95 },
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

        // Contact Form AJAX Handler
        const contactForm = document.getElementById('main-contact-form');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const form = this;
                const submitBtn = document.getElementById('contact-submit-btn');
                const submitText = document.getElementById('contact-submit-text');
                const submitSpinner = document.getElementById('contact-submit-spinner');
                const alertBox = document.getElementById('contact-form-alert');

                // Set loading state
                if (submitBtn) submitBtn.disabled = true;
                if (submitSpinner) submitSpinner.classList.remove('hidden');
                if (submitText) submitText.innerText = "{{ app()->getLocale() == 'en' ? 'Sending...' : 'جاري الإرسال...' }}";
                if (alertBox) {
                    alertBox.classList.add('hidden');
                    alertBox.className = 'hidden p-4 rounded-xl text-sm font-semibold transition-all';
                    alertBox.innerHTML = '';
                }

                const formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alertBox.className = 'p-4 rounded-xl text-sm font-semibold bg-green-500/20 border border-green-500/40 text-green-300 transition-all';
                        alertBox.innerHTML = data.message || "{{ app()->getLocale() == 'en' ? 'Your message has been sent successfully. Thank you!' : 'تم إرسال رسالتك بنجاح. شكراً لك!' }}";
                        alertBox.classList.remove('hidden');
                        form.reset();
                    } else {
                        throw new Error(data.message || "{{ app()->getLocale() == 'en' ? 'Something went wrong. Please try again.' : 'عذراً، حدث خطأ ما. يرجى المحاولة مرة أخرى لاحقاً.' }}");
                    }
                })
                .catch(error => {
                    alertBox.className = 'p-4 rounded-xl text-sm font-semibold bg-red-500/20 border border-red-500/40 text-red-300 transition-all';
                    alertBox.innerHTML = error.message || "{{ app()->getLocale() == 'en' ? 'Something went wrong. Please try again.' : 'عذراً، حدث خطأ ما. يرجى المحاولة مرة أخرى لاحقاً.' }}";
                    alertBox.classList.remove('hidden');
                })
                .finally(() => {
                    if (submitBtn) submitBtn.disabled = false;
                    if (submitSpinner) submitSpinner.classList.add('hidden');
                    if (submitText) submitText.innerText = "{{ __('app.send_message') }}";
                });
            });
        }
    });
</script>
@endpush
