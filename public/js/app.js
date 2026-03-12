/**
 * IGLOO INC. — Main Application JavaScript
 * Handles: cursor, navbar, scroll animations, mobile menu, etc.
 */

'use strict';

/* ----------------------------------------------------------------
   1. CUSTOM CURSOR
   ---------------------------------------------------------------- */
(function initCursor() {
  const dot  = document.getElementById('cursorDot');
  const ring = document.getElementById('cursorRing');
  if (!dot || !ring) return;

  let mouseX = 0, mouseY = 0;
  let ringX = 0, ringY = 0;

  document.addEventListener('mousemove', (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
    dot.style.left = mouseX + 'px';
    dot.style.top  = mouseY + 'px';
  });

  function animateRing() {
    ringX += (mouseX - ringX) * 0.12;
    ringY += (mouseY - ringY) * 0.12;
    ring.style.left = ringX + 'px';
    ring.style.top  = ringY + 'px';
    requestAnimationFrame(animateRing);
  }
  animateRing();

  // Cursor hover effects
  document.querySelectorAll('a, button, .portfolio-card, .capability-card, .testimonial-card').forEach(el => {
    el.addEventListener('mouseenter', () => {
      dot.style.transform  = 'translate(-50%, -50%) scale(2)';
      ring.style.transform = 'translate(-50%, -50%) scale(1.6)';
      ring.style.borderColor = 'rgba(91,141,238,0.9)';
    });
    el.addEventListener('mouseleave', () => {
      dot.style.transform  = 'translate(-50%, -50%) scale(1)';
      ring.style.transform = 'translate(-50%, -50%) scale(1)';
      ring.style.borderColor = 'rgba(91,141,238,0.6)';
    });
  });
})();

/* ----------------------------------------------------------------
   2. SCROLL PROGRESS BAR
   ---------------------------------------------------------------- */
(function initScrollProgress() {
  const bar = document.getElementById('scrollProgress');
  if (!bar) return;
  window.addEventListener('scroll', () => {
    const scrollTop = window.scrollY;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    const pct = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
    bar.style.width = pct + '%';
  }, { passive: true });
})();

/* ----------------------------------------------------------------
   3. NAVBAR — scroll-based transparency
   ---------------------------------------------------------------- */
(function initNavbar() {
  const navbar = document.getElementById('navbar');
  if (!navbar) return;

  const threshold = 50;
  let lastY = 0;

  window.addEventListener('scroll', () => {
    const y = window.scrollY;
    if (y > threshold) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
    lastY = y;
  }, { passive: true });
})();

/* ----------------------------------------------------------------
   4. MOBILE MENU
   ---------------------------------------------------------------- */
(function initMobileMenu() {
  const hamburger  = document.getElementById('hamburger');
  const mobileMenu = document.getElementById('mobileMenu');
  if (!hamburger || !mobileMenu) return;

  hamburger.addEventListener('click', () => {
    const isOpen = mobileMenu.classList.toggle('open');
    hamburger.classList.toggle('active', isOpen);
    hamburger.setAttribute('aria-expanded', isOpen.toString());
    mobileMenu.setAttribute('aria-hidden', (!isOpen).toString());
  });

  // Close on link click
  mobileMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      mobileMenu.classList.remove('open');
      hamburger.classList.remove('active');
      hamburger.setAttribute('aria-expanded', 'false');
      mobileMenu.setAttribute('aria-hidden', 'true');
    });
  });
})();

/* ----------------------------------------------------------------
   5. INTERSECTION OBSERVER — fade/slide animations
   ---------------------------------------------------------------- */
(function initScrollAnimations() {
  const animatedEls = document.querySelectorAll(
    '.animate-fade-up, .animate-slide-in, .animate-count'
  );
  if (!animatedEls.length) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('in-view');
        observer.unobserve(entry.target);
      }
    });
  }, {
    root: null,
    threshold: 0.12,
    rootMargin: '0px 0px -60px 0px',
  });

  animatedEls.forEach(el => observer.observe(el));
})();

/* ----------------------------------------------------------------
   6. 3D TILT EFFECT on portfolio cards and feature images
   ---------------------------------------------------------------- */
(function initTiltEffect() {
  const tiltEls = document.querySelectorAll('.portfolio-card, .feature-image-wrapper, .testimonial-card');

  tiltEls.forEach(el => {
    el.addEventListener('mousemove', (e) => {
      const rect = el.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const cx = rect.width / 2;
      const cy = rect.height / 2;
      const rotX = ((y - cy) / cy) * -6;
      const rotY = ((x - cx) / cx) *  6;
      el.style.transform = `perspective(600px) rotateX(${rotX}deg) rotateY(${rotY}deg) translateY(-4px)`;
    });
    el.addEventListener('mouseleave', () => {
      el.style.transform = '';
    });
  });
})();

/* ----------------------------------------------------------------
   7. SMOOTH SCROLL for anchor links
   ---------------------------------------------------------------- */
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', e => {
    const href = a.getAttribute('href');
    if (href === '#') return;
    const target = document.querySelector(href);
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});

