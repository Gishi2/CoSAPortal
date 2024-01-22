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

function increaseQuantity(popUpId) {
  var quantityInput = document.querySelector('#' + popUpId + ' .quantity-input');
  var currentQuantity = parseInt(quantityInput.value);
  quantityInput.value = currentQuantity + 1;
}

function decreaseQuantity(popUpId) {
  var quantityInput = document.querySelector('#' + popUpId + ' .quantity-input');
  var currentQuantity = parseInt(quantityInput.value);
  if (currentQuantity > 1) {
    quantityInput.value = currentQuantity - 1;
  }
}

function redirectToShopping() {
  window.location.href = '/Shopping/shopping-cart.php';
}

function triggerFileInput() {
  document.getElementById('fileInput').click();
}

function buyNowButton(counter) {
  const popUp = document.getElementById('pop-up-' + counter);
  const selectedSizeButton = popUp.querySelector('.pop-up-size .size-btn.active');

  const areAllSizeButtonsDisabled = () => {
    const allSizeButtons = popUp.querySelectorAll('.pop-up-size .size-btn');
    return Array.from(allSizeButtons).every(button => button.disabled);
  }

  const allButtonsDisabled = areAllSizeButtonsDisabled(); 

  if (allButtonsDisabled) {
    addToCartButton(counter, true);
    window.location.href = '/Shopping/order.php';
    // window.location.reload(true);
    return;
  }

  if (!selectedSizeButton) {
    alert('Please select a size before adding to the cart.');
    return;
  } else {
    addToCartButton(counter, true);
    window.location.href = '/Shopping/order.php';
    // window.location.reload(true);
  }
}

function triggerLink() {
  var merchandiseLink = document.getElementById('button-link');
  merchandiseLink.click();
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