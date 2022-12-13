<?php
    include('../config.php');

    $id = $_POST['id'];
    $alasan = $_POST['keterangan'];
    $query = mysqli_query($connect,"UPDATE applicants SET status='2',alasan='$alasan' WHERE id='$id'");
    if ($query) {
        header('location:index.php?message=acc');
    }
?>