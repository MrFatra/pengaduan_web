<?php

session_start();
require 'config.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM masyarakat WHERE username = '$username'";
    $query = mysqli_query($connect, $sql);

    if ($query && $query->num_rows > 0) {
        $data = mysqli_fetch_assoc($query);
        if (password_verify($password, $data['password'])) {
            $_SESSION['nik'] = $data['nik'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = 'masyarakat';
            $_SESSION['logged'] = 'y';
            header('location: ../masyarakat/');
        }
    } else {
        header('location: ../masyarakat/login.php');
    }
}
