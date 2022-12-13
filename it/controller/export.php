<?php
    include('../config.php');
    // membuat nama file ekspor "export-to-excel.xls"
	header("Content-Disposition: attachment; filename=IT-Daily-Activities.xls");
?>
<html>
    <body>
    	<table id="example" class="table table-hover table-striped table-bordered">
                                		<thead>
                                            <tr>
                                                <th width='5%'>NO</th>
                                                <th>KEGIATAN</th>
                                                <th>KENDALA</th>
                                                <th>TINDAK LANJUT</th>
                                                <th width='8%'>LOKASI</th>
                                                <th>TGL KOMPLAIN</th>
                                                <th>TGL MULAI</th>
                                                <th>TGL UPDATE</th>
                                                <th>PETUGAS</th>
                                                <th width='5%'>STATUS</th>
                                                <th>#</th>
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
                                                        }?>                                                            
                                                        <?php
                                                        echo "</tr>";   
                                                        $no++;
                                                    }
                                                echo "</table>";    
                                                }
                                            ?>
                                        </tbody>
                                    </table>
    </body>
</html>