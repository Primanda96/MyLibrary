<?php

session_start();
require_once "../functions/connection.php";

if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit;
}
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM member WHERE id='$id'");
$member = mysqli_fetch_array($query)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="card mx-auto mt-4" style="width: 18rem;">
        <img src="../img/logo.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h3 class="card-title text-center">Library card</h3>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item fw-bold text-center"> <?= $member["name"]; ?> </li>
            <li class="list-group-item">NIM: <?= $member["s_code"]; ?></li>
            <li class="list-group-item">Prodi: <?= $member["study"]; ?></li>
            <li class="list-group-item">Address: <?= $member["adress"]; ?></li>
            <li class="list-group-item">Gender: <?= $member["gender"] == "I prepare not to share" ? "-" : $member["gender"]; ?></li>
        </ul>

    </div>
</body>

<script>
    window.print();
</script>

</html>