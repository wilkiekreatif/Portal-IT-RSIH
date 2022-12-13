<!DOCTYPE html>
<html lang="en">
<?php
	include('../../config.php');
	//include('../notif.php');
	//agar tidak bisa diakses apabila tidak login
	session_start();
	if (empty($_SESSION['username'])) {
	    header('location:../../');
	}
?>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="wilkie Creative Studio">
    <script type="text/javascript" src="../../assets/datatables/media/js/jquery.js"></script>
	<script type="text/javascript" src="../../assets/datatables/media/js/jquery.dataTables.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../assets/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="../../assets/datatables/media/css/dataTables.bootstrap.css">
    <title>Dashboard | IT Portal Management</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../assets/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand" href="beranda.php"><Strong>IT Portal</strong> Management</a>
            </div>
            <!-- Top Menu Items -->
            <?php
                include('../component/navbar.php');
            ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php
                $_SESSION['menu']='index';
                include('../component/menu.php');
            ?>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                            <small>IT Portal Management</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
				<div class="row">
                	<div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-calculator fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div>Jumlah Komputer</div>
                                        <div class="huge"><?php
                                        $q = mysqli_query($connect,"SELECT COUNT(*) as total FROM mst_komputer WHERE status='0'");
										$data = mysqli_fetch_array($q);
										echo($data['total']);
										
										?></div>
                                        <div>Unit</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-print fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div>Jumlah Printer</div>
                                        <div class="huge"><?php
                                        $q = mysqli_query($connect,"SELECT COUNT(*) as total FROM mst_printer WHERE status='0'");
										$data = mysqli_fetch_array($q);
										echo($data['total']);
										?></div>
                                        <div>Unit</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-mobile-phone fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div>Jumlah Alat Komunikasi</div>
                                        <div class="huge"><?php
                                        $q = mysqli_query($connect,"SELECT COUNT(*) as total FROM mst_alkom WHERE status='0'");
										$data = mysqli_fetch_array($q);
										echo($data['total']);
										
										?></div>
                                        <div>Unit</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div>Jumlah User</div>
                                        <div class="huge"><?php
                                        $q = mysqli_query($connect,"SELECT COUNT(*) as total FROM user WHERE status='0'");
										$data = mysqli_fetch_array($q);
										echo($data['total']);
										
										?></div>
                                        <div>User</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!-- BLOK MAINTENANCE                
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-cog fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div>Jumlah maintenance hari ini</div>
                                        <div class="huge"><?php
                                        $q = mysqli_query($connect,"SELECT COUNT(*) as total FROM mst_komputer WHERE status='0'");
										$data = mysqli_fetch_array($q);
										echo($data['total']);
										
										?></div>
                                        <div>Kerusakan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-cog fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div>Jumlah maintenance bulan ini</div>
                                        <div class="huge"><?php
                                        $q = mysqli_query($connect,"SELECT COUNT(*) as total FROM mst_komputer WHERE status='0'");
										$data = mysqli_fetch_array($q);
										echo($data['total']);
										
										?></div>
                                        <div>Kerusakan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-cog fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div>Jumlah maintenance tahun ini</div>
                                        <div class="huge"><?php
                                        $q = mysqli_query($connect,"SELECT COUNT(*) as total FROM mst_komputer WHERE status='0'");
										$data = mysqli_fetch_array($q);
										echo($data['total']);
										
										?></div>
                                        <div>Kerusakan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    
                </div>
              	<!-- /.Row End -->
            	<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Log IT Portal Management</h3>
                            </div>
                            <div class="panel-body">
                        			<div class="table-responsive">
                            			<table id="example" class="table table-hover table-striped table-bordered">
                                			<thead>
                                    			<tr>
                                        			<th width="5%">No</th>
                                                    <th>User</th>
                                                    <th>Deskripsi</th>
                                                    <th>Tanggal</th>
                                    			</tr>
                                			</thead>
                                            <tbody>
                                    			<?php
													//membuat query membaca record dari tabel User      
													$query="SELECT * FROM log order by tgl DESC";
													//menjalankan query      
													if (mysqli_query($connect,$query)) {      
														$result=mysqli_query($connect,$query);     
													} else die ("Error menjalankan query");
													
                                                    //mengecek record kosong     
													if (mysqli_num_rows($result) > 0) {
														$no='1';
														//menampilkan hasil query      
                                                        while($row = mysqli_fetch_array($result)) {      
     														echo "<tr>";
                                                            echo "	<td>".$no."</td>";    
                                                            echo "	<td>".$row["user"]."</td>";
                                                            echo "	<td>".$row["deskripsi"]."</td>";      
                                                            echo "	<td>".$row["tgl"]."</td>";
															echo "</tr>";   
															$no++;
                                                        }    
                                                    }
												?>
                                			</tbody>
                            			</table>
                        			</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
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
        });
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../assets/js/bootstrap.min.js"></script>
</body>
</html>
