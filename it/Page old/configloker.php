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
    <title>Konfigurasi Loker | SICARE RSIH</title>

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
                <a class="navbar-brand" href="beranda.php"><Strong>SICARE</strong> RSIH</a>
            </div>
            <!-- Top Menu Items -->
            <?php
                include('navbar.php');
            ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php
                $_SESSION['menu']='config';
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
                            Konfigurasi
                            <small>Sistem Informasi Karir RSIH</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a> / <i class="fa fa-gears"></i> Konfigurasi Loker
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
            	<div class="row">
                    <div class="col-lg-4">
                        <?php 
                            if (!empty($_GET['message']) && $_GET['message'] == 'success') {
                        ?> 
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <p><strong>BERHASIL!</strong> Konfigurasi telah berhasil disimpan.</p>
                            </div>
                        <?php
                            }
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-gears fa-fw"></i> Pengaturan</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <form class="form-horizontal " method="post" action="updateconfig.php">
                                    <label for="activecb">Active</label>
                                    <select class="form-control" id="activecb" name="activecb">
                                        <option <?php
                                                    $q=mysqli_query($connect,'SELECT * FROM config WHERE id="1"');
                                                    $data=mysqli_fetch_array($q);
                                                    if($data['active']==='1'){
                                                        echo('selected');
                                                    }
                                                ?> value="1">Aktif </option>
                                        <option <?php
                                                    $q=mysqli_query($connect,'SELECT * FROM config WHERE id="1"');
                                                    $data=mysqli_fetch_array($q);
                                                    if($data['active']==='0'){
                                                        echo('selected');
                                                    }
                                                ?> value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea maxlength="255" name="keterangan" rows="2" required class="form-control" ><?php
                                        echo($data['keterangan']);
                                    ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> Update Konfigurasi Sistem</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <?php 
                            if (!empty($_GET['message']) && $_GET['message'] == 'deleted') {
                        ?> 
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <p><strong>BERHASIL!</strong> Data bagian telah berhasil dihapus.</p>
                            </div>
                        <?php
                            }else if (!empty($_GET['message']) && $_GET['message'] == 'successdeleted') {
                        ?> 
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <p><strong>BERHASIL!</strong> Seluruh data bagian telah berhasil dihapus.</p>
                            </div>
                        <?php
                            }else if (!empty($_GET['message']) && $_GET['message'] == 'inserted') {
                                ?> 
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p><strong>BERHASIL!</strong> Data telah berhasil ditambahkan.</p>
                                    </div>
                                <?php
                                    }
                                ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-gears fa-fw"></i> Loker Bagian</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>BAGIAN</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                //membuat query membaca record dari tabel User      
                                                $query="SELECT * FROM bagian";
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
                                                        echo "	<td>".$row["nama"]."</td>";
                                                        echo "	<td width='15%' align='center'> <a href='hapusbagian.php?id=$row[no]' class='btn btn-sm btn-danger'><span class='glyphicon glyphicon-trash'> </span> Hapus</a> </td>";
                                                        echo "</tr>";   
                                                        $no++;
                                                    }
                                                echo "</table>";    
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div><br>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"> </span> Tambah Bagian</button> <a href='hapus.php' class='btn btn-sm btn-warning' onclick="return confirm('Apakah anda yakin?')"><span class="glyphicon glyphicon-trash"> </span> Hapus Semua Bagian</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->    
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Bagian yang membuka lowongan kerja</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal " method="post" action="tambahkan.php">
                    <input required name="bagian" id="bagian" class="form-control" placeholder="Nama bagian..." maxlength="250">
                    <p style="color=grey"><small>* Apabila lebih dari 1 kata harap menggunakan underscors atau garis bawah dan jangan menggunakan spasi.</small></p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambahkan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                </form>
            </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
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
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
