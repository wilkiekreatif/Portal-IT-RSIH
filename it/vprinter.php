<link href="css/bootstrap.min.css" rel="stylesheet">
<?php
	include('../config.php');

	session_start();

	//Pengambilan data dari form
	$tipe		= $_POST['tipe'];
	$lokasi		= $_POST['lokasi'];
	$ip			= $_POST['ip'];
	$tgaransi	= $_POST['tgl_garansi'];
	$username	= $_SESSION['nama_lengkap'];

	//ngambil no id
	$sql		= mysqli_query($connect,"SELECT COUNT(*) AS TOTAL FROM mst_printer");
	$data		= mysqli_fetch_array($sql);
	$total		= $data['TOTAL'];
	$total++;
	$char		= 'PR';
	$kodeBarang = $char . date('dmY') . sprintf("%03s", $total);
	//echo $kodeBarang;
	
	$query = mysqli_query($connect,"INSERT INTO mst_printer VALUES (default,
																	'$kodeBarang',
																	'$tipe',
																	'$lokasi',
																	'$ip',
																	'$tgaransi',
																	now(),
																	Null,
																	Null,
																	default,
																	'$username',
																	'0')") or die(mysqli_error());
	if ($query) {
		$log = mysqli_query($connect,"INSERT INTO log VALUES (default, '$username', 'Menambahkan data printer Baru', default)") or die(mysqli_error());
		header('location:printer.php?message=inserted&id='.$kodeBarang);
	}
?>