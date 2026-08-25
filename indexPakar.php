<?php

include "function.php";
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 1) {
        header("location: test.php");
    }
} else {
    header("location:index.php");
}

$queryPasien = mysqli_query($koneksi, "SELECT * FROM user WHERE role = '2'");

$jumlahPasien = mysqli_query($koneksi, "SELECT COUNT('id_user') as jml_pasien FROM user WHERE role='1'");
$pasien = mysqli_fetch_assoc($jumlahPasien);

$jumlahPenyakit = mysqli_query($koneksi, "SELECT COUNT('id_penyakit') as jml_penyakit FROM penyakit");
$penyakit = mysqli_fetch_assoc($jumlahPenyakit);

$jumlahGejala = mysqli_query($koneksi, "SELECT COUNT('id_gejala') as jml_gejala FROM gejala");
$gejala = mysqli_fetch_assoc($jumlahGejala);

$jumlahSolusi = mysqli_query($koneksi, "SELECT COUNT('id_solusi') as jml_solusi FROM solusi");
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
        <link rel="stylesheet" href="customAdmin.css" />
</head>

<body >
    <div class="kiri">
    <a class="navbar-brand" href="indexAdmin.php"
          ><img src="gambar/logobaru.png" width="150" height="130" alt="logo">
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

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pakar</h1>
        </div>

        <div class="card shadow mb-12">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data Konsultasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Waktu</th>
                        <th>Penyakit</th>
                        <th>Presentase Penyakit</th>
                        <th>Solusi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $queryKonsultasi = mysqli_query($koneksi, "SELECT * FROM konsultasi");
                    $no = 1;
                    while ($dataKonsultasi = mysqli_fetch_assoc($queryKonsultasi)) {
                    ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $dataKonsultasi['waktu']; ?></td>
                        <td><?= $dataKonsultasi['penyakit']; ?></td>
                        <td><?= $dataKonsultasi['presentase_penyakit']; ?>%</td>
                        <td>
                        <ol>
                                <?php
                                $solusiArray = explode("\n", $dataKonsultasi['solusi']);
                                $solusiArray = array_filter(array_map('trim', $solusiArray)); // Hapus baris kosong

                                sort($solusiArray); // Urutkan solusi

                                foreach ($solusiArray as $solusiItem) {
                                    echo "<li>" . $solusiItem . "</li>";
                                }
                                ?>
                            </ol>
                        </td>
                    </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<footer>
    <div class="container">
      <p class="footer-text">
        &copy; <?php echo date('Y'); ?> SP Diagnosis Penyakit Pernapasan Anak.
        <br />
        Dikembangkan oleh <a href="https://www.facebook.com/Robby.Bambang.6799/?locale=id_ID" class="footer-link">Robby Bambang Hadinata</a>.
      </p>
    </div>
  </footer>
</body>

</html>