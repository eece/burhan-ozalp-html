// Simple slider logic
const slider = document.querySelector('.hero-slider');
const prevBtn = document.querySelector('.slider-prev');
const nextBtn = document.querySelector('.slider-next');
const dots = document.querySelectorAll('.dot');

if (slider && prevBtn && nextBtn) {
  let currentSlide = 0;
  const slides = slider.querySelectorAll('.slide');
  
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

// Lucide icon replacement is handled by the CDN script in index.html
console.log('App initialized');
