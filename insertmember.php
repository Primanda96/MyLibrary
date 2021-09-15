<?php

session_start();
require_once 'functions/connection.php';

if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit;
}



if (isset($_POST["btninsertm"])) {
    if (insertm($_POST) > 0) {
        echo "
            <script>alert('insert success!');
            document.location.href='utama.php?p=membersdata';</script>
            
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
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>

                <div class="mb-3">
                    <label for="snumber" class="form-label">Student Number</label>
                    <input type="text" class="form-control" name="snumber" id="snumber" required>
                </div>

                <div class="mb-3">
                    <label for="study" class="form-label">Study Program</label>
                    <input type="text" class="form-control" name="study" id="study" required>
                </div>

                <div class="mb-3">
                    <label for="adress" class="form-label">Address</label>
                    <input type="text" class="form-control" name="adress" id="adress" required>
                </div>


                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label><br>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="not" value="I prepare not to share">
                        <label class="form-check-label" for="not">
                            I prepare not to share
                        </label>
                    </div>
                </div>

                <button type="submit" name="btninsertm" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="utama.php?p=membersdata" role="button">Back</a>
            </form>
        </div>
    </section>
    <!-- Akhir Form -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>