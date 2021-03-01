-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 05:08 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_e-raport_tunasjakasampurna`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `ID` int(11) NOT NULL,
  `NIG` varchar(10) NOT NULL,
  `Nama_Guru` varchar(128) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Tempat_Lahir` varchar(128) NOT NULL,
  `Jenis_Kelamin` varchar(128) NOT NULL,
  `Agama` varchar(128) NOT NULL,
  `Alamat` varchar(256) NOT NULL,
  `Telepon` varchar(64) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`ID`, `NIG`, `Nama_Guru`, `Tanggal_Lahir`, `Tempat_Lahir`, `Jenis_Kelamin`, `Agama`, `Alamat`, `Telepon`, `Email`, `Foto`) VALUES
(1, '2008001', 'Usep', '1994-10-03', 'Sukabumi', 'Pria', 'Islam', 'Bekasi', '088899111155', 'usep1@gmail.com', 'teacher.png'),
(2, '2008002', 'Pipin', '1994-10-04', 'Palembang', 'Wanita', 'Islam', 'Bogor', '081114447777', 'pipin2@gmail.com', 'teacher.png'),
(3, '2008003', 'Peni', '1995-10-05', 'Padang', 'Wanita', 'Islam', 'Bekasi', '082222999555', 'peni3@gmail.com', 'teacher.png'),
(4, '2008004', 'Permana', '1997-10-06', 'Bandung', 'Pria', 'Islam', 'Bekasi', '087779991111', 'permana4@gmail.com', 'teacher.png'),
(5, '2008005', 'Toyo', '1994-10-07', 'Mojokerto', 'Pria', 'Islam', 'Bogor', '085555666333', 'toyo5@gmail.com', 'teacher.png'),
(6, '2008006', 'Desna', '1997-10-08', 'Purwokerto', 'Wanita', 'Islam', 'Bogor', '08999111666', 'desna6@gmail.com', 'teacher.png'),
(7, '2008007', 'Yuni', '1995-10-09', 'Kuningan', 'Wanita', 'Islam', 'Bekasi', '084444777888', 'yuni7@gmail.com', 'teacher.png'),
(8, '2008008', 'Lutfi', '1993-10-10', 'Yogyakarta', 'Wanita', 'Islam', 'Bogor', '089992222777', 'lutfi8@gmail.com', 'teacher.png'),
(9, '2008009', 'Almas', '1995-10-11', 'Purworejo', 'Wanita', 'Islam', 'Bekasi', '085557771111', 'almas9@gmail.com', 'teacher.png'),
(10, '2008010', 'Fikri', '1996-10-12', 'Belitung', 'Pria', 'Islam', 'Bekasi', '083332222888', 'fikri10@gmail.com', 'teacher.png'),
(11, '2008011', 'Wisnu', '1994-10-13', 'Surabaya', 'Pria', 'Islam', 'Bogor', '081177711199', 'wisnu11@gmail.com', 'teacher.png'),
(12, '2008012', 'Badru', '1997-10-14', 'Garut', 'Pria', 'Islam', 'Bekasi', '084445555444', 'badru12@gmail.com', 'teacher.png'),
(13, '2008013', 'Rezah Aurellia', '1995-10-15', 'Bekasi', 'Wanita', 'Islam', 'Bekasi', '081111777333', 'rere@gmail.com', 'teacher.png');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `ID` int(11) NOT NULL,
  `Kode_Jurusan` varchar(10) NOT NULL,
  `Nama_Jurusan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`ID`, `Kode_Jurusan`, `Nama_Jurusan`) VALUES
(1, 'IPA', 'Ilmu Pengetahuan Alam'),
(2, 'IPS', 'Ilmu Pengetahuan Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `ID` int(11) NOT NULL,
  `Kode_Kelas` varchar(10) NOT NULL,
  `Nama_Kelas` varchar(128) NOT NULL,
  `Nama_Walas` varchar(128) NOT NULL,
  `Jurusan_ID` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`ID`, `Kode_Kelas`, `Nama_Kelas`, `Nama_Walas`, `Jurusan_ID`) VALUES
(1, 'KLSXA1', 'X-A', 'Permana', 1),
(2, 'KLSXA2', 'X-A', 'Almas', 2),
(3, 'KLSXIA1', 'XI-A', 'Toyo', 1),
(4, 'KLSXIA2', 'XI-A', 'Fikri', 2),
(5, 'KLSXIIA1', 'XII-A', 'Tesna', 1),
(6, 'KLSXIIA2', 'XII-A', 'Wisnu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `ID` int(11) NOT NULL,
  `Kode_Mapel` varchar(10) NOT NULL,
  `Nama_Mapel` varchar(128) NOT NULL,
  `JP` varchar(128) NOT NULL,
  `Guru_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matapelajaran`
--

INSERT INTO `matapelajaran` (`ID`, `Kode_Mapel`, `Nama_Mapel`, `JP`, `Guru_ID`) VALUES
(1, 'FSK', 'Fisika', '3', 1),
(2, 'BIO', 'Biologi', '3', 2),
(3, 'KMA', 'Kimia', '3', 3),
(4, 'MTK', 'Matematika', '2', 4),
(5, 'BING', 'Bahasa Inggris', '2', 5),
(6, 'BIN', 'Bahasa Indonesia', '2', 6),
(7, 'PKN', 'Pendidikan dan Kewarganegaraan', '2', 7),
(8, 'SSG', 'Sosiologi', '3', 8),
(9, 'SJRH', 'Sejarah', '3', 9),
(10, 'GEO', 'Geografi', '3', 10),
(11, 'EKN', 'Ekonomi', '3', 11),
(12, 'ANTRO', 'Antropologi', '3', 12),
(13, 'AK', 'Akuntansi', '3', 13);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `ID` int(11) NOT NULL,
  `NIS` varchar(64) NOT NULL,
  `Nama_Siswa` varchar(128) NOT NULL,
  `Kelas_ID` varchar(64) NOT NULL,
  `Matapelajaran_ID` varchar(64) NOT NULL,
  `Semester` varchar(64) NOT NULL,
  `Tahun_Akademik` varchar(64) NOT NULL,
  `Nilai_Tugas_1` int(11) NOT NULL,
  `Nilai_Tugas_2` int(11) NOT NULL,
  `Nilai_Tugas_3` int(11) NOT NULL,
  `Nilai_UTS` int(11) NOT NULL,
  `Nilai_UAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`ID`, `NIS`, `Nama_Siswa`, `Kelas_ID`, `Matapelajaran_ID`, `Semester`, `Tahun_Akademik`, `Nilai_Tugas_1`, `Nilai_Tugas_2`, `Nilai_Tugas_3`, `Nilai_UTS`, `Nilai_UAS`) VALUES
