<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="images/home.png">

    <title>Registrasi | Sibulain</title>
</head>

<body class="bg-light" style="background-image: url('https://images.unsplash.com/photo-1579546929518-9e396f3cc809?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80'); background-size: cover;">
    <div class="container">
        <div class="row align-items-center justify-content-center min-vh-100">
            <div class="col-md-5 bg-white p-5 rounded-2">
                <div class="text-center p-3">
                    <h1>Registrasi</h1>
                </div>
                <div>
                    <form method="POST">
                        <!-- Username -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Username">
                            <label for="floatingInput">Username</label>
                        </div>

                        <!-- Password -->
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password">
                            <label for="floatingPassword">Confirm Password</label>
                        </div>

                        <!-- Button -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <a href="_login.php" class="link-primary text-decoration-none">Login</a>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Registrasi</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>