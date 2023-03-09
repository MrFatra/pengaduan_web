<?php

require 'config.php';

if (isset($_POST['submit']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $username = $_POST['username'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];
    $nama_petugas = $_POST['nama_petugas'];

    $sql = "UPDATE petugas SET username = '$username', telepon = '$telp', nama_petugas = '$nama_petugas', level = '$level' WHERE id_petugas = '$id'";
    $query = mysqli_query($connect, $sql);

    if ($query) {
?>
        <script>
            alert('Data berhasil ditambahkan!')
            window.location = '../petugas/'
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Data gagal ditambahkan!')
            window.location = '../petugas/'
        </script>
<?php
    }
}
