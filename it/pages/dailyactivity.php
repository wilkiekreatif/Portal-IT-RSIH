<!DOCTYPE html>
<html lang="en">
<?php
	include('../../config.php');
	//agar tidak bisa diakses apabila tidak login
	session_start();
	if (empty($_SESSION['username'])) {
		header('location:../../');
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
    <title>Daily Activity | IT Portal Management</title>

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
                <a class="navbar-brand" href="ndex.php"><Strong>IT Portal</strong> Management</a>
            </div>
            <!-- Top Menu Items -->
            <?php
                include('../component/navbar.php');
            ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php
                $_SESSION['menu']='dailyactivity';
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
                            Daily Activity
                            <!--<small>Detail yang dikerjakan oleh <?php
                                echo $_SESSION['nama_lengkap'];
                            ?></small> -->
                        </h1>

                        <ul class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-inbox"></i> Daily Activity
                            </li>
                        </ul>
                        <?php
                            $username   = $_SESSION['username'];
                            $q          = mysqli_query($connect,"SELECT * FROM user WHERE username='$username'");
							$datalevel  = mysqli_fetch_array($q);
							if ((($datalevel['level'])=='0')or(($datalevel['level'])=='1')){
						?>

                            <button type="button" class='btn btn-sm btn-success' data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"> </span> Tambah Activity Baru</button> <a href='cetakdailyact.php' target="_BLANK" class='btn btn-sm btn-primary'><span class="glyphicon glyphicon-print"> </span> Cetak Data</a>
                            <a href='../controller/export.php' target="_BLANK" class='btn btn-sm btn-warning'> <span class="glyphicon glyphicon-export"> </span> Export to Excel</a>
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
                                <p><strong>BERHASIL!</strong> Data activity berhasil ditambahkan</p>
                            </div>
                        <?php
                            }else if (!empty($_GET['message']) && $_GET['message'] == 'acc') {
                        ?>
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <p><strong>BERHASIL!</strong> Activity tersebut telah Selesai dikerjakan</p>
                            </div>
                        <?php
                            }else if (!empty($_GET['message']) && $_GET['message'] == 'verified') {
                        ?>
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <p><strong>BERHASIL!</strong> Activity berhasil diverifikasi</p>
                            </div>
                        <?php
                            }
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-inbox fa-fw"></i> List Activity</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                            		<table id="example" class="table table-hover table-striped table-bordered">
                                		<thead>
                                            <tr>
                                                <th width='2%'>NO</th>
                                                <th>KEGIATAN</th>
                                                <th>KENDALA</th>
                                                <th>TINDAK LANJUT</th>
                                                <th width='8%'>LOKASI</th>
                                                <th>TGL KOMPLAIN</th>
                                                <th>TGL MULAI</th>
                                                <th>TGL UPDATE</th>
                                                <th>PETUGAS</th>
                                                <th>STATUS</th>
                                                <th width='15%'>#</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                                //membuat query membaca record dari tabel     
                                                $query="SELECT * FROM dailyactivity ORDER BY waktu_mulai DESC";
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
                                                        $kegiatan = $row["kegiatan"];
                                                        $bagian = $row["bagian"];
                                                        $q = mysqli_query($connect,"SELECT * FROM mst_kegiatan WHERE id=$kegiatan");
                                                        $data = mysqli_fetch_array($q);
                                                        echo "	<td>".$data['nama']."</td>";
                                                        echo "	<td>".$row["kendala"]."</td>";  
                                                        echo "	<td>".$row["tindaklanjut"]."</td>";  
                                                        $q = mysqli_query($connect,"SELECT * FROM mst_bagian WHERE id=$bagian");
                                                        $data = mysqli_fetch_array($q);
                                                        echo "	<td>".$data["nama"]."</td>";      
                                                        echo "	<td>".$row["tgl_komplain"]."</td>";
                                                        echo "	<td>".$row["waktu_mulai"]."</td>";
                                                        echo "	<td>".$row["waktu_selesai"]."</td>";
                                                        echo "	<td>".$row["username"]."</td>";
                                                        if($row["status"]=="0"){
                                                            echo "<td><span class='label label-danger'> Belum Selesai </span></td>";
                                                        }else if($row["status"]=="1"){
                                                            echo "<td><span class='label label-warning'> Selesai Belum Validasi </span></td>";
                                                        }else if($row["status"]=="2"){
                                                            echo "<td><span class='label label-success'> Selesai sudah Validasi </span></td>";
                                                        }
                                                        echo "  <td> <a href='#DetailModal' class='btn btn-sm btn-primary' id='ActId' data-toggle='modal' data-id=".$row['id']."> <i class='glyphicon glyphicon-eye-open'></i> Detail</a>

                                                        <a href='#' class='btn btn-sm btn-warning' id='ActEdit'> <i class='glyphicon glyphicon-edit'></i> Edit</a>";
                                                        if($row["status"]=="0"){
                                                        echo " <a href='#accModal' class='btn btn-sm btn-success' id='CustId' data-toggle='modal' data-id=".$row['id']."><i class='glyphicon glyphicon-ok'></i> Done</a> ";
                                                        }
                                                        if(($row["status"]=="1")AND($datalevel["level"]=='1')){
                                                        ?>
                                                            <a href='vdailyactivity.php?id=<?php echo($row['id']);?>' onclick='return  confirm("Apakah anda yakin?")' class='btn btn-sm btn-success'><i class='glyphicon glyphicon-ok-circle'></i> Verifikasi</a>
                                                        <?php
                                                        }
                                                        echo "</td></tr>";   
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
            <div class="modal-dialog">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Activity Baru</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="../controller/vact.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tipe">Nama Kegiatan <a style="color:red">*</a></label>
                                            <select required class="form-control" name="activity" id="activity">
                                                <option value="" selected>--Pilih Maintenance--</option>
                                                <?php
                                                    $tampil = mysqli_query($connect,"SELECT * FROM mst_kegiatan ORDER BY nama");
                                                    while ($w = mysqli_fetch_array($tampil)) {
                                                        echo "<option value=$w[id]>$w[nama]</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tipe">Nama Bagian <a style="color:red">*</a></label>
                                            <select required class="form-control" name="bagian" id="bagian">
                                                <option value="" selected>--Pilih Bagian--</option>
                                                <?php
                                                    $tampil = mysqli_query($connect,"SELECT * FROM mst_bagian ORDER BY nama");
                                                    while ($w = mysqli_fetch_array($tampil)) {
                                                        echo "<option value=$w[id]>$w[nama]</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Kendala <a style="color:red">*</a></label></label>
                                            <input type="text" class="form-control" id="kendala" name="kendala" placeholder="Kendala..." maxlength="255">
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Tgl Komplain <a style="color:red">*</a></label></label>
                                            <input class="form-control" type="datetime-local" id="tgl_komplain" name="tgl_komplain">
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Tindak lanjut</label></label>
                                            <input type="text" class="form-control" id="tindaklanjut" name="tindaklanjut" placeholder="Tindak lanjut..." maxlength="255">
                                        </div>
                                        <div class="form-group">
                                            <label>(<a style="color:red">*</a>) : Wajib diisi</label>
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
                        <h4 class="modal-title">Detail Activity</h4>
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

        <!-- MODAL SELESAI-->
        <div class="modal fade" id="accModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tindak Lanjut:</h4>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
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
                    url : '../component/detailact.php',
                    data :  'rowid='+ rowid,
                    success : function(data){
                    $('.fetched-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#accModal').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : '../controller/tindaklanjut.php',
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