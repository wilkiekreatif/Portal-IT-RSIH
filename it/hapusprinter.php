<link href="css/bootstrap.min.css" rel="stylesheet">
<?php
	include('../config.php');

	session_start();

	//Pengambilan data dari form
	$id			= $_GET['id'];
	
	$username	= $_SESSION['nama_lengkap'];
	
	$query = mysqli_query($connect,"UPDATE mst_printer SET status='1' WHERE id_prnt='$id'") or die(mysqli_error());
	if ($query) {
		$log = mysqli_query($connect,"INSERT INTO log VALUES (default, '$username', 'Menggudangkan printer', default)") or die(mysqli_error());
		header('location:printer.php?message=deleted&id='.$id);
	}
?>