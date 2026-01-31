@extends('layouts.app')

@section('title', 'Edens Gröna - Hem')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@endpush

@section('content')
    {{-- HERO SECTION --}}
    @if($heroSettings->is_active)
        <section class="hero-section">
            <!-- Background Video -->
            <div class="video-container">
                <video autoplay muted loop playsinline class="hero-video">
                    <source
                        src="{{ asset('storage/'.$heroSettings->background_video_path) }}"
                        type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>

            <!-- Overlay -->
            <div class="hero-overlay"></div>

            <!-- Content -->
            <div class="hero-content">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-10">
                            @if($heroSettings->subtitle)
                                <div class="hero-badge animate-fade-in-up">
                                    {{$heroSettings->subtitle}}
                                </div>
                            @endif

                            @if($heroSettings->title)
                                <h1 class="hero-title text-white animate-fade-in-up" style="animation-delay: 0.1s;">
                                    {{$heroSettings->title}}
                                </h1>
                            @endif
                            @if($heroSettings->description)
                                <p class="hero-subtitle text-white animate-fade-in-up"
                                   style="animation-delay: 0.2s;">{{$heroSettings->description}}</p>
                            @endif

                            <div class="hero-cta animate-fade-in-up" style="animation-delay: 0.3s;">
                                <a href="{{$heroSettings->primary_button_url}}" class="btn-hero-primary">
                                    {{$heroSettings->primary_button_text}}
                                    @if(empty($heroSettings->secondary_button_url))
                                        <i class="fas fa-arrow-right ms-2"></i>
                                    @endif
                                </a>
                                <a href="{{$heroSettings->secondary_button_url??'#services'}}"
                                   class="btn-hero-secondary">
                                    {{$heroSettings->secondary_button_text}}
                                    <i class="fas fa-chevron-down ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- SERVICES SECTION --}}
    <div class="container content-space-2 content-space-lg-3" id="services">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge">Våra Tjänster</span>
            <h2 class="section-title">
                Vilken trädgårdstjänst söker du?
            </h2>
            <p class="section-subtitle">
                Vi erbjuder ett omfattande utbud av tjänster som hjälper dig att förverkliga din drömträdgård.
                Stora och små projekt – vi tar oss an allt med samma engagemang.
            </p>
        </div>

        <div class="row g-4">
            @forelse($services as $index => $service)
                <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <a class="card card-stretched-vertical service-card-hover d-flex flex-column"
                       href="#!"
                       style="background-image: url({{ $service->hasMedia('image') ? $service->image_url : asset('assets/img/default-service.jpg') }});
                              min-height: 28rem;
                              background-position: center;
                              background-size: cover;
                              position: relative;">

                        <div class="service-card-overlay"></div>

                        <div class="card-footer mt-auto">
                            @if($service->icon)
                                <i class="{{ $service->icon }} text-white service-icon"></i>
                            @endif
                            <h3 class="card-title text-white mb-2">
                                {{ $service->title }}
                            </h3>
                            @if($service->description)
                                <p class="text-white small mb-0 card-text">
                                    {{ Str::limit($service->description, 100) }}
                                </p>
                            @endif
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Inga tjänster tillgängliga för tillfället.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- PROCESS STEPS SECTION --}}
    <div class="position-relative"
         style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); padding: 5rem 0;">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-badge">Vår Process</span>
                <h2 class="section-title text-white">
                    Så här går det till
                </h2>
                <p class="section-subtitle text-white">
                    En enkel och smidig process från första kontakt till färdigt resultat.
                    Vi guidar dig genom varje steg på vägen.
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                @foreach($steps as $step)
                    <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="{{ $step->step_number * 100 }}">
                        <div class="process-card">
                            <div class="d-flex align-items-start gap-4">
                                <div class="flex-shrink-0">
                                    <div class="process-number">
                                        {{ $step->step_number }}
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h4 class="process-title">{{ $step->title }}</h4>
                                    <p class="process-description mb-0">{{ $step->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- FEATURE STATS --}}
    <div class="container content-space-2 content-space-lg-3">
        <div class="row g-4 justify-content-center" data-aos="fade-up">
            <div class="col-sm-6 col-lg-4">
                <div class="feature-stat-card text-center">
                    <div class="feature-icon">
                        <i class="far fa-heart text-white"></i>
                    </div>
                    <h3 class="feature-title text-white">Kärlek</h3>
                    <p class="text-white mb-0 mt-2">Vi älskar det vi gör</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="feature-stat-card text-center">
                    <div class="feature-icon">
                        <i class="fa-solid fa-book text-white"></i>
                    </div>
                    <h3 class="feature-title text-white">Kunskap</h3>
                    <p class="text-white mb-0 mt-2">Expertis och erfarenhet</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="feature-stat-card text-center">
                    <div class="feature-icon">
                        <i class="fa-solid fa-medal text-white"></i>
                    </div>
                    <h3 class="feature-title text-white">Kvalitet</h3>
                    <p class="text-white mb-0 mt-2">Högsta standard alltid</p>
                </div>
            </div>
        </div>
    </div>

    {{-- VIDEO GALLERY - DYNAMIC WITH TITLES --}}
    <div class="video-gallery-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-badge">Vårt Arbete</span>
                <h2 class="section-title">
                    Din blivande trädgårdsmästare
                </h2>
                <p class="section-subtitle">
                    Vi fixar din trädgård till perfektion. Se exempel på våra tidigare projekt.
                </p>
            </div>

            @if($videos->count() > 0)
                <div class="video-gallery-container" data-aos="zoom-in">
                    <!-- Main Video -->
                    <div class="main-video-wrapper">
                        <video id="mainVideo" class="main-video" autoplay muted loop playsinline>
                            <source src="{{ $videos->first()->video_url }}" type="video/mp4">
                        </video>
                    </div>

                    <!-- Video Thumbnails - Scrollable after 3 items -->
                    <div class="video-thumbnails">
                        @foreach($videos as $index => $video)
                            <div class="video-thumbnail {{ $index === 0 ? 'active' : '' }}"
                                 onclick="changeVideo('{{ $video->video_url }}', {{ $index }})"
                                 data-index="{{ $index }}">
                                <div class="video-number">{{ $index + 1 }}</div>

                                @if($video->hasThumbnail())
                                    <img src="{{ $video->thumbnail_url }}" alt="{{ $video->title }}">
                                @else
                                    <video style="width: 100%; height: 100%; object-fit: cover; pointer-events: none;">
                                        <source src="{{ $video->video_url }}" type="video/mp4">
                                    </video>
                                @endif

                                <div class="video-thumbnail-overlay">
                                    <div class="play-icon">
                                        <i class="fas fa-play"></i>
                                    </div>
                                </div>

                                <!-- Video Title -->
                                <div class="video-title-overlay">
                                    <span class="video-title-text">{{ $video->title }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-video fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Inga videos tillgängliga för tillfället.</p>
                </div>
            @endif
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        // Video gallery with thumbnails
        function changeVideo(videoSrc, index) {
            const mainVideo = document.getElementById("mainVideo");
            mainVideo.src = videoSrc;
            mainVideo.load();
            mainVideo.play();

            // Update active state
            document.querySelectorAll('.video-thumbnail').forEach((thumb, i) => {
                if (i === index) {
                    thumb.classList.add('active');
                } else {
                    thumb.classList.remove('active');
                }
            });
        }

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
@endpush
