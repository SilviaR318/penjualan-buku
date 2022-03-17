<?php
session_start();
if (empty($_SESSION["username"])) {
    header('Location: http://localhost/penjualan-buku/login.php');
    exit;
}
if ($_SESSION["role_id"] != 1) {
    header('Location: http://localhost/penjualan-buku/index.php');
    exit;
}

$username = $_SESSION["username"];

require_once('components.php');

$components = new Components();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="images/home.png">

    <title>Admin | SibulainStore</title>
</head>

<body>
    <?= $components->sidebar($username) ?>

    <div>
        <div class="row py-3">
            <div class="col-10 col-md-8 mx-auto">

                <div class="row">

                    <div class="col-sm">
                        <h2>Books</h2>
                    </div>

                    <div class="col-sm d-flex justify-content-center justify-content-md-end">
                        <form action="" method="get" class="row g-2">
                            <div class="col-auto">
                                <input type="text" name="cari" class="form-control" placeholder="Masukkan Judul Buku">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <div class="overflow-auto">
        <div class="row py-3">
            <div class="col-10 col-md-8 mx-auto">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Judul</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include "koneksi.php";
                        $halaman = 5;
                        $page    = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                        $mulai   = ($page > 1) ? ($page * $halaman) - $halaman : 0;

                        $result = mysqli_query($conn, "SELECT * FROM buku");

                        // var_dump($result);
                        // die;
                        $total  = mysqli_num_rows($result);
                        $pages  = ceil($total / $halaman);

                        //memeriksa data yang dikirim
                        $no = $mulai + 1;
                        if (isset($_GET['cari'])) {
                            $cari = $_GET['cari'];
                            //query untuk mencari data
                            $query = mysqli_query($conn, "select * from buku where judul like
                            '%" . $cari . "%'");
                        } else {
                            $sql  = "SELECT * FROM buku LIMIT $mulai, $halaman";
                            $query = mysqli_query($conn, $sql);
                        }


                        while ($pr = mysqli_fetch_array($query)) : ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img style="width: 50px; height: 50px;" class="rounded" src="images/<?= $pr['foto'] ?>" alt="<?= $pr["judul"] ?>">
                                        <div class="ms-2">
                                            <span class="d-block"><?= $pr['judul'] ?></span>
                                            <span class="text-muted small"><?= $pr['pengarang'] ?></span>
                                        </div>
                                    </div>

                                </td>
                                <td><?= $pr['penerbit'] ?></td>
                                <td><span class="badge rounded-pill bg-primary">RP.<?= $pr['harga'] ?></span></td>
                                <td><?= $pr['stok'] ?></td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn" href="edit.php?hal=edit&kd_buku=<?= $pr['kd_buku'] ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                        <a class="btn" href="hapus.php?hal=hapus&kd_buku=<?= $pr["kd_buku"] ?>" onclick="return confirm('Hapus Data??')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        endwhile;
                        ?>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <?php
                                for ($i = 1; $i <= $pages; $i++) {
                                ?>
                                    <?php if (isset($_GET['halaman'])) : ?>
                                        <?php if ($_GET['halaman'] == $i) : ?>
                                            <li class="page-item"><a class="page-link" href="databuku.php?halaman=<?php echo $i; ?>"><?= $i ?></a></li>
                                        <?php else : ?>
                                            <li class="page-item"><a class="page-link" href="databuku.php?halaman=<?php echo $i; ?>"><?= $i ?></a></li>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <li class="page-item"><a class="page-link" href="databuku.php?halaman=<?php echo $i; ?>"><?= $i ?></a></li>
                                    <?php endif; ?>
                                <?php
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>