<!DOCTYPE html>
<html>
<head>
    <title>Contoh Artikel dengan Menu Lengkap</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h1>Judul Artikel</h1>
    <p>Penulis: Nama Penulis</p>
    <p>Tanggal: <?php echo date('d M Y'); ?></p>

    <?php
    // Isi artikel
    $artikel = "
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tincidunt massa. Proin tincidunt urna ac quam cursus, eu accumsan ligula tincidunt. In auctor lectus ac turpis scelerisque, nec pellentesque justo faucibus. Vivamus accumsan, lorem nec feugiat tristique, dui lectus lacinia tellus, ac luctus eros ex in ex. Integer eleifend enim vel turpis dictum, a lacinia est vehicula.</p>
        <p>Morbi nec turpis lorem. Nullam a consectetur nisi, eu luctus nibh. Quisque fermentum tellus vel metus venenatis, in tincidunt odio lacinia. Ut ut velit vitae dui rutrum suscipit. Cras pellentesque sapien sit amet lacinia laoreet. Phasellus nec quam vel mauris facilisis lacinia ac ut turpis.</p>
        <p>Etiam semper ultrices metus, a varius elit euismod ut. Sed lacinia nulla in facilisis auctor. Pellentesque sollicitudin arcu vitae dictum vulputate. Nunc semper bibendum lorem, vel ullamcorper mi auctor at. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur facilisis, velit in egestas tempus, purus velit elementum odio, vel venenatis purus velit vel est. Fusce ut odio in justo egestas tincidunt.</p>
    ";

    // Menampilkan artikel
    echo $artikel;
    ?>

    <hr>
    <h2>Menu</h2>
    <ul class="list-inline">
        <li class="list-inline-item"><a href="#" class="btn btn-primary">Edit</a></li>
        <li class="list-inline-item"><a href="#" class="btn btn-danger">Hapus</a></li>
        <li class="list-inline-item"><a href="#" class="btn btn-secondary">Lainnya</a></li>
    </ul>

    <!-- Tambahkan link JS Bootstrap dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
