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
    <title>Log Book Server RSIH | IT Portal Management</title>

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
                <a class="navbar-brand" href="../pages/"><Strong>IT Portal</strong> Management</a>
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
                            Log Book 
                            <small>Server RSIH</small>
                        </h1>
                        <ul class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-book"></i> Log Book
                            </li>
                        </ul>
                        <?php
                            $username   = $_SESSION['username'];
                            $q          = mysqli_query($connect,"SELECT * FROM user WHERE username='$username'");
							$datalevel  = mysqli_fetch_array($q);
							if (($datalevel['level'])=='0'){
						?>
                            <button type="button" class='btn btn-sm btn-success' data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"> </span> Tambah Log Baru</button> &nbsp; <a href='../controller/cetakkomp.php' target="_BLANK" class='btn btn-sm btn-primary'><span class="glyphicon glyphicon-print"> </span> Cetak Data</a>
                            <br><br>
                        <?php
							}
                        ?>
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
                                <p><strong>BERHASIL!</strong> Data Logbook baru telah berhasil ditambahkan</p>
                            </div>
                        <?php
                            }else if (!empty($_GET['message']) && $_GET['message'] == 'updated') {
                        ?> 
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <p><strong>BERHASIL!</strong> Data komputer dengan id <b><?php
                                    $id = $_GET['id'];
                                    echo($id);
                                ?></b> telah berhasil di-edit</p>
                            </div>
                        <?php
                            }else if (!empty($_GET['message']) && $_GET['message'] == 'deleted') {
                                ?> 
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p><strong>BERHASIL!</strong> Data komputer dengan id <b><?php
                                            $id = $_GET['id'];
                                            echo($id);
                                        ?></b> telah berhasil di-gudangkan</p>
                                    </div>
                                <?php
                                    }
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-book fa-fw"></i> Log Book</h3>
                            </div>
                            <div class="panel-body">
                                <br><div class="table-responsive">
                                    <table id="example" class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width='2%'>NO</th>
                                                <th>NAMA PETUGAS</th>
                                                <th>UNIT / INSTANSI</th>
                                                <th>STATUS</th>
                                                <th width='20%'>KEPENTINGAN</th>
                                                <th>WAKTU MASUK</th>
                                                <th>WAKTU KELUAR</th>
                                                <th width='16%'>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                //membuat query membaca record dari tabel User      
                                                // $query="SELECT a.*, b.nama FROM logbook a, mst_bagian b WHERE a.instansi = b.id";
                                                $query="SELECT * FROM logbook";
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
                                                        echo "	<td>".$row["petugas"]."</td>";    
                                                        // echo "	<td>".$row["nama"]."</td>";
                                                        echo "	<td>".$row["instansi"]."</td>";
                                                        if ($row["status"]==0){
                                                            echo "	<td>INTERNAL</td>";
                                                        }else{
                                                            echo "	<td>EKSTERNAL</td>";
                                                        }
                                                        echo "	<td>".$row["kepentingan"]."</td>";
                                                        echo "	<td>".$row["tgl_masuk"]."</td>";
                                                        echo "	<td>".$row["tgl_keluar"]."</td>";
                                                        echo "  <td> <a href='#DetailModal' class='btn btn-sm btn-primary' id='CompId' data-toggle='modal' data-id=".$row['id']."> <i class='glyphicon glyphicon-eye-open'></i> Detail </a>
                                                        
                                                        <a href='editkomp.php?id=".$row['id']."' class='btn btn-sm btn-default' id='CompEdit'> <i class='glyphicon glyphicon-edit'></i> Edit </a>";
                                                        ?>                                                            
                                                        <a href='hapuskomp.php?id=<?php echo($row['id']);?>' class='btn btn-sm btn-success' onclick="return confirm('Apakah anda yakin?');"> <i class='glyphicon glyphicon-inbox'> </i> Verifikasi</a>
                                                        <?php
                                                        echo "</tr>";   
                                                        $no++;
                                                    }
                                                echo "</table>";    
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
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
                        <h4 class="modal-title">Tambah Log Book Baru</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="../controller/vlogbook.php" method="post">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="deskripsi">PETUGAS  <a style="color:red">*</a></label>
                                            <input required type="text" class="form-control" id="petugas" name="petugas" placeholder="petugas..." maxlength="60">
                                        </div>
                                        <div class="form-group">
                                            <label for="pengguna">UNIT / INSTANSI  <a style="color:red">*</a></label>
                                            <input required type="text" class="form-control" id="unit" name="unit" placeholder="Unit / Instansi..." maxlength="35">
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_garansi">STATUS  <a style="color:red">*</a></label>
                                            <select required class="form-control" name="status" id="status">
                                                <option value="" selected>--Pilih Bagian--</option>
                                                <option value="0">INTERNAL</option>
                                                <option value="1">EKSTERNAL</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="spesifikasi">KEPENTINGAN <a style="color:red">*</a></label>
                                            <textarea required class="form-control" id="kepentingan" name="kepentingan" rows="2" placeholder="Kepentingan Petugas..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="deskripsi">Waktu Masuk <a style="color:red">*</a></label></label>
                                            <input required class="form-control" type="datetime-local" id="waktu_masuk" name="waktu_masuk">
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Waktu Keluar</a></label></label>
                                            <input class="form-control" type="datetime-local" id="waktukeluar" name="waktukeluar">
                                        </div>
                                        <div class="form-group">
                                            <label>(*) : Wajib diisi</label>
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
                    url : 'detailkomp.php',
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
    </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../assets/js/bootstrap.min.js"></script>

</body>

</html>
