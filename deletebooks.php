<?php
require_once 'functions/connection.php';
$id = $_GET["id"];



if (delete($id) > 0) {
    echo "
            <script>
            alert('Data deleted');
            document.location.href='utama.php?p=booksdata';
            </script>
        ";
} else {
    echo mysqli_error($conn);
}
