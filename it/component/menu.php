<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li <?php
                if($_SESSION['menu']=='index'){
                    echo('class="active"');
                }
            ?>
        >
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li <?php
                if($_SESSION['menu']=='detail'){
                    echo('class="active"');
                }
            ?>
        >
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#inventory"><i class="fa fa-fw fa-list"></i> Inventory<i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="inventory" class="collapse">
                <li>
                    <a href="komputer.php"><i class="fa fa-fw fa-calculator"> </i> Komputer</a>
                </li>
                <li>
                    <a href="printer.php"><i class="fa fa-fw fa-print"> </i> Printer</a>
                </li>
                <!--<li>-->
                <!--    <a href="alkom.php"><i class="fa fa-fw fa-mobile-phone"> </i> Alat Komunikasi</a>-->
                <!--</li>-->
            </ul>
        </li>
        
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#server"><i class="fa fa-fw fa-desktop"></i> Monitoring Server<i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="server" class="collapse">
                <li>
                    <a href="logbook.php"><i class="fa fa-fw fa-book"> </i> Logbook</a>
                </li>
                <li>
                    <a href="suhu.php"><i class="fa fa-fw fa-tree" aria-hidden="true"> </i> Suhu</a>
                </li>
                <!--<li>-->
                <!--    <a href="alkom.php"><i class="fa fa-fw fa-mobile-phone"> </i> Alat Komunikasi</a>-->
                <!--</li>-->
            </ul>
        </li>
        
        
        
        <li <?php
                if($_SESSION['menu']=='dailyactivity'){
                    echo('class="active"');
                }
            ?>>
            <a href="dailyactivity.php"><i class="fa fa-fw fa-inbox"> </i> Daily Activity</a>
        </li>

        <!-- <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#maintenance"><i class="fa fa-fw fa-gear"></i> Maintenance <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="maintenance" class="collapse">
                <li>
                    <a href="maintkomp.php"><i class="fa fa-fw fa-calculator"> </i> Komputer</a>
                </li>
                <li>
                    <a href="maintprinter.php"><i class="fa fa-fw fa-print"> </i> Printer</a>
                </li>
                <li>
                    <a href="maintalkom.php"><i class="fa fa-fw fa-mobile-phone"> </i> Alat Komunikasi</a>
                </li>
                <li>
                    <a href="maintnetwork.php"><i class="fa fa-fw fa-flash"> </i> Jaringan</a>
                </li>
            </ul>
        </li> -->
        <!--<li>
            <a href="#" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-users"></i> User <i
                    class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li>
                    <a href="list-user.php">Daftar Pengguna</a>
                </li>
                <li>
                    <a href="list-admin.php">Daftar Admin</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="pengerjaan.php"><i class="fa fa-fw fa-check"></i> Pengerjaan <?php
                                                                                        echo($_SESSION['username']);
                                                                                    ?></a>
        </li>-->
    </ul>
</div>