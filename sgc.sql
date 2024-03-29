-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2024 pada 05.18
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sgc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `user_id`, `group`, `created_at`) VALUES
(13, 18, 'pedagang', '2023-12-29 04:17:46'),
(14, 19, 'user', '2023-12-29 04:24:08'),
(21, 23, 'pedagang', '2024-01-10 14:44:16'),
(22, 24, 'pedagang', '2024-01-10 14:45:18'),
(24, 26, 'admin', '2024-01-13 15:37:48'),
(26, 29, 'pedagang', '2024-01-13 16:38:06'),
(27, 30, 'admin', '2024-01-13 16:40:05'),
(28, 31, 'admin', '2024-01-13 16:40:45'),
(41, 27, 'pedagang', '2024-01-13 17:33:02'),
(47, 1, 'admin', '2024-01-13 17:40:13'),
(49, 32, 'admin', '2024-01-13 17:52:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_identities`
--

CREATE TABLE `auth_identities` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `secret` varchar(255) NOT NULL,
  `secret2` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text DEFAULT NULL,
  `force_reset` tinyint(1) NOT NULL DEFAULT 0,
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_identities`
--

INSERT INTO `auth_identities` (`id`, `user_id`, `type`, `name`, `secret`, `secret2`, `expires`, `extra`, `force_reset`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'email_password', 'admin', 'admin@sgc.com', '$2y$12$ZOA2jp5oiL9rT4vxne4imuIal2HY/e4MNSPQEwZ9Hb6rRfmZ1jj9i', NULL, NULL, 0, '2024-01-14 02:23:26', '2023-12-14 11:16:21', '2024-01-14 02:23:26'),
(12, 18, 'email_password', 'penjual', 'penjual@sgc.com', '$2y$12$YcIpMPDJnVrRpkb8RoJhJODOeIcnZcMP/IRmgxL9XtM8pPkj1cBl.', NULL, NULL, 0, '2024-01-13 16:25:38', '2023-12-29 04:17:46', '2024-01-13 16:25:38'),
(13, 19, 'email_password', 'user', 'customer@sgc.com', '$2y$12$9tuwffpU1vp3i7PEpFs2UOD2ZOt1pnXAGhA4089QT.as1ssAjdH5C', NULL, NULL, 0, '2024-01-13 16:24:25', '2023-12-29 04:24:08', '2024-01-13 16:24:25'),
(17, 23, 'email_password', NULL, 'penjual3@email.com', '$2y$12$YcIpMPDJnVrRpkb8RoJhJODOeIcnZcMP/IRmgxL9XtM8pPkj1cBl.', NULL, NULL, 0, '2024-01-10 17:53:16', '2024-01-10 14:44:15', '2024-01-10 17:53:16'),
(18, 24, 'email_password', NULL, 'penjual2@email.com', '$2y$12$Al3D/xDAmu75oOwuFNqq3O/ASP4qlhAoVoTaVnEc7WEFWM6oD4FLy', NULL, NULL, 0, '2024-01-13 11:25:24', '2024-01-10 14:45:18', '2024-01-13 11:25:24'),
(20, 26, 'email_password', NULL, 'adsa13@gmail.com', '$2y$12$NvnbRRvIfzjQk1cwDBj4kODQ/5.00vmbkPOrn988vjZaTmZaWcYjO', NULL, NULL, 0, NULL, '2024-01-13 15:37:48', '2024-01-13 15:37:48'),
(21, 27, 'email_password', NULL, 'penjual4@gmail.com', '$2y$12$YcIpMPDJnVrRpkb8RoJhJODOeIcnZcMP/IRmgxL9XtM8pPkj1cBl.', NULL, NULL, 0, '2024-01-13 17:01:42', '2024-01-13 16:30:44', '2024-01-13 17:01:42'),
(22, 28, 'email_password', NULL, 'qweqw@gmail.com', '$2y$12$nWj0npyjaqwtk8NJv4oT1.ugltn.kbrlPtaFimlQoa7IMQA4Ce8zy', NULL, NULL, 0, NULL, '2024-01-13 16:35:52', '2024-01-13 16:35:52'),
(23, 29, 'email_password', NULL, 'qweq1w@gmail.com', '$2y$12$zL2/aodQhLSnNhAPIJxHzumPw1uXE2VLbwnTR/yHJNiVvwqPjf9v.', NULL, NULL, 0, NULL, '2024-01-13 16:38:06', '2024-01-13 16:38:06'),
(24, 30, 'email_password', NULL, 'muhauzi17e@gmail.com', '$2y$12$3SPkHY7nTd1xtL4ZXZa0mO1cZg.t.3pBVmDzkzQOVtX1z1I3lsQB6', NULL, NULL, 0, NULL, '2024-01-13 16:40:05', '2024-01-13 16:40:05'),
(25, 31, 'email_password', NULL, 'ziphiusmyth1231@gmail.com', '$2y$12$9gj50.qSfMVzSxd3pASKRO.2bhYQtLgGxso9ndSrFp6nbiNEKNiN6', NULL, NULL, 0, NULL, '2024-01-13 16:40:45', '2024-01-13 16:40:45'),
(26, 32, 'email_password', NULL, 'sayaadmin@gmail.com', '$2y$12$yTgaopi.RCYJpKW1d81B8OfND4VsHTNSmEKxJKZkVgDsYnVfawVNu', NULL, NULL, 0, NULL, '2024-01-13 17:31:19', '2024-01-13 17:52:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `user_agent`, `id_type`, `identifier`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', NULL, '2023-12-20 15:43:24', 0),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', 1, '2023-12-20 15:43:45', 1),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', NULL, '2023-12-20 15:46:50', 0),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', NULL, '2023-12-20 15:47:00', 0),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', NULL, '2023-12-20 15:47:10', 0),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', 1, '2023-12-20 15:47:37', 1),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', NULL, '2023-12-21 06:23:04', 0),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', NULL, '2023-12-21 06:23:16', 0),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', NULL, '2023-12-21 06:23:28', 0),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', NULL, '2023-12-21 06:23:43', 0),
(11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', NULL, '2023-12-21 06:32:29', 0),
(12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', NULL, '2023-12-21 06:38:08', 0),
(13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', NULL, '2023-12-21 06:39:19', 0),
(14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', NULL, '2023-12-21 06:49:30', 0),
(15, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', 1, '2023-12-21 06:53:50', 1),
(16, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', 1, '2023-12-21 06:56:28', 1),
(17, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'pedagang1', NULL, '2023-12-21 06:57:34', 0),
(18, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual1', 16, '2023-12-21 06:59:11', 1),
(19, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', 1, '2023-12-21 07:06:49', 1),
(20, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', NULL, '2023-12-24 02:43:44', 0),
(21, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', NULL, '2023-12-24 02:43:56', 0),
(22, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', 1, '2023-12-24 02:46:01', 1),
(23, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', NULL, '2023-12-24 03:47:42', 0),
(24, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', NULL, '2023-12-24 03:47:56', 0),
(25, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin1', 1, '2023-12-24 03:48:48', 1),
(26, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'wawaw', NULL, '2023-12-29 04:13:35', 0),
(27, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'admin', NULL, '2023-12-29 04:13:42', 0),
(28, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'wawaw', NULL, '2023-12-29 04:14:24', 0),
(29, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'wawaw', NULL, '2023-12-29 04:14:33', 0),
(30, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'admin', 1, '2023-12-29 04:15:24', 1),
(31, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'penjual', NULL, '2023-12-29 04:54:59', 0),
(32, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'penjual', NULL, '2023-12-29 04:55:10', 0),
(33, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'admin', 1, '2023-12-29 04:55:19', 1),
(34, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'penjual', 18, '2023-12-29 04:56:03', 1),
(35, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'admin', 1, '2023-12-29 11:43:32', 1),
(36, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'admin', 1, '2023-12-30 13:24:20', 1),
(37, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'admin', 1, '2024-01-02 07:35:38', 1),
(38, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'admin', 1, '2024-01-02 13:59:29', 1),
(39, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'admin', 1, '2024-01-03 06:56:00', 1),
(40, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'penjual', 18, '2024-01-03 08:12:23', 1),
(41, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'user', NULL, '2024-01-03 08:12:48', 0),
(42, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'user', NULL, '2024-01-03 08:12:57', 0),
(43, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'admin', 1, '2024-01-03 08:20:43', 1),
(44, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'admin', 1, '2024-01-03 09:14:15', 1),
(45, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'penjual', 18, '2024-01-03 09:14:26', 1),
(46, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'user', 19, '2024-01-03 09:14:38', 1),
(47, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'penjual', 18, '2024-01-03 09:15:11', 1),
(48, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'user', 19, '2024-01-03 09:15:55', 1),
(49, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'username', 'admin', 1, '2024-01-03 09:16:47', 1),
(50, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin', 1, '2024-01-04 07:28:59', 1),
(51, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin13', NULL, '2024-01-07 03:26:42', 0),
(52, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin', 1, '2024-01-07 03:27:13', 1),
(53, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin', 1, '2024-01-10 13:37:15', 1),
(54, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual', 18, '2024-01-10 13:49:20', 1),
(55, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin', 1, '2024-01-10 14:36:54', 1),
(56, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual2', NULL, '2024-01-10 14:45:50', 0),
(57, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual2', NULL, '2024-01-10 14:45:57', 0),
(58, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual3', NULL, '2024-01-10 14:46:05', 0),
(59, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual2', 24, '2024-01-10 14:46:43', 1),
(60, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual2', NULL, '2024-01-10 17:52:59', 0),
(61, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual2', 24, '2024-01-10 17:53:03', 1),
(62, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual3', 23, '2024-01-10 17:53:16', 1),
(63, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin', 1, '2024-01-10 18:13:21', 1),
(64, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin', 1, '2024-01-10 18:17:39', 1),
(65, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin', 1, '2024-01-13 10:48:37', 1),
(66, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual2', NULL, '2024-01-13 11:25:19', 0),
(67, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual2', 24, '2024-01-13 11:25:24', 1),
(68, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin', 1, '2024-01-13 15:11:55', 1),
(69, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual2', NULL, '2024-01-13 16:04:40', 0),
(70, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual', 18, '2024-01-13 16:04:47', 1),
(71, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin', 1, '2024-01-13 16:05:33', 1),
(72, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual', 18, '2024-01-13 16:06:48', 1),
(73, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'user', 19, '2024-01-13 16:24:25', 1),
(74, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual', 18, '2024-01-13 16:25:38', 1),
(75, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin', 1, '2024-01-13 16:30:02', 1),
(76, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual4', NULL, '2024-01-13 16:30:59', 0),
(77, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual4', NULL, '2024-01-13 16:31:07', 0),
(78, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual4', NULL, '2024-01-13 16:32:18', 0),
(79, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual4', NULL, '2024-01-13 16:32:38', 0),
(80, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual4', NULL, '2024-01-13 16:33:02', 0),
(81, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual4', NULL, '2024-01-13 16:33:09', 0),
(82, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual4', 27, '2024-01-13 16:33:52', 1),
(83, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin', 1, '2024-01-13 16:35:24', 1),
(84, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'penjual4', 27, '2024-01-13 17:01:42', 1),
(85, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin', 1, '2024-01-13 17:28:44', 1),
(86, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'username', 'admin', 1, '2024-01-14 02:23:26', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions_users`
--

CREATE TABLE `auth_permissions_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_remember_tokens`
--

CREATE TABLE `auth_remember_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_token_logins`
--

CREATE TABLE `auth_token_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `isi` text NOT NULL,
  `foto` text DEFAULT NULL,
  `penulis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `judul`, `tanggal`, `isi`, `foto`, `penulis`) VALUES
