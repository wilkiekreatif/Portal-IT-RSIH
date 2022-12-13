<!DOCTYPE html>
<html lang="en">
<?php
	include('../config.php');
	//agar tidak bisa diakses apabila tidak login
	session_start();
	if (empty($_SESSION['username'])) {
		header('location:../login/');
		break;
	}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="wilkie Creative Studio">
    <script type="text/javascript" src="datatables/media/js/jquery.js"></script>
	<script type="text/javascript" src="datatables/media/js/jquery.dataTables.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="datatables/media/css/dataTables.bootstrap.css">
    <title>Inventory | RSIH Inventory</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="beranda.php"><Strong>RSIH</strong> Inventory</a>
            </div>
            <!-- Top Menu Items -->
            <?php
                include('navbar.php');
            ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php
                $_SESSION['menu']='detail';
                include('menu.php');
            ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Data Pelamar
                            <small>Detail pelamar Approved dan Suspended RSIH</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a> / <i class="fa fa-users"></i> Data Pelamar
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
            	<div class="row">
                    <div class="col-lg-12">
                        <?php 
                            if (!empty($_GET['message']) && $_GET['message'] == 'hideapproved') {
                        ?> 
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <p><strong>BERHASIL!</strong> Data Pelamar Approved telah berhasil dihide. untuk melihat data tersebut silahkan hubungi IT</p>
                            </div>
                        <?php
                            }else if (!empty($_GET['message']) && $_GET['message'] == 'hidesuspended') {
                                ?> 
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p><strong>BERHASIL!</strong> Data Pelamar Suspended telah berhasil dihide. untuk melihat data tersebut silahkan hubungi IT</p>
                                    </div>
                        <?php
                            }else if (!empty($_GET['message']) && $_GET['message'] == 'skip') {
                                ?> 
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p><strong>BERHASIL!</strong> Pelamar Suspended telah berhasil disuspend.</p>
                                    </div>
                        <?php
                            }else if (!empty($_GET['message']) && $_GET['message'] == 'acc') {
                                ?> 
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p><strong>BERHASIL!</strong> Data Pelamar Suspended telah berhasil diapprove</p>
                                    </div>
                        <?php
                            }
                        ?>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-users fa-fw"></i> Pelamar Approved</h3>
                            </div>
                            <div class="panel-body">
                        			<div class="table-responsive">
                            			<table id="example" class="table table-hover table-striped table-bordered">
                                			<thead>
                                    			<tr>
                                        			<th>No</th>
                                                    <th>BAGIAN YANG DILAMAR</th>
                                                    <th>NIK</th>
                                        			<th>NAMA</th>
                                                    <th>EMAIL</th>
                                                    <th>NO. TELP</th>
                                                    <th>KETERANGAN</th>
                                                    <th>#</th>
                                    			</tr>
                                			</thead>
                                			
                                            <tbody>
                                    			<?php
													//membuat query membaca record dari tabel User      
													$query="SELECT * FROM applicants WHERE status='2'";
													//menjalankan query      
													if (mysqli_query($connect,$query)) {      
														$result=mysqli_query($connect,$query);     
													} else die ("Error menjalankan query". mysql_error());
													
													//mengecek record kosong     
													if (mysqli_num_rows($result) > 0) {
														$no='1';
														//menampilkan hasil query      
  														while($row = mysqli_fetch_array($result)) {      
     														echo "<tr>";
															echo "	<td>".$no."</td>";    
                                                             echo "	<td>".$row["bagian"]."</td>";
                                                             echo "	<td>".$row["nik"]."</td>";      
    														echo "	<td>".$row["nama"]."</td>";
                                                            echo "	<td>".$row["email"]."</td>";
                                                            echo "	<td>".$row["tlp"]."</td>";
                                                            echo "	<td>".$row["alasan"]."</td>";
                                                            echo "<td width='10%' align='center'> <a href='../$row[files]' class='btn btn-sm btn-primary'> <i class='glyphicon glyphicon-floppy-save'></i></a>";
                                                            echo " <a href='#myModal' class='btn btn-sm btn-danger' id='CustId' data-toggle='modal' data-id=".$row['id']."><i class='glyphicon glyphicon-remove'></i></a></td>";
															echo "</tr>";   
															$no++;
   														}
													echo "</table>";    
													}
												?>
                                			</tbody>
                            			</table>
                                    </div><br>
                                    <a href='cetak.php?id=approved' target="_BLANK" class='btn btn-sm btn-primary'><span class="glyphicon glyphicon-print"> </span> Cetak Data</a>
                                    <a href='arsipkan.php?id=approved' onclick="return confirm('Apakah anda yakin? karena data akan di hide dari sistem.')" class='btn btn-sm btn-default'><span class="glyphicon glyphicon-copy"> </span> Arsipkan Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-users fa-fw"></i> Pelamar Ditangguhkan</h3>
                            </div>
                            <div class="panel-body">
                        			<div class="table-responsive">
                            			<table id="example1" class="table table-hover table-striped table-bordered">
                                			<thead>
                                    			<tr>
                                        			<th>No</th>
                                                    <th>BAGIAN YANG DILAMAR</th>
                                                    <th>NIK</th>
                                        			<th>NAMA</th>
                                                    <th>EMAIL</th>
                                                    <th>NO. TELP</th>
                                                    <th>ALASAN SUSPEND</th>
                                                    <th>#</th>
                                    			</tr>
                                			</thead>
                                            <tbody>
                                    			<?php
													//membuat query membaca record dari tabel User      
													$query="SELECT * FROM applicants WHERE status='1'";
						
													//menjalankan query      
													if (mysqli_query($connect,$query)) {      
														$result=mysqli_query($connect,$query);     
													} else die ("Error menjalankan query". mysql_error());
													
													//mengecek record kosong     
													if (mysqli_num_rows($result) > 0) {
														$no='1';
														//menampilkan hasil query      
  														while($row = mysqli_fetch_array($result)) {      
     														echo "<tr>";
															echo "	<td>".$no."</td>";    
                                                             echo "	<td>".$row["bagian"]."</td>";
                                                             echo "	<td>".$row["nik"]."</td>";      
    														echo "	<td>".$row["nama"]."</td>";
                                                            echo "	<td>".$row["email"]."</td>";
                                                            echo "	<td>".$row["tlp"]."</td>";
                                                            echo "	<td>".$row["alasan"]."</td>";
                                                            echo "<td width='10%' align='center'> <a href='../$row[files]' target='_BLANK' class='btn btn-sm btn-primary'> <i class='glyphicon glyphicon-floppy-save'></i></a>";
                                                            echo " <a href='#accModal' class='btn btn-sm btn-success' id='CustId' data-toggle='modal' data-id=".$row['id']."><i class='glyphicon glyphicon-ok'></i></a></td>";
															echo "</tr>";   
															$no++;
   														}
													echo "</table>";    
													}
												?>
                                			</tbody>
                            			</table>
                        			</div><br>
                                    <a href='cetak.php?id=suspended' target="_BLANK" class='btn btn-sm btn-primary'><span class="glyphicon glyphicon-print"> </span> Cetak Data</a> <a href='arsipkan.php?id=suspended' onclick="return confirm('Apakah anda yakin? karena data akan di hide dari sistem.')" class='btn btn-sm btn-default'><span class="glyphicon glyphicon-copy"> </span> Arsipkan Data</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->    
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Kenapa dia di suspend? :'(</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="accModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Silahkan isi keterangan dibawah ini? :)</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery 
    <script src="js/jquery.js"></script>
    <!-- jQuery (necessary for Bootstrap’s JavaScript plugins) -->
    <script src=”https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js”></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src=”https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js” integrity=”sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa” crossorigin=”anonymous”></script>
    <script src=”https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js”></script>
    <script src=”https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js”></script>
    <script>
        $(document).ready(function() {
        $('#example').DataTable();
        $('#example1').DataTable();
        });
    </script>

    <script  type="text/javascript">

    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'alasan1.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

    $(document).ready(function(){
        $('#accModal').on('show.bs.modal', function (e) {
            var rowid1 = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'keterangan1.php',
                data :  'rowid1='+ rowid1,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
