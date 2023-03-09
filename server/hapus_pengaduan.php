<?php

require 'config.php';

if (isset($_POST['delete']) && isset($_POST['id_pengaduan'])) {
    $id = $_POST['id_pengaduan'];

    $sql = "DELETE FROM pengaduan WHERE id_pengaduan = '$id'";
    $query = mysqli_query($connect, $sql);

    if ($query) {
?>
        <script>
            alert('Data berhasil dihapus!')
            window.location = '../index.php'
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Data gagal dihapus!')
            window.location = '../index.php'
        </script>
<?php
    }
}
