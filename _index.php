<?php

require_once('components.php');

$components = new Components();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/home.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>SIBULAIN</title>
</head>

<body>
    <!-- Navbar Start -->
    <?= $components->navbar() ?>
    <!-- Navbar End -->

    <!-- Jumbotron Start -->
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container py-5 text-center">
            <h1 class="display-5 fw-bold">A New Style</h1>
            <p class="fs-4">"Life is a journey to be experienced, not a problem to be solved".<br>Happy a new Day With Your Style</p>
            <a href="produk.php" class="btn btn-primary btn-lg" type="button">Explore Books</a>
        </div>
    </div>
    <!-- Jumbotron End -->

    <!-- Books Start -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Books</h1>
            </div>

            <div class="col">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php
                    include "koneksi.php";
                    if (isset($_GET['tombolSubmit'])) {
                        $sortir = $_GET['sortir'];
                        $keyword = $_GET['cari'];
                        if ("$sortir" != "NULL") {
                            $query = mysqli_query($conn, "SELECT * FROM buku ORDER BY $sortir");
                        } else {
                            if ($keyword) {
                                $query = mysqli_query($conn, "SELECT * FROM buku WHERE judul like '%$keyword%'");
                            } else {
                                $query = mysqli_query($conn, "SELECT * FROM buku");
                            }
                        }
                    } else {
                        $query = mysqli_query($conn, "SELECT * FROM buku");
                    }
                    $no = 0;
                    while ($ambil_data = mysqli_fetch_array($query)) {
                    ?>

                        <a class="text-decoration-none" href="detail.php?id=<?= $ambil_data['kd_buku'] ?>">
                            <div class="col">
                                <div class="card h-100">
                                    <img src="images/<?= $ambil_data['foto'] ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $ambil_data['pengarang'] ?></h5>
                                        <small class="text-muted">Rp<?= number_format($ambil_data['harga'], 2, ',', '.') ?></small>
                                    </div>
                                </div>
                            </div>
                        </a>

                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Books End -->

    <!-- Footer Start -->
    <?= $components->footer() ?>
    <!-- Footer End -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>