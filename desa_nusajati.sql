-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for desa_nusajati
CREATE DATABASE IF NOT EXISTS `desa_nusajati` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `desa_nusajati`;

-- Dumping structure for table desa_nusajati.apbdes_infografis
CREATE TABLE IF NOT EXISTS `apbdes_infografis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `tahun` year DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table desa_nusajati.apbdes_infografis: ~2 rows (approximately)
INSERT INTO `apbdes_infografis` (`id`, `judul`, `tahun`, `gambar`, `created_at`) VALUES
	(2, 'APBDes 2026', '2026', '17721806972026.jpeg', '2026-02-27 08:24:57'),
	(3, 'APBDes 2025', '2025', '17721809802025.jpeg', '2026-02-27 08:29:40');

-- Dumping structure for table desa_nusajati.berita
CREATE TABLE IF NOT EXISTS `berita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table desa_nusajati.berita: ~0 rows (approximately)
INSERT INTO `berita` (`id`, `judul`, `isi`, `gambar`, `tanggal`) VALUES
	(3, 'Gotong Royong Warga Desa Nusajati Bersihkan Lingkungan Sambut Musim Hujan', '<blockquote><p>Desa Nusajati</p></blockquote><p><i><strong>Warga Desa Nusajati</strong></i> melaksanakan kegiatan gotong royong membersihkan lingkungan pada hari Minggu pagi sebagai bentuk persiapan menghadapi musim hujan. Kegiatan ini melibatkan perangkat desa, karang taruna, serta masyarakat dari berbagai dusun yang bekerja bersama membersihkan selokan, memotong rumput liar, dan mengumpulkan sampah di area sekitar permukiman.</p><p>Kepala Desa Nusajati menyampaikan bahwa kegiatan gotong royong merupakan tradisi yang harus terus dijaga karena mampu mempererat kebersamaan sekaligus menjaga kebersihan lingkungan. Dengan lingkungan yang bersih, risiko banjir dan penyebaran penyakit dapat diminimalkan.<br><br>Selain itu, kegiatan ini juga menjadi sarana edukasi bagi generasi muda untuk menumbuhkan rasa peduli terhadap lingkungan. Warga terlihat antusias mengikuti kegiatan sejak pagi hingga siang hari dengan suasana penuh kebersamaan.</p><p>Pemerintah desa berharap kegiatan gotong royong dapat dilaksanakan secara rutin agar Desa Nusajati tetap bersih, sehat, dan nyaman bagi seluruh masyarakat.</p>', 'gtg ryg.jpeg', '2026-02-24 08:23:00'),
	(4, 'Gotong Royong Warga Desa Nusajati ', '<blockquote><p>Desa Nusajati</p></blockquote><p><i><strong>Warga Desa Nusajati</strong></i> melaksanakan kegiatan gotong royong membersihkan lingkungan pada hari Minggu pagi sebagai bentuk persiapan menghadapi musim hujan. Kegiatan ini melibatkan perangkat desa, karang taruna, serta masyarakat dari berbagai dusun yang bekerja bersama membersihkan selokan, memotong rumput liar, dan mengumpulkan sampah di area sekitar permukiman.</p><p>Kepala Desa Nusajati menyampaikan bahwa kegiatan gotong royong merupakan tradisi yang harus terus dijaga karena mampu mempererat kebersamaan sekaligus menjaga kebersihan lingkungan. Dengan lingkungan yang bersih, risiko banjir dan penyebaran penyakit dapat diminimalkan.<br><br>Selain itu, kegiatan ini juga menjadi sarana edukasi bagi generasi muda untuk menumbuhkan rasa peduli terhadap lingkungan. Warga terlihat antusias mengikuti kegiatan sejak pagi hingga siang hari dengan suasana penuh kebersamaan.</p><p>Pemerintah desa berharap kegiatan gotong royong dapat dilaksanakan secara rutin agar Desa Nusajati tetap bersih, sehat, dan nyaman bagi seluruh masyarakat.</p>', 'gtg ryg.jpeg', '2026-02-25 09:49:03');

