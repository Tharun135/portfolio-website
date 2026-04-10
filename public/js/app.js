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
   8. HERO CANVAS — Premium Mouse-Reactive Particle System
   ---------------------------------------------------------------- */
(function initHeroCanvas() {
  const canvas = document.getElementById('heroCanvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');

  let W, H, particles = [];
  const NUM = 120; // More particles for density
  let mouse = { x: null, y: null, radius: 150 };

  // Track mouse globally since canvas has pointer-events: none
  window.addEventListener('mousemove', (e) => {
    // Only track if mouse is within hero section bounds (roughly top part)
    if (e.clientY < H + 100) {
      const rect = canvas.getBoundingClientRect();
      mouse.x = e.clientX - rect.left;
      mouse.y = e.clientY - rect.top;
    } else {
      mouse.x = null;
      mouse.y = null;
    }
  });

  window.addEventListener('mouseleave', () => {
    mouse.x = null;
    mouse.y = null;
  });

  function resize() {
    W = canvas.width  = canvas.offsetWidth;
    H = canvas.height = canvas.offsetHeight;
  }

  class Particle {
    constructor() { this.reset(); }
    reset() {
      this.x    = Math.random() * W;
      this.y    = Math.random() * H;
      this.r    = Math.random() * 2 + 0.5;
      this.baseX = this.x;
      this.baseY = this.y;
      this.vx   = (Math.random() - 0.5) * 0.5;
      this.vy   = (Math.random() - 0.5) * 0.5;
      this.density = Math.random() * 30 + 1;
      
      // Assign either purple or cyan base color
      this.color = Math.random() > 0.5 ? '139, 92, 246' : '6, 182, 212';
    }
    
    update() {
      this.baseX += this.vx;
      this.baseY += this.vy;

      // Boundary check for drifting base position
      if (this.baseX < 0 || this.baseX > W) this.vx *= -1;
      if (this.baseY < 0 || this.baseY > H) this.vy *= -1;

      if (mouse.x != null) {
        let dx = mouse.x - this.baseX;
        let dy = mouse.y - this.baseY;
        let distance = Math.sqrt(dx * dx + dy * dy);
        let forceDirectionX = dx / distance;
        let forceDirectionY = dy / distance;
        
        let maxDistance = mouse.radius;
        let force = (maxDistance - distance) / maxDistance;
        let directionX = forceDirectionX * force * this.density;
        let directionY = forceDirectionY * force * this.density;

        if (distance < mouse.radius) {
          // Attract towards mouse
          this.x = this.baseX + directionX * 2;
          this.y = this.baseY + directionY * 2;
        } else {
          // Return to base smoothly
          if (this.x !== this.baseX) {
            let dxBase = this.x - this.baseX;
            this.x -= dxBase / 10;
          }
          if (this.y !== this.baseY) {
            let dyBase = this.y - this.baseY;
            this.y -= dyBase / 10;
          }
        }
      } else {
        this.x = this.baseX;
        this.y = this.baseY;
      }
    }
    
    draw() {
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.r, 0, Math.PI * 2);
      ctx.fillStyle = `rgba(${this.color}, 0.8)`;
      ctx.shadowBlur = 15; // Neon glow
      ctx.shadowColor = `rgba(${this.color}, 1)`;
      ctx.fill();
      ctx.shadowBlur = 0; // Reset for performance
    }
  }

  function drawConnections() {
    for (let i = 0; i < particles.length; i++) {
      for (let j = i + 1; j < particles.length; j++) {
        const dx = particles[i].x - particles[j].x;
        const dy = particles[i].y - particles[j].y;
        const dist = Math.sqrt(dx * dx + dy * dy);
        if (dist < 100) {
          ctx.beginPath();
          ctx.moveTo(particles[i].x, particles[i].y);
          ctx.lineTo(particles[j].x, particles[j].y);
          // Mixed gradient color
          ctx.strokeStyle = `rgba(139, 92, 246, ${(1 - dist / 100) * 0.2})`;
          ctx.lineWidth = 1;
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
    particles.length = 0;
    for (let i = 0; i < NUM; i++) particles.push(new Particle());
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
        tempEl.textContent = `EXP ${base} / ${delta > 0 ? '+' : ''}${delta}`;
      }
    }
  }, 1000);
})();

/* ----------------------------------------------------------------
   12. MAGNETIC CURSOR — High-fidelity attraction to interactive elements
   ---------------------------------------------------------------- */
(function initMagneticElements() {
  const magneticEls = document.querySelectorAll('.btn, .nav-link, .portfolio-card');
  
  magneticEls.forEach(el => {
    el.addEventListener('mousemove', e => {
      const rect = el.getBoundingClientRect();
      const x = e.clientX - rect.left - rect.width / 2;
      const y = e.clientY - rect.top - rect.height / 2;
      
      // Calculate pull based on card/button size
      const strength = el.classList.contains('portfolio-card') ? 0.05 : 0.35;
      
      gsap.to(el, {
        x: x * strength,
        y: y * strength,
        duration: 0.4,
        ease: 'power2.out'
      });
    });

    el.addEventListener('mouseleave', () => {
      gsap.to(el, {
        x: 0,
        y: 0,
        duration: 0.6,
        ease: 'elastic.out(1, 0.5)'
      });
    });
  });
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
