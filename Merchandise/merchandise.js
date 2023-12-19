const overlay = document.getElementById('overlay');
const popUp = document.getElementById('pop-up');

let cart = [];

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

// the hover effect on the product size
document.addEventListener('DOMContentLoaded', () => {
  const sizeButtons = document.querySelectorAll('.size-btn');

  sizeButtons.forEach(button => {
      button.addEventListener('click', () => {
          sizeButtons.forEach(btn => btn.classList.remove('active'));

          button.classList.add('active');
      });
  });
});

function addToCartButton() {

  const popUp = document.getElementById('pop-up');

  const productName = popUp.querySelector('.name').innerText;
  const productPrice = parseFloat(popUp.querySelector('.price').innerText.replace('RM', ''));
  const productQuantity = parseInt(popUp.querySelector('.quantity-input').value, 10);
  const selectedSizeButton = popUp.querySelector('.pop-up-size .size-btn.active');

  if (!selectedSizeButton) {
      alert('Please select a size before adding to the cart.');
      return;
  }

  const productSize = selectedSizeButton.innerText; 

  const selectedProduct = {
    name: productName,
    price: productPrice,
    quantity: productQuantity,
    size: productSize,
  };

  console.log(selectedProduct);

  addToCart(selectedProduct); // display items

  sendProductToServer(selectedProduct); // put into the database
}

function sendProductToServer(product) {
  fetch('addToCart.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
      },
      body: JSON.stringify(product),
  })
  .then(response => response.json())
  .then(data => {
      console.log(data.message);
      // fetchCartItems();
  })
  .catch(error => {
      console.error('Error:', error);
  });
}

function addToCart(product) { // display cart box item
  cart.push(product);
  updateCart();
}

function updateCart() { // add to cart box item
  const cartContainer = document.getElementById('cart-container');

  cartContainer.innerHTML = '';

  cart.forEach((item, index) => {
      const cartItemElement = document.createElement('div');
      cartItemElement.className = `item-${index + 1}`;
      cartItemElement.textContent = `${item.name} - ${item.size} - $${item.price.toFixed(2)}`;
      cartContainer.appendChild(cartItemElement);
  });
}

// function fetchProducts() { // get product info
//   fetch('getProducts.php')
//   .then(response => response.json())
//   .then(products => {
//       if (products.length > 0) {
//           addToCart(products[0]);
//       }
//   })
//   .catch(error => {
//       console.error('Error fetching products:', error);
//   });
// }

// document.addEventListener('DOMContentLoaded', fetchProducts);

// function addToCart() {
//     const productName = document.querySelector('.name').innerText;
//     const productPrice = parseFloat(document.querySelector('.price').innerText.replace('RM', ''));
//     const productQuantity = parseInt(document.querySelector('.quantity-input').value);
//     const productSize = document.querySelector('.pop-up-size button.active')?.innerText;

//     // alert(`Product: ${productName}, ${productPrice}, ${productQuantity}, ${productSize}`);

//     if (productName && !isNaN(productPrice) && !isNaN(productQuantity) && productSize) {
//         cart.push({
//             name: productName,
//             price: productPrice,
//             quantity: productQuantity,
//             size: productSize
//         });

//         closePopUp();

//         updateCart();
//     } else {
//         alert('Please select a size and ensure quantity is valid.');
//     }
// }

// document.addEventListener('DOMContentLoaded', () => {
//   const addToCartButtons = document.querySelectorAll('.pop-up-btn'); // cart button
//   // const cartItems = document.getElementById('cart-items');
//   // const cartTotal = document.getElementById('cart-total');

//   // let cart = [];

//   addToCartButtons.forEach(button => {
//       button.addEventListener('click', () => {
//           const product = button.parentNode;
//           const productId = product.dataset.id;
//           const productName = product.dataset.name;
//           const productPrice = parseFloat(product.dataset.price);
//           const productSize = product.querySelector('#size').value;

//           cart.push({
//               id: productId,
//               name: productName,
//               price: productPrice,
//               size: productSize
//           });
//           updateCart(); // update front-end cart
//           sendToServer(cart); // update to server
//       });
//   });

//   function updateCart() {
      
//   }

//   function sendToServer(cartData) {
//       fetch('checkout.php', {
//           method: 'POST',
//           headers: {
//               'Content-Type': 'application/json',
//           },
//           body: JSON.stringify(cartData),
//       })
//       .then(response => response.json())
//       .then(data => {
//           console.log('Success:', data);
//       })
//       .catch((error) => {
//           console.error('Error:', error);
//       });
//   }
// });
