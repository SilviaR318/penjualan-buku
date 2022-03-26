<?php
function registrasi($data)
{
  include "koneksi.php";
  $username = strtolower(stripcslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);

  $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
						alert('username sudah digunakan');
					</script>";
    return false;
  }

  $password = password_hash($password, PASSWORD_DEFAULT);

  $query_tambah = "INSERT INTO user VALUE('',2,'$username','$password')";
  mysqli_query($conn, $query_tambah);

  return mysqli_affected_rows($conn);
}
include "koneksi.php";

if (isset($_POST["submit"])) {

  if ($_POST['password'] != $_POST['confirm_password']) {
    echo "<script>
              alert('Password confirmation not match !');
            </script>";
  } else {
    if (registrasi($_POST) > 0) {
      echo "<script>
                alert('Registrasi Berhasil');
                document.location.href = 'login.php';
              </script>";
    } else {
      echo "<script>
                alert('Registrasi Gagal');
              </script>";
    }
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="images/home.png">

  <title>Registrasi | Sibulain</title>
</head>

<body style="background-color: #334155;">
  <div class="container">
    <div class="row align-items-center justify-content-center min-vh-100">
      <div class="col-md-5 bg-white p-5 rounded-2">
        <div class="text-center p-3">
          <h1>Registrasi</h1>
        </div>
        <div>
          <form action="" method="POST">
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

            <!-- Confirm Password -->
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confir Password">
              <label for="floatingPassword">Confirm Password</label>
            </div>

            <!-- Button -->
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <a href="login.php" class="link-primary text-decoration-none">Login</a>
              </div>

              <div>
                <button type="submit" name="submit" class="btn btn-primary">registrasi</button>
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