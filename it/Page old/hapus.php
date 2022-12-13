<?php
    include('../config.php');
    $query = mysqli_query($connect,"TRUNCATE TABLE bagian");
    if ($query) {
        header('location:configloker.php?message=successdeleted');
    }
?>