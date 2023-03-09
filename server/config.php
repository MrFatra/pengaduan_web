<?php

$connect = mysqli_connect('localhost', 'root', '', 'belajar_pengaduan');

if (!$connect) {
    die('Database Gagal Tersambung');
}