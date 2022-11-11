-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Nov 2022 pada 03.10
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fbi_penilaianperilaku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jwb_penilai`
--

CREATE TABLE `jwb_penilai` (
  `id` int(11) NOT NULL,
  `nip_penilai` varchar(100) NOT NULL,
  `nip_ygdinilai` varchar(100) NOT NULL,
  `id_unitkerja` int(11) NOT NULL,
  `tydinilai` int(11) NOT NULL,
  `hasil` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jwb_penilai`
--

INSERT INTO `jwb_penilai` (`id`, `nip_penilai`, `nip_ygdinilai`, `id_unitkerja`, `tydinilai`, `hasil`, `created_at`, `updated_at`) VALUES
(66, '198001312009032004', '196711251989081001', 1485, 2, '59', '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(67, '197303231992032002', '196608131985121001', 1485, 3, '44', '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(68, '197010041998032005', '196608131985121001', 1485, 2, '42', '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(69, '198308192010011005', '198001312009032004', 1485, 3, '41', '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(70, '198111082000121002', '198001312009032004', 1485, 3, '48', '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(71, '197303231992032002', '198001312009032004', 1485, 3, '51', '2022-10-27 07:40:54', '2022-10-27 00:40:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jwb_pertanyaan`
--

CREATE TABLE `jwb_pertanyaan` (
  `id` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `nip_penilai` varchar(100) NOT NULL,
  `nip_ygdinilai` varchar(100) NOT NULL,
  `jawaban` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jwb_pertanyaan`
--

INSERT INTO `jwb_pertanyaan` (`id`, `id_pertanyaan`, `nip_penilai`, `nip_ygdinilai`, `jawaban`, `created_at`, `updated_at`) VALUES
(908, 6, '198001312009032004', '196711251989081001', 1, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(909, 7, '198001312009032004', '196711251989081001', 3, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(910, 8, '198001312009032004', '196711251989081001', 2, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(911, 9, '198001312009032004', '196711251989081001', 3, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(912, 10, '198001312009032004', '196711251989081001', 3, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(913, 11, '198001312009032004', '196711251989081001', 3, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(914, 12, '198001312009032004', '196711251989081001', 3, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(915, 13, '198001312009032004', '196711251989081001', 3, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(916, 14, '198001312009032004', '196711251989081001', 3, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(917, 15, '198001312009032004', '196711251989081001', 3, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(918, 16, '198001312009032004', '196711251989081001', 3, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(919, 17, '198001312009032004', '196711251989081001', 2, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(920, 18, '198001312009032004', '196711251989081001', 3, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(921, 19, '198001312009032004', '196711251989081001', 3, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(922, 20, '198001312009032004', '196711251989081001', 3, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(923, 21, '198001312009032004', '196711251989081001', 3, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(924, 22, '198001312009032004', '196711251989081001', 3, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(925, 23, '198001312009032004', '196711251989081001', 3, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(926, 24, '198001312009032004', '196711251989081001', 3, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(927, 25, '198001312009032004', '196711251989081001', 3, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(928, 26, '198001312009032004', '196711251989081001', 3, '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(929, 6, '197303231992032002', '196608131985121001', 1, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(930, 7, '197303231992032002', '196608131985121001', 2, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(931, 8, '197303231992032002', '196608131985121001', 3, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(932, 9, '197303231992032002', '196608131985121001', 2, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(933, 10, '197303231992032002', '196608131985121001', 3, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(934, 11, '197303231992032002', '196608131985121001', 1, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(935, 12, '197303231992032002', '196608131985121001', 2, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(936, 13, '197303231992032002', '196608131985121001', 3, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(937, 14, '197303231992032002', '196608131985121001', 3, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(938, 15, '197303231992032002', '196608131985121001', 2, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(939, 16, '197303231992032002', '196608131985121001', 3, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(940, 17, '197303231992032002', '196608131985121001', 2, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(941, 18, '197303231992032002', '196608131985121001', 2, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(942, 19, '197303231992032002', '196608131985121001', 2, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(943, 20, '197303231992032002', '196608131985121001', 2, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(944, 21, '197303231992032002', '196608131985121001', 1, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(945, 22, '197303231992032002', '196608131985121001', 2, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(946, 23, '197303231992032002', '196608131985121001', 2, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(947, 24, '197303231992032002', '196608131985121001', 2, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(948, 25, '197303231992032002', '196608131985121001', 2, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(949, 26, '197303231992032002', '196608131985121001', 2, '2022-10-27 01:53:16', '2022-10-26 18:53:16'),
(950, 6, '197010041998032005', '196608131985121001', 1, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(951, 7, '197010041998032005', '196608131985121001', 2, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(952, 8, '197010041998032005', '196608131985121001', 2, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(953, 9, '197010041998032005', '196608131985121001', 2, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(954, 10, '197010041998032005', '196608131985121001', 2, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(955, 11, '197010041998032005', '196608131985121001', 1, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(956, 12, '197010041998032005', '196608131985121001', 2, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(957, 13, '197010041998032005', '196608131985121001', 2, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(958, 14, '197010041998032005', '196608131985121001', 2, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(959, 15, '197010041998032005', '196608131985121001', 2, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(960, 16, '197010041998032005', '196608131985121001', 2, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(961, 17, '197010041998032005', '196608131985121001', 2, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(962, 18, '197010041998032005', '196608131985121001', 2, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(963, 19, '197010041998032005', '196608131985121001', 2, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(964, 20, '197010041998032005', '196608131985121001', 2, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(965, 21, '197010041998032005', '196608131985121001', 2, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(966, 22, '197010041998032005', '196608131985121001', 2, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(967, 23, '197010041998032005', '196608131985121001', 2, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(968, 24, '197010041998032005', '196608131985121001', 2, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(969, 25, '197010041998032005', '196608131985121001', 3, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(970, 26, '197010041998032005', '196608131985121001', 3, '2022-10-27 02:27:13', '2022-10-26 19:27:13'),
(971, 6, '198308192010011005', '198001312009032004', 1, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(972, 7, '198308192010011005', '198001312009032004', 2, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(973, 8, '198308192010011005', '198001312009032004', 1, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(974, 9, '198308192010011005', '198001312009032004', 2, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(975, 10, '198308192010011005', '198001312009032004', 2, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(976, 11, '198308192010011005', '198001312009032004', 2, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(977, 12, '198308192010011005', '198001312009032004', 2, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(978, 13, '198308192010011005', '198001312009032004', 2, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(979, 14, '198308192010011005', '198001312009032004', 2, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(980, 15, '198308192010011005', '198001312009032004', 2, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(981, 16, '198308192010011005', '198001312009032004', 2, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(982, 17, '198308192010011005', '198001312009032004', 2, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(983, 18, '198308192010011005', '198001312009032004', 2, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(984, 19, '198308192010011005', '198001312009032004', 2, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(985, 20, '198308192010011005', '198001312009032004', 2, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(986, 21, '198308192010011005', '198001312009032004', 3, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(987, 22, '198308192010011005', '198001312009032004', 1, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(988, 23, '198308192010011005', '198001312009032004', 2, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(989, 24, '198308192010011005', '198001312009032004', 2, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(990, 25, '198308192010011005', '198001312009032004', 3, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(991, 26, '198308192010011005', '198001312009032004', 2, '2022-10-27 07:31:11', '2022-10-27 00:31:11'),
(992, 6, '198111082000121002', '198001312009032004', 1, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(993, 7, '198111082000121002', '198001312009032004', 2, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(994, 8, '198111082000121002', '198001312009032004', 3, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(995, 9, '198111082000121002', '198001312009032004', 3, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(996, 10, '198111082000121002', '198001312009032004', 3, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(997, 11, '198111082000121002', '198001312009032004', 2, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(998, 12, '198111082000121002', '198001312009032004', 3, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(999, 13, '198111082000121002', '198001312009032004', 3, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(1000, 14, '198111082000121002', '198001312009032004', 3, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(1001, 15, '198111082000121002', '198001312009032004', 2, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(1002, 16, '198111082000121002', '198001312009032004', 2, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(1003, 17, '198111082000121002', '198001312009032004', 3, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(1004, 18, '198111082000121002', '198001312009032004', 2, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(1005, 19, '198111082000121002', '198001312009032004', 2, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(1006, 20, '198111082000121002', '198001312009032004', 1, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(1007, 21, '198111082000121002', '198001312009032004', 2, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(1008, 22, '198111082000121002', '198001312009032004', 2, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(1009, 23, '198111082000121002', '198001312009032004', 2, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(1010, 24, '198111082000121002', '198001312009032004', 2, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(1011, 25, '198111082000121002', '198001312009032004', 3, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(1012, 26, '198111082000121002', '198001312009032004', 2, '2022-10-27 07:36:36', '2022-10-27 00:36:36'),
(1013, 6, '197303231992032002', '198001312009032004', 1, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1014, 7, '197303231992032002', '198001312009032004', 2, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1015, 8, '197303231992032002', '198001312009032004', 3, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1016, 9, '197303231992032002', '198001312009032004', 2, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1017, 10, '197303231992032002', '198001312009032004', 3, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1018, 11, '197303231992032002', '198001312009032004', 2, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1019, 12, '197303231992032002', '198001312009032004', 3, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1020, 13, '197303231992032002', '198001312009032004', 3, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1021, 14, '197303231992032002', '198001312009032004', 2, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1022, 15, '197303231992032002', '198001312009032004', 2, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1023, 16, '197303231992032002', '198001312009032004', 3, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1024, 17, '197303231992032002', '198001312009032004', 2, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1025, 18, '197303231992032002', '198001312009032004', 3, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1026, 19, '197303231992032002', '198001312009032004', 2, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1027, 20, '197303231992032002', '198001312009032004', 3, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1028, 21, '197303231992032002', '198001312009032004', 2, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1029, 22, '197303231992032002', '198001312009032004', 3, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1030, 23, '197303231992032002', '198001312009032004', 3, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1031, 24, '197303231992032002', '198001312009032004', 2, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1032, 25, '197303231992032002', '198001312009032004', 2, '2022-10-27 07:40:54', '2022-10-27 00:40:54'),
(1033, 26, '197303231992032002', '198001312009032004', 3, '2022-10-27 07:40:54', '2022-10-27 00:40:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jwb_ygdinilai`
--

CREATE TABLE `jwb_ygdinilai` (
  `id` int(11) NOT NULL,
  `nip_ygdinilai` varchar(50) NOT NULL,
  `id_unitkerja` int(11) NOT NULL,
  `hasil` varchar(200) NOT NULL,
  `atasan` varchar(100) DEFAULT '0',
  `sejawat` varchar(100) DEFAULT '0',
  `bawahan` varchar(100) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jwb_ygdinilai`
--

INSERT INTO `jwb_ygdinilai` (`id`, `nip_ygdinilai`, `id_unitkerja`, `hasil`, `atasan`, `sejawat`, `bawahan`, `created_at`, `updated_at`) VALUES
(26, '196711251989081001', 1488, '59', '0', '1', '0', '2022-10-26 09:22:13', '2022-10-26 02:22:13'),
(27, '196608131985121001', 1485, '86', '1', '1', '0', '2022-10-27 01:53:16', '2022-10-26 19:27:13'),
(28, '198001312009032004', 1485, '140', '3', '0', '0', '2022-10-27 07:31:11', '2022-10-27 00:40:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama`, `status`, `created_at`, `updated_at`) VALUES
(1, 'penilaian', 0, '2022-11-04 01:44:48', '2022-11-03 19:01:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(11) NOT NULL,
  `text_pertanyaan` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `text_pertanyaan`, `updated_at`, `created_at`) VALUES
(6, 'Memahami dan memenuhi kebutuhan masyarakat', '2022-10-20 02:01:25', '2022-10-19 19:01:25'),
(7, 'Ramah, cekatan, solutif, dan dapat diandalkan', '2022-10-20 02:01:53', '2022-10-19 19:01:53'),
(8, 'Melakukan perbaikan tiada henti', '2022-10-20 02:02:15', '2022-10-19 19:02:15'),
(9, 'Melaksanakan tugas dengan jujur, bertanggung jawab, cermat, disiplin, dan berintegritas tinggi', '2022-10-20 02:02:43', '2022-10-19 19:02:43'),
(10, 'Menggunakan kekayaan dan barang milik negara secara bertanggung jawab, efektif, dan efisien', '2022-10-20 02:03:39', '2022-10-19 19:03:39'),
(11, 'Tidak menyalahgunakan kewenangan jabatan', '2022-10-20 02:04:05', '2022-10-19 19:04:05'),
(12, 'Meningkatkan kompetensi diri untuk menjawab tantangan yang selalu berubah', '2022-10-20 02:04:29', '2022-10-19 19:04:29'),
(13, 'Membantu orang lain belajar', '2022-10-20 02:04:40', '2022-10-19 19:04:40'),
(14, 'Melaksanakan tugas dengan kualitas terbaik', '2022-10-20 02:04:52', '2022-10-19 19:04:52'),
(15, 'Menghargai setiap orang apapun latar belakangnya', '2022-10-20 02:05:13', '2022-10-19 19:05:13'),
(16, 'Suka menolong orang lain', '2022-10-20 02:05:59', '2022-10-19 19:05:59'),
(17, 'Membangun lingkungan kerja yang kondusif', '2022-10-20 02:06:14', '2022-10-19 19:06:14'),
(18, 'Memegang teguh ideologi pancasila, undang-undang Dasar Negara Republik Indonesia Tahun 1945, setia pada Negara Kesatuan Republik Indonesia serta pemerintahan yang sah', '2022-10-24 03:34:12', '2022-10-23 20:34:12'),
(19, 'Menjaga nama baik sesama ASN, Pimpinan, Instansi, dan Negara', '2022-10-24 03:35:09', '2022-10-23 20:35:09'),
(20, 'Menjaga rahasia jabatan dan negara', '2022-10-24 03:35:58', '2022-10-23 20:35:58'),
(21, 'Cepat menyesuikan diri menghadapi perubahan', '2022-10-24 03:36:37', '2022-10-23 20:36:37'),
(22, 'Terus berinovasi dan mengembangkan kreativitas', '2022-10-24 03:37:22', '2022-10-23 20:37:22'),
(23, 'Bertindak proaktif', '2022-10-24 03:37:44', '2022-10-23 20:37:44'),
(24, 'Memberi kesempatan kepada berbagai pihak untuk berkontribusi', '2022-10-24 03:38:32', '2022-10-23 20:38:32'),
(25, 'Terbuka dalam kerjasama untuk menghasilkan nilai tambah', '2022-10-24 03:39:24', '2022-10-23 20:39:24'),
(26, 'Menggerakan pemanfaatan berbagai sumber daya untuk tujuan bersama', '2022-10-24 03:40:11', '2022-10-23 20:40:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_verified` int(11) DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `role`, `account_verified`, `email`, `email_verified_at`, `password`, `remember_token`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', 1, 'admin@admin.com', NULL, '$2y$10$AoiqJPOXfakWTRPiBoG8Pu7HVyDs6yKMHpcYPJNPes10fGwrXbaL.', NULL, '', '2022-02-21 06:28:01', '2022-11-03 05:35:09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jwb_penilai`
--
ALTER TABLE `jwb_penilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jwb_pertanyaan`
--
ALTER TABLE `jwb_pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jwb_ygdinilai`
--
ALTER TABLE `jwb_ygdinilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jwb_penilai`
--
ALTER TABLE `jwb_penilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `jwb_pertanyaan`
--
ALTER TABLE `jwb_pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1034;

--
-- AUTO_INCREMENT untuk tabel `jwb_ygdinilai`
--
ALTER TABLE `jwb_ygdinilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17477;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
