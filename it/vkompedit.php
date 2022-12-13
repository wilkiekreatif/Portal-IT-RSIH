<link href="css/bootstrap.min.css" rel="stylesheet">
<?php
	include('../config.php');

	session_start();

	//Pengambilan data dari form
	$id			= $_POST['idkomp'];
	$tipe		= $_POST['tipe'];
	$desk		= $_POST['deskripsi'];
	$lokasi		= $_POST['lokasi'];
	$user		= $_POST['pengguna'];
	$tgaransi	= $_POST['tgl_garansi'];
	$spec		= $_POST['spesifikasi'];
	$ip         = $_POST['ip_address'];
	$mac		= $_POST['mac_address'];
	$anydesk	= $_POST['anydesk'];
	$username	= $_SESSION['nama_lengkap'];
	
	$query = mysqli_query($connect,"UPDATE mst_komputer SET id_komp='$id', tipe='$tipe', desc_barang='$desk', lokasi='$lokasi', user='$user', tgl_garansi='$tgaransi', spesifikasi='$spec',ip_address='$ip', mac_address='$mac', anydesk='$anydesk' WHERE id_komp='$id'") or die(mysqli_error());
	if ($query) {
		$log = mysqli_query($connect,"INSERT INTO log VALUES (default, '$username', 'Merubahkan data komputer', default)") or die(mysqli_error());
		header('location:komputer.php?message=updated&id='.$id);
	}
?>