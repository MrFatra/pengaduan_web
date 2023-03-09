<?php

require 'config.php';

if (isset($_POST['submit'])) {
    $nama_petugas = $_POST['nama_petugas'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $level = $_POST['level'];

    $sql = "INSERT INTO petugas VALUES('', '$nama_petugas', '$username', '$password', '$telp', '$level')";
    $query = mysqli_query($connect, $sql);

    if ($query) {
?>
        <script>
            alert('Data berhasil ditambahkan!')
            window.location = '../petugas/index.php?page=list_petugas'
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Data gagal ditambahkan!')
            window.location = '../petugas/index.php?page=list_petugas'
        </script>
<?php
    }
}
