<?php
session_start();
if (empty($_SESSION["username"])) {
    header('Location: http://localhost/penjualan-buku/login.php');
    exit;
}

require_once('components.php');
$components = new Components();

?>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/7cb1654f53.js" crossorigin="anonymous"></script>
    <title>Keranjang || Sibulain</title>
    <link rel="icon" type="image/png" href="images/home.png">
    <title>ALL PRODUCT | SibulainStore</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        .cari {
            display: inline-block;
            width: 400px;
            font-size: 20px;
            /* border-radius: 30px; */
        }

        .buton3 {
            display: inline-block;
            background: #ff523b;
            color: #fff;
            padding: 2px 8px;
            margin: 0;
            transition: background 0.5s;
            font-size: 20px;
        }

        .buton3:hover {
            background: #563434;
        }
    </style>
</head>

<body>
    <?= $components->navbar() ?>

    <!--------Product--------->
    <div class="small">
        <div class="row py-5">
            <div class="col">
                <form method="GET">
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <h2>All Books</h2>
                        </div>
                        <div class="col d-flex">
                            <input type="text" class="cari" name="cari" placeholder="Search Books">
                            <button type="submit" name="tombolSubmit" class="ms-2    btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </button>
                        </div>
                        <div class="col d-flex justify-content-start">
                            <select name="sortir">
                                <option value="NULL">Default Sorting</option>
                                <option value="judul">Sort By Name</option>
                                <option value="harga">Sort By Price</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
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
                <div class="col-4">
                    <a href="detail.php?id=<?= $ambil_data['kd_buku'] ?>">
                        <img src="images/<?= $ambil_data['foto'] ?>">
                    </a>
                    <h4><?= $ambil_data['pengarang'] ?></h4>
                    <h4><?= $ambil_data['judul'] ?></h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p>Rp.<?= number_format($ambil_data['harga'], 2, ',', '.') ?></p>
                </div>
            <?php
            }
            ?>
        </div>
    </div>



    <!-----fotter--------->
    <?= $components->footer() ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>