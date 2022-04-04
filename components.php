<?php

if (!isset($_SESSION)) {
    session_start();
}
class Components
{
    public $username;
    public $app_name = "Sibulain";
    public $auth;

    function sidebar($username)
    {
        return '<div class="offcanvas offcanvas-start bg-secondary text-white" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarLabel">Sibulain</h5>
            <button type="button" class="btn-close text-black" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="databuku.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="input.php">Tambah buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>

    <main>
        <nav class="navbar navbar-dark bg-primary">
            <div class="container">

                <div class="d-flex align-items-center">
                    <button type="button" class="navbar-toggler border-0" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand ms-1" href="#">Sibulain</a>
                </div>

                <div class="dropdown">
                    <button type="button" class="btn dropdown-toggle" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="text-white">' . $username . '</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="profile">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>

            </div>
        </nav>';
    }

    public function navbar()
    {
        if (isset($_SESSION['username'])) {
            $this->auth = '
            <a class="nav-link d-flex align-items-center" href="keranjang.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                </svg>
                <div class="d-flex ms-2 d-md-none">Cart</div>
            </a>
            <a class="nav-link d-flex align-items-center" href="logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
                <div class="d-flex ms-2 d-md-none">Logout</div>
            </a>
            ';
        } else {
            $this->auth = '
            <a class="nav-link" href="login.php" role="button">Login</a>
            <a class="btn btn-light text-primary" href="registrasi.php" role="button">Register</a>
            ';
        }

        return '
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container">
                    <a class="navbar-brand" href="/">' . $this->app_name . '</a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto">
                            <a class="nav-link active" href="index.php">
                                Home
                            </a>
                            ' . $this->auth . '
                        </div>
                    </div>
                </div>
            </nav>
        ';
    }

    public function footer()
    {
        return '
            <div class="bg-dark">
                <div class="container">
                    <footer class="py-3">
                        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                            <li class="nav-item"><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                            <li class="nav-item"><a href="produk.php" class="nav-link px-2 text-white">Produk</a></li>
                        </ul>
                        <p class="text-center text-white">&copy; ' . date('Y') . '  ' . $this->app_name . ', Inc</p>
                    </footer>
                </div>
            </div>
        ';
    }

    public function head($title = "Untitle")
    {
        $title = $title . ' - ' . $this->app_name;

        return '
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" type="image/png" href="images/home.png">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <title>' . $title . '</title>
        ';
    }

    public function wave()
    {
        return '
            <div class="mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#0d6efd" fill-opacity="1" d="M0,224L48,229.3C96,235,192,245,288,213.3C384,181,480,107,576,80C672,53,768,75,864,117.3C960,160,1056,224,1152,240C1248,256,1344,224,1392,208L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
                </svg>
            </div>
        ';
    }
}
