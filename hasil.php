<?php 
session_start();
include 'function.php';
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 0) {
        header("location: indexAdmin.php");
    } else if ($_SESSION['role'] == 2) {
        header("location: indexPakar.php");
    }
} else {
    header("location:index.php");
}

$gejala = mysqli_query($koneksi, "SELECT * FROM gejala");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
    crossorigin="anonymous"/>
    <link
    href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&display=swap"
    rel="stylesheet"/>
    <link rel="stylesheet" href="custom.css" />
    <title>Cek Penyakit Pernapasan Anak</title>
</head>
<body>
    <nav class="navbar py-2 navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.php"
            ><img src="gambar/logobaru.png" width="240" height="120" alt="logo">
            </a>
            <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li>
                        <a class="btn px-2 py-2 btn-success ml-2" href="function.php?act=ulang" role="button">Cek Ulang</a>
                    </li>
                    <li>
                        <a class="btn px-2 py-2 btn-primary ml-2" href="logout.php" role="button"
                    >Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hasil mt-4">
        <div class="container">
            <div class="row">
                <div class="col align-self-center">
                    <h3 class="mb-4">Penyakit yang anda alami : </h3>
                    <?php
if (isset($_SESSION)) {
    $diseases = [
        'CommonCold' => [
            'name' => 'Common Cold',
            'percentage' => $_SESSION['CommonCold']
        ],
        'Influenza' => [
            'name' => 'Influenza',
            'percentage' => $_SESSION['Influenza']
        ],
        'Bronkitis' => [
            'name' => 'Bronkitis',
            'percentage' => $_SESSION['Bronkitis']
        ],
        'Pneumonia' => [
            'name' => 'Pneumonia',
            'percentage' => $_SESSION['Pneumonia']
        ],
        'Asma' => [
            'name' => 'Asma',
            'percentage' => $_SESSION['Asma']
        ],
        'Ispa' => [
            'name' => 'ISPA',
            'percentage' => $_SESSION['Ispa']
        ]
    ];

    uasort($diseases, function ($a, $b) {
        return $b['percentage'] <=> $a['percentage'];
    });

    foreach ($diseases as $disease) {
        $percentage = $disease['percentage'];
        $name = $disease['name'];
        $color = '';
        $boxClass = '';

        if ($percentage > 70) {
            $color = 'danger'; 
            $boxClass = 'alert-danger'; 
        } elseif ($percentage > 50) {
            $color = 'warning'; 
            $boxClass = 'alert-warning'; 
        } else {
            $color = 'success'; 
            $boxClass = 'alert-success'; 
        }

        echo '<div class="alert ' . $boxClass . '">';
        echo '<strong>';
        echo "<span class='text-$color'>$name = $percentage%</span>";
        echo '</strong>';
        echo '</div>';
    }
}
?>

                        
                        <h3 class="mb-4">Solusi untuk penyakit anda adalah : </h3>
<form action="" method="post" enctype="multipart/form-data" role="form">
<?php
    function maximum($a, $b, $c, $d, $e, $f)
    {
        $max = $a;
        $kode = 1;
        if ($b > $max) {
            $max = $b;
            $kode = 2;
        }
        if ($c > $max) {
            $max = $c;
            $kode = 3;
        }
        if ($d > $max) {
            $max = $d;
            $kode = 4;
        }
        if ($e > $max) {
            $max = $e;
            $kode = 5;
        }
        if ($f > $max) {
            $max = $f;
            $kode = 6;
        }
        return $kode;
    }

       $counter = 1; // Definisikan variabel counter di sini

    // Simpan data konsultasi ke dalam tabel 'konsultasi'
    $waktu = date('Y-m-d H:i:s');
    $penyakit_terpilih = array_keys($diseases)[0]; // Misalnya, penyakit terpilih adalah yang pertama.
    $presentase_penyakit_terpilih = $diseases[$penyakit_terpilih]['percentage'];
    $solusi_terpilih = '';

    $id_penyakit_terpilih = maximum($_SESSION['CommonCold'], $_SESSION['Influenza'], $_SESSION['Bronkitis'], $_SESSION['Pneumonia'], $_SESSION['Asma'], $_SESSION['Ispa']);
    $query_solusi = "SELECT * FROM solusi WHERE id_penyakit = '$id_penyakit_terpilih'";
    $data_solusi = mysqli_query($koneksi, $query_solusi);

    while ($row_solusi = mysqli_fetch_array($data_solusi)) {
        $solusi_terpilih .= $counter . '. ' . $row_solusi['solusi'] . "\n";
        $counter++;
    }

    // Simpan data konsultasi ke dalam tabel 'konsultasi'
    $query_simpan = "INSERT INTO konsultasi (waktu, penyakit, presentase_penyakit, solusi) VALUES ('$waktu', '$penyakit_terpilih', $presentase_penyakit_terpilih, '$solusi_terpilih')";
    mysqli_query($koneksi, $query_simpan);

    $id_penyakit = maximum($_SESSION['CommonCold'], $_SESSION['Influenza'], $_SESSION['Bronkitis'], $_SESSION['Pneumonia'], $_SESSION['Asma'], $_SESSION['Ispa']);
    $query = "SELECT * FROM solusi WHERE id_penyakit = '$id_penyakit'";
    $data = mysqli_query($koneksi, $query);
    $counter = 1; 

    while ($row = mysqli_fetch_array($data)) {
        echo '<p><strong>' . $counter . '. ' . $row['solusi'] . '</strong></p>';
        $counter++; 
    }
?>
</form>                 
                    
                    
                </div>
                    </form>
                <div class="col d-none d-sm-block">
                    <img width="400" src="gambar/HasilMed.png" alt="hero" />
                    <a class="btn btn-print btn-primary ml-2" href="#" role="button" onclick="cetakHalaman()">
                 <img src="gambar/print.png" alt="Print" style="height: 16px; width: 16px; margin-right: 5px;">
                 Cetak Hasil
                </a>
            </div>
        </div>
    </section>
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
  <script>
  function cetakHalaman() {
    // Sembunyikan tombol cetak sebelum mencetak
    var printButton = document.querySelector(".btn-print");
    printButton.style.display = "none";
    

    // Cetak halaman
    window.print();

    // Tampilkan kembali tombol cetak setelah proses pencetakan selesai
    printButton.style.display = "block";
  }
</script>
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
  crossorigin="anonymous"
/>
<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"
></script>
<script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"
></script>
<script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"
></script>
<script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"
></script>
</html>
