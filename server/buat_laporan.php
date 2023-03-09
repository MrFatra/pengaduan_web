<?php

require 'config.php';

if (isset($_POST['submit'])) {
    $nik = $_POST['nik'];
    $judul_laporan = $_POST['judul_laporan'];
    $tgl_laporan = $_POST['tgl_laporan'];
    $isi_laporan = $_POST['isi_laporan'];
    $foto_temp = $_FILES['foto']['tmp_name'];
    $foto = rand(3, 3) . $_FILES['foto']['name'];
    $stat = 0;

    $sql = "INSERT INTO pengaduan VALUES('', '$tgl_laporan', '$nik', '$judul_laporan', '$isi_laporan', '$foto', '$stat')";
    $query = mysqli_query($connect, $sql);

    if ($query) {
        move_uploaded_file($foto_temp, "../img/laporan/$foto");
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
