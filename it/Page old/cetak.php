<?php
    include('../config.php');
    $pesan = $_GET['id'];
    if($pesan==='approved'){
        //$query = mysqli_query($connect,"UPDATE applicants SET status='4'");
        // if ($query) {
        //     header('location:detailpelamar.php?message=hideapproved');
        // }
    }else if($pesan==='suspended'){
        //$query = mysqli_query($connect,"UPDATE applicants SET status='3'");
        // if ($query) {
        //     header('location:detailpelamar.php?message=hidesuspended');
        // }
    }
?>
<html>
<head>
    <title>PRINT DATA PELAMAR <?php
        if($pesan==='approved'){
            echo('APPROVED');
        }else if($pesan==='suspended'){
            echo('SUSPENDED');
        }
    ?></title>
</head>
<body>
	<center>
		<h2>DATA PELAMAR <?php
        if($pesan==='approved'){
            echo('APPROVED');
        }else if($pesan==='suspended'){
            echo('SUSPENDED');
        }
    ?></h2><h3>Rumah Sakit Intan Husada</h3>
	</center>
	<table border="1" style="width: 100%">
		<tr>
			<th width="2%">No</th>
			<th width="35%">Bagian</th>
			<th width="48%">Nama</th>
			<th width="15%">No Telepon</th>
		</tr>
		<?php 
        $no = 1;
        if($pesan==='approved'){
            $sql = mysqli_query($connect,"SELECT * FROM applicants WHERE status='2'");
        }else if($pesan==='suspended'){
            $sql = mysqli_query($connect,"SELECT * FROM applicants WHERE status='1'");
        }
		
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['bagian']; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['tlp']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>