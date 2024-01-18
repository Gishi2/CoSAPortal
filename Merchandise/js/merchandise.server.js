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
    sendProductToServer(selectedProduct)
        .then(() => {
            successCart();
            setTimeout(() => {
                redirectToInsertSuccess();
            }, 500);
        })
        .catch(error => {
            console.error('Error:', error);
        });
  }

function redirectToInsertSuccess() {
    window.location.href = '/Merchandise/merchandise.php?insertsuccessful';
}
  
function sendProductToServer(product) {
    return fetch('includes/insertCart.inc.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(product),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
  