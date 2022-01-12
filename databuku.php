<?php
session_start();
if (empty($_SESSION["username"])) {
    header('Location: http://localhost/penjualan-buku/login.php');
    exit;
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/home.png">
    <title>Admin | SibulainStore</title>
    <link rel="stylesheet" href="css/data_buku.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;600&display=swap" rel="stylesheet">

    <style type="text/css">
        .testimoni {

            float: left;
            padding: 80px;
            padding-top: 20px;

        }

        .testimoni .col-3 {
            text-align: center;
            padding: 5px 5px;
            box-shadow: 10px 10px 5px #aaaaaa;
            cursor: pointer;
            transition: transform 0.5s;
            background-color: #fff;
            width: 270px;
            color: #555;
            font-size: 12px;


        }

        .testimoni .col-3 img {

            margin-top: 20px;

        }

        .testimoni .col-3:hover {
            transform: translateY(-10px);
        }

        .col-3 p {
            font-size: 12px;
            margin: 12px 0;
            color: #777;
        }

        .testimoni .col-3 h3 {
            font-weight: 600;
            color: #555;
            font-size: 16px;
        }

        .row {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .btn {
            display: inline-block;
            background: #ff523b;
            color: #fff;
            padding: 8px 30px;
            margin: 30px 0;
            border-radius: 30px;
            transition: background 0.5s;
            font-size: 15px;

        }

        .btn:hover {
            background: #563434;
        }

        .buton3 {
            display: inline-block;
            background: #ff523b;
            color: #fff;
            padding: 2px 8px;
            margin: 0;
            border-radius: 30px;
            transition: background 0.5s;
            font-size: 20px;
        }

        .buton3:hover {
            background: #563434;
        }

        .cari {
            display: inline-block;
            width: 500px;
            font-size: 20px;
            border-radius: 30px;
        }

        .navbar {
            display: flex;
            align-items: center;
            padding: 10px;
        }

        nav {
            flex: 1;
            text-align: right;
        }

        nav ul {
            display: inline-block;
            list-style-type: none;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        a {
            text-decoration: none;
            color: #555;
        }

        p {
            color: #555;
        }

        .container {
            max-width: 1300px;
            margin: auto;
            padding-left: 25px;
            padding-right: 25px;
        }
    </style>
</head>

<body>
    <div class="header">

        <div class="container">
            <div class="navbar">
                <nav>
                    <h2>Hallo, <?= $_SESSION['username'] ?></h2>
                    <a href="input.php" class="btn"> Tambah Data </a>
                    <a href="logout.php" class="btn"> Logout</a>
                    <form action="databuku.php" method="get">

                </nav>
            </div>

        </div>
    </div>

    <form action="databuku.php" method="get">
        <center><input type="text" class="cari" name="cari" placeholder=" Search Books">
            <input type="submit" value="Cari" class="buton3">
        </center>

    </form>

    <div class="grid-container">
        <?php
        include "koneksi.php";
        $halaman = 6;
        $page    = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
        $mulai   = ($page > 1) ? ($page * $halaman) - $halaman : 0;

        $result = mysqli_query($conn, "SELECT * FROM buku");

        // var_dump($result);
        // die;
        $total  = mysqli_num_rows($result);
        $pages  = ceil($total / $halaman);

        //memeriksa data yang dikirim
        $no = $mulai + 1;
        if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
            //query untuk mencari data
            $query = mysqli_query($conn, "select * from buku where judul like
           '%" . $cari . "%'");
        } else {
            $sql  = "SELECT * FROM buku LIMIT $mulai, $halaman";
            $query = mysqli_query($conn, $sql);
        }


        while ($pr = mysqli_fetch_array($query)) :
        ?>
            <div class="grid-item">
                <img src="images/<?= $pr["foto"] ?>">
                <br>
                </br>
                <b>
                    <?= $pr["judul"] ?>
                </b>
                <br>
                <?= $pr["pengarang"] ?>
                <br>
                <?= $pr["penerbit"] ?>
                <br>
                <td><?= $pr["harga"] ?></td>
                <br>
                <br>
                <td><?= $pr["stok"] ?></td>
                <br>
                <hr>
                <br>
                <?= $pr["deskripsi"] ?>
                <br>

                </br>
                <hr>

                <a href="edit.php?hal=edit&kd_buku=<?= $pr['kd_buku'] ?>"><button class="button button1">Ubah</button></a>
                <a href="hapus.php?hal=hapus&kd_buku=<?= $pr["kd_buku"] ?>" onclick="return confirm('Hapus Data??')"><button class="button button2">Hapus</button></a>
            </div>
        <?php
        endwhile;
        ?>
    </div>

    <center>
    <div class="page" style="font-weight:bold;">

        <?php
        for ($i = 1; $i <= $pages; $i++) {
        ?>

          <?php if (isset($_GET['halaman'])) : ?>
             <?php if ($_GET['halaman'] == $i) : ?>
                 <a href="databuku.php?halaman=<?php echo $i; ?>" style="color: #ffffff;">
                     <span style="background-color: #008B8B;"><?php echo $i; ?></span>
                </a>
            <?php else : ?>
                 <a href="databuku.php?halaman=<?php echo $i; ?>" style="color: black;">
                     <span><?php echo $i; ?></span>
                 </a>
            <?php endif; ?>
        <?php else : ?>
            <a href="databuku.php?halaman=<?php echo $i; ?>" style="color: black;">
                <span><?php echo $i; ?></span>
            </a>
        <?php endif; ?>

    <?php
    }
    ?>
    </div>
    </center>

</body>

</html>
