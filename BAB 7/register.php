<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Translogic - Create Account</title>
  <link rel="stylesheet" href="/css/register.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #fff8e1;
      color: #333;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      text-align: center;
    }

    .header h1 {
      background-color: #ffeb3b;
      color: #000;
      padding: 10px 0;
      font-size: 24px;
    }

    .form-container {
      background: #fff;
      border: 1px solid #ddd;
      padding: 20px;
      border-radius: 5px;
    }

    .input-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      background-color: #ffeb3b;
      color: #000;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #fdd835;
    }

    /* Pop-Up Styles */
    .popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 300px;
      background: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      z-index: 10;
      text-align: center;
      padding: 20px;
    }

    .popup h3 {
      margin-top: 0;
      color: #333;
    }

    .popup button {
      background-color: #ffeb3b;
      border: none;
      padding: 10px;
      cursor: pointer;
      border-radius: 5px;
    }

    .popup button:hover {
      background-color: #fdd835;
    }

    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 9;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>TRANSLOGIC</h1>
    </div>
    <div class="form-container">
    <form method="POST" action="register-proses.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Daftar</button>
</form>

    </div>
  </div>

  <!-- Pop-Up Box -->
  <div class="overlay" id="overlay"></div>
  <div class="popup" id="popupBox">
    <h3 id="popupMessage"></h3>
    <button id="closePopupButton">OK</button>
  </div>

  <script>
    // Get DOM elements
    const registerForm = document.getElementById("registerForm");
    const nameInput = document.getElementById("name");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const createAccountButton = document.getElementById("createAccountButton");
    const popupBox = document.getElementById("popupBox");
    const overlay = document.getElementById("overlay");
    const popupMessage = document.getElementById("popupMessage");
    const closePopupButton = document.getElementById("closePopupButton");

    // Function to show popup
    function showPopup(message, redirect = false) {
      popupMessage.textContent = message;
      popupBox.style.display = "block";
      overlay.style.display = "block";

      // Redirect after showing success message
      if (redirect) {
        setTimeout(() => {
          window.location.href = "dashboard.html";
        }, 2000); // Delay for 2 seconds
      }
    }

    // Function to hide popup
    function hidePopup() {
      popupBox.style.display = "none";
      overlay.style.display = "none";
    }

    // Add event listener to create account button
    createAccountButton.addEventListener("click", function (event) {
      event.preventDefault();

      const name = nameInput.value.trim();
      const email = emailInput.value.trim();
      const password = passwordInput.value.trim();

      if (!name || !email || !password) {
        showPopup("Please fill in all fields.");
        return;
      }

      // Simulate account creation success
      showPopup(`Account created successfully! Redirecting...`, true);
    });

    // Close popup when clicking "OK"
    closePopupButton.addEventListener("click", hidePopup);

    // Close popup when clicking outside of it
    overlay.addEventListener("click", hidePopup);
  </script>
</body>
</html>
