function redirectToOrder(cartID) {
    var checkboxes = document.querySelectorAll('.product-checkbox');

    var atLeastOneChecked = Array.from(checkboxes).some(function (checkbox) {
        return checkbox.checked;
    });

    if (atLeastOneChecked) {
        window.location.href = 'order.php?id=' + cartID;
    } else {
        alert('Please select at least one product before proceeding.');
    }
}

window.onload = () => {
    updateTotalPrice();
}

document.addEventListener('DOMContentLoaded', function () {
    var checkboxes = document.querySelectorAll('.product-checkbox');
    var parentCheckBox = document.getElementById('parent-checkbox');

    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', checkboxParentState);
    });

    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', updateTotalPrice);
    });

    parentCheckBox.addEventListener('change', () => {
        checkboxes.forEach((checkbox) => {
            checkbox.checked = parentCheckBox.checked;
        });
    });
});

function checkboxParentState() {
    var checkboxes = document.querySelectorAll('.product-checkbox');
    var parentCheckBox = document.getElementById('parent-checkbox');

    var allChecked = Array.from(checkboxes).every(function (checkbox) {
        return checkbox.checked;
    });

    console.log(allChecked);

    if (allChecked) {
        parentCheckBox.checked = true;
    } else {
        parentCheckBox.checked = false;
    }
}

function updateTotalPrice() {
    var checkboxes = document.querySelectorAll('.product-checkbox');
    var totalPriceText = document.getElementById('total-price');

    var total = 0;

    checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
            total += parseFloat(checkbox.value);
        }
    });

    totalPriceText.innerText = 'RM' + total.toFixed(2);
}