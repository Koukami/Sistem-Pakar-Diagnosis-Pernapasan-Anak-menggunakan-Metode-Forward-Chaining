<?php
session_start();

include 'function.php';

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 0) {
        header("location: indexAdmin.php");
        exit(); // Add exit() to stop further script execution
    } else if ($_SESSION['role'] == 2) {
        header("location: indexPakar.php");
        exit(); // Add exit() to stop further script execution
    }
}

if (!isset($_SESSION['persentase'])) {
    $_SESSION['persentase'] = [];
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
    <title>Cek Pernapasan Anak Yuk!</title>
    <style>
        .alert {
            display: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
                /* Menjadikan gambar sebagai background */
                .gambar-background {
            background-image: url('gambar/Check.png');
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            height: 300px; /* Atur tinggi sesuai kebutuhan */
        }

        /* Custom CSS */
        .gejala-wrapper {
            column-count: 3; /* Menyusun gejala dalam 3 kolom */
        }

        .gejala-item {
            break-inside: avoid; /* Mencegah pemisahan gejala antar kolom */
            padding: 5px;
        }
        
                /* Custom CSS untuk tombol "Cek Hasil" */
                .cek-hasil-button {
            display: block;
            margin: 20px auto; /* Posisikan tombol di tengah secara horizontal */
        }
    </style>

    

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
                    <h2 class="mb-4">Pilihlah gejala yang anak anda alami : </h2>
                    <?php
                    if (isset($_POST['submit'])) {
                        if (!isset($_POST['gejala']) || count($_POST['gejala']) < 2) {
                            echo '<div class="alert alert-danger" role="alert">Pilih minimal 2 gejala.</div>';
                        } else {
                            // Proses perhitungan dan pengalihan halaman
                            $_SESSION['persentase'] = $_POST['gejala'];

                            $CommonCold = array(1, 2, 3, 4, 5, 6, 7, 10);
                            $Influenza = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 15, 16);
                            $Bronkitis = array(1, 2, 3, 4, 5, 6, 7, 10, 16, 19, 20, 21, 22);
                            $Pneumonia = array(1, 2, 3, 4, 5, 6, 7, 8, 10, 11, 13, 14, 15, 16, 17, 18, 19, 22, 23, 24, 25, 26, 27, 28, 29);
                            $Asma = array(1, 2, 4, 11, 12, 14, 15, 16, 20);
                            $Ispa = array(1, 2, 3, 4, 5, 6, 7, 8, 10, 11, 13, 14, 15, 16, 17, 19, 20, 21, 22, 25, 27, 29, 30);

                            // Lakukan perhitungan persentase
                            $hasilCommonCold = count(array_intersect($_POST['gejala'], $CommonCold)) / count($CommonCold) * 100;
                            $_SESSION['CommonCold'] = round($hasilCommonCold, 2);

                            $hasilInfluenza = count(array_intersect($_POST['gejala'], $Influenza)) / count($Influenza) * 100;
                            $_SESSION['Influenza'] = round($hasilInfluenza, 2);

                            $hasilBronkitis = count(array_intersect($_POST['gejala'], $Bronkitis)) / count($Bronkitis) * 100;
                            $_SESSION['Bronkitis'] = round($hasilBronkitis, 2);

                            $hasilPneumonia = count(array_intersect($_POST['gejala'], $Pneumonia)) / count($Pneumonia) * 100;
                            $_SESSION['Pneumonia'] = round($hasilPneumonia, 2);

                            $hasilAsma = count(array_intersect($_POST['gejala'], $Asma)) / count($Asma) * 100;
                            $_SESSION['Asma'] = round($hasilAsma, 2);

                            $hasilIspa = count(array_intersect($_POST['gejala'], $Ispa)) / count($Ispa) * 100;
                            $_SESSION['Ispa'] = round($hasilIspa, 2);

                            header('Location: hasil.php');
                            exit();
                        }
                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data" role="form">
                    <div class="gambar-background d-none d-sm-block">
                    <div class="gejala-wrapper">
                        <?php
                        $nomor = 1;
                        while ($row = mysqli_fetch_assoc($gejala)) {
                            $id_gejala = $row['id_gejala'];
                            $gejala_name = $row['gejala'];
                        ?>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="gejala[]" value="<?= $id_gejala; ?>" id="gejalaCheckbox<?= $id_gejala; ?>">
                            <label class="form-check-label" for="gejalaCheckbox<?= $id_gejala; ?>">
                                <?= $nomor; ?>. <?= $gejala_name; ?>
                            </label>
                        </div>
                        <?php
                            $nomor++;
                        }
                        ?>
                    </div>
                         <button type="submit" class="btn btn-primary mt-3 cek-hasil-button" name="submit">Cek Hasil</button>
                    </form>
            </div>
        </div>
    </section>
    <footer>
    <div class="container">
      <p class="footer-text">
        &copy; <?php echo date('Y'); ?> SP Diagnosis Penyakit Pernapasan Anak.
        <br />
        Dikembangkan oleh <a href="https://www.facebook.com/Robby.Bambang.6799/?locale=id_ID" class="footer-link">Robby Bambang Hadinata</a>.
      </p>
    </div>

    <style>
    .test {
        margin-bottom: 150px; 
    }
</style>

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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertDiv = document.querySelector('.alert');

            if (alertDiv) {
                alertDiv.style.display = 'block';
                setTimeout(function() {
                    alertDiv.style.display = 'none';
                }, 3000);
            }
        });
    </script>
</body>
</html>
