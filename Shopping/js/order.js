var buttonsClicked = [false, false];

function orderCheck() {
    document.getElementById('btn-cash').addEventListener('click', function() {
        handleButtonClick(0);
        checkButtons();
    });
    
    document.getElementById('btn-bank').addEventListener('click', function() {
        handleButtonClick(1);
        checkButtons();
    });
}

function handleButtonClick(index) {
    buttonsClicked[index] = !buttonsClicked[index];
}

function checkButtons() {
    var atLeastOneClicked = buttonsClicked.some((clicked) => {
        return clicked;
    });

    if (atLeastOneClicked) {
        alert('At least one button is clicked.');
    } else {
        alert('No button is clicked.');
    }
}

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