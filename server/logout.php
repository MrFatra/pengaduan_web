<?php

session_start();

switch ($_SESSION['role']) {
    case 'masyarakat':
        session_destroy();
        header('location: ../masyarakat/login.php');
        break;

    case 'petugas':
        session_destroy();
        header('location: ../petugas/login.php');
        break;

    case 'admin':
        session_destroy();
        header('location: ../petugas/login.php');
        break;

    default:
        break;
}
