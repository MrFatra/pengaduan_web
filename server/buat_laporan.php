<?php

require 'config.php';
require 'addons.php';

if (isset($_POST['submit'])) {
    $nik = $_POST['nik'];
    $judul_laporan = $_POST['judul_laporan'];
    $tgl_laporan = $_POST['tgl_laporan'];
    $isi_laporan = $_POST['isi_laporan'];
    $foto_temp = $_FILES['foto']['tmp_name'];
    $foto = $_FILES['foto']['name'];
    $stat = 0;

    $sql = "INSERT INTO pengaduan VALUES('', '$tgl_laporan', '$nik', '$judul_laporan', '$isi_laporan', '$foto', '$stat')";
    $query = mysqli_query($connect, $sql);

    if ($query) {
        move_uploaded_file($foto_temp, "../img/laporan/$foto");
        get_message('Data berhasil ditambahkan.', '../masyarakat/');
    } else {
        get_message('Data gagal ditambahkan.', '../masyarakat/');
    }
} else {
    header('location: ../index.php');
}
