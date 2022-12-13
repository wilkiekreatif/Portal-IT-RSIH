<?php
	include('../../config.php');

	session_start();

	//Pengambilan data dari form
	$petugas			= $_POST['petugas'];
	$unit					= $_POST['unit'];
	$status				= $_POST['status'];
	$kepentingan	= $_POST['kepentingan'];
	$waktumasuk		= $_POST['waktu_masuk'];
	if($_POST['waktukeluar']==null){
		$waktukeluar	= NULL;
	}else{
		$waktukeluar	= $_POST['waktukeluar'];
	}
	$username		= $_SESSION['username'];

	$query = mysqli_query($connect,"INSERT INTO logbook VALUES (
																		default,
																		'$petugas',
																		'$unit',
																		'$status',
																		'$kepentingan',
																		'$waktumasuk',
																		'$waktukeluar',
																		NOW(),
																		'$username')");
	if ($query) {
		$log = mysqli_query($connect,"INSERT INTO log VALUES (default, '$username', 'Menambahkan data Logbook Baru', default)");
		header('location:../pages/logbook.php?message=inserted');
	}
?>