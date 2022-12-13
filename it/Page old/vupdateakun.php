<?php
    include('../config.php');
    session_start();

    //$username = $_POST['username'];
    $username=$_SESSION['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];   
    $bagian = $_POST['bagian'];

    //$query = mysqli_query($connect,"UPDATE user SET password = $password,nama_lengkap = $nama, jabatan = $jabatan, bagian = $bagian WHERE usename=$username") or die(mysqli_error());
    
    $query = mysqli_query($connect,"UPDATE user SET password='$password', nama_lengkap='$nama', jabatan='$jabatan', bagian='$bagian' WHERE username ='$username'");

    if ($query) {
        header('location:editakun.php?message=success');
    }    
?>