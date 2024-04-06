// Get the form and password inputs
const form = document.getElementById('signupForm');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirmPassword');

// Add an event listener for form submission
form.addEventListener('submit', function(event) {
    // Check if the passwords match
    if (passwordInput.value !== confirmPasswordInput.value) {
        alert('Passwords do not match!');
        event.preventDefault(); // Prevent form submission
    }
});