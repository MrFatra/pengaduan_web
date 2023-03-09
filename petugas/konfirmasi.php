<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-gray-900 text-center" style="font-size: 30px;">Pilih Petugas</h6>
    </div>
    <div class="card-body">
        <a class="btn btn-icon-split btn-primary mb-4" href="?page=upcoming">
            <span class="icon">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        <p class="font-weight-bold text-gray-800" style="font-size: 20px;">Pilih petugas dibawah ini :</p>
        <form action="../server/konfirmasi_laporan.php" method="post">
            <input type="hidden" name="id_pengaduan" value="<?= $_GET['id'] ?>">
            <select name="id_petugas" id="petugas" class="form-control" required>
                <?php
                require '../server/config.php';
                $sql = "SELECT * FROM petugas";
                $query = mysqli_query($connect, $sql);

                while ($data = $query->fetch_assoc()) {
                ?>
                    <option value="<?= $data['id_petugas'] ?>"><?= $data['nama_petugas'] ?></option>
                <?php
                }
                ?>
            </select>
            <button type="submit" name="submit" class="btn btn-icon-split btn-success mt-4" onclick="return confirm('Apakah anda yakin ingin konfirmasi data ini?')">
                <span class="icon">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Verifikasi Laporan</span>
            </button>
        </form>
    </div>
</div>