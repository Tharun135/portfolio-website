{{-- ============================================================
     NAVBAR COMPONENT
     Sticky navigation with transparent-to-solid scroll behavior
     ============================================================ --}}
<nav class="navbar" id="navbar" role="navigation" aria-label="Main Navigation">
    <div class="navbar-inner">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="navbar-logo" aria-label="Igloo Inc. Home">
            <svg class="logo-svg" viewBox="0 0 120 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Custom IGLOO text logo similar to igloo.inc style -->
                <text x="0" y="30" font-family="Space Grotesk, sans-serif" font-weight="700" font-size="28" fill="currentColor" letter-spacing="2">iGLOO</text>
            </svg>
            <span class="logo-tagline">// Inc.</span>
        </a>

        <!-- Desktop Navigation Links -->
        <ul class="navbar-links" role="list">
            <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">// Home</a></li>
            <li><a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">// About</a></li>
            <li><a href="{{ route('portfolio') }}" class="nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}">// Portfolio</a></li>
            <li><a href="{{ route('manifesto') }}" class="nav-link {{ request()->routeIs('manifesto') ? 'active' : '' }}">// Manifesto</a></li>
            <li><a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">// Contact</a></li>
        </ul>

        <!-- CTA Button -->
        <div class="navbar-cta">
            <a href="{{ route('contact') }}" class="btn btn-outline btn-sm">Connect</a>
        </div>

        <!-- Mobile Hamburger -->
        <button class="hamburger" id="hamburger" aria-label="Toggle menu" aria-expanded="false" aria-controls="mobileMenu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu" aria-hidden="true">
        <ul role="list">
            <li><a href="{{ route('home') }}" class="mobile-nav-link">// Home</a></li>
            <li><a href="{{ route('about') }}" class="mobile-nav-link">// About</a></li>
            <li><a href="{{ route('portfolio') }}" class="mobile-nav-link">// Portfolio</a></li>
            <li><a href="{{ route('manifesto') }}" class="mobile-nav-link">// Manifesto</a></li>
            <li><a href="{{ route('contact') }}" class="mobile-nav-link">// Contact</a></li>
        </ul>
        <a href="{{ route('contact') }}" class="btn btn-primary mt-4">Connect With Us</a>
    </div>
</nav>
