<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="images/home.png">
        <title>PRODUCT DETAIL | SibulainStore</title>
        <link rel="stylesheet" href="css/index.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;600&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>
    <body>


        
        <div class="header">
       
        <div class="container">
            <div class="navbar">
                <nav>
                    <ul id="menuitems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="aboutbook.php">About Books</a></li>
                        <li><a href="produk.php">All Product</a></li>
                        
                    </ul>
                </nav>
                <a href="keranjang.php">
                    <img src="images/cart.png" width="30px" height="30px">
                </a>
                <img src="images/menu.png" class="menu-icn" width="30px" height="30px">
        </div>
        
        </div>
        </div>

        <div class="small single">
            <div class="row">
                <?php 
                    session_start();
                    include "koneksi.php";
                    $id = $_GET['id'];
                    $query = mysqli_query($conn, "SELECT * FROM buku WHERE kd_buku = $id");
                    while($ambil_data = mysqli_fetch_array($query)){
                ?>
                <div class="col-3">
                    <img src="images/<?= $ambil_data['foto'] ?>" width="100%">
                </div>
                <div class="col-2">
                    <p>Home / Books</p>
                    <h1>Novel By <?= $ambil_data['pengarang'] ?></h1>
                    <h4>Stok : <?= $ambil_data['stok'] ?> <br>
                    Rp <?= number_format($ambil_data['harga'],2,',','.') ?></h4>
                    <select> 
                        <option>Select Deskripsi</option>
                        <option>Select Cover</option>
                        <option>Select Contents</option>
                    </select>
                    <form action="tambah_keranjang.php" method="post">
                        <input type="number" value="1" min="1" max="<?= $ambil_data['stok'] ?>" name="jumlahBuku" style="max-width: 3cm;">
                        <input type="hidden" name="idBuku" value="<?= $ambil_data['kd_buku'] ?>">
                        <button type="submit" class="btn" style="height: 45px;border: 0;">Add To Cart</button>
                    </form>

                    <h3>Books Details </h3><br>
                    <p>Jumlah Halaman :216.0
                        
                        <br>Tanggal Terbit: 27 Jul 2020
                        
                        <br>ISBN:9786230019241
                        
                       <br> Bahasa:Indonesia
                        
                        <br>Penerbit:<?= $ambil_data['penerbit'] ?>
                    </p>
                </div>
                <?php 
                    }
                ?>
            </div>
        </div>
    
   
    <!--------Product--------->
    <div class="small">
       

        <div class="row">
            <?php 
                $query = mysqli_query($conn, "SELECT * FROM buku ORDER BY rand() LIMIT 4");
                while($ambil_data = mysqli_fetch_array($query)){
            ?>
            <div class="col-4">
                <a href="detail.php?id=<?= $ambil_data['kd_buku'] ?>">
                    <img src="images/<?= $ambil_data['foto'] ?>" >
                </a>
                <h4><?= $ambil_data['pengarang'] ?></h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Rp.<?= number_format($ambil_data['harga'],2,',','.') ?></p>
            </div>
            <?php
                }
            ?>
            
        </div>
      
    </div>
    


<!-----fotter--------->
<div class="fotter">
    <div class="contrainer">
        <div class="row">
            <div class="fotter-col1">
                <h3>Access</h3>
                <p>Access with your phone</p><br>
                <img src="images/fb.png" >
                <img src="images/tw.png">
                <img src="images/ig.png"  >
            </div>
            </div>
        </div>

        <hr>
        <p class="copyright">CopyRight SIBULAIN</p>
    </div>
</div>




</body>
</html>