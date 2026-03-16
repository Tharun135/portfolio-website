/**
 * IGLOO INC. — Advanced Interactions
 * Lenis smooth scroll + GSAP ScrollTrigger
 * Inspired by igloo.inc's scroll-driven 3D experience
 */

/* ─── Wait for everything ─────────────────────────── */
window.addEventListener('load', () => {

  /* ══════════════════════════════════════════════════
     1. LENIS SMOOTH SCROLL
     ══════════════════════════════════════════════════ */
  const lenis = new Lenis({
    duration: 1.5,
    easing: t => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    smoothWheel: true,
    smoothTouch: false,
    touchMultiplier: 2,
  });

  // Hook Lenis into GSAP ticker
  gsap.ticker.add(time => lenis.raf(time * 1000));
  gsap.ticker.lagSmoothing(0);

  // Keep ScrollTrigger in sync with Lenis
  lenis.on('scroll', ScrollTrigger.update);

  /* ══════════════════════════════════════════════════
     2. REGISTER SCROLLTRIGGER
     ══════════════════════════════════════════════════ */
  gsap.registerPlugin(ScrollTrigger);

  /* ══════════════════════════════════════════════════
     3. HERO PARALLAX — content drifts up as you scroll out
     ══════════════════════════════════════════════════ */
  const heroContent = document.querySelector('.hero-content');
  const splineWrapper = document.querySelector('.spline-wrapper');
  const heroCanvas  = document.querySelector('.hero-canvas');
  const heroScroll  = document.querySelector('.hero-scroll');
  const hudBrackets = document.querySelectorAll('.hud-bracket');

  if (heroContent) {
    gsap.to(heroContent, {
      scrollTrigger: { trigger: '.hero', start: 'top top', end: '60% top', scrub: 1 },
      y: -70, opacity: 0, ease: 'none',
    });
  }

  // Spline moves at slower rate — true parallax depth
  if (splineWrapper) {
    gsap.to(splineWrapper, {
      scrollTrigger: { trigger: '.hero', start: 'top top', end: 'bottom top', scrub: 1.5 },
      y: -35, ease: 'none',
    });
  }

  // HUD brackets fade + scale out
  if (hudBrackets.length) {
    gsap.to(Array.from(hudBrackets), {
      scrollTrigger: { trigger: '.hero', start: 'top top', end: '40% top', scrub: true },
      opacity: 0, scale: 0.8, ease: 'none',
    });
  }

  // Scroll indicator fades immediately
  if (heroScroll) {
    gsap.to(heroScroll, {
      scrollTrigger: { trigger: '.hero', start: 'top top', end: '20% top', scrub: true },
      opacity: 0, y: 20, ease: 'none',
    });
  }

  /* ══════════════════════════════════════════════════
     4. FLOATING ANIMATION — Spline wrapper gently bobs
     ══════════════════════════════════════════════════ */
  if (splineWrapper) {
    gsap.to(splineWrapper, {
      y: '+=14',
      duration: 3.2,
      ease: 'sine.inOut',
      yoyo: true,
      repeat: -1,
      // Only apply floating when hero is in view
      onStart: () => splineWrapper.style.willChange = 'transform',
    });
  }

  /* ══════════════════════════════════════════════════
     5. SECTION LABEL REVEALS (////// lines)
     ══════════════════════════════════════════════════ */
  gsap.utils.toArray('.section-code, .page-breadcrumb, .hero-code').forEach(el => {
    gsap.from(el, {
      scrollTrigger: { trigger: el, start: 'top 92%', toggleActions: 'play none none none' },
      x: -40, opacity: 0, duration: 0.7, ease: 'power2.out',
    });
  });

  /* ══════════════════════════════════════════════════
     6. SECTION HEADLINE CLIP-PATH REVEAL
        (matches igloo.inc glitch/sweep style)
     ══════════════════════════════════════════════════ */
  gsap.utils.toArray('.section-headline, .intro-headline, .cta-headline, .page-headline').forEach(el => {
    // Split into lines visually by wrapping content
    gsap.from(el, {
      scrollTrigger: { trigger: el, start: 'top 85%', toggleActions: 'play none none none' },
      opacity: 0, y: 55, duration: 1.1, ease: 'power3.out',
    });
  });

  /* ══════════════════════════════════════════════════
     7. STATS — Pop in with scale + stagger
     ══════════════════════════════════════════════════ */
  gsap.from('.stat-item', {
    scrollTrigger: { trigger: '.stats-section', start: 'top 80%', toggleActions: 'play none none none' },
    opacity: 0, y: 40, scale: 0.85,
    stagger: 0.15, duration: 0.9, ease: 'back.out(1.6)',
  });

  gsap.from('.stat-divider', {
    scrollTrigger: { trigger: '.stats-section', start: 'top 80%' },
    opacity: 0, rotation: 90,
    stagger: 0.2, duration: 0.5, ease: 'back.out(2)',
  });

  // Number count-up animation
  document.querySelectorAll('.stat-number').forEach(el => {
    const text = el.textContent.trim();
    const num = parseFloat(text.replace(/[^0-9.]/g, ''));
    const prefix = text.match(/^\D+/) ? text.match(/^\D+/)[0] : '';
    const suffix = text.match(/\D+$/) ? text.match(/\D+$/)[0] : '';
    if (!isNaN(num)) {
      const obj = { val: 0 };
      gsap.to(obj, {
        scrollTrigger: { trigger: el, start: 'top 85%', toggleActions: 'play none none none' },
        val: num, duration: 2, ease: 'power2.out',
        onUpdate: () => {
          const v = obj.val;
          el.textContent = prefix + (Number.isInteger(num) ? Math.round(v) : v.toFixed(1)) + suffix;
        },
      });
    }
  });

  /* ══════════════════════════════════════════════════
     8. INTRO SECTION — Staggered text block reveals
     ══════════════════════════════════════════════════ */
  gsap.from('.intro-body p', {
    scrollTrigger: { trigger: '.intro-body', start: 'top 85%', toggleActions: 'play none none none' },
    opacity: 0, y: 30,
    stagger: 0.2, duration: 0.9, ease: 'power2.out',
  });

  // Background image parallax
  const introBg = document.querySelector('.intro-bg-image img');
  if (introBg) {
    gsap.to(introBg, {
      scrollTrigger: {
        trigger: '.intro-section',
        start: 'top bottom', end: 'bottom top', scrub: 1,
      },
      y: -90, ease: 'none',
    });
  }

  /* ══════════════════════════════════════════════════
     9. FEATURE BLOCKS — Slide in from sides
        Left content slides from left, right visual from right
        Image has inner parallax as you scroll through
     ══════════════════════════════════════════════════ */
  document.querySelectorAll('.feature-block').forEach(block => {
    const isReverse = block.classList.contains('feature-block--reverse');
    const content   = block.querySelector('.feature-content');
    const visual    = block.querySelector('.feature-visual');
    const img       = block.querySelector('.feature-img');

    if (content) {
      gsap.from(content, {
        scrollTrigger: { trigger: block, start: 'top 72%', toggleActions: 'play none none none' },
        x: isReverse ? 70 : -70, opacity: 0,
        duration: 1.1, ease: 'power3.out',
      });
    }
    if (visual) {
      gsap.from(visual, {
        scrollTrigger: { trigger: block, start: 'top 72%', toggleActions: 'play none none none' },
        x: isReverse ? -70 : 70, opacity: 0,
        duration: 1.1, delay: 0.15, ease: 'power3.out',
      });
    }

    // Inner image parallax — slower than container scroll
    if (img) {
      gsap.to(img, {
        scrollTrigger: {
          trigger: block,
          start: 'top bottom', end: 'bottom top', scrub: 1,
        },
        y: -35, ease: 'none',
      });
    }
  });

  /* ══════════════════════════════════════════════════
     10. HOW IT WORKS — Pinned steps that stagger in
     ══════════════════════════════════════════════════ */
  gsap.from('.step-number', {
    scrollTrigger: { trigger: '.steps-grid', start: 'top 80%', toggleActions: 'play none none none' },
    scale: 0, opacity: 0,
    stagger: 0.12, duration: 0.5, ease: 'back.out(2.5)',
  });

  gsap.from('.step-card', {
    scrollTrigger: { trigger: '.steps-grid', start: 'top 75%', toggleActions: 'play none none none' },
    opacity: 0, y: 60,
    stagger: 0.13, duration: 0.9, ease: 'power3.out',
  });

  /* ══════════════════════════════════════════════════
     11. PORTFOLIO CARDS — Stagger reveal + Y-axis 3D tilt
     ══════════════════════════════════════════════════ */
  gsap.from('.portfolio-card', {
    scrollTrigger: { trigger: '.portfolio-grid', start: 'top 78%', toggleActions: 'play none none none' },
    opacity: 0, y: 80, rotateX: 8,
    stagger: 0.18, duration: 1.1, ease: 'power3.out',
    transformPerspective: 900,
  });

  /* ══════════════════════════════════════════════════
     12. CAPABILITIES GRID — Wave stagger from top-left
     ══════════════════════════════════════════════════ */
  gsap.from('.capability-card', {
    scrollTrigger: { trigger: '.capabilities-grid', start: 'top 80%', toggleActions: 'play none none none' },
    opacity: 0, scale: 0.82, y: 35,
    stagger: { amount: 0.9, grid: 'auto', from: 'start' },
    duration: 0.7, ease: 'back.out(1.5)',
  });

  /* ══════════════════════════════════════════════════
     13. INTEGRATIONS MARQUEE (Disabled - now static grid)
     ══════════════════════════════════════════════════ */
  /*
  const logos = document.querySelector('.integrations-logos');
  if (logos) {
    // Duplicate items for seamless looping
    const items = logos.innerHTML;
    logos.innerHTML = items + items + items;

    gsap.to(logos, {
      x: () => -(logos.scrollWidth / 3),
      duration: 18,
      ease: 'none',
      repeat: -1,
      modifiers: {
        x: gsap.utils.unitize(x => {
          const unit = logos.scrollWidth / 3;
          return ((parseFloat(x) % unit) - unit) + 'px';
        }),
      },
    });
  }
  */

  /* ══════════════════════════════════════════════════
     14. TESTIMONIAL CARDS
     ══════════════════════════════════════════════════ */
  gsap.from('.testimonial-card', {
    scrollTrigger: { trigger: '.testimonials-grid', start: 'top 80%', toggleActions: 'play none none none' },
    opacity: 0, y: 50,
    stagger: 0.15, duration: 1, ease: 'power3.out',
  });

  gsap.from('.logos-strip', {
    scrollTrigger: { trigger: '.logos-strip', start: 'top 90%', toggleActions: 'play none none none' },
    opacity: 0, y: 20, duration: 0.8, ease: 'power2.out',
  });

  /* ══════════════════════════════════════════════════
     15. CTA SECTION — Orb parallax + content reveal
     ══════════════════════════════════════════════════ */
  const orb1 = document.querySelector('.cta-orb-1');
  const orb2 = document.querySelector('.cta-orb-2');

  if (orb1) {
    gsap.to(orb1, {
      scrollTrigger: { trigger: '.cta-section', start: 'top bottom', end: 'bottom top', scrub: 1 },
      x: 80, y: -50, scale: 1.3, ease: 'none',
    });
  }
  if (orb2) {
    gsap.to(orb2, {
      scrollTrigger: { trigger: '.cta-section', start: 'top bottom', end: 'bottom top', scrub: 1 },
      x: -80, y: 50, scale: 1.2, ease: 'none',
    });
  }

  gsap.from('.cta-inner', {
    scrollTrigger: { trigger: '.cta-section', start: 'top 72%', toggleActions: 'play none none none' },
    opacity: 0, y: 70, scale: 0.94,
    duration: 1.3, ease: 'power3.out',
  });

  /* ══════════════════════════════════════════════════
     16. FOOTER REVEAL
     ══════════════════════════════════════════════════ */
  gsap.from('.footer-brand', {
    scrollTrigger: { trigger: '.footer', start: 'top 90%', toggleActions: 'play none none none' },
    opacity: 0, x: -40, duration: 0.9, ease: 'power3.out',
  });

  gsap.from('.footer-col', {
    scrollTrigger: { trigger: '.footer', start: 'top 90%', toggleActions: 'play none none none' },
    opacity: 0, y: 25,
    stagger: 0.1, duration: 0.8, ease: 'power2.out',
  });

  /* ══════════════════════════════════════════════════
     17. MAGNETIC BUTTONS — cursor attraction effect
     ══════════════════════════════════════════════════ */
  document.querySelectorAll('.btn').forEach(btn => {
    btn.addEventListener('mousemove', e => {
      const r = btn.getBoundingClientRect();
      const x = e.clientX - r.left - r.width / 2;
      const y = e.clientY - r.top  - r.height / 2;
      gsap.to(btn, { x: x * 0.28, y: y * 0.28, duration: 0.35, ease: 'power2.out' });
    });
    btn.addEventListener('mouseleave', () => {
      gsap.to(btn, { x: 0, y: 0, duration: 0.7, ease: 'elastic.out(1, 0.45)' });
    });
  });

  /* ══════════════════════════════════════════════════
     18. NAV LINK HOVER — underline slide effect
     ══════════════════════════════════════════════════ */
  document.querySelectorAll('.nav-link').forEach(link => {
    const underline = document.createElement('span');
    underline.style.cssText = `
      position:absolute; bottom:0; left:0;
      width:100%; height:1px;
      background: var(--clr-accent, #5b8dee);
      transform: scaleX(0); transform-origin: left;
      transition: transform 0.35s cubic-bezier(0.16,1,0.3,1);
    `;
    link.style.position = 'relative';
    link.style.overflow = 'hidden';
    link.appendChild(underline);

    link.addEventListener('mouseenter', () => underline.style.transform = 'scaleX(1)');
    link.addEventListener('mouseleave', () => underline.style.transform = 'scaleX(0)');
  });

  /* ══════════════════════════════════════════════════
     19. SCROLL PROGRESS BAR (GSAP scrub)
     ══════════════════════════════════════════════════ */
  const progressBar = document.getElementById('scrollProgress');
  if (progressBar) {
    ScrollTrigger.create({
      start: 'top top',
      end: 'max',
      scrub: 0.3,
      onUpdate: self => {
        progressBar.style.width = (self.progress * 100) + '%';
      },
    });
  }

  /* ══════════════════════════════════════════════════
     20. SECTION DIVIDER LINES — width sweep reveal
     ══════════════════════════════════════════════════ */
  gsap.utils.toArray('hr, .manifesto-divider').forEach(el => {
    gsap.from(el, {
      scrollTrigger: { trigger: el, start: 'top 90%', toggleActions: 'play none none none' },
      scaleX: 0, transformOrigin: 'left center',
      duration: 1.2, ease: 'power3.inOut',
    });
  });

  /* ══════════════════════════════════════════════════
     21. HUD DATA READOUT — live temp counter
     ══════════════════════════════════════════════════ */
  const heroDateEl = document.getElementById('heroDate');
  const heroTempEl = document.getElementById('heroTemp');

  if (heroDateEl) {
    const now = new Date();
    heroDateEl.textContent = `D ${String(now.getDate()).padStart(2,'0')}.${String(now.getMonth()+1).padStart(2,'0')}.${now.getFullYear()}`;
  }

  if (heroTempEl) {
    let base = 29 + Math.random() * 3;
    setInterval(() => {
      base += (Math.random() - 0.5) * 0.1;
      const delta = ((Math.random() - 0.5) * 4).toFixed(2);
      heroTempEl.textContent = `TEMP ${base.toFixed(2)} / ${delta > 0 ? '+' : ''}${delta}`;
    }, 1500);
  }

  /* ══════════════════════════════════════════════════
     22. REMOVE OLD CSS ANIMATION CLASS — hand off to GSAP
     ══════════════════════════════════════════════════ */
  // Pre-emptively add in-view to elements that are already visible
  document.querySelectorAll('.animate-fade-up, .animate-slide-in, .animate-count').forEach(el => {
    // Let GSAP own the animation; neutralize the CSS class system
    el.classList.add('in-view');
  });

  /* ══════════════════════════════════════════════════
     DONE — refresh ScrollTrigger after layout settle
     ══════════════════════════════════════════════════ */
  setTimeout(() => ScrollTrigger.refresh(), 500);

});
