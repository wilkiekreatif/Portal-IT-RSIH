<link href="css/bootstrap.min.css" rel="stylesheet">
<?php
	include('../config.php');

	session_start();

	//Pengambilan data dari form
	$tipe		= $_POST['tipe'];
	if ($tipe=='0'){
		$char = "SP";
	}else if ($tipe=='1'){
		$char = "TL";
	}
	$desk		= $_POST['deskripsi'];
	$lokasi		= $_POST['lokasi'];
	$tgaransi	= $_POST['tgl_garansi'];
	$ext		= $_POST['ext'];
	$username	= $_SESSION['nama_lengkap'];

	//ngambil no id
	$sql		= mysqli_query($connect,"SELECT COUNT(*) AS TOTAL FROM mst_alkom WHERE tipe = '$tipe'");
	$data		= mysqli_fetch_array($sql);
	$total		= $data['TOTAL'];
	$total++;

	$kodeBarang = $char . date('dmY') . sprintf("%03s", $total);
	//echo $kodeBarang;
	
	$query = mysqli_query($connect,"INSERT INTO mst_alkom VALUES (	default,
																	'$kodeBarang',
																	'$tipe',
																	'$desk',
																	'$lokasi',
																	'$ext',
																	'$tgaransi',
																	now(),
																	default,
																	'$username',
																	'0')") or die(mysqli_error());
	if ($query) {
		$log = mysqli_query($connect,"INSERT INTO log VALUES (default, '$username', 'Menambahkan data Alat Komunikasi Baru', default)") or die(mysqli_error());
		header('location:alkom.php?message=inserted&id='.$kodeBarang);
	}
?>