<?php
    include('../config.php');

    $id = $_GET['id'];
    $query = mysqli_query($connect,"DELETE FROM bagian WHERE no='$id'");
    if ($query) {
        header('location:configloker.php?message=deleted');
    }
?>