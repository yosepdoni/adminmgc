-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2023 pada 20.22
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tingbers_system`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `product_id` int(15) NOT NULL,
  `product` varchar(50) NOT NULL,
  `category` varchar(15) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` int(15) NOT NULL,
  `total` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `product`, `category`, `qty`, `price`, `total`) VALUES
(27, 5, 1, 'ASUS ROG STRIX-G G513IC RYZEN 7-4800H 8GB 512GB RT', 'Laptop Gaming', 1, 15139000, 15139000),
(28, 5, 1, 'ASUS ROG STRIX-G G513IC RYZEN 7-4800H 8GB 512GB RT', 'Laptop Gaming', 1, 15139000, 15139000),
(29, 5, 1, 'ASUS ROG STRIX-G G513IC RYZEN 7-4800H 8GB 512GB RT', 'Laptop Gaming', 1, 15139000, 15139000),
(30, 7, 1, 'ASUS ROG STRIX-G G513IC RYZEN 7-4800H 8GB 512GB RT', 'Laptop Gaming', 1, 15139000, 15139000),
(31, 7, 2, 'Apple iPhone X', 'Apple', 4, 8000000, 32000000),
(47, 7, 1, 'acer aspire', 'Laptop Consumer', 1, 15139000, 15139000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkout`
--

CREATE TABLE `checkout` (
  `order_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `products` varchar(100) NOT NULL,
  `payment` varchar(30) NOT NULL,
  `bukti_pay` varchar(50) NOT NULL,
  `status_pengiriman` varchar(16) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `checkout`
--

INSERT INTO `checkout` (`order_id`, `user_id`, `products`, `payment`, `bukti_pay`, `status_pengiriman`, `tgl`) VALUES
(8, 5, 'ROG', '19000000', 'qr.png', 'Dalam Perjalanan', '2023-06-01'),
(9, 8, 'Hp', '8500000', 'pay.jpeg', 'Dalam Perjalanan', '2023-06-02'),
(10, 5, 'Laptop Asus', '4500000', 'qr.png', 'dikirim', '2023-06-02'),
(11, 8, 'ASUS ROG', '16000000', 'a.png', 'diterima', '2023-06-01'),
(12, 5, 'ASUS ROG', '16000000', 'a.png', 'Dalam Perjalanan', '2023-06-01'),
(13, 5, 'ASUS ROG', '16000000', 'a.png', 'Dalam Perjalanan', '2023-06-01'),
(14, 5, 'ASUS ROG', '16000000', 'a.png', 'dikirim', '2023-06-01'),
(15, 5, 'ASUS ROG', '16000000', 'a.png', 'dikirim', '2023-06-05'),
(22, 5, 'ASUS ROG', '16000000', 'a.png', 'diterima', '2023-06-03'),
(23, 5, 'ASUS ROG', '16000000', 'a.png', 'dikirim', '2023-06-02'),
(24, 5, 'ASUS ROG', '16000000', 'a.png', 'dikirim', '2023-06-01'),
(25, 5, 'ASUS ROG', '16000000', 'a.png', 'Dalam Perjalanan', '2023-06-02'),
(26, 5, 'Acer', '16000000', 'a.png', 'Dalam Perjalanan', '2023-06-03'),
(27, 8, 'ASaaUS ROG', '16000000', 'a.png', 'Dalam Perjalanan', '2023-05-31'),
(28, 5, 'Acer Aspire One', '16000000', 'a.png', 'dibatalkan', '2023-05-31'),
(29, 5, 'ASUS ROG aaa', '16000000', 'pay.jpeg', 'dibatalkan', '2023-05-31'),
(36, 5, 'ASUS ROG', '16000000', 'a.png', 'dibatalkan', '2023-05-31'),
(38, 5, 'ASUS ROG', '16000000', 'a.png', 'dibatalkan', '2023-05-31'),
(39, 5, 'ASUS ROG', '16000000', 'pay.jpeg', 'Dalam Perjalanan', '2023-06-02'),
(40, 5, 'ASUS ROG sadasjdgjada asjdjashgdjashjdas asjdas', '16000000', 'pay.jpeg', 'Dalam Perjalanan', '2023-06-01'),
(42, 5, 'Gaming ASUS ROG', '16000000', 'a.png', 'Dalam Perjalanan', '2023-05-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `order_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `product_id` int(15) NOT NULL,
  `products` varchar(50) NOT NULL,
  `category` varchar(15) NOT NULL,
  `qty` int(5) NOT NULL,
  `payment` int(15) NOT NULL,
  `bukti_pay` varchar(50) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `products`, `category`, `qty`, `payment`, `bukti_pay`, `tgl`) VALUES
(30, 5, 50, 'ASUS ROG', 'Laptop Gaming', 1, 16000000, 'a.png', '2023-05-31'),
(31, 5, 50, 'ASUS ROG', 'Laptop Gaming', 1, 16000000, 'a.png', '2023-05-31'),
(32, 5, 50, 'ASUS ROG', 'Laptop Gaming', 1, 16000000, 'a.png', '2023-05-31'),
(33, 5, 50, 'ASUS ROG', 'Laptop Gaming', 1, 16000000, 'a.png', '2023-05-31'),
(34, 5, 50, 'ASUS ROG', 'Laptop Gaming', 1, 16000000, 'a.png', '2023-05-31'),
(35, 5, 50, 'ASUS ROG', 'Laptop Gaming', 1, 16000000, 'a.png', '2023-05-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(15) NOT NULL,
  `product` varchar(50) NOT NULL,
  `stok` int(5) NOT NULL,
  `category` varchar(15) NOT NULL,
  `descriptions` text NOT NULL,
  `price` int(15) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`product_id`, `product`, `stok`, `category`, `descriptions`, `price`, `img`) VALUES
(50, 'ASUS E402', 2, 'Laptop Konsumer', 'laptop yang paling banyak digunakan oleh mahasiswa keren', 4000000, 'fg.png'),
(51, 'ASUS ROG', 10, 'Laptop Gaming', 'ini adalah laptop yang dikenal untuk bermain game sangat lancar ditahun 2023', 19500000, 'ASUS_ROG.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `email`, `nama`, `password`, `telp`, `alamat`) VALUES
(5, 'yosepdoni2905@gmail.com', 'Yosep Doni Saputra', '314450613369e0ee72d0da7f6fee773c', '+6285821807128', 'Pontianak Timur,Jl Paralel Tol, belakang kantor lurah kontrakan biru no 4\r\n'),
(6, 'yosepdoni11@gmail.com', 'Yosep Doni admin', '314450613369e0ee72d0da7f6fee773c', '6285821807128', 'yg paling lengkap dek'),
(7, 'tojol1@gmail.com', 'tojol aja', '4a7d1ed414474e4033ac29ccb8653d9b', '6285821807128', 'asbdadashdas'),
(8, 'erwin@gmail.com', 'Erwin Cakep', '123123123', '+62 857-1523-1512', 'serdam no 3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indeks untuk tabel `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
