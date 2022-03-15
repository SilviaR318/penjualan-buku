
<?php
//menghubungkan dengan file php lainya
session_start();
if (!isset($_SESSION["username"])) {
  header("Location : login.php");
  exit;
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
            background: radial-gradient( #FFC0CB, #20B2AA);
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
            color: white;
            font-size: 16px;

           
        }


        .tombol{
            width: 100%;
            padding: 8px 10px;
            outline: none;
            border: 2px solid#fff;
            border-radius: 20px;
            background: transparent;
            color: #fff;
            font-size: 20px;
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
               <!-- <div class="logo">
                  <img src="images/png light.png" width="120px">
               </div>-->
            
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
                
                <form action="prosesinput.php" method="POST" acttion="" >

                    <label>Foto</label>
                    <input type="file" name="txtfoto" id="foto" required> 
                    <label>Judul Buku</label>
                    <input type="text" name="txtjudul" required >
                    <label>Deskripsi Buku</label>
                    <input type="text" name="txtdeskripsi" required>
                    <label>Pengarang</label>
                    <input type="text" name="txtpengarang" required>
                    <label>Peneribit</label>
                    <input type="text" name="txtpenerbit" required>
                    <label>stok</label>
                    <input type="text" name="txtstok" required>
                    <label>Harga</label>
                    <input type="text" name="txtharga" id="harga" required>
                    <input type="submit" value="simpan" name="Daftar" class="tombol"  >  
                    
                </form>





    </body>
</html>
