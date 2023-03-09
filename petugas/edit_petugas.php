<?php

require '../server/config.php';

$sql = "SELECT * FROM petugas WHERE id_petugas = '$_GET[id]'";
$query = mysqli_query($connect, $sql);
if ($query) {
    $data = mysqli_fetch_assoc($query);
?>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-gray-900 text-center" style="font-size: 30px;">Edit Petugas</h6>
            <a class="btn btn-icon-split btn-primary" href="?page=list_petugas">
                <span class="icon">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
            <form action="../server/edit_petugas.php?id=<?= $_GET['id'] ?>" method="post">
                <div class="form-group">
                    <label class="form-label" for="nama_petugas">Nama : </label>
                    <input class="form-control" type="text" id="nama_petugas" name="nama_petugas" value="<?= $data['nama_petugas'] ?>">
                </div>
                <div class="form-group">
                    <label class="form-label" for="telp">Nomor Telepon : </label>
                    <input class="form-control" type="number" id="telp" name="telp" value="<?= $data['telepon'] ?>">
                </div>
                <div class="form-group">
                    <label class="form-label" for="username">Username : </label>
                    <input class="form-control" type="text" id="username" name="username" value="<?= $data['username'] ?>">
                </div>
                <div class="form-group">
                    <label class="form-label" for="level">Level : </label>
                    <select class="form-control" name="level" id="level">
                        <option value="admin" <?= $data['level'] == 'admin' ? 'selected' : null ?>>Admin</option>
                        <option value="petugas" <?= $data['level'] == 'petugas' ? 'selected' : null ?>>Petugas</option>
                    </select>
                </div>

                <button class="btn btn-icon-split btn-success" type="submit" name="submit">
                    <span class="icon">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Simpan</span>
                </button>
                <button class="btn btn-icon-split btn-warning" type="reset">
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
