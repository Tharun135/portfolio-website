@extends('layouts.app')

@section('title', 'Manifesto — Igloo Inc.')
@section('description', 'The Igloo Inc. manifesto: our belief in on-chain IP, community-powered brands, and the consumer crypto revolution.')
@section('body-class', 'dark-body')

@section('content')
<div class="manifesto-content" style="background: var(--clr-bg-dark); min-height: 100vh;">
    <!-- Page Header -->
    <div class="manifesto-pre">////// Manifesto</div>
    <h1 class="manifesto-title animate-fade-up">Our Belief System</h1>
    <hr class="manifesto-divider">

    <div class="manifesto-body animate-fade-up delay-1">
        <h3>////// Summary</h3>
        <p>Igloo Inc. was founded in 2021 with a singular mission: to create the largest on-chain community, driving the consumer crypto revolution.</p>
        <p>We believe in a future where intellectual property, digital collectibles, and communities are born and thrive on the blockchain. Through our work, we are building a new model for consumer brands — one that shifts from a brand-and-consumer approach to a brand-and-participant model.</p>
        <p>Our business strategy focuses on expanding a vast range of content mediums, products, and experiences — driving people onchain into the new era of the internet.</p>

        <hr class="manifesto-divider">
        <h3>/// Discover</h3>

        <h3>////// The New Model</h3>
        <p>Traditional IP companies extract value from their communities. They sell products, capture attention, and retain control. The community is a consumer — passive, transactional, and ultimately replaceable.</p>
        <p>We reject this model entirely.</p>
        <p>At Igloo Inc., we believe the most powerful brands of the next decade will be built on-chain — where every participant is a co-owner, every holder is a stakeholder, and the community's success is the brand's success. This is the brand-and-participant model, and it changes everything.</p>

        <hr class="manifesto-divider">
        <h3>////// On-Chain IP</h3>
        <p>Intellectual property has always been controlled by institutions — studios, labels, publishers. Blockchain technology changes the fundamental nature of IP ownership. Digital assets can be provably owned, programmatically licensed, and composably integrated into any application or experience.</p>
        <p>We are not just a Web3 company. We are building the infrastructure for a new category of consumer brand that is native to this new paradigm. Every IP we develop, every character we bring to life, every collection we launch — it is built with on-chain ownership at its core.</p>

        <hr class="manifesto-divider">
        <h3>////// The Consumer Crypto Revolution</h3>
        <p>Crypto's greatest opportunity is not in finance — it is in culture. The next wave of global adoption will come through entertainment, gaming, collectibles, and community experiences. It will come through brands that people love and want to belong to.</p>
        <p>By harnessing the power of our vibrant community and the rich, imaginative universes we create, we are revolutionizing the way IP is created and experienced. We are building the bridge between the on-chain world and mainstream consumer culture.</p>
        <p>This is our mission. This is our manifesto.</p>
    </div>

    <div class="animate-fade-up delay-2" style="margin-top: 3rem;">
        <a href="{{ route('portfolio') }}" class="btn btn-outline">Explore Our Portfolio →</a>
    </div>
</div>
@endsection
