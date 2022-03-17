<?php

class Components
{
    public $username;

    function sidebar($username)
    {
        return '<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarLabel">Sibulain</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="databuku.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="input.php">Tambah buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>

    <main>
        <nav class="navbar navbar-light bg-light">
            <div class="container">

                <div class="d-flex align-items-center">
                    <button type="button" class="navbar-toggler border-0" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand ms-1" href="#">Sibulain</a>
                </div>

                <div class="dropdown">
                    <button type="button" class="btn dropdown-toggle" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="text-muted">' . $username . '</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="profile">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>

            </div>
        </nav>';
    }
}
