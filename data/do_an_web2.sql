-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2021 at 11:22 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

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
  `id_nguoidung` varchar(10) NOT NULL,
  `ho_ten` varchar(10) NOT NULL,
  `email` varchar(10) NOT NULL,
  `thong_tin_khac` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_khachhang` varchar(10) NOT NULL,
  `id_nguoidung` varchar(10) NOT NULL,
  `ho_ten` varchar(10) NOT NULL,
  `dia_chi` varchar(10) NOT NULL,
  `so_dien_thoai` int(10) NOT NULL,
  `thong_tin_khac` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id_nguoidung` varchar(10) NOT NULL,
  `tai_khoan` varchar(10) NOT NULL,
  `mat_khau` varchar(10) NOT NULL,
  `email` varchar(10) NOT NULL,
  `quyen` varchar(10) NOT NULL,
  `tinh_trang_taikhoan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_nhomsanpham` varchar(10) NOT NULL,
  `ten_nhomsanpham` varchar(10) NOT NULL,
  `gioi_tinh` varchar(10) NOT NULL,
  `mieuta` varchar(10) NOT NULL,
  `sosao_danhgia` int(10) NOT NULL,
  `soluot_danhgia` int(10) NOT NULL,
  `id_dongsanpham` varchar(10) NOT NULL,
  `mau_sanpham` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_sale` varchar(10) NOT NULL,
  `ten_sale` varchar(10) NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `giam_theo_percent` int(10) NOT NULL,
  `giam_theo_vnd` int(10) NOT NULL,
  `muc_gia_sale` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
