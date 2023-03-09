<?php

session_start();
require 'config.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM petugas WHERE username = '$username'";
    $query = mysqli_query($connect, $sql);

    if ($query && $query->num_rows > 0) {
        $data = mysqli_fetch_assoc($query);
        if (password_verify($password, $data['password'])) {
            $_SESSION['id_petugas'] = $data['id_petugas'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['level'];
            $_SESSION['logged'] = 'y';
            header('location: ../petugas/');
        } else {
            header('location: ../petugas/login.php');
        }
    } else {
        header('location: ../petugas/login.php');
    }
}
