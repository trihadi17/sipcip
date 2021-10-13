-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2020 pada 13.02
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepegawaian_dinsos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(2) NOT NULL,
  `bidang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `bidang`) VALUES
(1, 'Perencanaan'),
(2, 'Keuangan'),
(3, 'Kepegawaian'),
(4, 'Penanganan Fakir Miskin'),
(5, 'Rehabilitasi Sosial'),
(6, 'Pemberdayaan Sosial'),
(7, 'Lingkungan Jaminan Sosial'),
(8, 'Sekretariat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(2) NOT NULL,
  `golongan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `golongan`) VALUES
(1, 'I/b'),
(3, 'I/d'),
(4, 'II/a'),
(5, 'II/b'),
(6, 'II/c'),
(7, 'II/d'),
(8, 'III/a'),
(9, 'III/b'),
(10, 'III/c'),
(11, 'III/d'),
(12, 'IV/a'),
(13, 'IV/b'),
(14, 'IV/d');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(2) NOT NULL,
  `jabatan` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Kepala Dinas '),
(2, 'Sekretaris'),
(3, 'Kepala Sub Bagian Perencanaan'),
(4, 'Kepala Sub Bagian Kepegawaian'),
(5, 'Pegawai Sub Perencanaan '),
(6, 'Pegawai Sub Kepegawaian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id_klasifikasi` int(2) NOT NULL,
  `klasifikasi` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `klasifikasi`) VALUES
