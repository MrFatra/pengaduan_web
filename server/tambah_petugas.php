<?php

require 'config.php';
require 'addons.php';

if (isset($_POST['submit'])) {
    $nama_petugas = $_POST['nama_petugas'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $level = $_POST['level'];

    $sql = "INSERT INTO petugas VALUES('', '$nama_petugas', '$username', '$password', '$telp', '$level')";
    $query = mysqli_query($connect, $sql);

    if ($query) {
        get_message('Data berhasil ditambahkan.', '../petugas/index.php?page=list_petugas');
    } else {
        get_message('Data gagal ditambahkan.', '../petugas/index.php?page=list_petugas');
    }
} else {
    header('location: ../index.php');
}
