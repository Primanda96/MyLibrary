<?php

session_start();
require_once 'functions/connection.php';

if (isset($_SESSION["login"])) {
  header('Location: utama.php');
}


if (isset($_POST["login"])) {

  $email = $_POST["email"];
  $password = $_POST["password"];

  $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");


  if (mysqli_num_rows($query) === 1) {
    $row = mysqli_fetch_assoc($query);
    if (password_verify($password, $row["password"])) {

      $_SESSION["login"] = true;
      $_SESSION["session"] = $row["name"];

      echo "
            <script>
            alert('Login success!');
            document.location.href='utama.php';
            </script>
        ";
      exit;
    }
  }
  $error = true;
}

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo "
            <script>alert('register success!');
            document.location.href='index.php';
            </script>
        ";
  } else {
    echo mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="css/mystyle.css">

  <title>VSGA Tugas3</title>
</head>

<body>


  <nav class="navbar navbar-expand-sm navbar-dark bg-danger shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="#">MyLibrary</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">

          <li class="nav-item">
            <a class="nav-link active" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Message</a>
          </li>
          <li class="nav-item">
            <a id="btnlogin" data-bs-toggle="modal" class="nav-link active" href="#myModal">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Akhir Navbar -->


  <div class="modal fade" id="myModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form class="m-4 " action="" method="POST">

            <div id="error" class="rounded bg-danger p-1 mb-3">
              <p class="text-white m-3">Email or Password can't be null</p>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" id="email" required>

            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="password" required>
              <?php if (isset($error)) : ?>
                <p class="text-danger">Login infalid, please login again</p>
                <script>
                  alert("Login infalid, please login again");
                </script>

              <?php endif; ?>
            </div>
            <button id="btn" type="submit" class="btn btn-primary mb-3" name="login" onclick="checkForm();">Submit</button>

            <div class="">
              <a data-bs-toggle="modal" href="#myRegisterModal">Register here</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir login modal -->

  <div class="modal fade" id="myRegisterModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title" id="exampleModalLabel">Register</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="" action="" method="POST">

            <div id="regerror" class="rounded bg-danger p-1 mb-3">
              <p class="text-white m-3">Your password must be at least 8 character</p>
            </div>

            <div class="mb-3">
              <label for="regemail" class="form-label">Email address</label>
              <input type="email" class="form-control" name="regemail" id="regemail" required>

            </div>

            <div class="mb-3">
              <label for="regname" class="form-label">Your Full Name</label>
              <input type="text" class="form-control" name="regname" id="name" required>
            </div>

            <div class="mb-3">
              <label for="regdate" class="form-label">Date of Birth</label>
              <input type="date" class="form-control" name="regdate" id="date" required>
            </div>

            <div class="mb-3">
              <label for="regpassword" class="form-label">Password</label>
              <input type="password" class="form-control" name="regpassword" id="regpassword" required>
            </div>

            <div class="mb-3">
              <label for="cpassword" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" name="cpassword" id="cpassword" required>
            </div>
            <button id="regbtn" type="submit" name="register" class="btn btn-primary mb-3" onclick="checkFormRegister();">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhit modal register -->

  <!-- Akhir Modal -->


  <section class="jumbotron text-center bg-dark">
    <img class="mt-5 img-fluid" src="img/photo.png" alt="" style="width: 400px" />
    <h1 class="text-white mt-2">Primanda Sayarizki</h1>
    <h3 class="text-white">Telkom University</h3>
    <h5 class="text-white">JWD-D</h5>
    <p class="lead text-white p-5">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Id voluptatibus
      cumque eum, ducimus maiores, sunt, hic delectus ex dicta voluptas labore
      aut ipsa porro. Quos nostrum ipsam sunt maxime eius!
    </p>
    <hr class="my-4" />
  </section>
  <!-- Akhir Hero section -->


  <section>
    <div class="container text-center">
      <h1 class="mt-5 fw-bold fs-1">About</h1>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio nobis
        possimus enim iste hic iusto excepturi blanditiis ab minima corporis,
        doloremque, debitis neque ducimus illum in dolor reprehenderit
        adipisci voluptates!
      </p>
    </div>
  </section>
  <!-- Akhir About -->



  <section>
    <div class="container pb-5">
      <h1 class="mt-5 fw-bold fs-1 text-center">Message</h1>
      <p class="fw-light text-center">Send message to your heroes</p>
      <div class="row justify-content-center">
        <div class="col-sm-6">
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Your Name :</label>
              <input type="text" class="form-control" id="name" required />
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Your Message :</label>
              <textarea class="form-control" id="message" rows="3" required></textarea>
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" />
              <label class="form-check-label" for="exampleCheck1">Show your name?</label>
            </div>
            <button type="submit" class="btn btn-danger">Send</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Akhir form -->


  <footer>
    <div class="bg-danger p-4">
      <p class="text-center text-white">
        Copyright@primanda
      </p>
    </div>
  </footer>
  <!-- Akhir footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="javascript/myscript.js"></script>

</body>

</html>