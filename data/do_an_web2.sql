-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 06:51 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `do_an_web2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_nguoidung` varchar(20) NOT NULL,
  `ho_ten` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `thong_tin_khac` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_nguoidung`, `ho_ten`, `email`, `thong_tin_khac`) VALUES
('admin', 'Lê Thanh Hòa', 'admin@gmai', ''),
('manager', 'Lê Thanh H', 'manager@gm', ''),
('manager', 'Lê Thanh H', 'manager@gm', ''),
('manager', 'Lê Thanh H', 'manager@gm', ''),
('manager', 'Lê Thanh H', 'manager@gm', '');

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_danhgia`
--

CREATE TABLE `chitiet_danhgia` (
  `id_danhgia` varchar(10) NOT NULL,
  `hinhanh_danhgia` varchar(10) NOT NULL,
  `comment` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_giaohang`
--

CREATE TABLE `chitiet_giaohang` (
  `id_hoadon` varchar(10) NOT NULL,
  `phuongthuc_giaohang` varchar(10) NOT NULL,
  `ngay_giao` date NOT NULL,
  `tinhtrang_giaohang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_hoadon`
--

CREATE TABLE `chitiet_hoadon` (
  `id_hoadon` varchar(10) NOT NULL,
  `id_sanpham` varchar(10) NOT NULL,
  `so_luong` int(10) NOT NULL,
  `gia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_phieunhap`
--

CREATE TABLE `chitiet_phieunhap` (
  `id_phieunhap` varchar(10) NOT NULL,
  `id_sanpham` varchar(10) NOT NULL,
  `so_luong` int(10) NOT NULL,
  `gia_nhap` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_quyen_chucnang`
--

CREATE TABLE `chitiet_quyen_chucnang` (
  `id_quyen` varchar(10) NOT NULL,
  `id_chucnang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_sale`
--

CREATE TABLE `chitiet_sale` (
  `id_sale` varchar(10) NOT NULL,
  `id_nhomsanpham` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chuc_nang`
--

CREATE TABLE `chuc_nang` (
  `id_chucnang` varchar(10) NOT NULL,
  `ten_chucnang` varchar(10) NOT NULL,
  `mieuta` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `danh_gia`
--

CREATE TABLE `danh_gia` (
  `id_danhgia` varchar(10) NOT NULL,
  `id_nhomsanpham` varchar(10) NOT NULL,
  `id_hoadon` varchar(10) NOT NULL,
  `id_khachhang` varchar(10) NOT NULL,
  `sosao_danhgia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dong_san_pham`
--

CREATE TABLE `dong_san_pham` (
  `id_dongsanpham` int(10) NOT NULL,
  `ten_dongsanpham` int(10) NOT NULL,
  `thuonghieu_sanpham` int(10) NOT NULL,
  `mota` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id_nguoidung` varchar(10) NOT NULL,
  `id_sanpham` varchar(10) NOT NULL,
  `so_luong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hinh_nhomsanpham`
--

CREATE TABLE `hinh_nhomsanpham` (
  `id_nhomhinh` varchar(10) NOT NULL,
  `hinh` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id_hoadon` varchar(10) NOT NULL,
  `id_nguoidung` varchar(10) NOT NULL,
  `id_nhanvienban` varchar(10) NOT NULL,
  `ngay_mua` date NOT NULL,
  `tong_gia` int(10) NOT NULL,
  `id_sale` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id_nguoidung` int(11) NOT NULL,
  `ho_ten` varchar(100) NOT NULL,
  `dia_chi` varchar(100) NOT NULL,
  `so_dien_thoai` varchar(10) NOT NULL,
  `thong_tin_khac` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`id_nguoidung`, `ho_ten`, `dia_chi`, `so_dien_thoai`, `thong_tin_khac`) VALUES
(1, 'David Heros', 'On the Earth', '0987656789', ''),
(2, 'David Heros', 'On the Earth', '0987656789', ''),
(3, 'David Heros', 'On the Earth', '0987656789', ''),
(4, 'David Heros', 'On the Earth', '0987656789', ''),
(5, 'David Heros', 'On the Earth', '0987656789', ''),
(6, 'Helen Heros', 'On the March', '0987656789', ''),
(7, 'Helen Heros', 'On the March', '0987656789', ''),
(8, 'Helen Heros', 'On the March', '0987656789', ''),
(9, 'Helen Heros', 'On the March', '0987656789', ''),
(10, 'Helen Heros', 'On the March', '0987656789', ''),
(11, 'Helen Heros', 'On the March', '0987656789', ''),
(12, 'Kali Heros', 'On the Moon', '01234567', ''),
(13, 'Kali Heros', 'On the Moon', '01234567', ''),
(14, 'Kali Heros', 'On the Moon', '01234567', ''),
(15, 'Kali Heros', 'On the Moon', '01234567', ''),
(16, 'Kali Heros', 'On the Moon', '01234567', ''),
(17, 'Kali Heros', 'On the Moon', '01234567', ''),
(18, 'Kali Heros', 'On the Moon', '01234567', ''),
(19, 'Kali Heros', 'On the Moon', '01234567', ''),
(20, 'Kali Heros', 'On the Moon', '01234567', ''),
(21, 'Kali Heros', 'On the Moon', '01234567', ''),
(22, 'Kali Heros', 'On the Moon', '01234567', ''),
(23, 'Kali Heros', 'On the Moon', '01234567', ''),
(24, 'Kali Heros', 'On the Moon', '01234567', ''),
(25, 'Kali Heros', 'On the Moon', '01234567', ''),
(26, 'Kali Heros', 'On the Moon', '01234567', ''),
(27, 'Kali Heros', 'On the Moon', '01234567', ''),
(28, 'Kali Heros', 'On the Moon', '01234567', ''),
(29, 'Kali Heros', 'On the Moon', '01234567', ''),
(30, 'Kali Heros', 'On the Moon', '01234567', ''),
(31, 'Kali Heros', 'On the Moon', '01234567', ''),
(32, 'Kali Heros', 'On the Moon', '01234567', ''),
(33, 'Kali Heros', 'On the Moon', '01234567', ''),
(34, 'Kali Heros', 'On the Moon', '01234567', ''),
(35, 'Kali Heros', 'On the Moon', '01234567', ''),
(36, 'Kali Heros', 'On the Moon', '01234567', ''),
(37, 'Kali Heros', 'On the Moon', '01234567', ''),
(38, 'Kali Heros', 'On the Moon', '01234567', ''),
(39, 'Kali Heros', 'On the Moon', '01234567', ''),
(40, 'Kali Heros', 'On the Moon', '01234567', ''),
(41, 'Kali Heros', 'On the Moon', '01234567', ''),
(42, 'Kali Heros', 'On the Moon', '01234567', ''),
(43, 'Kali Heros', 'On the Moon', '01234567', ''),
(44, 'Kali Heros', 'On the Moon', '01234567', ''),
(45, 'Kali Heros', 'On the Moon', '01234567', ''),
(46, 'Kali Heros', 'On the Moon', '01234567', ''),
(47, 'Kali Heros', 'On the Moon', '01234567', ''),
(48, 'Kali Heros', 'On the Moon', '01234567', ''),
(49, 'Kali Heros', 'On the Moon', '01234567', ''),
(50, 'Kali Heros', 'On the Moon', '01234567', ''),
(51, 'Kali Heros', 'On the Moon', '01234567', '');

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id_nguoidung` varchar(10) NOT NULL,
  `tai_khoan` varchar(100) NOT NULL,
  `mat_khau` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `quyen` varchar(100) NOT NULL,
  `tinh_trang_taikhoan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id_nguoidung`, `tai_khoan`, `mat_khau`, `email`, `quyen`, `tinh_trang_taikhoan`) VALUES
('admin', 'admin', '1', 'admin@gmai', 'admin', 1),
('1', 'customer1', '1', 'customer@gmail.com', 'customer', 1),
('2', 'customer2', '1', 'customer@gmail.com', 'customer', 1),
('3', 'customer3', '1', 'customer@gmail.com', 'customer', 1),
('4', 'customer4', '1', 'customer@gmail.com', 'customer', 1),
('5', 'customer5', '1', 'customer@gmail.com', 'customer', 1),
('6', 'customer6', '1', 'customer@gmail.com', 'customer', 1),
('7', 'customer7', '1', 'customer@gmail.com', 'customer', 1),
('8', 'customer8', '1', 'customer@gmail.com', 'customer', 1),
('9', 'customer9', '1', 'customer@gmail.com', 'customer', 1),
('10', 'customer10', '1', 'customer@gmail.com', 'customer', 1),
('11', 'customer11', '1', 'customer@gmail.com', 'customer', 1),
('12', 'customer12', '1', 'customer@gmail.com', 'customer', 1),
('13', 'customer13', '1', 'customer@gmail.com', 'customer', 1),
('14', 'customer14', '1', 'customer@gmail.com', 'customer', 1),
('15', 'customer15', '1', 'customer@gmail.com', 'customer', 1),
('16', 'customer16', '1', 'customer@gmail.com', 'customer', 1),
('17', 'customer17', '1', 'customer@gmail.com', 'customer', 1),
('18', 'customer18', '1', 'customer@gmail.com', 'customer', 1),
('19', 'customer19', '1', 'customer@gmail.com', 'customer', 1),
('20', 'customer20', '1', 'customer@gmail.com', 'customer', 1),
('21', 'customer21', '1', 'customer@gmail.com', 'customer', 1),
('22', 'customer22', '1', 'customer@gmail.com', 'customer', 1),
('23', 'customer23', '1', 'customer@gmail.com', 'customer', 1),
('24', 'customer24', '1', 'customer@gmail.com', 'customer', 1),
('25', 'customer25', '1', 'customer@gmail.com', 'customer', 1),
('26', 'customer26', '1', 'customer@gmail.com', 'customer', 1),
('27', 'customer27', '1', 'customer@gmail.com', 'customer', 1),
('28', 'customer28', '1', 'customer@gmail.com', 'customer', 1),
('29', 'customer29', '1', 'customer@gmail.com', 'customer', 1),
('30', 'customer30', '1', 'customer@gmail.com', 'customer', 1),
('31', 'customer31', '1', 'customer@gmail.com', 'customer', 1),
('32', 'customer32', '1', 'customer@gmail.com', 'customer', 1),
('33', 'customer33', '1', 'customer@gmail.com', 'customer', 1),
('34', 'customer34', '1', 'customer@gmail.com', 'customer', 1),
('35', 'customer35', '1', 'customer@gmail.com', 'customer', 1),
('36', 'customer36', '1', 'customer@gmail.com', 'customer', 1),
('37', 'customer37', '1', 'customer@gmail.com', 'customer', 1),
('38', 'customer38', '1', 'customer@gmail.com', 'customer', 1),
('39', 'customer39', '1', 'customer@gmail.com', 'customer', 1),
('40', 'customer40', '1', 'customer@gmail.com', 'customer', 1),
('41', 'customer41', '1', 'customer@gmail.com', 'customer', 1),
('42', 'customer42', '1', 'customer@gmail.com', 'customer', 1),
('43', 'customer43', '1', 'customer@gmail.com', 'customer', 1),
('44', 'customer44', '1', 'customer@gmail.com', 'customer', 1),
('45', 'customer45', '1', 'customer@gmail.com', 'customer', 1),
('46', 'customer46', '1', 'customer@gmail.com', 'customer', 1),
('47', 'customer47', '1', 'customer@gmail.com', 'customer', 1),
('48', 'customer48', '1', 'customer@gmail.com', 'customer', 1),
('49', 'customer49', '1', 'customer@gmail.com', 'customer', 1),
('50', 'customer50', '1', 'customer@gmail.com', 'customer', 1),
('51', 'customer51', '1', 'customer@gmail.com', 'customer', 1),
('52', 'customer52', '1', 'customer@gmail.com', 'customer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `id_nhacungcap` varchar(10) NOT NULL,
  `ten_nhacungcap` varchar(10) NOT NULL,
  `diachi_nhacungcap` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nhom_san_pham`
--

CREATE TABLE `nhom_san_pham` (
  `id_nhomsanpham` int(10) NOT NULL,
  `ten_nhomsanpham` varchar(100) NOT NULL,
  `gioi_tinh` varchar(10) NOT NULL,
  `mieuta` varchar(100) NOT NULL,
  `sosao_danhgia` varchar(10) NOT NULL,
  `soluot_danhgia` varchar(10) NOT NULL,
  `id_dongsanpham` varchar(10) NOT NULL,
  `mau_sanpham` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhom_san_pham`
--

INSERT INTO `nhom_san_pham` (`id_nhomsanpham`, `ten_nhomsanpham`, `gioi_tinh`, `mieuta`, `sosao_danhgia`, `soluot_danhgia`, `id_dongsanpham`, `mau_sanpham`) VALUES
(1, 'Bitis Hunter Blue', 'Male', '', '5', '20', '', 'Blue'),
(2, 'Bitis Hunter Orange', 'Female', '', '4', '30', '', 'Orange');

-- --------------------------------------------------------

--
-- Table structure for table `phieu_nhap`
--

CREATE TABLE `phieu_nhap` (
  `id_phieunhap` varchar(10) NOT NULL,
  `id_nhanviennhap` varchar(10) NOT NULL,
  `id_nhacungcap` varchar(10) NOT NULL,
  `ngay_nhap` date NOT NULL,
  `tong_gia_nhap` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `phuongthuc_giaohang`
--

CREATE TABLE `phuongthuc_giaohang` (
  `id_phuongthuc` varchar(10) NOT NULL,
  `ten_phuongthuc` varchar(10) NOT NULL,
  `mota` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `id_quyen` varchar(10) NOT NULL,
  `ten_quyen` varchar(10) NOT NULL,
  `mieuta` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id_sale` int(11) NOT NULL,
  `ten_sale` varchar(100) NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `giam_theo_percent` varchar(10) NOT NULL,
  `giam_theo_vnd` varchar(10) NOT NULL,
  `muc_gia_sale` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id_sale`, `ten_sale`, `ngay_bat_dau`, `ngay_ket_thuc`, `giam_theo_percent`, `giam_theo_vnd`, `muc_gia_sale`) VALUES
(12, 'Sale for Tet', '2021-02-14', '2021-05-30', '30', '500000', ''),
(13, 'Sale for Noel', '2021-02-14', '2021-12-30', '30', '500000', ''),
(14, 'Sale for Anniversity 3th', '2021-08-20', '2021-12-30', '30', '500000', ''),
(15, 'Sale for Anniversity 2nd', '2020-08-20', '2020-12-30', '30', '500000', '');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id_sanpham` varchar(10) NOT NULL,
  `id_nhomsanpham` varchar(10) NOT NULL,
  `size` varchar(10) NOT NULL,
  `gia_sanpham` int(10) NOT NULL,
  `so_luong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id_nguoidung`);

--
-- Indexes for table `nhom_san_pham`
--
ALTER TABLE `nhom_san_pham`
  ADD PRIMARY KEY (`id_nhomsanpham`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id_sale`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id_nguoidung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `nhom_san_pham`
--
ALTER TABLE `nhom_san_pham`
  MODIFY `id_nhomsanpham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id_sale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
