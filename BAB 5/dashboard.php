<?php
session_start();

// Periksa apakah sesi login sudah ada
if (!isset($_SESSION['user'])) {
    // Jika tidak ada sesi, redirect ke halaman login
    header("Location: login.php");
    exit();
}

// Ambil nama pengguna dari sesi
$user = $_SESSION['user'];

// Proses log out
if (isset($_POST['logout'])) {
    // Hapus semua data sesi
    session_unset();
    session_destroy();
    // Redirect ke halaman login
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Translogic - Dashboard</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f4c3;
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

    .header p {
      font-size: 20px;
      margin-top: 10px;
    }

    .buttons button {
      background-color: #ffeb3b;
      color: #000;
      padding: 15px 20px;
      margin: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    .buttons button:hover {
      background-color: #fdd835;
    }

    .logout {
      margin-top: 30px;
    }

    .logout button {
      background-color: #e53935;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;
    }

    .logout button:hover {
      background-color: #d32f2f;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>TRANSLOGIC</h1>
      <p>Selamat Datang, <?php echo htmlspecialchars($user); ?>!</p>
    </div>
    <div class="buttons">
      <button>Pilih Tiket</button>
      <button>Kategori</button>
      <button>Beli Tiket</button>
    </div>
    <div class="logout">
      <!-- Form untuk logout -->
      <form action="dashboard.php" method="post">
        <button type="submit" name="logout">Log Out</button>
      </form>
    </div>
  </div>
</body>
</html>
