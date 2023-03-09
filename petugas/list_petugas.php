 <!-- Basic Card Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-gray-900 text-center" style="font-size: 24px;">Data Petugas</h6>
     </div>
     <div class="card-body">
         <a href="?page=tambah_petugas" class="btn btn-icon-split btn-success mb-3">
             <span class="icon">
                 <i class="fas fa-plus"></i>
             </span>
             <span class="text font-weight-bold">Tambah Petugas</span>
         </a>
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr class="text-center">
                         <th>No</th>
                         <th>Nama Petugas</th>
                         <th>No Telepon</th>
                         <th>Username Petugas</th>
                         <th>Level</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        require '../server/config.php';

                        $no = 1;
                        $sql = "SELECT * FROM petugas WHERE id_petugas <> '$_SESSION[id_petugas]'";
                        $query = mysqli_query($connect, $sql);

                        if ($query) {
                            while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                             <tr class="text-center">
                                 <td class="align-middle"><?= $no++ ?></td>
                                 <td class="align-middle"><?= $data['nama_petugas'] ?></td>
                                 <td class="align-middle"><?= $data['telepon'] ?></td>
                                 <td class="align-middle"><?= $data['username'] ?></td>
                                 <td class="align-middle <?= $data['level'] == 'admin' ? 'text-warning font-weight-bold' : 'text-info font-weight-bold' ?>"><?= strtoupper($data['level']) ?></td>
                                 <td class="align-middle">
                                     <a href="?page=edit_petugas&id=<?= $data['id_petugas'] ?>" class="btn btn-icon-split btn-info mb-2">
                                         <span class="icon">
                                             <i class="fas fa-pen"></i>
                                         </span>
                                         <span class="text">Edit</span>
                                     </a>
                                     <form action="../server/hapus_petugas.php" method="post">
                                         <input type="hidden" value="<?= $data['id_petugas'] ?>" name="id_petugas">
                                         <button class="btn btn-icon-split btn-danger" name="delete" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                             <span class="icon">
                                                 <i class="fas fa-trash"></i>
                                             </span>
                                             <span class="text">Hapus</span>
                                         </button>
                                     </form>
                                 </td>
                             </tr>
                     <?php
                            }
                        }
                        ?>
                 </tbody>
             </table>
         </div>
     </div>
 </div>


 <!-- Page level plugins -->
 <script src="vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="js/demo/datatables-demo.js"></script>