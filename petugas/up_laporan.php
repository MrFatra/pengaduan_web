 <!-- Basic Card Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-gray-900 text-center" style="font-size: 24px;">Data Laporan Pengaduan</h6>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr class="text-center">
                         <th>No</th>
                         <th>Nama Pelapor</th>
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
                        $sql = $_SESSION['role'] == 'admin' ? "SELECT * FROM pengaduan a INNER JOIN masyarakat c ON a.nik = c.nik" : "SELECT * FROM pengaduan a LEFT JOIN tanggapan b ON a.id_pengaduan = b.id_pengaduan INNER JOIN masyarakat c ON a.nik = c.nik WHERE id_petugas = '$_SESSION[id_petugas]'";
                        $query = mysqli_query($connect, $sql);

                        if ($query) {
                            while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                             <tr class="text-center">
                                 <td class="align-middle"><?= $no++ ?></td>
                                 <td class="align-middle"><?= $data['nama'] ?></td>
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
                                     <?php if ($data['status'] == 'selesai' || $data['status'] == '0') { ?>
                                         <a href="?page=detail_laporan&id=<?= $data['id_pengaduan'] ?>" class="btn btn-icon-split btn-primary m-2">
                                             <span class="icon">
                                                 <i class="fas fa-info"></i>
                                             </span>
                                             <span class="text">Detail</span>
                                         </a>
                                     <?php }
                                        if ($data['status'] == 'proses') { ?>
                                         <a href="?page=tanggapi&id=<?= $data['id_pengaduan'] ?>" class="btn btn-icon-split btn-info m-2">
                                             <span class="icon">
                                                 <i class="fas fa-pen"></i>
                                             </span>
                                             <span class="text">Tanggapi</span>
                                         </a>
                                     <?php }
                                        if ($data['status'] == '0' && $_SESSION['role'] == 'admin') { ?>
                                         <a href="?page=konfirmasi&id=<?= $data['id_pengaduan'] ?>" class="btn btn-icon-split btn-success m-2">
                                             <span class="icon">
                                                 <i class="fas fa-check"></i>
                                             </span>
                                             <span class="text">Verifikasi</span>
                                         </a>
                                         <form action="../server/hapus_laporan.php" method="post">
                                             <input type="hidden" name="id_pengaduan" value="<?= $data['id_pengaduan'] ?>">
                                             <button name="delete" class="btn btn-icon-split btn-danger m-2" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                 <span class="icon">
                                                     <i class="fas fa-trash"></i>
                                                 </span>
                                                 <span class="text">Hapus</span>
                                             </button>
                                         </form>
                                     <?php } ?>
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
 <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="../js/demo/datatables-demo.js"></script>