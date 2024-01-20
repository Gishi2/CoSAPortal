function addToCartButton(counter, fromBuyButton = false) {

    const popUp = document.getElementById('pop-up-' + counter);
    const merchandiseElement = document.getElementById('pop-up-' + counter);
    const merchandiseId = merchandiseElement.dataset.merchandiseId;

    const productPrice = parseFloat(popUp.querySelector('.price').innerText.replace('RM', ''));
    const productQuantity = parseInt(popUp.querySelector('.quantity-input').value, 10);
    const selectedSizeButton = popUp.querySelector('.pop-up-size .size-btn.active');

    const areAllSizeButtonsDisabled = () => {
        const allSizeButtons = popUp.querySelectorAll('.pop-up-size .size-btn');
        return Array.from(allSizeButtons).every(button => button.disabled);
    }
    
    if (!selectedSizeButton && !areAllSizeButtonsDisabled()) {
        alert('Please select a size before adding to the cart.');
        return;
    } 

    const productSize = () => { 
        if (!areAllSizeButtonsDisabled()) {
            return selectedSizeButton.innerText;
        } else {
            return "none";
        }
    };
  
    const selectedProduct = {
      merchandiseId: merchandiseId,
      price: productPrice,
      quantity: productQuantity,
      sizes: productSize(),
    };
  
    closePopUp(counter);
    sendProductToServer(selectedProduct)
        .then(() => {
            if (!fromBuyButton) {
                successCart();
                setTimeout(() => {
                    redirectToInsertSuccess();
                }, 500);
            }
        })
        .catch(error => {
            console.error('Error:', error, '/');
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
        return response.json();
    })
    .then(data => {
        console.log('Server Response:', data);
        document.cookie = "cartIDs=" + data.cartId + "; path=/Shopping/order.php";
    })
    .catch(error => {
        console.error('Error:', error);

        if (error.response) {
            console.error('Response:', error.response);
        } else if (error instanceof TypeError && error.message.includes('Failed to fetch')) {
            console.error('Network error. Check your internet connection or server availability.');
        } else {
            console.error('Unknown error occurred.');
        }
    });
}

  