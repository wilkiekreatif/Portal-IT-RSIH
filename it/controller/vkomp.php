<?php
	include('../../config.php');

	session_start();

	//Pengambilan data dari form
	$tipe		= $_POST['tipe'];
	if ($tipe=='0'){
		$char = "LT";
	}else if ($tipe=='1'){
		$char = "PC";
	}

	$desk		= $_POST['deskripsi'];
	$lokasi		= $_POST['lokasi'];
	$user		= $_POST['pengguna'];
	$tgaransi	= $_POST['tgl_garansi'];
	$spec		= $_POST['spesifikasi'];
	$ip         = $_POST['ip_address'];
	$mac		= $_POST['mac_address'];
	$anydesk	= $_POST['anydesk'];
	$username	= $_SESSION['username'];

	//ngambil no id
	$sql		= mysqli_query($connect,"SELECT COUNT(*) AS TOTAL FROM mst_komputer WHERE tipe = '$tipe'");
	$data		= mysqli_fetch_array($sql);
	$total		= $data['TOTAL'];
	$total++;

	$kodeBarang = $char . date('dmY') . sprintf("%03s", $total);
	//echo $kodeBarang;

	$query = mysqli_query($connect,"INSERT INTO mst_komputer VALUES ('$kodeBarang',
																																		'$tipe',
																																		'$desk',
																																		'$lokasi',
																																		'$user',
																																		now(),
																																		'$tgaransi',
																																		'$spec',
																																		'$ip',
																																		'$mac',
																																		'$anydesk',
																																		Null,
																																		Null,
																																		default,
																																		'$username',
																																		'0')");
	if ($query) {
		$log = mysqli_query($connect,"INSERT INTO log VALUES (default, '$username', 'Menambahkan data komputer Baru dengan id $kodeBarang', default)");
		header('location:../pages/komputer.php?message=inserted&id='.$kodeBarang);
	}
?>