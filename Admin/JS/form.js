const eyeIcon = document.querySelector(".eye-icon");
const pass = document.querySelector("#password");
const nameEmail = document.querySelector("#name_email");
const loginBtn = document.querySelector("#login-btn");
const form = document.querySelector("#login-form");

// Select error message containers
const emailError = document.querySelector(".emailErro");
const passError = document.querySelector(".passErro");

// Toggle visibility of password
eyeIcon.addEventListener("click", () => {
    if (eyeIcon.classList.contains("fa-eye-slash")) {
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
        pass.type = "text";
    } else {
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
        pass.type = "password";
    }
});

// Show error messages below the fields
function showInlineNotification(inputField, message, errorContainer) {
    // Clear any previous error messages
    errorContainer.textContent = "";

    // Display the error message if any
    if (message) {
        errorContainer.textContent = message;
    }
}

// Email validation via AJAX
function validateEmailWithAJAX(email) {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../Controllers/checkEmail.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.error) {
                    reject(response.error);  // Reject with error message
                } else {
                    resolve(response.valid);  // Resolve if valid
                }
            } else {
                reject("Error contacting the server.");
            }
        };

        xhr.onerror = function () {
            reject("Network error occurred.");
        };

        xhr.send("name_email=" + encodeURIComponent(email));  // Send the email via POST
    });
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
    return null; // No errors
}

// Login button validation
loginBtn.addEventListener("click", async function (event) {
    event.preventDefault(); // Prevent the form from submitting immediately

    let isValid = true;

    // Clear previous error messages before validation
    showInlineNotification(nameEmail, "", emailError);
    showInlineNotification(pass, "", passError);

    const emailValue = nameEmail.value.trim();

    // Validate email via AJAX
    if (!emailValue) {
        nameEmail.focus();
        showInlineNotification(nameEmail, "Please enter your username or email.", emailError);
        isValid = false;
    } else {
        try {
            await validateEmailWithAJAX(emailValue); // Validate email using AJAX
        } catch (error) {
            showInlineNotification(nameEmail, error, emailError);
            isValid = false;
        }
    }

    // Validate password
    const passwordError = validatePassword(pass.value);
    if (passwordError) {
        pass.focus();
        showInlineNotification(pass, passwordError, passError);
        isValid = false;
    }

    if (isValid) {
        
        form.action = "../Controllers/sendVerifyCode.php"; // Set form action
        form.submit(); // Submit the form

        document.querySelector('#loading').style.display = 'flex';
    }
});

// Optional: Clear error messages when the user starts typing
nameEmail.addEventListener("input", function () {
    showInlineNotification(nameEmail, "", emailError);  // Clear error message for email
});

pass.addEventListener("input", function () {
    showInlineNotification(pass, "", passError);  // Clear error message for password
});
