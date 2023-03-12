<?php

require 'config.php';
require 'addons.php';

if (isset($_POST['delete']) && isset($_POST['id_pengaduan'])) {
    $id = $_POST['id_pengaduan'];

    $sql = "DELETE FROM pengaduan WHERE id_pengaduan = '$id'";
    $query = mysqli_query($connect, $sql);

    if ($query) {
        get_message('Data berhasil dihapus.', '../petugas/index.php');
    } else {
        get_message('Data gagal dihapus.', '../petugas/index.php');
    }
} else {
    header('location: ../index.php');
}
