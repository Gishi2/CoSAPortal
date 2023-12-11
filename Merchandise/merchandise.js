const overlay = document.getElementById('overlay');
const popUp = document.getElementById('pop-up');

function openPopUp() {
  overlay.style.display = 'flex';
  popUp.style.display = 'flex';
  void overlay.offsetWidth;
  overlay.style.opacity = '1';
}

function closePopUp() {
  overlay.style.display = 'none';
  popUp.style.display = 'none';
}

function increaseQuantity() {
  var quantityInput = document.querySelector('.quantity-input');
  var currentQuantity = parseInt(quantityInput.value);
  quantityInput.value = currentQuantity + 1;
}

function decreaseQuantity() {
  var quantityInput = document.querySelector('.quantity-input');
  var currentQuantity = parseInt(quantityInput.value);
  if (currentQuantity > 1) {
    quantityInput.value = currentQuantity - 1;
  }
}