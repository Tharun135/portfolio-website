{{-- ============================================================
     FOOTER COMPONENT
     Dark footer with links, manifesto, and social icons
     ============================================================ --}}
<footer class="footer" role="contentinfo">
    <!-- Footer Grid -->
    <div class="footer-inner">

        <!-- Brand Column -->
        <div class="footer-brand">
            <a href="{{ route('home') }}" class="footer-logo">iGLOO</a>
            <span class="footer-tagline">// Copyright © {{ date('Y') }}</span>
            <p class="footer-company">Igloo, Inc.<br>All Rights Reserved.</p>
            <p class="footer-mission">Our mission is to create the largest on-chain community, driving the consumer crypto revolution.</p>
        </div>

        <!-- Product Links -->
        <div class="footer-col">
            <h4 class="footer-heading">////// Product</h4>
            <ul class="footer-links" role="list">
                <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                <li><a href="{{ route('manifesto') }}">Manifesto</a></li>
                <li><a href="#">Ecosystem</a></li>
                <li><a href="#">Token</a></li>
                <li><a href="#">Governance</a></li>
            </ul>
        </div>

        <!-- Company Links -->
        <div class="footer-col">
            <h4 class="footer-heading">////// Company</h4>
            <ul class="footer-links" role="list">
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="#">Team</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="#">Press Kit</a></li>
            </ul>
        </div>

        <!-- Resources Links -->
        <div class="footer-col">
            <h4 class="footer-heading">////// Resources</h4>
            <ul class="footer-links" role="list">
                <li><a href="#">Blog</a></li>
                <li><a href="#">Documentation</a></li>
                <li><a href="#">Whitepaper</a></li>
                <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                <li><a href="{{ route('terms') }}">Terms of Service</a></li>
            </ul>
        </div>

        <!-- Social Links -->
        <div class="footer-col">
            <h4 class="footer-heading">////// Connect</h4>
            <ul class="footer-social" role="list">
                <li>
                    <a href="#" class="social-link" aria-label="Twitter / X">
                        <svg class="social-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.742l7.732-8.844L1.254 2.25H8.08l4.254 5.622 5.91-5.622zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77z" fill="currentColor"/>
                        </svg>
                        X / Twitter
                    </a>
                </li>
                <li>
                    <a href="#" class="social-link" aria-label="LinkedIn">
                        <svg class="social-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" fill="currentColor"/>
                        </svg>
                        LinkedIn
                    </a>
                </li>
                <li>
                    <a href="#" class="social-link" aria-label="Medium">
                        <svg class="social-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.54 12a6.8 6.8 0 01-6.77 6.82A6.8 6.8 0 010 12a6.8 6.8 0 016.77-6.82A6.8 6.8 0 0113.54 12zM20.96 12c0 3.54-1.51 6.42-3.38 6.42-1.87 0-3.39-2.88-3.39-6.42s1.52-6.42 3.39-6.42 3.38 2.88 3.38 6.42M24 12c0 3.17-.53 5.75-1.19 5.75-.66 0-1.19-2.58-1.19-5.75s.53-5.75 1.19-5.75C23.47 6.25 24 8.83 24 12z" fill="currentColor"/>
                        </svg>
                        Medium
                    </a>
                </li>
                <li>
                    <a href="#" class="social-link" aria-label="Discord">
                        <svg class="social-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z" fill="currentColor"/>
                        </svg>
                        Discord
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Footer Bottom Bar -->
    <div class="footer-bottom">
        <p class="footer-copyright">Igloo, Inc. © {{ date('Y') }} All rights reserved.</p>
        <div class="footer-bottom-links">
            <a href="{{ route('privacy') }}">Privacy</a>
            <a href="{{ route('terms') }}">Terms</a>
            <a href="#">Cookie Policy</a>
        </div>
        <div class="footer-ticker">
            <span class="ticker-item">// DATA.SYS ON.LINE {{ date('d.m.Y') }}</span>
        </div>
    </div>

    <!-- Decorative Background -->
    <div class="footer-bg-gradient"></div>
</footer>
