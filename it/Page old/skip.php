<?php
    include('../config.php');

    $id = $_POST['id'];
    $alasan = $_POST['alasan'];
    $query = mysqli_query($connect,"UPDATE applicants SET status='1', alasan='$alasan' WHERE id='$id'");
    if ($query) {
        header('location:index.php?message=skip');
    }
?>