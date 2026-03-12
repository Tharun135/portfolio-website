@extends('layouts.app')

@section('title', 'Igloo Inc. — Building the Consumer Crypto Revolution')
@section('description', 'Igloo Inc. is building the largest on-chain community, driving the consumer crypto revolution through world-class IP and community-first innovation.')

@section('body-class', 'home-page')

@push('styles')
<style>
    /* ── Spline Hero Integration ──────────────────────────────── */
    .hero { position: relative; display: block; padding-bottom: 0; }

    .spline-wrapper {
        position: absolute; top: 0; right: 0;
        width: 55%; height: 100%;
        z-index: 1; overflow: hidden;
    }
    @media (max-width: 900px) {
        .spline-wrapper { position: relative; width: 100%; height: 420px; margin-top: -2rem; }
    }
    .spline-frame { width: 100%; height: 100%; border: 0; display: block; pointer-events: auto; }
    .spline-fade-left {
        position: absolute; top: 0; left: 0; width: 35%; height: 100%;
        background: linear-gradient(to right, var(--clr-bg-dark) 0%, transparent 100%);
        pointer-events: none; z-index: 2;
    }
    .spline-hud-tl, .spline-hud-br {
        position: absolute; width: 20px; height: 20px;
        border-color: rgba(91,141,238,0.55); border-style: solid;
        z-index: 3; pointer-events: none;
    }
    .spline-hud-tl { top: 12px; left: 12px; border-width: 1.5px 0 0 1.5px; }
    .spline-hud-br { bottom: 12px; right: 12px; border-width: 0 1.5px 1.5px 0; }
    .spline-meta {
        position: absolute; font-family: 'Space Mono', monospace;
        font-size: 0.62rem; letter-spacing: 0.1em;
        color: rgba(255,255,255,0.55); pointer-events: none; z-index: 4; line-height: 1.6;
    }
    .spline-meta-tl { top: 14px; left: 40px; }
    .spline-meta-br { bottom: 70px; right: 14px; text-align: right; }
    .spline-meta span { display: block; }
    .spline-meta .positive { color: #42d392; }
    .hero-visual { display: none !important; }

    /*
     * FIX: Mouse-event pass-through
     * .hero-content is a full-width transparent div at z-index 5 that
     * silently blocks ALL mousemove events from reaching the Spline iframe.
     * Fix: pointer-events:none on the container, restored on interactive children,
     * and max-width:52% so it physically can't overlap the right-side Spline pane.
     */
    .hero-content {
        position: relative; z-index: 5; grid-column: 1;
        max-width: 52%;
        pointer-events: none;
    }
    .hero-content a,
    .hero-content button,
    .hero-content input,
    .hero-content label { pointer-events: auto; }
    @media (max-width: 900px) {
        .hero-content { max-width: 100%; pointer-events: auto; }
    }
</style>
@endpush

@section('content')

{{-- ============================================================
     SECTION 1: HERO
     Full-viewport hero with particle canvas and CTA buttons
     ============================================================ --}}
<section class="hero" id="hero" aria-label="Hero Section">
    <!-- Animated Particle Canvas Background -->
    <canvas id="heroCanvas" class="hero-canvas" aria-hidden="true"></canvas>

    <!-- Floating Grid Lines -->
    <div class="hero-grid" aria-hidden="true"></div>

    <!-- HUD Corner Brackets -->
    <div class="hud-bracket hud-tl" aria-hidden="true"></div>
    <div class="hud-bracket hud-tr" aria-hidden="true"></div>
    <div class="hud-bracket hud-bl" aria-hidden="true"></div>
    <div class="hud-bracket hud-br" aria-hidden="true"></div>

    <!-- Hero Content -->
    <div class="hero-content container">
        <div class="hero-label animate-fade-up" aria-label="Company identifier">
            <span class="hero-code">////// IGLOO INC.</span>
            <span class="hero-status">● LIVE</span>
        </div>

        <h1 class="hero-headline animate-fade-up delay-1">
            Building the<br>
            <em class="hero-highlight">Consumer Crypto</em><br>
            Revolution
        </h1>

        <p class="hero-tagline animate-fade-up delay-2">
            The largest on-chain community — where intellectual property<br>
            meets the new era of the internet.
        </p>

        <div class="hero-actions animate-fade-up delay-3">
            <a href="{{ route('portfolio') }}" class="btn btn-primary" id="heroExploreBtn">
                <span>Explore Portfolio</span>
                <svg class="btn-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <a href="{{ route('manifesto') }}" class="btn btn-ghost" id="heroManifestoBtn">
                <span>Read Manifesto</span>
            </a>
        </div>

        <!-- Data Readout -->
        <div class="hero-data animate-fade-up delay-4" aria-hidden="true">
            <span class="data-item">SYS_STATUS: ONLINE</span>
            <span class="data-sep">|</span>
            <span class="data-item">D {{ date('d.m.Y') }}</span>
            <span class="data-sep">|</span>
            <span class="data-item">TEMP 29.44 / -01.42</span>
        </div>
    </div>

    <!-- Spline 3D Scene — R4X Bot (interactive, mouse-tracking) -->
    <div class="spline-wrapper" id="splineWrapper" aria-label="Interactive 3D character">
        <div class="spline-fade-left" aria-hidden="true"></div>
        <div class="spline-hud-tl" aria-hidden="true"></div>
        <div class="spline-hud-br" aria-hidden="true"></div>
        <div class="spline-meta spline-meta-tl" aria-hidden="true">
            <span>ASSET_R4X</span>
            <span>// INTERACTIVE</span>
        </div>
        <div class="spline-meta spline-meta-br" aria-hidden="true">
            <span>TEMP 29.44</span>
            <span class="positive">+01.14</span>
            <span style="margin-top:4px;opacity:0.6;">CLICK TO EXPLORE</span>
        </div>
        <iframe class="spline-frame"
            src="https://my.spline.design/r4xbot-tjgQq8N0PhuJwRRozGCWJI4x/"
            title="R4X Bot — Interactive 3D Scene"
            loading="lazy" allow="fullscreen"></iframe>
    </div>

    <!-- Scroll Indicator -->
    <div class="hero-scroll" aria-label="Scroll down indicator">
        <span class="scroll-text">SCROLL</span>
        <div class="scroll-line"></div>
    </div>
</section>

{{-- ============================================================
     SECTION 2: STATS
     Four key metrics in a horizontal ticker/grid
     ============================================================ --}}
<section class="stats-section" id="stats" aria-label="Key Statistics">
    <div class="stats-ticker">
        @foreach($stats as $stat)
        <div class="stat-item animate-count">
            <div class="stat-number" data-target="{{ $stat['number'] }}">{{ $stat['number'] }}</div>
            <div class="stat-label">{{ $stat['label'] }}</div>
        </div>
        @if(!$loop->last)
        <div class="stat-divider" aria-hidden="true">◆</div>
        @endif
        @endforeach
    </div>
</section>

{{-- ============================================================
     SECTION 3: ABOUT / INTRO
     Dark-section manifesto-style intro
     ============================================================ --}}
<section class="intro-section dark-section" id="about" aria-label="About Igloo Inc.">
    <div class="container">
        <div class="intro-grid">
            <div class="intro-label animate-slide-in">
                <span class="section-code">////// About</span>
            </div>
            <div class="intro-content">
                <h2 class="intro-headline animate-fade-up">
                    We believe IP, digital collectibles,<br>
                    and communities are born and thrive<br>
                    <span class="text-accent">on the blockchain.</span>
                </h2>
                <div class="intro-body animate-fade-up delay-1">
                    <p>Igloo Inc. was founded with a singular mission: to create the largest on-chain community and drive the consumer crypto revolution. Through strategic acquisitions, community-first thinking, and cutting-edge blockchain infrastructure, we're reshaping how intellectual property is created and experienced.</p>
                    <p>Our business strategy focuses on expanding a vast range of content mediums, products, and experiences — driving people onchain into the new era of the internet.</p>
                </div>
                <a href="{{ route('about') }}" class="btn btn-outline mt-4 animate-fade-up delay-2">
                    Learn More ↗
                </a>
            </div>
        </div>
    </div>

    <!-- Background igloo image -->
    <div class="intro-bg-image" aria-hidden="true">
        <img src="{{ asset('images/igloo_structure.png') }}" alt="" loading="lazy">
    </div>
</section>

{{-- ============================================================
     SECTION 4: FEATURES
     Alternating left/right feature blocks
     ============================================================ --}}
<section class="features-section light-section" id="features" aria-label="Platform Features">
    <div class="container">
        <div class="section-header text-center animate-fade-up">
            <span class="section-code">////// What We Do</span>
            <h2 class="section-headline">Our Core<br>Capabilities</h2>
            <p class="section-sub">A vertically integrated platform for on-chain IP creation, community building, and ecosystem expansion.</p>
        </div>

        @foreach($features as $feature)
        <div class="feature-block {{ $feature['position'] === 'left' ? 'feature-block--reverse' : '' }} animate-slide-in" aria-label="Feature: {{ $feature['title'] }}">
            <div class="feature-content">
                <div class="feature-icon-wrapper">
                    @if($feature['icon'] === 'crystal')
                        <svg class="feature-icon" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <polygon points="32,4 56,20 56,44 32,60 8,44 8,20" stroke="currentColor" stroke-width="2"/>
                            <polygon points="32,14 46,22 46,38 32,46 18,38 18,22" stroke="currentColor" stroke-width="1.5" fill="currentColor" fill-opacity="0.1"/>
                        </svg>
                    @elseif($feature['icon'] === 'community')
                        <svg class="feature-icon" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="32" cy="20" r="10" stroke="currentColor" stroke-width="2"/>
                            <circle cx="14" cy="32" r="7" stroke="currentColor" stroke-width="2"/>
                            <circle cx="50" cy="32" r="7" stroke="currentColor" stroke-width="2"/>
                            <path d="M22 45c0-5.5 4.5-10 10-10s10 4.5 10 10v4H22v-4z" stroke="currentColor" stroke-width="2"/>
                            <path d="M4 56c0-4 3-7 7-7" stroke="currentColor" stroke-width="2"/>
                            <path d="M60 56c0-4-3-7-7-7" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    @elseif($feature['icon'] === 'expansion')
                        <svg class="feature-icon" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="8" y="8" width="20" height="20" rx="2" stroke="currentColor" stroke-width="2"/>
                            <rect x="36" y="8" width="20" height="20" rx="2" stroke="currentColor" stroke-width="2"/>
                            <rect x="8" y="36" width="20" height="20" rx="2" stroke="currentColor" stroke-width="2"/>
                            <rect x="36" y="36" width="20" height="20" rx="2" stroke="currentColor" stroke-width="2"/>
                            <path d="M28 18h8M18 28v8M46 28v8M36 46h8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    @else
                        <svg class="feature-icon" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="32" cy="32" r="28" stroke="currentColor" stroke-width="2"/>
                            <circle cx="32" cy="32" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M32 4v56M4 32h56M10 10l44 44M54 10L10 54" stroke="currentColor" stroke-width="1" stroke-opacity="0.4"/>
                        </svg>
                    @endif
                </div>

                <span class="feature-label">////// CAPABILITY_0{{ $loop->index + 1 }}</span>
                <h3 class="feature-title">{{ $feature['title'] }}</h3>
                <p class="feature-desc">{{ $feature['description'] }}</p>
                <a href="#" class="feature-link">
                    Explore →
                </a>
            </div>

            <div class="feature-visual">
                <div class="feature-image-wrapper">
                    <img src="{{ asset('images/' . $feature['image']) }}" alt="{{ $feature['title'] }} visualization" loading="lazy" class="feature-img">
                    <div class="feature-image-overlay"></div>
                    <!-- HUD elements -->
                    <div class="feature-hud-label feature-hud-tl">ASSET_00{{ $loop->index + 1 }}</div>
                    <div class="feature-hud-br">
                        <span>TEMP {{ rand(20, 45) }}.{{ rand(10, 99) }}</span>
                        <span>{{ $loop->index % 2 === 0 ? '+' : '-' }}{{ rand(1, 5) }}.{{ rand(10, 99) }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- ============================================================
     SECTION 5: HOW IT WORKS
     Step-based layout with numbered steps
     ============================================================ --}}
