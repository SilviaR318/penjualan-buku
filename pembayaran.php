<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <title>Sibulain</title>
    
    <?php 
      include 'koneksi.php';
      session_start();
      $uname = $_SESSION['username'];
      $query_id = mysqli_query($conn,"SELECT * FROM user WHERE username = '$uname'");
      $ambil_id = mysqli_fetch_array($query_id);
      $id_user = $ambil_id['id'];
      $query_jumlah = mysqli_query($conn,"SELECT SUM(buku.harga*keranjang.jumlah_buku) AS jumlah 
      FROM keranjang INNER JOIN buku 
      ON keranjang.id_buku = buku.kd_buku 
      WHERE keranjang.id_pengguna = '$id_user' 
      GROUP BY keranjang.id_pengguna;");
      $ambil_data = mysqli_fetch_array($query_jumlah)
    ?>
  </head>
  <body>
    <div class="container">
      <!-- Card -->
      <div class="card position-absolute top-50 start-50 translate-middle">
        <div class="card-body">
          <h3>Kode Pembayaran : <?php echo "Order-".uniqid() ?></h3>
          <h5 class="text-center">Total yang harus dibayar : Rp.<?= number_format($ambil_data['jumlah'],2,',','.') ?></h5>
        </div>
        <div class="card-footer">
          <h5>Cara Pembayaran</h5>
          <?php 
            $pilihan = $_POST['inputRadio'];
            if($pilihan == 1){
          ?>
          <!-- Gopay -->
          <ol>
            <li>Buka Aplikasi Gopay</li>
            <li>Pilih Menu Bayar</li>
            <li>Masukan Kode Pembayaran</li>
          </ol>
          <?php 
            }
            elseif($pilihan == 2){
          ?>
          <!-- bank transfer -->
          <ol>
            <li>Pilih Transfer > Virtual Account Billing</li>
            <li>Plih Rekening Debet > Masukan Kode Pembayaran pada menu input baru</li>
            <li>Tagihan yang harus dibayar akan muncul pada layar </li>
            <li>Periksa Tagihan apakah sudah benar, jika benar masukan password transaksi dan pilih lanjut</li>
          </ol>
          <?php 
            }
            else{
          ?>
          <!-- virtual Account -->
          <ol>
          <li>Pilih Transfer > Virtual Account Billing</li>
          <li>Plih Rekening Debet > Masukan Kode Pembayaran pada menu input baru</li>
          <li>Tagihan yang harus dibayar akan muncul pada layar </li>
          <li>Periksa Tagihan apakah sudah benar, jika benar masukan password transaksi dan pilih lanjut</li>
          </ol>
          <?php 
            }
          ?>
          <div class="row">
            <a type="button" class="btn btn-success mb-2" href="tambah_order.php" >Ok</a>
            <a type="button" class="btn btn-outline-success" href="checkout.php">Ubah Metode Pembayaran</a>
          </div>
        </div>
      </div>
      <!-- Akhir dari card -->
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
