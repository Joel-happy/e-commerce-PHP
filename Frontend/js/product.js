/*-------------------------------------------
# Functions
-------------------------------------------*/
// Set limitations for product price field
function validatePrice(input) {
    // Replace any non-numeric characters except the decimap point
    input.value = input.value.replace(/[^0-9.]/g, '');

    // Limit the input to two decimal places
    let parts = input.value.split('.');
    if (parts.length > 1) {
        // Keep only the first two characters after the decimal point
        parts[1] = parts[1].slice(0,2);
        input.value = parts.join('.');
    }

    // Ensure only one decimal point is allowed
    let nbDecimalPoints = input.value.split('.').length - 1;
    if (nbDecimalPoints > 1) {
        input.value = input.value.substring(0, input.value.lastIndexOf('.'));
    }
}

// Open update modal filled with product details
function openUpdateModal(product) {
    // Parse the JSON string back into a JavaScript object
    var productObj = JSON.parse(product);

    // Populate form fields with current product details
    document.getElementById("productId").value = productObj.id;
    document.getElementById("productName").value = productObj.name;
    document.getElementById("productDescription").value = productObj.description;
    document.getElementById("productCategory").value = productObj.category;
    document.getElementById("productPrice").value = productObj.price;

    // Trigger the modal using Bootstrap's modal API
    var updateModal = new bootstrap.Modal(document.getElementById('updateModal'));
    updateModal.show();
}

/*-------------------------------------------
# General
-------------------------------------------*/
var updateModalElement = document.getElementById('updateModal');

// Close modal when clicking on the close button
updateModalElement.querySelector('.close').onclick = function() {
    var updateModal = bootstrap.Modal.getInstance(updateModalElement);
    updateModal.hide();
};

// Close modal when clicking outside of it
window.onclick = function(event) {
    if (event.target === updateModalElement) {
        var updateModal = bootstrap.Modal.getInstance(updateModalElement);
        updateModal.hide();
    }
};