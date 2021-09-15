<?php

require_once 'functions/connection.php';

$id = $_GET["id"];

if (deletem($id) > 0) {
    echo "<script>
        alert('Data deleted');
        document.location.href='utama.php?p=membersdata';
    </script>";
}
