function toggleActive(buttonId) {
    var buttons = document.querySelectorAll('#payment button');
    var activeButtonValueInput = document.getElementById('activeButtonValue');

    buttons.forEach(function(button) {
        button.classList.remove('active');
    });

    var clickedButton = document.getElementById(buttonId);
    clickedButton.classList.add('active');

    activeButtonValueInput.value = clickedButton.value;
    console.log(activeButtonValueInput.value);
}

function validateForm() {
    var activeButton = document.querySelector('#payment button.active');

    if (!activeButton) {
        alert('Please select a payment method.');
        return false;
    }
    var confirmation = window.confirm("You've successfully placed an order!");

    if (confirmation) {
        window.location.href = '/Shopping/purchase-list.php';
    }

    return confirmation;
}

function goBack() {
    history.back();
}