@extends('layouts.app')

@section('title', 'Portfolio — Igloo Inc.')
@section('description', 'Explore Igloo Inc.\'s portfolio of on-chain consumer brands and IP companies.')
@section('body-class', 'dark-body')

@section('content')
<div class="page-hero" style="background: var(--clr-bg-dark);">
    <span class="page-breadcrumb">////// Portfolio</span>
    <h1 class="page-headline">Our Companies</h1>
    <p class="page-sub">A growing portfolio of on-chain consumer brands and IP companies, each building the future of community-powered entertainment.</p>
</div>

<div class="page-content-section" style="background: var(--clr-bg-dark);">
    <div class="portfolio-page-grid">
        @foreach($items as $item)
        <a href="{{ route('portfolio.item', $item['slug']) }}" class="portfolio-card animate-fade-up" style="animation-delay: {{ $loop->index * 0.15 }}s;">
            <div class="portfolio-card-inner">
                <div class="portfolio-meta-top">
                    <span class="portfolio-code">PORTFOLIO_{{ $item['code'] }}</span>
                    <span class="portfolio-name">{{ $item['name'] }}</span>
                </div>
                <div class="portfolio-image-area">
                    <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}" loading="lazy" class="portfolio-img">
                    <div class="portfolio-glow"></div>
                </div>
                <div class="portfolio-meta-bottom">
                    <div class="portfolio-date-cta">
                        <span style="font-family: var(--font-mono); font-size: 0.65rem; color: var(--clr-text-dim);">D {{ $item['date'] }}</span>
                        <span class="portfolio-explore">CLICK TO EXPLORE →</span>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
