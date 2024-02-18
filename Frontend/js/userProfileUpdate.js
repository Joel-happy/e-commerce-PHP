/*-------------------------------------------
# Regex
-------------------------------------------*/
const USERNAME_REGEX = /^.{5,}$/;
const EMAIL_REGEX = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const PASSWORD_REGEX = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

/*-------------------------------------------
# DOM Elements
-------------------------------------------*/
document.addEventListener("DOMContentLoaded", function() {
  const usernameForm = document.getElementById("usernameForm");
  const emailForm = document.getElementById("emailForm");
  const passwordForm = document.getElementById("passwordForm");

  const newUsernameInput = document.getElementById("newUsername");
  const newEmailInput = document.getElementById("newEmail");
  const newPasswordInput = document.getElementById("newPassword");
  const newPasswordConfirmInput = document.getElementById("newPasswordConfirm");

  /*-------------------------------------------
  # Event Listeners
  -------------------------------------------*/

  // Username
  usernameForm.addEventListener("submit", function(event) {
    event.preventDefault();

    const newUsername = newUsernameInput.value;

    // Validate username
    if (!USERNAME_REGEX.test(newUsername)) {
      alert("Username must be at least 5 characters long.");
      return;
    }
    usernameForm.submit();
  })

  // Email
  emailForm.addEventListener("submit", function(event) {
    event.preventDefault();

    const newEmail = newEmailInput.value;

    // Validate email
    if (!EMAIL_REGEX.test(newEmail)) {
      alert("Please enter a valid email address.");
      return;
    }
    emailForm.submit();
  })

  // Password
  passwordForm.addEventListener("submit", function(event) {
    event.preventDefault();

    const newPassword = newPasswordInput.value;
    const newPasswordConfirm = newPasswordConfirmInput.value;

    // Check if passwords match
    if (newPassword !== newPasswordConfirm) {
      alert("Passwords do not match.");
      return;
    }
    
    // Validate password
    if (!PASSWORD_REGEX.test(newPassword)) {
      alert("Password must contain at least 8 characters, including a capital letter, a number, and a special character");
      return;
    }
    passwordForm.submit();
  })

});

/*-------------------------------------------
# Functions
-------------------------------------------*/

// Displays hidden input fields for updating user information
function showUpdateFields(field) {
  var updateField = document.getElementById(field + "Update");
  updateField.classList.toggle("hidden");
}