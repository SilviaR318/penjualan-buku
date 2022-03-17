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

include "koneksi.php";
if ($_GET['hal'] == "edit") {

    $sql = "SELECT * FROM buku WHERE kd_buku ='$_GET[kd_buku]'";
    $query = mysqli_query($conn, $sql);
    $prd = mysqli_fetch_array($query);
    if ($prd) {
        $Foto = $prd['foto'];
        $Judul = $prd['judul'];
        $Deskripsi = $prd['deskripsi'];
        $Pengarang = $prd['pengarang'];
        $Penerbit = $prd['penerbit'];
        $stok = $prd['stok'];
        $Harga = $prd['harga'];
    }
}

if (isset($_POST['submit'])) {


    $Foto = $_POST['Foto'];
    $Judul = $_POST['Judul'];
    $Deskripsi = $_POST['Deskripsi'];
    $Pengarang = $_POST['Pengarang'];
    $Penerbit = $_POST['Penerbit'];
    $stok = $_POST['stok'];
    $Harga = $_POST['Harga'];

    var_dump($Judul);


    $sql = "UPDATE buku SET foto='$Foto',
   judul='$Judul', deskripsi='$Deskripsi', pengarang='$Pengarang',
   penerbit='$Penerbit', stok='$stok', harga='$Harga' WHERE kd_buku='$_GET[kd_buku]'";
    $query = mysqli_query($conn, $sql);

    if ($query) {

        // kalau berhasil alihkan ke halaman admin.php
        echo "<script>
             alert('data berhasil diedit!');
             document.location.href = 'databuku.php';
           </script>";
    } else {
        // kalau gagal tampilkan pesan
        echo "<script>
             alert('data gagal diedit!');
           </script>";
        die("Gagal menyimpan perubahan...");
    }
}

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
                <div class="col-sm">
                    <h2>Edit buku <?= $Judul ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="row py-2">
            <div class="col-10 col-md-5 mx-auto pb-5">

                <form action="" method="POST">

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Foto</label>
                        <input class="form-control" type="file" name="Foto" id="gambar" required>
                    </div>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="Judul" placeholder="Judul buku" value="<?= $Judul ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" rows="3" name="Deskripsi"><?= $Deskripsi ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" name="Pengarang" placeholder="J. K. Rowling" value="<?= $Pengarang ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="Penerbit" placeholder="Gramedia" value="<?= $Penerbit ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" placeholder="1000" value="<?= $stok ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="Harga" placeholder="RP.54,000" value="<?= $Harga ?>" required>
                    </div>


                    <div class="d-flex justify-content-between">
                        <button class="btn btn-outline-secondary" type="reset">Batal</button>
                        <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>