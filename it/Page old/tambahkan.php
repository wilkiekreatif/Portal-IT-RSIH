<?php
    include('../config.php');

    $bagian = $_POST['bagian'];
    $query = mysqli_query($connect,"INSERT INTO bagian VALUES (NULL,'$bagian')");
    if ($query) {
        header('location:configloker.php?message=inserted');
    }
?>