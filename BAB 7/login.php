<?php
session_start();

// Proses login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi login sederhana
    $valid_email = "admin@gmail.com";
    $valid_password = "admin123";

    if ($email === $valid_email && $password === $valid_password) {
        // Login berhasil, simpan data ke sesi
        $_SESSION['user'] = $email;
        // Redirect ke dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        $error_message = "Email atau password salah.";
    }
}
?>
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

  .error {
    color: red;
    margin: 10px 0;
    font-size: 14px;
  }
</style>
</head>
<body>
<div class="container">
  <div class="header">
    <h1>TRANSLOGIC</h1>
  </div>
  <div class="form-container">
    <?php if (isset($error_message)) : ?>
      <p class="error"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="POST" action="login-proses.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
    <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
  </div>
</div>
</body>
</html>
