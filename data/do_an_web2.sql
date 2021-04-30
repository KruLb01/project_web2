-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 05:04 AM
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
  `thong_tin_khac` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_nguoidung`, `ho_ten`, `thong_tin_khac`) VALUES
('admin', 'Leos Heros', 'I am alive ! <3'),
('manager', 'Kao Heros', 'F*ck this project :<'),
('admin1', 'Heros', ''),
('admin2', 'Heros', ''),
('admin3', 'Heros', ''),
('admin4', 'Heros', ''),
('admin5', 'Heros', ''),
('admin6', 'Heros', ''),
('admin7', 'Heros', ''),
('admin8', 'Heros', ''),
('admin9', 'Heros', ''),
('admin10', 'Heros', '');

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
  `id_quyen` varchar(20) NOT NULL,
  `id_chucnang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitiet_quyen_chucnang`
--

INSERT INTO `chitiet_quyen_chucnang` (`id_quyen`, `id_chucnang`) VALUES
('admin', '4'),
('admin', '1'),
('admin', '2'),
('admin', '3'),
('admin', '5'),
('admin', '6'),
('admin', '9'),
('admin', '10'),
('admin', '11'),
('admin', '12'),
('admin', '17'),
('manager', '1'),
('manager', '2'),
('manager', '3'),
('manager', '4'),
('manager', '5'),
('manager', '6'),
('manager', '9'),
('manager', '10'),
('manager', '11'),
('manager', '12'),
('manager', '13'),
('manager', '14'),
('manager', '15'),
('manager', '16'),
('manager', '17'),
('manager', '18'),
('manager', '19'),
('admin', '13'),
('admin', '14'),
('admin', '15'),
('admin', '16'),
('admin', '18'),
('admin', '19'),
('travellers', '1'),
('travellers', '2'),
('travellers', '3'),
('travellers', '4'),
('travellers', '5'),
('travellers', '6'),
('travellers', '9'),
('travellers', '10'),
('travellers', '11'),
('travellers', '17'),
('travellers', '16'),
('travellers', '18'),
('travellers', '19'),
('admin', '7'),
('admin', '8'),
('admin', '20'),
('admin', '21');

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
  `id_chucnang` int(100) NOT NULL,
  `ten_chucnang` varchar(100) NOT NULL,
  `mieuta` varchar(100) NOT NULL,
  `vi_tri` varchar(10) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chuc_nang`
--

INSERT INTO `chuc_nang` (`id_chucnang`, `ten_chucnang`, `mieuta`, `vi_tri`, `icon`) VALUES
(1, 'Manage Accounts', '', '1000', '<i class=\"fas fa-users\" style=\"padding-right: 8px;\"></i>'),
(2, 'Manage Customers', '', '1001', ''),
(3, 'Manage Employees', '', '1002', ''),
(4, 'Manage Permission', '', '1003', ''),
(5, 'Analyze User', '', '1004', ''),
(6, 'Manage Store', '', '2000', '<i class=\"fas fa-cubes\" style=\"padding-right: 8px;\"></i>'),
(7, 'Manage Products', '', '2001', ''),
(8, 'Import Products', '', '2002', ''),
(9, 'Manage Revenue', '', '3000', '<i class=\"fas fa-receipt\" style=\"padding-right: 10px;padding-left:4px\"></i>'),
(10, 'Track Invoice', '', '3001', ''),
(11, 'Analyze Profits', '', '3002', ''),
(12, 'Manage Sales', '', '4000', '<i class=\"fas fa-money-bill-alt\" style=\"padding-right: 8px;\"></i>'),
(13, 'Create Sales', '', '4001', ''),
(14, 'Track Sales', '', '4002', ''),
(15, 'Analyze Sales', '', '4003', ''),
(16, 'Activity', '', '5000', '<i class=\"fas fa-chart-line\" style=\"padding-right: 10px;\"></i>'),
(17, 'Mail', '', '6000', '<i class=\"fas fa-mail-bulk\" style=\"padding-right: 8px;\"></i>'),
(18, 'Help', '', '7000', '<i class=\"fas fa-question\"  style=\"padding-right: 14px;\"></i>'),
(19, 'Log out', '', '8000', '<i class=\"fas fa-sign-out-alt\"  style=\"padding-right: 10px;\"></i>'),
(20, 'Manage Import', '', '2003', ''),
(21, 'Manage Provider', '', '2004', '');

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
-- Table structure for table `hinh_anh`
--

