<?php
    include ('../config.php');
    //session_start();

    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = "SELECT * FROM mst_printer WHERE id_prnt = '$id'";
        $result = $connect->query($sql);
        foreach ($result as $baris) { ?>
            <table class="table">
                <tr>
                    <td width='25%'><strong>Id</td>
                    <td width='5%'>:</td>
                    <td><i><?php echo $baris['id_prnt']; ?></td>
                </tr>
                <tr>
                    <td><strong>Tipe Printer</td>
                    <td>:</td>
                    <td><i><?php echo $baris['tipe']; ?></td>
                </tr>
                <tr>
                    <td><strong>Lokasi</td>
                    <td>:</td>
                    <td><i><?php echo $baris['lokasi']; ?></td>
                </tr>
                <tr>
                    <td><strong>Ip Address Server</td>
                    <td>:</td>
                    <td><i><?php echo $baris['ip_address']; ?></td>
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
                    <td><strong>Tanggal Isi Tinta Terakhir</td>
                    <td>:</td>
                    <td><i><?php echo $baris['tgl_isi_tinta']; ?></td>
                </tr>
                <tr>
                    <td><strong>Tanggal Perawatan Terakhir</td>
                    <td>:</td>
                    <td><i><?php echo $baris['tgl_perawatan']; ?></td>
                </tr>
            </table>
        <?php 
        }
    }
?>
