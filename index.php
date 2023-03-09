<?php
// cek login
if (isset($_SESSION['role'])) {
    switch ($_SESSION['role']) {
        case 'masyarakat':
            header('location: masyarakat/');
            break;

        case 'petugas' || 'admin':
            header('location: petugas/');
            break;

        default:
            header('location: 404.php');
            break;
    }
} else {
    header('location: masyarakat/login.php');
}
