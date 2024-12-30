<?php
require_once "../Components/header.php";
session_start();

session_unset();

if (isset($_GET['error'])) {
    echo "
    <div id='errorBox' class='w-screen flex justify-center items-center absolute top-8'>
        <div class='max-w-lg mx-auto mt-6  bg-red-100 border-l-4 border-red-500 text-red-700 p-4 shadow-md rounded-lg'>
            <div class='flex'>
                <div class='flex-shrink-0'>
                    <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5 text-red-500' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                        <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 12h2m-1-1v2m6.293-5.293l1.414 1.414a8 8 0 11-11.314 0L12 3m0 0L6.707 7.707A8 8 0 0012 21V3z' />
                    </svg>
                </div>
                <div class='ml-3'>
                    <p class='font-medium'>Account Already Exists</p>
                    <p class='mt-2 text-sm'>It looks like you already have an account. Please login using your registered email: 
                        <strong>" . $_SESSION['user_email'] . "</strong>.
                    </p>
                    <p class='mt-2 text-sm'>
                        If you forgot your password, you can <a href='reset_password.php' class='text-blue-600 hover:text-blue-800'>reset it here</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
    ";
}
?>


<div class="w-screen h-screen flex justify-center items-center">
    <form class="w-[300px] mx-auto" id="loginForm" onsubmit="return handleLogin(event)">

        <!-- Email Input -->
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your email" />
            <span id="email-error" class="text-red-500 text-xs mt-1 hidden">Please enter your email.</span>
        </div>

        <!-- Password Input -->
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <div class="relative">
                <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-2 flex items-center text-gray-500 dark:text-gray-300">
                    <i id="password-icon" class="fas fa-eye"></i>
                </button>
            </div>
            <span id="password-error" class="text-red-500 text-xs mt-1 hidden">Please enter a valid password.</span>
        </div>
        <p class=" text-sm "><a href="./forgot_password.php" class="text-blue-600 hover:text-blue-800">Forgot Password?</a></p>

        <!-- Submit Button -->
        <div class="w-full flex justify-center items-center mt-5">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
        </div>

        <!-- Sign Up Link -->
        <p class="mt-3 text-sm text-center">Don't have an account? <a href="./signup.php" class="text-blue-600 hover:text-blue-800">Sign Up</a></p>
    </form>
</div>

<!-- Include Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

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

    // Handle form submission using Fetch API
    async function handleLogin(event) {
        event.preventDefault(); // Prevent default form submission

        // Hide previous error messages
        document.querySelectorAll('.text-red-500').forEach(function(errorElement) {
            errorElement.classList.add('hidden');
        });

        // Get form values
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        // Client-side validation
        if (!email || !password) {
            if (!email) {
                document.getElementById("email-error").classList.remove("hidden");
            }
            if (!password) {
                document.getElementById("password-error").classList.remove("hidden");
            }
            return;
        }

        // Prepare form data to be sent
        const formData = new FormData();
        formData.append("email", email);
        formData.append("password", password);

        try {
            // Send data to PHP backend using Fetch API
            const response = await fetch("../Controllers/login_process.php", {
                method: "POST",
                body: formData
            });

            const result = await response.json(); // Parse JSON response from PHP

            if (result.status === "success") {
                // Redirect or show success message
                window.location.href = "../Views/home.php"; // Replace with your redirect page
            } else {
                // Show error message in password error span if login failed
                if (result.message === "Incorrect password!") {
                    document.getElementById("password-error").classList.remove("hidden");
                    document.getElementById("password-error").textContent = result.message;
                } else if (result.message === "User not found!") {
                    // Handle other error messages as needed
                    document.getElementById("email-error").classList.remove("hidden");
                    document.getElementById("email-error").textContent = result.message;
                }
            }
        } catch (error) {
            console.error("Error during login:", error);
            alert("An error occurred. Please try again.");
        }
    }
</script>

<?php require_once "./Components/footer.php" ?>