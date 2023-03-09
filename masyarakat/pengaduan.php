 <!-- Basic Card Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-gray-900 text-center" style="font-size: 24px;">Data Pengaduan</h6>
     </div>
     <div class="card-body">
         <a href="?page=buat_laporan" class="btn btn-icon-split btn-success mb-3">
             <span class="icon">
                 <i class="fas fa-plus"></i>
             </span>
             <span class="text font-weight-bold">Buat Laporan</span>
         </a>
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr class="text-center">
                         <th>No</th>
                         <th>NIK</th>
                         <th>Judul Pengaduan</th>
                         <th>Tanggal Pengaduan</th>
                         <th>Status</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        require '../server/config.php';

                        $no = 1;
                        $sql = "SELECT * FROM pengaduan WHERE nik = '$_SESSION[nik]'";
                        $query = mysqli_query($connect, $sql);

                        if ($query) {
                            while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                             <tr class="text-center">
                                 <td class="align-middle"><?= $no++ ?></td>
                                 <td class="align-middle"><?= $data['nik'] ?></td>
                                 <td class="align-middle"><?= $data['judul_laporan'] ?></td>
                                 <td class="align-middle"><?= $data['tgl_pengaduan'] ?></td>
                                 <?php
                                    if ($data['status'] == 'proses') :
                                    ?>
                                     <td class="text-info font-weight-bold align-middle">Proses</td>
                                 <?php
                                    elseif ($data['status'] == 'selesai') :
                                    ?>
                                     <td class="text-success font-weight-bold align-middle">Selesai</td>
                                 <?php
                                    else :
                                    ?>
                                     <td class="text-warning font-weight-bold align-middle">Menunggu</td>
                                 <?php endif ?>
                                 <td class="align-middle">
                                     <?php if ($data['status'] == 'selesai') : ?>
                                         <a href="?page=detail_pengaduan&id=<?= $data['id_pengaduan'] ?>" class="btn btn-icon-split btn-primary">
                                             <span class="icon">
                                                 <i class="fas fa-info"></i>
                                             </span>
                                             <span class="text">Detail</span>
                                         </a>
                                     <?php elseif ($data['status'] == '0') : ?>
                                         <a href="?page=edit_laporan&id=<?= $data['id_pengaduan'] ?>" class="btn btn-icon-split btn-info mb-2">
                                             <span class="icon">
                                                 <i class="fas fa-pen"></i>
                                             </span>
                                             <span class="text">Edit</span>
                                         </a>
                                         <form action="../server/hapus_pengaduan.php" method="post">
                                             <input type="hidden" value="<?= $data['id_pengaduan'] ?>" name="id_pengaduan">
                                             <button class="btn btn-icon-split btn-danger" name="delete" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                 <span class="icon">
                                                     <i class="fas fa-trash"></i>
                                                 </span>
                                                 <span class="text">Hapus</span>
                                             </button>
                                         </form>
                                     <?php else : ?>
                                         <h4 class="font-weight-bold">-</h4>
                                     <?php endif ?>
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