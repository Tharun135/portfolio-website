import './bootstrap';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import Lenis from '@studio-freight/lenis';

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger);

window.addEventListener('load', () => {
  // Pre-emptively add in-view to everything so GSAP can calculate the final 'visible' state correctly
  document.querySelectorAll('.animate-fade-up, .animate-slide-in, .animate-count').forEach(el => {
    el.classList.add('in-view');
  });

  /* ══════════════════════════════════════════════════
     1. LENIS SMOOTH SCROLL (Cinematic Inertia)
     ══════════════════════════════════════════════════ */
  const lenis = new Lenis({
    duration: 1.8,
    easing: t => 1 - Math.pow(1 - t, 4),
    smoothWheel: true,
    smoothTouch: false,
    touchMultiplier: 1.5,
  });

  // Hook Lenis into GSAP ticker
  gsap.ticker.add(time => lenis.raf(time * 1000));
  gsap.ticker.lagSmoothing(0);

  // Keep ScrollTrigger in sync with Lenis
  lenis.on('scroll', ScrollTrigger.update);

  /* ══════════════════════════════════════════════════
     2. HERO PARALLAX
     ══════════════════════════════════════════════════ */
  const heroContent = document.querySelector('.hero-content');
  const splineWrapper = document.querySelector('.spline-wrapper');
  
  if (heroContent) {
    gsap.fromTo(heroContent, 
      { opacity: 1, scale: 1, y: 0 },
      {
        scrollTrigger: { 
          trigger: '.hero', 
          start: 'top top', 
          end: 'bottom top', 
          scrub: 1.2,
          invalidateOnRefresh: true 
        },
        y: -150, 
        scale: 0.85,
        opacity: 0, 
        ease: 'power1.inOut',
        immediateRender: true
      }
    );
  }

  // Floating animation
  if (splineWrapper) {
    gsap.to(splineWrapper, {
      y: '+=14',
      duration: 3.2,
      ease: 'sine.inOut',
      yoyo: true,
      repeat: -1,
    });
  }

  /* ══════════════════════════════════════════════════
     3. STATS COUNT UP
     ══════════════════════════════════════════════════ */
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
     4. MAGNETIC BUTTONS (Professional Hover)
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

  // Global Scroll Refresh
  const refreshScrollTrigger = () => {
    ScrollTrigger.refresh();
    lenis.scrollTo(window.scrollY, { immediate: true });
  };
  setTimeout(refreshScrollTrigger, 200);

});
