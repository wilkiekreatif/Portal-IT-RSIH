<?php
    include('../config.php');

    $pesan = $_GET['id'];
    if($pesan==='approved'){
        $query = mysqli_query($connect,"UPDATE applicants SET status='4' WHERE status='2'");
        if ($query) {
            header('location:detailpelamar.php?message=hideapproved');
        }
    }else if($pesan==='suspended'){
        $query = mysqli_query($connect,"UPDATE applicants SET status='3' WHERE status='1'");
        if ($query) {
            header('location:detailpelamar.php?message=hidesuspended');
        }
    }
?>