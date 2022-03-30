<?php

require_once('components.php');

$components = new Components();

?>

<!doctype html>
<html lang="en">

<head>
    <?= $components->head("Welcome") ?>
</head>

<body>
    <!-- Navbar Start -->
    <?= $components->navbar() ?>
    <!-- Navbar End -->

    <!-- Jumbotron Start -->
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container py-5 text-center">
            <h1 class="display-5 fw-bold">Buku adalah jendela ilmu pengetahuan</h1>
            <p class="fs-4">Jendela berfungsi untuk melihat ke arah luar. Sehingga dengan membaca buku kita dapat menemukan banyak ilmu pengetahuan yang dapat membuka wawasan kita.</p>
            <a href="produk.php" class="btn btn-primary btn-lg" type="button">Explore Books</a>
        </div>
    </div>
    <!-- Jumbotron End -->

    <!-- Books Start -->
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <h2 class="display-6 text-center fw-bold">Books</h2>
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
                    while ($ambil_data = mysqli_fetch_array($query)) : ?>

                        <div class="col">
                            <div class="card h-100">
                                <a class="text-decoration-none" href="detail.php?id=<?= $ambil_data['kd_buku'] ?>">
                                    <img style="height: 40rem;" src="images/<?= $ambil_data['foto'] ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-black"><?= $ambil_data['pengarang'] ?></h5>
                                        <small class="text-muted">Rp<?= number_format($ambil_data['harga'], 2, ',', '.') ?></small>
                                    </div>
                                </a>
                            </div>
                        </div>

                    <?php
                    endwhile;
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