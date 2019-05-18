-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 18, 2019 lúc 03:46 PM
-- Phiên bản máy phục vụ: 10.1.39-MariaDB
-- Phiên bản PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bkelectronic`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_taikhoan` int(10) UNSIGNED NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `id_taikhoan`, `ho_ten`, `gioi_tinh`, `so_dien_thoai`, `email`, `dia_chi`, `image`, `trang_thai`) VALUES
(1, 1, 'Dương Minh Quang', 'Nam', '0377106571', 'duongminhquang98@gmail.com', 'Bắc Giang', NULL, 1),
(2, 2, 'Trần Văn Viên', 'Nam', '0377106557', 'tranvien98@gmail.com', 'Bắc Giang', NULL, 1),
(3, 55, 'Nguyễn Văn Văn', 'Nam', '0377106557', 'tranvan98@gmail.com', 'Bắc Giang', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_diem`
--

CREATE TABLE `bang_diem` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_danh_sach_bd` int(10) UNSIGNED NOT NULL,
  `id_giaovien` int(10) UNSIGNED NOT NULL,
  `id_mon` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bang_diem`
--

INSERT INTO `bang_diem` (`id`, `id_danh_sach_bd`, `id_giaovien`, `id_mon`) VALUES
(1, 1, 5, 1),
(2, 1, 6, 2),
(3, 1, 7, 3),
(4, 1, 8, 4),
(5, 1, 9, 5),
(6, 1, 10, 6),
(7, 1, 11, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_diemc1`
--

CREATE TABLE `bang_diemc1` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_hocsinh` int(10) UNSIGNED NOT NULL,
  `id_giaovien` int(10) UNSIGNED NOT NULL,
  `id_mon` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bang_diemc1`
--

INSERT INTO `bang_diemc1` (`id`, `id_hocsinh`, `id_giaovien`, `id_mon`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 14, NULL, NULL),
(2, 7, 12, 1, NULL, NULL),
(3, 7, 13, 9, NULL, NULL),
(4, 7, 14, 12, NULL, NULL),
(5, 7, 15, 13, NULL, NULL),
(6, 7, 16, 15, NULL, NULL),
(7, 7, 17, 16, NULL, NULL),
(8, 7, 18, 17, NULL, NULL),
(9, 7, 19, 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_tong_ket`
--

CREATE TABLE `bang_tong_ket` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_hocsinh` int(10) UNSIGNED DEFAULT NULL,
  `hoc_luc` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diem_phay_cuoi` double DEFAULT NULL,
  `hanh_kiem` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nhan_xet` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bang_tong_ket`
--

INSERT INTO `bang_tong_ket` (`id`, `id_hocsinh`, `hoc_luc`, `diem_phay_cuoi`, `hanh_kiem`, `nhan_xet`) VALUES
(1, 25, 'Giỏi', 8.6, 'Tốt', 'Tính toán còn chậm, còn nhiều sai sót. Cần rèn nhiều về nhân, chia, giải toán có lời văn.Hoàn thành tốt nội dung môn học.'),
(2, 21, NULL, NULL, NULL, NULL),
(3, 22, NULL, NULL, NULL, NULL),
(4, 23, NULL, NULL, NULL, NULL),
(5, 24, NULL, NULL, NULL, NULL),
(6, 26, NULL, NULL, NULL, NULL),
(7, 27, NULL, NULL, NULL, NULL),
(8, 28, NULL, NULL, NULL, NULL),
(9, 29, NULL, NULL, NULL, NULL),
(10, 30, NULL, NULL, NULL, NULL),
(11, 31, NULL, NULL, NULL, NULL),
(12, 32, NULL, NULL, NULL, NULL),
(13, 33, NULL, NULL, NULL, NULL),
(14, 34, NULL, NULL, NULL, NULL),
(15, 35, NULL, NULL, NULL, NULL),
(16, 36, NULL, NULL, NULL, NULL),
(17, 37, NULL, NULL, NULL, NULL),
(18, 38, NULL, NULL, NULL, NULL),
(19, 39, NULL, NULL, NULL, NULL),
(20, 40, NULL, NULL, NULL, NULL),
(21, 41, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cuoi_ki_c1`
--

CREATE TABLE `cuoi_ki_c1` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bangdiemc1` int(10) UNSIGNED NOT NULL,
  `muc_do` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diem` int(10) UNSIGNED DEFAULT NULL,
  `nhan_xet` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cuoi_ki_c1`
--

INSERT INTO `cuoi_ki_c1` (`id`, `id_bangdiemc1`, `muc_do`, `diem`, `nhan_xet`) VALUES
(1, 1, 'H', 8, 'Nắm được kiến thức, kỹ năng cơ bản của môn học'),
(2, 2, 'H', 7, 'Hiểu bài và hoàn thành tốt các bài học.'),
(3, 6, 'T', 9, 'Nắm được kiến thức, kỹ năng cơ bản của môn học'),
(4, 3, 'H', NULL, 'Nắm được kiến thức, kỹ năng cơ bản của môn học'),
(5, 4, 'H', NULL, 'Nắm được kiến thức, kỹ năng cơ bản của môn học'),
(6, 5, 'H', NULL, 'Nắm được kiến thức, kỹ năng cơ bản của môn học'),
(7, 7, 'H', NULL, 'Nắm được kiến thức, kỹ năng cơ bản của môn học'),
(8, 8, 'H', NULL, 'Nắm được kiến thức, kỹ năng cơ bản của môn học'),
(9, 9, 'H', NULL, 'Nắm được kiến thức, kỹ năng cơ bản của môn học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_sach_bd`
--

CREATE TABLE `danh_sach_bd` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_tongket` int(10) UNSIGNED NOT NULL,
  `id_hocki` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_sach_bd`
--

INSERT INTO `danh_sach_bd` (`id`, `id_tongket`, `id_hocki`) VALUES
(1, 1, 17),
(2, 2, 17),
(3, 3, 17),
(4, 4, 17),
(5, 5, 17),
(6, 6, 17),
(7, 7, 17),
(8, 8, 17),
(9, 9, 17),
(10, 10, 17),
(11, 11, 17),
(12, 12, 17),
(13, 13, 17),
(14, 14, 17),
(15, 15, 17),
(16, 16, 17),
(17, 17, 17),
(18, 18, 17),
(19, 19, 17),
(20, 20, 17),
(21, 21, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_sach_gv`
--

CREATE TABLE `danh_sach_gv` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_truong` int(10) UNSIGNED NOT NULL,
  `id_hocki` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_sach_gv`
--

INSERT INTO `danh_sach_gv` (`id`, `id_truong`, `id_hocki`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 2, 1),
(19, 2, 2),
(20, 2, 3),
(21, 2, 4),
(22, 2, 5),
(23, 2, 6),
(24, 2, 7),
(25, 2, 8),
(26, 2, 9),
(27, 2, 10),
(28, 2, 11),
(29, 2, 12),
(30, 2, 13),
(31, 2, 14),
(32, 2, 15),
(33, 2, 16),
(34, 2, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_sach_hs`
--

CREATE TABLE `danh_sach_hs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_giaovien` int(10) UNSIGNED DEFAULT NULL,
  `id_lop` int(10) UNSIGNED NOT NULL,
  `id_hocki` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_sach_hs`
--

INSERT INTO `danh_sach_hs` (`id`, `id_giaovien`, `id_lop`, `id_hocki`) VALUES
(1, 1, 17, 13),
(2, 2, 17, 14),
(3, 3, 21, 15),
(4, 4, 21, 16),
(5, 5, 25, 17),
(6, 6, 26, 17),
(7, 7, 27, 17),
(8, 8, 28, 17),
(9, 9, 29, 17),
(10, 10, 30, 17),
(11, 11, 31, 17),
(12, 20, 17, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem_phay`
--

CREATE TABLE `diem_phay` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bangdiem` int(10) UNSIGNED NOT NULL,
  `diem` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diem_phay`
--

INSERT INTO `diem_phay` (`id`, `id_bangdiem`, `diem`) VALUES
(1, 1, 8.6),
(2, 2, 8.6),
(3, 3, 8.6),
(4, 4, 8.6),
(5, 5, 8.6),
(6, 6, 8.6),
(7, 7, 8.6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giao_vien`
--

CREATE TABLE `giao_vien` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_danh_sach_gv` int(10) UNSIGNED NOT NULL,
  `id_mon` int(10) UNSIGNED DEFAULT NULL,
  `id_taikhoan` int(10) UNSIGNED NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_sinh` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chuc_vu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giao_vien`
--

INSERT INTO `giao_vien` (`id`, `id_danh_sach_gv`, `id_mon`, `id_taikhoan`, `ho_ten`, `gioi_tinh`, `so_dien_thoai`, `email`, `ngay_sinh`, `dia_chi`, `chuc_vu`, `image`) VALUES
(1, 13, 1, 4, 'Le Van A', 'Nam', '0377106557', 'wYZQWBf8XP@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', 'Truong bo mon', NULL),
(2, 14, 14, 4, 'Le Van B', 'Nam', '0377106557', 'Xxu9cGwoSP@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(3, 32, 2, 10, 'Trần Thị Bính', 'Nữ', '0377106557', 'r4Qcvk4Wjs@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(4, 33, 4, 10, 'Trần Thị Bị', 'Nữ', '0377106557', 'Qkrdh93PH9@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(5, 34, 1, 11, 'Dung Van C', 'Nam', '0377106557', 'vux4cO1s7S@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(6, 34, 2, 20, 'Dung Van D', 'Nam', '0377106557', 'BEdr9QAoYO@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(7, 34, 3, 21, 'Dung Van E', 'Nam', '0377106557', 'h9HRxjenCL@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(8, 34, 4, 22, 'Dung Van F', 'Nam', '0377106557', '3So6sZ01kq@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(9, 34, 5, 23, 'Dung Van G', 'Nam', '0377106557', 'kphFT3lZaj@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(10, 34, 6, 24, 'Dung Van H', 'Nam', '0377106557', '1kIvTYdOjH@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(11, 34, 7, 25, 'Dung Van I', 'Nam', '0377106557', 'Q0Q8qoUR0F@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(12, 14, 1, 4, 'Le Van B', 'Nam', '0377106557', 'f6Fkq8Y74b@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(13, 14, 9, 28, 'Le Van B', 'Nam', '0377106557', 'OghLAx26lU@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(14, 14, 12, 29, 'Le Van D', 'Nam', '0377106557', 'XCY0zBwmQf@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(15, 14, 13, 27, 'Le Van E', 'Nam', '0377106557', '7E9KHfQ9kF@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(16, 14, 15, 27, 'Le Van E', 'Nam', '0377106557', 'AXXs4B5Gnn@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(17, 14, 16, 31, 'Tran Thu T', 'Nam', '0377106557', 'KSlNV12f7e@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(18, 14, 17, 28, 'Le Van B', 'Nam', '0377106557', 'hVzwoJEIrz@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(19, 14, 18, 30, 'Le Mai Y', 'Nữ', '0377106557', 'JdwO4oTynN@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(20, 17, 1, 41, 'Trần Hữu Nghĩa', 'Nam', '0377106557', 'TvXafK8mjj@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(21, 17, 14, 41, 'Trần Hữu Nghĩa', 'Nam', '0377106557', '5IbdCeVoNz@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(22, 17, 11, 41, 'Trần Hữu Nghĩa', 'Nam', '0377106557', 'FyQbyMvfM1@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(23, 17, 15, 41, 'Trần Hữu Nghĩa', 'Nam', '0377106557', '4hk3x7pd9S@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(24, 17, 17, 41, 'Trần Hữu Nghĩa', 'Nam', '0377106557', 'ADtyyD6Mn3@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(25, 17, 18, 41, 'Trần Hữu Nghĩa', 'Nam', '0377106557', 'cjEc0kX3b8@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(26, 17, 16, 31, 'Tran Thu Thuy', 'Nam', '0377106557', 'lXnuy1CUYH@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(27, 17, 3, 27, 'Le Van E', 'Nam', '0377106557', 'KRsqEHz72r@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(28, 34, 1, 50, 'Hoàng Văn  AA', 'Nam', '0377106557', 'KaKjIcwpi9@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(29, 34, 2, 51, 'Hoàng Văn  BB', 'Nam', '0377106557', 'RLE8wh46ST@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(30, 34, 2, 52, 'Hoàng Văn  CC', 'Nam', '0377106557', 'ywJAz7w18l@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(31, 34, 4, 53, 'Hoàng Văn  DD', 'Nam', '0377106557', 'hrpkLfXSHH@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL),
(32, 34, 5, 54, 'Hoàng Văn  EE', 'Nam', '0377106557', 'VCSMOhUrzF@gmail.com', '01/02/1988', 'Hai ba trung,Ha Noi', '', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giua_ki_c1`
--

CREATE TABLE `giua_ki_c1` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bangdiemc1` int(10) UNSIGNED NOT NULL,
  `muc_do` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diem` int(10) UNSIGNED DEFAULT NULL,
  `nhan_xet` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giua_ki_c1`
--

INSERT INTO `giua_ki_c1` (`id`, `id_bangdiemc1`, `muc_do`, `diem`, `nhan_xet`) VALUES
(1, 1, 'H', NULL, 'Bài viết còn mắc nhiều lỗi, cần rèn luyện nhiều hơn.'),
(2, 2, 'H', NULL, 'Hiểu bài và hoàn thành tốt các bài học .'),
(3, 3, 'H', NULL, 'Nắm được kiến thức, kỹ năng cơ bản của môn học'),
(4, 4, 'H', NULL, 'Nắm được kiến thức, kỹ năng cơ bản của môn học'),
(5, 5, 'H', NULL, 'Nắm được kiến thức, kỹ năng cơ bản của môn học'),
(6, 6, 'T', NULL, 'Nắm được kiến thức, kỹ năng cơ bản của môn học'),
(7, 7, 'H', NULL, 'Nắm được kiến thức, kỹ năng cơ bản của môn học'),
(8, 8, 'H', NULL, 'Nắm được kiến thức, kỹ năng cơ bản của môn học'),
(9, 9, 'H', NULL, 'Nắm được kiến thức, kỹ năng cơ bản của môn học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `he_so1`
--

CREATE TABLE `he_so1` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bangdiem` int(10) UNSIGNED NOT NULL,
  `diem` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `he_so1`
--

INSERT INTO `he_so1` (`id`, `id_bangdiem`, `diem`) VALUES
(1, 1, 9),
(2, 1, 8),
(3, 1, 7),
(4, 2, 9),
(5, 2, 8),
(6, 2, 7),
(7, 3, 9),
(8, 3, 8),
(9, 3, 7),
(10, 4, 9),
(11, 4, 8),
(12, 4, 7),
(13, 5, 9),
(14, 5, 8),
(15, 5, 7),
(16, 6, 9),
(17, 6, 8),
(18, 6, 7),
(19, 7, 9),
(20, 7, 8),
(21, 7, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `he_so2`
--

CREATE TABLE `he_so2` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bangdiem` int(10) UNSIGNED NOT NULL,
  `diem` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `he_so2`
--

INSERT INTO `he_so2` (`id`, `id_bangdiem`, `diem`) VALUES
(1, 1, 9),
(2, 1, 8.5),
(3, 2, 9),
(4, 2, 8.5),
(5, 3, 9),
(6, 3, 8.5),
(7, 4, 9),
(8, 4, 8.5),
(9, 5, 9),
(10, 5, 8.5),
(11, 6, 9),
(12, 6, 8.5),
(13, 7, 9),
(14, 7, 8.5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `he_so3`
--

CREATE TABLE `he_so3` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bangdiem` int(10) UNSIGNED NOT NULL,
  `diem` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `he_so3`
--

INSERT INTO `he_so3` (`id`, `id_bangdiem`, `diem`) VALUES
(1, 1, 9),
(2, 2, 9),
(3, 3, 9),
(4, 4, 9),
(5, 5, 9),
(6, 6, 9),
(7, 7, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoc_ki`
--

CREATE TABLE `hoc_ki` (
  `id` int(10) UNSIGNED NOT NULL,
  `hoc_ki` int(11) NOT NULL,
  `id_namhoc` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoc_ki`
--

INSERT INTO `hoc_ki` (`id`, `hoc_ki`, `id_namhoc`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 2, 2),
(5, 1, 3),
(6, 2, 3),
(7, 1, 4),
(8, 2, 4),
(9, 1, 5),
(10, 2, 5),
(11, 1, 6),
(12, 2, 6),
(13, 1, 7),
(14, 2, 7),
(15, 1, 8),
(16, 2, 8),
(17, 1, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoc_sinh`
--

CREATE TABLE `hoc_sinh` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_danh_sach_hs` int(10) UNSIGNED NOT NULL,
  `id_taikhoan` int(10) UNSIGNED NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_sinh` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoc_sinh`
--

INSERT INTO `hoc_sinh` (`id`, `id_danh_sach_hs`, `id_taikhoan`, `ho_ten`, `gioi_tinh`, `ngay_sinh`, `dia_chi`, `image`) VALUES
(1, 1, 8, 'Trần Văn C', 'Nam', '10/08/2006', 'Hai ba trung,Ha Noi', NULL),
(2, 1, 9, 'Dương Thị Tính', 'Nữ', '10/08/2006', 'Hai ba trung,Ha Noi', NULL),
(3, 1, 5, 'Dương Ngọc Tú', 'Nam', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(4, 1, 12, 'Trần Thị Tú', 'Nữ', '12/08/2006', 'Hai ba trung,Ha Noi', NULL),
(5, 1, 13, 'Trần Thị Thanh', 'Nữ', '12/08/2006', 'Hai ba trung,Ha Noi', NULL),
(6, 2, 8, 'Trần Văn C', 'Nam', '10/08/2006', 'Hai ba trung,Ha Noi', NULL),
(7, 2, 5, 'Dương Ngọc Tú', 'Nam', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(8, 2, 9, 'Dương Thị Tính', 'Nữ', '10/08/2006', 'Hai ba trung,Ha Noi', NULL),
(9, 2, 12, 'Trần Thị Tú', 'Nữ', '12/08/2006', 'Hai ba trung,Ha Noi', NULL),
(10, 2, 13, 'Trần Thị Thanh', 'Nữ', '12/08/2006', 'Hai ba trung,Ha Noi', NULL),
(11, 3, 6, 'Trần Văn A', 'Nam', '10/08/2006', 'Hai ba trung,Ha Noi', NULL),
(12, 3, 7, 'Trần Văn B', 'Nam', '10/08/2006', 'Hai ba trung,Ha Noi', NULL),
(13, 3, 8, 'Trần Văn C', 'Nam', '10/08/2006', 'Hai ba trung,Ha Noi', NULL),
(14, 3, 14, 'Trần Văn Thành', 'Nam', '10/08/2006', 'Hai ba trung,Ha Noi', NULL),
(15, 3, 5, 'Dương Ngọc Tú', 'Nam', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(16, 4, 6, 'Trần Văn A', 'Nam', '10/08/2006', 'Hai ba trung,Ha Noi', NULL),
(17, 4, 7, 'Trần Văn B', 'Nam', '10/08/2006', 'Hai ba trung,Ha Noi', NULL),
(18, 4, 8, 'Trần Văn C', 'Nam', '10/08/2006', 'Hai ba trung,Ha Noi', NULL),
(19, 4, 5, 'Dương Ngọc Tú', 'Nam', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(20, 4, 14, 'Trần Văn Thành', 'Nam', '10/08/2006', 'Hai ba trung,Ha Noi', NULL),
(21, 5, 6, 'Trần Thị A', 'Nữ', '12/05/2006', 'Hai ba trung,Ha Noi', NULL),
(22, 5, 7, 'Trần Văn B', 'Nam', '04/12/2006', 'Hai ba trung,Ha Noi', NULL),
(23, 5, 8, 'Trần Văn C', 'Nam', '10/08/2006', 'Hai ba trung,Ha Noi', NULL),
(24, 5, 15, 'Trần Văn D', 'Nam', '10/08/2006', 'Hai ba trung,Ha Noi', NULL),
(25, 5, 5, 'Dương Ngọc Tú', 'Nam', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(26, 6, 33, 'Dương Van AA', 'Nam', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(27, 6, 34, 'Dương Van BB', 'Nam', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(28, 6, 35, 'Dương Van CC', 'Nam', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(29, 6, 36, 'Dương Van DD', 'Nam', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(30, 6, 37, 'Dương Van EE', 'Nam', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(31, 6, 38, 'Dương Van FF', 'Nam', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(32, 6, 39, 'Dương Van GG', 'Nam', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(33, 6, 40, 'Dương Van HH', 'Nam', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(34, 12, 42, 'Trần Thị AB', 'Nữ', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(35, 12, 43, 'Trần Thị BC', 'Nữ', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(36, 12, 44, 'Trần Thị CD', 'Nữ', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(37, 12, 45, 'Trần Thị DE', 'Nữ', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(38, 12, 46, 'Trần Thị EG', 'Nữ', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(39, 12, 47, 'Trần Thị GH', 'Nữ', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(40, 12, 48, 'Trần Thị HI', 'Nữ', '15/04/2006', 'Hai ba trung,Ha Noi', NULL),
(41, 12, 49, 'Trần Thị IK', 'Nữ', '15/04/2006', 'Hai ba trung,Ha Noi', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop_day`
--

CREATE TABLE `lop_day` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_giaovien` int(10) UNSIGNED NOT NULL,
  `id_lop` int(10) UNSIGNED NOT NULL,
  `id_hocki` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop_day`
--

INSERT INTO `lop_day` (`id`, `id_giaovien`, `id_lop`, `id_hocki`, `created_at`, `updated_at`) VALUES
(1, 6, 25, 17, NULL, NULL),
(2, 6, 26, 17, NULL, NULL),
(3, 6, 29, 17, NULL, NULL),
(4, 6, 31, 17, NULL, NULL),
(5, 6, 32, 17, NULL, NULL),
(6, 20, 17, 17, NULL, NULL),
(7, 21, 17, 17, NULL, NULL),
(8, 21, 17, 17, NULL, NULL),
(9, 23, 17, 17, NULL, NULL),
(10, 24, 17, 17, NULL, NULL),
(11, 25, 17, 17, NULL, NULL),
(12, 26, 17, 17, NULL, NULL),
(13, 27, 17, 17, NULL, NULL),
(14, 2, 17, 14, NULL, NULL),
(15, 12, 17, 14, NULL, NULL),
(16, 13, 17, 14, NULL, NULL),
(17, 14, 17, 14, NULL, NULL),
(18, 15, 17, 14, NULL, NULL),
(19, 16, 17, 14, NULL, NULL),
(20, 17, 17, 14, NULL, NULL),
(21, 18, 17, 14, NULL, NULL),
(22, 5, 25, 17, NULL, NULL),
(23, 7, 25, 17, NULL, NULL),
(24, 8, 25, 17, NULL, NULL),
(25, 9, 25, 17, NULL, NULL),
(26, 10, 25, 17, NULL, NULL),
(27, 11, 25, 17, NULL, NULL),
(28, 28, 26, 17, NULL, NULL),
(29, 29, 26, 17, NULL, NULL),
(30, 30, 26, 17, NULL, NULL),
(31, 31, 26, 17, NULL, NULL),
(32, 32, 26, 17, NULL, NULL),
(33, 10, 26, 17, NULL, NULL),
(34, 11, 26, 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop_hoc`
--

CREATE TABLE `lop_hoc` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_truong` int(10) UNSIGNED NOT NULL,
  `ten_lop` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop_hoc`
--

INSERT INTO `lop_hoc` (`id`, `id_truong`, `ten_lop`) VALUES
(1, 1, '1A'),
(2, 1, '1B'),
(3, 1, '1C'),
(4, 1, '1D'),
(5, 1, '2A'),
(6, 1, '2B'),
(7, 1, '2C'),
(8, 1, '2D'),
(9, 1, '3A'),
(10, 1, '3B'),
(11, 1, '3C'),
(12, 1, '3D'),
(13, 1, '4A'),
(14, 1, '4B'),
(15, 1, '4C'),
(16, 1, '4D'),
(17, 1, '5A'),
(18, 1, '5B'),
(19, 1, '5C'),
(20, 1, '5D'),
(21, 2, '6A'),
(22, 2, '6B'),
(23, 2, '6C'),
(24, 2, '6D'),
(25, 2, '7A'),
(26, 2, '7B'),
(27, 2, '7C'),
(28, 2, '7D'),
(29, 2, '8A'),
(30, 2, '8B'),
(31, 2, '8C'),
(32, 2, '8D'),
(33, 2, '9A'),
(34, 2, '9B'),
(35, 2, '9C'),
(36, 2, '9D'),
(37, 3, '10A'),
(38, 3, '10B'),
(39, 3, '10C'),
(40, 3, '10D'),
(41, 3, '11A'),
(42, 3, '11B'),
(43, 3, '11C'),
(44, 3, '11D'),
(45, 3, '12A'),
(46, 3, '12B'),
(47, 3, '12C'),
(48, 3, '12D');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_04_000000_create_nam_hoc_table', 1),
(4, '2019_05_04_000001_create_truong_table', 1),
(5, '2019_05_04_000002_create_mon_hoc_table', 1),
(6, '2019_05_04_000005_create_van_thu_table', 1),
(7, '2019_05_04_000006_create_hoc_ki_table', 1),
(8, '2019_05_04_000007_create_lop_hoc_table', 1),
(9, '2019_05_04_000008_create_thong_bao_table', 1),
(10, '2019_05_04_000009_create_danh_sach_gv_table', 1),
(11, '2019_05_04_000010_create_giao_vien_table', 1),
(12, '2019_05_04_000011_create_danh_sach_hs_table', 1),
(13, '2019_05_04_000012_create_hoc_sinh_table', 1),
(14, '2019_05_04_000013_create_bang_tong_ket_table', 1),
(15, '2019_05_04_000014_create_danh_sach_bd_table', 1),
(16, '2019_05_04_000015_create_bang_diem_table', 1),
(17, '2019_05_04_000016_create_diem_phay_table', 1),
(18, '2019_05_04_000017_create_he_so1_table', 1),
(19, '2019_05_04_000018_create_he_so2_table', 1),
(20, '2019_05_04_000019_create_he_so3_table', 1),
(21, '2019_05_06_142943_create_bang_diemc1', 1),
(22, '2019_05_06_143147_create_giua_ki_c1', 1),
(23, '2019_05_06_143213_create_cuoi_ki_c1', 1),
(24, '2019_05_06_143238_create_nang_luc', 1),
(25, '2019_05_06_143311_create_pham_chat', 1),
(26, '2019_05_07_070451_create_thu_bao', 1),
(27, '2019_05_09_024835_create_lop_day', 1),
(28, '2019_05_17_160652_create_admin', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon_hoc`
--

CREATE TABLE `mon_hoc` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_mon` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mon_hoc`
--

INSERT INTO `mon_hoc` (`id`, `ten_mon`) VALUES
(1, 'Toán'),
(2, 'Văn'),
(3, 'Tiếng Anh'),
(4, 'Vật Lý'),
(5, 'Hóa Học'),
(6, 'Sinh Học'),
(7, 'Lịch Sử'),
(8, 'Địa Lý'),
(9, 'Thể Dục'),
(10, 'Giáo Dục Công Dân'),
(11, 'Công Nghệ'),
(12, 'Mỹ Thuật'),
(13, 'Âm Nhạc'),
(14, 'Tiếng việt'),
(15, 'TNXH'),
(16, 'Tin học'),
(17, 'Đạo đức'),
(18, 'Thủ công');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nam_hoc`
--

CREATE TABLE `nam_hoc` (
  `id` int(10) UNSIGNED NOT NULL,
  `nam_hoc` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nam_hoc`
--

INSERT INTO `nam_hoc` (`id`, `nam_hoc`) VALUES
(1, '2012-2013'),
(2, '2013-2014'),
(3, '2014-2015'),
(4, '2014-2015'),
(5, '2015-2016'),
(6, '2016-2017'),
(7, '2017-2018'),
(8, '2018-2019'),
(9, '2019-2020');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nang_luc`
--

CREATE TABLE `nang_luc` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_hocsinh` int(10) UNSIGNED NOT NULL,
  `id_giaovien` int(10) UNSIGNED NOT NULL,
  `muc_do1` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `muc_do2` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `muc_do3` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nhan_xet` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nang_luc`
--

INSERT INTO `nang_luc` (`id`, `id_hocsinh`, `id_giaovien`, `muc_do1`, `muc_do2`, `muc_do3`, `nhan_xet`) VALUES
(1, 7, 2, 'Đ', 'Đ', 'Đ', 'Khả năng tự học cần có sự giúp đỡ của người khác.'),
(2, 7, 12, 'Đ', 'Đ', 'Đ', 'Khả năng tự học cần có sự giúp đỡ của người khác.'),
(3, 7, 13, 'Đ', 'Đ', 'Đ', 'Khả năng tự học cần có sự giúp đỡ của người khác.'),
(4, 7, 14, 'Đ', 'Đ', 'Đ', 'Khả năng tự học cần có sự giúp đỡ của người khác.'),
(5, 7, 15, 'Đ', 'Đ', 'Đ', 'Khả năng tự học cần có sự giúp đỡ của người khác.'),
(6, 7, 16, 'Đ', 'Đ', 'Đ', 'Khả năng tự học cần có sự giúp đỡ của người khác.'),
(7, 7, 17, 'Đ', 'Đ', 'Đ', 'Khả năng tự học cần có sự giúp đỡ của người khác.'),
(8, 7, 18, 'Đ', 'Đ', 'Đ', 'Khả năng tự học cần có sự giúp đỡ của người khác.'),
(9, 7, 19, 'Đ', 'Đ', 'Đ', 'Khả năng tự học cần có sự giúp đỡ của người khác.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pham_chat`
--

CREATE TABLE `pham_chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_hocsinh` int(10) UNSIGNED NOT NULL,
  `id_giaovien` int(10) UNSIGNED NOT NULL,
  `muc_do1` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `muc_do2` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `muc_do3` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `muc_do4` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nhan_xet` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pham_chat`
--

INSERT INTO `pham_chat` (`id`, `id_hocsinh`, `id_giaovien`, `muc_do1`, `muc_do2`, `muc_do3`, `muc_do4`, `nhan_xet`) VALUES
(1, 7, 2, 'Đ', 'Đ', 'Đ', 'Đ', 'Chưa có ý thức tự giác trong học tập.'),
(2, 7, 12, 'Đ', 'Đ', 'Đ', 'Đ', 'Chưa có ý thức tự giác trong học tập.'),
(3, 7, 13, 'Đ', 'Đ', 'Đ', 'Đ', 'Chưa có ý thức tự giác trong học tập.'),
(4, 7, 14, 'Đ', 'Đ', 'Đ', 'Đ', 'Chưa có ý thức tự giác trong học tập.'),
(5, 7, 15, 'Đ', 'Đ', 'Đ', 'Đ', 'Chưa có ý thức tự giác trong học tập.'),
(6, 7, 16, 'Đ', 'Đ', 'Đ', 'Đ', 'Chưa có ý thức tự giác trong học tập.'),
(7, 7, 17, 'Đ', 'Đ', 'Đ', 'Đ', 'Chưa có ý thức tự giác trong học tập.'),
(8, 7, 18, 'Đ', 'Đ', 'Đ', 'Đ', 'Chưa có ý thức tự giác trong học tập.'),
(9, 7, 19, 'Đ', 'Đ', 'Đ', 'Đ', 'Chưa có ý thức tự giác trong học tập.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_bao`
--

CREATE TABLE `thong_bao` (
  `id` int(10) UNSIGNED NOT NULL,
  `tieu_de` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tom_tat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_vanthu` int(10) UNSIGNED NOT NULL,
  `id_truong` int(10) UNSIGNED NOT NULL,
  `so_luot_xem` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_bao`
--

INSERT INTO `thong_bao` (`id`, `tieu_de`, `tom_tat`, `noi_dung`, `image`, `id_vanthu`, `id_truong`, `so_luot_xem`, `created_at`, `updated_at`) VALUES
(1, 'Lịch thi học kỳ 2018-2019', 'Thông báo lịch thi cuối 2 năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, 0, NULL, NULL),
(2, 'Lịch thi học kỳ 2018-2019', 'Thông báo lịch thi cuối 2 năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 3, 2, 0, NULL, NULL),
(3, 'Lịch thi học kỳ 2018-2019', 'Thông báo lịch thi cuối 2 năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, 0, NULL, NULL),
(4, 'Lịch thi học kỳ 2018-2019', 'Thông báo lịch thi cuối 2 năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, 0, NULL, NULL),
(5, 'Lịch thi học kỳ 2018-2019', 'Thông báo lịch thi cuối 2 năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 3, 2, 0, NULL, NULL),
(6, 'Lịch thi học kỳ 2018-2019', 'Thông báo lịch thi cuối 2 năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, 0, NULL, NULL),
(7, 'Lịch thi học kỳ 2018-2019', 'Thông báo lịch thi cuối 2 năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 3, 2, 0, NULL, NULL),
(8, 'Lịch thi học kỳ 2018-2019', 'Thông báo lịch thi cuối 2 năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, 0, NULL, NULL),
(9, 'Lịch thi học kỳ 2018-2019', 'Thông báo lịch thi cuối 2 năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 3, 2, 0, NULL, NULL),
(10, 'Lịch thi học kỳ 2018-2019', 'Thông báo lịch thi cuối 2 năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, 0, NULL, NULL),
(11, 'Lịch thi học kỳ 2018-2019', 'Thông báo lịch thi cuối 2 năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, 0, NULL, NULL),
(12, 'Lịch thi học kỳ 2018-2019', 'Thông báo lịch thi cuối 2 năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 3, 2, 0, NULL, NULL),
(13, 'Lịch thi học kỳ 2018-2019', 'Thông báo lịch thi cuối 2 năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 3, 2, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thu_bao`
--

CREATE TABLE `thu_bao` (
  `id` int(10) UNSIGNED NOT NULL,
  `tieu_de` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tom_tat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_vanthu` int(10) UNSIGNED NOT NULL,
  `id_truong` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thu_bao`
--

INSERT INTO `thu_bao` (`id`, `tieu_de`, `tom_tat`, `noi_dung`, `image`, `id_vanthu`, `id_truong`, `created_at`, `updated_at`) VALUES
(1, 'Kế hoạch năm hoc', 'Thông báo kế hoạch năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, NULL, NULL),
(2, 'Kế hoạch năm hoc', 'Thông báo kế hoạch năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, NULL, NULL),
(3, 'Kế hoạch năm hoc', 'Thông báo kế hoạch năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, NULL, NULL),
(4, 'Kế hoạch năm hoc', 'Thông báo kế hoạch năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, NULL, NULL),
(5, 'Kế hoạch năm hoc', 'Thông báo kế hoạch năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, NULL, NULL),
(6, 'Kế hoạch năm hoc', 'Thông báo kế hoạch năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, NULL, NULL),
(7, 'Kế hoạch năm hoc', 'Thông báo kế hoạch năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, NULL, NULL),
(8, 'Kế hoạch năm hoc', 'Thông báo kế hoạch năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, NULL, NULL),
(9, 'Kế hoạch năm hoc', 'Thông báo kế hoạch năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, NULL, NULL),
(10, 'Kế hoạch năm hoc', 'Thông báo kế hoạch năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, NULL, NULL),
(11, 'Kế hoạch năm hoc', 'Thông báo kế hoạch năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, NULL, NULL),
(12, 'Kế hoạch năm hoc', 'Thông báo kế hoạch năm học 2018-2019 ', 'Theo kế hoạch thời gian năm học này, ngày tựu trường của tất cả các cấp học, ngành học sớm nhất vào ngày 01/8/2018, muộn nhất ngày 24/8/2018. Thống nhất toàn thành phố tổ chức khai giảng vào ngày 05/9/2018.\n                Kết thúc học kỳ I trước ngày 20/01/2019; kết thúc năm học trước ngày 31/5/2019. Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp THCS trước ngày 15/6/2019. Hoàn thành tuyển sinh lóp 10 trước ngày 31/7/2019. ', NULL, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truong`
--

CREATE TABLE `truong` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_truong` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `dia_chi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `truong`
--

INSERT INTO `truong` (`id`, `ten_truong`, `level`, `dia_chi`, `trang_thai`) VALUES
(1, 'Trường Tiểu Học Bách Khoa', 1, 'Số 11,Lê thanh nghị ,Hai bà trưng,Hà Nội', 1),
(2, 'Trường trung học cơ sở Bách Khoa', 2, 'Số 12,Lê thanh nghị ,Hai bà trưng,Hà Nội', 1),
(3, 'Trường trung học phổ thông Bách Khoa', 2, 'Số 112,Lê thanh nghị ,Hai bà trưng,Hà Nội', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'root', 0, 'duongminhquang98@gmail.com', NULL, '$2y$10$2GKDcRmah1RecOBXpzhep.VguFEHtvQoVvicJ.ipd7zSdvQ00L7Ny', NULL, NULL, NULL),
(2, 'tranvien98@gmail.com', 1, 'tranvien98@gmail.com', NULL, '$2y$10$y6FX2VYYsKZzQJpP06xYMORiK5nuJJRl74RgKopbhZ7jbmOCv8IX6', NULL, NULL, NULL),
(3, 'VT3', 2, 'Z3EcVyP50M@gmail.com', NULL, '$2y$10$vPVbYTdH0tC77cn8TeFNeO1rKgNytRVRqdumzxL4FNbXlXKT1f7tG', NULL, NULL, NULL),
(4, 'GV4', 3, 'Bf2xqx0oQd@gmail.com', NULL, '$2y$10$5gcPTETMT4nWfCCHMvhLBOwtnkkf1MovED5ZTVBC4MygI7u9RL7Hq', NULL, NULL, NULL),
(5, 'HS5', 4, 'Y9Mau54IC1@gmail.com', NULL, '$2y$10$WzKsAtZnjhfltytvgNNKJuXYaj2EM4v.V2UNsbwkPBZgJt8ahOseO', NULL, NULL, NULL),
(6, 'HS6', 4, 'xcpXLne3i1@gmail.com', NULL, '$2y$10$0lNJAANdPGmgVTgebJ.Ofe3VyTa.0LOsioHMOZkYpSIN/NT28enLe', NULL, NULL, NULL),
(7, 'HS7', 4, 'pknH9rzS9T@gmail.com', NULL, '$2y$10$lHVjb.2CyvgYeFwdSIiyxuBlku2qTi7j16MMZVssNCp9HslJq1512', NULL, NULL, NULL),
(8, 'HS8', 4, 'NdPCPq4ZXW@gmail.com', NULL, '$2y$10$Dn/T9b2eBJJ8Z.rrR05wi./IXY4xj7ODL2.WxuKJ/QpS9ZZZtVYYy', NULL, NULL, NULL),
(9, 'HS9', 4, 'BrSjrECO4i@gmail.com', NULL, '$2y$10$kNQ80dNcbvejrp081rcJfudzLbVF6i.Nzom8iA9hgYIL.NnUN6ah6', NULL, NULL, NULL),
(10, 'GV10', 3, 'vXqbJjMFql@gmail.com', NULL, '$2y$10$mJ8Wqaq94BJrRIyG7rRc0.pdahyv8YqI7q2FL4H6nKm4siygVP7pS', NULL, NULL, NULL),
(11, 'GV11', 3, 'eyIvaIPRUx@gmail.com', NULL, '$2y$10$Yq8XlCMK0gM1U6.zjH/kHu8A7MiEeVQ5.r80PpB/K48sQ1fM.INPG', NULL, NULL, NULL),
(12, 'HS12', 4, 'oBX2bAZCxY@gmail.com', NULL, '$2y$10$1EqqarieM2VaS4Q9ygPvGOGaGx98KolpwabktT7YNjBHCJ8fVsAYq', NULL, NULL, NULL),
(13, 'HS13', 4, 'QESirrU67h@gmail.com', NULL, '$2y$10$8LrBq70fF1uuLgUSkDcwqOjdUpd70hYqMu8GVTtvznrd6Zfg94tbK', NULL, NULL, NULL),
(14, 'HS14', 4, 'JNBvvnYFCw@gmail.com', NULL, '$2y$10$jAssgGsl4f.4n9UONFVUSu3K0lE8VVyBRy1EcLzeNwKQha70K6y7C', NULL, NULL, NULL),
(15, 'HS15', 4, 'buQRDnExLK@gmail.com', NULL, '$2y$10$TRfdfpsoksL51gqNhHYmH.Y.nph4Im7EKDez.uUUcDiOKAfbR6OzC', NULL, NULL, NULL),
(16, 'HS16', 4, 'UvaBeiVDkh@gmail.com', NULL, '$2y$10$yC96EKuoyh1uRNQN11clzeagdXj0irBS2WPg4.aBK3yxdQUfNXBVa', NULL, NULL, NULL),
(17, 'VT17', 2, 'DlOdpVr9FE@gmail.com', NULL, '$2y$10$62mOpfnDbwA5TUkFreml9OuG9NScHusRgE/tFDAK/q0qnXoiYk/Wu', NULL, NULL, NULL),
(18, 'VT18', 2, 'VBKKHGZs43@gmail.com', NULL, '$2y$10$yWpaSGbUgLnseqiCghuH0e1p3w.eC8bOObbhJz6kgvxsknHr1iPZa', NULL, NULL, NULL),
(19, 'VT19', 2, '9LqrGFqqW8@gmail.com', NULL, '$2y$10$iaKvwAjcWJdd3cjXFZ9T6u48fKeNZ8K93H20cwB99dQ2JVo0C/HP.', NULL, NULL, NULL),
(20, 'GV20', 3, 'j486xeYCt0@gmail.com', NULL, '$2y$10$trF56mr4cZNJ/s6pgeZ5ouafnLObRvIN4mnqpLicQ3ONdves5xbZC', NULL, NULL, NULL),
(21, 'GV21', 3, 'ebK3mLROnt@gmail.com', NULL, '$2y$10$hyv5KHB1ENGPssIYhNCEwu.RVhUzK7XRnQmqHsc.W.tIeqSS5ozT6', NULL, NULL, NULL),
(22, 'GV22', 3, 'wITCyv33ZJ@gmail.com', NULL, '$2y$10$vY3qBNFvxT5CcWRa1uFp8.lX5hdC4y7Bxszeaofe5WtegmZi80eOC', NULL, NULL, NULL),
(23, 'GV23', 3, 'Tahxlq1qlE@gmail.com', NULL, '$2y$10$LboieO6vugd9MJ1Yb0yx9uOqEZ2hbLf/9b8g0MRyBORbEqWAJKBY.', NULL, NULL, NULL),
(24, 'GV24', 3, 'bnVfyOFJpD@gmail.com', NULL, '$2y$10$wFaVHk3VTFah0Ks7OGUVPOY.bWHSL45Vp6ctCqpnMcfl58tpKDVvC', NULL, NULL, NULL),
(25, 'GV25', 3, 'Xurjpqxh1M@gmail.com', NULL, '$2y$10$VMk4C508mDjiS.x4YbuRsO9nQeUgRCJCs0RpWr9DZ8W2I52DVPIP2', NULL, NULL, NULL),
(26, 'GV26', 3, 'DfJSxzsVIq@gmail.com', NULL, '$2y$10$9Qy04yN9m8tP3Cs7iJcEVuVwKEfi3em5Xt1GW1gFViJ6naIKdeLzm', NULL, NULL, NULL),
(27, 'GV27', 3, '6Jg2uQHITh@gmail.com', NULL, '$2y$10$5XpYzLlr1EitejraanqFJuoMQRHZxAx/fZkWD0.JMuXdF0nNPPCUS', NULL, NULL, NULL),
(28, 'GV28', 3, 'RrgLJay7Rt@gmail.com', NULL, '$2y$10$MkiZMXXfNwLLvkixVeOxB.VJLNcTWZp4ALBhIRa.0B8Mpovw8o/dW', NULL, NULL, NULL),
(29, 'GV29', 3, 'BN9wMe6RzW@gmail.com', NULL, '$2y$10$BO6K0WuqbZT3ZhDKufej5.8CB1MyojvweXhA4.Ky9jfC/lF0Fftui', NULL, NULL, NULL),
(30, 'GV30', 3, '3AKD6rAm6n@gmail.com', NULL, '$2y$10$EmDxVFstcIq2jRRhCA8PA.0knu3W5yaey.Ugwd.fgmXcVONqqb/O.', NULL, NULL, NULL),
(31, 'GV31', 3, 'yi5majUWCX@gmail.com', NULL, '$2y$10$e2U2LZGq4c4zzgnUXePrfe4w4WVF9jJ72CFLab347yZIFTEHD1LOG', NULL, NULL, NULL),
(32, 'GV32', 3, '4asOiPZmtC@gmail.com', NULL, '$2y$10$5WCp2swZYaWZ3hAZbWmSAuU7USdLJncnLTeUg/nWlpmLgWBndPp02', NULL, NULL, NULL),
(33, 'HS33', 4, 'DzfSp3vQUG@gmail.com', NULL, '$2y$10$nUqAro9Ov5SvFDc9Ca..CO/1xDBz3XUPmRpzsn.MPR8l6C9H1ncpu', NULL, NULL, NULL),
(34, 'HS34', 4, 'ZrCTrlOCNp@gmail.com', NULL, '$2y$10$.GvKawbP4dexpuVIvCpqU.Nj7qkOVz5J.iP/UgI6eeZJvHO3hvuxa', NULL, NULL, NULL),
(35, 'HS35', 4, 'zF55SWtST7@gmail.com', NULL, '$2y$10$kfkrNG0708zUonNLktt15.x3.88KfTwLqn/4dONAAXIXanU69jxxq', NULL, NULL, NULL),
(36, 'HS36', 4, 'buE42z4Say@gmail.com', NULL, '$2y$10$GZPxQNwpL52xCrRhgvdX4OI3ca9lGjhcDP1AFXD95s/K5lqhfgUh.', NULL, NULL, NULL),
(37, 'HS37', 4, 'LEpqPPNbIw@gmail.com', NULL, '$2y$10$5RUysFVmiY.EYF0gGm.Eme6TVOEoVqubcD/j2vJAI.XHYGA95.58y', NULL, NULL, NULL),
(38, 'HS38', 4, 'PxS3ssm7Pd@gmail.com', NULL, '$2y$10$Ed16dWP4C1xQ3InAT2mHt.ZeqXQIbNkID3jEX0mNcPRaUwQCvBfW.', NULL, NULL, NULL),
(39, 'HS39', 4, 'bkHqgXHOxh@gmail.com', NULL, '$2y$10$ZVWiEPK5QGDpqyg/8kpwj.5v9m8y22K41fqUDIoy9AvpVIRRUAGgm', NULL, NULL, NULL),
(40, 'HS40', 4, 'bxE1AObIwi@gmail.com', NULL, '$2y$10$HOmzx2DRUstRjb.a7w8sReFvBNrTdM3Xfu609nMymv.5QnVwhIYdm', NULL, NULL, NULL),
(41, 'GV41', 3, 'plc7kh17lt@gmail.com', NULL, '$2y$10$sYJBY8zK9UlHGAV.UMS63e6aptpSzv/eDMVXQPDnd5qKvTMXmu9gC', NULL, NULL, NULL),
(42, 'HS42', 4, 'NoRHkvdcVO@gmail.com', NULL, '$2y$10$a2yeVdvVaVYUei2ednhBQe9kGMt4IuTq0/OyZuLgzQd2bgabSNPuC', NULL, NULL, NULL),
(43, 'HS43', 4, 'mQ9P9Fktp2@gmail.com', NULL, '$2y$10$HJ6ejGb6DqSRQGNa5iajP.DUxLQ0wCon4bW0fAtM2rM8pHelnTX16', NULL, NULL, NULL),
(44, 'HS44', 4, 'kTYQDRVplh@gmail.com', NULL, '$2y$10$KDbKQGPtJf2qKwWQ4tKKleeDOPT6u4D/uc6FeSOVuPFlDld5ahUZO', NULL, NULL, NULL),
(45, 'HS45', 4, 'k2BqxbQeWy@gmail.com', NULL, '$2y$10$U4VVK1IXtmhDg5p7XYBoNeyplNorHl8Dms3jhzEQn83hf0db61f7C', NULL, NULL, NULL),
(46, 'HS46', 4, '6ntVGm2xuW@gmail.com', NULL, '$2y$10$8BMcMiqfw25oKLXEu1kpouCMM.r0.KVXy3b6aK5.PLFylppnsvAMm', NULL, NULL, NULL),
(47, 'HS47', 4, 'sx6R23JjHH@gmail.com', NULL, '$2y$10$x7vCGF4fCSQHi4gxA5WGR.avAWvlhHvJTxKx3jZcnPmGKijk0HXji', NULL, NULL, NULL),
(48, 'HS48', 4, '2fABaSDBmR@gmail.com', NULL, '$2y$10$bMqd2vwIr/CTOdBApJywWO777NtbiANEe2xIR8Mi2mksm59tRdEPy', NULL, NULL, NULL),
(49, 'HS49', 4, 'JAvcjuBxd8@gmail.com', NULL, '$2y$10$NV1PHli0hEMPiu8c4J9UEe5QNh3kZtpNW2ASRYrX0eUHuoTCbX/d2', NULL, NULL, NULL),
(50, 'GV50', 3, 'SSE7mZu6kq@gmail.com', NULL, '$2y$10$DaW/roXvq8sUDRLaZiOynO75GvEyS2KBJxQ5RfXSFxyutV8k2i9c2', NULL, NULL, NULL),
(51, 'GV51', 3, 'nORZw0GO7a@gmail.com', NULL, '$2y$10$5d39mbNU9q5C7boRMc1peuohkjG8LXexB0hExz.d/2tncD5gwSqUm', NULL, NULL, NULL),
(52, 'GV52', 3, '3zmEihRIAj@gmail.com', NULL, '$2y$10$FVYgw.VLFB8SO8Q/OUoQUOXfaZx2Jk2ZDje58C1wcKivrSCYxHf5e', NULL, NULL, NULL),
(53, 'GV53', 3, 'lkahfLPqFd@gmail.com', NULL, '$2y$10$jSR24doj8Tyk4ZzQMY7eXuvKmb8gKiTqtAsIElwLg2.Z/Ldf8gE5q', NULL, NULL, NULL),
(54, 'GV54', 3, 'XPmxj9uQFO@gmail.com', NULL, '$2y$10$ATWVqeKGHc6xcKPtX5jaa.O/EHpEMMC6lA5Xtx/W9oeSTxCFucTOS', NULL, NULL, NULL),
(55, 'tranvan98@gmail.com', 1, 'tranvan98@gmail.com', NULL, '$2y$10$6TdYwiCEJ5Lkg4KVnct5AO.JFe1OmC5r1G53LRpw5g4MdR3dwy4Dq', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `van_thu`
--

CREATE TABLE `van_thu` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_truong` int(10) UNSIGNED NOT NULL,
  `id_taikhoan` int(10) UNSIGNED NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `van_thu`
--

INSERT INTO `van_thu` (`id`, `id_truong`, `id_taikhoan`, `ho_ten`, `gioi_tinh`, `so_dien_thoai`, `email`, `dia_chi`, `image`, `trang_thai`) VALUES
(1, 2, 3, 'Nguyen Thi  A', 'Nữ', '0377106557', 'JVqNulawJo@gmail.com', 'Hai ba trung', NULL, 1),
(2, 1, 17, 'Nguyen Thi  B', 'Nữ', '0377106557', '8XcmitCcOn@gmail.com', 'Hai ba trung', NULL, 1),
(3, 2, 18, 'Nguyen Thi  C', 'Nữ', '0377106557', '3vOKzl8EtH@gmail.com', 'Hai ba trung', NULL, 1),
(4, 3, 19, 'Nguyen Thi  D', 'Nữ', '0377106557', 'xITyARDgJp@gmail.com', 'Hai ba trung', NULL, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admin_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `bang_diem`
--
ALTER TABLE `bang_diem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_diem_danhsach` (`id_danh_sach_bd`),
  ADD KEY `fk_bangdiem_monhoc` (`id_mon`),
  ADD KEY `fk_bangdiem_giaovien` (`id_giaovien`);

--
-- Chỉ mục cho bảng `bang_diemc1`
--
ALTER TABLE `bang_diemc1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hocsinh_bangdiemc1` (`id_hocsinh`),
  ADD KEY `fk_giaovien_bangdiemc1` (`id_giaovien`),
  ADD KEY `fk_mon_bangdiemc1` (`id_mon`);

--
-- Chỉ mục cho bảng `bang_tong_ket`
--
ALTER TABLE `bang_tong_ket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tongket_hocsinh` (`id_hocsinh`);

--
-- Chỉ mục cho bảng `cuoi_ki_c1`
--
ALTER TABLE `cuoi_ki_c1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cuoikic1_bangdiemc1` (`id_bangdiemc1`);

--
-- Chỉ mục cho bảng `danh_sach_bd`
--
ALTER TABLE `danh_sach_bd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bangdiem_hocki` (`id_hocki`),
  ADD KEY `fk_danhsach_tongket` (`id_tongket`);

--
-- Chỉ mục cho bảng `danh_sach_gv`
--
ALTER TABLE `danh_sach_gv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_giaovien_truong` (`id_truong`),
  ADD KEY `fk_giaovien_hocki` (`id_hocki`);

--
-- Chỉ mục cho bảng `danh_sach_hs`
--
ALTER TABLE `danh_sach_hs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hocsinh_giaovien` (`id_giaovien`),
  ADD KEY `fk_hocsinh_hocki` (`id_hocki`),
  ADD KEY `fk_hocsinh_lop` (`id_lop`);

--
-- Chỉ mục cho bảng `diem_phay`
--
ALTER TABLE `diem_phay`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_diemphay_bangdiem` (`id_bangdiem`);

--
-- Chỉ mục cho bảng `giao_vien`
--
ALTER TABLE `giao_vien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_giaovien_danhsach` (`id_danh_sach_gv`),
  ADD KEY `fk_giaovien_taikhoan` (`id_taikhoan`),
  ADD KEY `fk_giaovien_monhoc` (`id_mon`);

--
-- Chỉ mục cho bảng `giua_ki_c1`
--
ALTER TABLE `giua_ki_c1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_giuakic1_bangdiemc1` (`id_bangdiemc1`);

--
-- Chỉ mục cho bảng `he_so1`
--
ALTER TABLE `he_so1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_heso1_bangdiem` (`id_bangdiem`);

--
-- Chỉ mục cho bảng `he_so2`
--
ALTER TABLE `he_so2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_heso2_bangdiem` (`id_bangdiem`);

--
-- Chỉ mục cho bảng `he_so3`
--
ALTER TABLE `he_so3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_heso3_bangdiem` (`id_bangdiem`);

--
-- Chỉ mục cho bảng `hoc_ki`
--
ALTER TABLE `hoc_ki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hocki_namhoc` (`id_namhoc`);

--
-- Chỉ mục cho bảng `hoc_sinh`
--
ALTER TABLE `hoc_sinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hocsinh_danhsach` (`id_danh_sach_hs`),
  ADD KEY `fk_hocsinh_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `lop_day`
--
ALTER TABLE `lop_day`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lopday_giaovien` (`id_giaovien`),
  ADD KEY `fk_lopday_lop` (`id_lop`),
  ADD KEY `fk_lopday_hocki` (`id_hocki`);

--
-- Chỉ mục cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lophoc_truong` (`id_truong`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nam_hoc`
--
ALTER TABLE `nam_hoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nang_luc`
--
ALTER TABLE `nang_luc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nangluc_hocsinh` (`id_hocsinh`),
  ADD KEY `fk_nangluc_giaovien` (`id_giaovien`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `pham_chat`
--
ALTER TABLE `pham_chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_phamchat_hocsinh` (`id_hocsinh`),
  ADD KEY `fk_phamchat_giaovien` (`id_giaovien`);

--
-- Chỉ mục cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_thongbao_vanthu` (`id_vanthu`),
  ADD KEY `fk_thongbao_truong` (`id_truong`);

--
-- Chỉ mục cho bảng `thu_bao`
--
ALTER TABLE `thu_bao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_thubao_vanthu` (`id_vanthu`),
  ADD KEY `fk_thubao_truong` (`id_truong`);

--
-- Chỉ mục cho bảng `truong`
--
ALTER TABLE `truong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `van_thu`
--
ALTER TABLE `van_thu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vanthu_taikhoan` (`id_taikhoan`),
  ADD KEY `fk_vanthu_truong` (`id_truong`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `bang_diem`
--
ALTER TABLE `bang_diem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `bang_diemc1`
--
ALTER TABLE `bang_diemc1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `bang_tong_ket`
--
ALTER TABLE `bang_tong_ket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `cuoi_ki_c1`
--
ALTER TABLE `cuoi_ki_c1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `danh_sach_bd`
--
ALTER TABLE `danh_sach_bd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `danh_sach_gv`
--
ALTER TABLE `danh_sach_gv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `danh_sach_hs`
--
ALTER TABLE `danh_sach_hs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `diem_phay`
--
ALTER TABLE `diem_phay`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `giao_vien`
--
ALTER TABLE `giao_vien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `giua_ki_c1`
--
ALTER TABLE `giua_ki_c1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `he_so1`
--
ALTER TABLE `he_so1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `he_so2`
--
ALTER TABLE `he_so2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `he_so3`
--
ALTER TABLE `he_so3`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `hoc_ki`
--
ALTER TABLE `hoc_ki`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `hoc_sinh`
--
ALTER TABLE `hoc_sinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `lop_day`
--
ALTER TABLE `lop_day`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `nam_hoc`
--
ALTER TABLE `nam_hoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `nang_luc`
--
ALTER TABLE `nang_luc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `pham_chat`
--
ALTER TABLE `pham_chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `thu_bao`
--
ALTER TABLE `thu_bao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `truong`
--
ALTER TABLE `truong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `van_thu`
--
ALTER TABLE `van_thu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `bang_diem`
--
ALTER TABLE `bang_diem`
  ADD CONSTRAINT `fk_bangdiem_giaovien` FOREIGN KEY (`id_giaovien`) REFERENCES `giao_vien` (`id`),
  ADD CONSTRAINT `fk_bangdiem_monhoc` FOREIGN KEY (`id_mon`) REFERENCES `mon_hoc` (`id`),
  ADD CONSTRAINT `fk_diem_danhsach` FOREIGN KEY (`id_danh_sach_bd`) REFERENCES `danh_sach_bd` (`id`);

--
-- Các ràng buộc cho bảng `bang_diemc1`
--
ALTER TABLE `bang_diemc1`
  ADD CONSTRAINT `fk_giaovien_bangdiemc1` FOREIGN KEY (`id_giaovien`) REFERENCES `giao_vien` (`id`),
  ADD CONSTRAINT `fk_hocsinh_bangdiemc1` FOREIGN KEY (`id_hocsinh`) REFERENCES `hoc_sinh` (`id`),
  ADD CONSTRAINT `fk_mon_bangdiemc1` FOREIGN KEY (`id_mon`) REFERENCES `mon_hoc` (`id`);

--
-- Các ràng buộc cho bảng `bang_tong_ket`
--
ALTER TABLE `bang_tong_ket`
  ADD CONSTRAINT `fk_tongket_hocsinh` FOREIGN KEY (`id_hocsinh`) REFERENCES `hoc_sinh` (`id`);

--
-- Các ràng buộc cho bảng `cuoi_ki_c1`
--
ALTER TABLE `cuoi_ki_c1`
  ADD CONSTRAINT `fk_cuoikic1_bangdiemc1` FOREIGN KEY (`id_bangdiemc1`) REFERENCES `bang_diemc1` (`id`);

--
-- Các ràng buộc cho bảng `danh_sach_bd`
--
ALTER TABLE `danh_sach_bd`
  ADD CONSTRAINT `fk_bangdiem_hocki` FOREIGN KEY (`id_hocki`) REFERENCES `hoc_ki` (`id`),
  ADD CONSTRAINT `fk_danhsach_tongket` FOREIGN KEY (`id_tongket`) REFERENCES `bang_tong_ket` (`id`);

--
-- Các ràng buộc cho bảng `danh_sach_gv`
--
ALTER TABLE `danh_sach_gv`
  ADD CONSTRAINT `fk_giaovien_hocki` FOREIGN KEY (`id_hocki`) REFERENCES `hoc_ki` (`id`),
  ADD CONSTRAINT `fk_giaovien_truong` FOREIGN KEY (`id_truong`) REFERENCES `truong` (`id`);

--
-- Các ràng buộc cho bảng `danh_sach_hs`
--
ALTER TABLE `danh_sach_hs`
  ADD CONSTRAINT `fk_hocsinh_giaovien` FOREIGN KEY (`id_giaovien`) REFERENCES `giao_vien` (`id`),
  ADD CONSTRAINT `fk_hocsinh_hocki` FOREIGN KEY (`id_hocki`) REFERENCES `hoc_ki` (`id`),
  ADD CONSTRAINT `fk_hocsinh_lop` FOREIGN KEY (`id_lop`) REFERENCES `lop_hoc` (`id`);

--
-- Các ràng buộc cho bảng `diem_phay`
--
ALTER TABLE `diem_phay`
  ADD CONSTRAINT `fk_diemphay_bangdiem` FOREIGN KEY (`id_bangdiem`) REFERENCES `bang_diem` (`id`);

--
-- Các ràng buộc cho bảng `giao_vien`
--
ALTER TABLE `giao_vien`
  ADD CONSTRAINT `fk_giaovien_danhsach` FOREIGN KEY (`id_danh_sach_gv`) REFERENCES `danh_sach_gv` (`id`),
  ADD CONSTRAINT `fk_giaovien_monhoc` FOREIGN KEY (`id_mon`) REFERENCES `mon_hoc` (`id`),
  ADD CONSTRAINT `fk_giaovien_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `giua_ki_c1`
--
ALTER TABLE `giua_ki_c1`
  ADD CONSTRAINT `fk_giuakic1_bangdiemc1` FOREIGN KEY (`id_bangdiemc1`) REFERENCES `bang_diemc1` (`id`);

--
-- Các ràng buộc cho bảng `he_so1`
--
ALTER TABLE `he_so1`
  ADD CONSTRAINT `fk_heso1_bangdiem` FOREIGN KEY (`id_bangdiem`) REFERENCES `bang_diem` (`id`);

--
-- Các ràng buộc cho bảng `he_so2`
--
ALTER TABLE `he_so2`
  ADD CONSTRAINT `fk_heso2_bangdiem` FOREIGN KEY (`id_bangdiem`) REFERENCES `bang_diem` (`id`);

--
-- Các ràng buộc cho bảng `he_so3`
--
ALTER TABLE `he_so3`
  ADD CONSTRAINT `fk_heso3_bangdiem` FOREIGN KEY (`id_bangdiem`) REFERENCES `bang_diem` (`id`);

--
-- Các ràng buộc cho bảng `hoc_ki`
--
ALTER TABLE `hoc_ki`
  ADD CONSTRAINT `fk_hocki_namhoc` FOREIGN KEY (`id_namhoc`) REFERENCES `nam_hoc` (`id`);

--
-- Các ràng buộc cho bảng `hoc_sinh`
--
ALTER TABLE `hoc_sinh`
  ADD CONSTRAINT `fk_hocsinh_danhsach` FOREIGN KEY (`id_danh_sach_hs`) REFERENCES `danh_sach_hs` (`id`),
  ADD CONSTRAINT `fk_hocsinh_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `lop_day`
--
ALTER TABLE `lop_day`
  ADD CONSTRAINT `fk_lopday_giaovien` FOREIGN KEY (`id_giaovien`) REFERENCES `giao_vien` (`id`),
  ADD CONSTRAINT `fk_lopday_hocki` FOREIGN KEY (`id_hocki`) REFERENCES `hoc_ki` (`id`),
  ADD CONSTRAINT `fk_lopday_lop` FOREIGN KEY (`id_lop`) REFERENCES `lop_hoc` (`id`);

--
-- Các ràng buộc cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  ADD CONSTRAINT `fk_lophoc_truong` FOREIGN KEY (`id_truong`) REFERENCES `truong` (`id`);

--
-- Các ràng buộc cho bảng `nang_luc`
--
ALTER TABLE `nang_luc`
  ADD CONSTRAINT `fk_nangluc_giaovien` FOREIGN KEY (`id_giaovien`) REFERENCES `giao_vien` (`id`),
  ADD CONSTRAINT `fk_nangluc_hocsinh` FOREIGN KEY (`id_hocsinh`) REFERENCES `hoc_sinh` (`id`);

--
-- Các ràng buộc cho bảng `pham_chat`
--
ALTER TABLE `pham_chat`
  ADD CONSTRAINT `fk_phamchat_giaovien` FOREIGN KEY (`id_giaovien`) REFERENCES `giao_vien` (`id`),
  ADD CONSTRAINT `fk_phamchat_hocsinh` FOREIGN KEY (`id_hocsinh`) REFERENCES `hoc_sinh` (`id`);

--
-- Các ràng buộc cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  ADD CONSTRAINT `fk_thongbao_truong` FOREIGN KEY (`id_truong`) REFERENCES `truong` (`id`),
  ADD CONSTRAINT `fk_thongbao_vanthu` FOREIGN KEY (`id_vanthu`) REFERENCES `van_thu` (`id`);

--
-- Các ràng buộc cho bảng `thu_bao`
--
ALTER TABLE `thu_bao`
  ADD CONSTRAINT `fk_thubao_truong` FOREIGN KEY (`id_truong`) REFERENCES `truong` (`id`),
  ADD CONSTRAINT `fk_thubao_vanthu` FOREIGN KEY (`id_vanthu`) REFERENCES `van_thu` (`id`);

--
-- Các ràng buộc cho bảng `van_thu`
--
ALTER TABLE `van_thu`
  ADD CONSTRAINT `fk_vanthu_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_vanthu_truong` FOREIGN KEY (`id_truong`) REFERENCES `truong` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
