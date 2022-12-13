<?php
    include('../config.php');

    $active = $_POST['activecb'];
    $ket    = $_POST['keterangan'];
    $query = mysqli_query($connect,"UPDATE config SET active='$active',keterangan='$ket' WHERE id='1'");
    if ($query) {
        header('location:configloker.php?message=success');
    }
?>