(1, '2019002', 'Arman', 'KLSXA2', 'Sosiologi', 'Ganjil', '2018/2019', 80, 80, 80, 85, 85),
(2, '2019002', 'Arman', 'KLSXA2', 'Sejarah', 'Ganjil', '2018/2019', 80, 80, 80, 85, 85),
(3, '2019002', 'Arman', 'KLSXA2', 'Geografi', 'Ganjil', '2018/2019', 80, 80, 80, 85, 85),
(4, '2019002', 'Arman', 'KLSXA2', 'Ekonomi', 'Ganjil', '2018/2019', 80, 80, 80, 85, 85),
(5, '2019002', 'Arman', 'KLSXA2', 'Antropologi', 'Ganjil', '2018/2019', 80, 80, 80, 85, 85),
(7, '2019002', 'Arman', 'KLSXA2', 'Akuntansi', 'Ganjil', '2018/2019', 80, 80, 80, 85, 85),
(8, '2019004', 'Putri', 'KLSXIA2', 'Sosiologi', 'Ganjil', '2018/2019', 80, 80, 80, 85, 85),
(9, '2019004', 'Putri', 'KLSXIA2', 'Sejarah', 'Ganjil', '2018/2019', 80, 80, 80, 85, 85),
(10, '2019004', 'Putri', 'KLSXIA2', 'Geografi', 'Ganjil', '2018/2019', 80, 80, 80, 85, 85),
(11, '2019004', 'Putri', 'KLSXIA2', 'Ekonomi', 'Ganjil', '2018/2019', 80, 80, 80, 85, 85),
(12, '2019004', 'Putri', 'KLSXIA2', 'Antropologi', 'Ganjil', '2018/2019', 80, 80, 80, 85, 85),
(13, '2019004', 'Putri', 'KLSXIA2', 'Akuntansi', 'Ganjil', '2018/2019', 80, 80, 80, 85, 85),
(14, '2019006', 'Ulfakarlina', 'KLSXIIA2', 'Sosiologi', 'Ganjil', '2018/2019', 80, 80, 80, 85, 85),
(15, '2019006', 'Ulfakarlina', 'KLSXIIA2', 'Sejarah', 'Ganjil', '2018/2019', 80, 80, 80, 85, 85),
(17, '2019006', 'Ulfakarlina', 'KLSXIIA2', 'Geografi', 'Ganjil', '2018/2019', 80, 80, 80, 85, 85),
(18, '2019006', 'Ulfakarlina', 'KLSXIIA2', 'Ekonomi', 'Ganjil', '2018/2019', 80, 80, 80, 85, 85),
(19, '2019006', 'Ulfakarlina', 'KLSXIIA2', 'Antropologi', 'Ganjil', '2018/2019', 80, 80, 80, 85, 85),
(20, '2019006', 'Ulfakarlina', 'KLSXIIA2', 'Akuntansi', 'Ganjil', '2018/2019', 80, 80, 80, 85, 85);