<section class="how-section dark-section" id="how-it-works" aria-label="How It Works">
    <div class="container">
        <div class="section-header text-center animate-fade-up">
            <span class="section-code">////// Process</span>
            <h2 class="section-headline">How We Build<br>the Future</h2>
            <p class="section-sub">A proven four-stage playbook for building category-defining on-chain brands.</p>
        </div>

        <div class="steps-grid">
            @foreach($steps as $step)
            <div class="step-card animate-fade-up" style="animation-delay: {{ $loop->index * 0.15 }}s">
                <div class="step-number">{{ $step['number'] }}</div>
                <div class="step-connector" aria-hidden="true"></div>
                <h3 class="step-title">{{ $step['title'] }}</h3>
                <p class="step-desc">{{ $step['desc'] }}</p>
                <div class="step-bracket" aria-hidden="true">
                    <span>[</span>
                    <span class="step-status">ACTIVE</span>
                    <span>]</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================
     SECTION 6: PORTFOLIO
     Portfolio cards with 3D object previews
     ============================================================ --}}
<section class="portfolio-section light-section" id="portfolio-preview" aria-label="Portfolio">
    <div class="container">
        <div class="section-header text-center animate-fade-up">
            <span class="section-code">////// Portfolio</span>
            <h2 class="section-headline">Our Companies</h2>
            <p class="section-sub">Building the next generation of consumer crypto brands, from acquisition to full-scale expansion.</p>
        </div>

        <div class="portfolio-grid">
            @foreach($portfolio as $item)
            <a href="{{ route('portfolio.item', $item['slug']) }}" class="portfolio-card animate-fade-up" style="animation-delay: {{ $loop->index * 0.2 }}s" aria-label="Portfolio: {{ $item['name'] }}">
                <div class="portfolio-card-inner">
                    <!-- HUD Meta -->
                    <div class="portfolio-meta-top">
                        <span class="portfolio-code">PORTFOLIO_{{ $item['code'] }}</span>
                        <span class="portfolio-name">{{ $item['name'] }}</span>
                    </div>

                    <!-- Image Area -->
                    <div class="portfolio-image-area">
                        <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}" loading="lazy" class="portfolio-img">
                        <div class="portfolio-glow"></div>
                    </div>

                    <!-- HUD Meta Bottom -->
                    <div class="portfolio-meta-bottom">
                        <div class="portfolio-temp">
                            <span>TEMP {{ $item['temp'] }}</span>
                            <span class="{{ str_starts_with($item['change'], '+') ? 'positive' : 'negative' }}">{{ $item['change'] }}</span>
                        </div>
                        <div class="portfolio-date-cta">
                            <span>D {{ $item['date'] }}</span>
                            <span class="portfolio-explore">CLICK TO EXPLORE →</span>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="text-center mt-5 animate-fade-up">
            <a href="{{ route('portfolio') }}" class="btn btn-outline">View All Portfolio →</a>
        </div>
    </div>
