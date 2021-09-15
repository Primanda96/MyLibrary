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
$query = mysqli_query($conn, "SELECT * FROM member WHERE id = $id");
$rows = [];
while ($row = mysqli_fetch_assoc($query)) {
    $rows[] = $row;
}


if (isset($_POST["btneditm"])) {
    if (editm($_POST) > 0) {
        echo "
            <script>
            alert('edit success!');
            document.location.href='utama.php?p=membersdata';
            </script> 
        ";
    }

    if (editm($_POST) == 0) {
        echo "
            <script>
            alert('no data changed');
            document.location.href='utama.php?p=membersdata';
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



    <section>
        <div class="container mt-3 border p-5 mb-3">
            <form enctype="multipart/form-data" action="" method="POST">
                <h1>Edit Data</h1>

                <input type="hidden" name="id" value="<?= $rows[0]["id"]; ?>">

                <div class="mb-3">
                    <label for="ename" class="form-label">Name</label>
                    <input type="text" class="form-control" name="ename" id="ename" value="<?= $rows[0]["name"] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="esnumber" class="form-label">Student Number</label>
                    <input type="text" class="form-control" name="esnumber" id="esnumber" value="<?= $rows[0]["s_code"] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="estudy" class="form-label">Study Program</label>
                    <input type="text" class="form-control" name="estudy" id="estudy" value="<?= $rows[0]["study"] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="eadress" class="form-label">Address</label>
                    <input type="text" class="form-control" name="eadress" id="eadress" value="<?= $rows[0]["adress"] ?>" required>
                </div>


                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label><br>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="egender" id="emale" value="Male" required <?php echo ($rows[0]["gender"] == "Male" ? "checked" : "") ?>>
                        <label class="form-check-label" for="emale">
                            Male
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="egender" id="efemale" value="Female" required <?php echo ($rows[0]["gender"] == "Female" ? "checked" : "") ?>>
                        <label class="form-check-label" for="efemale">
                            Female
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="egender" id="enot" value="I prepare not to share" required <?php echo ($rows[0]["gender"] == "I prepare not to share" ? "checked" : "") ?>>
                        <label class="form-check-label" for="enot">
                            I prepare not to share
                        </label>
                    </div>
                </div>

                <button type="submit" name="btneditm" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="utama.php?p=membersdata" role="button">Back</a>
            </form>
        </div>
    </section>
    <!-- Akhir Form -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>