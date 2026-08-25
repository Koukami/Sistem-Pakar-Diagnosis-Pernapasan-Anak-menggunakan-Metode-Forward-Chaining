<?php


include "function.php";
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 1) {
        header("location: test.php");
    }
} else {
    header("location:index.php");
}
// Tentukan jumlah data yang ditampilkan per halaman
$recordsPerPage = 5;

// Ambil nomor halaman saat ini dari URL
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Hitung offset untuk query SQL
$offset = ($current_page - 1) * $recordsPerPage;

// Modifikasi query SQL dengan menggunakan LIMIT dan OFFSET untuk pagination
$querySolusi = mysqli_query($koneksi, "SELECT id_solusi, penyakit, solusi FROM solusi INNER JOIN penyakit ON solusi.id_penyakit = penyakit.id_penyakit LIMIT $offset, $recordsPerPage");

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
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous"/>
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&display=swap"
        rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="customadmin.css"> 
</head>

<body >
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
            <h1 class="h3 mb-0 text-gray-800">Data Solusi</h1>
        </div>

    <!-- Content Row -->
    <div class="row">

    <!-- DataTales Example -->
    <div class="card shadow mb-12">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Solusi</h6>
        </div>
        <div class="card-body">
            <form method="post" encytpe="multipart/form-data">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="d-flex">
                            <th class="col-2">Aksi</th>
                            <th class="col-2">Id Solusi</th>
                            <th class="col-3">Penyakit</th>
                            <th class="col-5">Solusi</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php while ($data = mysqli_fetch_assoc($querySolusi)) { ?>
                    <tr class="d-flex">
                        <td class="col-2">
                        <a class="badge badge-pill badge-primary" href="ubahSolusi.php?id_solusi=<?php echo $data["id_solusi"]; ?>">edit</a> |
                        <a href="function.php?act=hapusSolusi&id_solusi=<?= $data['id_solusi']; ?>" onclick="return confirm('Yakin ingin menghapus data?');" class="badge badge-pill badge-danger">hapus</a>
                        </td>
                        <td class="col-2"><?= $data['id_solusi']; ?></td>
                        <td class="col-3"><?= $data['penyakit']; ?></td>
                        <td class="col-5"><?= $data['solusi']; ?></td>
                        
                    </tr>
                    <?php } ?>
                </tbody>
                <a href="tambahSolusi.php" class="btn btn-primary my-2 px-2">Tambah Data Solusi</a>
                </table>
            </form>
            <!-- Link halaman pagination -->
        <?php
        // Hitung total jumlah data
        $totalRecords = mysqli_num_rows(mysqli_query($koneksi, "SELECT id_solusi FROM solusi"));

        // Hitung total jumlah halaman
        $totalPages = ceil($totalRecords / $recordsPerPage);

        // Tampilkan link halaman pagination
        if ($totalPages > 1) {
            echo '<ul class="pagination justify-content-center">';
            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<li class="page-item ';
                if ($i == $current_page) {
                    echo 'active';
                }
                echo '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
            }
            echo '</ul>';
        }
        ?>
        </div>
    </div>

    </div>

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