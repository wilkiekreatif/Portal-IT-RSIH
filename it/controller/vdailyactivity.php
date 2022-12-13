<?php
    include('../../config.php');

    $id = $_GET['id'];
    echo($id);

    session_start();
    $username = $_SESSION['username'];
    
    $query = mysqli_query($connect,"UPDATE dailyactivity SET status='2' WHERE id='$id'");
    if ($query) {
        $log   = mysqli_query($connect,"INSERT INTO log VALUES (default,'$username','Verifikasi Status Activity',default)");
        header('location:../pages/dailyactivity.php?message=verified');
    }
?>