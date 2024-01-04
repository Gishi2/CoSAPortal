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
  
    closePopUp(counter);
    successCart();
    sendProductToServer(selectedProduct, refreshCartContent);
  }
  
  function sendProductToServer(product, callback) {
    fetch('includes/carthandler.inc.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(product),
    })
    .then(response => response.json())
    .then(data => {
        if (callback && typeof callback === 'function') {
            callback(data);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function refreshCartContent(data) {
    const cartContentElement = document.getElementById('cart-container');
    
    if (cartContentElement) {
        cartContentElement.innerHTML = data.cartContent;
    }
}

  