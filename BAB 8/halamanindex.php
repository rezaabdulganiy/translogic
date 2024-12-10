<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Translogic - Index</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #e8f5e9;
      color: #333;
    }

    .container {
      text-align: center;
      padding: 50px;
    }

    .header h1 {
      background-color: #ffeb3b;
      padding: 10px;
      display: inline-block;
      color: #000;
    }

    .navigation button {
      background-color: #ffeb3b;
      color: #000;
      padding: 15px 20px;
      margin: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    .navigation button:hover {
      background-color: #fdd835;
    }

    footer p {
      margin-top: 30px;
      color: #555;
      font-size: 14px;
    }

    .welcome-message {
      font-size: 18px;
      color: #555;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>TRANSLOGIC</h1>
    </div>
    <p class="welcome-message" id="welcomeMessage"></p>
    <div class="navigation">
      <button id="homeButton"><a href="dashboard.php">Beranda</a></button>
      <button id="registerButton"><a href="register.php">Daftar</a></button>
      <button id="loginButton"><a href="login.php">Login</a></button>
    </div>
    <footer>
      <p>Temukan pengalaman perjalanan Anda</p>
    </footer>
  </div>
  <script>
    // Menambahkan pesan selamat datang menggunakan DOM
    document.addEventListener("DOMContentLoaded", function() {
      const welcomeMessage = document.getElementById("welcomeMessage");
      welcomeMessage.textContent = "Selamat datang di Translogic! Pilih menu di bawah untuk memulai.";
    });

    // Menambahkan interaktivitas pada tombol navigasi
    const buttons = document.querySelectorAll(".navigation button");
    buttons.forEach(button => {
      button.addEventListener("click", function() {
        buttons.forEach(btn => btn.style.backgroundColor = "#ffeb3b"); // Reset warna
        this.style.backgroundColor = "#cddc39"; // Warna tombol yang diklik
      });
    });
  </script>
</body>
</html>