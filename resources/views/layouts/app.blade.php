<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <title>@yield('title', 'Igloo Inc. — Building the Consumer Crypto Revolution')</title>
    <meta name="description" content="@yield('description', 'Igloo Inc. is building the largest on-chain community, driving the consumer crypto revolution through world-class IP and community-first innovation.')">
    <meta name="keywords" content="@yield('keywords', 'Web3, NFT, crypto, blockchain, consumer crypto, IP, community, Pudgy Penguins')">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og_title', 'Igloo Inc.')">
    <meta property="og:description" content="@yield('og_description', 'Building the Consumer Crypto Revolution')">
    <meta property="og:image" content="{{ asset('images/igloo_structure.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Igloo Inc.')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Building the Consumer Crypto Revolution')">
    <meta name="twitter:image" content="{{ asset('images/igloo_structure.png') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Space+Mono:wght@400;700&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @stack('styles')
</head>
<body class="@yield('body-class', '')">

    <!-- Navigation -->
    @include('components.navbar')

    <!-- Main Content -->
    <main id="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Custom Cursor -->
    <div class="cursor-dot" id="cursorDot"></div>
    <div class="cursor-ring" id="cursorRing"></div>

    <!-- Scroll Progress -->
    <div class="scroll-progress" id="scrollProgress"></div>

    <!-- Main JS -->
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')
</body>
</html>
