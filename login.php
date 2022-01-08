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



    // var_dump($_SESSION);
    // die;

    // if (hash('sha256', $row['id'] == $_SESSION['hash'])) {
    //   header("Location: databuku.php");
    //   die;
    // }
    // header("Location: produk.php");
    // die;
  }
  $error = true;
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="images/home.png">
  <title>LOGIN |SibulainStore</title>
  <link rel="stylesheet" href="css/login.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>

<body>

  <form action="" class="login-form" method="post">
    <?php if (isset($error)) : ?>
      <p style="color: red; font-style: italic;">Username atau Password salah</p>
    <?php endif; ?>
    <!-- <h1>Login Admin</h1> -->
    <h1>Login</h1>

    <div class="txtb">
      <input type="text" name="username">
      <span data-placeholder="Username"></span>
    </div>

    <div class="txtb">
      <input type="password" name="password">
      <span data-placeholder="Password"></span>
    </div>

    <label>
      <input type="checkbox" name="remember" />
      <span>Remember me</span>
    </label>

    <input type="submit" name="submit" class="logbtn" value="Login">

    <div class="bottom-text">
      Don't have account? <a href="registrasi.php">Registrasi</a>
    </div>

  </form>

  <script type="text/javascript">
    $(".txtb input").on("focus", function() {
      $(this).addClass("focus");
    });

    $(".txtb input").on("blur", function() {
      if ($(this).val() == "")
        $(this).removeClass("focus");
    });
  </script>


</body>

</html>