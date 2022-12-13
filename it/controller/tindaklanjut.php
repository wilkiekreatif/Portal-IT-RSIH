<?php
    include_once('../../config.php');
    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = "SELECT * FROM dailyactivity WHERE id = $id";
        $result = mysqli_query($connect,$sql);
        foreach ($result as $baris){
?>
            <div class="row">
                <form action="../controller/updailyactivity.php" method="post">
                <div class="col-lg-2">
                    <input readonly name="id" id="id" class="form-control"  maxlength="11" value="<?php echo $baris['id']?>"><br>
                </div>
                <div class="col-lg-10">
                    <input readonly name="kendala" id="kendala" class="form-control"  maxlength="250" value="<?php echo $baris['kendala']?>"><br>
                </div>
                <div class="col-lg-12">
                    <input required name="tindaklanjut" id="tindaklanjut" class="form-control" placeholder="Tindak Lanjut..." maxlength="250"><br>
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success btn-block btn-flat ">Simpan</button>
                </div>
                </form>
            </div>
<?php
        }
    }
?>