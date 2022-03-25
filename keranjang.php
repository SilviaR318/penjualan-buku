<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <!-- FontAwesome -->
  <script src="https://kit.fontawesome.com/7cb1654f53.js" crossorigin="anonymous"></script>
  <title>Keranjang || Sibulain</title>
  <style>
    body {
      background: radial-gradient(#008B8B, #fff);
      background-repeat: repeat;
      background-color: #cccccc;
    }

    .card {
      font-size: 11px;
    }

    .card h3 {
      font-size: 14px;
    }

    .gambar_buku_keranjang {
      width: 25px;
      height: auto;
    }

    .inputjumlah {
      font-size: 11px;
    }

    @media only screen and (min-width: 1100px) {
      .card {
        font-size: 16px;
      }
    }
  </style>
</head>

<body>

  <!-- Container -->
  <div class="container" style="padding-top: 10%;">
    <a href="produk.php">
      <i class="fas fa-arrow-left"></i>
      Kembali
    </a>
    <section class="section1">
      <div class="card border-0 shadow-sm mt-3">
        <div class="card-body">
          <table class="table table-striped" id="tabelku">
            <thead>
              <tr>
                <th class="col-1">No Item</th>
                <th class="col-1">Foto Buku</th>
                <th class="col">Nama Buku</th>
                <th class="col-1">Jumlah</th>
                <th class="col-2">Harga Satuan</th>
                <th class="col-1">Total Harga</th>
                <th class="col-1">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              session_start();
              include 'koneksi.php';
              $uname = $_SESSION['username'];
              $query_id = mysqli_query($conn, "SELECT * FROM user WHERE username = '$uname'");
              $ambil_id = mysqli_fetch_array($query_id);
              $id_user = $ambil_id['id'];
              $query_buku = mysqli_query($conn, "SELECT keranjang.id_keranjang,buku.judul,buku.harga,keranjang.jumlah_buku,buku.stok,buku.foto FROM keranjang
                  INNER JOIN buku ON keranjang.id_buku = buku.kd_buku
                  INNER JOIN user ON keranjang.id_pengguna = user.id
                  WHERE user.id = '$id_user'");
              $no = 1;
              while ($ambil_data = mysqli_fetch_array($query_buku)) {
              ?>
                <tr>
                  <th scope="row"><?= $no++ ?></th>
                  <td>
                    <img src="images/<?= $ambil_data['foto'] ?>" class="gambar_buku_keranjang">
                  </td>
                  <td><?= $ambil_data['judul'] ?></td>
                  <td>
                    <form action="ubah_item_keranjang.php?id_keranjang=<?= $ambil_data['id_keranjang'] ?>" method="post">
                      <input type="number" class="form-control inputjumlah" name="input" id="input1" value="<?= $ambil_data['jumlah_buku'] ?>" max="<?= $ambil_data['stok'] ?>" min="1" style="max-width: 2cm" />
                  </td>
                  <td><?= number_format($ambil_data['harga'], 2, ',', '.') ?></td>
                  <td><?= number_format($ambil_data['harga'] * $ambil_data['jumlah_buku'], 2, ',', '.') ?></td>
                  <td>
                    <button type="submit" class="fas fa-edit fa-2x" style="border: 0;background:none;"></button>
                    </form>
                    <a class="fas fa-trash fa-2x text-dark" onclick="confirm('Yakin Dihapus?')" href="hapus_item_keranjang.php?id_keranjang=<?= $ambil_data['id_keranjang'] ?>"></a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
          <h3 class="text-end">Total yang harus dibayar</h3>
          <p class="text-end" id="total"></p>
        </div>
      </div>
    </section>

    <a class="btn btn-primary my-3" href="checkout.php" role="button">Checkout</a>
  </div>
  <!-- Akhir dari Container -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script>
    updateSubTotal(); // Initial call

    function updateSubTotal() {
      var table = document.getElementById("tabelku");

      let Total = Array.from(table.rows)
        .slice(1)
        .reduce((total, row) => {
          return total + parseFloat(row.cells[5].innerHTML);
        }, 0);
      document.getElementById("total").innerHTML = "SubTotal = Rp." + Total.toFixed(3);
    }
  </script>
</body>

</html>
