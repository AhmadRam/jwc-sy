<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page_title')</title>
    <meta name="description" content="@yield('meta_description', __('app.meta_description'))">
    <meta name="keywords" content="@yield('meta_keywords', __('app.meta_keywords'))">
    <meta name="author" content="JWC Syria">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('page_title')">
    <meta property="og:description" content="@yield('meta_description', __('app.meta_description'))">
    <meta property="og:image" content="@yield('og_image', vasset('assets/img/og-image.jpg'))">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:locale" content="{{ app()->getLocale() == 'ar' ? 'ar_SY' : 'en_US' }}">
    @yield('extra_og_tags')

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('page_title')">
    <meta name="twitter:description" content="@yield('meta_description', __('app.meta_description'))">
    <meta name="twitter:image" content="@yield('og_image', vasset('assets/img/og-image.jpg'))">

    <!-- Favicons -->
    <link href="{{ vasset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ vasset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    
    <!-- Map CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap/dist/css/jsvectormap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css">

    <!-- Vite Assets (Tailwind CSS & JS) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dark text-white font-sans antialiased selection:bg-secondary/30 selection:text-white">
    <!-- Main Background Effects -->
    <div class="fixed inset-0 z-[-1] pointer-events-none overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-primary/10 to-transparent"></div>
        <div class="absolute top-[-20%] right-[-10%] w-[80vw] h-[80vw] bg-primary/10 rounded-full blur-[120px] opacity-30"></div>
        <div class="absolute bottom-[0%] left-[-10%] w-[60vw] h-[60vw] bg-secondary/10 rounded-full blur-[100px] opacity-20"></div>
    </div>

    <!-- Header / Navbar -->
    <nav class="fixed w-full z-50 top-0 left-0 right-0 transition-all duration-500 py-3 md:py-4 bg-dark/80 backdrop-blur-md border-b border-white/10">
        <div class="container mx-auto px-4 sm:px-6 flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ app()->getLocale() == 'ar' ? route('index') : route('index_en') }}" class="relative z-50 group shrink-0">
                <img src="{{ vasset('assets/img/logo.png') }}" alt="JWC Logo" class="h-10 sm:h-12 md:h-14 lg:h-16 w-auto object-contain transition-transform duration-300 group-hover:scale-105 drop-shadow-[0_0_10px_rgba(191,148,72,0.3)]">
            </a>

            <!-- Desktop Menu (visible on screens >= 1150px / xl) -->
            <div class="hidden xl:flex items-center bg-white/5 backdrop-blur-md rounded-full px-3.5 py-2.5 border border-white/10 shadow-xl max-w-full">
                <ul class="flex gap-3 2xl:gap-5 items-center m-0 p-0 list-none text-xs 2xl:text-sm whitespace-nowrap w-full justify-between">
                    <li><a href="/{{ app()->getLocale() }}#hero" class="text-white/80 hover:text-white transition-all font-medium relative group py-1.5">{{ __('app.home') }}<span class="absolute bottom-0 left-0 w-full h-[2px] bg-secondary transition-all duration-300 scale-x-0 opacity-0 group-hover:scale-x-100 group-hover:opacity-100 origin-right"></span></a></li>
                    <li><a href="/{{ app()->getLocale() }}#about" class="text-white/80 hover:text-white transition-all font-medium relative group py-1.5">{{ __('app.about') }}<span class="absolute bottom-0 left-0 w-full h-[2px] bg-secondary transition-all duration-300 scale-x-0 opacity-0 group-hover:scale-x-100 group-hover:opacity-100 origin-right"></span></a></li>
                    <li><a href="/{{ app()->getLocale() }}#services" class="text-white/80 hover:text-white transition-all font-medium relative group py-1.5">{{ __('app.services') }}<span class="absolute bottom-0 left-0 w-full h-[2px] bg-secondary transition-all duration-300 scale-x-0 opacity-0 group-hover:scale-x-100 group-hover:opacity-100 origin-right"></span></a></li>
                    <li><a href="/{{ app()->getLocale() }}#why_us" class="text-white/80 hover:text-white transition-all font-medium relative group py-1.5">{{ __('app.nav_why') }}<span class="absolute bottom-0 left-0 w-full h-[2px] bg-secondary transition-all duration-300 scale-x-0 opacity-0 group-hover:scale-x-100 group-hover:opacity-100 origin-right"></span></a></li>
                    <li><a href="/{{ app()->getLocale() }}#methodology" class="text-white/80 hover:text-white transition-all font-medium relative group py-1.5">{{ __('app.nav_methodology') }}<span class="absolute bottom-0 left-0 w-full h-[2px] bg-secondary transition-all duration-300 scale-x-0 opacity-0 group-hover:scale-x-100 group-hover:opacity-100 origin-right"></span></a></li>
                    <li><a href="/{{ app()->getLocale() }}#sectors" class="text-white/80 hover:text-white transition-all font-medium relative group py-1.5">{{ __('app.nav_sectors') }}<span class="absolute bottom-0 left-0 w-full h-[2px] bg-secondary transition-all duration-300 scale-x-0 opacity-0 group-hover:scale-x-100 group-hover:opacity-100 origin-right"></span></a></li>
                    <li><a href="/{{ app()->getLocale() }}#international_presence" class="text-white/80 hover:text-white transition-all font-medium relative group py-1.5">{{ __('app.international_presence') }}<span class="absolute bottom-0 left-0 w-full h-[2px] bg-secondary transition-all duration-300 scale-x-0 opacity-0 group-hover:scale-x-100 group-hover:opacity-100 origin-right"></span></a></li>
                    <li><a href="/{{ app()->getLocale() }}#clients" class="text-white/80 hover:text-white transition-all font-medium relative group py-1.5">{{ __('app.clients') }}<span class="absolute bottom-0 left-0 w-full h-[2px] bg-secondary transition-all duration-300 scale-x-0 opacity-0 group-hover:scale-x-100 group-hover:opacity-100 origin-right"></span></a></li>
                    <li><a href="{{ app()->getLocale() == 'en' ? route('blog.index_en') : route('blog.index') }}" class="text-white/80 hover:text-white transition-all font-medium relative group py-1.5 {{ request()->routeIs('blog.*') ? 'text-white font-bold' : '' }}">{{ app()->getLocale() == 'en' ? 'Blog' : 'المدونة' }}<span class="absolute bottom-0 left-0 w-full h-[2px] bg-secondary transition-all duration-300 scale-x-0 opacity-0 group-hover:scale-x-100 group-hover:opacity-100 origin-right"></span></a></li>
                </ul>
            </div>

            <!-- Actions -->
            <div class="hidden xl:flex items-center gap-3 shrink-0">
                <a href="/{{ app()->getLocale() == 'ar' ? str_replace('ar', 'en', request()->path()) : str_replace('en', 'ar', request()->path()) }}" class="px-3.5 py-1.5 rounded-full bg-white/5 border border-white/10 text-white text-xs font-bold hover:bg-secondary/20 hover:border-secondary transition-all duration-300">{{ __('app.language') }}</a>
                <a href="/{{ app()->getLocale() }}#contact" class="px-5 py-2 rounded-full bg-secondary text-dark text-xs xl:text-sm font-bold hover:bg-white hover:shadow-[0_0_15px_rgba(191,148,72,0.5)] transition-all duration-300">{{ __('app.contact') }}</a>
            </div>

            <!-- Mobile & Tablet Menu Toggle -->
            <button id="mobile-menu-toggle" onclick="toggleMobileMenu()" class="xl:hidden text-white z-50 p-2 focus:outline-none" aria-label="Toggle navigation">
                <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>
        </div>
    </nav>

    <!-- Mobile & Tablet Menu Overlay -->
    <div id="mobile-menu" class="fixed inset-0 z-40 hidden bg-dark/98 backdrop-blur-xl flex-col justify-center items-center overflow-y-auto py-20 px-6">
        <ul class="flex flex-col gap-5 sm:gap-6 items-center text-lg sm:text-xl list-none p-0 m-0 w-full max-w-sm text-center">
            <li><a href="/{{ app()->getLocale() }}#hero" class="text-white/90 hover:text-secondary font-medium transition-colors py-1 block" onclick="toggleMobileMenu()">{{ __('app.home') }}</a></li>
            <li><a href="/{{ app()->getLocale() }}#about" class="text-white/90 hover:text-secondary font-medium transition-colors py-1 block" onclick="toggleMobileMenu()">{{ __('app.about') }}</a></li>
            <li><a href="/{{ app()->getLocale() }}#services" class="text-white/90 hover:text-secondary font-medium transition-colors py-1 block" onclick="toggleMobileMenu()">{{ __('app.services') }}</a></li>
            <li><a href="/{{ app()->getLocale() }}#why_us" class="text-white/90 hover:text-secondary font-medium transition-colors py-1 block" onclick="toggleMobileMenu()">{{ __('app.nav_why') }}</a></li>
            <li><a href="/{{ app()->getLocale() }}#methodology" class="text-white/90 hover:text-secondary font-medium transition-colors py-1 block" onclick="toggleMobileMenu()">{{ __('app.nav_methodology') }}</a></li>
            <li><a href="/{{ app()->getLocale() }}#sectors" class="text-white/90 hover:text-secondary font-medium transition-colors py-1 block" onclick="toggleMobileMenu()">{{ __('app.nav_sectors') }}</a></li>
            <li><a href="/{{ app()->getLocale() }}#international_presence" class="text-white/90 hover:text-secondary font-medium transition-colors py-1 block" onclick="toggleMobileMenu()">{{ __('app.international_presence') }}</a></li>
            <li><a href="/{{ app()->getLocale() }}#clients" class="text-white/90 hover:text-secondary font-medium transition-colors py-1 block" onclick="toggleMobileMenu()">{{ __('app.clients') }}</a></li>
            <li><a href="{{ app()->getLocale() == 'en' ? route('blog.index_en') : route('blog.index') }}" class="text-white/90 hover:text-secondary font-medium transition-colors py-1 block" onclick="toggleMobileMenu()">{{ app()->getLocale() == 'en' ? 'Blog' : 'المدونة' }}</a></li>
            <li class="mt-4 pt-4 border-t border-white/10 w-full flex flex-col sm:flex-row gap-3 justify-center items-center">
                <a href="/{{ app()->getLocale() == 'ar' ? str_replace('ar', 'en', request()->path()) : str_replace('en', 'ar', request()->path()) }}" class="w-full sm:w-auto px-6 py-2.5 rounded-full bg-white/5 border border-white/10 text-white text-sm font-bold hover:bg-secondary/20 hover:border-secondary transition-all duration-300 text-center" onclick="toggleMobileMenu()">{{ __('app.language') }}</a>
                <a href="/{{ app()->getLocale() }}#contact" class="w-full sm:w-auto px-6 py-2.5 rounded-full bg-secondary text-dark text-sm font-bold hover:bg-white hover:shadow-[0_0_15px_rgba(191,148,72,0.5)] transition-all duration-300 text-center" onclick="toggleMobileMenu()">{{ __('app.contact') }}</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-primary/20 border-t border-white/10 pt-16 pb-8 mt-24">
        <div class="container mx-auto px-6">
            <!-- Brand & Social (Centered) -->
            <div class="max-w-2xl mx-auto text-center mb-12">
                <img src="{{ vasset('assets/img/logo.png') }}" alt="JWC" class="h-12 w-auto mb-6 mx-auto">
                <p class="text-gray-400 text-sm leading-relaxed mb-6">{{ __('app.footer_description') }}</p>
                <div class="flex gap-4 md:gap-5 justify-center items-center flex-wrap">
                    <!-- X (Twitter) -->
                    <a href="https://x.com/jwc_sy" target="_blank" class="w-12 h-12 rounded-full bg-secondary/20 flex items-center justify-center text-secondary hover:bg-secondary hover:text-dark hover:scale-110 transition-all duration-300" title="X (Twitter)">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/company/jwc-sy.com/" target="_blank" class="w-12 h-12 rounded-full bg-secondary/20 flex items-center justify-center text-secondary hover:bg-secondary hover:text-dark hover:scale-110 transition-all duration-300" title="LinkedIn">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 8.76c.99 0 1.8-.81 1.8-1.8s-.81-1.8-1.8-1.8-1.8.81-1.8 1.8.81 1.8 1.8 1.8m1.39 9.74v-8.37H5.07v8.37h2.78z"/></svg>
                    </a>
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/profile.php?id=61593169214593" target="_blank" class="w-12 h-12 rounded-full bg-secondary/20 flex items-center justify-center text-secondary hover:bg-secondary hover:text-dark hover:scale-110 transition-all duration-300" title="Facebook">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <!-- WhatsApp -->
                    <a href="https://wa.me/966506123777" target="_blank" class="w-12 h-12 rounded-full bg-secondary/20 flex items-center justify-center text-secondary hover:bg-secondary hover:text-dark hover:scale-110 transition-all duration-300" title="WhatsApp">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 1.856.001 3.598.723 4.907 2.034 1.31 1.311 2.031 3.054 2.03 4.908-.001 3.825-3.113 6.938-6.937 6.938z"/></svg>
                    </a>
                </div>
            </div>

            {{-- 
            <!-- Contact -->
            <div class="text-center md:text-start">
                <h4 class="text-lg font-bold text-white mb-6">{{ app()->getLocale() == 'ar' ? 'تواصل معنا' : 'Contact Us' }}</h4>
                <ul class="space-y-4 text-gray-400 text-sm">
                    <li class="flex items-center justify-center md:justify-start gap-3">
                        <span class="w-8 h-8 rounded-full bg-secondary/20 flex items-center justify-center text-secondary">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </span>
                        <a href="tel:+963943777056" class="hover:text-secondary transition-colors" dir="ltr">+963 943 777 056</a>
                    </li>
                    <li class="flex items-center justify-center md:justify-start gap-3">
                        <span class="w-8 h-8 rounded-full bg-secondary/20 flex items-center justify-center text-secondary">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </span>
                        <a href="tel:+966506123777" class="hover:text-secondary transition-colors" dir="ltr">+966 506 123 777</a>
                    </li>
                    <li class="flex items-center justify-center md:justify-start gap-3">
                        <span class="w-8 h-8 rounded-full bg-secondary/20 flex items-center justify-center text-secondary">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </span>
                        <a href="mailto:info@jwc.sa" class="hover:text-secondary transition-colors">info@jwc.sa</a>
                    </li>
                </ul>
            </div>

            <!-- Locations -->
            <div class="text-center md:text-start">
                <h4 class="text-lg font-bold text-white mb-6">{{ app()->getLocale() == 'ar' ? 'فروعنا' : 'Our Locations' }}</h4>
                <ul class="flex flex-col gap-4 m-0 p-0 list-none">
                    <li class="flex items-start justify-center md:justify-start gap-3">
                        <span class="w-8 h-8 rounded-full bg-secondary/20 flex items-center justify-center text-secondary shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </span>
                        <a href="https://maps.app.goo.gl/7X6bsdDjMtLcyUTX8" target="_blank" class="text-white/80 text-sm hover:text-secondary transition-colors">{{ __('app.address3') }}</a>
                    </li>
                    <li class="flex items-start justify-center md:justify-start gap-3">
                        <span class="w-8 h-8 rounded-full bg-secondary/20 flex items-center justify-center text-secondary shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </span>
                        <a href="https://maps.app.goo.gl/xHnvG29ScCekNrB49?g_st=iw" target="_blank" class="text-white/80 text-sm hover:text-secondary transition-colors">{{ __('app.address') }}</a>
                    </li>
                    <li class="flex items-start justify-center md:justify-start gap-3">
                        <span class="w-8 h-8 rounded-full bg-secondary/20 flex items-center justify-center text-secondary shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </span>
                        <a href="https://maps.app.goo.gl/8Dqt6aswsQbeySEt5?g_st=iw" target="_blank" class="text-white/80 text-sm hover:text-secondary transition-colors">{{ __('app.address2') }}</a>
                    </li>
                </ul>
            </div>
            --}}

            <!-- Copyright -->
            <div class="border-t border-white/10 pt-8 mt-8 text-center text-sm text-gray-500">
                <p>{{ __('app.all_rights_reserved') }} <strong class="text-secondary">JWC Syria</strong> © 2026</p>
            </div>
        </div>
    </footer>

    <!-- Map JS -->
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap/dist/maps/world.js"></script>

    @stack('modals')
    @stack('scripts')

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const toggleBtn = document.getElementById('mobile-menu-toggle');
            const isHidden = menu.classList.contains('hidden');
            
            if (isHidden) {
                menu.classList.remove('hidden');
                menu.classList.add('flex');
                document.body.classList.add('overflow-hidden');
                toggleBtn.innerHTML = `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>`;
            } else {
                menu.classList.remove('flex');
                menu.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
                toggleBtn.innerHTML = `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>`;
            }
        }
    </script>
</body>
</html>
