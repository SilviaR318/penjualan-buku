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
         background-image: linear-gradient(to top, #fbc2eb 0%, #a6c1ee 100%);
         }
         button a {
         color: white;
         text-decoration: none;
         } 
         .titleShop {
         font-weight: 800;
         margin-top: 1%;
         }
         .menu {
         color: #4c4c4c;
         text-decoration: none;
         }
         .card, .form-control {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10.6px);
        -webkit-backdrop-filter: blur(10.6px);
        border: 1px solid rgba(255, 255, 255, 10); 
         -webkit-border-radius: 30px;
         -moz-border-radius: 30px;
         border-radius: 30px;
         }
         table {
         margin-top: 3%;
         }
         .card input, select {
         margin-top: 10px;
         }
         label {
         margin-top: 30px;
         margin-bottom: 10px;
         }
         label.radio {
         cursor: pointer
         }
         label.radio input {
         position: absolute;
         top: 0;
         left: 0;
         visibility: hidden;
         pointer-events: none
         }
         label.radio span {
         padding: 7px 14px;
         border: 1px solid #1a1e21;
         display: inline-block;
         color: #1a1e21;
         border-radius: 20px;
         text-transform: uppercase
         }
         label.radio input:checked+span {
         border-color: #1a1e21;
         background-color: #1a1e21;
         color: #fff
         }

         .table-hover > thead > tr > th {
    border: none;
}
      </style>
   </head>
   <body>

      <!-- Container -->
      <div class="container" style="padding-top: 5%;"> 
      <button type="button" class="btn btn-white" style="border-radius: 10px;" class="back"><a href="produk.php" >
      <i class="fas fa-arrow-left"></i>
      Kembali
      </a></button>
      <section class="section1">
         <div class="card border-0 shadow-sm mt-3">
            <div class="card-body">
               <h2 class="titleShop">Your Order</h2>
               <div class="menuPage">
                  <a href="" class="menu" >Home / </a>
                  <a href="" class="menu" >Produk / </a>
                  <a href="" class="menu" >Keranjang </a>
               </div>
               <div class="table-responsive">
                  <table class="table table-hover" id="tabelku">
                     <thead>
                        <tr>
                           <th class="col-1">No Item</th>
                           <th class="col-1">Foto Buku</th>
                           <th class="col-1">Nama Buku</th>
                           <th class="col-1">Jumlah</th>
                           <th class="col-1">Harga Satuan</th>
                           <th class="col-1">Total Harga</th>
                           <th class="col-1">Aksi</th>
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
                           <td><h5><?= $ambil_data['judul'] ?></h5></td>
                           <td>
                              <form action="ubah_item_keranjang.php?id_keranjang=<?= $ambil_data['id_keranjang'] ?>" method="post">
                                 <input type="number" class="form-control" name="input" id="input1" value="<?= $ambil_data['jumlah_buku'] ?>" max="<?= $ambil_data['stok'] ?>" min="1" style="max-width: 2cm" />
                           </td>
                           <td><?= number_format($ambil_data['harga'],2,',','.') ?></td>
                           <td><?= number_format($ambil_data['harga'] * $ambil_data['jumlah_buku'],2,',','.') ?></td>
                           <td>
                           <button type="submit" class="fas fa-edit fa-1.5x" style="border: 0;background: none;"></button>
                           </form>
                           <a class="fas fa-trash fa-1.5x text-dark" onclick="confirm('Yakin Dihapus?')" href="hapus_item_keranjang.php?id_keranjang=<?= $ambil_data['id_keranjang'] ?>"></a>
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

      <a class="btn btn-light my-5 " href="checkout.php" style="border-radius: 10px;" role="button">GO TO CHECKOUT</a>
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
           document.getElementById("total").innerHTML = "SubTotal = <b> Rp. " + Total.toFixed(3) + "</b>";
         }
      </script>
   </body>
</html>