/* ----------------------------------------------------------------
   8. HERO CANVAS — Particle system
   ---------------------------------------------------------------- */
(function initHeroCanvas() {
  const canvas = document.getElementById('heroCanvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');

  let W, H, particles = [];
  const NUM = 80;

  function resize() {
    W = canvas.width  = canvas.offsetWidth;
    H = canvas.height = canvas.offsetHeight;
  }

  class Particle {
    constructor() { this.reset(); }
    reset() {
      this.x    = Math.random() * W;
      this.y    = Math.random() * H;
      this.r    = Math.random() * 1.8 + 0.4;
      this.vx   = (Math.random() - 0.5) * 0.3;
      this.vy   = (Math.random() - 0.5) * 0.3 - 0.15;
      this.life = Math.random();
      this.maxLife = Math.random() * 0.5 + 0.5;
    }
    update() {
      this.x += this.vx;
      this.y += this.vy;
      this.life += 0.003;
      if (this.life > this.maxLife || this.x < 0 || this.x > W || this.y < 0 || this.y > H) {
        this.reset();
        this.y = H + 5;
      }
    }
    draw() {
      const t = this.life / this.maxLife;
      const alpha = t < 0.2 ? t / 0.2 : t > 0.8 ? (1 - t) / 0.2 : 1;
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.r, 0, Math.PI * 2);
      ctx.fillStyle = `rgba(91, 141, 238, ${alpha * 0.5})`;
      ctx.fill();
    }
  }

  function drawConnections() {
    for (let i = 0; i < particles.length; i++) {
      for (let j = i + 1; j < particles.length; j++) {
        const dx = particles[i].x - particles[j].x;
        const dy = particles[i].y - particles[j].y;
        const dist = Math.sqrt(dx * dx + dy * dy);
        if (dist < 120) {
          ctx.beginPath();
          ctx.moveTo(particles[i].x, particles[i].y);
          ctx.lineTo(particles[j].x, particles[j].y);
          ctx.strokeStyle = `rgba(91,141,238,${(1 - dist / 120) * 0.12})`;
          ctx.lineWidth = 0.5;
          ctx.stroke();
        }
      }
    }
  }

  function animate() {
    ctx.clearRect(0, 0, W, H);
    particles.forEach(p => { p.update(); p.draw(); });
    drawConnections();
    requestAnimationFrame(animate);
  }

  window.addEventListener('resize', () => {
    resize();
    particles.forEach(p => p.reset());
  });

  resize();
  for (let i = 0; i < NUM; i++) particles.push(new Particle());
  animate();
})();

/* ----------------------------------------------------------------
   9. STATS COUNTER ANIMATION
   ---------------------------------------------------------------- */
(function initCounters() {
  const counters = document.querySelectorAll('.stat-number');
  if (!counters.length) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      observer.unobserve(entry.target);
      // Values are already formatted strings, just do a quick flash animation
      const el = entry.target;
      el.style.opacity = '0';
      el.style.transform = 'scale(0.8)';
      setTimeout(() => {
        el.style.transition = 'opacity 0.5s ease, transform 0.5s cubic-bezier(0.16,1,0.3,1)';
        el.style.opacity = '1';
        el.style.transform = 'scale(1)';
      }, 100);
    });
  }, { threshold: 0.5 });

  counters.forEach(c => observer.observe(c));
})();

/* ----------------------------------------------------------------
   10. FORM ENHANCEMENTS
   ---------------------------------------------------------------- */
(function initForms() {
  const forms = document.querySelectorAll('form');
  forms.forEach(form => {
    const inputs = form.querySelectorAll('.form-control');
    inputs.forEach(input => {
      input.addEventListener('focus', () => {
        input.closest('.form-group')?.classList.add('focused');
      });
      input.addEventListener('blur', () => {
        input.closest('.form-group')?.classList.remove('focused');
      });
    });
  });
})();

/* ----------------------------------------------------------------
   11. DATA TICKER — HUD data display updates
   ---------------------------------------------------------------- */
(function initDataTicker() {
  const dataItems = document.querySelectorAll('.hero-data .data-item');
  if (!dataItems.length) return;

  // Simulate live data updates
  let tick = 0;
  setInterval(() => {
    tick++;
    if (tick % 5 === 0) {
      const tempEl = dataItems[2];
      if (tempEl) {
        const base = (29 + Math.random() * 2).toFixed(2);
        const delta = ((Math.random() - 0.5) * 2).toFixed(2);
        tempEl.textContent = `TEMP ${base} / ${delta > 0 ? '+' : ''}${delta}`;
      }
    }
  }, 1000);
})();

/* ----------------------------------------------------------------
   12. PAGE LOAD ANIMATION
   ---------------------------------------------------------------- */
(function initPageLoad() {
  document.body.style.opacity = '0';
  document.body.style.transition = 'opacity 0.5s ease';
  window.addEventListener('load', () => {
    setTimeout(() => {
      document.body.style.opacity = '1';
    }, 80);
  });
})();
