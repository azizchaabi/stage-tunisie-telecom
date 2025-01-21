<div class="relative">
  <div id="carousel" class="overflow-hidden">
    <div class="flex transition-transform duration-700" id="slides">
      <div class="min-w-full">
        <img src="/img/1920x600.jpg" class="w-full rounded-3xl" alt="First slide">
      </div>
      <div class="min-w-full">
        <img src="/img/bannie-re-centrale-ipv6_1920x600-13.png" class="w-full rounded-3xl" alt="Second slide">
      </div>
      <div class="min-w-full">
        <img src="/img/roaming-pass-partout-1920x600-1.jpg" class="w-full rounded-3xl" alt="Third slide">
      </div>
    </div>
  </div>
  <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 text-white text-2xl focus:outline-none hover:text-yellow-400 transition-colors duration-300">
    &larr; 
  </button>
  <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 text-white text-2xl focus:outline-none hover:text-yellow-400 transition-colors duration-300">
    &rarr; 
  </button>
</div>



<script>
  const slides = document.getElementById('slides');
  const prevButton = document.getElementById('prev');
  const nextButton = document.getElementById('next');
  let index = 0;
  const totalSlides = slides.children.length;

  function updateSlides() {
    const offset = -index * 100;
    slides.style.transform = `translateX(${offset}%)`;
  }

  function nextSlide() {
    index = (index + 1) % totalSlides;
    updateSlides();
  }

  function prevSlide() {
    index = (index - 1 + totalSlides) % totalSlides;
    updateSlides();
  }

  nextButton.addEventListener('click', nextSlide);
  prevButton.addEventListener('click', prevSlide);

  // Auto-scroll functionality
  setInterval(nextSlide, 5000); // Change slide every 3 seconds
</script>

{{$slot}}
