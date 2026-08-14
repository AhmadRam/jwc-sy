@extends('layout')

@section('page_title')
    {{ __('services.' . $service . '_title') }}
@endsection

@section('meta_description')
    {{ __('app.meta_description') }}
@endsection

@section('meta_keywords')
    {{ __('app.meta_keywords') }}
@endsection


@section('content')
    <main class="main">
        <!-- Page Title -->
        @php
            $bg_images = [
                'personal_reputation' => '@_إدارة السمعة الشخصية.jpg',
                'reputation_management' => '@_إدارة السمعة والظهور الإعلامي.jpg',
                'communication_strategies' => '@_استراتيجيات التواصل والتسويق.jpg',
                'strategic_design' => '@_التصميم الاستراتيجي (PowerPoint).jpg',
                'strategic_communication' => '@_التواصل الاستراتيجي والتشاركية.jpg',
                'cultural_localization' => '@_التوطين الثقافي.jpg',
                'public_relations' => '@_العلاقات العامة والإعلام.jpg',
            ];
            $bg_image = isset($bg_images[$service]) ? asset('assets/img/services/' . $bg_images[$service]) : '';
        @endphp
        
        <div class="page-title" style="background-image: url('{{ $bg_image }}'); background-size: cover; background-position: bottom center; position: relative;">
            <div class="heading" style="position: relative; z-index: 1; padding: 300px 0 150px 0;">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 style="color: #fff; text-shadow: 2px 2px 8px rgba(0,0,0,0.8), 0 0 15px rgba(0,0,0,0.5);">{{ __('services.' . $service . '_title') }}</h1>
                            <p class="mb-0">
                                {{-- {{ __('services._desc') }} --}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs" style="position: relative; z-index: 1; background-color: rgba(255, 255, 255, 0.9);">
                <div class="container">
                    <ol>
                        <li><a
                                href="{{ route(app()->getLocale() == 'ar' ? 'index' : 'index_en') }}">{{ __('services.home') }}</a>
                        </li>
                        <li class="current">{{ __('services.' . $service . '_title') }}</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <div class="container section service-details-content">

            @if ($service == 'strategic_communication')
                <div class="service-intro">
                    <h2 class="service-section-title">{{ __('services.strategic_communication_title') }}</h2>
                    <p class="service-intro-text">{{ __('services.strategic_communication_desc') }}</p>
                </div>
                <div class="service-frameworks">
                    <h3 class="service-frameworks-title">{{ __('services.strategic_communication_frameworks_title') }}</h3>
                    <div class="row justify-content-center mt-4 g-4" data-aos="fade-up">
                        <div class="col-lg-4 col-md-6 service-card-advocacy">
                            <div class="service-framework-card h-100">
                                <div class="service-framework-icon">
                                    <i class="bi bi-megaphone"></i>
                                </div>
                                <h4>{{ __('services.gain_benefit') }}</h4>
                                <p>{{ __('services.gain_benefit_desc') }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 service-card-image">
                            <div class="service-framework-card h-100">
                                <div class="service-framework-icon">
                                    <i class="bi bi-stars"></i>
                                </div>
                                <h4>{{ __('services.build_image') }}</h4>
                                <p>{{ __('services.build_image_desc') }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 service-card-communication">
                            <div class="service-framework-card h-100">
                                <div class="service-framework-icon">
                                    <i class="bi bi-chat-dots"></i>
                                </div>
                                <h4>{{ __('services.communication_participation') }}</h4>
                                <p>{{ __('services.communication_participation_desc') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($service == 'communication_strategies')
                <!-- استراتيجيات التواصل والتسويق -->
                <div class="mb-4">
                    <h3 class="service-section-title">{{ __('services.communication_strategies_title') }}</h3>
                    <p>{{ __('services.communication_strategies_desc') }}</p>
                    <div class="row mt-4" data-aos="fade-up">
                        <div class="col-md-6">
                            <div class="service-list-item">
                                <span class="service-icon">
                                    <img src="{{ vasset('assets/img/serv4.png') }}" alt="Internal Communication">
                                </span>
                                <span class="service-text">{{ __('services.internal_communication_strategies') }}</span>
                            </div>
                            <div class="service-list-item">
                                <span class="service-icon">
                                    <img src="{{ vasset('assets/img/serv5.png') }}" alt="Public Relations">
                                </span>
                                <span class="service-text">{{ __('services.public_relations_strategies') }}</span>
                            </div>
                            <div class="service-list-item">
                                <span class="service-icon">
                                    <img src="{{ vasset('assets/img/serv6.png') }}" alt="Campaign Strategies">
                                </span>
                                <span class="service-text">{{ __('services.specialized_campaign_strategies') }}</span>
                            </div>
                            <div class="service-list-item">
                                <span class="service-icon">
                                    <img src="{{ vasset('assets/img/serv7.png') }}" alt="Specialized PR">
                                </span>
                                <span
                                    class="service-text">{{ __('services.specialized_public_relations_strategies') }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="service-list-item">
                                <span class="service-icon">
                                    <img src="{{ vasset('assets/img/serv8.png') }}" alt="Reputation Management">
                                </span>
                                <span class="service-text">{{ __('services.reputation_management_strategies') }}</span>
                            </div>
                            <div class="service-list-item">
                                <span class="service-icon">
                                    <img src="{{ vasset('assets/img/serv9.png') }}" alt="Marketing Strategies">
                                </span>
                                <span class="service-text">{{ __('services.marketing_strategies') }}</span>
                            </div>
                            <div class="service-list-item">
                                <span class="service-icon">
                                    <img src="{{ vasset('assets/img/serv10.png') }}" alt="Crisis Management">
                                </span>
                                <span class="service-text">{{ __('services.media_crisis_strategies') }}</span>
                            </div>
                            <div class="service-list-item">
                                <span class="service-icon">
                                    <img src="{{ vasset('assets/img/serv11.png') }}" alt="Media Center">
                                </span>
                                <span class="service-text">{{ __('services.specialized_media_center_strategies') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($service == 'public_relations')
                <!-- العلاقات العامة والإعلام -->
                <div class="mb-4">
                    <h3 class="service-section-title">{{ __('services.public_relations_title') }}</h3>
                    <p>{{ __('services.public_relations_desc') }}</p>
                    <div class="row mt-4 g-4 public-relations-grid" data-aos="fade-up">
                        <div class="col-lg-3 col-md-6">
                            <div class="service-list-item">
                                <span class="service-icon">
                                    <img src="{{ vasset('assets/img/Picture11.png') }}" alt="Media Relations">
                                </span>
                                <span class="service-text">{{ __('services.media_relations') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-list-item">
                                <span class="service-icon">
                                    <img src="{{ vasset('assets/img/Picture12.png') }}" alt="Corporate Communication">
                                </span>
                                <span class="service-text">{{ __('services.corporate_communication') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-list-item">
                                <span class="service-icon">
                                    <img src="{{ vasset('assets/img/Picture13.png') }}" alt="Media Center Management">
                                </span>
                                <span class="service-text">{{ __('services.media_center_management') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-list-item">
                                <span class="service-icon">
                                    <img src="{{ vasset('assets/img/Picture14.png') }}" alt="Reputation Management">
                                </span>
                                <span class="service-text">{{ __('services.reputation_management') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-list-item">
                                <span class="service-icon">
                                    <img src="{{ vasset('assets/img/Picture15.png') }}" alt="Media Campaigns">
                                </span>
                                <span class="service-text">{{ __('services.media_campaigns') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-list-item">
                                <span class="service-icon">
                                    <img src="{{ vasset('assets/img/Picture16.png') }}" alt="Internal Communication">
                                </span>
                                <span class="service-text">{{ __('services.internal_communication') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-list-item">
                                <span class="service-icon">
                                    <img src="{{ vasset('assets/img/Picture17.png') }}" alt="Content Management">
                                </span>
                                <span class="service-text">{{ __('services.content_management') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-list-item">
                                <span class="service-icon">
                                    <img src="{{ vasset('assets/img/Picture18.png') }}" alt="Crisis Management">
                                </span>
                                <span class="service-text">{{ __('services.crisis_management') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($service == 'reputation_management')
                <!-- إدارة السمعة والظهور الإعلامي -->
                <div class="mb-4">
                    <h3 class="service-section-title">{{ __('services.reputation_management_title') }}</h3>
                    <p>{{ __('services.reputation_management_desc') }}</p>
                    <div class="row mt-4 reputation-grid" data-aos="fade-up">
                        <div class="col-md-6 reputation-col reputation-col-right">
                            <div class="service-list-item">
                                <span class="reputation-service-icon">
                                    <img src="{{ vasset('assets/img/Picture19.png') }}" alt="Reputation Analysis">
                                </span>
                                <span class="service-text">{{ __('services.reputation_analysis') }}</span>
                            </div>
                            <div class="service-list-item">
                                <span class="reputation-service-icon">
                                    <img src="{{ vasset('assets/img/Picture20.png') }}" alt="Reputation Strategy">
                                </span>
                                <span class="service-text">{{ __('services.reputation_strategy') }}</span>
                            </div>
                            <div class="service-list-item">
                                <span class="reputation-service-icon">
                                    <img src="{{ vasset('assets/img/Picture21.png') }}" alt="Media Presence">
                                </span>
                                <span class="service-text">{{ __('services.media_presence') }}</span>
                            </div>
                            <div class="service-list-item">
                                <span class="reputation-service-icon">
                                    <img src="{{ vasset('assets/img/Picture22.png') }}" alt="Media Monitoring">
                                </span>
                                <span class="service-text">{{ __('services.media_monitoring') }}</span>
                            </div>
                        </div>

                        <div class="col-md-6 reputation-col reputation-col-left">
                            <div class="service-list-item">
                                <span class="reputation-service-icon">
                                    <img src="{{ vasset('assets/img/Picture23.png') }}" alt="Company Reputation">
                                </span>
                                <span class="service-text">{{ __('services.company_reputation') }}</span>
                            </div>
                            <div class="service-list-item">
                                <span class="reputation-service-icon">
                                    <img src="{{ vasset('assets/img/Picture24.png') }}" alt="Personal Reputation">
                                </span>
                                <span class="service-text">{{ __('services.personal_reputation') }}</span>
                            </div>
                            <div class="service-list-item">
                                <span class="reputation-service-icon">
                                    <img src="{{ vasset('assets/img/Picture25.png') }}" alt="Media Crisis">
                                </span>
                                <span class="service-text">{{ __('services.media_crisis') }}</span>
                            </div>
                            <div class="service-list-item">
                                <span class="reputation-service-icon">
                                    <img src="{{ vasset('assets/img/Picture26.png') }}" alt="Digital Reputation">
                                </span>
                                <span class="service-text">{{ __('services.digital_reputation') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($service == 'personal_reputation')
                <div class="mb-4">
                    <h3 class="service-section-title">{{ __('services.personal_reputation_title') }}</h3>
                    <p>{{ __('services.personal_reputation_desc') }}</p>
                    {{-- <div class="service-divider"></div> --}}
                    <div class="row mt-4 reputation-grid" data-aos="fade-up">
                        <div class="col-md-6 reputation-col reputation-col-right">
                            <div class="service-list-item">
                                <span class="reputation-service-icon">
                                    <img src="{{ vasset('assets/img/Picture19.png') }}"
                                        alt="{{ __('services.reputation_analysis') }}">
                                </span>
                                <span class="service-text">{{ __('services.reputation_analysis') }}</span>
                            </div>
                            <div class="service-list-item">
                                <span class="reputation-service-icon">
                                    <img src="{{ vasset('assets/img/Picture20.png') }}"
                                        alt="{{ __('services.reputation_strategy') }}">
                                </span>
                                <span class="service-text">{{ __('services.reputation_strategy') }}</span>
                            </div>
                            <div class="service-list-item">
                                <span class="reputation-service-icon">
                                    <img src="{{ vasset('assets/img/Picture21.png') }}"
                                        alt="{{ __('services.media_presence_traditional_digital') }}">
                                </span>
                                <span class="service-text">{{ __('services.media_presence_traditional_digital') }}</span>
                            </div>
                        </div>
                        <div class="col-md-6 reputation-col reputation-col-left">
                            <div class="service-list-item">
                                <span class="reputation-service-icon">
                                    <img src="{{ vasset('assets/img/Picture24.png') }}"
                                        alt="{{ __('services.personal_reputation') }}">
                                </span>
                                <span class="service-text">{{ __('services.personal_reputation') }}</span>
                            </div>
                            <div class="service-list-item">
                                <span class="reputation-service-icon">
                                    <img src="{{ vasset('assets/img/Picture25.png') }}"
                                        alt="{{ __('services.media_crisis') }}">
                                </span>
                                <span class="service-text">{{ __('services.media_crisis') }}</span>
                            </div>
                            <div class="service-list-item">
                                <span class="reputation-service-icon">
                                    <img src="{{ vasset('assets/img/Picture22.png') }}"
                                        alt="{{ __('services.media_monitoring') }}">
                                </span>
                                <span class="service-text">{{ __('services.media_monitoring') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($service == 'strategic_design')
                <div class="mb-4">
                    <h3 class="service-section-title">{{ __('services.strategic_design_title') }}</h3>
                    <p>{{ __('services.strategic_design_desc') }}</p>
                    {{-- <div class="service-divider"></div> --}}
                    <div class="row mt-4 g-4 ppt-services-grid" data-aos="fade-up">
                        <div class="col-lg-3 col-md-6">
                            <div class="ppt-service-card">
                                <div class="ppt-service-icon">
                                    <i class="bi bi-pencil-square"></i>
                                </div>
                                <div class="ppt-service-label">{{ __('services.ppt_content_development') }}</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="ppt-service-card">
                                <div class="ppt-service-icon">
                                    <i class="bi bi-layout-text-window"></i>
                                </div>
                                <div class="ppt-service-label">{{ __('services.ppt_slide_structure') }}</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="ppt-service-card">
                                <div class="ppt-service-icon">
                                    <i class="bi bi-translate"></i>
                                </div>
                                <div class="ppt-service-label">{{ __('services.ppt_language_proofing') }}</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="ppt-service-card">
                                <div class="ppt-service-icon">
                                    <i class="bi bi-easel2"></i>
                                </div>
                                <div class="ppt-service-label">{{ __('services.ppt_visual_design') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($service == 'cultural_localization')
                <div class="mb-4">
                    <h3 class="service-section-title">{{ __('services.cultural_localization_title') }}</h3>
                    <p>{{ __('services.cultural_localization_desc') }}</p>
                    <div class="row mt-4 g-4 cultural-localization-grid" data-aos="fade-up">
                        <div class="col-lg-4 col-md-6">
                            <div class="service-list-item h-100">
                                <span class="service-icon" style="background-color: var(--accent-color); color: white; display: flex; align-items: center; justify-content: center; width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-building-check"></i>
                                </span>
                                <span class="service-text">{{ __('services.cultural_assessment') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="service-list-item h-100">
                                <span class="service-icon" style="background-color: var(--accent-color); color: white; display: flex; align-items: center; justify-content: center; width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-diagram-3"></i>
                                </span>
                                <span class="service-text">{{ __('services.cultural_alignment') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="service-list-item h-100">
                                <span class="service-icon" style="background-color: var(--accent-color); color: white; display: flex; align-items: center; justify-content: center; width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-search"></i>
                                </span>
                                <span class="service-text">{{ __('services.comprehensive_review') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="service-list-item h-100">
                                <span class="service-icon" style="background-color: var(--accent-color); color: white; display: flex; align-items: center; justify-content: center; width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-file-earmark-bar-graph"></i>
                                </span>
                                <span class="service-text">{{ __('services.risk_opportunity_report') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="service-list-item h-100">
                                <span class="service-icon" style="background-color: var(--accent-color); color: white; display: flex; align-items: center; justify-content: center; width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-translate"></i>
                                </span>
                                <span class="service-text">{{ __('services.content_localization') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="service-list-item h-100">
                                <span class="service-icon" style="background-color: var(--accent-color); color: white; display: flex; align-items: center; justify-content: center; width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-person-video3"></i>
                                </span>
                                <span class="service-text">{{ __('services.leadership_training') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mx-auto">
                            <div class="service-list-item h-100">
                                <span class="service-icon" style="background-color: var(--accent-color); color: white; display: flex; align-items: center; justify-content: center; width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-arrow-repeat"></i>
                                </span>
                                <span class="service-text">{{ __('services.continuous_review') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($service == 'advocacy')
                <div class="mb-4">
                    <h3 class="service-section-title">{{ __('services.advocacy_title') }}</h3>
                    <p>{{ __('services.advocacy_desc') }}</p>
                </div>
            @elseif ($service == 'image_building')
                <div class="mb-4">
                    <h3 class="service-section-title">{{ __('services.image_building_title') }}</h3>
                    <p>{{ __('services.image_building_desc') }}</p>
                </div>
            @endif

            <div class="download-profile text-center mt-5">
                @php
                    $url = App::getLocale() == 'en'
                        ? vasset('assets/files/JWC COMPANY PROFILE ENGLISH.pdf')
                        : vasset('assets/files/JWC COMPANY PROFILE ARABIC.pdf');
                    echo str_replace(':url', $url, __('app.download_profile_sentence'));
                @endphp
            </div>

        </div>
    </main>
@endsection
