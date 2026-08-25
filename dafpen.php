<?php
// Establishing database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_pernapasananak";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetching data from the "penyakit" table
$queryPenyakit = "SELECT * FROM penyakit";
$resultPenyakit = mysqli_query($conn, $queryPenyakit);

// Prepare the query for fetching data from the "solusi" table
$querySolusi = "SELECT * FROM solusi WHERE id_penyakit = ?";
$stmt = mysqli_prepare($conn, $querySolusi);

// Storing the query results in separate arrays
$penyakit = [];
while ($row = mysqli_fetch_assoc($resultPenyakit)) {
    $penyakit[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="custom.css" />

    <title>Daftar Penyakit</title>
</head>
</head>
<body>
  <nav class="navbar py-2 navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">
      <img src="gambar/logobaru.png" width="240" height="120" alt="logo">
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
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="alur.php">Cara Kerja</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="dafpen.php">Daftar Penyakit <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<body>
    <section id="daftar-penyakit">
        <div class="container">
            <h2 class="text-center mb-4">Daftar Penyakit Pernapasan Anak</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Penyakit</th>
                        <th scope="col">Solusi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
foreach ($penyakit as $index => $item) :
    $solusiText = '';
    mysqli_stmt_bind_param($stmt, "i", $item['id_penyakit']);
    mysqli_stmt_execute($stmt);
    $resultSolusi = mysqli_stmt_get_result($stmt);
    $nomorUrutan = 1; // Inisialisasi nomor urutan untuk setiap kolom solusi
    while ($row = mysqli_fetch_assoc($resultSolusi)) {
        $solusiText .= $nomorUrutan . '. ' . $row['solusi'] . '<br>';
        $nomorUrutan++;
    }
?>
    <tr>
        <td><?= $item['id_penyakit'] ?></td>
        <td><?= $item['penyakit'] ?></td>
        <td><?= $solusiText ?></td>
    </tr>
<?php endforeach; ?>

                </tbody>
            </table>
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

<?php
// Closing the database connection
mysqli_close($conn);
?>
