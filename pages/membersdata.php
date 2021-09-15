<?php


$member = mysqli_query($conn, "SELECT * FROM member");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members Data</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <section>
        <div class="container mt-3">
            <div class="table-responsive-sm">
                <table class="table table-hover table-bordered align-middle" id="example">
                    <thead class="table-danger">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Student Number</th>
                            <th scope="col">Program Study</th>
                            <th scope="col">Address</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($member as $row) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $row["name"] ?></td>
                                <td><?= $row["s_code"] ?></td>
                                <td><?= $row["study"] ?></td>
                                <td><?= $row["adress"] ?></td>
                                <td><?= $row["gender"] ?></td>
                                <td>
                                    <div class="d-grid gap-2 d-md-block">
                                        <a class="btn btn-primary ml-1 btn-sm" href="process/print.php?id=<?= $row["id"] ?>" role="button">Print</a>
                                        <a class="btn btn-warning ml-1 btn-sm" href="utama.php?p=membersdata-edit&id=<?= $row["id"] ?>" role="button">Edit</a>
                                        <a name="delete" class="btn btn-danger btn-sm" href="deletemembers.php?p=membersdata&id=<?= $row["id"]; ?>" onclick="return confirm('Are you sure to delete?');" role="button">Delete</a>
                                    </div>

                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a class="btn btn-primary mb-1" href="insertmember.php" role="button">Add</a>
            </div>
        </div>
    </section>
    <!-- Akhir tabel data buku -->
</body>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

</html>