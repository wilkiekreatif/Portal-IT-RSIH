<link href="css/bootstrap.min.css" rel="stylesheet">
<?php
	include('../config.php');

	session_start();

	//Pengambilan data dari form
	$id			= $_POST['id'];
	$tipe		= $_POST['tipe'];
	$desk		= $_POST['deskripsi'];
	$lokasi		= $_POST['lokasi'];
	$ext			= $_POST['ext'];
	$tgaransi	= $_POST['tgl_garansi'];
	$username	= $_SESSION['nama_lengkap'];
	
	$query = mysqli_query($connect,"UPDATE mst_alkom SET 	tipe='$tipe',
															desc_barang='$desk',
															lokasi='$lokasi',
															extensi='$ext',
															tgl_garansi='$tgaransi'
									WHERE id_tlf='$id'") or die(mysqli_error());
	if ($query) {
		$log = mysqli_query($connect,"INSERT INTO log VALUES (default, '$username', 'Merubahkan data Alkom', default)") or die(mysqli_error());
		header('location:alkom.php?message=updated&id='.$id);
	}
?>