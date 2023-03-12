<?php

require 'config.php';
require 'addons.php';

if (isset($_POST['submit']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $username = $_POST['username'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];
    $nama_petugas = $_POST['nama_petugas'];

    $sql = "UPDATE petugas SET username = '$username', telepon = '$telp', nama_petugas = '$nama_petugas', level = '$level' WHERE id_petugas = '$id'";
    $query = mysqli_query($connect, $sql);

    if ($query) {
        get_message('Data berhasil diedit.', '../petugas/');
    } else {
        get_message('Data gagal diedit.', '../petugas/');
    }
} else {
    header('location: ../index.php');
}
