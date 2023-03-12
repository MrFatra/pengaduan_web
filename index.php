<?php
// cek login
if (session_start()) {
    switch ($_SESSION['role']) {
        case 'petugas':
            header('location: petugas/');
            break;

        case 'admin':
            header('location: petugas/');
            break;

        case 'masyarakat':
            header('location: masyarakat/');
            break;

        default:
            header('location: 404.php');
            break;
    }
} else {
    header('location: masyarakat/login.php');
}
