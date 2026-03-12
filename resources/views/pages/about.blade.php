@extends('layouts.app')

@section('title', 'About — Igloo Inc.')
@section('description', 'Learn about Igloo Inc., the company building the largest on-chain community and driving the consumer crypto revolution.')
@section('body-class', 'dark-body')

@section('content')
<!-- Page Hero -->
<div class="page-hero" style="background: var(--clr-bg-dark);">
    <span class="page-breadcrumb">////// About</span>
    <h1 class="page-headline">We Build the<br><em style="font-style:normal; background: linear-gradient(135deg, #5b8dee, #7cd4fd); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Future of IP</em></h1>
    <p class="page-sub">Born in 2021, Igloo Inc. is transforming how intellectual property is created, experienced, and owned — building the consumer crypto revolution from the ground up.</p>
</div>

<!-- About Content -->
<div class="page-content-section" style="background: var(--clr-bg-dark);">
    <div class="content-grid">
        <div class="content-body animate-fade-up">
            <h3>////// Our Story</h3>
            <p>Igloo Inc. was founded with a singular vision: to harness the power of blockchain technology to create a new model for consumer brands. We believe that intellectual property, digital collectibles, and communities can be born and thrive on-chain.</p>
            <p>Through our acquisition of Pudgy Penguins in 2021, a strategic move aimed at expanding our reach and capabilities, we began building the blueprint for the next generation of consumer IP companies.</p>

            <h3>////// Our Mission</h3>
            <p>Our mission is to create the largest on-chain community, driving the consumer crypto revolution. We do this by shifting from a brand-and-consumer approach to a brand-and-participant model — where every community member is a co-creator and stakeholder.</p>

            <h3>////// Our Approach</h3>
            <p>We focus on expanding vast ranges of content mediums, products, and experiences — driving people onchain into the new era of the internet. By harnessing the power of vibrant communities and rich IP universes, we're revolutionizing how IP is created and experienced.</p>
        </div>

        <div class="animate-fade-up delay-1">
            <h3 style="font-family: var(--font-mono); font-size: 0.75rem; letter-spacing: 0.15em; color: var(--clr-accent); margin-bottom: 1.5rem;">////// Leadership</h3>
            <div class="team-grid">
                @php
                $team = [
                    ['initials' => 'LL', 'name' => 'Luca Netz', 'role' => 'Chief Executive Officer'],
                    ['initials' => 'MR', 'name' => 'Mike Rosenthal', 'role' => 'Chief Operating Officer'],
                    ['initials' => 'TK', 'name' => 'Tommy Kessler', 'role' => 'Chief Creative Officer'],
                    ['initials' => 'AP', 'name' => 'Alex Pfleger', 'role' => 'Chief Technology Officer'],
                ];
                @endphp
                @foreach($team as $member)
                <div class="team-card animate-fade-up">
                    <div class="team-avatar">{{ $member['initials'] }}</div>
                    <div class="team-name">{{ $member['name'] }}</div>
                    <div class="team-role">{{ $member['role'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Values Section -->
<section style="background: var(--clr-surface); border-top: 1px solid var(--clr-border); border-bottom: 1px solid var(--clr-border); padding: 5rem var(--container-pad);">
    <div style="max-width: var(--container-max); margin: 0 auto;">
        <div class="section-header text-center animate-fade-up">
            <span class="section-code">////// Core Values</span>
            <h2 class="section-headline">What Drives Us</h2>
        </div>
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem;">
            @php
            $values = [
                ['icon' => '◈', 'title' => 'Community First', 'desc' => 'Every decision we make puts the community at the center. Our participants are not just holders — they are co-owners of the future we\'re building together.'],
                ['icon' => '⬡', 'title' => 'On-Chain Native', 'desc' => 'We believe the blockchain is the foundation of the next era of the internet. We build everything with on-chain ownership and transparency at the core.'],
                ['icon' => '◉', 'title' => 'Long-Term Vision', 'desc' => 'We think in decades, not quarters. Every company we build, every IP we create, is designed to compound in value and cultural relevance over time.'],
            ];
            @endphp
            @foreach($values as $v)
            <div class="capability-card animate-fade-up" style="border-radius: var(--r-lg);">
                <span class="cap-icon">{{ $v['icon'] }}</span>
                <h4 class="cap-name" style="font-size: 1.05rem; margin-bottom: 0.75rem;">{{ $v['title'] }}</h4>
                <p style="font-size: 0.88rem; line-height: 1.75; color: var(--clr-text-dim);">{{ $v['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section style="background: var(--clr-bg-dark); padding: 6rem var(--container-pad); text-align: center;">
    <span class="section-code">////// Join Us</span>
    <h2 class="section-headline animate-fade-up">Ready to Build Together?</h2>
    <p style="color: var(--clr-text-dim); margin-bottom: 2rem;" class="animate-fade-up delay-1">We're always looking for extraordinary people to join our mission.</p>
    <div class="animate-fade-up delay-2">
        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Get in Touch →</a>
    </div>
</section>
@endsection
