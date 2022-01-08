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
    <title>Checkout || Sibulain</title>

    <style>
      body {
        background: radial-gradient( #008B8B, #fff);
        background-repeat: repeat;
        background-color: #cccccc;
      }
    </style>
  </head>
  <body>

    <!-- Container -->
    <div class="container mt-3" style="padding-top: 5%">
      <a href="keranjang.php">
        <i class="fas fa-arrow-left"></i>
        Kembali
      </a>
      <!-- Section 1 -->
      <section class="section1 mb-4">
        <div class="card border-0 shadow-sm mt-3">
          <div class="card-header">
            <h4>Total Pembayaran</h4>
          </div>
          <div class="card-body">
            <table class="table table-striped" id="tabelku">
              <thead>
                <tr>
                  <th class="col-2">No Item</th>
                  <td class="col-1">foto Buku</td>
                  <td class="col">Nama Buku</td>
                  <td class="col-1">Jumlah</td>
                  <td class="col-1">Total Harga</td>
                </tr>
              </thead>
              <tbody>
                <?php 
                  session_start();
                  include 'koneksi.php';
                  $uname = $_SESSION['username'];
                  $query_id = mysqli_query($conn,"SELECT * FROM user WHERE username = '$uname'");
                  $ambil_id = mysqli_fetch_array($query_id);
                  $id_user = $ambil_id['id'];
                  $query_buku = mysqli_query($conn,"SELECT keranjang.id_keranjang,buku.judul,buku.harga,keranjang.jumlah_buku,buku.stok,buku.foto FROM keranjang
                  INNER JOIN buku ON keranjang.id_buku = buku.kd_buku
                  INNER JOIN user ON keranjang.id_pengguna = user.id
                  WHERE user.id = '$id_user'");
                  $no = 1;
                  while($ambil_data = mysqli_fetch_array($query_buku)){
                ?>
                <tr>
                  <th scope="row"><?= $no++ ?></th>
                  <td>
                    <img src="images/<?= $ambil_data['foto'] ?>" style="max-width: 3cm;" >
                  </td>
                  <td><?= $ambil_data['judul'] ?></td>
                  <td><?= $ambil_data['jumlah_buku'] ?></td>
                  <td><?= number_format($ambil_data['harga'] * $ambil_data['jumlah_buku'],2,',','.') ?></td>
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
      <!-- Akhir dari Section 1 -->
      <!-- Section 2 -->
      <section class="section2 mb-4">
        <h4>Pilih Metode Pembayaran</h4>
        <form action="pembayaran.php" method="post">
        <div class="form-check mb-4 mt-5">
          <input class="form-check-input" type="radio" name="inputRadio" value="1" id="flexRadioDefault1">
          <img src="asset/logoGopay.png" alt="" style="max-width: 4cm;">
        </div>
        <div class="form-check mb-4">
          <input class="form-check-input" type="radio" name="inputRadio" value="2" id="flexRadioDefault1">
          <img src="asset/logoBank.png" alt="" style="max-width: 4cm;">
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="inputRadio" value="3" id="flexRadioDefault1">
          <img src="asset/logoVirtual.png" alt="" style="max-width: 4cm;">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Checkout</button>
        </form>
      </section>
      <!-- AKhir Section 2 -->
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
            return total + parseFloat(row.cells[4].innerHTML);
          }, 0);
        document.getElementById("total").innerHTML = "SubTotal = Rp." + Total.toFixed(3);
      }
    </script>
  </body>
</html>
