<?php

require_once('components.php');

$components = new Components();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/home.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>SIBULAIN</title>
</head>

<body>
    <?= $components->navbar() ?>

    <!-- Jumbotron Start -->
    <div class="container min-vh-100">
        <div class="row d-flex align-items-center">
            <div class="col-12 col-md-6">
                <div class="text-center text-md-start">
                    <h1>A New Style</h1>
                    <p class="lead">
                        "Life is a journey to be experienced, not a problem to be solved". <br> Happy a new Day With Your Style
                    </p>
                    <a href="produk.php" class="btn btn-primary">Explore books</a>
                </div>
            </div>
            <div class="col-12 col-md-6 order-first order-md-last">
                <img src="images/home.png" class="img-fluid" alt="buku">
            </div>
        </div>
    </div>
    <!-- Jumbotron End -->

    <!-- Books Start -->
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Books</h1>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100">
                        <img src="images/bg1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Sara Wijayanto</h5>
                            <small class="text-muted">Rp85.000</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="images/bg2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Mark Manson</h5>
                            <small class="text-muted">Rp79.000</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="images/bg3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Tere Liye</h5>
                            <small class="text-muted">Rp69.000</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Books End -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>