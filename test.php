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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="custom.css" />
    <title>Cek Ginjal Yuk!</title>
</head>

<body>
    <nav class="navbar py-2 navbar-expand-lg navbar-light">
        <div class="container">
        <a class="navbar-brand" href="#"
          ><img src="gambar/logobaru.png" width="240" height="120" alt="logo">
        </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn px-4 btn-primary ml-2" href="logout.php" role="button">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="heroBWA mt-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-6">
                <img src="gambar/Tanya.png" alt="Pertanyaan Image" class="img-fluid mb-4" style="width: 200px; height: 200px;">
                <h1 class="mb-4">Pertanyaan</h1>
                <a class="btn btn-primary" href="testpertanyaan.php" role="button">Mulai Konsultasi!</a>
            </div>
            <div class="col-md-6">
                <img src="gambar/centang.png" alt="Cek Box Image" class="img-fluid mb-4" style="width: 200px; height: 200px;">
                <h1 class="mb-4">Cek Box</h1>
                <a class="btn btn-primary" href="testcheck.php" role="button">Mulai Konsultasi!</a>
            </div>
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
  </footer>


    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
