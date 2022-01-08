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

	$query_tambah = "INSERT INTO loginuser VALUE('','$username','$password')";
	mysqli_query($conn, $query_tambah);

	return mysqli_affected_rows($conn);
}
include "koneksi.php";

if (isset($_POST["submit"])) {

  if (registrasi($_POST) > 0) {
    echo "<script>
              alert('Registrasi Berhasil');
              document.location.href = 'loginuser.php';
            </script>";
  } else {
    echo "<script>
              alert('Registrasi Gagal');
            </script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/home.png">
        <title>REGISTRASI | Sibulain</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>

      <form action="" class="login-form" method="post">
      
        <h1>Registrasi</h1>

        <div class="txtb">
          <input type="text" name="username">
          <span data-placeholder="Username"></span>
        </div>

        <div class="txtb">
          <input type="password" name="password">
          <span data-placeholder="Password"></span>
        </div>

        <input type="submit" name="submit" class="logbtn" value="Login">

        

      </form>

      <script type="text/javascript">
      $(".txtb input").on("focus",function(){
        $(this).addClass("focus");
      });

      $(".txtb input").on("blur",function(){
        if($(this).val() == "")
        $(this).removeClass("focus");
      });

      </script>


  </body>
</html>
