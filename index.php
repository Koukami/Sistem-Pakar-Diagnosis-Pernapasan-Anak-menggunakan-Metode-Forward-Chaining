<?php 
include 'function.php';

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

    <title>Diagnosis Penyakit Pernapasan Anak</title>
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
            <li class="nav-item align-self-center active">
            <a class="nav-link" href="alur.php">Cara Kerja <span class="sr-only">(current)</span></a>
            </li>
            </li>
            <li class="nav-item align-self-center active">
            <a class="nav-link" href="dafpen.php">Daftar Penyakit <span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item ">
              <!-- Button trigger modal -->
              <button type="button" class="btn px-4 btn-secondary ml-2 logintombol" data-toggle="modal" data-target="#exampleModal">Log In</button>
              </button>

              <!-- Login -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Log In</h5>
                      <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button> -->
                    </div>
                    <div class="modal-body">
  <form id="login-form" action="function.php?act=login" method="POST">
    <div class="form-group">
      <div id="result"></div>
      <label for="nama" class="col-form-label">Username :</label>
      <input type="text" class="form-control" id="nama" name="nama" rows="3" placeholder="Username" required>
      <label for="pass" class="col-form-label">Password :</label>
      <input type="password" class="form-control" id="password" name="password" rows="3" placeholder="Password" required>
    </div>
    <div class="form-row">
    </div>
    <div class="modal-footer">
      <input type="submit" name="login_btn" id="login" class="btn btn-primary" value="Login" onclick="validateForm()">
    </div>
  </form>
</div>
                    </form>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a class="btn px-4 btn-primary ml-2" href="register.php" role="button"
              >Register</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

    <section class="heroBWA mt-5">
      <div class="container">
        <div class="row">
          <div class="col align-self-center">
            <h1 class="mb-4">SP Diagnosis Pernapasan Anak</h1>
            <p class="mb-4">
              Sistem Pakar Diagnosis Penyakit Pernapasan Anak merupakan sistem pakar yang berfokus pada diagnosis penyakit pernapasan yang dapat diderita oleh anak-anak, dimana sistem pakar ini akan berfokus dengan 6 penyakit pernapasan yang paling umum diderita oleh anak-anak berdasarkan data yang didapatkan dalam penelitian. Sistem pakar ini akan membantu para tenaga medis dan masyarakat untuk mendeteksi penyakit pernapasan pada anak agar pencegahan dan penanggulangan dapat dilakukan jika anak mengalami gejala-gejala penyakit pernapasan.
            </p>
            <a class="btn btn-primary" href="Test.php" role="button">Mulai Konsultasi!</a>
          </div>
          <div class="col d-none d-sm-block">
            <img width="400" src="gambar/Batuk.png" alt="hero" />
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

  </body>

<script>
  function validateForm() {
    var username = document.getElementById("nama").value;
    var password = document.getElementById("password").value;

    if (username === "" || password === "") {
      alert("Silakan isi username dan password terlebih dahulu.");
      return false;
    }
  }
</script>

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
