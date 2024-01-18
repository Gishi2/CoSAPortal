var fileInput = document.getElementById('fileInput');
var conditionInput = document.getElementById('condition');

var titleInput = document.getElementById('title');
var subjectInput = document.getElementById('subject');
var priceInput = document.getElementById('price');
var descInput = document.getElementById('description');

var submitButton = document.getElementById('submit');

var imagePreviewContainer = document.getElementById('imagePreviewContainer');
var previewMessage = document.getElementById('previewMessage');

var popupPreview = document.getElementById('pop-up-preview');

fileInput.addEventListener('change', checkField);
fileInput.addEventListener('change', showImagePreview);

conditionInput.addEventListener('change', checkField)

titleInput.addEventListener('input', checkField);
subjectInput.addEventListener('input', checkField);
priceInput.addEventListener('input', checkField);
descInput.addEventListener('input', checkField);

function checkField(status) {
    var title = titleInput.value.trim() !== '';
    var subject = subjectInput.value.trim() !== '';
    var price = priceInput.value.trim() !== '';
    var desc = descInput.value.trim() !== '';
    var condition = conditionInput.value.trim() !== '';

    var fileSelected = fileInput.files.length > 0;
    if (status) {
        fileSelected = status;
    }

    submitButton.disabled = !(title && subject && price 
        && condition 
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