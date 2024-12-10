<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Translogic Login</title>
<link rel="stylesheet" href="styles.css">
<style>
  /* General Styles */
  body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f7f3d0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .container {
    text-align: center;
    width: 100%;
    max-width: 500px;
  }

  /* Header Section */
  .header {
    background-color: #000;
    color: #ffd500;
    padding: 20px 0;
    position: relative;
  }

  .header h1 {
    font-size: 36px;
    margin: 0;
  }

  .plane-img {
    width: 100%;
    max-width: 500px;
    height: auto;
    margin-top: -5px;
  }

  /* Welcome Back Section */
  .welcome-back {
    margin: 20px 0;
  }

  .welcome-back p {
    font-size: 24px;
    font-weight: bold;
    color: #ffd500;
    position: relative;
  }

  .welcome-back p::after {
    content: "→";
    font-size: 20px;
    margin-left: 10px;
    position: absolute;
  }

  /* Form Section */
  .form-container {
    background-color: #000;
    color: #fff;
    padding: 20px;
    border-radius: 5px;
  }

  .input-group {
    margin: 15px 0;
    display: flex;
    align-items: center;
    background-color: #ffd500;
    padding: 10px;
    border-radius: 5px;
  }

  .input-group label {
    display: flex;
    align-items: center;
    width: 100%;
  }

  .icon {
    font-size: 18px;
    margin-right: 10px;
  }

  input {
    border: none;
    outline: none;
    background: transparent;
    flex-grow: 1;
    font-size: 16px;
    color: #000;
  }

  input::placeholder {
    color: #000;
  }

  .sign-in {
    background-color: #ffd500;
    color: #000;
    font-size: 16px;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-decoration: none;
  }

  .sign-in:hover {
    background-color: #ffcc00;
  }

  /* Toast Styles */
  .toast {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #000;
    color: #ffd500;
    text-align: center;
    border-radius: 5px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    bottom: 30px;
    left: 50%;
    font-size: 17px;
  }

  .toast.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
  }

  @-webkit-keyframes fadein {
    from { bottom: 0; opacity: 0; }
    to { bottom: 30px; opacity: 1; }
  }

  @keyframes fadein {
    from { bottom: 0; opacity: 0; }
    to { bottom: 30px; opacity: 1; }
  }

  @-webkit-keyframes fadeout {
    from { bottom: 30px; opacity: 1; }
    to { bottom: 0; opacity: 0; }
  }

  @keyframes fadeout {
    from { bottom: 30px; opacity: 1; }
    to { bottom: 0; opacity: 0; }
  }
</style>
</head>
<body>
<div class="container">
  <div class="header">
    <h1>TRANSLOGIC</h1>
  </div>
  <div class="welcome-back">
    <p>welcome back</p>
  </div>
  <div class="form-container">
    <form>
      <div class="input-group">
        <label for="email">
          <span class="icon">📧</span>
          <input type="email" id="email" placeholder="EMAIL" required>
        </label>
      </div>
      <div class="input-group">
        <label for="password">
          <span class="icon">🔒</span>
          <input type="password" id="password" placeholder="PASSWORD" required>
        </label>
      </div>
      <button type="button" class="sign-in" id="loginButton">Login</button>
    </form>
    <p>Belum punya akun? <a href="register.html">Daftar di sini</a></p>
  </div>
</div>

<!-- Toast Element -->
<div id="toast" class="toast">Login berhasil!</div>

<script>
  // Handle Toast Display
  const loginButton = document.getElementById("loginButton");
  const toast = document.getElementById("toast");

  loginButton.addEventListener("click", function () {
    // Validasi login (placeholder)
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    if (email && password) {
      // Tampilkan toast
      toast.className = "toast show";

      // Sembunyikan toast setelah 3 detik
      setTimeout(() => {
        toast.className = toast.className.replace("show", "");
      }, 3000);

      // Redirect ke dashboard setelah delay (simulasi login)
      setTimeout(() => {
        window.location.href = "dashboard.html";
      }, 3000);
    } else {
      alert("Silakan isi email dan password.");
    }
  });
</script>
</body>
</html>