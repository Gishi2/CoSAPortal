var fileInput = document.getElementById('fileInput');
var checkboxes = document.querySelectorAll('.checkbox-size input[type="checkbox"]');

var nameInput = document.getElementById('name');
var stockInput = document.getElementById('stock');
var priceInput = document.getElementById('price');
var descInput = document.getElementById('description');

var submitButton = document.getElementById('submit');

var imagePreviewContainer = document.getElementById('imagePreviewContainer');
var previewMessage = document.getElementById('previewMessage');

var popupPreview = document.getElementById('pop-up-preview');

fileInput.addEventListener('change', checkField);
fileInput.addEventListener('change', showImagePreview);

nameInput.addEventListener('input', checkField);
stockInput.addEventListener('input', checkField);
priceInput.addEventListener('input', checkField);
descInput.addEventListener('input', checkField);

checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', checkField);
});

function checkField(fileStatus) {
    var name = nameInput.value.trim() !== '';
    var stock = stockInput.value.trim() !== '';
    var price = priceInput.value.trim() !== '';
    var desc = descInput.value.trim() !== '';

    var fileSelected = fileInput.files.length > 0;
    fileSelected = fileStatus;

    var atLeastOneChecked = Array.from(checkboxes).some((checkbox) => {
        return checkbox.checked;
    });

    submitButton.disabled = !(name && stock && price && desc 
        && atLeastOneChecked 
        && fileSelected);
}

function showImagePreview() {
    if (fileInput.files.length > 0) {
        imagePreviewContainer.innerHTML = '';
        previewMessage.textContent = '';
        popupPreview.innerHTML = '';

        var previewImage = document.createElement('img');
        imagePreviewContainer.style.display = 'flex';

        var popupImage = document.createElement('img');
        previewMessage.style.display = 'block';

            var reader = new FileReader();
            reader.onload = function (e) {
                previewImage.src = e.target.result;
                popupImage.src = e.target.result;

                imagePreviewContainer.appendChild(previewImage);
                popupPreview.appendChild(popupImage);

                previewMessage.textContent = `(${fileInput.files.length}) image selected.`; 
            };

        reader.readAsDataURL(fileInput.files[0]);
    }
}

function previewImage() {
    const overlay = document.getElementById('overlay');
    const popup = document.getElementById('pop-up-preview');

    overlay.style.display = 'flex';
    popup.style.display = 'flex';
}

function closePreview() {
    const overlay = document.getElementById('overlay');
    const popup = document.getElementById('pop-up-preview');

    overlay.style.display = 'none';
    popup.style.display = 'none';
}