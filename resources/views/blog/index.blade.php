@extends('layout')

@section('page_title', app()->getLocale() == 'en' ? 'Blog - JWC' : 'المدونة - JWC')

@section('content')
<!-- Hero Section -->
<section class="relative pt-40 pb-20 lg:pt-56 lg:pb-32 overflow-hidden bg-gradient-to-br from-[#06121e] via-[#091a2a] to-[#0d2a40]">
    <!-- Geometric abstract background similar to the reference image -->
    <div class="absolute inset-0 z-0 opacity-40">
        <div class="absolute top-0 right-0 w-[60vw] h-full bg-gradient-to-l from-[#133c5c] to-transparent transform -skew-x-12 translate-x-32"></div>
        <div class="absolute bottom-0 left-0 w-[50vw] h-[60vh] bg-gradient-to-t from-[#133c5c] to-transparent transform skew-y-12 -translate-x-32"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10 text-center" data-aos="fade-up">
        <h1 class="text-4xl md:text-5xl lg:text-[4rem] font-bold text-white mb-6 drop-shadow-md" data-aos="fade-up" data-aos-delay="100">{{ app()->getLocale() == 'en' ? 'Blog' : 'المدونة' }}</h1>
        <p class="text-base md:text-lg lg:text-xl text-gray-200 max-w-3xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="150">
            {{ app()->getLocale() == 'en' ? 'A knowledge space where we share our expertise and ideas, to inspire you and keep you informed of the latest trends and methods.' : 'مساحة معرفية نشارك فيها خبراتنا وأفكارنا، لنلهمك ونبقيك على إطلاع بأحدث الاتجاهات والأساليب.' }}
        </p>
    </div>
</section>

<!-- Blog Posts Section -->
<section class="py-16 md:py-24 relative z-10 bg-[#06121e] min-h-screen">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @forelse($blogs as $blog)
                @php
                    $route = app()->getLocale() == 'en' ? 'blog.show_en' : 'blog.show';
                @endphp
                <a href="{{ route('blog.short', $blog->id) }}" class="group block bg-[#0f2236] rounded-[1.5rem] overflow-hidden hover:-translate-y-2 transition-transform duration-300 border border-white/5 shadow-lg hover:shadow-2xl hover:border-white/10" data-aos="fade-up" data-aos-delay="{{ min($loop->iteration * 100, 400) }}">
                    
                    <!-- Image wrapper with internal padding to match the reference -->
                    <div class="p-3">
                        <div class="relative h-[220px] md:h-[240px] overflow-hidden rounded-[1rem]">
                            @if($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            @else
                                <div class="w-full h-full bg-[#18324a] flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white/10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Card Content (Date and Title only) -->
                    <div class="px-5 md:px-6 pb-6 pt-2 text-start flex flex-col justify-start">
                        <div class="text-secondary text-sm md:text-base font-medium mb-2" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                            {{ app()->getLocale() == 'en' ? $blog->created_at->format('d M Y') : $blog->created_at->locale('ar')->translatedFormat('j F Y') }}
                        </div>
                        <h3 class="text-xl md:text-2xl font-bold text-white line-clamp-2 leading-tight group-hover:text-gray-200 transition-colors">
                            {{ $blog->title }}
                        </h3>
                    </div>
                    
                </a>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-20" data-aos="zoom-in">
                    <div class="bg-[#0f2236] border border-white/5 rounded-3xl p-12 max-w-2xl mx-auto shadow-2xl">
                        <div class="w-24 h-24 bg-white/5 text-white/50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"></path></svg>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-4">{{ app()->getLocale() == 'en' ? 'No Articles Yet' : 'لا يوجد مقالات بعد' }}</h3>
                        <p class="text-gray-400 text-lg">{{ app()->getLocale() == 'en' ? 'Check back later for our latest updates and insights.' : 'يرجى العودة لاحقاً للاطلاع على أحدث مقالاتنا.' }}</p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-20 flex justify-center custom-pagination">
            {{ $blogs->links() }}
        </div>
    </div>
</section>

<style>
    /* Custom pagination styling to match the new dark blue theme */
    .custom-pagination nav {
        width: 100%;
        display: flex;
        justify-content: center;
    }
    .custom-pagination .pagination {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .custom-pagination .page-item .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 44px;
        height: 44px;
        border-radius: 50%;
        background-color: #0f2236;
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.7);
        transition: all 0.3s ease;
        text-decoration: none;
        font-weight: 500;
    }
    .custom-pagination .page-item .page-link:hover {
        background-color: #1a3652;
        border-color: rgba(255, 255, 255, 0.2);
        color: #fff;
        transform: translateY(-2px);
    }
    .custom-pagination .page-item.active .page-link {
        background-color: #bf9448;
        border-color: #bf9448;
        color: #1a1a1a;
        font-weight: 700;
    }
    .custom-pagination .page-item.disabled .page-link {
        opacity: 0.4;
        pointer-events: none;
    }
    
    /* If Tailwind pagination is used instead of Bootstrap */
    .custom-pagination nav > div.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between {
        flex-direction: column;
        align-items: center;
        gap: 1.5rem;
    }
    .custom-pagination span[aria-current="page"] > span {
        background-color: #bf9448 !important;
        color: #1a1a1a !important;
        border-color: #bf9448 !important;
        font-weight: bold;
    }
    .custom-pagination a.relative.inline-flex {
        background-color: #0f2236 !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
        color: rgba(255, 255, 255, 0.7) !important;
    }
    .custom-pagination a.relative.inline-flex:hover {
        background-color: #1a3652 !important;
        color: white !important;
        border-color: rgba(255, 255, 255, 0.2) !important;
    }
</style>
@endsection
