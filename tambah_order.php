<?php 
    session_start();
    include 'koneksi.php';
    $uname = $_SESSION['username'];
    $query_id = mysqli_query($conn,"SELECT * FROM user WHERE username = '$uname'");
    $ambil_id = mysqli_fetch_array($query_id);
    $id_user = $ambil_id['id'];
    $query_jumlah = mysqli_query($conn,"SELECT SUM(buku.harga*keranjang.jumlah_buku) AS jumlah 
    FROM keranjang INNER JOIN buku 
    ON keranjang.id_buku = buku.kd_buku 
    WHERE keranjang.id_pengguna = '$id_user' 
    GROUP BY keranjang.id_pengguna;");

    $ambil_data = mysqli_fetch_array($query_jumlah);
    $total = $ambil_data['jumlah'];
    $query_input = mysqli_query($conn,"INSERT INTO `tb_order` (`id_order`, `jumlah_harga`, `id_pengguna`) VALUES ('NULL', '$total', '$id_user')");

    if($query_input){
        $query_hapus = mysqli_query($conn,"DELETE FROM `keranjang` WHERE keranjang.id_pengguna = '$id_user'");
        echo '<script>alert("Berhasil Memasukkan Data")</script>';
        echo "<meta http-equiv=refresh content=1;url=produk.php>";
    }
    else{
        echo '<script>alert("Gagal Memasukkan Data")</script>';
        echo "<meta http-equiv=refresh content=1;url=produk.php>";
    }
?>