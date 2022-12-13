<!DOCTYPE html>
<html lang="en">
<?php
	include('../config.php');
	//agar tidak bisa diakses apabila tidak login
	session_start();
	if (empty($_SESSION['username'])) {
		header('location:../');
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
    <title>Communication Device Inventory | IT Portal Management</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- CSS Datepicker -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css">

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
                <a class="navbar-brand" href="beranda.php"><Strong>IT Portal</strong> Management</a>
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
                            Master Alat Komunikasi
                            <small>Edit Data Detail Master Alat Komunikasi</small>
                        </h1>
                        <ul class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-mobile-phone"></i> Master Alkom
                            </li>
                            <li>
                                <i class="fa fa-edit"></i> Edit
                            </li>
                        </ul>

                    </div>
                </div>
                <!-- /.row -->
            	<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-mobile-phone fa-fw"></i> Detail Alkom</h3>
                            </div>
                            <div class="panel-body">
                                <form action="valkomedit.php" method="post">
                                    <?php
                                        $id= $_GET['id'];
                                        $q = mysqli_query($connect,"SELECT * FROM mst_alkom WHERE id_tlf='$id'");
										$data = mysqli_fetch_array($q);
									?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="deskripsi">Id Alkom</label>
                                                <input readonly type="text" class="form-control" id="id" name="id" placeholder="Id..." maxlength="35" value="<?php
                                                    echo($data['id_tlf']);
                                                ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="tipe">Tipe Alkom</label>
                                                <select required class="form-control" id="tipe" name="tipe">
                                                    <option disabled> Pilih Salah Satu...</option>
                                                    <?php
                                                        if($data['tipe']==='0'){
                                                            echo("<option selected value='0'>Smartphone</option>");
                                                            echo("<option value='1'>Telepon</option>");
                                                        }else if($data['tipe']==='1'){
                                                            echo("<option value='0'>Smartphone</option>");
                                                            echo("<option selected value='1'>Telepon</option>");
                                                        }else{
                                                            echo("<option value='0'>Smartphone</option>");
                                                            echo("<option value='1'>Telepon</option>");
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <input required type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi..." maxlength="35" value="<?php
                                                    echo($data['desc_barang']);
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lokasi">Lokasi</label>
                                                <input required type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi Penempatan Komputer..." maxlength="35" value="<?php
                                                    echo($data['lokasi']);
                                                ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="tgl_garansi">Extensi / No Telepon</label>
                                                <input required type="text" class="form-control" id="ext" name="ext" placeholder="Id Anydesk..." maxlength="30" value="<?php
                                                    echo($data['extensi']);
                                                ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="tgl_garansi">Tanggal Garansi</label>
                                                <input required type="text" class="form-control datepicker" id="tgl_garansi" name="tgl_garansi" placeholder="Tgl Garansi... (yyyy-mm-dd)" maxlength="35" value="<?php
                                                    echo($data['tgl_garansi']);
                                                ?>">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href='komputer.php' class='btn btn-md btn-warning'> Kembali</a>
                                        </form>
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
            <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Komputer Baru</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="vkomp.php" method="post">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="tipe">Tipe komputer</label>
                                            <select required class="form-control" id="tipe" name="tipe" >
                                                <option disabled selected> Pilih Salah Satu...</option>
                                                <option value="0">Laptop</option>
                                                <option value="1">Personal Computer</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <input required type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi..." maxlength="35">
                                        </div>
                                        <div class="form-group">
                                            <label for="lokasi">Lokasi</label>
                                            <input required type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi Penempatan Komputer..." maxlength="35">
                                        </div>
                                        <div class="form-group">
                                            <label for="pengguna">Pengguna</label>
                                            <input required type="text" class="form-control" id="pengguna" name="pengguna" placeholder="Pengguna Komputer..." maxlength="35">
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_garansi">Tanggal Garansi</label>
                                            <input required type="text" class="form-control" id="tgl_garansi" name="tgl_garansi" placeholder="Tgl Garansi... (yyyy-mm-dd)" maxlength="35">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="spesifikasi">Spesifikasi</label>
                                            <textarea class="form-control" id="spesifikasi" name="spesifikasi" rows="8" placeholder="Detail Spesifikasi pisahkan dengan koma dan spasi... contoh: (, )"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_garansi">Mac Address</label>
                                            <input required type="text" class="form-control" id="mac_address" name="mac_address" placeholder="Mac Address..." maxlength="17">
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_garansi">Id Anydesk</label>
                                            <input required type="text" class="form-control" id="anydesk" name="anydesk" placeholder="Id Anydesk..." maxlength="30">
                                        </div>
                                    </div>
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

        <!-- modal Edit -->
        <div class="modal fade" id="EditModal" role="dialog">
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
                        </form>
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
    <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
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
                    url : 'detailkomp.php',
                    data :  'rowid='+ rowid,
                    success : function(data){
                    $('.fetched-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });

        $(document).ready(function(){
            $('#EditModal').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'editkomp.php',
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
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
