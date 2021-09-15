<?php


$books = mysqli_query($conn, "SELECT * FROM books");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Data</title>
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
                            <th scope="col">Picture</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Publisher</th>
                            <th scope="col">Category</th>
                            <th scope="col">Year</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($books as $row) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><img src="img/<?= $row["images"] ?>" width=100px; height=130px;></td>
                                <td><?= $row["title"] ?></td>
                                <td><?= $row["author"] ?></td>
                                <td><?= $row["publisher"] ?></td>
                                <td><?= $row["category"] ?></td>
                                <td><?= $row["year"] ?></td>
                                <td><?= $row["status"] ?></td>
                                <td>
                                    <a class="btn btn-primary ml-1 btn-sm" href="utama.php?p=booksdata-edit&id=<?= $row["id"] ?>" role="button">Edit</a>
                                    <a name="delete" class="btn btn-danger btn-sm" href="deletebooks.php?p=booksdata&id=<?= $row["id"]; ?>" onclick="return confirm('Are you sure to delete?');" role="button">Delete</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a class="btn btn-primary mb-1" href="insertbooks.php" role="button">Add</a>
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