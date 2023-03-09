<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'tambah_petugas':
            include 'tambah_petugas.php';
            break;

        case 'upcoming':
            include 'up_laporan.php';
            break;

        case 'detail_laporan':
            include 'detail_laporan.php';
            break;

        case 'list_petugas':
            if ($_SESSION['role'] == 'admin') {
                include 'list_petugas.php';
                break;
            } else
                break;

        case 'laporan_pengaduan':
            if ($_SESSION['role'] == 'admin') {
                include 'laporan_pengaduan.php';
                break;
            } else
                break;

        case 'laporan_petugas':
            if ($_SESSION['role'] == 'admin') {
                include 'laporan_petugas.php';
                break;
            } else
                break;

        case 'edit_petugas':
            if ($_SESSION['role'] == 'admin') {
                include 'edit_petugas.php';
                break;
            } else
                break;

        case 'tanggapi':
            include 'tanggapi.php';
            break;

        case 'konfirmasi':
            if ($_SESSION['role'] == 'admin') {
                include 'konfirmasi.php';
                break;
            } else
                break;

        default:
            include '../404.php';
            break;
    }
}
