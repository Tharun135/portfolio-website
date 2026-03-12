@extends('layouts.app')

@section('title', 'Portfolio — Igloo Inc.')
@section('body-class', 'dark-body')

@section('content')
<div style="background: var(--clr-bg-dark); min-height: 100vh; padding-top: var(--nav-h);">
    <div style="max-width: 900px; margin: 0 auto; padding: clamp(3rem,8vw,6rem) var(--container-pad);">
        <a href="{{ route('portfolio') }}" style="font-family: var(--font-mono); font-size: 0.72rem; color: var(--clr-accent); letter-spacing: 0.1em; display: inline-flex; align-items: center; gap: 6px; margin-bottom: 2rem;">
            ← BACK TO PORTFOLIO
        </a>

        <span class="section-code">////// PORTFOLIO_ITEM</span>
        <h1 class="page-headline animate-fade-up">{{ strtoupper(str_replace('-', ' ', $slug)) }}</h1>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin-top: 3rem; align-items: start;" class="animate-fade-up delay-1">
            <div>
                <img src="{{ asset('images/portfolio_crystal_01.png') }}" alt="{{ $slug }}" style="width: 100%; border-radius: var(--r-lg); box-shadow: var(--shadow-lg);">
            </div>
            <div>
                <div class="contact-info-item">
                    <div class="contact-info-label">////// Status</div>
                    <div class="contact-info-value" style="color: #42d392;">Active Portfolio Company</div>
                </div>
                <div class="contact-info-item" style="margin-top: 1.5rem;">
                    <div class="contact-info-label">////// Category</div>
                    <div class="contact-info-value">On-Chain IP / Consumer Brand</div>
                </div>
                <div class="contact-info-item" style="margin-top: 1.5rem;">
                    <div class="contact-info-label">////// Description</div>
                    <p style="font-size: 0.95rem; line-height: 1.8; color: var(--clr-text-dim); margin-top: 0.5rem;">
                        A flagship Igloo Inc. portfolio company building the next generation of community-powered consumer IP on the blockchain. Through innovative community engagement and cross-medium expansion, this brand is driving mainstream crypto adoption.
                    </p>
                </div>
                <div style="margin-top: 2rem;">
                    <a href="{{ route('contact') }}" class="btn btn-primary">Inquire →</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
