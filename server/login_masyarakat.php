<?php

require 'config.php';
require 'addons.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM masyarakat WHERE username = '$username'";
    $query = mysqli_query($connect, $sql);

    if ($query && $query->num_rows > 0) {
        $data = mysqli_fetch_assoc($query);
        if (password_verify($password, $data['password'])) {
            session_start();
            $_SESSION['nik'] = $data['nik'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = 'masyarakat';
            $_SESSION['logged'] = 'y';
            header('location: ../masyarakat/');
        } else {
            get_message('Username/password salah.', '../masyarakat/login.php');
        }
    } else {
        get_message('User tidak ditemukan', '../masyarakat/login.php');
    }
} else {
    header('location: ../index.php');
}
