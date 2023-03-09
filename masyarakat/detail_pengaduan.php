<?php

require '../server/config.php';

$sql = "SELECT * FROM pengaduan p INNER JOIN masyarakat m ON p.nik = m.nik WHERE id_pengaduan = '$_GET[id]'";
$query = mysqli_query($connect, $sql);
if ($query) {
    $data = mysqli_fetch_assoc($query);
    $tanggapan = "SELECT * FROM tanggapan a INNER JOIN petugas c ON a.id_petugas = c.id_petugas WHERE a.id_pengaduan = '$_GET[id]'";
    $query_tanggapan = mysqli_query($connect, $tanggapan);
?>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-gray-900 text-center" style="font-size: 30px;">Detail Laporan Pengaduan</h6>
            <a class="btn btn-icon-split btn-primary" href="?page=pengaduan">
                <span class="icon">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <h6 class="font-weight-bold">NIK : </h6>
                        <input class="form-control font-weight-bold" type="number" value="<?= $data['nik'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <h6 class="font-weight-bold">Judul Laporan : </h6>
                        <input class="form-control font-weight-bold" type="text" value="<?= $data['judul_laporan'] ?>" readonly>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <h6 class="font-weight-bold">Nama Pelapor : </h6>
                        <input class="form-control font-weight-bold" type="text" value="<?= $data['nama'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <h6 class="font-weight-bold">Tanggal Laporan : </h6>
                        <input class="form-control font-weight-bold" type="date" value="<?= $data['tgl_pengaduan'] ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <h6 class="font-weight-bold">Isi Laporan : </h6>
                <textarea class="form-control font-weight-bold" placeholder="<?= $data['isi_laporan'] ?>" readonly rows="6"></textarea>
            </div>
            <?php if ($query_tanggapan->num_rows != 0) {
                $tanggapan = $query_tanggapan->fetch_assoc();
            ?>
                <div class="form-group">
                    <h6 class="font-weight-bold">Ditanggapi Oleh : </h6>
                    <input class="form-control font-weight-bold" type="text" value="<?= $tanggapan['nama_petugas'] ?>" readonly>
                </div>
                <div class="form-group">
                    <h6 class="font-weight-bold">Tanggal Tanggapan : </h6>
                    <input class="form-control font-weight-bold" type="date" value="<?= $tanggapan['tgl_tanggapan'] ?>" readonly>
                </div>
                <div class="form-group">
                    <h6 class="font-weight-bold">Isi Tanggapan : </h6>
                    <textarea class="form-control font-weight-bold" placeholder="<?= $tanggapan['tanggapan'] ?>" readonly rows="6"></textarea>
                </div>
            <?php } ?>
            <div class="form-group">
                <h6 class="font-weight-bold">Bukti Foto : </h6>
                <img width="50%" height="50%" src="../img/laporan/<?= $data['foto'] ?>" alt="<?php
                                                                                                $format = ['.jpg', '.png', '.gif', '.jpeg'];
                                                                                                echo str_replace($format, '', $data['foto']);
                                                                                                ?>">
            </div>

        </div>
    </div>
<?php
} else {
?>
    <h4 class="font-weight-bold text-danger">Mohon maaf, data yang anda berikan tidak tersedia untuk saat ini.</h4>
<?php
}
?>