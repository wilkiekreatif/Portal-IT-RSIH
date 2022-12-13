<link href="css/bootstrap.min.css" rel="stylesheet">
<?php
	include('../config.php');

	session_start();

	//Pengambilan data dari form
	$id			= $_GET['id'];
	
	$username	= $_SESSION['nama_lengkap'];
	
	$query = mysqli_query($connect,"UPDATE mst_alkom SET status='1' WHERE id_tlf='$id'") or die(mysqli_error());
	if ($query) {
		$log = mysqli_query($connect,"INSERT INTO log VALUES (default, '$username', 'Menggudangkan Alat Komunikasi', default)") or die(mysqli_error());
		header('location:alkom.php?message=deleted&id='.$id);
	}
?>