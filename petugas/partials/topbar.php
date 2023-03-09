<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-lg">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <a href="../petugas/index.php" class="nav-link font-weight-bold">Home</a>
    <a href="?page=upcoming" class="nav-link font-weight-bold">Upcoming Laporan</a>
    <?php
    if ($_SESSION['role'] == 'admin') :
    ?>
        <a href="?page=list_petugas" class="nav-link font-weight-bold">Petugas</a>
        <div class="dropdown no-arrow">
            <a href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link font-weight-bold">Laporan</a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="?page=laporan_pengaduan">Pengaduan</a>
                <a class="dropdown-item" href="?page=laporan_petugas">Petugas</a>
            </div>
        </div>
    <?php
    endif
    ?>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">


        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-800 small font-weight-bold" style="letter-spacing: .8px;">Hi! , <?= $_SESSION['username'] ?></span>
                <span class="icon">
                    <i class="fas fa-laugh-wink"></i>
                </span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->