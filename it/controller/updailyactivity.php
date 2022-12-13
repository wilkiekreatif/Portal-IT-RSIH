<?php
    include('../../config.php');
    session_start();
    $id = $_POST['id'];
    $username		= $_SESSION['username'];
    $tindaklanjut = $_POST['tindaklanjut'];
    $query = mysqli_query($connect,"UPDATE dailyactivity SET status='1',tindaklanjut='$tindaklanjut' WHERE id='$id'");
    if ($query) {
        $log   = mysqli_query($connect,"INSERT INTO log VALUES (default,'$username','Update Status Activity',default)");
        header('location:../pages/dailyactivity.php?message=acc');
    }
?>