-- Dumping structure for table desa_nusajati.login
CREATE TABLE IF NOT EXISTS `login` (
  `id` int NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table desa_nusajati.login: ~4 rows (approximately)
INSERT INTO `login` (`id`, `nama`, `username`, `email`, `password`, `level`) VALUES
	(1, 'Administrator', 'admin', 'admin@e-suratdesa.com', 'admin123', 'admin'),
	(2, 'Kepala Desa', 'kades', 'kepaladesa@desa.id', 'admin123', 'kades'),
	(1, 'Administrator', 'admin', 'admin@e-suratdesa.com', 'admin123', 'admin'),
	(2, 'Kepala Desa', 'kades', 'kepaladesa@desa.id', 'admin123', 'kades');

-- Dumping structure for table desa_nusajati.pejabat_desa
CREATE TABLE IF NOT EXISTS `pejabat_desa` (
  `id_pejabat_desa` int NOT NULL AUTO_INCREMENT,
  `parent_id` int DEFAULT NULL,
  `nama_pejabat` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `ttd` varchar(255) DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pos_x` int DEFAULT '0',
  `pos_y` int DEFAULT '0',
  PRIMARY KEY (`id_pejabat_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table desa_nusajati.pejabat_desa: ~11 rows (approximately)
INSERT INTO `pejabat_desa` (`id_pejabat_desa`, `parent_id`, `nama_pejabat`, `jabatan`, `nip`, `ttd`, `status`, `created_at`, `pos_x`, `pos_y`) VALUES
	(1, NULL, 'SUPARNO', 'Kepala Desa', '123456789', 'Tanda_Tangan.png', 'aktif', '2026-02-16 13:54:12', 0, 0),
	(2, 1, 'MUSODIK HAMZAH', 'Kepala Seksi Pelayanan', '0987654321', '1771251820_sekdes.png', 'aktif', '2026-02-16 14:23:40', 0, 0),
	(3, 1, 'NAJIB MA\'RUF, S.T', 'Kepala Seksi Kesejahteraan', '098765432123456789', '1771254231_kades.png', 'aktif', '2026-02-16 15:03:51', 0, 0),
	(10, 1, 'URIP SUGIARTO, S.PD', 'Sekretaris Desa', '098765432123456789', '1771433950_sekdes.png', 'aktif', '2026-02-18 16:59:10', 0, 0),
	(11, 1, 'LISA RAHMATIKA E', 'Kepala Seksi Pemerintahan', '098765432123456789', '1771434528_', 'aktif', '2026-02-18 17:08:48', 0, 0),
	(12, 1, 'ROJIKIN', 'Kadus Gombol', '098765432123456789', '1772136748_', 'aktif', '2026-02-26 20:12:28', 0, 0),
	(13, 10, 'SUDARMAN, S.PD.I', 'Kaur Keuangan', '098765432123456789', '1772136902_', 'aktif', '2026-02-26 20:15:02', 0, 0),
	(14, 1, 'SUDIRNO', 'Kadus Tinggarmalang', '098765432123456789', '1772142170_', 'aktif', '2026-02-26 21:42:50', 0, 0),
	(15, 10, 'ALI SAOGI M, S.PD.I', 'Kaur Umum & Perencanaan', '098765432123456789', '1772142262_', 'aktif', '2026-02-26 21:44:22', 0, 0),
	(18, 1, 'CIPTO SUHARTO', 'Kadus Criwis', '098765432123456789', '1772145626_', 'aktif', '2026-02-26 22:40:26', 0, 0),
	(19, 1, 'RIZQY PARYUDHA, S.T', 'Kadus Gunung Bawang', '098765432123456789', '1772543153_', 'aktif', '2026-03-03 13:05:53', 0, 0);

-- Dumping structure for table desa_nusajati.penduduk
CREATE TABLE IF NOT EXISTS `penduduk` (
  `id_penduduk` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `pend_terakhir` varchar(20) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `kewarganegaraan` varchar(5) NOT NULL,
  PRIMARY KEY (`nik`),
  KEY `idx_id_penduduk` (`id_penduduk`)
) ENGINE=InnoDB AUTO_INCREMENT=2455 DEFAULT CHARSET=latin1;

-- Dumping data for table desa_nusajati.penduduk: ~20 rows (approximately)
INSERT INTO `penduduk` (`id_penduduk`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `no_kk`, `pend_terakhir`, `pekerjaan`, `status_perkawinan`, `kewarganegaraan`) VALUES
	(2426, '3173016408881001', 'FENZY TESTING', 'Cilacap', '1999-05-20', 'Laki-laki', 'Protestan', '001', '002', 'Nusajati', 'Sampang', '', '330213090160007', 'SLTP/SEDERAJAT', 'Mahasiswa', 'Cerai', 'WNI'),
	(100, '3173016408881003', 'FENZY TESTING', 'Cilacap', '1999-05-20', 'Laki-laki', 'Katholik', '001', '001', 'Nusajati', 'Sampang', '', '330213090160002', 'SLTP/SEDERAJAT', 'Mahasiswa', 'Cerai', 'WNI'),
	(2437, '3173016408881006', 'FENZY TESTING', 'Cilacap', '1970-01-01', 'Laki-laki', 'Protestan', '1', '2', 'Nusajati', 'Sampang', '', '330213090160007', 'SLTP/SEDERAJAT', 'Mahasiswa', 'Cerai', 'WNI'),
	(2439, '3173016408881009', 'FENZY TESTING', 'Cilacap', '1970-01-01', 'Laki-laki', 'Katholik', '1', '1', 'Nusajati', 'Sampang', '', '330213090160002', 'SLTP/SEDERAJAT', 'Mahasiswa', 'Cerai', 'WNI'),
	(2442, '3173016408881016', 'FENZY TESTING', 'Cilacap', '1970-01-01', 'Laki-laki', 'Protestan', '1', '2', 'Nusajati', 'Sampang', '', '330213090160007', 'SLTP/SEDERAJAT', 'Mahasiswa', 'Cerai', 'WNI'),
	(2443, '3173016408881018', 'FENZY TESTING', 'Cilacap', '1970-01-01', 'Laki-laki', 'Islam', '1', '2', 'Nusajati', 'Sampang', 'cilacap', '330213090160004', 'SLTP/SEDERAJAT', 'Mahasiswa', 'Cerai', 'WNI'),
	(2444, '3173016408881019', 'FENZY TESTING', 'Cilacap', '1970-01-01', 'Laki-laki', 'Katholik', '1', '1', 'Nusajati', 'Sampang', '', '330213090160002', 'SLTP/SEDERAJAT', 'Mahasiswa', 'Cerai', 'WNI'),
	(2452, '3173016408881023', 'FENZY TESTING', 'Cilacap', '1970-01-01', 'Laki-laki', 'Protestan', '1', '2', 'Nusajati', 'Sampang', 'cilacap', '330213090160007', 'SLTP/SEDERAJAT', 'Mahasiswa', 'Cerai', 'WNI'),
	(2453, '3173016408881024', 'FENZY TESTING', 'Cilacap', '1970-01-01', 'Laki-laki', 'Islam', '1', '2', 'Nusajati', 'Sampang', 'cilacap', '330213090160004', 'SLTP/SEDERAJAT', 'Mahasiswa', 'Cerai', 'WNI'),
	(2454, '3173016408881025', 'FENZY TESTING', 'Cilacap', '1970-01-01', 'Laki-laki', 'Katholik', '1', '1', 'Nusajati', 'Sampang', 'cilacap', '330213090160002', 'SLTP/SEDERAJAT', 'Mahasiswa', 'Cerai', 'WNI'),
	(2420, '3173016408881077', 'FENZY TESTING', 'Cilacap', '1999-05-20', 'Laki-laki', 'Islam', '1', '2', 'Nusajati', 'Sampang', 'cilacap', '330213090160004', 'SLTP/SEDERAJAT', 'Mahasiswa', 'Cerai', 'WNI'),
	(2438, '3173016408881078', 'FENZY TESTING', 'Cilacap', '1970-01-01', 'Laki-laki', 'Islam', '1', '2', 'Nusajati', 'Sampang', 'cilacap', '330213090160004', 'SLTP/SEDERAJAT', 'Mahasiswa', 'Cerai', 'WNI'),
	(2432, '3302130203620003', 'FENZY ', 'Cilacap', '2026-02-26', 'Perempuan', 'Hindu', '004', '001', 'Nusajati', 'Sampang', 'Kabupaten Cilacap', '234675432109875', 'SD/SEDERAJAT', 'Kerja', 'Menikah', 'WNI'),
	(2435, '3302130203620004', 'FENZY', 'Cilacap', '1970-01-01', 'Perempuan', 'Hindu', '4', '1', 'Nusajati', 'Sampang', 'Kabupaten Cilacap', '234675432109875', 'SD/SEDERAJAT', 'Kerja', 'Menikah', 'WNI'),
	(2440, '3302130203620014', 'FENZY', 'Cilacap', '1970-01-01', 'Perempuan', 'Hindu', '4', '1', 'Nusajati', 'Sampang', 'Kabupaten Cilacap', '234675432109875', 'SD/SEDERAJAT', 'Kerja', 'Menikah', 'WNI'),
	(2450, '3302130203620021', 'FENZY', 'Cilacap', '1970-01-01', 'Perempuan', 'Hindu', '4', '1', 'Nusajati', 'Sampang', 'Kabupaten Cilacap', '234675432109875', 'SD/SEDERAJAT', 'Kerja', 'Menikah', 'WNI'),
	(2431, '3310025209050001', 'FENZY TESTING', 'Cilacap', '2026-02-25', 'Perempuan', 'Kristen', '006', '001', 'Nusajati', 'Sampang', '', '234675432109875', 'SD/SEDERAJAT', 'Kerja', 'Menikah', 'WNI'),
	(2436, '3310025209050005', 'FENZY TESTING', 'Cilacap', '1970-01-01', 'Perempuan', 'Kristen', '6', '1', 'Nusajati', 'Sampang', '', '234675432109875', 'SD/SEDERAJAT', 'Kerja', 'Menikah', 'WNI'),
	(2441, '3310025209050015', 'FENZY TESTING', 'Cilacap', '1970-01-01', 'Perempuan', 'Kristen', '6', '1', 'Nusajati', 'Sampang', '', '234675432109875', 'SD/SEDERAJAT', 'Kerja', 'Menikah', 'WNI'),
	(2451, '3310025209050022', 'FENZY TESTING', 'Cilacap', '1970-01-01', 'Perempuan', 'Kristen', '6', '1', 'Nusajati', 'Sampang', 'cilacap', '234675432109875', 'SD/SEDERAJAT', 'Kerja', 'Menikah', 'WNI');

-- Dumping structure for table desa_nusajati.penduduk_baru
CREATE TABLE IF NOT EXISTS `penduduk_baru` (
  `id_penduduk` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `pend_terakhir` varchar(20) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `kewarganegaraan` varchar(5) NOT NULL,
  PRIMARY KEY (`nik`),
  KEY `idx_id_penduduk` (`id_penduduk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table desa_nusajati.penduduk_baru: ~0 rows (approximately)

-- Dumping structure for table desa_nusajati.pengaduan
CREATE TABLE IF NOT EXISTS `pengaduan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `isi_laporan` text NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `status` enum('TERKIRIM','DIPROSES','SELESAI') DEFAULT 'TERKIRIM',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `anonim` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table desa_nusajati.pengaduan: ~3 rows (approximately)
INSERT INTO `pengaduan` (`id`, `nama`, `isi_laporan`, `lokasi`, `status`, `created_at`, `anonim`) VALUES
	(1, 'fenzy', 'jalan rusak', 'jalan', 'TERKIRIM', '2026-02-16 03:42:29', 0),
	(2, 'fenzy', 'rusak', 'jalan', 'DIPROSES', '2026-02-16 03:43:14', 0),
	(3, 'fenzy', 'lorem', 'Yogyakarta', 'TERKIRIM', '2026-02-19 09:58:22', 1);

-- Dumping structure for table desa_nusajati.profil_desa
CREATE TABLE IF NOT EXISTS `profil_desa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_desa` varchar(150) NOT NULL,
  `kecamatan` varchar(150) NOT NULL,
  `kabupaten` varchar(150) NOT NULL,
  `provinsi` varchar(150) NOT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `luas_wilayah` varchar(100) DEFAULT NULL,
  `jumlah_dusun` int DEFAULT NULL,
  `jumlah_rt` int DEFAULT NULL,
  `jumlah_rw` int DEFAULT NULL,
  `foto_kades` varchar(255) DEFAULT NULL,
  `sambutan` longtext,
  `visi` text,
  `misi` text,
  `letak_geografis` text,
  `batas_utara` varchar(255) DEFAULT NULL,
  `batas_selatan` varchar(255) DEFAULT NULL,
  `batas_timur` varchar(255) DEFAULT NULL,
  `batas_barat` varchar(255) DEFAULT NULL,
  `foto_peta` varchar(255) DEFAULT NULL,
  `video_profil` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table desa_nusajati.profil_desa: ~1 rows (approximately)
INSERT INTO `profil_desa` (`id`, `nama_desa`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `alamat`, `telepon`, `email`, `updated_at`, `luas_wilayah`, `jumlah_dusun`, `jumlah_rt`, `jumlah_rw`, `foto_kades`, `sambutan`, `visi`, `misi`, `letak_geografis`, `batas_utara`, `batas_selatan`, `batas_timur`, `batas_barat`, `foto_peta`, `video_profil`) VALUES
	(1, 'Nusajati', 'Sampang', 'Cilacap', 'Jawa Tengah', '53273', 'Tinggarmalang, Nusajati, Sampang, Cilacap, Jawa Tengah', '08123456789', 'pemdesnusajati@gmail.com', '2026-02-27 16:36:57', '10000', 2, 4, 5, '1772126525_default.jpeg', '<blockquote><p>Assalamu’alaikum Warahmatullahi Wabarakatuh.</p></blockquote><blockquote><p><br>Puji syukur kita panjatkan ke hadirat Tuhan Yang Maha Esa atas rahmat dan karunia-Nya sehingga Website Sistem Informasi Desa Nusajati dapat hadir sebagai media informasi dan pelayanan bagi masyarakat.<br><br>Website ini merupakan komitmen Pemerintah Desa Nusajati dalam mewujudkan tata kelola pemerintahan yang transparan, akuntabel, serta adaptif terhadap perkembangan teknologi digital.<br><br>Kami berharap melalui platform ini masyarakat dapat dengan mudah memperoleh informasi desa, mengakses layanan administrasi, menyampaikan aspirasi, serta ikut berpartisipasi dalam pembangunan desa.<br><br>Akhir kata, kami mengucapkan terima kasih atas dukungan seluruh masyarakat Desa Nusajati. Semoga desa kita semakin maju, mandiri, dan sejahtera.<br>&nbsp;</p></blockquote><blockquote><p>Wassalamu’alaikum Warahmatullahi Wabarakatuh.</p></blockquote><p><br><strong>Kepala Desa Nusajati</strong><br>&nbsp;</p>', '<p>Mewujudkan Desa Nusajati yang <strong>maju, mandiri, berdaya saing, dan sejahtera </strong>melalui tata kelola pemerintahan yang transparan, pelayanan publik yang profesional, serta pembangunan berbasis potensi lokal.</p>', '<ul><li>Meningkatkan kualitas pelayanan publik berbasis digital.</li><li>Mendorong pertumbuhan ekonomi desa melalui UMKM dan potensi lokal.</li><li>Meningkatkan kualitas sumber daya manusia melalui pendidikan dan pelatihan.</li><li>Mewujudkan pemerintahan desa yang transparan dan akuntabel.</li><li>Meningkatkan partisipasi masyarakat dalam pembangunan desa.</li><li>Menjaga kelestarian lingkungan dan budaya lokal.</li></ul><p>&nbsp;</p>', 'Desa Nusajati terletak di wilayah Kecamatan Sampang, Kabupaten Cilacap, Provinsi Jawa Tengah. Secara administratif, desa ini merupakan bagian dari wilayah pemerintahan Kabupaten Cilacap.                                                ', 'Sidasari', 'Ketanggung dan Sikampuh', 'Karang Jati', 'Maos', '1772129819_peta.jpg', '');

-- Dumping structure for table desa_nusajati.sambutan_kades
CREATE TABLE IF NOT EXISTS `sambutan_kades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) DEFAULT NULL,
  `isi` longtext,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table desa_nusajati.sambutan_kades: ~0 rows (approximately)
INSERT INTO `sambutan_kades` (`id`, `foto`, `isi`, `updated_at`) VALUES
	(1, '1772123671default.jpeg', '<h2>cekkk</h2>', '2026-02-26 16:36:20');

-- Dumping structure for table desa_nusajati.struktur_organisasi
CREATE TABLE IF NOT EXISTS `struktur_organisasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table desa_nusajati.struktur_organisasi: ~1 rows (approximately)
INSERT INTO `struktur_organisasi` (`id`, `gambar`, `updated_at`) VALUES
	(1, 'struktur_organisasi.png', '2026-03-04 15:03:58');

-- Dumping structure for table desa_nusajati.surat_ijin_keramaian
CREATE TABLE IF NOT EXISTS `surat_ijin_keramaian` (
  `id_sik` int NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_surat` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nik` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bukti_ktp` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bukti_kk` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_acara` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_acara` datetime NOT NULL,
  `waktu_acara` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hiburan_acara` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_undangan` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_acara` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pejabat_desa` int DEFAULT NULL,
  `status_surat` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `id_profil_desa` int DEFAULT NULL,
  `kode_tracking` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_dibuat` datetime DEFAULT NULL,
  `surat_rt` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `surat_rw` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alasan_tolak` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_sik`),
  KEY `nik` (`nik`),
  KEY `id_pejabat_desa` (`id_pejabat_desa`),
  KEY `id_profil_desa` (`id_profil_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table desa_nusajati.surat_ijin_keramaian: ~5 rows (approximately)
INSERT INTO `surat_ijin_keramaian` (`id_sik`, `jenis_surat`, `no_surat`, `nik`, `no_hp`, `bukti_ktp`, `bukti_kk`, `nama_acara`, `tanggal_acara`, `waktu_acara`, `hiburan_acara`, `jumlah_undangan`, `tempat_acara`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`, `kode_tracking`, `tanggal_dibuat`, `surat_rt`, `surat_rw`, `alasan_tolak`) VALUES
	(25, 'Surat Ijin Keramaian', '4040', '3173016408881003', '081285488433', 'KTP_TRK-20260303185113.jpg', 'KK_TRK-20260303185113.jpg', 'Tasyakuran', '2026-03-04 00:00:00', '2026-03-03 19:17:59', 'orkes', '40', 'rumah', '2026-03-04 01:51:13', 1, 'SELESAI', 1, 'TRK-20260303185113', '2026-03-03 00:00:00', 'SURAT_RT_TRK-20260303185113.docx', 'SURAT_RW_TRK-20260303185113.docx', 'dokumen tidk sesuai'),
	(26, 'Surat Ijin Keramaian', NULL, '3173016408881003', '081285488433', 'KTP_TRK-20260303193932.jpg', 'KK_TRK-20260303193932.png', 'Hajatan', '2026-03-04 00:00:00', '2026-03-03 19:40:10', 'orkes', '40', 'rumah', '2026-03-04 02:39:32', NULL, 'DITOLAK', 1, 'TRK-20260303193932', NULL, 'SURAT_RT_TRK-20260303193932.docx', 'SURAT_RW_TRK-20260303193932.docx', 'dokumen tidak sesuai'),
	(27, 'Surat Ijin Keramaian', NULL, '3173016408881003', '081285488433', 'KTP_TRK-20260304080923.jpg', 'KK_TRK-20260304080923.jpg', 'Hajatan', '2026-03-04 00:00:00', '2026-03-04 09:47:20', 'orkes', '40', 'rumah', '2026-03-04 15:09:23', NULL, 'DITOLAK', 1, 'TRK-20260304080923', NULL, 'SURAT_RT_TRK-20260304080923.docx', 'SURAT_RW_TRK-20260304080923.docx', 'data tidak sesuai'),
	(28, 'Surat Ijin Keramaian', '03', '3173016408881003', '081285488433', 'KTP_TRK-20260304095131.jpg', 'KK_TRK-20260304095131.jpg', 'Tasyakuran', '2026-03-04 00:00:00', '2026-03-04 11:41:42', 'orkes', '40', 'rumah', '2026-03-04 16:51:31', 1, 'SELESAI', 1, 'TRK-20260304095131', '2026-03-04 00:00:00', 'SURAT_RT_TRK-20260304095131.docx', 'SURAT_RW_TRK-20260304095131.docx', NULL);

-- Dumping structure for table desa_nusajati.surat_keterangan
CREATE TABLE IF NOT EXISTS `surat_keterangan` (
  `id_sk` int NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(20) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `keperluan` varchar(50) NOT NULL,
  `masa_berlaku` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `tanggal_surat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pejabat_desa` int DEFAULT NULL,
  `status_surat` varchar(20) DEFAULT NULL,
  `id_profil_desa` int DEFAULT NULL,
  `kode_tracking` varchar(50) DEFAULT NULL,
  `tanggal_dibuat` datetime DEFAULT NULL,
  `bukti_ktp` varchar(255) DEFAULT NULL,
  `bukti_kk` varchar(255) DEFAULT NULL,
  `surat_rt` varchar(255) DEFAULT NULL,
  `surat_rw` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_sk`),
  KEY `idx_nik` (`nik`),
  KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  KEY `idx_id_profil_desa` (`id_profil_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;

-- Dumping data for table desa_nusajati.surat_keterangan: ~1 rows (approximately)
INSERT INTO `surat_keterangan` (`id_sk`, `jenis_surat`, `no_surat`, `nik`, `no_hp`, `keperluan`, `masa_berlaku`, `keterangan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`, `kode_tracking`, `tanggal_dibuat`, `bukti_ktp`, `bukti_kk`, `surat_rt`, `surat_rw`) VALUES
	(169, 'Surat Keterangan', '03', '3173016408881003', '081285488433', 'beasiswa', '', '', '2026-03-04 15:20:57', 1, 'SELESAI', 1, 'TRK-20260304082057', '2026-03-04 00:00:00', 'KTP_TRK-20260304082057.jpg', 'KK_TRK-20260304082057.jpg', 'SURAT_RT_TRK-20260304082057.docx', 'SURAT_RW_TRK-20260304082057.docx');

-- Dumping structure for table desa_nusajati.surat_keterangan_domisili_tempat_tinggal
CREATE TABLE IF NOT EXISTS `surat_keterangan_domisili_tempat_tinggal` (
  `id_skd` int NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(20) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pejabat_desa` int DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int DEFAULT NULL,
  `kode_tracking` varchar(50) DEFAULT NULL,
  `tanggal_dibuat` datetime DEFAULT NULL,
  `bukti_ktp` varchar(255) DEFAULT NULL,
  `bukti_kk` varchar(255) DEFAULT NULL,
  `surat_rt` varchar(255) DEFAULT NULL,
  `surat_rw` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_skd`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table desa_nusajati.surat_keterangan_domisili_tempat_tinggal: ~2 rows (approximately)
INSERT INTO `surat_keterangan_domisili_tempat_tinggal` (`id_skd`, `jenis_surat`, `no_surat`, `nik`, `no_hp`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`, `kode_tracking`, `tanggal_dibuat`, `bukti_ktp`, `bukti_kk`, `surat_rt`, `surat_rw`) VALUES
	(4, 'Surat Keterangan Domisili Tempat Tinggal', '03', '3173016408881003', '081285488433', 'syarat', '2026-03-04 15:21:51', 1, 'SELESAI', 1, 'TRK-20260304082151', '2026-03-04 00:00:00', 'KTP_TRK-20260304082151.jpg', 'KK_TRK-20260304082151.png', 'SURAT_RT_TRK-20260304082151.docx', 'SURAT_RW_TRK-20260304082151.docx');

-- Dumping structure for table desa_nusajati.surat_keterangan_tidak_mampu
CREATE TABLE IF NOT EXISTS `surat_keterangan_tidak_mampu` (
  `id_sktm` int NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(20) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pejabat_desa` int DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int DEFAULT NULL,
  `kode_tracking` varchar(50) DEFAULT NULL,
  `tanggal_dibuat` datetime DEFAULT NULL,
  `bukti_ktp` varchar(255) DEFAULT NULL,
  `bukti_kk` varchar(255) DEFAULT NULL,
  `surat_rt` varchar(255) DEFAULT NULL,
  `surat_rw` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_sktm`),
  KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  KEY `idx_nik` (`nik`),
  KEY `idx_id_profil_desa` (`id_profil_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table desa_nusajati.surat_keterangan_tidak_mampu: ~1 rows (approximately)
INSERT INTO `surat_keterangan_tidak_mampu` (`id_sktm`, `jenis_surat`, `no_surat`, `nik`, `no_hp`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`, `kode_tracking`, `tanggal_dibuat`, `bukti_ktp`, `bukti_kk`, `surat_rt`, `surat_rw`) VALUES
	(15, 'Surat Keterangan Tidak Mampu', NULL, '3173016408881003', '081285488433', 'beasiswa', '2026-03-04 15:22:42', NULL, 'PENDING', 1, 'TRK-20260304082242', NULL, 'KTP_TRK-20260304082242.jpg', 'KK_TRK-20260304082242.png', 'SURAT_RT_TRK-20260304082242.docx', 'SURAT_RW_TRK-20260304082242.docx');

-- Dumping structure for table desa_nusajati.surat_keterangan_usaha
CREATE TABLE IF NOT EXISTS `surat_keterangan_usaha` (
  `id_sku` int NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(20) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `usaha` varchar(30) DEFAULT NULL,
  `alamat_usaha` varchar(200) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pejabat_desa` int DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int DEFAULT NULL,
  `kode_tracking` varchar(50) DEFAULT NULL,
  `tanggal_dibuat` datetime DEFAULT NULL,
  `bukti_ktp` varchar(255) DEFAULT NULL,
  `bukti_kk` varchar(255) DEFAULT NULL,
  `surat_rt` varchar(255) DEFAULT NULL,
  `surat_rw` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_sku`),
  KEY `idx_nik` (`nik`),
  KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  KEY `idx_id_profil_desa` (`id_profil_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table desa_nusajati.surat_keterangan_usaha: ~2 rows (approximately)
INSERT INTO `surat_keterangan_usaha` (`id_sku`, `jenis_surat`, `no_surat`, `nik`, `no_hp`, `usaha`, `alamat_usaha`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`, `kode_tracking`, `tanggal_dibuat`, `bukti_ktp`, `bukti_kk`, `surat_rt`, `surat_rw`) VALUES
	(14, 'Surat Keterangan Usaha', NULL, '3173016408881003', '081285488433', 'toko', 'cilacap', 'syarat', '2026-03-04 15:23:45', NULL, 'PENDING', 1, 'TRK-20260304082345', NULL, 'KTP_TRK-20260304082345.png', '', 'SURAT_RT_TRK-20260304082345.docx', 'SURAT_RW_TRK-20260304082345.docx'),
	(15, 'Surat Keterangan Usaha', NULL, '3173016408881003', '081285488433', 'toko', 'cilacap', 'syarat', '2026-03-04 15:24:22', NULL, 'PENDING', 1, 'TRK-20260304082422', NULL, 'KTP_TRK-20260304082422.png', 'KK_TRK-20260304082422.jpg', 'SURAT_RT_TRK-20260304082422.docx', 'SURAT_RW_TRK-20260304082422.docx');

-- Dumping structure for table desa_nusajati.surat_pengantar_catatan_kepolisian
CREATE TABLE IF NOT EXISTS `surat_pengantar_catatan_kepolisian` (
  `id_spck` int NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_surat` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nik` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bukti_ktp` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bukti_kk` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keperluan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `masa_berlaku` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pejabat_desa` int DEFAULT NULL,
  `status_surat` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `id_profil_desa` int DEFAULT NULL,
  `kode_tracking` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_dibuat` datetime DEFAULT NULL,
  `surat_rt` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `surat_rw` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_spck`),
  KEY `id_spck` (`id_spck`,`nik`),
  KEY `id_pejabat_desa` (`id_pejabat_desa`),
  KEY `id_profil_desa` (`id_profil_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table desa_nusajati.surat_pengantar_catatan_kepolisian: ~1 rows (approximately)
INSERT INTO `surat_pengantar_catatan_kepolisian` (`id_spck`, `jenis_surat`, `no_surat`, `nik`, `no_hp`, `bukti_ktp`, `bukti_kk`, `keperluan`, `keterangan`, `masa_berlaku`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`, `kode_tracking`, `tanggal_dibuat`, `surat_rt`, `surat_rw`) VALUES
	(9, 'Surat Pengantar Catatan Kepolisian', NULL, '3173016408881003', '081285488433', 'KTP_TRK-20260304082638.png', 'KK_TRK-20260304082638.jpg', 'Permohonan SKCK', 'Persyaratan Melamar Kerja', NULL, '2026-03-04 15:26:38', NULL, 'PENDING', 1, 'TRK-20260304082638', NULL, 'SURAT_RT_TRK-20260304082638.docx', 'SURAT_RW_TRK-20260304082638.docx'),
	(10, 'Surat Pengantar Catatan Kepolisian', NULL, '3173016408881003', '081285488433', 'KTP_TRK-20260304082705.png', 'KK_TRK-20260304082705.jpg', 'Permohonan SKCK', 'Persyaratan Melamar Kerja', NULL, '2026-03-04 15:27:05', NULL, 'PENDING', 1, 'TRK-20260304082705', NULL, 'SURAT_RT_TRK-20260304082705.docx', 'SURAT_RW_TRK-20260304082705.docx');

-- Dumping structure for table desa_nusajati.surat_pengantar_umum
CREATE TABLE IF NOT EXISTS `surat_pengantar_umum` (
  `id_spu` int NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_surat` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nik` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keperluan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `masa_berlaku` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci,
  `tanggal_surat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pejabat_desa` int DEFAULT NULL,
  `status_surat` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `id_profil_desa` int DEFAULT NULL,
  `kode_tracking` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_dibuat` datetime DEFAULT NULL,
  `bukti_ktp` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bukti_kk` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `surat_rt` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `surat_rw` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_spu`),
  KEY `nik` (`nik`),
  KEY `id_pejabat_desa` (`id_pejabat_desa`),
  KEY `id_profil_desa` (`id_profil_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table desa_nusajati.surat_pengantar_umum: ~3 rows (approximately)
INSERT INTO `surat_pengantar_umum` (`id_spu`, `jenis_surat`, `no_surat`, `nik`, `no_hp`, `keperluan`, `masa_berlaku`, `keterangan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`, `kode_tracking`, `tanggal_dibuat`, `bukti_ktp`, `bukti_kk`, `surat_rt`, `surat_rw`) VALUES
	(11, 'Surat Pengantar', NULL, '3173016408881003', '081285488433', 'beasiswa', NULL, NULL, '2026-03-04 15:27:52', NULL, 'PENDING', 1, 'TRK-20260304082752', NULL, 'KTP_TRK-20260304082752.png', 'KK_TRK-20260304082752.png', 'SURAT_RT_TRK-20260304082752.docx', 'SURAT_RW_TRK-20260304082752.pdf');

-- Dumping structure for table desa_nusajati.tracking_surat
CREATE TABLE IF NOT EXISTS `tracking_surat` (
  `id_tracking` int NOT NULL AUTO_INCREMENT,
  `kode_tracking` varchar(50) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `jenis_surat` varchar(100) DEFAULT NULL,
  `id_surat` int DEFAULT NULL,
  `status_surat` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tracking`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table desa_nusajati.tracking_surat: ~12 rows (approximately)
INSERT INTO `tracking_surat` (`id_tracking`, `kode_tracking`, `no_hp`, `jenis_surat`, `id_surat`, `status_surat`, `created_at`) VALUES
	(74, 'TRK-20260303185113', '081285488433', 'Surat Ijin Keramaian', 25, 'SELESAI', '2026-03-03 18:51:13'),
	(75, 'TRK-20260303193932', '081285488433', 'Surat Ijin Keramaian', 26, 'DITOLAK', '2026-03-03 19:39:32'),
	(76, 'TRK-20260304080923', '081285488433', 'Surat Ijin Keramaian', 27, 'DITOLAK', '2026-03-04 08:09:23'),
	(77, 'TRK-20260304082057', '081285488433', 'Surat Keterangan', 169, 'SELESAI', '2026-03-04 08:20:57'),
	(78, 'TRK-20260304082151', '081285488433', 'Surat Keterangan Domisili Tempat Tinggal', 4, 'SELESAI', '2026-03-04 08:21:51'),
	(79, 'TRK-20260304082242', '081285488433', 'Surat Keterangan Tidak Mampu', 15, 'PENDING', '2026-03-04 08:22:42'),
	(80, 'TRK-20260304082345', '081285488433', 'Surat Keterangan Usaha', 14, 'PENDING', '2026-03-04 08:23:45'),
	(81, 'TRK-20260304082422', '081285488433', 'Surat Keterangan Usaha', 15, 'PENDING', '2026-03-04 08:24:22'),
	(82, 'TRK-20260304082638', '081285488433', 'Surat Pengantar Catatan Kepolisian', 9, 'PENDING', '2026-03-04 08:26:38'),
	(83, 'TRK-20260304082705', '081285488433', 'Surat Pengantar Catatan Kepolisian', 10, 'PENDING', '2026-03-04 08:27:05'),
	(84, 'TRK-20260304082752', '081285488433', 'Surat Pengantar', 11, 'PENDING', '2026-03-04 08:27:52'),
	(85, 'TRK-20260304095131', '081285488433', 'Surat Ijin Keramaian', 28, 'SELESAI', '2026-03-04 09:51:31');

-- Dumping structure for table desa_nusajati.visi_misi
CREATE TABLE IF NOT EXISTS `visi_misi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `visi` longtext,
  `misi` longtext,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table desa_nusajati.visi_misi: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
