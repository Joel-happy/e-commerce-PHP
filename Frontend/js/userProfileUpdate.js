// Displays hidden input fields for updating user information
function showUpdateFields(field) {
    var updateField = document.getElementById(field + "Update");
    updateField.classList.toggle("hidden");
}