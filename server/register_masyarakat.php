<?php
// Jangan lupa require!
require 'config.php';
require 'addons.php';

// ISI PROSES REGISTER! 
if (isset($_POST['submit'])) {
    // field dari tiap tiap form ada disini!
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO masyarakat VALUES('$nik', '$nama', '$username', '$password', '$telp')";
    $query = mysqli_query($connect, $sql);

    // Pengkondisian jika query berhasil/tidak berhasil

    if ($query) { // jika query berhasil
        header('location: ../masyarakat/login.php');
    } else { // jika query tidak berhasil
        get_message('Silahkan cek kembali data yang anda inputkan lalu coba lagi.', '../masyarakat/register.php');
    }
} else {
    header('location: ../index.php');
}