</section>

{{-- ============================================================
     SECTION 7: CAPABILITIES / INTEGRATIONS
     Icon grid of capabilities and ecosystem partners
     ============================================================ --}}
<section class="capabilities-section dark-section" id="capabilities" aria-label="Capabilities and Integrations">
    <div class="container">
        <div class="section-header text-center animate-fade-up">
            <span class="section-code">////// Ecosystem</span>
            <h2 class="section-headline">Built Across<br>Every Medium</h2>
            <p class="section-sub">From NFTs to gaming, physical products to entertainment — our IP spans every platform.</p>
        </div>

        <div class="capabilities-grid">
            @php
            $capabilities = [
                ['icon' => '◈', 'name' => 'NFT Collections', 'desc' => 'Digital collectibles'],
                ['icon' => '⬡', 'name' => 'DeFi Integration', 'desc' => 'On-chain finance'],
                ['icon' => '◉', 'name' => 'Gaming & Metaverse', 'desc' => 'Virtual worlds'],
                ['icon' => '▣', 'name' => 'Physical Products', 'desc' => 'Real-world goods'],
                ['icon' => '◈', 'name' => 'Entertainment', 'desc' => 'Animation & content'],
                ['icon' => '⬡', 'name' => 'IP Licensing', 'desc' => 'Brand expansion'],
                ['icon' => '◉', 'name' => 'Community DAO', 'desc' => 'On-chain governance'],
                ['icon' => '▣', 'name' => 'Token Economy', 'desc' => 'Value capture'],
            ];
            @endphp

            @foreach($capabilities as $cap)
            <div class="capability-card animate-fade-up" style="animation-delay: {{ $loop->index * 0.1 }}s">
                <span class="cap-icon">{{ $cap['icon'] }}</span>
                <h4 class="cap-name">{{ $cap['name'] }}</h4>
                <p class="cap-desc">{{ $cap['desc'] }}</p>
                <div class="cap-status">ACTIVE</div>
            </div>
            @endforeach
        </div>

        <!-- Integration Logos Band -->
        <div class="integrations-band animate-fade-up">
            <span class="integrations-label">////// Partners & Chains</span>
            <div class="integrations-logos">
                @php
                $logos = ['Ethereum', 'Solana', 'Abstract', 'OpenSea', 'Amazon', 'Walmart', 'Target', 'a16z'];
                @endphp
                @foreach($logos as $logo)
                <div class="integration-logo-item">{{ $logo }}</div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     SECTION 8: TESTIMONIALS
     Customer quotes with company logos
     ============================================================ --}}