(1, 'Esselon IIa (Kepala SKPD)'),
(4, 'Esselon IIIa Gol. III '),
(5, 'Esselon IIIa Gol. IV'),
(6, 'Esselon IVa Gol.III'),
(7, 'Esselon IVa Gol.IV'),
(8, 'Golongan Ia s.d Id'),
(9, 'Golongan IIa s.d IId'),
(10, 'Golongan IIIa s.d IIIb'),
(11, 'Golongan IIIc s.d IIId'),
(12, 'Golongan IVa s.d IVb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pangkat`
--

CREATE TABLE `pangkat` (
  `id_pangkat` int(2) NOT NULL,
  `pangkat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pangkat`
--

INSERT INTO `pangkat` (`id_pangkat`, `pangkat`) VALUES
(1, 'Juru Muda Tk.I'),
(4, 'Juru Tk.I'),
(5, 'Pengatur Muda'),
(6, 'Pengatur Muda Tk.I'),
(7, 'Pengatur'),
(8, 'Pengatur Tk.I '),
(9, 'Penata Muda'),
(10, 'Penata Muda Tk.I'),
(11, 'Penata'),
(12, 'Penata Tk.I'),
(13, 'Pembina'),
(14, 'Pembina Utama Madya'),
(15, 'Pembina Tk.I'),
(16, 'asdasdas'),
(17, 'zxczxc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_jabatan` varchar(80) NOT NULL,
  `id_pangkat` varchar(30) NOT NULL,
  `id_klasifikasi` varchar(30) NOT NULL,
  `id_golongan` varchar(30) NOT NULL,
  `id_bidang` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tgl_bekerja` date NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama`, `tempat_lahir`, `tgl_lahir`, `email`, `no_hp`, `alamat`, `id_jabatan`, `id_pangkat`, `id_klasifikasi`, `id_golongan`, `id_bidang`, `status`, `tgl_bekerja`, `foto`) VALUES
(46, '11651100250', 'Suratno, S.Sos., M.Si          ', 'Pekanbaru          ', '1965-11-17', '11651100257@students.uin-suska.ac.id', '0895603075970', 'Jalan Pattimura2', 'Sekretaris', 'Juru Tk.I', 'Esselon IIIa Gol. III ', 'IV/b', 'Sekretariat', 'Aktif', '2005-08-25', 'iconkaryawan2.png'),
(47, '11651100251', 'Helda, S.H', 'Jambi', '1977-10-13', 'haditrihadii@gmail.com', '0812345768876', 'Jalan Kartini', 'Kepala Sub Bagian Perencanaan', 'Juru Muda Tk.I', 'Esselon IIa (Kepala SKPD)', 'I/b', 'Perencanaan', 'Akitf', '2006-02-15', 'pekanbaru.png'),
(48, '11651100252 ', 'Angga S.Pdi ', 'Palembang ', '1989-09-13', 'trihadi177@gmail.com', '0895603075971', 'Jalan Rumbaii', 'Pegawai Sub Perencanaan ', 'Pembina', 'Esselon IVa Gol.III', 'III/b', 'Perencanaan', 'Akitf', '2012-10-19', 'pekanbaru1.png'),
(49, '11651100254', 'T. Hevi Ikhwansyah, S.H., M.H', 'Jakarta', '1977-03-23', 'trihadi17@gmail.com', '0895603075977', 'Jalan Durian', 'Kepala Sub Bagian Kepegawaian', 'Pembina', 'Esselon IIIa Gol. IV', 'IV/a', 'Kepegawaian', 'Aktif', '2004-03-18', 'grafik.jpg'),
(50, '11651100253', 'Tami S.Pd', 'Aceh', '2019-11-19', 'trihadi167@gmail.com', '0895603075910', 'Jalan Serayu', 'Pegawai Sub Perencanaan', 'Juru Muda Tk.I', 'Golongan Ia s.d Id', 'II/b', 'Perencanaan', 'Akitf', '2018-09-18', 'ok.jpg'),
(51, '11651100255', 'Johan S.T', 'Pekanbaru', '1977-10-21', '11651100237@students.uin-suska.ac.id', '081232423523', 'Jalan Puri', 'Pegawai Sub Kepegawaian', 'Pengatur Muda', 'Golongan IIIc s.d IIId', 'III/a', 'Kepegawaian', 'Aktif', '2018-06-20', 'ana2.jpg'),
(52, '11651100256', 'Awaluddin S.Ikom', 'Bandung', '1989-12-10', '11651100127@students.uin-suska.ac.id', '081241741721', 'Jalan Apel', 'Pegawai Sub Kepegawaian', 'Juru Muda Tk.I', 'Golongan Ia s.d Id', 'III/c', 'Kepegawaian', 'Aktif', '2017-06-14', 'iconkaryawan3.png'),
(53, '116511002577', 'Tri Hadi Putra', 'Pekanbaru', '2005-12-21', 'trihadi177@gmail.com', '0895603075977', 'Jalan Serayu', 'Pegawai Sub Perencanaan', 'Pengatur Tk.I', 'Golongan IVa s.d IVb', 'III/c', 'Perencanaan', 'Aktif', '2017-12-15', 'Capture.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_cuti`
--

CREATE TABLE `pengajuan_cuti` (
  `id_cuti` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `bidang` varchar(30) NOT NULL,
  `jenis_cuti` enum('Tahunan','Sakit','Melahirkan','Alasan Penting','Besar','Diluar Tanggungan Negara') NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jumlah` int(5) NOT NULL,
  `alasan` varchar(200) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tahun` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan_cuti`
--

INSERT INTO `pengajuan_cuti` (`id_cuti`, `nip`, `nama`, `bidang`, `jenis_cuti`, `tgl_mulai`, `tgl_selesai`, `jumlah`, `alasan`, `alamat`, `no_hp`, `status`, `tahun`) VALUES
(1, '11651100252', 'Angga S.Pdi', 'Perencanaan', 'Tahunan', '2019-12-11', '2019-12-16', 3, ' sdfsd', 'Jalan Rumbai', '0895603075971', 'Disetujui Sekretaris', '2019'),
(45, '11651100252', 'Angga S.Pdi', 'Perencanaan', 'Tahunan', '2019-12-12', '2019-12-19', 7, ' asdas', 'Jalan Rumbai', '0895603075971', 'Disetujui Sekretaris', '2019'),
(46, '11651100255', 'Johan S.T', 'Kepegawaian', 'Tahunan', '2019-12-18', '2019-12-26', 6, ' asdas', 'Jalan Puri', '081232423523', 'Disetujui Sekretaris', '2019'),
(47, '11651100254', 'T. Hevi Ikhwansyah, S.H., M.H', 'Kepegawaian', 'Tahunan', '2019-12-06', '2019-12-09', 1, ' ds', 'Jalan Durian', '0895603075977', 'Disetujui Sekretaris', '2019'),
(48, '11651100250', 'Suratno, S.Sos., M.Si', 'Sekretariat', 'Tahunan', '2019-12-12', '2019-12-13', 1, ' dsds', 'Jalan Pattimura', '0895603075970', 'Disetujui Sekretaris', '2019'),
(49, '11651100250', 'Suratno, S.Sos., M.Si', 'Sekretariat', 'Tahunan', '2019-12-13', '2019-12-16', 1, ' dasdas', 'Jalan Pattimura', '0895603075970', 'Tunggu Persetujuan Admin', '2019'),
(50, '11651100252 ', 'Angga S.Pdi ', 'Perencanaan', 'Besar', '2019-12-11', '2019-12-18', 7, ' vc', 'Jalan Rumbaii', '0895603075971', 'Ditolak Kepala Bidang', '2019'),
(51, '11651100252 ', 'Angga S.Pdi ', 'Perencanaan', 'Tahunan', '2019-12-13', '2019-12-16', 1, ' dds', 'Jalan Rumbaii', '0895603075971', 'Ditolak Admin', '2019'),
(52, '11651100251', 'Helda, S.H', 'Perencanaan', 'Diluar Tanggungan Negara', '2019-12-11', '2019-12-25', 14, ' zczx', 'Jalan Kartini', '0812345768876', 'Tunggu Persetujuan Admin', '2019'),
(53, '11651100251', 'Helda, S.H', 'Perencanaan', 'Tahunan', '2019-12-12', '2019-12-26', 10, ' zczx', 'Jalan Kartini', '0812345768876', 'Ditolak Admin', '2019'),
(54, '11651100251', 'Helda, S.H', 'Perencanaan', 'Besar', '2019-12-11', '2019-12-19', 8, ' ZZZ', 'Jalan Kartini', '0812345768876', 'Disetujui Sekretaris', '2019'),
(55, '11651100251', 'Helda, S.H', 'Perencanaan', 'Sakit', '2019-12-18', '2019-12-20', 2, ' sdf', 'Jalan Kartini', '0812345768876', 'Tunggu Persetujuan Admin', '2019'),
(56, '11651100252 ', 'Angga S.Pdi ', 'Perencanaan', 'Tahunan', '2019-12-13', '2019-12-16', 1, 'aaaa', 'Jalan Rumbaii', '0895603075971', 'Disetujui Sekretaris', '2019'),
(57, '11651100252 ', 'Angga S.Pdi ', 'Perencanaan', 'Alasan Penting', '2019-12-18', '2019-12-20', 2, ' mmm', 'Jalan Rumbaii', '0895603075971', 'Disetujui Sekretaris', '2019'),
(58, '11651100252 ', 'Angga S.Pdi ', 'Perencanaan', 'Besar', '2019-12-19', '2019-12-20', 1, ' bnb', 'Jalan Rumbaii', '0895603075971', 'Ditolak Sekretaris', '2019'),
(59, '11651100254', 'T. Hevi Ikhwansyah, S.H., M.H', 'Kepegawaian', 'Tahunan', '2019-12-19', '2019-12-26', 5, ' SAYA', 'Jalan Durian', '0895603075977', 'Disetujui Sekretaris', '2019'),
(60, '11651100250          ', 'Suratno, S.Sos., M.Si          ', 'Sekretariat', 'Diluar Tanggungan Negara', '2019-12-18', '2019-12-25', 7, ' aa', 'Jalan Pattimura2', '0895603075970', 'Ditolak Admin', '2019'),
(61, '11651100254', 'T. Hevi Ikhwansyah, S.H., M.H', 'Kepegawaian', 'Tahunan', '2019-12-26', '2019-12-27', 1, ' bbb', 'Jalan Durian', '0895603075977', 'Disetujui Sekretaris', '2019'),
(62, '11651100251', 'Helda, S.H', 'Perencanaan', 'Melahirkan', '2019-12-18', '2019-12-27', 9, ' ss', 'Jalan Kartini', '0812345768876', 'Tunggu Persetujuan Admin', '2019'),
(63, '11651100252 ', 'Angga S.Pdi ', 'Perencanaan', 'Tahunan', '2019-12-20', '2019-12-23', 1, ' mm', 'Jalan Rumbaii', '0895603075971', 'Tunggu Persetujuan Kepala Bidang', '2019'),
(64, '11651100250          ', 'Suratno, S.Sos., M.Si          ', 'Sekretariat', 'Sakit', '2019-12-19', '2019-12-26', 7, ' Sakit', 'Jalan Pattimura2', '0895603075970', 'Tunggu Persetujuan Admin', '2019'),
(65, '11651100253', 'Tami S.Pd', 'Perencanaan', 'Tahunan', '2019-12-18', '2019-12-26', 6, ' mmm', 'Jalan Serayu', '0895603075910', 'Tunggu Persetujuan Kepala Bidang', '2019'),
(66, '11651100253', 'Tami S.Pd', 'Perencanaan', 'Tahunan', '2019-12-20', '2019-12-23', 1, ' Pergi', 'Jalan Serayu', '0895603075910', 'Disetujui Sekretaris', '2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_izin`
--

CREATE TABLE `pengajuan_izin` (
  `id_izin` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `bidang` varchar(30) NOT NULL,
  `jenis_izin` enum('Sakit','Keperluan Dinas','Alasan Lain','') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `jumlah` int(2) NOT NULL,
  `perihal` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tgl_pengajuan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan_izin`
--

INSERT INTO `pengajuan_izin` (`id_izin`, `nip`, `nama`, `bidang`, `jenis_izin`, `jam_mulai`, `jam_selesai`, `jumlah`, `perihal`, `status`, `tgl_pengajuan`) VALUES
(44, '11651100252', 'Angga S.Pdi', 'Perencanaan', 'Sakit', '10:00:00', '16:00:00', 6, 'zasdas', 'Tunggu Persetujuan Kepala Bidang', '2019-12-16'),
(45, '11651100255', 'Johan S.T', 'Kepegawaian', 'Keperluan Dinas', '09:00:00', '10:00:00', 1, 'asdas', 'Disetujui Kepala Bidang', '2019-12-05'),
(46, '11651100252', 'Angga S.Pdi', 'Perencanaan', 'Keperluan Dinas', '14:00:00', '15:00:00', 1, 'ada', 'Tunggu Persetujuan Kepala Bidang', '2019-12-09'),
(47, '11651100254', 'T. Hevi Ikhwansyah, S.H., M.H', 'Kepegawaian', 'Keperluan Dinas', '09:00:00', '15:00:00', 6, 'ZXZ', 'Disetujui Sekretaris', '2019-12-09'),
(48, '11651100251', 'Helda, S.H', 'Perencanaan', 'Sakit', '08:00:00', '11:00:00', 3, 'cvx', 'Disetujui Sekretaris', '2019-12-09'),
(49, '11651100255', 'Johan S.T', 'Kepegawaian', 'Keperluan Dinas', '08:00:00', '16:00:00', 8, 'sdds', 'Disetujui Kepala Bidang', '2019-12-16'),
(50, '11651100250          ', 'Suratno, S.Sos., M.Si          ', 'Sekretariat', 'Sakit', '10:00:00', '14:00:00', 4, 'aaaa', 'Disetujui Sekretaris', '2019-12-09'),
(51, '11651100252 ', 'Angga S.Pdi ', 'Perencanaan', 'Alasan Lain', '10:00:00', '14:00:00', 4, 'aaa', 'Tunggu Persetujuan Kepala Bidang', '2019-12-09'),
(52, '11651100251', 'Helda, S.H', 'Perencanaan', 'Sakit', '09:00:00', '11:00:00', 2, 'asd', 'Tunggu Persetujuan Sekretaris', '2019-12-09'),
(53, '11651100252 ', 'Angga S.Pdi ', 'Perencanaan', 'Keperluan Dinas', '08:00:00', '09:00:00', 1, 'fff', 'Disetujui Kepala Bidang', '2019-12-10'),
(54, '11651100252 ', 'Angga S.Pdi ', 'Perencanaan', 'Keperluan Dinas', '10:00:00', '13:00:00', 3, 'aaa', 'Disetujui Kepala Bidang', '2019-12-16'),
(55, '11651100254', 'T. Hevi Ikhwansyah, S.H., M.H', 'Kepegawaian', 'Sakit', '14:00:00', '16:00:00', 2, 'NNN', 'Disetujui Sekretaris', '2019-12-16'),
(56, '11651100250          ', 'Suratno, S.Sos., M.Si          ', 'Sekretariat', 'Keperluan Dinas', '08:00:00', '09:00:00', 1, 'ss', 'Disetujui Sekretaris', '2019-12-16'),
(57, '11651100253', 'Tami S.Pd', 'Perencanaan', 'Keperluan Dinas', '10:00:00', '11:00:00', 1, 'b', 'Tunggu Persetujuan Kepala Bidang', '2019-12-16'),
(58, '11651100256', 'Awaluddin S.Ikom', 'Kepegawaian', 'Keperluan Dinas', '09:00:00', '12:00:00', 3, 'Keluar', 'Tunggu Persetujuan Kepala Bidang', '2019-12-16'),
(59, '116511002577', 'Tri Hadi Putra', 'Perencanaan', 'Sakit', '09:00:00', '10:00:00', 1, 'hhh', 'Tunggu Persetujuan Kepala Bidang', '2019-12-17'),
(60, '11651100253', 'Tami S.Pd', 'Perencanaan', 'Sakit', '09:00:00', '14:00:00', 5, 'gg', 'Disetujui Kepala Bidang', '2019-12-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(2) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nip`, `nama`, `image`, `password`, `role_id`, `is_active`) VALUES
(1, '11651100257', 'admin', 'default.jpg', '$2y$10$cfZj6c8tbHpcj3H7FRsdr.9Y38BmhBE0w6wNT9d5j6CqpXKKYsbQK', 1, 1),
(13, '11651100250', 'Suratno, S.Sos., M.Si', 'iconkaryawan2.png', '$2y$10$/ocWnReDyERcLUKaJc3CLepxxGg0jxUfEy0sUFLwNnzxUOF7TFYAO', 3, 1),
(14, '11651100251', 'Helda, S.H', 'pekanbaru.png', '$2y$10$9X9eZqiA9ceiqapUyDbEq.8Nr4iZgjTRtIPsJv6tWu2PhtpB/8EnK', 5, 1),
(15, '11651100252', 'Angga S.Pdi', 'pekanbaru1.png', '$2y$10$I/kqKXlAL98vV8s..9VXUudVce5fBD13LDXNfbQUMRVYzR.xIsIMy', 2, 1),
(16, '11651100254', 'T. Hevi Ikhwansyah, S.H., M.H', 'grafik.jpg', '$2y$10$A33QH.99Xu9gZMLkyMcXYeOgyEvITOhVu71.w393p46AapC6o1Cwa', 4, 1),
(17, '11651100253', 'Tami S.Pd', 'ok.jpg', '$2y$10$aWJWa4hh7oPgib4BprME9OtSu1QTb5Xwgw1pIH7DigfRlZtdNiwi6', 2, 1),
(18, '11651100255', 'Johan S.T', 'ana2.jpg', '$2y$10$0wggagwh9ldbIkNXStdiVekPUf5734RLS.L8m2itKWSEvhsncwfuK', 2, 1),
(19, '11651100256', 'Awaluddin S.Ikom', 'iconkaryawan3.png', '$2y$10$h/2Du8/sE6yPmcweLqL.XOwguZkR/2IjT16Fs.8qMnjfgKilepGnS', 2, 1),
(20, '116511002577', 'Tri Hadi Putra', 'Capture.PNG', '$2y$10$KSylgAVtzXM6vL/FDScUOegBBrb6ZvD59vPk2bM5Hche2dXIp5phW', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(2) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'pegawai'),
(3, 'sekretaris'),
(4, 'kepegawaian'),
(5, 'perencanaan'),
(6, 'keuangan'),
(7, 'linjamsos'),
(8, 'rehsos'),
(9, 'dayasos'),
(10, 'fakir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indeks untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indeks untuk tabel `pengajuan_izin`
--
ALTER TABLE `pengajuan_izin`
  ADD PRIMARY KEY (`id_izin`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id_klasifikasi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id_pangkat` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_izin`
--
ALTER TABLE `pengajuan_izin`
  MODIFY `id_izin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
