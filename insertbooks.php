<?php

session_start();
require_once 'functions/connection.php';

if (!isset($_SESSION["login"])) {
  header('Location: login.php');
  exit;
}



if (isset($_POST["btninsert"])) {
  if (insert($_POST) > 0) {
    echo "
            <script>alert('insert success!');
            document.location.href='utama.php?p=booksdata';</script>
            
        ";
  } else {
    echo mysqli_error($conn);
  }
}


?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Insert Book</title>
</head>

<body>


  <nav class="navbar navbar-expand-sm navbar-dark bg-danger shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="utama.php">MyLibrary</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->


  <section>
    <div class="container mt-3 border p-5 mb-3">
      <form enctype="multipart/form-data" action="" method="POST">
        <h1>Insert Data</h1>

        <div class="mb-3">
          <label for="image" class="form-label">Picture</label>
          <input type="file" class="form-control" name="image" id="image">
        </div>

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" name="title" id="title" required>
        </div>

        <div class="mb-3">
          <label for="author" class="form-label">Author</label>
          <input type="text" class="form-control" name="author" id="author" required>
        </div>

        <div class="mb-3">
          <label for="publisher" class="form-label">Publisher</label>
          <input type="text" class="form-control" name="publisher" id="publisher" required>
        </div>

        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <input type="text" class="form-control" name="category" id="category" required>
        </div>

        <div class="mb-3">
          <label for="year" class="form-label">Year</label>
          <input type="number" class="form-control" name="year" id="year" required>
        </div>

        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select class="form-select" name="status" id="status" required>
            <option value="Borrowed">Borrowed</option>
            <option value="Available">Available</option>
          </select>
        </div>

        <button type="submit" name="btninsert" class="btn btn-primary">Submit</button>
        <a class="btn btn-secondary" href="utama.php?p=booksdata" role="button">Back</a>
      </form>
    </div>
  </section>
  <!-- Akhir Form -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>