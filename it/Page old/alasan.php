<?php
    include_once('../config.php');
    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = "SELECT * FROM applicants WHERE id = $id";
        $result = mysqli_query($connect,$sql);
        foreach ($result as $baris) { ?>
                <div class="row">
                    <form action="skip.php" method="post">
                    <div class="col-lg-4">
                        <input readonly name="id" id="id" class="form-control"  maxlength="250" value="<?php echo $baris['id']?>"><br>
                    </div>
                    <div class="col-lg-8">
                        <input readonly name="nama" id="nama" class="form-control"  maxlength="250" value="<?php echo $baris['nama']?>"><br>
                    </div>
                    <div class="col-lg-12">
                        <input required name="alasan" id="alasan" class="form-control" placeholder="Alasan Suspend..." maxlength="250"><br>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-danger btn-block btn-flat ">Simpan</button>
                    </div>
                    </form>
                </div>
    <?php
        }
    }
    ?>