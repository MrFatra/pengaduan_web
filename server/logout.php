<?php

session_start();

switch ($_SESSION['role']) {
    case 'masyarakat':
        session_destroy();
        $_SESSION = [];
        header('location: ../masyarakat/');
        break;

    case 'petugas':
        session_destroy();
        $_SESSION = [];
        header('location: ../petugas/');
        break;

    case 'admin':
        session_destroy();
        $_SESSION = [];
        header('location: ../petugas/');
        break;

    default:
        break;
}
