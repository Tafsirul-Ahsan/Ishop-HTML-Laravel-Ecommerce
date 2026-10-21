
document.addEventListener('DOMContentLoaded', function () {
    const slider = document.getElementById('flashSaleProducts');
    const section = document.getElementById('flash-sale');

    if (!slider || !section) return;

    const nextBtn = section.querySelector('.sale-next');
    const prevBtn = section.querySelector('.sale-prev');

    function getScrollAmount() {
        const product = slider.querySelector('.sale-product');
        if (!product) return slider.clientWidth;

        const styles = window.getComputedStyle(slider);
        const gap = parseFloat(styles.columnGap) || 0;

        return (product.getBoundingClientRect().width + gap) * 3;
    }

    nextBtn?.addEventListener('click', function () {
        slider.scrollBy({
            left: getScrollAmount(),
            behavior: 'smooth'
        });
    });

    prevBtn?.addEventListener('click', function () {
        slider.scrollBy({
            left: -getScrollAmount(),
            behavior: 'smooth'
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const slider = document.getElementById('heroSlider');
    const dotsContainer = document.getElementById('heroDots');

    if (!slider || !dotsContainer) return;

    const slides = slider.querySelectorAll('.slider-content');
    const dots = dotsContainer.querySelectorAll('.hero-dot');
    const prev = document.querySelector('.hero-prev');
    const next = document.querySelector('.hero-next');

    let current = 0;
    let timer;

    function showSlide(index) {
        current = (index + slides.length) % slides.length;

        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === current);
        });

        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === current);
        });
    }

    function startAutoplay() {
        clearInterval(timer);
        timer = setInterval(() => showSlide(current + 1), 4000);
    }

    prev.addEventListener('click', () => {
        showSlide(current - 1);
        startAutoplay();
    });

    next.addEventListener('click', () => {
        showSlide(current + 1);
        startAutoplay();
    });

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
            startAutoplay();
        });
    });

    showSlide(0);
    startAutoplay();
});
document.querySelectorAll('.products-wrapper').forEach(function(wrapper) {
  const track = wrapper.querySelector('.products-track');
  const prev = wrapper.querySelector('.product-prev');
  const next = wrapper.querySelector('.product-next');

  function scrollAmount() {
    const card = track.querySelector('.product-card');
    const gap = parseFloat(getComputedStyle(track).gap) || 0;
    return card ? (card.getBoundingClientRect().width + gap) * 3 : track.clientWidth;
  }

  prev.addEventListener('click', function() {
    track.scrollBy({left: -scrollAmount(), behavior: 'smooth'});
  });
  next.addEventListener('click', function() {
    track.scrollBy({left: scrollAmount(), behavior: 'smooth'});
  });
});
const categoriesTrack = document.getElementById('categoriesTrack');
document.getElementById('categoriesPrev').addEventListener('click', () => {
  categoriesTrack.scrollBy({left: -categoriesTrack.clientWidth * 0.75, behavior: 'smooth'});
});
document.getElementById('categoriesNext').addEventListener('click', () => {
  categoriesTrack.scrollBy({left: categoriesTrack.clientWidth * 0.75, behavior: 'smooth'});
});

document.querySelectorAll('.selling-action').forEach(function(button){
  button.addEventListener('click', function(){
    const icon = button.querySelector('i');
    icon.classList.remove('bi-arrow-repeat');
    icon.classList.add('bi-check2');
    button.setAttribute('aria-label', 'Product refreshed');
    setTimeout(function(){
      icon.classList.remove('bi-check2');
      icon.classList.add('bi-arrow-repeat');
      button.setAttribute('aria-label', 'Refresh product');
    }, 900);
  });
});


document.querySelectorAll('.product-section .products-wrapper').forEach(function (wrapper) {
    const track = wrapper.querySelector('.products-track');
    const prev = wrapper.querySelector('.product-prev');
    const next = wrapper.querySelector('.product-next');

    if (!track || !prev || !next) return;

    prev.addEventListener('click', function () {
        track.scrollBy({
            left: -track.clientWidth,
            behavior: 'smooth'
        });
    });

    next.addEventListener('click', function () {
        track.scrollBy({
            left: track.clientWidth,
            behavior: 'smooth'
        });
    });
});

 