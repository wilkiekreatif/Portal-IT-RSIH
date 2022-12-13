<?php
    include ('../config.php');
    //session_start();

    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = "SELECT * FROM mst_komputer WHERE id_komp = '$id'";
        $result = $connect->query($sql);
        foreach ($result as $baris) { ?>
            <table class="table">
                <tr>
                    <td width='25%'><strong>Id</td>
                    <td width='5%'>:</td>
                    <td><i><?php echo $baris['id_komp']; ?></td>
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
                    <td><strong>User</td>
                    <td>:</td>
                    <td><i><?php echo $baris['user']; ?></td>
                </tr>
                <tr>
                    <td><strong>Tanggal Terima</td>
                    <td>:</td>
                    <td><i><?php echo $baris['tgl_terima']; ?></td>
                </tr>
                <tr>
                    <td><strong>Tanggal Garansi</td>
                    <td>:</td>
                    <td><i><?php echo $baris['tgl_garansi']; ?></td>
                </tr>
                <tr>
                    <td><strong>spesifikasi</td>
                    <td>:</td>
                    <td><i><?php echo $baris['spesifikasi']; ?></td>
                </tr>
                <tr>
                    <td><strong>Ip Address</td>
                    <td>:</td>
                    <td><i><?php echo $baris['ip_address']; ?></td>
                </tr>
                <tr>
                    <td><strong>Mac Address</td>
                    <td>:</td>
                    <td><i><?php echo $baris['mac_address']; ?></td>
                </tr>
                <tr>
                    <td><strong>Id Anydesk</td>
                    <td>:</td>
                    <td><i><?php echo $baris['anydesk']; ?></td>
                </tr>
                <tr>
                    <td><strong>Jumlah Instal OS</td>
                    <td>:</td>
                    <td><i><?php echo $baris['jmlh_instal']; ?></td>
                </tr>
                <tr>
                    <td><strong>Tanggal Instal OS Terakhir</td>
                    <td>:</td>
                    <td><i><?php echo $baris['tgl_instal_terakhir']; ?></td>
                </tr>
            </table>
        <?php 
        }
    }
?>
