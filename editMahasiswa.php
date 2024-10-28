<?php 

session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: index.php');
} 

require 'config/config.php';

$id = $_GET['id'];

try {
    // Query untuk mengambil data
    $stmt = $pdo->prepare("SELECT * FROM mahasiswa WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Mengambil data sebagai array asosiatif
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
    //throw $th;
    echo "Error: " . $th->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Mahasiswa</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="public/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include './src/Components/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include './src/Components/navbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Mahasiswa</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <form action="src/process/updateMahasiswa.php" method="post">
                                <div class="mb-2">
                                    <label for="name" class="form-label">NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim" aria-describedby="emailHelp" placeholder="Masukan NIM" value="<?= $result['nim']; ?>" readonly>
                                    
                                </div>
                                <div class="mb-2">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="<?= $result['nama']; ?>" required>
                                </div>
                                <div class="mb-2">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea class="form-control" placeholder="Alamat Lengkap" id="alamat" name="alamat" required><?= $result['alamat']; ?></textarea>
                                </div>
                                <div class="mb-2">
                                    <label for="name" class="form-label">Program Studi</label>
                                    <input type="text" class="form-control" id="program_studi" name="program_studi" aria-describedby="emailHelp" placeholder="Program Studi" value="<?= $result['program_studi']; ?>" required>
                                </div>
                                <div class="mb-2">
                                    <label for="address" class="form-label">No WA</label>
                                    <input type="number" class="form-control" name="nomor_wa" id="nomor_wa" placeholder="Nomor WA" value="<?= $result['nomor_wa']; ?>" required>
                                </div>
                                <div class="mb-2">
                                    <label for="born" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= $result['tanggal_lahir']; ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        
                    </div>

                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Septia Ramadhani 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="public/js/sb-admin-2.min.js"></script>

</body>

</html>