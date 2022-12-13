<ul class="nav navbar-right top-nav">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php
echo($_SESSION['nama_lengkap']);
?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <a href="editakun.php"><i class="fa fa-fw fa-gears"></i> Edit Akun</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="../controller/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
        </ul>
    </li>
</ul>