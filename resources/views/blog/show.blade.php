@extends('layout')

@section('page_title', $page_title . ' - ' . (app()->getLocale() == 'en' ? 'JWC Blog' : 'مدونة JWC'))

@section('content')
<!-- Article Header -->
<section class="relative pt-40 pb-20 lg:pt-56 lg:pb-32 overflow-hidden bg-gradient-to-br from-[#06121e] via-[#091a2a] to-[#0d2a40]">
    <div class="absolute inset-0 z-0 opacity-40">
        <div class="absolute top-0 right-0 w-[60vw] h-full bg-gradient-to-l from-[#133c5c] to-transparent transform -skew-x-12 translate-x-32"></div>
        <div class="absolute bottom-0 left-0 w-[50vw] h-[60vh] bg-gradient-to-t from-[#133c5c] to-transparent transform skew-y-12 -translate-x-32"></div>
    </div>
    <div class="container mx-auto px-6 relative z-10" data-aos="fade-up">
        <div class="max-w-4xl mx-auto text-center">
            @php
                $route = app()->getLocale() == 'en' ? 'blog.index_en' : 'blog.index';
            @endphp
            <a href="{{ route($route) }}" class="inline-flex items-center gap-2 text-secondary hover:text-white transition-colors mb-8 font-bold text-sm bg-secondary/10 px-4 py-2 rounded-full border border-secondary/20 hover:bg-secondary/20 group">
                <svg class="w-4 h-4 {{ app()->getLocale() == 'ar' ? 'rotate-180' : '' }} transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                {{ app()->getLocale() == 'en' ? 'Back to Blog' : 'العودة للمدونة' }}
            </a>
            
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-white mb-6 drop-shadow-lg leading-tight">{{ $blog->title }}</h1>
            
            <div class="flex items-center justify-center gap-4 text-gray-400 text-sm md:text-base font-medium">
                <div class="flex items-center gap-2 bg-white/5 px-4 py-2 rounded-full border border-white/10 backdrop-blur-sm">
                    <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <time datetime="{{ $blog->created_at->format('Y-m-d') }}" dir="ltr">{{ $blog->created_at->format('Y / m / d') }}</time>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-12 lg:py-20 relative z-10 -mt-28 lg:-mt-40">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <article class="bg-white/5 border border-white/10 backdrop-blur-2xl rounded-3xl shadow-2xl overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                @if($blog->image)
                    <div class="w-full h-64 md:h-[400px] lg:h-[500px] relative border-b border-white/10">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-dark/60 to-transparent"></div>
                    </div>
                @endif
                
                <div class="p-8 md:p-12 lg:p-16">
                    <div class="rich-text-content prose prose-invert prose-lg max-w-none">
                        @if(empty(trim(strip_tags($blog->content))))
                            <p class="text-gray-500 italic text-center">{{ app()->getLocale() == 'en' ? 'No content available.' : 'لا يوجد محتوى حالياً.' }}</p>
                        @else
                            {!! $blog->content !!}
                        @endif
                    </div>
                    
                    <!-- Share & Actions -->
                    <div class="mt-16 pt-8 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-6">
                        <div class="flex items-center gap-4 bg-white/5 px-6 py-3 rounded-full border border-white/10">
                            <span class="text-sm font-bold text-gray-400 uppercase tracking-wider">{{ app()->getLocale() == 'en' ? 'Share' : 'مشاركة' }}</span>
                            <div class="w-px h-4 bg-white/20 mx-2"></div>
                            <div class="flex gap-3">
                                <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ urlencode($blog->title) }}" target="_blank" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-black hover:text-white transition-colors hover:shadow-lg" title="X (Twitter)">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-[#1877F2] hover:text-white transition-colors hover:shadow-lg" title="Facebook">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($blog->title . ' ' . url()->current()) }}" target="_blank" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-[#25D366] hover:text-white transition-colors hover:shadow-lg flex-shrink-0" title="WhatsApp">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.964 9.964 0 001.333 4.993L2 22l5.233-1.237a9.994 9.994 0 004.779 1.216h.004c5.505 0 9.988-4.478 9.989-9.984 0-2.669-1.037-5.176-2.922-7.062A9.935 9.935 0 0012.012 2zM12.012 20.256h-.004a8.318 8.318 0 01-4.24-1.155l-.303-.18-3.147.744.825-3.072-.198-.314a8.272 8.272 0 01-1.278-4.471c0-4.582 3.73-8.314 8.318-8.314 2.221 0 4.307.865 5.877 2.435a8.261 8.261 0 012.434 5.882c-.001 4.583-3.73 8.315-8.318 8.315zm4.564-6.236c-.25-.125-1.482-.731-1.712-.814-.23-.083-.398-.125-.566.125-.167.25-.648.814-.794.981-.146.167-.292.188-.542.063-.25-.125-1.058-.39-2.016-1.246-.745-.666-1.25-1.488-1.396-1.738-.146-.25-.015-.385.11-.51.112-.112.25-.292.375-.438.125-.146.167-.25.25-.417.083-.167.042-.313-.021-.438-.063-.125-.566-1.365-.776-1.868-.204-.492-.41-.425-.566-.433-.146-.007-.313-.007-.48-.007s-.438.063-.667.313c-.23.25-.875.855-.875 2.085s.896 2.418 1.021 2.585c.125.167 1.76 2.688 4.261 3.768.596.257 1.06.411 1.423.526.598.19 1.141.163 1.57.099.479-.072 1.482-.605 1.692-1.19.21-.585.21-1.085.146-1.19-.062-.105-.229-.167-.479-.292z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Related Posts -->
@if($randomBlogs->count() > 0)
<section class="py-20 relative bg-black/40 border-t border-white/5">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <h3 class="text-3xl font-bold text-white mb-4">{{ app()->getLocale() == 'en' ? 'You May Also Like' : 'مقالات قد تعجبك' }}</h3>
            <div class="w-16 h-1 bg-secondary mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @foreach($randomBlogs as $rBlog)
                @php
                    $rRoute = app()->getLocale() == 'en' ? 'blog.show_en' : 'blog.show';
                @endphp
                <article class="group bg-white/5 border border-white/10 backdrop-blur-md rounded-2xl overflow-hidden hover:-translate-y-2 hover:border-secondary/50 transition-all duration-500 flex flex-col h-full hover:shadow-[0_15px_30px_rgba(191,148,72,0.15)]" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <a href="{{ route($rRoute, $rBlog->slug) }}" class="block relative h-48 overflow-hidden">
                        @if($rBlog->image)
                            <img src="{{ asset('storage/' . $rBlog->image) }}" alt="{{ $rBlog->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @else
                            <div class="w-full h-full bg-white/5 flex items-center justify-center">
                                <svg class="w-12 h-12 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-dark/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </a>
                    
                    <div class="p-6 flex flex-col flex-grow relative z-10">
                        <h4 class="text-lg font-bold text-white mb-3 line-clamp-2 group-hover:text-secondary transition-colors duration-300">
                            <a href="{{ route($rRoute, $rBlog->slug) }}">{{ $rBlog->title }}</a>
                        </h4>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4 line-clamp-2 flex-grow">
                            {{ \Str::limit(strip_tags($rBlog->content), 80) }}
                        </p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

<style>
    /* Rich Text Content Styling for Dark Theme */
    .rich-text-content {
        color: #d1d5db;
        line-height: 2;
        font-size: 1.125rem;
    }
    
    .rich-text-content p {
        margin-bottom: 1.75rem;
    }
    
    .rich-text-content h1, 
    .rich-text-content h2, 
    .rich-text-content h3, 
    .rich-text-content h4, 
    .rich-text-content h5, 
    .rich-text-content h6 {
        color: #ffffff;
        font-weight: 700;
        margin-top: 3rem;
        margin-bottom: 1.25rem;
        line-height: 1.4;
    }
    
    .rich-text-content h1 { font-size: 2.25rem; }
    .rich-text-content h2 { font-size: 1.875rem; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 0.75rem; }
    .rich-text-content h3 { font-size: 1.5rem; color: #bf9448; }
    .rich-text-content h4 { font-size: 1.25rem; }
    
    .rich-text-content a {
        color: #bf9448;
        text-decoration: none;
        border-bottom: 1px dashed rgba(191,148,72,0.5);
        transition: all 0.3s ease;
    }
    
    .rich-text-content a:hover {
        color: #fff;
        border-bottom-color: #fff;
    }
    
    .rich-text-content ul, 
    .rich-text-content ol {
        margin-bottom: 1.75rem;
        padding-inline-start: 2rem;
    }
    
    .rich-text-content li {
        margin-bottom: 0.75rem;
    }
    
    .rich-text-content ul li {
        list-style-type: disc;
    }
    
    .rich-text-content ol li {
        list-style-type: decimal;
    }
    
    .rich-text-content ul li::marker,
    .rich-text-content ol li::marker {
        color: #bf9448;
        font-weight: bold;
    }
    
    .rich-text-content img {
        max-width: 100%;
        height: auto;
        border-radius: 1rem;
        margin: 2.5rem 0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        border: 1px solid rgba(255,255,255,0.1);
    }
    
    .rich-text-content blockquote {
        border-inline-start: 4px solid #bf9448;
        background: rgba(255,255,255,0.03);
        padding: 1.5rem 2rem;
        margin: 2.5rem 0;
        border-radius: 0.5rem;
        font-style: italic;
        color: #f3f4f6;
        box-shadow: inset 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .rich-text-content blockquote p:last-child {
        margin-bottom: 0;
    }
    
    .rich-text-content strong, 
    .rich-text-content b {
        color: #ffffff;
        font-weight: 700;
    }
    
    .rich-text-content iframe {
        max-width: 100%;
        border-radius: 1rem;
        margin: 2.5rem 0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }
    
    .rich-text-content table {
        width: 100%;
        margin-bottom: 2rem;
        border-collapse: collapse;
    }
    
    .rich-text-content th,
    .rich-text-content td {
        border: 1px solid rgba(255,255,255,0.1);
        padding: 1rem;
    }
    
    .rich-text-content th {
        background: rgba(255,255,255,0.05);
        color: white;
    }
    
    /* Override inline styles from editors that ruin dark mode */
    .rich-text-content [style*="color:"] {
        color: inherit !important;
    }
    .rich-text-content [style*="background-color:"] {
        background-color: transparent !important;
    }
    .rich-text-content [style*="background:"] {
        background: transparent !important;
    }
</style>
@endsection
