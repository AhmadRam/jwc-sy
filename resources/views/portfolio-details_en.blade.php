@extends('layout_en')

@section('page_title')
    JWC | Strategic Communication and Public Relations Projects - Joint Words Communication
@endsection

@section('meta_description')
Explore Joint Words Communication (JWC) projects in strategic communication and public relations, and learn about our success in providing innovative solutions for our clients in Saudi Arabia
@endsection

@section('meta_keywords')
Public Relations Projects, Strategic Communication, Case Studies, Saudi Arabia, Positive Collaboration, Reputation Management, JWC, Joint Words Communication, Communication Strategies, Media Crisis Management, Success Stories, Previous Work
@endsection

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Portfolio Details</h1>
                            <p class="mb-0">Explore our strategic communication and public relations projects that demonstrate our expertise in delivering impactful solutions for diverse clients across Saudi Arabia and the region.</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{ route('index_en') }}">Home</a></li>
                        <li class="current">Portfolio Details</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <!-- Portfolio Details Section -->
        <section id="portfolio-details" class="portfolio-details section">

            <div class="container" data-aos="fade-up">

                <div class="portfolio-details-slider swiper init-swiper">
                    <script type="application/json" class="swiper-config">
        {
          "loop": true,
          "speed": 600,
          "autoplay": {
            "delay": 5000
          },
          "slidesPerView": "auto",
          "navigation": {
            "nextEl": ".swiper-button-next",
            "prevEl": ".swiper-button-prev"
          },
          "pagination": {
            "el": ".swiper-pagination",
            "type": "bullets",
            "clickable": true
          }
        }
      </script>
                    <div class="swiper-wrapper align-items-center">

                        <div class="swiper-slide">
                            <img src="assets/img/portfolio/app-1.jpg" alt="Strategic Communication Project">
                        </div>

                        <div class="swiper-slide">
                            <img src="assets/img/portfolio/product-1.jpg" alt="Public Relations Campaign">
                        </div>

                        <div class="swiper-slide">
                            <img src="assets/img/portfolio/branding-1.jpg" alt="Reputation Management Project">
                        </div>

                        <div class="swiper-slide">
                            <img src="assets/img/portfolio/books-1.jpg" alt="Media Relations Project">
                        </div>

                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-pagination"></div>
                </div>

                <div class="row justify-content-between gy-4 mt-4">

                    <div class="col-lg-8" data-aos="fade-up">
                        <div class="portfolio-description">
                            <h2>Strategic Communication Campaign for Ministry of Culture</h2>
                            <p>
                                This comprehensive strategic communication campaign was developed for the Ministry of Culture to promote cultural initiatives across Saudi Arabia. The project involved creating an integrated communication strategy that aligned with Vision 2030 objectives while effectively engaging diverse stakeholder groups.
                            </p>
                            <p>
                                Our team developed a multi-channel approach that included traditional media relations, digital content strategy, event management, and stakeholder engagement initiatives. The campaign successfully increased public awareness and participation in cultural activities while positioning the Ministry as a key driver of cultural transformation in the Kingdom.
                            </p>

                            <div class="testimonial-item">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>JWC's strategic approach to our communication needs was exceptional. They demonstrated a deep understanding of our objectives and delivered a campaign that resonated with our diverse audiences. Their ability to navigate complex stakeholder relationships while maintaining message consistency was particularly valuable.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <div>
                                    <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img"
                                        alt="Client Testimonial">
                                    <h3>Ministry of Culture Representative</h3>
                                    <h4>Communications Director</h4>
                                </div>
                            </div>

                            <p>
                                Key achievements of this project included:
                            </p>

                            <ul>
                                <li>300% increase in media coverage of cultural initiatives</li>
                                <li>Development of comprehensive messaging framework adopted across all Ministry departments</li>
                                <li>Successful launch of five major cultural events with extensive public participation</li>
                                <li>Creation of crisis communication protocols that were subsequently implemented during a high-profile event</li>
                                <li>Training of internal communications team to sustain long-term communication excellence</li>
                            </ul>

                            <p>
                                This project exemplifies JWC's ability to deliver strategic communication solutions that achieve measurable results while building lasting capabilities within client organizations.
                            </p>

                        </div>
                    </div>

                    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="portfolio-info">
                            <h3>Project Information</h3>
                            <ul>
                                <li><strong>Category</strong> Strategic Communication</li>
                                <li><strong>Client</strong> Ministry of Culture</li>
                                <li><strong>Project date</strong> January 2023</li>
                                <li><strong>Duration</strong> 6 months</li>
                                <li><strong>Location</strong> Riyadh, Saudi Arabia</li>
                                <li><a href="#" class="btn-visit align-self-start">View Case Study</a></li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Portfolio Details Section -->

    </main>
@endsection
