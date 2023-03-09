<?php

require '../server/config.php';

$sql = "SELECT * FROM pengaduan a INNER JOIN masyarakat b ON a.nik = b.nik WHERE id_pengaduan = '$_GET[id]'";
$query = mysqli_query($connect, $sql);

if ($query) {
    $data = mysqli_fetch_assoc($query);
?>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-gray-900 text-center" style="font-size: 30px;">Tanggapi Laporan</h6>
            <a class="btn btn-icon-split btn-primary" href="?page=upcoming">
                <span class="icon">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
            <form action="../server/tanggapi_laporan.php?id=<?= $_GET['id'] ?>" method="post">
                <div class="form-group">
                    <label class="form-label" for="nik">NIK : </label>
                    <input class="form-control" type="number" id="nik" name="nik" value="<?= $data['nik'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nama_pelapor">Nama Pelapor : </label>
                    <input class="form-control" type="text" id="nama_pelapor" name="nama_pelapor" value="<?= $data['nama'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="judul_laporan">Judul Laporan</label>
                    <input class="form-control" type="text" id="judul_laporan" name="judul_laporan" value="<?= $data['judul_laporan'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="tgl_laporan">Tanggal Laporan</label>
                    <input class="form-control" type="date" id="tgl_laporan" name="tgl_laporan" value="<?= $data['tgl_pengaduan'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="isi_laporan">Isi Laporan</label>
                    <textarea class="form-control" id="isi_laporan" name="isi_laporan" rows="6" placeholder="<?= $data['isi_laporan'] ?>" readonly></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="foto">Bukti Foto Kejadian</label>
                    <img width="50%" height="50%" src="../img/laporan/<?= $data['foto'] ?>" alt="<?php
                                                                                                    $format = ['.jpg', '.png', '.gif', '.jpeg'];
                                                                                                    echo str_replace($format, '', $data['foto']);
                                                                                                    ?>">
                </div>
                <div class="form-group">
                    <label class="form-label" for="tanggapan">Isi Tanggapan :</label>
                    <textarea class="form-control" id="tanggapan" name="tanggapan" rows="6" placeholder="Isi tanggapan anda disini..." required></textarea>
                </div>

                <button class="btn btn-icon-split btn-success" name="submit" type="submit">
                    <span class="icon">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Tanggapi</span>
                </button>

                <button class="btn btn-icon-split btn-warning" name="reset" type="reset">
                    <span class="icon">
                        <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Reset</span>
                </button>
            </form>
        </div>
    </div>
<?php
} else {
?>
    <h4 class="font-weight-bold text-danger">Mohon maaf, data yang anda berikan tidak tersedia untuk saat ini.</h4>
<?php
}
?>