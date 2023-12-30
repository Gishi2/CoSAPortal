let cart = [];

function addToCartButton(counter) {

    const popUp = document.getElementById('pop-up-' + counter);
    const merchandiseElement = document.getElementById('pop-up-' + counter);
    const merchandiseId = merchandiseElement.dataset.merchandiseId;

    const productPrice = parseFloat(popUp.querySelector('.price').innerText.replace('RM', ''));
    const productQuantity = parseInt(popUp.querySelector('.quantity-input').value, 10);
    const selectedSizeButton = popUp.querySelector('.pop-up-size .size-btn.active');
  
    if (!selectedSizeButton) {
        alert('Please select a size before adding to the cart.');
        return;
    }
  
    const productSize = selectedSizeButton.innerText; 
  
    const selectedProduct = {
      merchandiseId: merchandiseId,
      price: productPrice,
      quantity: productQuantity,
      sizes: productSize,
    };
  
    console.log(selectedProduct);
    closePopUp(counter);
    sendProductToServer(selectedProduct);
  }
  
  function sendProductToServer(product) {
    fetch('carthandler.inc.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(product),
    })
    .catch(error => {
        console.error('Error:', error);
    });
  }
  
  // function addToCart(product) { // display cart box item
  //   cart.push(product);
  //   updateCart();
  // }
  
  // function updateCart() {
  //   const cartContainer = document.getElementById('cart-container');
  
  //   cartContainer.innerHTML = '';

  //   const header = document.createElement('h3');
  //   header.textContent = `Recently added Product`;
  //   cartContainer.appendChild(header);
  
  //   cart.forEach((item, index) => {
  //       const cartItemElement = document.createElement('div');
  //       cartItemElement.className = `cart-item-${index + 1}`;
  //       cartItemElement.textContent = `${item.name} - ${item.size} - $${item.price.toFixed(2)}`;
  //       cartContainer.appendChild(cartItemElement);
  //   });
  // }