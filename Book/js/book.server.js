function addToCartButton(counter, fromBuyButton = false) {

    const popUp = document.getElementById('pop-up-' + counter);
    const bookElement = document.getElementById('pop-up-' + counter);
    const bookId = bookElement.dataset.bookId;

    const productPrice = parseFloat(popUp.querySelector('.price').innerText.replace('RM', ''));
    const bookCondition = document.getElementById('star-value').value;

    const selectedProduct = {
        bookId: bookId,
        price: productPrice,
        quantity: 1,
        condition: bookCondition,
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
    window.location.href = '/Book/book.php?insertsuccessful';
}

function sendProductToServer(product) {
    return fetch('includes/insertBookCart.inc.php', {
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
        document.cookie = document.cookie = "cartIDs=" + data.cartId + "; path=/Shopping/book-order.php"
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

  