@extends('layouts.app')

@section('title', 'Contact — Tharun Sebastian | Technical Writer')
@section('description', 'Get in touch for Senior Technical Writer roles, documentation consulting, or project inquiries.')
@section('body-class', 'dark-body')

@section('content')
<div class="contact-page-wrapper">
    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="container text-center" style="position: relative; z-index: 10;">
            <span class="page-breadcrumb animate-fade-up">////// Contact</span>
            <h1 class="page-headline animate-fade-up delay-1">Let's Build<br><span class="text-accent">Something Great.</span></h1>
            <p class="page-sub animate-fade-up delay-2" style="margin: 0 auto;">Whether you're looking for a Senior Technical Writer, a Docs-as-Code consultant, or just want to discuss documentation automation — I'm all ears.</p>
        </div>
        
        <!-- Spline Mascot for Contact Page -->
        <div class="contact-spline-wrapper animate-fade-up delay-3">
            <iframe src="https://my.spline.design/r4xbot-AoDulhrnZSyUol2dKhZaFKSY/" frameborder="0" width="100%" height="100%" class="spline-frame" style="opacity: 0.6;"></iframe>
            <div class="spline-fade-bottom"></div>
        </div>

        <!-- HUD Brackets -->
        <div class="hud-bracket hud-tl"></div>
        <div class="hud-bracket hud-tr"></div>

        <!-- Decorative Orbs -->
        <div class="cta-bg-visual">
            <div class="cta-orb cta-orb-1"></div>
            <div class="cta-orb cta-orb-2"></div>
        </div>
    </section>

    <!-- Main Content Grid -->
    <div class="container">
        <div class="contact-grid">
            <!-- Left: Contact Info -->
            <div class="contact-sidebar animate-slide-in">
                <div class="info-card">
                    <div class="contact-info-label">////// Email</div>
                    <a href="mailto:tharun135@gmail.com" class="contact-info-value">tharun135@gmail.com</a>
                </div>
                <div class="info-card">
                    <div class="contact-info-label">////// Location</div>
                    <div class="contact-info-value">Bengaluru, KA<br>India (Available Remote)</div>
                </div>
                <div class="info-card">
                    <div class="contact-info-label">////// LinkedIn</div>
                    <a href="https://www.linkedin.com/in/tharun-sebastian/" target="_blank" class="contact-info-value">tharun-sebastian ↗</a>
                </div>
                <div class="info-card">
                    <div class="contact-info-label">////// Phone</div>
                    <a href="tel:+919633568468" class="contact-info-value">+91 96335 68468</a>
                </div>
                <div class="info-card">
                    <div class="contact-info-label">////// Response Time</div>
                    <div class="contact-info-value" style="color: #42d392">Typically under 24 hours</div>
                </div>
            </div>

            <!-- Right: Contact Form -->
            <div class="contact-main animate-fade-up delay-2">
                <div class="contact-form-card">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-error">
                            @foreach($errors->all() as $err)
                                <div>{{ $err }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" id="contactForm">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="name">Your Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="John Doe" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">Email Address</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="john@example.com" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control" placeholder="Project Inquiry" value="{{ old('subject') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="message">Message</label>
                            <textarea id="message" name="message" class="form-control" rows="6" placeholder="Tell me about your project or inquiry..." required>{{ old('message') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" id="contactSubmitBtn" style="width: 100%; justify-content: center; margin-top: 1rem;">
                            Send Message →
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
