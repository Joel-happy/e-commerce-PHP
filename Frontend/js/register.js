/*-------------------------------------------
# Regex
-------------------------------------------*/
const USERNAME_REGEX = /^.{5,}$/;
const EMAIL_REGEX = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const PASSWORD_REGEX = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

/*-------------------------------------------
# DOM Elements
-------------------------------------------*/
const form = document.getElementById("registerForm");
const usernameInput = document.getElementById("username");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("confirmPassword");

/*-------------------------------------------
# Event Listener
-------------------------------------------*/
form.addEventListener("submit", function(event) {
  event.preventDefault();

  const username = usernameInput.value;
  const email = emailInput.value;
  const password = passwordInput.value;
  const confirmPassword = confirmPasswordInput.value;

  // Check if passwords match
  if (password !== confirmPassword) {
    alert("Passwords do not match.");
    return;
  }

  // Validate username
  if (!USERNAME_REGEX.test(username)) {
    alert("Username must be at least 5 characters long.");
    return;
  }

  // Validate email
  if (!EMAIL_REGEX.test(email)) {
    alert("Please enter a valid email address.");
    return;
  }

  // Validate password
  if (!PASSWORD_REGEX.test(password)) {
    alert("Password must contain at least 8 characters, including a capital letter, a number, and a special character");
    return;
  }
  
  form.submit();
})
