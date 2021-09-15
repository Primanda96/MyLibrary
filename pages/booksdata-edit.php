<?php

//session_start();
require_once 'functions/connection.php';

// if (!isset($_SESSION["login"])) {
//   header('Location: login.php');
//   exit;
// }
if (!isset($_GET['id'])) {
  echo "Command not found";
  exit;
}

$id = $_GET["id"];

$strcon = "";
$query = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");
$rows = [];
while ($row = mysqli_fetch_assoc($query)) {
  $rows[] = $row;
}

$replace = $rows[0]["status"];
$str = preg_replace("/[^a-zA-Z]/", "", $replace);

if ($str == 'Available') {
  $strcon = 'Borrowed';
}

if ($str == 'Borrowed') {
  $strcon = 'Available';
}


if (isset($_POST["btnedit"])) {
  if (edit($_POST) > 0) {
    echo "
            <script>
            alert('edit success!');
            document.location.href='utama.php?p=booksdata';
            </script> 
        ";
  }

  if (edit($_POST) == 0) {
    echo "
            <script>
            alert('no data changed');
            document.location.href='utama.php?p=booksdata';
            </script> 
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

  <title>Edit Book</title>
</head>

<body>


  <!-- Form -->
  <section>
    <div class="container mt-3 border p-5 mb-3">
      <h1>Edit Data</h1>
      <form enctype="multipart/form-data" action="" method="POST">
        <input type="hidden" name="id" value="<?= $rows[0]["id"]; ?>">

        <div class="mb-3">
          <label for="eimage" class="form-label">Picture</label>
          <input type="file" class="form-control" name="eimage" id="eimage"><br>
          <img src="img/<?= $rows[0]["images"] ?>" width="100px" height="120px">
          <input type="hidden" name="thisimg" id="thisimg" value="<?= $rows[0]["images"] ?>">
        </div>

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" name="title" id="title" value="<?= $rows[0]["title"] ?>">
        </div>

        <div class="mb-3">
          <label for="author" class="form-label">Author</label>
          <input type="text" class="form-control" name="author" id="author" value="<?= $rows[0]["author"] ?>">
        </div>

        <div class="mb-3">
          <label for="publisher" class="form-label">Publisher</label>
          <input type="text" class="form-control" name="publisher" id="publisher" value="<?= $rows[0]["publisher"] ?>">
        </div>

        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <input type="text" class="form-control" name="category" id="category" value="<?= $rows[0]["category"] ?>">
        </div>

        <div class="mb-3">
          <label for="year" class="form-label">Year</label>
          <input type="number" class="form-control" name="year" id="year" value="<?= $rows[0]["year"] ?>">
        </div>

        <div class="mb-3">
          <label for="estatus" class="form-label">Status</label>
          <select class="form-select" name="estatus" id="estatus" required>
            <option value="<?= $rows[0]["status"] ?>"><?= $str ?></option>
            <option value="<?= $strcon ?>"><?= $strcon ?></option>
          </select>
        </div>

        <button type="submit" name="btnedit" class="btn btn-primary">Submit</button>
        <a class="btn btn-secondary" href="utama.php?p=booksdata" role="button">Back</a>
      </form>
    </div>
  </section>
  <!-- Akhir Form -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>