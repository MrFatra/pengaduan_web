<?php

require 'config.php';
require 'addons.php';

if (isset($_POST['submit']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $nik = $_POST['nik'];
    $judul_laporan = $_POST['judul_laporan'];
    $tgl_laporan = $_POST['tgl_laporan'];
    $isi_laporan = $_POST['isi_laporan'];
    $foto_temp = $_FILES['foto']['tmp_name'];
    $foto = $_FILES['foto']['name'] == '' ? $_POST['foto_temp'] : $_FILES['foto']['name'];

    $sql = "UPDATE pengaduan SET tgl_pengaduan='$tgl_laporan', nik='$nik', judul_laporan='$judul_laporan', isi_laporan='$isi_laporan', foto='$foto' WHERE id_pengaduan = '$id'";
    $query = mysqli_query($connect, $sql);

    if ($query) {
        $foto_temp != null || $foto_temp != '' ? move_uploaded_file($foto_temp, "../img/laporan/$foto") : null;
        get_message('Data berhasil diedit.', '../masyarakat/');
    } else {
        get_message('Data gagal diedit.', '../masyarakat/');
    }
} else {
    header('location: ../index.php');
}
