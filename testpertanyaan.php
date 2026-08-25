<?php 
include 'function.php';
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 0) {
        header("location: indexAdmin.php");
    } else if ($_SESSION['role'] == 2) {
        header("location: indexPakar.php");
    }
}

if(!isset($_SESSION['persentase'])){
    $_SESSION['persentase'] = [];
}

$id_penyakit = 1;
if (!isset($_SESSION['id_gejala'])) {
    $_SESSION['id_gejala'] = $id_penyakit;
} else {
    $id_gejala = $_SESSION['id_gejala'];
}

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
        crossorigin="anonymous"
    />
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="custom.css" />
    <title>Cek Ginjal Yuk!</title>
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
                    <a class="btn px-4 btn-primary ml-2" href="test.php" role="button"
                    >Kembali</a>
                </li>
                <li>
                    <a class="btn px-4 btn-primary ml-2" href="logout.php" role="button"
                    >Log Out</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<section class="test mt-5">
    <div class="container">
        <div class="row">
            <div class="col align-self-center">
                <h2 class="mb-4">Pertanyaan <?php echo isset($id_gejala) ? $id_gejala : ''; ?> :</h2>
                <form action="" method="post" enctype="multipart/form-data" role="form">
                    <?php
                    if (!isset($_SESSION['id_gejala'])) {
                        $_SESSION['id_gejala'] = $id_penyakit;
                    } else {
                        $id_gejala = $_SESSION['id_gejala'];
                    }
                    $data = mysqli_query($koneksi, "SELECT gejala FROM gejala WHERE id_gejala = '$id_gejala'");
                    $row = mysqli_fetch_assoc($data);
                    ?>
                    <p class="mb-4">
                        Apakah Anak Anda mengalami <?= $row['gejala']; ?> ?
                    </p>
                    <?php
                    echo '<input type="submit" class="btn btn-primary mr-2 px-4 py-2" name="ya" value="Ya">';
                    echo '<input type="submit" class="btn btn-danger px-3 py-2" name="tidak" value="Tidak">';
                    $persentase = $_SESSION['persentase'];
                    $temp = 0;
                    $_SESSION['id_gejala'] = $id_gejala;
                    $next_gejala = $_SESSION['id_gejala'];

                    if (isset($_POST['ya'])) {
                        if (isset($id_gejala)) {
                            $temp = $id_gejala;
                            array_push($persentase, $temp);
                        }
                        $_SESSION['persentase'] = $persentase;
                        $next_gejala = $id_gejala + 1;
                        $_SESSION['id_gejala'] = $next_gejala;
                    } else if (isset($_POST['tidak'])) {
                        $next_gejala = $id_gejala + 1;
                        $_SESSION['id_gejala'] = $next_gejala;
                    }

                    if ($_SESSION['id_gejala'] > 31) {
                        $CommonCold = array(1, 2, 3, 4, 5, 6, 7, 10);
                        $Influenza = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 15, 16);
                        $Bronkitis = array(1, 2, 3, 4, 5, 6, 7, 10, 16, 19, 20, 21, 22);
                        $Pneumonia = array(1, 2, 3, 4, 5, 6, 7, 8, 10, 11, 13, 14, 15, 16, 17, 18, 19, 22, 23, 24, 25, 26, 27, 28, 29, 30);
                        $Asma = array(1, 2, 4, 11, 12, 14, 15, 16, 20);
                        $Ispa = array(1, 2, 3, 4, 5, 6, 7, 8, 10, 11, 13, 14, 15, 16, 17, 19, 20, 21, 22, 25, 27, 29, 30);
                        $nilai = 0;

                        foreach ($persentase as $value) {
                            if (in_array($value, $CommonCold)) {
                                $nilai += 1;
                            } else {
                                $nilai += 0;
                            }
                        }

                        $CommonCold = $nilai / count($CommonCold);
                        $CommonCold = number_format($CommonCold, 3);
                        $hasilCommonCold = $CommonCold * 100;
                        $_SESSION['CommonCold'] = $hasilCommonCold;

                        $nilai = 0;
                        foreach ($persentase as $value) {
                            if (in_array($value, $Influenza)) {
                                $nilai += 1;
                            } else {
                                $nilai += 0;
                            }
                        }
                        $Influenza = $nilai / count($Influenza);
                        $Influenza = number_format($Influenza, 3);
                        $hasilInfluenza = $Influenza * 100;
                        $_SESSION['Influenza'] = $hasilInfluenza;

                        $nilai = 0;
                        foreach ($persentase as $value) {
                            if (in_array($value, $Bronkitis)) {
                                $nilai += 1;
                            } else {
                                $nilai += 0;
                            }
                        }
                        $Bronkitis = $nilai / count($Bronkitis);
                        $Bronkitis = number_format($Bronkitis, 3);
                        $hasilBronkitis = $Bronkitis * 100;
                        $_SESSION['Bronkitis'] = $hasilBronkitis;

                        $nilai = 0;
                        foreach ($persentase as $value) {
                            if (in_array($value, $Pneumonia)) {
                                $nilai += 1;
                            } else {
                                $nilai += 0;
                            }
                        }
                        $Pneumonia = $nilai / count($Pneumonia);
                        $Pneumonia = number_format($Pneumonia, 3);
                        $hasilPneumonia = $Pneumonia * 100;
                        $_SESSION['Pneumonia'] = $hasilPneumonia;

                        $nilai = 0;
                        foreach ($persentase as $value) {
                            if (in_array($value, $Asma)) {
                                $nilai += 1;
                            } else {
                                $nilai += 0;
                            }
                        }
                        $Asma = $nilai / count($Asma);
                        $Asma = number_format($Asma, 3);
                        $hasilAsma = $Asma * 100;
                        $_SESSION['Asma'] = $hasilAsma;

                        $nilai = 0;
                        foreach ($persentase as $value) {
                            if (in_array($value, $Ispa)) {
                                $nilai += 1;
                            } else {
                                $nilai += 0;
                            }
                        }
                        $Ispa = $nilai / count($Ispa);
                        $Ispa = number_format($Ispa, 3);
                        $hasilIspa = $Ispa * 100;
                        $_SESSION['Ispa'] = $hasilIspa;

                        header('Location: hasil.php');
                    }
                    ?>
                    <br>
                </form>
            </div>
            <div class="col d-none d-sm-block">
                <img width="300" src="gambar/Pertanyaan.png" alt="hero" />
            </div>
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
