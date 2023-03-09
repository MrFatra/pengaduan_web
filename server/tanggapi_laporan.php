<?php

require 'config.php';

if (isset($_POST['submit'])) {
    $tanggapan = $_POST['tanggapan'];
    $tgl_tanggapan = date('Y/m/d');
    $id = $_GET['id'];

    $sql = "UPDATE tanggapan SET tgl_tanggapan = '$tgl_tanggapan', tanggapan = '$tanggapan' WHERE id_pengaduan = '$id'";
    $query = mysqli_query($connect, $sql);
    $status_update_sql = "UPDATE pengaduan SET status = 'selesai' WHERE id_pengaduan = '$id'";
    $query = mysqli_query($connect, $status_update_sql);

    if ($query) {
?>
        <script>
            alert('Data berhasil ditanggapi!')
            window.location = '../petugas/'
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Data gagal ditanggapi!')
            window.location = '../petugas/'
        </script>
<?php
    }
}
