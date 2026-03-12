@extends('layouts.app')

@section('title', 'Contact — Igloo Inc.')
@section('description', 'Get in touch with Igloo Inc. — partnerships, press, and investment inquiries.')
@section('body-class', 'dark-body')

@section('content')
<div style="background: var(--clr-bg-dark); min-height: 100vh; padding-top: var(--nav-h);">
    <div style="max-width: var(--container-max); margin: 0 auto; padding: clamp(3rem, 8vw, 6rem) var(--container-pad);">
        <span class="page-breadcrumb">////// Contact</span>
        <h1 class="page-headline animate-fade-up">Let's Build<br>Together</h1>
        <p class="page-sub animate-fade-up delay-1">Whether you're a potential partner, investor, or creator — we'd love to hear from you.</p>

        <div class="contact-grid" style="margin-top: 4rem;">
            <!-- Left: Contact Info -->
            <div class="animate-fade-up delay-1">
                <div class="contact-info-item">
                    <div class="contact-info-label">////// Email</div>
                    <div class="contact-info-value">hello@igloo.inc</div>
                </div>
                <div class="contact-info-item">
                    <div class="contact-info-label">////// Headquarters</div>
                    <div class="contact-info-value">New York, NY<br>United States</div>
                </div>
                <div class="contact-info-item">
                    <div class="contact-info-label">////// For Press</div>
                    <div class="contact-info-value">press@igloo.inc</div>
                </div>
                <div class="contact-info-item">
                    <div class="contact-info-label">////// For Partnerships</div>
                    <div class="contact-info-value">partners@igloo.inc</div>
                </div>
                <div class="contact-info-item">
                    <div class="contact-info-label">////// Follow Us</div>
                    <div style="display: flex; gap: 1rem; margin-top: 0.5rem;">
                        <a href="#" class="btn btn-outline btn-sm">X / Twitter</a>
                        <a href="#" class="btn btn-outline btn-sm">LinkedIn</a>
                    </div>
                </div>
            </div>

            <!-- Right: Contact Form -->
            <div class="animate-fade-up delay-2">
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
                            <input type="text" id="name" name="name" class="form-control" placeholder="Luca Netz" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="hello@example.com" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Partnership Inquiry" value="{{ old('subject') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="message">Message</label>
                        <textarea id="message" name="message" class="form-control" rows="6" placeholder="Tell us about your project or inquiry..." required>{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="contactSubmitBtn" style="width: 100%; justify-content: center;">
                        Send Message →
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
