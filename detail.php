<?php

require_once('components.php');
require_once('koneksi.php');

$components = new Components();
$timestamp = strtotime('2022-01-01 -1 year');
$date = date('d M Y', $timestamp);
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM buku WHERE kd_buku = $id");
$ambil_data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?= $components->head($ambil_data['judul']) ?>
</head>

<body>
    <?= $components->navbar() ?>

    <div class="container py-5 my-1 my-md-4 ">
        <div class="row">
            <div class="col-md-8 mx-auto d-flex align-items-center justify-content-center">
                <div class="card border-0">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="images/<?= $ambil_data['foto'] ?>" class="p-0 p-md-0 img-fluid rounded" alt="Foto buku <?= $ambil_data['judul'] ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <span class="text-muted"><?= $ambil_data['pengarang'] ?></span>
                                <h5 class="card-title fw-bold display-5"><?= $ambil_data['judul'] ?></h5>
                                <span class="text-primary fs-4">Rp<?= number_format($ambil_data['harga']) ?></span>

                                <div class="mt-1 mb-3">
                                    <form action="tambah_keranjang.php" method="post">
                                        <input type="hidden" name="idBuku" value="<?= $ambil_data['kd_buku'] ?>">
                                        <div class="row">
                                            <div class="col-2">
                                                <input class="form-control" type="number" value="1" min="1" max="<?= $ambil_data['stok'] ?>" name="jumlahBuku">
                                            </div>
                                            <div class="col-9">
                                                <button type="submit" class="btn btn-primary">Add to cart</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <span class="text-capitalize fw-bold">deksripsi buku</span>
                                <p style="text-align: justify;" class="card-text"><?= $ambil_data['deskripsi'] ?></p>

                                <span class="text-capitalize fw-bold">detail</span>
                                <div class="row">
                                    <div class="col">
                                        <small>
                                            <span class="text-capitalize d-block text-muted">jumlah halaman</span>
                                            <span>460</span>
                                            <span class="text-capitalize d-block text-muted">tanggal terbit</span>
                                            <span><?= $date ?></span>
                                            <span class="text-capitalize d-block text-muted">ISBN</span>
                                            <span><?= rand() ?></span>
                                        </small>
                                    </div>
                                    <div class="col">
                                        <small>
                                            <span class="text-capitalize d-block text-muted">Penerbit</span>
                                            <span><?= $ambil_data['penerbit'] ?></span>
                                            <span class="text-capitalize d-block text-muted">Bahasa</span>
                                            <span>Indonesia</span>
                                            <span class="text-capitalize d-block text-muted">Penulis</span>
                                            <span><?= $ambil_data['pengarang'] ?></span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5 my-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h3 class="fw-bold text-capitalize">produk serupa</h3>

                <div class="col">
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM buku ORDER BY rand() LIMIT 4");
                        while ($ambil_data = mysqli_fetch_array($query)) : ?>

                            <div class="col">
                                <div class="card h-100">
                                    <a class="text-decoration-none" href="detail.php?id=<?= $ambil_data['kd_buku'] ?>">
                                        <img src="images/<?= $ambil_data['foto'] ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title text-black"><?= $ambil_data['pengarang'] ?></h5>
                                            <small class="text-muted">Rp<?= number_format($ambil_data['harga'], 2, ',', '.') ?></small>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        <?php endwhile ?>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <?= $components->footer() ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>