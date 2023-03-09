<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Frame Laporan Pengaduan</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper justify-content-center">

        <div class="card shadow">
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
                                <th>Isi Laporan</th>
                                <th>Tanggal Pengaduan</th>
                                <th>Status</th>
                                <th>Tanggal Tanggapan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require '../server/config.php';

                            $no = 1;
                            $sql = "SELECT * FROM pengaduan a LEFT JOIN tanggapan b ON b.id_pengaduan = a.id_pengaduan INNER JOIN masyarakat c ON c.nik = a.nik";
                            $query = mysqli_query($connect, $sql);

                            if ($query) {

                                while ($data = mysqli_fetch_assoc($query)) {
                            ?>
                                    <tr class="text-center">
                                        <td class="align-middle"><?= $no++ ?></td>
                                        <td class="align-middle"><?= $data['nama'] ?></td>
                                        <td class="align-middle"><?= $data['judul_laporan'] ?></td>
                                        <td class="align-middle"><?= $data['isi_laporan'] ?></td>
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
                                        <td class="align-middle"><?= $data['tgl_tanggapan'] == '0000-00-00' || $data['tgl_tanggapan'] == null  ? '-' : $data['tgl_tanggapan'] ?></td>
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

    </div>
    <!-- End of Page Wrapper -->

</body>

</html>