-- --------------------------------------------------------

--
-- Table structure for table `orangtua`
--

CREATE TABLE `orangtua` (
  `ID` int(11) NOT NULL,
  `Nama_Bapak` varchar(128) NOT NULL,
  `Tanggal_Lahir_Bapak` date NOT NULL,
  `Tempat_Lahir_Bapak` varchar(128) NOT NULL,
  `Agama_Bapak` varchar(128) NOT NULL,
  `Pendidikan_Bapak` varchar(128) NOT NULL,
  `Pekerjaan_Bapak` varchar(128) NOT NULL,
  `Nama_Ibu` varchar(128) NOT NULL,
  `Tanggal_Lahir_Ibu` date NOT NULL,
  `Tempat_Lahir_Ibu` varchar(128) NOT NULL,
  `Agama_Ibu` varchar(128) NOT NULL,
  `Pendidikan_Ibu` varchar(128) NOT NULL,
  `Pekerjaan_Ibu` varchar(128) NOT NULL,
  `Alamat_Orangtua` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orangtua`
--

INSERT INTO `orangtua` (`ID`, `Nama_Bapak`, `Tanggal_Lahir_Bapak`, `Tempat_Lahir_Bapak`, `Agama_Bapak`, `Pendidikan_Bapak`, `Pekerjaan_Bapak`, `Nama_Ibu`, `Tanggal_Lahir_Ibu`, `Tempat_Lahir_Ibu`, `Agama_Ibu`, `Pendidikan_Ibu`, `Pekerjaan_Ibu`, `Alamat_Orangtua`) VALUES
(1, 'Saepudin', '1980-10-01', 'Cirebon', 'Islam', 'S1', 'Wiraswasta', 'Sari', '1985-11-15', 'Bekasi', 'Islam', 'S1', 'Ibu Rumah Tangga', 'Bekasi'),
(2, 'Ismail', '1990-10-01', 'Bekasi', 'Islam', 'S1', 'Pegawai Negeri Sipil', 'Zahra', '1992-02-20', 'Bekasi', 'Islam', 'S1', 'Pegawai Negeri Sipil', 'Bekasi'),
(3, 'Faisal', '1980-10-11', 'Bogor', 'Islam', 'S1', 'Buruh Pabrik', 'Septiana', '1985-05-05', 'Jakarta', 'Islam', 'SMA/SMK Sederajat', 'Ibu Rumah Tangga', 'Bekasi'),
(4, 'Indra Birowo', '1975-07-07', 'Pamekasan', 'Islam', 'S1', 'Wiraswasta', 'Cantika', '1980-08-08', 'Cirebon', 'Islam', 'S1', 'Ibu Rumah Tangga', 'Bekasi'),
(5, 'Rahmadi', '1980-10-01', 'Keranggan', 'Islam', 'S1', 'Pegawai Negeri Sipil', 'Messa', '1983-03-03', 'Cibatu', 'Islam', 'S1', 'Ibu Rumah Tangga', 'Bekasi'),
(6, 'Sofyan', '1980-04-04', 'Tanggerang', 'Islam', 'S1', 'Pegawai Negeri Sipil', 'Linda', '1985-05-05', 'Bekasi', 'Islam', 'S1', 'Pegawai Negeri Sipil', 'Bekasi');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID` int(11) NOT NULL,
  `Kode_Pembayaran` varchar(10) NOT NULL,
  `Nama_Siswa` varchar(128) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Nama_Pembayaran` varchar(128) NOT NULL,
  `Jenis_Pembayaran` varchar(128) NOT NULL,
  `Jumlah_Pembayaran` int(128) NOT NULL,
  `Tanggal_Pembayaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`ID`, `Kode_Pembayaran`, `Nama_Siswa`, `Email`, `Nama_Pembayaran`, `Jenis_Pembayaran`, `Jumlah_Pembayaran`, `Tanggal_Pembayaran`) VALUES
