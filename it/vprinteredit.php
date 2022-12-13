<link href="css/bootstrap.min.css" rel="stylesheet">
<?php
	include('../config.php');

	session_start();

	//Pengambilan data dari form
	$id			= $_POST['id'];
	$tipe		= $_POST['tipe'];
	$lokasi		= $_POST['lokasi'];
	$ip		= $_POST['ip'];
	$tgaransi	= $_POST['tgl_garansi'];
	$username	= $_SESSION['nama_lengkap'];
	
	$query = mysqli_query($connect,"UPDATE mst_printer SET 	tipe='$tipe',
															lokasi='$lokasi',
															ip_address='$ip',
															tgl_garansi='$tgaransi'
									WHERE id_prnt='$id'") or die(mysqli_error());
	if ($query) {
		$log = mysqli_query($connect,"INSERT INTO log VALUES (default, '$username', 'Merubahkan data printer', default)") or die(mysqli_error());
		header('location:printer.php?message=updated&id='.$id);
	}
?>