(1, 'Pemadaman Listrik 24 Desember 2023', '2024-01-14 11:07:30', '<h1>Halo Semuanya</h1>\r\n<p>Diinformasikan akan adanya pemadaman listrik pada pukul 19:00, Senin&nbsp;</p>', 'info-c4e644.jpg', 'Admin'),
(5, 'Lorem', '2024-01-14 11:07:20', '<p>aerhgtrhsrtgyhsetgdhysxrdtefhfgec</p>', 'info.png', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-12-28-223112', 'CodeIgniter\\Shield\\Database\\Migrations\\CreateAuthTables', 'default', 'CodeIgniter\\Shield', 1702551904, 1),
(2, '2021-07-04-041948', 'CodeIgniter\\Settings\\Database\\Migrations\\CreateSettingsTable', 'default', 'CodeIgniter\\Settings', 1702551904, 1),
(3, '2021-11-14-143905', 'CodeIgniter\\Settings\\Database\\Migrations\\AddContextColumn', 'default', 'CodeIgniter\\Settings', 1702551904, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_toko`
--

CREATE TABLE `produk_toko` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(25) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `stok_produk` varchar(10) NOT NULL,
  `tersedia` tinyint(1) NOT NULL,
  `id_toko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk_toko`
--

INSERT INTO `produk_toko` (`id_produk`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `foto_produk`, `stok_produk`, `tersedia`, `id_toko`) VALUES
(2, 'Minyak Sunco 1L', 34000, 'Mahaaaalllllllllllllll', 'produk-1fc41a.jpg', '10', 0, 19),
(3, 'Gulaku Gula Pasir 1Kg', 27000, 'Gulaa manissss', 'produk-2178b8.jpg', '13', 1, 19),
(4, 'Seblak Mie Tulang', 12000, 'Seblak Mie dengan Mie Indomie, Tulang, telur dan Sayuran, Tersedia Toping Lain', 'default.png', '13', 0, 17),
(7, 'Telur 1Kg', 25000, 'Telur Ayam Negeri', 'produk-797366.webp', '14', 1, 19),
(8, 'Garam Cap Layar 500gr', 15000, 'Garam Kualitas Terbaik', 'produk-afaab8.png', '13', 1, 19),
(16, 'Pop Ice', 5000, 'Tersedia Rasa Coklat, Anggur, Taro, Bubble Gum, Durian, Strawberry', 'produk-b5cd1f.png', '16', 1, 26);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int(9) NOT NULL,
  `class` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `nohp_toko` varchar(13) NOT NULL,
  `foto` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `user_id`, `nama_toko`, `alamat_toko`, `nohp_toko`, `foto`, `deskripsi`) VALUES
(17, 23, 'Seblak Ganas', 'C12', '08216958452', 'default.svg', 'Nyiksa Perut? Gaskkan'),
(19, 24, 'Sembako Murah 179', 'C19', '085155296228', 'toko-804ef2.jpg', 'Sembako Termurah dengan diskon besar'),
(26, 18, 'Minuman Segar', 'B23', '0866664782', 'toko-f102cc.jpg', 'Menjual Aneka Minuman Segar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `nohp` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `nohp`, `user_image`, `status`, `status_message`, `active`, `last_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'Wawan', '085155296228', 'user-6587a083011e7.jpg', NULL, NULL, 1, '2024-01-14 04:16:05', '2023-12-14 11:16:20', '2024-01-13 17:40:13', NULL),
(18, 'penjual', 'Rere', '', '1705162143_48c857a51499b2dac7d5.png', NULL, NULL, 1, '2024-01-13 16:29:57', '2023-12-29 04:17:46', '2024-01-13 16:09:03', NULL),
(19, 'user', 'Dede', '', '', NULL, NULL, 1, '2024-01-13 16:25:27', '2023-12-29 04:24:08', '2023-12-29 04:24:08', NULL),
(23, 'penjual3', 'Leonidas', '', 'default.svg', NULL, NULL, 1, '2024-01-10 18:11:46', '2024-01-10 14:44:15', '2024-01-10 17:53:31', NULL),
(24, 'penjual2', 'Amin Suprata', '', '1704901921_1b7e32f919437ac186f0.jpg', NULL, NULL, 1, '2024-01-13 15:11:51', '2024-01-10 14:45:18', '2024-01-10 15:52:01', NULL),
(26, 'admin3', NULL, '', 'default.svg', NULL, NULL, 1, NULL, '2024-01-13 15:37:47', '2024-01-13 15:38:16', '2024-01-13 15:38:16'),
(27, 'penjual4', 'Joko Siswanto', '', 'default.svg', NULL, NULL, 1, '2024-01-13 17:28:39', '2024-01-13 16:30:43', '2024-01-13 16:54:32', NULL),
(28, 'penjual5', NULL, '', 'default.svg', NULL, NULL, 1, NULL, '2024-01-13 16:35:52', '2024-01-13 16:38:18', '2024-01-13 16:38:18'),
(29, 'penjual7', NULL, '', 'default.svg', NULL, NULL, 1, NULL, '2024-01-13 16:38:05', '2024-01-13 16:40:57', '2024-01-13 16:40:57'),
(30, 'admin12', NULL, '', 'default.svg', NULL, NULL, 1, NULL, '2024-01-13 16:40:05', '2024-01-13 16:40:09', '2024-01-13 16:40:09'),
(31, 'admin231', NULL, '', 'default.svg', NULL, NULL, 1, NULL, '2024-01-13 16:40:45', '2024-01-13 16:40:53', '2024-01-13 16:40:53'),
(32, 'Admin2', 'Muhamad Fauzi', '054895621858', 'default.svg', NULL, NULL, 1, NULL, '2024-01-13 17:31:19', '2024-01-13 17:52:06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_secret` (`type`,`secret`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_permissions_users_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `auth_remember_tokens_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk_toko`
--
ALTER TABLE `produk_toko`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`),
  ADD KEY `id_user` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `auth_identities`
--
ALTER TABLE `auth_identities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk_toko`
--
ALTER TABLE `produk_toko`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk_toko`
--
ALTER TABLE `produk_toko`
  ADD CONSTRAINT `produk_toko_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`);

--
-- Ketidakleluasaan untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD CONSTRAINT `toko_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
