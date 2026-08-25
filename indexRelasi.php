<?php
include "function.php";
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 1) {
        header("location: test.php");
    }
} else {
    header("location:index.php");
}

$queryRelasi = mysqli_query($koneksi, "SELECT * FROM relasi");

$jumlahPasien = mysqli_query($koneksi, "SELECT COUNT('id_user') as jml_pasien FROM user WHERE role='1'");
$pasien = mysqli_fetch_assoc($jumlahPasien);

$jumlahPenyakit = mysqli_query($koneksi, "SELECT COUNT('id_penyakit') as jml_penyakit FROM penyakit");
$penyakit = mysqli_fetch_assoc($jumlahPenyakit);

$jumlahGejala = mysqli_query($koneksi, "SELECT COUNT('id_gejala') as jml_gejala FROM gejala");
$gejala = mysqli_fetch_assoc($jumlahGejala);

$jumlahSolusi = mysqli_query($koneksi, "SELECT COUNT('solusi') as jml_solusi FROM solusi");
$solusi = mysqli_fetch_assoc($jumlahSolusi);

$jumlahRelasi = mysqli_query($koneksi, "SELECT COUNT('id_relasi') as jml_relasi FROM relasi");
$relasi = mysqli_fetch_assoc($jumlahRelasi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&display=swap"         rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="customadmin.css"> 
</head>

<body>
    <div class="kiri">
    <a class="navbar-brand" href="indexAdmin.php"
          ><img src="gambar/logobaru.png" width="50" height="50" alt="logo">
        </a>
        <div class="sidebar-heading">
            <h5 class="font-weight-bold text-white text-uppercase teks">Data User</h5>
        </div>
        <section class="isi">
            <a class="nav-link" href="indexAdmin.php">
                <span>Data Pasien</span></a>
        </section>
        <section class="isi">
            <a class="nav-link" href="indexPakar.php">
                <span>Data Pakar</span></a>
        </section>
        <div class="sidebar-heading">
            <h5 class="font-weight-bold text-white text-uppercase teks">Gejala & Penyakit</h5>
        </div>
        <section class="isi">
            <a class="nav-link" href="indexPenyakit.php">
                <span>Data Penyakit</span>
            </a>
        </section>
        <section class="isi">
            <a class="nav-link" href="indexGejala.php">
                <span>Data Gejala</span>
            </a>
        </section>
        <div class="sidebar-heading">
            <h5 class="font-weight-bold text-white text-uppercase teks">Solusi dan Relasi</h5> 
        </div>
        <section class="isi">
            <a class="nav-link" href="indexSolusi.php">
            <span>Data Solusi</span>
            </a>
        </section>
        <section class="isi">
            <a class="nav-link" href="indexRelasi.php">
            <span>Data Relasi</span>
            </a>
        </section>
        <section class="isi">
            <a class="nav-link" href="indexLaporan.php">
            <span>Laporan</span>
            </a>
        </section>
        <section class="isi">
            <a class="nav-link" href="logout.php">
                <span>Logout</span>
            </a>
        </section>
    </div>

    <div class="kanan">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Relasi</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- DataTales Example -->
<div class="card shadow mb-12">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data Relasi</h6>
    </div>
    <div class="card shadow mb-12">
    <!-- ... Other parts of the HTML ... -->
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
        <a href="tambahRelasi.php" class="btn btn-primary my-2 px-2">Tambah Data Relasi</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Id Relasi</th>
                        <th>Id Gejala</th>
                        <th>Id Penyakit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $resultsPerPage = 10; // Number of results to display per page
                    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $startIndex = ($currentPage - 1) * $resultsPerPage;

                    // Fetch only the relevant data for the current page
                    $queryRelasi = mysqli_query($koneksi, "SELECT * FROM relasi LIMIT $startIndex, $resultsPerPage");

                    while ($data = mysqli_fetch_assoc($queryRelasi)) { ?>
                        <tr>
                            <td>
                                <a class="badge badge-pill badge-primary" href="ubahRelasi.php?id_relasi=<?php echo $data["id_relasi"]; ?>">edit</a>
                                <a href="function.php?act=hapusRelasi&id_relasi=<?= $data['id_relasi']; ?>" onclick="return confirm('Yakin ingin menghapus relasi?');" class="badge badge-pill badge-danger">hapus</a>
                            </td>
                            <td><?= $data['id_relasi']; ?></td>
                            <td><?= $data['id_gejala']; ?></td>
                            <td><?= $data['id_penyakit']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Pagination Links -->
            <ul class="pagination justify-content-center mt-3">
                <?php
                $totalResults = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM relasi"));
                $totalPages = ceil($totalResults / $resultsPerPage);

                if ($totalPages > 1) {
                    for ($i = 1; $i <= $totalPages; $i++) {
                        echo '<li class="page-item ';
                        echo ($i == $currentPage) ? 'active' : '';
                        echo '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                    }
                }
                ?>
            </ul>
        </form>
    </div>
</div>
</body>
<footer>
    <div class="container">
      <p class="footer-text">
        &copy; <?php echo date('Y'); ?> SP Diagnosis Penyakit Pernapasan Anak.
        <br />
        Dikembangkan oleh <a href="https://www.facebook.com/Robby.Bambang.6799/?locale=id_ID" class="footer-link">Robby Bambang Hadinata</a>.
      </p>
    </div>
  </footer>
</html>
