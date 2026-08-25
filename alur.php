<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cara Pemakaian</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="custom.css">
  <style>
    /* Custom CSS for Alur Kerja Sistem Pakar */
    #alur .container {
      padding-top: 70px;
      padding-bottom: 100px;
    }

    #alur h2 {
      font-family: "Poppins";
      font-weight: 700;
      color: #2f281e;
      text-align: center;
      margin-bottom: 40px;
    }

    /* Cards */
    #alur .card {
      width: 100%;
      max-width: 300px;
      margin: 0 auto;
      margin-bottom: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      overflow: hidden;
    }

    #alur .card-img-top {
      width: 100%;
      height: auto;
    }

    #alur .card-body {
      padding: 20px;
    }

    #alur .card-title {
      font-family: "Poppins";
      font-weight: 700;
      color: #2f281e;
      font-size: 18px;
      text-align: center;
      margin-bottom: 10px;
    }

    #alur .card-text {
      font-family: "Poppins";
      font-weight: 400;
      color: #2f281e;
      font-size: 14px;
      text-align: justify;
    }

    /* Responsive Styles */
    @media (min-width: 576px) {
      #alur .card {
        max-width: 400px;
      }
    }

    @media (min-width: 768px) {
      #alur .container {
        padding-top: 100px;
        padding-bottom: 150px;
      }

      #alur .card {
        max-width: 400px;
      }

      #alur .card-title {
        font-size: 20px;
      }

      #alur .card-text {
        font-size: 16px;
      }

    /* Custom CSS for Alur Kerja Sistem Pakar */
    #alur .container {
      padding-top: 70px;
      padding-bottom: 100px;
    }

    /* Add margin-bottom to heroBWA section */
    .heroBWA {
      margin-bottom: 40px;
    }

    /* Add margin-top to alur section */
    #alur {
      margin-top: 10px;
    }
  }
  </style>

</head>
<body>
  <nav class="navbar py-2 navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="gambar/logobaru.png" width="240" height="120" alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#alur">Cara Kerja<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dafpen.php">Daftar Penyakit</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="heroBWA mt-5 d-flex justify-content-center align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="mb-4">Tentang SP Diagnosis Pernapasan Anak</h1>
          <p>
            Sistem Pakar Diagnosis Penyakit Pernapasan Anak merupakan aplikasi berbasis web yang dirancang untuk memenuhi kebutuhan penelitian dalam penyusunan skripsi.
          </p>

  <section id="alur" class="d-flex justify-content-center">
    <div class="container">
      <h2 class="text-center mb-5">Alur Kerja Sistem Pakar</h2>
      <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="gambar/LoginBaru.png" class="card-img-top" alt="..." style="height: 220px; width: 240px; display: block; margin: 0 auto">
            <div class="card-body">
              <h5 class="card-title">Login</h5>
              <p class="card-text">Pengguna harus melakukan login sebelum melangkah ke tahap selanjutnya, dan jika belum memiliki akun akan diarahkan ke menu registrasi.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="gambar/TestBaru.png" class="card-img-top" alt="..." style="height: 250px; width: 240px; display: block; margin: 0 auto">
            <div class="card-body">
              <h5 class="card-title">Test Gejala Pasien</h5>
              <p class="card-text">Dalam tahap ini pengguna akan diberikan beberapa pertanyaan ataupun pilihan gejala yang dialami terkait dengan penyakit yang dialami.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="gambar/HasilBaru.png" class="card-img-top" alt="..." style="height: 200px; width: 220px; display: block; margin: 0 auto">
            <div class="card-body">
              <h5 class="card-title">Hasil dan Solusi</h5>
              <p class="card-text">Tahap ini merupakan tahap akhir dimana setelah melaksanakan test gejala pengguna akan diberikan hasil test berupa nama penyakit dan solusinya.</p>
            </div>
          </div>
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