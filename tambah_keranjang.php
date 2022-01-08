<?php 
    session_start();
    include 'koneksi.php';
    $uname = $_SESSION['username'];
    $query_id = mysqli_query($conn,"SELECT * FROM user WHERE username = '$uname'");
    $ambil_id = mysqli_fetch_array($query_id);
    $id_user = $ambil_id['id'];
    $id_buku = $_POST['idBuku'];
    $jml_buku = $_POST['jumlahBuku'];

    // echo $id_user, " ",$id_buku, " ",$jml_buku;
    $query_input = mysqli_query($conn,"INSERT INTO `keranjang` (`id_keranjang`, `id_pengguna`, `id_buku`, `jumlah_buku`) VALUES (NULL, '$id_user', '$id_buku', '$jml_buku')");
    if($query_input){
        $query_update = mysqli_query($conn,"UPDATE buku SET stok = stok - $jml_buku WHERE buku.kd_buku = $id_buku");
        echo '<script>alert("Berhasil Memasukkan Data")</script>';
        echo "<meta http-equiv=refresh content=1;url=produk.php>";
    }
    else{
        echo '<script>alert("Gagal Memasukkan Data")</script>';
        echo "<meta http-equiv=refresh content=1;url=produk.php>";
    }
?>