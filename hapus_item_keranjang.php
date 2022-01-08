<?php 
    include "koneksi.php";
    $id = $_GET['id_keranjang'];

    $query_ambil = mysqli_query($conn,"SELECT * FROM keranjang WHERE id_keranjang = $id");
    $ambil_data = mysqli_fetch_array($query_ambil);
    $jml_sekarang = $ambil_data['jumlah_buku'];
    $id_buku = $ambil_data['id_buku'];
    
    $query = mysqli_query($conn,"DELETE FROM `keranjang` WHERE `keranjang`.`id_keranjang` = $id");
    if($query){
        $query_update = mysqli_query($conn,"UPDATE buku SET stok = stok + $jml_sekarang WHERE buku.kd_buku = $id_buku");
        echo '<script>alert("Berhasil Mengubah Data")</script>';
        echo "<meta http-equiv=refresh content=1;url=keranjang.php>";
    }
    else{
        echo '<script>alert("Gagal Memasukkan Data")</script>';
        echo "<meta http-equiv=refresh content=1;url=keranjang.php>";
    }
?>