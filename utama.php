<?php

session_start();
require_once 'functions/connection.php';

if (!isset($_SESSION["login"])) {
  header('Location: index.php');
  exit;
}

$books = mysqli_query($conn, "SELECT * FROM books");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>MyLibrary</title>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-danger shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="#">MyLibrary</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="utama.php?p=home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="utama.php?p=membersdata">Member</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="utama.php?p=booksdata">Books Data</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="logout.php" onclick="return confirm('Are you sure to logout?');">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->


  <?php
  $pages_dir = 'pages';
  if (!empty($_GET['p'])) {
    $pages = scandir($pages_dir, 0);
    unset($pages[0], $pages[1]);
    $p = $_GET['p'];
    if (in_array($p . '.php', $pages)) {
      include($pages_dir . '/' . $p . '.php');
    } else {
      echo 'Halaman Tidak Ditemukan';
    }
  } else {
    include($pages_dir . '/home.php');
  }
  ?>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>