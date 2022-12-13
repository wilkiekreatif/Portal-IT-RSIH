<?php
	include('../../config.php');

	session_start();

	$petugas		= $_POST['petugas'];
	$waktucek		= $_POST['waktucek'];
	$suhu				= $_POST['suhu'];
	$kelembaban	= $_POST['kelembaban'];
	$username		= $_SESSION['username'];

	$query = mysqli_query($connect,"INSERT INTO suhu VALUES (default,
																																		'$petugas',
																																		'$waktucek',
																																		'$suhu',
																																		'$kelembaban',
																																		'$username',
																																		now())");
	if ($query) {
		$log = mysqli_query($connect,"INSERT INTO log VALUES (default, '$username', 'Menambahkan data Pengukuran suhu baru', default)");
		header('location:../pages/komputer.php?message=inserted');
	}
?>