<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * PageController - Handles all static and dynamic page rendering
 */
class PageController extends Controller
{
    /**
     * Home / Landing Page
     */
    public function home()
    {
        $stats = [
            ['number' => '200+', 'label' => 'Portfolio Companies'],
            ['number' => '$4.2B', 'label' => 'Total Value Created'],
            ['number' => '50M+', 'label' => 'Community Members'],
            ['number' => '2021', 'label' => 'Founded'],
        ];

        $features = [
            [
                'icon' => 'crystal',
                'title' => 'On-Chain IP',
                'description' => 'We forge intellectual property natively on the blockchain, creating assets that are provably owned, infinitely licensable, and community-driven from inception.',
                'image' => 'feature_network.png',
                'position' => 'right',
            ],
            [
                'icon' => 'community',
                'title' => 'Community First',
                'description' => 'Our brand-and-participant model transforms passive consumers into active co-creators. Every holder becomes a stakeholder in the ecosystem\'s growth.',
                'image' => 'feature_data_stream.png',
                'position' => 'left',
            ],
            [
                'icon' => 'expansion',
                'title' => 'Cross-Media Expansion',
                'description' => 'From digital collectibles to physical products, animation to gaming — we expand IP across every medium to maximize cultural impact and community reach.',
                'image' => 'feature_network.png',
                'position' => 'right',
            ],
            [
                'icon' => 'ecosystem',
                'title' => 'Consumer Crypto Revolution',
                'description' => 'Leading the charge to make Web3 mainstream. We build products and experiences that onboard millions into the new era of the internet.',
                'image' => 'feature_data_stream.png',
                'position' => 'left',
            ],
        ];

        $portfolio = [
            [
                'code' => 'CO_01',
                'name' => 'Pudgy Penguins',
                'date' => '01.02.2020',
                'temp' => '34.05',
                'change' => '+01.14',
                'image' => 'portfolio_crystal_01.png',
                'slug' => 'pudgy-penguins',
                'description' => 'The flagship NFT collection and consumer brand that started it all.',
            ],
            [
                'code' => 'CO_02',
                'name' => 'Overpass',
                'date' => '06.01.2023',
                'temp' => '29.44',
                'change' => '-01.42',
                'image' => 'portfolio_dark_stone.png',
                'slug' => 'overpass',
                'description' => 'The next-generation consumer onboarding platform for Web3.',
            ],
            [
                'code' => 'CO_03',
                'name' => 'Abstract & Bridge',
                'date' => '15.08.2023',
                'temp' => '41.22',
                'change' => '+03.77',
                'image' => 'portfolio_crystal_01.png',
                'slug' => 'abstract-bridge',
                'description' => 'Infrastructure layer enabling seamless cross-chain experiences.',
            ],
        ];

        $testimonials = [
            [
                'quote' => 'Igloo Inc. has fundamentally changed how we think about community-driven IP. Their model is the future of consumer brands.',
                'author' => 'Sarah Chen',
                'role' => 'Partner, a16z Crypto',
                'company' => 'a16z',
            ],
            [
                'quote' => 'The Pudgy Penguins acquisition showed that on-chain IP can scale to mass market. Igloo proved the thesis.',
                'author' => 'Marcus Williams',
                'role' => 'Managing Director',
                'company' => 'Paradigm',
            ],
            [
                'quote' => 'What Igloo is building bridges the gap between Web3 and mainstream consumer culture in a way no one else has.',
                'author' => 'Elena Rodriguez',
                'role' => 'Chief Strategy Officer',
                'company' => 'Animoca Brands',
            ],
        ];

        $steps = [
            ['number' => '01', 'title' => 'Acquire', 'desc' => 'We identify and acquire undervalued IP with strong community foundations and cultural resonance.'],
            ['number' => '02', 'title' => 'Transform', 'desc' => 'We reposition and expand the IP across digital and physical mediums using our proven playbook.'],
            ['number' => '03', 'title' => 'Scale', 'desc' => 'Community-driven growth amplifies reach while our infrastructure scales the ecosystem globally.'],
            ['number' => '04', 'title' => 'Expand', 'desc' => 'New portfolio companies join the ecosystem, creating network effects that benefit the entire community.'],
        ];

        return view('pages.home', compact('stats', 'features', 'portfolio', 'testimonials', 'steps'));
    }

    /**
     * About Page
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Portfolio Page
     */
    public function portfolio()
    {
        $items = [
            ['code' => 'CO_01', 'name' => 'Pudgy Penguins', 'slug' => 'pudgy-penguins', 'image' => 'portfolio_crystal_01.png', 'date' => '01.02.2020'],
            ['code' => 'CO_02', 'name' => 'Overpass', 'slug' => 'overpass', 'image' => 'portfolio_dark_stone.png', 'date' => '06.01.2023'],
            ['code' => 'CO_03', 'name' => 'Abstract', 'slug' => 'abstract', 'image' => 'portfolio_crystal_01.png', 'date' => '15.08.2023'],
        ];

        return view('pages.portfolio', compact('items'));
    }

    /**
     * Portfolio Single Item
     */
    public function portfolioItem($slug)
    {
        return view('pages.portfolio-item', compact('slug'));
    }

    /**
     * Manifesto Page
     */
    public function manifesto()
    {
        return view('pages.manifesto');
    }

    /**
     * Contact Page
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Privacy Policy Page
     */
    public function privacy()
    {
        return view('pages.privacy');
    }

    /**
     * Terms of Service Page
     */
    public function terms()
    {
        return view('pages.terms');
    }
}
