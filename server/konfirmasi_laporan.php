<?php

session_start();
require 'config.php';
require 'addons.php';

if (isset($_POST['id_pengaduan']) && isset($_POST['id_petugas'])) {
    $id_petugas = $_POST['id_petugas'];
    $id_pengaduan = $_POST['id_pengaduan'];

    $sql_update = "UPDATE pengaduan SET status = 'proses' WHERE id_pengaduan = '$id_pengaduan'";
    $query_update = mysqli_query($connect, $sql_update);
    $sql_insert = "INSERT INTO tanggapan(id_pengaduan, id_petugas) VALUES('$id_pengaduan', '$id_petugas') ON DUPLICATE KEY UPDATE id_pengaduan = '$id_pengaduan', id_petugas = '$id_petugas'";
    $query_insert = mysqli_query($connect, $sql_insert);

    if ($query_insert && $query_update) {
        get_message('Data berhasil dikonfirmasi.', '../petugas/?page=upcoming');
    } else {
        get_message('Data gagal dikonfirmasi.', '../petugas/?page=upcoming');
    }
} else {
    header('location: ../index.php');
}
