const overlay = document.getElementById('overlay');

function openPopUp(counter) {
  var popUp = document.getElementById('pop-up-' + counter);
  overlay.style.display = 'flex';
  popUp.style.display = 'flex';
  void overlay.offsetWidth;
  overlay.style.opacity = '1';
}

function closePopUp(counter) {
  overlay.style.display = 'none';

  var popUp = document.getElementById('pop-up-' + counter);
  popUp.style.display = 'none';
}

function redirectToShopping() {
  window.location.href = '/Shopping/shopping-cart.php';
}

function triggerFileInput() {
  document.getElementById('fileInput').click();
}

function buyNowButton(counter) {
  addToCartButton(counter, true);
  window.location.href = '/Shopping/book-order.php';
}

function goBack() {
  history.back();
}

function successCart() {
  var successPopup = document.getElementById('successPopup');

  successPopup.style.display = 'flex';

  setTimeout(function () {
      successPopup.style.display = 'none';
  }, 3000);
}

document.addEventListener('DOMContentLoaded', () => {
  const sizeButtons = document.querySelectorAll('.size-btn'); 

  sizeButtons.forEach(button => {
      button.addEventListener('click', () => {
          sizeButtons.forEach(btn => btn.classList.remove('active'));

          if (!button.disabled) {
              button.classList.add('active');
          }
      });
  });
});

function getStarRating(condition) {
  switch (condition) {
      case 'like_new':
          return 5;
      case 'very_good':
          return 4;
      case 'good':
          return 3;
      case 'acceptable':
          return 2;
      default:
          return 0;
  }
}

function renderStars(rating) {
  console.log()
  const starRatingContainer = document.getElementById('star-rating');
  var starValue = document.getElementById('star-value').value;
  var rating = getStarRating(starValue);
  // starRatingContainer.innerHTML = '';

  for (let i = 1; i <= 5; i++) {
      const star = document.createElement('span');
      star.className = `star ${i <= rating ? 'star-filled' : ''}`;
      star.innerHTML = '&#9733;';
      starRatingContainer.appendChild(star);
  }
}

document.addEventListener('DOMContentLoaded', function () {
  const cartIcon = document.getElementById('nav-cart-icon');
  const cartBox = document.getElementById('cart-container');

  cartIcon.addEventListener('mouseover', function () {
    cartBox.style.display = 'flex';
  });

  cartBox.addEventListener('mouseout', function (e) {
    if (!cartIcon.contains(e.relatedTarget) && !cartBox.contains(e.relatedTarget)) {
        cartBox.style.display = 'none';
    }
  });
});