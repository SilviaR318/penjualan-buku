<?php
//session_start();
//if (empty($_SESSION["username"])) {
  //  header('Location: http://localhost/penjualan-buku/login.php');
    //exit;
//}
?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/home.png">
    <title>SIBULAIN</title>
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
                       <?php if (empty($_SESSION["username"])) : ?>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="aboutbook.php">About Books</a></li>
                        <?php else : ?>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="aboutbook.php">About Books</a></li>
                            <li><a href="produk.php">All Product</a></li>
                            <li><a href="detail.php">Detail</a></li>
                        <?php endif; ?>
     
     
                    </ul>
                        </nav>
                
                <?php if (empty($_SESSION["username"])) : ?>
                    <a href="login.php" class="btn" style="margin-left: 20px;"> Login</a>
                    <a href="registrasi.php" class="btn" style="margin-left: 20px;"> Register</a>
                <?php else : ?>
                    <a href="keranjang.php">
                        <img src="images/cart.png" width="30px" height="30px">
                    </a>
                    <a href="logout.php" class="btn"> Logout</a>
                <?php endif; ?>
                <img src="images/menu.png" class="menu-icn" width="30px" height="30px">
            </div>
            <div class="row">
                <div class="col-2">
                    <h1>A New Style!</h1>
                    <p>"Life is a journey to be experienced, not a problem to be solved". <br>Happy a new Day With Your Style</p>
                    <a href="" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="images/home.png">

                </div>
            </div>
        </div>
    </div>

    <!---------------Kategori---------------->
    <div class="categori">
        <div class="small">
            <div class="row">
                <div class="col-3">
                    <img src="images/category-1.jpg">
                </div>
                <div class="col-3">
                    <img src="images/category-2.jpg" alt="">
                </div>
                <div class="col-3">
                    <img src="images/category-3.jpg" alt="">
                </div>

            </div>
        </div>
    </div>

    <!--------Product--------->
    <div class="small">
        <h2 class="title">Books</h2>
        <div class="row">
            <div class="col-4">
                <img src="images/bg1.jpg">
                <h4>Sara Wijayanto</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Rp.85.000</p>
            </div>
            <div class="col-4">
                <img src="images/bg2.jpg">
                <h4>Mark Manson</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>Rp.67.000</p>
            </div>
            <div class="col-4">
                <img src="images/bg3.jpg">
                <h4>Tere Liye</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Rp.68.000</p>
            </div>
            <div class="col-4">
                <img src="images/bg4.png">
                <h4>Valeri patkar</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>

                </div>
                <p>Rp.81.000</p>
            </div>
        </div>
        <h2 class="title"> Lates Books</h2>
        <div class="row">
            <div class="col-4">
                <img src="images/bg5.jpg">
                <h4>Pidi Baiq</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Rp.89.000</p>
            </div>
            <div class="col-4">
                <img src="images/bg6.jpg">
                <h4>Isa Alamsyah</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>Rp.80.000</p>
            </div>
            <div class="col-4">
                <img src="images/bg7.jpeg">
                <h4>Tere Liye</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Rp.85.000</p>
            </div>
            <div class="col-4">
                <img src="images/bg8.jpeg">
                <h4>Tere Liye</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>

                </div>
                <p>Rp.85.000</p>
            </div>
            <div class="row">
                <div class="col-4">
                    <img src="images/bg10.jpg">
                    <h4>Henry Manampiring</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p>$50.00</p>
                </div>
                <div class="col-4">
                    <img src="images/bg9.jpg">
                    <h4>Sohn won-Pyung</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>Rp.70.400</p>
                </div>
                <div class="col-4">
                    <img src="images/bg11.jpg">
                    <h4>Jerome Polin Sijabat</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p>Rp.76.000</p>
                </div>
                <div class="col-4">
                    <img src="images/bg12.jpg">
                    <h4>Marchella Fp</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>

                    </div>
                    <p>Rp.125.000</p>
                </div>
            </div>
        </div>

        <!--------offer------------->
        <div class="offer">
            <div class="small-contrainer">
                <div class="row">
                    <div class="col-2">
                        <img src="images/exclusive.png" class="offer-img">
                    </div>
                    <div class="col-2">
                        <p>Exlusively Availabel on BerStore</p>
                        <h1>Smart Brand Watch</h1>
                        <small>
                            New Brand features a 39.9% larges, AMOLED color full-touch display with adjustable brightnes so everthing is clear as can be
                        </small><br></br>
                        <a href="" class="btn">Buy Now &#8594;</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-----testimoni------>
    <div class="testimoni">
        <div class="small-contrainer">
            <div class="row">
                <div class="col-3">
                    <i class="fas fa-quote-left"></i>
                    <p>"Application Server & Web Programmer"</p>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <img src="images/nanda.jpeg">
                    <h3>Nanda Prasetya</h3>
                </div>
                <div class="col-3">
                    <i class="fas fa-quote-left"></i>
                    <p>"Database Server & Web Programmer"</p>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <img src="images/Silvia.jpeg">
                    <h3>Silvia Rosita</h3>
                </div>
                <div class="col-3">
                    <i class="fas fa-quote-left"></i>
                    <p>"Application Server & Web Programmer"</p>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <img src="images/aldo.jpeg">
                    <h3>Wan Rivaldo</h3>
                </div>
                <div class="col-3">
                    <i class="fas fa-quote-left"></i>
                    <p>"Web Server & Web Designer"</p>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <img src="images/Wahyu.jpeg">
                    <h3>Wahyu Dwi Susanti</h3>
                </div>
                <div class="col-3">
                    <i class="fas fa-quote-left"></i>
                    <p>"Buku adalah jembatan ilmu untuk menghubungkan pengetahuan dengan kehidupan nyata."</p>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <img src="images/brly.jpeg">
                    <h3>Rima Aida Istiqomah</h3>
                </div>
                <div class="col-3">
                    <i class="fas fa-quote-left"></i>
                    <p>"Buku adalah jembatan ilmu untuk menghubungkan pengetahuan dengan kehidupan nyata."</p>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <img src="images/brly.jpeg">
                    <h3>Desi Harmonika</h3>
                </div>
                <div class="col-3">
                    <i class="fas fa-quote-left"></i>
                    <p>"Buku adalah jembatan ilmu untuk menghubungkan pengetahuan dengan kehidupan nyata."</p>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <img src="images/brly.jpeg">
                    <h3>Veny Angelia</h3>
                </div>
            </div>
        </div>
    </div>

    <!------Brand--------->
    <div class="brand">
        <div class="small-contrainer">
            <div class="row">
                <div class="col-5">
                    <img src="images/logo-philips.png">
                </div>
                <div class="col-5">
                    <img src="images/logo-godrej.png">
                </div>
                <div class="col-5">
                    <img src="images/logo-coca-cola.png">
                </div>
            </div>
        </div>
    </div>

    <!-----fotter--------->
    <div class="fotter">
        <div class="contrainer">
            <div class="row">
                <div class="fotter-col1">
                    <h3>Access</h3>
                    <p>Access with your phone</p><br>
                    <img src="images/fb.png">
                    <img src="images/tw.png">
                    <img src="images/ig.png">
                    <p>Our Account</p>
                    <img src="images/png dark.png">
                </div>


            </div>

        </div>
        <hr>
        <p class="copyright">CopyRight SIBULAIN</p>
    </div>
    </div>


</body>

</html>
