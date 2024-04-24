-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Apr 2024 pada 12.43
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `foto_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `foto_kategori`) VALUES
(11, 'hoodie', 'hd.jpg'),
(12, 'crewneck', 'cn.jpg'),
(13, 'jacket denim', 'jd.jpg'),
(14, 'varsity jacket', 'vjtt.jpg'),
(15, 'sweater', 'rawr.jpg'),
(16, ' flannel shirt', 'fs.jpg'),
(21, 'celana kargo', 'ck.jpg'),
(22, 'turtleneck', 'tt.jpg'),
(23, 'polo shirt', 'pl.jpg'),
(24, 'bomber jacket', 'bjj.jpg'),
(25, 'buble jacket', 'buble.jpg'),
(26, 'kameja shirt', 'kmj.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `telepon_pelanggan` varchar(20) NOT NULL,
  `foto_pelanggan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `telepon_pelanggan`, `foto_pelanggan`) VALUES
(1, 'Nuza Nadenta', 'nuza123@gmail.com', '0895384290', 'nuza.jpg'),
(2, 'Fariq Albi', 'albi123@gmail.com', '0887657654', 'fariq.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`) VALUES
(1, 1, '2023-11-01', 50000),
(2, 2, '2023-11-01', 70000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(1, 1, 1, 2),
(2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(29, 14, 'hoodie grdt', 189000, 100000, 'varsity2.webp', 'hoodie grdt for unisex', 200),
(30, 14, 'crewneck santuy', 189000, 1000, 'varsity2.webp', 'crewneck grdt for unisex', 133),
(32, 14, 'varsity jacket  ', 499000, 1000, 'varsity2.webp', 'varsity jacket for unisex ', 100),
(33, 14, 'jacket denim', 457000, 1000, 'varsity2.webp', 'jacket denim for unisex', 200),
(39, 14, 'hoodie one man', 399999, 1000, 'varsity2.webp', 'wOw', 800),
(40, 11, 'hoodie one man', 399999, 1000, 'a.jpg', 'wOw', 800),
(41, 11, 'hoodie one man', 399999, 1000, 'a.jpg', 'wOw', 800),
(42, 11, 'hoodie one man', 399999, 1000, 'a.jpg', 'wOw', 800),
(43, 12, 'crewneck kece ', 329000, 2000, 'cn.jpg', 'sfdgfbg', 13243),
(44, 12, 'crewneck kece ', 329000, 2000, 'cn.jpg', 'sfdgfbg', 13243),
(45, 12, 'crewneck kece ', 329000, 2000, 'cn.jpg', 'sfdgfbg', 13243),
(46, 12, 'crewneck kece ', 329000, 2000, 'cn.jpg', 'sfdgfbg', 13243),
(47, 13, 'jacket denim', 499000, 1000, 'c.webp', 'kece', 2332),
(48, 13, 'jacket denim', 499000, 1000, 'c.webp', 'kece', 2332),
(49, 13, 'jacket denim', 499000, 1000, 'c.webp', 'kece', 2332),
(50, 13, 'jacket denim', 499000, 1000, 'c.webp', 'kece', 2332),
(51, 15, 'sweater bule', 298999, 1000, 'd.webp', 'ini sweater anget', 34567),
(52, 15, 'sweater bule', 298999, 1000, 'd.webp', 'ini sweater anget', 34567),
(53, 15, 'sweater bule', 298999, 1000, 'd.webp', 'ini sweater anget', 34567),
(56, 15, 'sweater bule', 298999, 1000, 'd.webp', 'ini sweater anget', 34567),
(59, 16, 'flanel shirt keren', 555050, 1000, 'e.jpg', 'keren bgt nieh om', 21345656),
(60, 16, 'flanel shirt keren', 555050, 1000, 'e.jpg', 'keren bgt nieh om', 21345656),
(61, 16, 'flanel shirt keren', 555050, 1000, 'e.jpg', 'keren bgt nieh om', 21345656),
(62, 16, 'flanel shirt keren', 555050, 1000, 'e.jpg', 'keren bgt nieh om', 21345656),
(64, 16, 'flanel shirt keren', 555050, 1000, 'e.jpg', 'keren bgt nieh om', 21345656),
(65, 11, 'hoodie one one', 399000, 1000, 'a.jpg', 'keren nieh', 1000),
(66, 11, 'hoodie one one', 199000, 1200, 'a.jpg', 'keren nieh om', 132),
(67, 13, 'jacket denim one two', 345000, 1000, 'c.webp', 'keren nieh om', 1324);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_foto`
--

CREATE TABLE `produk_foto` (
  `id_produk_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk_foto`
--

INSERT INTO `produk_foto` (`id_produk_foto`, `id_produk`, `nama_produk_foto`) VALUES
(45, 29, 'hoodiegrdt.jpg'),
(48, 32, 'varsity.jpg'),
(49, 33, 'denim.jpg'),
(52, 36, 'celana2.jpg'),
(53, 37, 'celana_ripped.jpg'),
(57, 30, '20231106044557varsity2.webp'),
(59, 39, 'hoodie.webp'),
(60, 43, 'b.avif'),
(61, 47, 'c.webp'),
(62, 51, 'd.webp'),
(63, 59, 'e.jpg'),
(64, 65, 'a.jpg'),
(65, 66, 'a.jpg'),
(66, 67, 'c.webp'),
(67, 29, '20231112001415a.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'nuza', 'nuza123', 'nuza123', 'admin'),
(2, 'agnia', 'agnia123', 'agnia123', 'pelanggan'),
(3, 'fahri', 'fahri123', 'fahri123', 'pelanggan'),
(4, 'dyangga putra', 'dyangga putra', 'dyangga putra', 'pelanggan'),
(5, 'zati', 'zati tampan', 'zati123', 'pelanggan'),
(6, 'tedi ', 'tedi123', 'tedi123', 'pelanggan');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_kategori`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_kategori` (
`id_produk` int(11)
,`nama_kategori` varchar(100)
,`deskripsi_produk` text
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_kategori`
--
DROP TABLE IF EXISTS `v_kategori`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kategori`  AS SELECT `produk`.`id_produk` AS `id_produk`, `kategori`.`nama_kategori` AS `nama_kategori`, `produk`.`deskripsi_produk` AS `deskripsi_produk` FROM (`produk` join `kategori` on(`produk`.`id_kategori` = `kategori`.`id_kategori`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produk_foto`
--
ALTER TABLE `produk_foto`
  ADD PRIMARY KEY (`id_produk_foto`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `produk_foto`
--
ALTER TABLE `produk_foto`
  MODIFY `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
