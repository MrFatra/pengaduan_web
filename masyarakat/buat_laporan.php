 <!-- Basic Card Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-gray-900 text-center" style="font-size: 30px;">Buat Laporan Baru</h6>
         <a class="btn btn-icon-split btn-primary" href="?page=pengaduan">
             <span class="icon">
                 <i class="fas fa-arrow-left"></i>
             </span>
             <span class="text">Kembali</span>
         </a>
     </div>
     <div class="card-body">
         <form action="../server/buat_laporan.php" method="post" enctype="multipart/form-data">
             <div class="form-group">
                 <label class="form-label" for="nik">NIK</label>
                 <input class="form-control" type="number" id="nik" name="nik" value="<?= $_SESSION['nik'] ?>" readonly required>
             </div>
             <div class="form-group">
                 <label class="form-label" for="judul_laporan">Judul Laporan</label>
                 <input class="form-control" type="text" id="judul_laporan" name="judul_laporan" required>
             </div>
             <div class="form-group">
                 <label class="form-label" for="tgl_laporan">Tanggal Laporan</label>
                 <input class="form-control" type="date" id="tgl_laporan" name="tgl_laporan" required>
             </div>
             <div class="form-group">
                 <label class="form-label" for="isi_laporan">Isi Laporan</label>
                 <textarea class="form-control" id="isi_laporan" name="isi_laporan" rows="6" required></textarea>
             </div>
             <div class="form-group">
                 <label class="form-label" for="foto">Bukti Foto Kejadian</label>
                 <input class="form-control" type="file" id="foto" name="foto" required>
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