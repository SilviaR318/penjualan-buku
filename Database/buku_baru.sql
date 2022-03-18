-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Mar 2022 pada 05.45
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_baru`
--

DELIMITER $$
--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `totharga` (`hsatuan` INT, `jumlah_beli` INT) RETURNS INT(11) BEGIN 
DECLARE harga int;
SET harga=hsatuan*jumlah_beli;
RETURN harga;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kd_buku` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `pengarang` varchar(30) NOT NULL,
  `penerbit` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kd_buku`, `foto`, `judul`, `deskripsi`, `pengarang`, `penerbit`, `stok`, `harga`) VALUES
(18, 'bg3.jpg', 'Selamat Tinggal', 'Buku ini menceritakan tentang ....', 'Tere Liye', ' Gramedia Pustaka Ut', 26, 80000),
(29, 'bg7.jpeg', 'Pergi', 'Sebuah kisah tentang menemukan tujuan, ke mana hendak pergi, ', 'Tere Liye', ' Sabak Grip Nusantar', 96, 89000),
(33, 'bg1.jpg', 'Wingit', 'buku wingit', 'Sara wijayanto', 'Elex Media', 17, 65000),
(34, 'bg4.png', 'Serangkai', 'buku serankai', 'Valerie Patkar', 'Bhuana Sastra', 20, 80000),
(35, 'bg5.jpg', 'Dilan', 'Dia adalah dilanku tahun 1990', 'Pidi Baiq', 'Pastel Books', 20, 75000),
(36, 'bg6.jpg', 'Tuhan, kenapa kau memberiku wajah ini?', 'Buku Keren', 'Isa Alamsyah', 'Elex Media', 29, 90000),
(37, 'bg8.jpeg', 'Pulang', 'Buku Pulang', 'Tere liye', 'Sabak Grip Nusantara', 20, 80000),
(38, 'bg9.jpg', 'Almond', 'Buku Almond', 'Sohn Won-Pyung', 'Grasindo', 20, 75000),
(39, 'bg10.jpg', 'Filosofi Teras', 'Filsafat Yunani-Romawi Kuno untuk mental tangguh masa kini', 'Henry Manampiring', 'Kompas', 20, 120000),
(45, 'download (4).jpg', 'tttt', 'ggg', 'gf', 'Sinar Dunia', 444, 180000);

--
-- Trigger `buku`
--
DELIMITER $$
CREATE TRIGGER `update_insert` AFTER INSERT ON `buku` FOR EACH ROW BEGIN
INSERT INTO penerbit 
set kd_buku = new.kd_buku, penerbit=new.penerbit, judul=new.judul;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_penerbit` AFTER UPDATE ON `buku` FOR EACH ROW BEGIN
UPDATE penerbit 
set penerbit=new.penerbit, judul=new.judul
WHERE kd_buku=new.kd_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_pengguna`, `id_buku`, `jumlah_buku`) VALUES
(30, 24, 29, 1),
(42, 25, 33, 1),
(43, 25, 29, 2),
(45, 30, 33, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_access`
--

CREATE TABLE `role_access` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role_access`
--

INSERT INTO `role_access` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `tbl_barang_user`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `tbl_barang_user` (
`kd_buku` int(11)
,`foto` varchar(200)
,`judul` varchar(100)
,`deskripsi` varchar(200)
,`pengarang` varchar(30)
,`penerbit` varchar(20)
,`stok` int(11)
,`harga` bigint(20)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `jumlah_harga` bigint(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `jumlah_harga`, `id_pengguna`) VALUES
(2, 179000, 23),
(4, 333000, 23),
(5, 79000, 24),
(6, 200000, 24),
(7, 200000, 24),
(8, 158000, 24),
(9, 360000, 24),
(10, 100000, 24),
(11, 243000, 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `role_id`, `username`, `password`) VALUES
(12, 2, 'WanRivaldo', '$2y$10$qn5QySGe07HaTg3SXmuvS.cxFOJlvaQfnFT3iCJsG/NbpiuQfTwFO'),
(16, 2, 'Silvia', '$2y$10$mMxZw6JdB8DLMaUdIkH5XufpOi0LyS3Q./FOC8l6OY4DXIIEcbNwK'),
(17, 2, 'nanda', '$2y$10$GqueVQQVq.Fc/YDrEO5HyuGQq86k02IZiySDTyLgtqjK82vnJXemW'),
(21, 2, 'susan', '$2y$10$TcK8Y7WD7PxPcQ0yl53Xvu.rPczPo20NsRxeMWzHr7ti1Ri2sF1H2'),
(23, 2, 'aldo', '$2y$10$r//pijBP..Ulp.ascO./0eRZXlV4EtVq3UXVpl2WbkwSNi2sJCktu'),
(24, 1, 'silvia318', '$2y$10$Qq8evskBtjhNWLMemSmy5uGOufah8eWJuJ2efkA9jgIQIAiUUUNSG'),
(25, 2, 'nanda357', '$2y$10$op51.2wBg0Cm6vvCmO.Ak.yp8iFTGEvcPOl3/wxTFqaJMMxk.mRxG'),
(29, 2, 'sil123', '$2y$10$.58ikgJUHIZpiHu3AGYxtubnYNmbHIseoOdDjnl7QPzs/NbMoPOcm'),
(30, 2, 'silros123', '$2y$10$w05PS.JuJb7U.wRwThavYO83JjrhE8FGnjb1N4GXcRv6bU5gTqrU2');

-- --------------------------------------------------------

--
-- Struktur untuk view `tbl_barang_user`
--
DROP TABLE IF EXISTS `tbl_barang_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_barang_user`  AS  select `buku`.`kd_buku` AS `kd_buku`,`buku`.`foto` AS `foto`,`buku`.`judul` AS `judul`,`buku`.`deskripsi` AS `deskripsi`,`buku`.`pengarang` AS `pengarang`,`buku`.`penerbit` AS `penerbit`,`buku`.`stok` AS `stok`,`buku`.`harga` AS `harga` from `buku` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kd_buku`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `fk_keranjang_pengguna` (`id_pengguna`),
  ADD KEY `fk_keranjang_buku` (`id_buku`);

--
-- Indeks untuk tabel `role_access`
--
ALTER TABLE `role_access`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk_order_user` (`id_pengguna`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `kd_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `role_access`
--
ALTER TABLE `role_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_keranjang_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`kd_buku`),
  ADD CONSTRAINT `fk_keranjang_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `role_access`
--
ALTER TABLE `role_access`
  ADD CONSTRAINT `role_access` FOREIGN KEY (`id`) REFERENCES `user` (`role_id`);

--
-- Ketidakleluasaan untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `fk_order_user` FOREIGN KEY (`id_pengguna`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
