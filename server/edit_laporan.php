<?php

require 'config.php';

if (isset($_POST['submit']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $nik = $_POST['nik'];
    $judul_laporan = $_POST['judul_laporan'];
    $tgl_laporan = $_POST['tgl_laporan'];
    $isi_laporan = $_POST['isi_laporan'];
    $foto_temp = $_FILES['foto']['tmp_name'];
    $foto = $_FILES['foto']['name'];

    $sql = "UPDATE pengaduan SET tgl_pengaduan='$tgl_laporan', nik='$nik', judul_laporan='$judul_laporan', isi_laporan='$isi_laporan', foto='$foto' WHERE id_pengaduan = '$id'";
    $query = mysqli_query($connect, $sql);

    if ($query) {
?>
        <script>
            alert('Data berhasil ditambahkan!')
            window.location = '../masyarakat/'
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Data gagal ditambahkan!')
            window.location = '../masyarakat/'
        </script>
<?php
    }
}
