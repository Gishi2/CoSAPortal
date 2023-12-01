document.addEventListener('DOMContentLoaded', function() {
    let currentSlide = 1;
    const totalSlides = document.querySelectorAll('.slider img').length;
    const slider = document.querySelector('.slider');
  
    function showSlide(index) {
      slider.style.transform = `translateX(${-100 * (index - 1)}%)`;
      updateSliderNav(index);
    }
  
    function updateSliderNav(index) {
      document.querySelectorAll('.slider-nav a').forEach((navItem) => {
        navItem.classList.remove('active');
      });
      document.querySelector(`.slider-nav a[href="#slide-${index}"]`).classList.add('active');
    }
  
    function autoChangeSlide() {
      setInterval(function () {
        currentSlide = (currentSlide % totalSlides) + 1;
        showSlide(currentSlide);
      }, 5000); 
    }
  
    document.querySelectorAll('.slider-nav a').forEach((navItem, index) => {
      navItem.addEventListener('click', function (e) {
        e.preventDefault();
        currentSlide = index + 1;
        showSlide(currentSlide);
      });
    });

    // autoChangeSlide();
  });

function toggleMenu() {
    var menu = document.getElementById("fullscreenMenu");
    menu.style.display = menu.style.display === "none" ? "block" : "none";
  }
  