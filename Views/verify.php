<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>OTP Verification Form</title>
  <link rel="stylesheet" href="../src/output.css">
  <link rel="stylesheet" href="../src/app.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

  <style>
    #loading {
      width: 100vw;
      height: 100vh;
      display: none;
      justify-content: center;
      align-items: center;
      position: absolute;
      top: 0;
      left: 0;
      background-color: white;
      z-index: 200;

      i {
        font-size: 40px;
        color: rgb(84, 84, 255);
      }
    }

    .alert {
      margin-bottom: 20px;
      padding: 15px;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .alert-error {
      background-color: #fdecea;
      color: #d93025;
      border: 1px solid #f5c2c7;
    }

    .alert i {
      font-size: 1.2rem;
    }

    .otp-input {
      width: 3rem;
      height: 3rem;
      font-size: 1.5rem;
      text-align: center;
      border: 2px solid #ddd;
      border-radius: 0.5rem;
      outline: none;
      transition: border-color 0.3s ease;
    }

    .otp-input:focus {
      border-color: #4070f4;
      box-shadow: 0 0 5px rgba(64, 112, 244, 0.5);
    }

    #resend {
      margin-right: 20px;
    }
  </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">

  <div id="loading">
    <i class="fa-solid fa-spinner fa-spin-pulse"></i>
  </div>

  <div class="space-y-8 flex flex-col items-center justify-center">
    <?php if (!empty($_SESSION['message']) && $_SESSION['message_type'] === 'error'): ?>

      <div class="alert alert-error">
        <i class="fa-solid fa-circle-exclamation"></i>
        <?= htmlspecialchars($_SESSION['message'], ENT_QUOTES, 'UTF-8'); ?>
      </div>
      
    <?php endif; ?>

    <header class="text-7xl rounded-full flex items-center justify-center text-blue-500">
      <i class="fa-solid fa-envelope-open-text fa-bounce"></i>
    </header>
    <h4 class="text-xl font-medium text-gray-800">Verification Code</h4>
    <p class="text-center text-gray-600">Please enter the 4-digit verification code <br>
      we sent to your email <strong><?= $_SESSION['user_email'] ?></strong>.
    </p>
    <form action="../Controllers/checkVerifyCode.php" method="post" id="otp-form">
      <div class="flex w-full space-x-2">
        <input name="c1" type="text" maxlength="1" class="otp-input" oninput="this.value=this.value.replace(/\D/g,'')" />
        <input name="c2" type="text" maxlength="1" class="otp-input" disabled oninput="this.value=this.value.replace(/\D/g,'')" />
        <input name="c3" type="text" maxlength="1" class="otp-input" disabled oninput="this.value=this.value.replace(/\D/g,'')" />
        <input name="c4" type="text" maxlength="1" class="otp-input" disabled oninput="this.value=this.value.replace(/\D/g,'')" />
      </div>


      <button id="verify" type="submit"
        class="w-full mt-10 bg-blue-500 text-white text-lg p-2 rounded-lg hover:bg-blue-600 transition-all disabled:bg-blue-300 disabled:cursor-not-allowed"
        disabled>
        Verify OTP
      </button>

     
      <?php if (!empty($_SESSION['message']) && $_SESSION['message_type'] === 'error'): ?>
      <button id="resend" type="submit" name="resend_otp"
        class="w-full mt-2 text-blue-500 text-sm py-2 rounded-lg  transition-all ">
        Resend OTP code
      </button>
        <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
      <?php endif; ?>

    </form>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const inputs = document.querySelectorAll('.otp-input');
      const submitButton = document.querySelector('#verify');

      inputs.forEach((input, index) => {
        input.addEventListener('input', (e) => {
          if (e.target.value.length === 1 && index < inputs.length - 1) {
            inputs[index + 1].disabled = false;
            inputs[index + 1].focus();

          }

          if (e.target.value.length === 0 && index > 0) {
            inputs[index - 1].focus();
          }

          validateInputs();
        });
      });

      function validateInputs() {

        const allFilled = Array.from(inputs).every(input => input.value.length === 1);
        submitButton.disabled = !allFilled;

      }

      submitButton.addEventListener("click", () => {
        document.querySelector('#loading').style.display = 'flex';
      });

      document.querySelector("#resend").addEventListener("click", () => {
        document.querySelector('#loading').style.display = 'flex';
      });

    });
  </script>
</body>

</html>