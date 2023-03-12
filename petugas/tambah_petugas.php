 <!-- Basic Card Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-gray-900 text-center" style="font-size: 30px;">Tambah Petugas Baru</h6>
         <a class="btn btn-icon-split btn-primary" href="?page=upcoming">
             <span class="icon">
                 <i class="fas fa-arrow-left"></i>
             </span>
             <span class="text">Kembali</span>
         </a>
     </div>
     <div class="card-body">
         <form action="../server/tambah_petugas.php" method="post">
             <div class="form-group">
                 <label class="form-label" for="nama_petugas">Nama Petugas</label>
                 <input class="form-control" type="text" id="nama_petugas" name="nama_petugas" required>
             </div>
             <div class="form-group">
                 <label class="form-label" for="telp">Nomor Telepon</label>
                 <input class="form-control" type="number" id="telp" name="telp" required>
             </div>
             <div class="form-group">
                 <label class="form-label" for="username">Username</label>
                 <input class="form-control" type="text" id="username" name="username" required>
             </div>
             <div class="form-group">
                 <label class="form-label" for="password">Password</label>
                 <input type="password" class="form-control" id="password" name="password" required>
             </div>
             <div class="form-group">
                 <label class="form-label" for="level">Level</label>
                 <select name="level" id="level" class="form-control" required>
                     <option value="admin">Admin</option>
                     <option value="petugas">Petugas</option>
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