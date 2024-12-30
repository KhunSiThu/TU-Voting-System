<?php
require_once "../Components/header.php";
session_start();

if($_SESSION['user_email']) {
  header("Location: ./login.php?error"); 
}
?>

<div class="w-screen h-screen flex justify-center items-center">
  <form class="w-[300px] mx-auto" id="registrationForm" onsubmit="return validateForm()">

    <!-- Full Name -->
    <div class="mb-5">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Full Name</label>
      <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your name" />
      <span id="name-error" class="text-red-500 text-xs mt-1 hidden">Please enter your full name.</span>
    </div>

    <!-- Email -->
    <div class="mb-5">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
      <input type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@gmail.com" />
      <span id="email-error" class="text-red-500 text-xs mt-1 hidden">Please enter your email.</span>
    </div>

    <!-- Major -->
    <div class="mb-5">
      <label for="major" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Major</label>
      <select id="major" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="none">None</option>
        <option value="CE">Civil Engineering</option>
        <option value="EP">Electrical Power Engineering</option>
        <option value="EC">Electronic Engineering</option>
        <option value="ME">Mechanical Engineering</option>
      </select>
      <span id="major-error" class="text-red-500 text-xs mt-1 hidden">Please select a major.</span>
    </div>

    <!-- Password -->
    <div class="mb-5">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter password</label>
      <div class="relative">
        <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-2 flex items-center text-gray-500 dark:text-gray-300">
          <i id="password-icon" class="fas fa-eye"></i>
        </button>
      </div>
      <span id="password-error" class="text-red-500 text-xs mt-1 hidden"></span>
    </div>

    <div class="w-full flex justify-center items-center">
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </div>

    <p class="mt-3 text-sm text-center">Already have an account? <a href="./login.php" class="text-blue-600 hover:text-blue-800">Login</a></p>
  </form>
</div>

<script>
  // Toggle password visibility
  function togglePassword(fieldId) {
    const passwordField = document.getElementById(fieldId);
    const icon = document.getElementById(`${fieldId}-icon`);
    if (passwordField.type === "password") {
      passwordField.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    } else {
      passwordField.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  }

  // Password validation function
  function validatePassword(password) {
    if (!password.trim()) {
      return "Please enter your password.";
    } else if (password.length < 8) {
      return "Password must be at least 8 characters long.";
    } else if (!/[A-Z]/.test(password)) {
      return "Password must contain at least one uppercase letter.";
    } else if (!/\d/.test(password)) {
      return "Password must contain at least one number.";
    } else if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
      return "Password must contain at least one special character.";
    }
    return null;
  }

  // Form validation
  function validateForm() {
    // Hide all error messages initially
    document.querySelectorAll('.text-red-500').forEach(function(errorElement) {
      errorElement.classList.add('hidden');
    });

    // Get form values
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const major = document.getElementById("major").value;
    const password = document.getElementById("password").value;

    let isValid = true;

    // Validate name
    if (name === "") {
      document.getElementById("name-error").classList.remove('hidden');
      document.getElementById("name").focus();
      isValid = false;
    }

    // Validate email
    if (email === "") {
      document.getElementById("email-error").classList.remove('hidden');
      document.getElementById("email").focus();
      isValid = false;
    }

    // Validate major
    if (major === "none") {
      document.getElementById("major-error").classList.remove('hidden');
      document.getElementById("major").focus();
      isValid = false;
    }

    // Validate password
    const passwordError = validatePassword(password);
    if (passwordError) {
      document.getElementById("password-error").textContent = passwordError;
      document.getElementById("password-error").classList.remove('hidden');
      document.getElementById("password").focus();
      isValid = false;
    }

    // If all validations passed, submit form data to the server via AJAX
    if (isValid) {
      const formData = new FormData();
      formData.append('name', name);
      formData.append('email', email);
      formData.append('major', major);
      formData.append('password', password);

      fetch('../Controllers/register_user.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            document.querySelector("#loading").style.display = "flex"
            window.location.href = "../Controllers/sendVerifyCode.php"; // Redirect on successful registration
          } else {
            // Handle registration failure (email already exists)
            if (data.error) {
              document.getElementById("email-error").textContent = data.error;
              document.getElementById("email-error").classList.remove('hidden');
              document.getElementById("email").focus();
            } else {
              alert('Registration failed. Please try again later.');
            }
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('An error occurred during registration.');
        });

      return false; // Prevent default form submission
    }

    return false;
  }
</script>

<?php require_once "../Components/footer.php" ?>