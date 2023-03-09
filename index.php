<?php
session_start();

// cek login
if (isset($_SESSION['role'])) {
    switch ($_SESSION['role']) {
        case 'masyarakat':
            header('location: masyarakat/');
            break;

        case 'petugas':
            header('location: petugas/');
            break;

        default:
            break;
    }
} else {
    header('masyarakat/login.php');
}
