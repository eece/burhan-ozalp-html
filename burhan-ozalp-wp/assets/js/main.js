/**
 * Burhan Özalp Theme JavaScript Controls
 */
document.addEventListener('DOMContentLoaded', () => {
  // Mobile Menu Toggle logic
  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  const mobileMenuCloseBtn = document.getElementById('mobile-menu-close');
  const mobileMenu = document.getElementById('mobile-menu');

  const toggleMenu = () => {
    if (mobileMenu) {
      mobileMenu.classList.toggle('translate-x-full');
      document.body.classList.toggle('overflow-hidden');
    }
  };

  if (mobileMenuBtn) {
    mobileMenuBtn.addEventListener('click', toggleMenu);
  }

  if (mobileMenuCloseBtn) {
    mobileMenuCloseBtn.addEventListener('click', toggleMenu);
  }

  // Mobile Language Dropdown Toggle
  const mobileLangBtns = document.querySelectorAll('.mobile-lang-btn');
  mobileLangBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      const menu = btn.nextElementSibling;
      if (menu) {
        menu.classList.toggle('hidden');
      }
    });
  });

  document.addEventListener('click', () => {
    const mobileLangMenus = document.querySelectorAll('.mobile-lang-menu');
    mobileLangMenus.forEach(menu => {
      menu.classList.add('hidden');
    });
  });

  // Mobile Accordion Logic
  const accordionBtns = document.querySelectorAll('.mobile-accordion-btn');
  accordionBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const content = btn.nextElementSibling;
      const icon = btn.querySelector('i');
      
      if (content) {
        content.classList.toggle('hidden');
      }
      if (icon) {
        icon.classList.toggle('fa-plus');
        icon.classList.toggle('fa-minus');
      }
    });
  });

  // Simple slider logic
  const slider = document.querySelector('.hero-slider');
  const prevBtn = document.querySelector('.slider-prev');
  const nextBtn = document.querySelector('.slider-next');
  const dots = document.querySelectorAll('.dot');

  if (slider && prevBtn && nextBtn) {
    let currentSlide = 0;
    const slides = slider.querySelectorAll('.slide');
    
    if (slides.length > 0) {
      const showSlide = (n) => {
        slides.forEach((s, i) => {
          s.style.opacity = '0';
          s.style.visibility = 'hidden';
          s.style.zIndex = '0';
          const content = s.querySelector('.animate-fade-in-right');
          if (content) content.style.animation = 'none';
          if (dots[i]) {
            dots[i].classList.remove('bg-[#8b6e4e]');
            dots[i].classList.add('hover:bg-[#8b6e4e]/50');
          }
        });
        
        currentSlide = (n + slides.length) % slides.length;
        
        slides[currentSlide].style.opacity = '1';
        slides[currentSlide].style.visibility = 'visible';
        slides[currentSlide].style.zIndex = '1';
        
        if (dots[currentSlide]) {
          dots[currentSlide].classList.add('bg-[#8b6e4e]');
          dots[currentSlide].classList.remove('hover:bg-[#8b6e4e]/50');
        }
        
        // Force reflow and re-trigger animation
        const content = slides[currentSlide].querySelector('.animate-fade-in-right');
        if (content) {
          void content.offsetWidth;
          content.style.animation = '';
        }
      };

      prevBtn.addEventListener('click', () => showSlide(currentSlide - 1));
      nextBtn.addEventListener('click', () => showSlide(currentSlide + 1));
      
      dots.forEach((dot, index) => {
        dot.addEventListener('click', () => showSlide(index));
      });
      
      // Auto slide
      let autoSlideInterval = setInterval(() => showSlide(currentSlide + 1), 5000);

      // Reset interval on manual interaction
      const resetInterval = () => {
        clearInterval(autoSlideInterval);
        autoSlideInterval = setInterval(() => showSlide(currentSlide + 1), 5000);
      };

      prevBtn.addEventListener('click', resetInterval);
      nextBtn.addEventListener('click', resetInterval);
      dots.forEach(dot => dot.addEventListener('click', resetInterval));
    }
  }

  console.log('Doç. Dr. Burhan Özalp theme scripts initialized');
});
