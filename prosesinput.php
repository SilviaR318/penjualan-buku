
                <?php
                include "koneksi.php";
                if ($_SERVER['REQUEST_METHOD']=='POST') {
                    $simpan = mysqli_query($conn, "INSERT INTO buku (foto, judul, deskripsi, pengarang, penerbit, stok, harga) VALUES ('$_POST[txtfoto]', '$_POST[txtjudul]', '$_POST[txtdeskripsi]', '$_POST[txtpengarang]', '$_POST[txtpenerbit]', '$_POST[txtstok]', '$_POST[txtharga]')");

                    if ($simpan) {
                        Header('location:databuku.php');
                        # code...
                    }else{
                        echo"gagal menyimpan data....";
                    }
                    # code...
                }



?>
           