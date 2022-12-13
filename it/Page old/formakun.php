<?php
	  if (!empty($_GET['message']) && $_GET['message'] == 'success') {
      ?>
		<div class="col-lg-12">
            <div class="alert alert-success" role="alert">
                Akun anda telah <Strong>berhasil</Strong> diupdate. Silahkan <Strong>Logout</strong> dan <Strong>Login kembali</strong> untuk mengaktifkan perubahan akun tersebut.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    <?php
      }
    ?>

<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Detail Akun Anda</h3>
        </div>
        <div class="panel-body">
            <div class="col-lg-6">
                <form action="vupdateakun.php" method="post">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Username</label>
                        <input readonly type="text" id="username" name="username" class="form-control" Value="<?php
                        $q=mysqli_query($connect,'SELECT * FROM user WHERE username="'.$_SESSION['username'].'"');
                        $data=mysqli_fetch_array($q);
                        echo($data['username']);
                        ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Password</label>
                        <input type="password" required class="form-control" id="password" name="password" placeholder="Maksimal 8 karakter..." maxlength="8">
                    </div>
            </div>
            <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Maksimal 30 karakter..." Value="<?php
                        $q=mysqli_query($connect,'SELECT * FROM user WHERE username="'.$_SESSION['username'].'"');
                        $data=mysqli_fetch_array($q);
                        echo($data['nama_lengkap']);
                        ?>" maxlength="30">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Maksimal 30 karakter..." Value="<?php
                        $q=mysqli_query($connect,'SELECT * FROM user WHERE username="'.$_SESSION['username'].'"');
                        $data=mysqli_fetch_array($q);
                        echo($data['jabatan']);
                        ?>" maxlength="30">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Bagian</label>
                        <select required class="form-control" name="bagian" id="bagian">
                            <option value="<?php
                            $q=mysqli_query($connect,'SELECT * FROM user WHERE username="'.$_SESSION['username'].'"');
                            $data=mysqli_fetch_array($q);
                            echo($data['bagian']);
                            ?>" selected><?php
                            $q=mysqli_query($connect,'SELECT * FROM user WHERE username="'.$_SESSION['username'].'"');
                            $data=mysqli_fetch_array($q);
                            echo($data['bagian']);
                            ?></option>
                            
                            <?php
                            $tampil = mysqli_query($connect,"SELECT nama FROM bagian ORDER BY nama");
                            while ($w = mysqli_fetch_array($tampil)) {
                            echo "<option value=$w[nama]>$w[nama]</option>";
                            }
                            ?>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="return confirm('Apakah anda yakin?')">Update Akun</button>
                </form>
            </div>
        </div>
    </div>
</div>