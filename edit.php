<?php

session_start();
if (!isset($_SESSION["username"])) {
  header("Location : login.php");
  exit;
}
if ($_SESSION["role_id"] != 1) {
    header('Location: http://localhost/penjualan-buku/index.php');
    exit;
}
include "koneksi.php";
 if ($_GET['hal']=="edit") {
     
    $sql = "SELECT * FROM buku WHERE kd_buku ='$_GET[kd_buku]'";
    $query= mysqli_query($conn, $sql);
    $prd= mysqli_fetch_array($query);
    if ($prd) {
       $Foto=$prd['foto'];
       $Judul=$prd['judul'];
       $Deskripsi=$prd['deskripsi'];
       $Pengarang=$prd['pengarang'];
       $Penerbit=$prd['penerbit'];
       $stok=$prd['stok'];
       $Harga=$prd['harga'];
       
    }
 }

 if(isset($_POST['submit'])){
 
 	
    $Foto = $_POST['Foto'];
    $Judul= $_POST['Judul'];
    $Deskripsi= $_POST['Deskripsi'];
    $Pengarang= $_POST['Pengarang'];
    $Penerbit = $_POST['Penerbit'];
    $stok = $_POST['stok'];
    $Harga = $_POST['Harga'];
   
    
    $sql = "UPDATE buku SET foto='$Foto',
   judul='$Judul', deskripsi='$Deskripsi', pengarang='$Pengarang',
   penerbit='$Penerbit', stok='$stok', harga='$Harga' WHERE kd_buku='$_GET[kd_buku]'";
    $query = mysqli_query($conn, $sql);
    
        if( $query ) {
   
        // kalau berhasil alihkan ke halaman admin.php
        echo "<script>
             alert('data berhasil diedit!');
             document.location.href = 'databuku.php';
           </script>";
        } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
        }
   
    } 
    
   
   
?>



<html>
    <head>
    <link rel="icon" type="image/png" href="images/home.png">
        <title>Admin | SibulainStore</title>
        <link rel="stylesheet" href="css/index.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;600&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <style type="text/css">

        *{
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;
        }

        

        .login{
            width: 500px;
            height: 600px;
            background: radial-gradient( #008B8B, #fff);
            backdrop-filter: blur(1000vh);
            box-sizing: border-box;
            border-radius: 20px;
            position: absolute;
            top: 30%;
            left:500px;
            margin: auto;
            color:  #555;
            padding: 70px 40px;
            text-align: center;
            
        }

        .avatar{
            border-radius: 50%;
            position: absolute;
            top: -70px;
            left: 35%;
        }

        h1{
           text-align: center;
            font-size: 25px;
            padding: 20px;

            
           
        }

        .login p{
            margin: 0;
            padding: 0;
            font-weight: bold;

        }

        .login input{
            width: 100%;
            margin-bottom: 20px;
        }

        .login input[type="text"]
        {
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            color: black;
            font-size: 16px;

           
        }


        .tombol{
            width: 100%;
            padding: 8px 10px;
            outline: none;
            border: 2px solid#fff;
            border-radius: 20px;
            background: transparent;
            color: black;
            font-size: 12px;
            float: right;
            text-align: center;
            cursor: pointer;
        }

    
        </style>
    </head>
    <body>
        
    <div class="header">
       
       <div class="container">
           <div class="navbar">
               
               <nav>
                   <ul id="menuitems">
                       <li><a href="home.html">Home</a></li>
                       <li><a href="">About Us</a></li>
                       <li><a href="produc.html">All Product</a></li>
                       
                   </ul>
               </nav>
               <img src="images/cart.png" width="30px" height="30px">
               <img src="images/menu.png" class="menu-icn" width="30px" height="30px">
       </div>
       
       </div>
       </div>

        
        <div class="login">
             <img src="images/home.png" height="150" width="150" class="avatar">
                <h1>DATA BUKU</h1>
                
                <form action="" method="POST" acttion="" >

                    <label>Foto</label>
                    <input type="file" name="Foto" value="<?php echo $Foto?>"> 
                    <label>Judul Buku</label>
                    <input type="text" name="Judul" value="<?php echo $Judul?>" >
                    <label>Deskripsi Buku</label>
                    <input type="text" name="Deskripsi" value="<?php echo $Deskripsi?>">
                    <label>Pengarang</label>
                    <input type="text" name="Pengarang"  value="<?php echo $Pengarang?>">
                    <label>Peneribit</label>
                    <input type="text" name="Penerbit" value="<?php echo $Penerbit?>">
                    <label>stok</label>
                    <input type="text" name="stok" value="<?php echo $stok?>">
                    <label>Harga</label>
                    <input type="text" name="Harga" value="<?php echo $Harga?>">
                    <input type="submit" name="submit"  class="tombol"  >  
                    
                </form>




    </body>
</html>
