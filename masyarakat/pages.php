<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'detail_pengaduan':
            include 'detail_pengaduan.php';
            break;

        case 'pengaduan':
            include 'pengaduan.php';
            break;

        case 'buat_laporan':
            include 'buat_laporan.php';
            break;

        case 'edit_laporan':
            include 'edit_laporan.php';
            break;

        default:
            include '../404.php';
            break;
    }
}