CREATE TABLE `hinh_anh` (
  `id_hinhanh` varchar(100) NOT NULL,
  `link_hinhanh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hinh_nhomsanpham`
--

CREATE TABLE `hinh_nhomsanpham` (
  `id_nhomsanpham` varchar(100) NOT NULL,
  `id_hinh` varchar(100) NOT NULL
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
  `thong_tin_khac` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`id_nguoidung`, `ho_ten`, `dia_chi`, `thong_tin_khac`) VALUES
(1, 'Lê Thanh Hòa', 'On the Sunn', ''),
(2, 'David Heros', 'On the Earth', ''),
(3, 'David Heros', 'On the Earth', ''),
(4, 'David Heros', 'On the Earth', ''),
(5, 'David Heros', 'On the Earth', ''),
(6, 'Helen Heros', 'On the March', ''),
(7, 'Helen Heros', 'On the March', ''),
(8, 'Helen Heros', 'On the March', ''),
(9, 'Helen Heros', 'On the March', ''),
(10, 'Helen Heros', 'On the March', ''),
(11, 'Helen Heros', 'On the March', ''),
(12, 'Kali Heros', 'On the Moon', ''),
(13, 'Kali Heros', 'On the Moon', ''),
(14, 'Kali Heros', 'On the Moon', ''),
(15, 'Kali Heros', 'On the Moon', ''),
(16, 'Kali Heros', 'On the Moon', ''),
(17, 'Kali Heros', 'On the Moon', ''),
(18, 'Kali Heros', 'On the Moon', ''),
(19, 'Kali Heros', 'On the Moon', ''),
(20, 'Kali Heros', 'On the Moon', ''),
(21, 'Kali Heros', 'On the Moon', ''),
(22, 'Kali Heros', 'On the Moon', ''),
(23, 'Kali Heros', 'On the Moon', ''),
(24, 'Kali Heros', 'On the Moon', ''),
(25, 'Kali Heros', 'On the Moon', ''),
(26, 'Kali Heros', 'On the Moon', ''),
(27, 'Kali Heros', 'On the Moon', ''),
(28, 'Kali Heros', 'On the Moon', ''),
(29, 'Kali Heros', 'On the Moon', ''),
(30, 'Kali Heros', 'On the Moon', ''),
(31, 'Kali Heros', 'On the Moon', ''),
(32, 'Kali Heros', 'On the Moon', ''),
(33, 'Kali Heros', 'On the Moon', ''),
(34, 'Kali Heros', 'On the Moon', ''),
(35, 'Kali Heros', 'On the Moon', ''),
(36, 'Kali Heros', 'On the Moon', ''),
(37, 'Kali Heros', 'On the Moon', ''),
(38, 'Kali Heros', 'On the Moon', ''),
(39, 'Kali Heros', 'On the Moon', ''),
(40, 'Kali Heros', 'On the Moon', ''),
(41, 'Kali Heros', 'On the Moon', ''),
(42, 'Kali Heros', 'On the Moon', ''),
(43, 'Kali Heros', 'On the Moon', ''),
(44, 'Kali Heros', 'On the Moon', ''),
(45, 'Kali Heros', 'On the Moon', ''),
(46, 'Kali Heros', 'On the Moon', ''),
(47, 'Kali Heros', 'On the Moon', ''),
(48, 'Kali Heros', 'On the Moon', ''),
(49, 'Kali Heros', 'On the Moon', ''),
(50, 'Kali Heros', 'On the Moon', ''),
(51, 'Kali Heros', 'On the Moon', ''),
(53, 'Lê Thanh Hòa', '226/10 Nguyễn Biểu P2 Q5', ''),
(54, 'Lê Thanh Hòa', '226/10 Nguyễn Biểu P2 Q5', '');

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id_nguoidung` varchar(10) NOT NULL,
  `tai_khoan` varchar(100) NOT NULL,
  `mat_khau` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `so_dien_thoai` varchar(10) NOT NULL,
  `quyen` varchar(100) NOT NULL,
  `tinh_trang_taikhoan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id_nguoidung`, `tai_khoan`, `mat_khau`, `email`, `so_dien_thoai`, `quyen`, `tinh_trang_taikhoan`) VALUES
('admin', 'admin', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', '0706316621', 'admin', 1),
('1', 'customer1', '202cb962ac59075b964b07152d234b70', 'thanhhoa6621@gmail.com', '0706316621', 'customer', 1),
('2', 'customer2', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('3', 'customer3', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('4', 'customer4', '1', 'customer@gmail.com', '1234324', 'customer', 0),
('5', 'customer5', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('6', 'customer6', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('7', 'customer7', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('8', 'customer8', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('9', 'customer9', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('10', 'customer10', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('11', 'customer11', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('12', 'customer12', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('13', 'customer13', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('14', 'customer14', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('15', 'customer15', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('16', 'customer16', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('17', 'customer17', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('18', 'customer18', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('19', 'customer19', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('20', 'customer20', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('21', 'customer21', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('22', 'customer22', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('23', 'customer23', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('24', 'customer24', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('25', 'customer25', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('26', 'customer26', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('27', 'customer27', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('28', 'customer28', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('29', 'customer29', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('30', 'customer30', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('31', 'customer31', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('32', 'customer32', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('33', 'customer33', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('34', 'customer34', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('35', 'customer35', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('36', 'customer36', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('37', 'customer37', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('38', 'customer38', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('39', 'customer39', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('40', 'customer40', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('41', 'customer41', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('42', 'customer42', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('43', 'customer43', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('44', 'customer44', '1', 'customer@gmail.com', '1234324', 'customer', 0),
('45', 'customer45', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('46', 'customer46', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('47', 'customer47', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('48', 'customer48', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('49', 'customer49', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('50', 'customer50', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('51', 'customer51', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('52', 'customer52', '1', 'customer@gmail.com', '1234324', 'customer', 1),
('manager', 'manager', '202cb962ac59075b964b07152d234b70', 'manager@gmail.com', '0706316621', 'manager', 1),
('admin1', 'admin1', '202cb962ac59075b964b07152d234b70', 'test@gmail.com', '0123', 'admin', 1),
('admin2', 'admin2', '202cb962ac59075b964b07152d234b70', 'test@gmail.com', '0123', 'admin', 1),
('admin3', 'admin3', '202cb962ac59075b964b07152d234b70', 'test@gmail.com', '0123', 'admin', 1),
('admin4', 'admin4', '202cb962ac59075b964b07152d234b70', 'test@gmail.com', '0123', 'admin', 1),
('admin5', 'admin5', '202cb962ac59075b964b07152d234b70', 'test@gmail.com', '0123', 'admin', 1),
('admin6', 'admin6', '202cb962ac59075b964b07152d234b70', 'test@gmail.com', '0123', 'admin', 1),
('admin7', 'admin7', '202cb962ac59075b964b07152d234b70', 'test@gmail.com', '0123', 'admin', 1),
('admin8', 'admin8', '202cb962ac59075b964b07152d234b70', 'test@gmail.com', '0123', 'admin', 1),
('admin9', 'admin9', '202cb962ac59075b964b07152d234b70', 'test@gmail.com', '0123', 'admin', 1),
('admin10', 'admin10', '202cb962ac59075b964b07152d234b70', 'test@gmail.com', '0123', 'admin', 1),
('53', 'customer53', '202cb962ac59075b964b07152d234b70', 'thanhhoa6621@gmail.com', '0706316621', 'customer', 1),
('54', 'customer54', '202cb962ac59075b964b07152d234b70', 'thanhhoa6621@gmail.com', '0706316621', 'customer', 0);

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
(1, 'Bitis Hunter Blue', 'Male', 'In stock', '5', '20', '', 'Blue'),
(2, 'Bitis Hunter Orange', 'Female', '', '4', '30', '', 'Orange'),
(3, 'Bitis Hunter Neon', 'Male', 'In stock', '5', '50', '', 'Neon'),
(4, 'Bitis Hunter No.4', 'Male', '123', '5', '50', '', 'Red'),
(5, 'Bitis Hunter No.test', 'Male', '', '5', '50', '', 'Gray'),
(6, 'Bitis Hunter No.6', 'Female', 'Sold Out', '5', '50', '', 'Green'),
(7, 'Bitis Hunter No.test', 'Male', '', '5', '50', '', 'Gray'),
(8, 'Bitis Hunter No.8', 'Female', 'Sold out', '5', '50', '', 'HoloGram'),
(9, 'Bitis Hunter No.test', 'Male', '', '5', '50', '', 'Gray'),
(10, 'Bitis Hunter No.test', 'Female', '', '5', '50', '', 'Gray'),
(11, 'Bitis Hunter No.test', 'Male', '', '5', '50', '', 'Gray'),
(12, 'Bitis Hunter No.test', 'Male', '', '5', '50', '', 'Gray');

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
  `id_quyen` varchar(100) NOT NULL,
  `ten_quyen` varchar(100) NOT NULL,
  `mieuta` varchar(100) NOT NULL,
  `so_luong` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`id_quyen`, `ten_quyen`, `mieuta`, `so_luong`) VALUES
('admin', 'Quyền quản trị', 'Quyền dành cho quản trị viên', 1),
('customer', 'Permission', 'For customers', 52),
('manager', 'Quyền quản lý', 'Quyền dành cho quản lý', 0),
('employee', 'Quyền nhân viên', 'Quyền dành cho nhân viên', 0),
('test1', 'test1', '', 0),
('test6', 'test6', '', 0),
('test7', 'test7', '', 0),
('test9', 'test9', '', 0),
('test10', 'test10', '', 0),
('test11', 'test11', '', 0),
('eqwf', 'sd', '123', 0),
('eqwf', 'sd', '1232', 0),
('travellers', 'Permission of travellers', 'Permission for travellers', 0);

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
-- Indexes for table `chuc_nang`
--
ALTER TABLE `chuc_nang`
  ADD PRIMARY KEY (`id_chucnang`);

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
-- AUTO_INCREMENT for table `chuc_nang`
--
ALTER TABLE `chuc_nang`
  MODIFY `id_chucnang` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id_nguoidung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `nhom_san_pham`
--
ALTER TABLE `nhom_san_pham`
  MODIFY `id_nhomsanpham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id_sale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;