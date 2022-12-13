<!DOCTYPE html>
<html lang="en">
<?php
	include('../../config.php');
	//agar tidak bisa diakses apabila tidak login
	session_start();
	if (empty($_SESSION['username'])) {
		header('location:../../');
		// break;
	}
?>
<head>
    <meta charset="utf-8">
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
    <title>Printer Inventory | IT Portal Management</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../assets/css/sb-admin.css" rel="stylesheet">

    <!-- CSS Datepicker -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap-datepicker.min.css">

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
                $_SESSION['menu']='detail';
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
                            Master Printer
                            <small>Detail Master Printer</small>
                        </h1>
                        <ul class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-print"></i> Master Printer
                            </li>
                        </ul>
                        <?php
                            $username   = $_SESSION['username'];
                            $q          = mysqli_query($connect,"SELECT * FROM user WHERE username='$username'");
						    $datalevel  = mysqli_fetch_array($q);
                            if (($datalevel['level'])=='0'){
                        ?>
                            <button type="button" class='btn btn-sm btn-success' data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"> </span> Tambah Printer Baru</button> &nbsp; <a href='cetakkomp.php' target="_BLANK" class='btn btn-sm btn-primary'><span class="glyphicon glyphicon-print"> </span> Cetak Data</a>
                            <br><br>
                        <?php }?>
                    </div>
                </div>
                <!-- /.row -->
            	<div class="row">
                    <div class="col-lg-12">
                        <?php 
                            if (!empty($_GET['message']) && $_GET['message'] == 'inserted') {
                        ?> 
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <p><strong>BERHASIL!</strong> Data printer dengan id <b><?php
                                    $id = $_GET['id'];
                                    echo($id);
                                ?></b> telah berhasil ditambahkan</p>
                            </div>
                        <?php
                            }else if (!empty($_GET['message']) && $_GET['message'] == 'updated') {
                        ?> 
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <p><strong>BERHASIL!</strong> Data printer dengan id <b><?php
                                    $id = $_GET['id'];
                                    echo($id);
                                ?></b> telah berhasil di-edit</p>
                            </div>
                        <?php
                            }else if (!empty($_GET['message']) && $_GET['message'] == 'deleted') {
                                ?> 
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p><strong>BERHASIL!</strong> Data printer dengan id <b><?php
                                            $id = $_GET['id'];
                                            echo($id);
                                        ?></b> telah berhasil di-gudangkan</p>
                                    </div>
                                <?php
                                    }
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-print fa-fw"></i> Inventori Printer</h3>
                            </div>
                            <div class="panel-body">
                                <?php
                                    $username   = $_SESSION['username'];
                                    $q          = mysqli_query($connect,"SELECT * FROM user WHERE username='$username'");
							        $datalevel  = mysqli_fetch_array($q);
                                    if (($datalevel['level'])=='0'){
                                ?>
                        			<br><div class="table-responsive">
                            			<table id="example" class="table table-hover table-striped table-bordered">
                                			<thead>
                                    			<tr>
                                                    <th width='5%'>NO</th>
                                                    <th width='13%'>ID PRINTER</th>
                                                    <th width='20%'>TIPE</th>
                                                    <th>LOKASI</th>
                                        			<th width='13%'>IP ADDRESS</th>
                                                    <th>TGL TERIMA</th>
                                                    <th width='25%'>#</th>
                                    			</tr>
                                			</thead>
                                            <tbody>
                                    			<?php
													//membuat query membaca record dari tabel User      
													$query="SELECT * FROM mst_printer WHERE status='0' ORDER BY tgl_terima DESC";
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
                                                            echo "	<td>".$row["id_prnt"]."</td>";    
                                                            echo "	<td>".$row["tipe"]."</td>";
                                                            echo "	<td>".$row["lokasi"]."</td>";      
    														echo "	<td>".$row["ip_address"]."</td>";
                                                            echo "	<td>".$row["tgl_terima"]."</td>";
                                                            echo "  <td> <a href='#DetailModal' class='btn btn-sm btn-primary' id='CompId' data-toggle='modal' data-id=".$row['id_prnt']."> <i class='glyphicon glyphicon-eye-open'></i> Detail </a>

                                                            <a href='editprinter.php?id=".$row['id_prnt']."' class='btn btn-sm btn-default' id='CompEdit'> <i class='glyphicon glyphicon-edit'></i> Edit </a>";
                                                            ?>                                                            
                                                            <a href='hapusprinter.php?id=<?php echo($row['id_prnt']);?>' class='btn btn-sm btn-danger' onclick="return confirm('Apakah anda yakin?');"> <i class='glyphicon glyphicon-inbox'> </i> Gudangkan</a>
                                                            <?php
															echo "</tr>";   
															$no++;
   														}
													echo "</table>";    
													}
												?>
                                			</tbody>
                            			</table>
                                    </div><br>
                                <?php
                                    }else{ 
                                ?>
                                    <br><div class="table-responsive">
                            			<table id="example" class="table table-hover table-striped table-bordered">
                                			<thead>
                                    			<tr>
                                                    <th width='5%'>NO</th>
                                                    <th width='13%'>ID PRINTER</th>
                                                    <th width='20%'>TIPE</th>
                                                    <th>LOKASI</th>
                                        			<th width='13%'>IP ADDRESS</th>
                                                    <th>TGL TERIMA</th>
                                                    <th width='5%'>#</th>
                                    			</tr>
                                			</thead>
                                            <tbody>
                                    			<?php
													//membuat query membaca record dari tabel User      
													$query="SELECT * FROM mst_printer WHERE status='0' ORDER BY tgl_terima DESC";
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
                                                            echo "	<td>".$row["id_prnt"]."</td>";    
                                                            echo "	<td>".$row["tipe"]."</td>";
                                                            echo "	<td>".$row["lokasi"]."</td>";      
    														echo "	<td>".$row["ip_address"]."</td>";
                                                            echo "	<td>".$row["tgl_terima"]."</td>";
                                                            echo "  <td> <a href='#DetailModal' class='btn btn-sm btn-primary' id='CompId' data-toggle='modal' data-id=".$row['id_prnt']."> <i class='glyphicon glyphicon-eye-open'></i> Detail </a>";
                                                            
															echo "</tr>";   
															$no++;
   														}
													echo "</table>";    
													}
												?>
                                			</tbody>
                            			</table>
                                    </div><br>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->    
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Printer Baru</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="vprinter.php" method="post">
                                <div class="form-group">
                                    <label for="deskripsi">Tipe</label>
                                    <input required type="text" class="form-control" id="tipe" name="tipe" placeholder="Tipe Printer..." maxlength="35">
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input required type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi Penempatan Komputer..." maxlength="35">
                                </div>
                                <div class="form-group">
                                    <label for="pengguna">IP Address Server</label>
                                    <input required type="text" class="form-control" id="ip" name="ip" placeholder="Ip Address Server Printer..." maxlength="35">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_garansi">Tanggal Garansi</label>
                                    <input required type="text" class="form-control datepicker" id="tgl_garansi" name="tgl_garansi" placeholder="Tgl Garansi... (yyyy-mm-dd)" maxlength="35">
                                </div>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </form>
                    </div>
                </div>
            </div>
	    </div>

        <!-- modal detail -->
        <div class="modal fade" id="DetailModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Detail Barang</h4>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery 
    <script src="js/jquery.js"></script>
    jQuery (necessary for Bootstrap’s JavaScript plugins) -->
    <script src=”https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js”></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src=”https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js” integrity=”sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa” crossorigin=”anonymous”></script>
    <script src=”https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js”></script>
    <script src=”https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js”></script>
    <script type="text/javascript" src="../../assets/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#example').DataTable();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#DetailModal').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'detailprinter.php',
                    data :  'rowid='+ rowid,
                    success : function(data){
                    $('.fetched-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });

        $(function(){
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });

    </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../assets/js/bootstrap.min.js"></script>

</body>

</html>
