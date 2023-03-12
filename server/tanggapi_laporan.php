<?php

require 'config.php';
require 'addons.php';

if (isset($_POST['submit'])) {
    $tanggapan = $_POST['tanggapan'];
    $tgl_tanggapan = date('Y/m/d');
    $id = $_GET['id'];

    $sql = "UPDATE tanggapan SET tgl_tanggapan = '$tgl_tanggapan', tanggapan = '$tanggapan' WHERE id_pengaduan = '$id'";
    $query = mysqli_query($connect, $sql);
    $status_update_sql = "UPDATE pengaduan SET status = 'selesai' WHERE id_pengaduan = '$id'";
    $query = mysqli_query($connect, $status_update_sql);

    if ($query) {
        get_message('Laporan berhasil ditanggapi.', '../petugas/index.php?page=upcoming');
    } else {
        get_message('Laporan gagal ditanggapi.', '../petugas/index.php?page=upcoming');
    }
} else {
    header('location: ../index.php');
}
