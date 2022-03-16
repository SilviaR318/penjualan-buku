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
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarLabel">Sibulain</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="databuku.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="input.php">Tambah buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>

    <main>
        <nav class="navbar navbar-light bg-light">
            <div class="container">

                <div class="d-flex align-items-center">
                    <button type="button" class="navbar-toggler border-0" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand ms-1" href="#">Sibulain</a>
                </div>

                <div class="dropdown">
                    <button type="button" class="btn dropdown-toggle" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="text-muted"><?= $username ?></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="profile">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>

            </div>
        </nav>

        <div>
            <div class="row py-3">
                <div class="col-10 col-md-8 mx-auto">
                    <div class="col-sm">
                        <h2>Tambah buku baru</h2>
                    </div>
                </div>
            </div>
        </div>


        <div>
            <div class="row py-2">
                <div class="col-10 col-md-5 mx-auto pb-5">

                    <form action="prosesinput.php" method="post">

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Foto</label>
                            <input class="form-control" type="file" name="txtfoto" id="gambar" required>
                        </div>

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="txtjudul" placeholder="Judul buku" required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" rows="3" name="txtdeskripsi"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="pengarang" class="form-label">Pengarang</label>
                            <input type="text" class="form-control" id="pengarang" name="txtpengarang" placeholder="J. K. Rowling" required>
                        </div>

                        <div class="mb-3">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" id="penerbit" name="txtpenerbit" placeholder="Gramedia" required>
                        </div>

                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" name="txtstok" placeholder="1000" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="txtharga" placeholder="RP.54,000" required>
                        </div>


                        <div class="d-flex justify-content-between">
                            <button class="btn btn-outline-secondary" type="reset">Batal</button>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>