(1, 'LNS0001', 'Arman', '13arman@gmail.com', 'Pembayaran SPP', 'Kartu Kredit & Debit', 250000, '2020-01-07'),
(2, 'LNS0002', 'Putri', 'uti542@gmail.com', 'Pembayaran SPP ', 'Transfer Bank', 250000, '2020-01-10'),
(3, 'LNS0003', 'Ulfakarlina', 'ulfa@gmail.com', 'Pembayaran SPP ', 'Kartu Kredit & Debit', 250000, '2020-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(128) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Foto` varchar(128) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `HakAkses_ID` int(11) NOT NULL,
  `Aktifasi` int(1) NOT NULL,
  `Waktu_Dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`ID`, `Nama`, `Email`, `Foto`, `Password`, `HakAkses_ID`, `Aktifasi`, `Waktu_Dibuat`) VALUES
(1, 'Rafly Noer', 'Cumacontoh@gmail.com', 'Google.png', '$2y$10$AqkZUZmt2EMW1SPKUWItYutpP3RftZRXQpXi/Kq9pYPoFNuizk9lS', 1, 1, 1589361505),
(2, 'Rezahaurelia', 'rere@gmail.com', 'default.jpg', '$2y$10$1FRxS.APRKOj5/G4nkEvMe4dQgbiUE2XkblY4JeHEkx27pDiG5ZTe', 2, 1, 1589477142),
(3, 'Ulfakarlina', 'ulfa@gmail.com', 'default.jpg', '$2y$10$rfWdT4SuB2GZ9hHIv5MhXufykqNuoe1g9HXuBNV4w3HfxRTb6tM1a', 3, 1, 1589563645);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_akses_menu`
--

CREATE TABLE `pengguna_akses_menu` (
  `ID` int(11) NOT NULL,
  `HakAkses_ID` int(11) NOT NULL,
  `Menu_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna_akses_menu`
--

INSERT INTO `pengguna_akses_menu` (`ID`, `HakAkses_ID`, `Menu_ID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 2),
(7, 2, 5),
(8, 3, 3),
(9, 3, 5),
(10, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_hakakses`
--

CREATE TABLE `pengguna_hakakses` (
  `ID` int(11) NOT NULL,
  `HakAkses` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna_hakakses`
--

INSERT INTO `pengguna_hakakses` (`ID`, `HakAkses`) VALUES
(1, 'Admin'),
(2, 'Teacher'),
(3, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_menu`
--

CREATE TABLE `pengguna_menu` (
  `ID` int(11) NOT NULL,
  `Menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna_menu`
--

INSERT INTO `pengguna_menu` (`ID`, `Menu`) VALUES
(1, 'Admin'),
(2, 'Teacher'),
(3, 'Student'),
(4, 'Menu'),
(5, 'Settings');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_sub_menu`
--

CREATE TABLE `pengguna_sub_menu` (
  `ID` int(11) NOT NULL,
  `Menu_ID` int(11) NOT NULL,
  `Title` varchar(128) NOT NULL,
  `Url` varchar(128) NOT NULL,
  `Icon` varchar(128) NOT NULL,
  `Aktifasi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna_sub_menu`
--

INSERT INTO `pengguna_sub_menu` (`ID`, `Menu_ID`, `Title`, `Url`, `Icon`, `Aktifasi`) VALUES
(1, 1, 'Dashboard', 'Admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 1, 'Role', 'Admin/HakAkses', 'fas fa-fw fa-user-tie', 1),
(3, 1, 'Majors', 'Admin/Jurusan', 'fas fa-fw fa-graduation-cap', 1),
(4, 1, 'Class', 'Admin/Kelas', 'fas fa-fw fa-chalkboard', 1),
(5, 1, 'Academic Subjects', 'Admin/MataPelajaran', 'fas fa-fw fa-book-reader', 1),
(6, 1, 'Teachers', 'Admin/Guru', 'fas fa-fw fa-chalkboard-teacher', 1),
(7, 1, 'Payment', 'Admin/Pembayaran', 'fas fa-fw fa-wallet', 1),
(8, 2, 'Dashboard Teacher', 'Teacher', 'fas fa-fw fa-tachometer-alt', 1),
(9, 2, 'Teacher Personal Data', 'Teacher/DataDiriGuru', 'far fa-fw fa-address-card', 1),
(10, 2, 'Input Student Data', 'Teacher/InputDataSiswa', 'fas fa-fw fa-edit', 1),
(11, 2, 'Input Parent Data', 'Teacher/InputDataOrangTua', 'fas fa-fw fa-edit', 1),
(12, 2, 'Input Score Student', 'Teacher/InputNilaiSiswa', 'fas fa-fw fa-edit', 1),
(13, 2, 'Input Raport Student', 'Teacher/InputRaportSiswa', 'fas fa-fw fa-edit', 1),
(14, 3, 'Dashboard Student', 'Student', 'fas fa-fw fa-tachometer-alt', 1),
(15, 3, 'Student Personal Data', 'Student/DataDiriSiswa', 'far fa-fw fa-address-card', 1),
(16, 3, 'Payment Information', 'Student/InfoPembayaran', 'fas fa-fw fa-file-invoice-dollar', 1),
(17, 3, 'Raport Information', 'Student/InfoRaport', 'fas fa-fw fa-book-open', 1),
(18, 4, 'Menu Management', 'Menu', 'fas fa-fw fa-folder', 1),
(19, 4, 'Sub Menu Management', 'Menu/Submenu', 'fas fa-fw fa-folder-open', 1),
(20, 4, 'Users Management', 'Menu/Pengguna', 'fas fa-fw fa-users-cog', 1),
(21, 5, 'My Profile', 'Settings/MyProfile', 'fas fa-fw fa-user', 1),
(22, 5, 'Edit Profile', 'Settings/EditProfile', 'fas fa-fw fa-user-edit', 1),
(23, 5, 'Change Password', 'Settings/UbahPassword', 'fas fa-fw fa-key', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_token`
--

CREATE TABLE `pengguna_token` (
  `ID` int(11) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Token` varchar(128) NOT NULL,
  `Waktu_Dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `raport`
--

CREATE TABLE `raport` (
  `ID` int(10) NOT NULL,
  `ID_Raport` varchar(10) NOT NULL,
  `NIS` varchar(10) NOT NULL,
  `Nama_Siswa` varchar(128) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Kelas_ID` varchar(10) NOT NULL,
  `Matapelajaran_ID` varchar(128) NOT NULL,
  `KKM` int(11) NOT NULL,
  `Nilai_Tugas_1` int(11) NOT NULL,
  `Nilai_Tugas_2` int(11) NOT NULL,
  `Nilai_Tugas_3` int(11) NOT NULL,
  `Nilai_UTS` int(11) NOT NULL,
  `Nilai_UAS` int(11) NOT NULL,
  `Nilai_Akhir` int(11) NOT NULL,
  `Predikat` varchar(10) NOT NULL,
  `Semester` varchar(64) NOT NULL,
  `Tahun_Akademik` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raport`
--

INSERT INTO `raport` (`ID`, `ID_Raport`, `NIS`, `Nama_Siswa`, `Email`, `Kelas_ID`, `Matapelajaran_ID`, `KKM`, `Nilai_Tugas_1`, `Nilai_Tugas_2`, `Nilai_Tugas_3`, `Nilai_UTS`, `Nilai_UAS`, `Nilai_Akhir`, `Predikat`, `Semester`, `Tahun_Akademik`) VALUES
(1, 'ER0001', '2019002', 'Arman', '13arman@gmail.com', 'KLSXA2', 'Sosiologi', 75, 80, 80, 80, 85, 85, 82, 'B+', 'Ganjil', '2018/2019'),
(2, 'ER0001', '2019002', 'Arman', '13arman@gmail.com', 'KLSXA2', 'Sejarah', 75, 80, 80, 80, 85, 85, 82, 'B+', 'Ganjil', '2018/2019'),
(3, 'ER0001', '2019002', 'Arman', '13arman@gmail.com', 'KLSXA2', 'Geografi', 75, 80, 80, 80, 85, 85, 82, 'B+', 'Ganjil', '2018/2019'),
(4, 'ER0001', '2019002', 'Arman', '13arman@gmail.com', 'KLSXA2', 'Ekonomi', 75, 80, 80, 80, 85, 85, 82, 'B+', 'Ganjil', '2018/2019'),
(5, 'ER0001', '2019002', 'Arman', '13arman@gmail.com', 'KLSXA2', 'Antropologi', 75, 80, 80, 80, 85, 85, 82, 'B+', 'Ganjil', '2018/2019'),
(6, 'ER0001', '2019002', 'Arman', '13arman@gmail.com', 'KLSXA2', 'Akuntansi', 75, 80, 80, 80, 85, 85, 82, 'B+', 'Ganjil', '2018/2019'),
(7, 'ER0002', '2019004', 'Putri', 'uti542@gmail.com', 'KLSXIA2', 'Sosiologi', 75, 80, 80, 80, 85, 85, 82, 'B+', 'Ganjil', '2018/2019'),
(8, 'ER0002', '2019004', 'Putri', 'uti542@gmail.com', 'KLSXIA2', 'Sejarah', 75, 80, 80, 80, 85, 85, 82, 'B+', 'Ganjil', '2018/2019'),
(9, 'ER0002', '2019002', 'Putri', 'uti542@gmail.com', 'KLSXIA2', 'Geografi', 75, 80, 80, 80, 85, 85, 82, 'B+', 'Ganjil', '2018/2019'),
(10, 'ER0002', '2019004', 'Putri', 'uti542@gmail.com', 'KLSXIA2', 'Ekonomi', 75, 80, 80, 80, 85, 85, 82, 'B+', 'Ganjil', '2018/2019'),
(11, 'ER0002', '2019004', 'Putri', 'uti542@gmail.com', 'KLSXIA2', 'Antropologi', 75, 80, 80, 80, 85, 85, 82, 'B+', 'Ganjil', '2018/2019'),
(12, 'ER0002', '2019004', 'Putri', 'uti542@gmail.com', 'KLSXIA2', 'Akuntansi', 75, 80, 80, 80, 85, 85, 82, 'B+', 'Ganjil', '2018/2019'),
(13, 'ER0003', '2019006', 'Ulfakarlina', 'ulfa@gmail.com', 'KLSXIIA2', 'Sosiologi', 75, 80, 80, 80, 85, 85, 82, 'B+', 'Ganjil', '2018/2019'),
(14, 'ER0003', '2019006', 'Ulfakarlina', 'ulfa@gmail.com', 'KLSXIIA2', 'Sejarah', 75, 80, 80, 80, 85, 85, 82, 'B+', 'Ganjil', '2018/2019'),
(15, 'ER0003', '2019006', 'Ulfakarlina', 'ulfa@gmail.com', 'KLSXIIA2', 'Geografi', 75, 80, 80, 80, 85, 85, 82, 'B+', 'Ganjil', '2018/2019'),
(16, 'ER0003', '2019006', 'Ulfakarlina', 'ulfa@gmail.com', 'KLSXIIA2', 'Ekonomi', 75, 80, 80, 80, 85, 85, 82, 'B+', 'Ganjil', '2018/2019'),
(17, 'ER0003', '2019006', 'Ulfakarlina', 'ulfa@gmail.com', 'KLSXIIA2', 'Antropologi', 75, 80, 80, 80, 85, 85, 82, 'B+', 'Ganjil', '2018/2019'),
(18, 'ER0003', '2019006', 'Ulfakarlina', 'ulfa@gmail.com', 'KLSXIIA2', 'Akuntansi', 75, 80, 80, 80, 85, 85, 82, 'B+', 'Ganjil', '2018/2019');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `ID` int(11) NOT NULL,
  `NIS` varchar(10) NOT NULL,
  `Nama_Siswa` varchar(128) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Tempat_Lahir` varchar(128) NOT NULL,
  `Jenis_Kelamin` varchar(128) NOT NULL,
  `Agama` varchar(128) NOT NULL,
  `Alamat` varchar(256) NOT NULL,
  `Telepon` varchar(128) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Foto` varchar(128) NOT NULL,
  `Orangtua_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`ID`, `NIS`, `Nama_Siswa`, `Tanggal_Lahir`, `Tempat_Lahir`, `Jenis_Kelamin`, `Agama`, `Alamat`, `Telepon`, `Email`, `Foto`, `Orangtua_ID`) VALUES
(1, '2019001', 'Amir', '2004-03-02', 'Bekasi', 'Pria', 'Islam', 'Bekasi', '081234567891', 'amir12@gmail.com', 'student.png', 1),
(2, '2019002', 'Arman', '2003-04-04', 'Bekasi', 'Pria', 'Islam', 'Bekasi', '081234567892', '13arman@gmail.com', 'student.png', 2),
(3, '2019003', 'Azril', '2004-07-27', 'Jakarta', 'Pria', 'Islam', 'Bekasi', '081234567893', 'azrill67@gmail.com', 'student.png', 3),
(4, '2019004', 'Putri', '2003-09-13', 'Bekasi', 'Wanita', 'Islam', 'Bekasi', '081234567894', 'uti542@gmail.com', 'student.png', 4),
(5, '2019005', 'Saidar', '2005-11-01', 'Bandung', 'Wanita', 'Islam', 'Bekasi', '081234567895', 'saidar9@gmail.com', 'student.png', 5),
(6, '2019006', 'Ulfakarlina', '2003-01-07', 'Bekasi', 'Wanita', 'Islam', 'Bekasi', '081234567896', 'ulfa@gmail.com', 'student.png', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orangtua`
--
ALTER TABLE `orangtua`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pengguna_akses_menu`
--
ALTER TABLE `pengguna_akses_menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pengguna_hakakses`
--
ALTER TABLE `pengguna_hakakses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pengguna_menu`
--
ALTER TABLE `pengguna_menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pengguna_sub_menu`
--
ALTER TABLE `pengguna_sub_menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pengguna_token`
--
ALTER TABLE `pengguna_token`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `raport`
--
ALTER TABLE `raport`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengguna_akses_menu`
--
ALTER TABLE `pengguna_akses_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pengguna_hakakses`
--
ALTER TABLE `pengguna_hakakses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengguna_menu`
--
ALTER TABLE `pengguna_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengguna_sub_menu`
--
ALTER TABLE `pengguna_sub_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pengguna_token`
--
ALTER TABLE `pengguna_token`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `raport`
--
ALTER TABLE `raport`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
