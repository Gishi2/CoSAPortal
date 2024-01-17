function redirectToOrder(cartIDs) {
    var checkboxes = document.querySelectorAll('.product-checkbox');

    var atLeastOneChecked = Array.from(checkboxes).some(function (checkbox) {
        return checkbox.checked;
    });

    if (atLeastOneChecked) {
        document.cookie = "cartIDs=" + encodeURIComponent(JSON.stringify(cartIDs)) + "; path=/Shopping/order.php";
        window.location.href = 'order.php';
    } else {
        alert('Please select at least one product before proceeding.');
    }
}

function orderNow() {
    var checkedCheckboxes = document.querySelectorAll('.product-box input[type="checkbox"]:checked');

    var cartIds = Array.from(checkedCheckboxes).map((checkbox) => {
        return checkbox.value;
    });

    redirectToOrder(cartIds);
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

    if (allChecked) {
        parentCheckBox.checked = true;
    } else {
        parentCheckBox.checked = false;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var checkboxes = document.querySelectorAll('.product-checkbox');
    var parentCheckBox = document.getElementById('parent-checkbox');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateTotalPrice);
    })

    parentCheckBox.addEventListener('change', updateTotalPrice);
});

function updateTotalPrice() {
    var checkboxes = document.querySelectorAll('.product-checkbox');
    var subTotals = document.querySelectorAll('[id^="itemSubTotal"');
    var totalPriceText = document.getElementById('total-price');

    var total = 0;

    checkboxes.forEach(function (checkbox, index) {
        if (checkbox.checked) {
            var checkboxNumber = checkbox.id.replace('checkbox', '');

            if (document.getElementById('itemSubTotal' + checkboxNumber)) {
                total += parseFloat(subTotals[index].value);
            }
        }
    });

    totalPriceText.innerText = 'RM' + total.toFixed(2);
}

function confirmSubmit() {
    var confirmation = window.confirm("Are you sure you want to delete this cart?");
    
    return confirmation;
}

function goBack() {
    history.back();
}