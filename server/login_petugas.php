<?php

require 'config.php';
require 'addons.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM petugas WHERE username = '$username'";
    $query = mysqli_query($connect, $sql);

    if ($query && $query->num_rows > 0) {
        $data = mysqli_fetch_assoc($query);
        if (password_verify($password, $data['password'])) {
            session_start();
            $_SESSION['id_petugas'] = $data['id_petugas'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['level'];
            $_SESSION['logged'] = 'y';
            header('location: ../petugas/');
        } else {
            get_message('Username/password salah.', '../petugas/login.php');
        }
    } else {
        get_message('User tidak ditemukan.', '../petugas/login.php');
    }
} else {
    header('location: ../index.php');
}
