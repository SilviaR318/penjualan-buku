<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['username'])) {
  header("Location: databuku.php");
  exit;
}

if (isset($_COOKIE['username']) && isset($_COOKIE['hash'])) {
  $username = $_COOKIE['username'];
  $hash = $_COOKIE['hash'];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  $row = mysqli_fetch_assoc($result);

  if ($hash === hash('sha256', $row['id'], false)) {
    $_SESSION['username'] = $row['username'];
    header("Location: databuku.php");
    exit;
  }
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cek_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  // $data_user = mysqli_fetch_assoc($cek_user);

  if (mysqli_num_rows($cek_user) > 0) {
    $row = mysqli_fetch_assoc($cek_user);
    if (password_verify($password, $row['password'])) {
      // buat session username dan password jika data benar
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['hash'] = hash('sha256', $row['id'], false);

      // cek role id
      if ($row['role_id'] == 1) {
        # admin
        header("Location: databuku.php");
      } else {
        header("Location: index.php");
      }
    } else {
      echo "password salah";
    }

    if (isset($_POST['remember'])) {
      setcookie('username', $row['username'], time() + 60 * 60 * 24);
      $hash = hash('sha256', $row['id']);
      setcookie('hash', $hash, time() + 60 * 60 * 24);
    }
  }
  $error = true;
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="images/home.png">

  <title>Login | Sibulain</title>
</head>

<body class="bg-light" style="background-image: url('https://images.unsplash.com/photo-1579546929518-9e396f3cc809?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80'); background-size: cover;">
  <div class="container">
    <div class="row align-items-center justify-content-center min-vh-100">
      <div class="col-md-5 bg-white p-5 rounded-2">
        <div class="text-center p-3">
          <h1>Login</h1>
        </div>
        <div>
          <form action="" method="POST">

            <?php if (isset($error)) : ?>
              <div class="alert alert-danger" role="alert">
                Username atau Password salah!
              </div>
            <?php endif; ?>

            <!-- Username -->
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="username" name="username" placeholder="Username">
              <label for="floatingInput">Username</label>
            </div>

            <!-- Password -->
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div>

            <!-- Check box -->
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="checkbox">
              <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>

            <!-- Button -->
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <a href="registrasi.php" class="link-primary text-decoration-none">Registrasi</a>
              </div>

              <div>
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(".txtb input").on("focus", function() {
      $(this).addClass("focus");
    });

    $(".txtb input").on("blur", function() {
      if ($(this).val() == "")
        $(this).removeClass("focus");
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>