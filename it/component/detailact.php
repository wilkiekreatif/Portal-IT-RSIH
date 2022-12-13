<?php
    include ('../../config.php');
    //session_start();

    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = "SELECT
                
                a.kegiatan,
                c.nama AS KATEGORI,
                b.nama AS BAGIAN,
                a.kendala,
                a.tindaklanjut,
                a.bagian,
                a.tgl_komplain,
                a.waktu_mulai,
                a.waktu_selesai,
                a.username
                
                FROM dailyactivity a, mst_bagian b, mst_kegiatan c WHERE (a.kegiatan = c.id) AND (a.bagian = b.id) AND (a.id = $id)";
        $result = $connect->query($sql);
        foreach ($result as $baris) { ?>
            <table class="table">
                <tr>
                    <td width='25%'><strong>Kategori</td>
                    <td width='5%'>:</td>
                    <td><i><?php echo $baris['KATEGORI']; ?></td>
                </tr>
                <tr>
                    <td><strong>Bagian</td>
                    <td>:</td>
                    <td><i><?php echo $baris['BAGIAN']; ?></td>
                </tr>
                <tr>
                    <td><strong>Kendala</td>
                    <td>:</td>
                    <td><i><?php echo $baris['kendala']; ?></td>
                </tr>
                <tr>
                    <td><strong>Tindak Lanjut</td>
                    <td>:</td>
                    <td><i><?php echo $baris['tindaklanjut']; ?></td>
                </tr>
                <tr>
                    <td><strong>Unit</td>
                    <td>:</td>
                    <td><i><?php echo $baris['bagian']; ?></td>
                </tr>
                <tr>
                    <td><strong>Waktu Request</td>
                    <td>:</td>
                    <td><i><?php echo $baris['tgl_komplain']; ?></td>
                </tr>
                <tr>
                    <td><strong>Waktu Konfirm</td>
                    <td>:</td>
                    <td><i><?php echo $baris['waktu_mulai']; ?></td>
                </tr>
                <tr>
                    <td><strong>Waktu Selesai</td>
                    <td>:</td>
                    <td><i><?php echo $baris['waktu_selesai']; ?></td>
                </tr>
                <tr>
                    <td><strong>Petugas</td>
                    <td>:</td>
                    <td><i><?php echo $baris['username']; ?></td>
                </tr>
            </table>
        <?php 
        }
    }
?>
