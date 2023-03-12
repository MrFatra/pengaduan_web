<?php

require 'config.php';
require 'addons.php';

if (isset($_POST['delete']) && isset($_POST['id_petugas'])) {
    $id = $_POST['id_petugas'];

    $sql = "DELETE FROM petugas WHERE id_petugas = '$id'";
    $query = mysqli_query($connect, $sql);

    if ($query) {
        get_message('Data berhasil dihapus.', '../index.php');
    } else {
        get_message('Data gagal dihapus.', '../index.php');
    }
} else {
    header('location: ../index.php');
}
