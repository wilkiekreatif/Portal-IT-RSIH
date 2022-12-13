<?php
    include ('../config.php');
    //session_start();

    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = "SELECT * FROM mst_alkom WHERE id_tlf = '$id'";
        $result = $connect->query($sql);
        foreach ($result as $baris) { ?>
            <table class="table">
                <tr>
                    <td width='25%'><strong>Id</td>
                    <td width='5%'>:</td>
                    <td><i><?php echo $baris['id_tlf']; ?></td>
                </tr>
                <tr>
                    <td><strong>Tipe Alat Komunikasi</td>
                    <td>:</td>
                    <td><i><?php if($baris['tipe']=='0'){
                        echo('Smartphone');
                    }else if($baris['tipe']=='1'){
                        echo('Telepon');
                    }?></td>
                </tr>
                <tr>
                    <td><strong>Deskripsi</td>
                    <td>:</td>
                    <td><i><?php echo $baris['desc_barang']; ?></td>
                </tr>
                <tr>
                    <td><strong>Lokasi</td>
                    <td>:</td>
                    <td><i><?php echo $baris['lokasi']; ?></td>
                </tr>
                <tr>
                    <td><strong>Extensi / No Telepon</td>
                    <td>:</td>
                    <td><i><?php echo $baris['extensi']; ?></td>
                </tr>
                <tr>
                    <td><strong>Tanggal Garansi</td>
                    <td>:</td>
                    <td><i><?php echo $baris['tgl_garansi']; ?></td>
                </tr>
                <tr>
                    <td><strong>Tanggal Terima</td>
                    <td>:</td>
                    <td><i><?php echo $baris['tgl_terima']; ?></td>
                </tr>
            </table>
        <?php 
        }
    }
?>