<section class="testimonials-section light-section" id="testimonials" aria-label="Testimonials">
    <div class="container">
        <div class="section-header text-center animate-fade-up">
            <span class="section-code">////// Social Proof</span>
            <h2 class="section-headline">What People<br>Are Saying</h2>
        </div>

        <div class="testimonials-grid">
            @foreach($testimonials as $testimonial)
            <div class="testimonial-card animate-fade-up" style="animation-delay: {{ $loop->index * 0.15 }}s">
                <div class="testimonial-quote-mark">"</div>
                <blockquote class="testimonial-quote">{{ $testimonial['quote'] }}</blockquote>
                <div class="testimonial-author">
                    <div class="author-avatar" aria-hidden="true">{{ strtoupper(substr($testimonial['author'], 0, 1)) }}</div>
                    <div class="author-info">
                        <strong class="author-name">{{ $testimonial['author'] }}</strong>
                        <span class="author-role">{{ $testimonial['role'] }}</span>
                    </div>
                    <div class="author-company">{{ $testimonial['company'] }}</div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Company logos strip -->
        <div class="logos-strip animate-fade-up">
            <span class="logos-label">Backed and trusted by:</span>
            <div class="logos-row">
                @foreach(['a16z Crypto', 'Paradigm', 'Animoca Brands', 'Sequoia', 'DeFiance Capital'] as $co)
                <div class="logo-pill">{{ $co }}</div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     SECTION 9: CTA
     Final call-to-action block
     ============================================================ --}}
<section class="cta-section" id="cta" aria-label="Call To Action">
    <div class="container">
        <div class="cta-inner animate-fade-up">
            <div class="cta-label">////// Join the Revolution</div>
            <h2 class="cta-headline">
                Ready to Build<br>
                the Future of IP?
            </h2>
            <p class="cta-sub">
                Join us at the frontier of consumer crypto — where community,<br>
                culture, and blockchain converge.
            </p>
            <div class="cta-actions">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg" id="ctaConnectBtn">Get in Touch</a>
                <a href="{{ route('portfolio') }}" class="btn btn-ghost btn-lg" id="ctaExploreBtn">Explore Portfolio</a>
            </div>
        </div>
    </div>

    <!-- CTA Background Visual -->
    <div class="cta-bg-visual" aria-hidden="true">
        <div class="cta-orb cta-orb-1"></div>
        <div class="cta-orb cta-orb-2"></div>
        <div class="cta-grid-lines"></div>
    </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/hero-canvas.js') }}"></script>
@endpush
