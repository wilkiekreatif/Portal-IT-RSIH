<link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
<?php
	include('../../config.php');

	session_start();

	//Pengambilan data dari form
	$activity		= $_POST['activity'];
	$bagian			= $_POST['bagian'];
	$kendala		= $_POST['kendala'];
	$waktukomplain	= $_POST['tgl_komplain'];
	if($_POST['tindaklanjut']==null){
		$tindaklanjut	='';
	}else{
		$tindaklanjut	= $_POST['tindaklanjut'];
	}
	$username		= $_SESSION['username'];

	$query = mysqli_query($connect,"INSERT INTO dailyactivity VALUES (	default,
																		'$activity',
																		'$bagian',
																		'$kendala',
																		'$tindaklanjut',
																		'$waktukomplain',
																		now(),
																		null,
																		'$username',
																		'0')");
	if ($query) {
		$log = mysqli_query($connect,"INSERT INTO log VALUES (default, '$username', 'Menambahkan data Activity Baru', default)");
		header('location:../pages/dailyactivity.php?message=inserted');
	}
?>