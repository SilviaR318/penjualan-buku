<?php

include "koneksi.php";
if ($_GET['hal']=="hapus")

$hapus = mysqli_query($conn, "DELETE FROM buku WHERE kd_buku='$_GET[kd_buku]'");

if ($hapus) {
  echo "<script>
          alert('data berhasil dihapus!');
          document.location.href = 'databuku.php';
        </script>";
}else {
  echo "<script>
          alert('data gagal dihapus!');
          document.location.href = 'databuku.php';
        </script>";
}
  
?>