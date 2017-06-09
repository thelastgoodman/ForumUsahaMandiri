-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2016 at 06:09 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ukm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `foto_user` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_admin`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `foto_user`, `user_id`) VALUES
(1, 'yorke.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_agenda`
--

CREATE TABLE IF NOT EXISTS `tb_agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `judul_agenda` varchar(50) NOT NULL,
  `tanggal_agenda` date NOT NULL,
  `isi_agenda` text NOT NULL,
  `gambar` text NOT NULL,
  `dibaca` int(11) NOT NULL,
  `terlaksana` varchar(10) NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tb_agenda`
--

INSERT INTO `tb_agenda` (`id_agenda`, `judul_agenda`, `tanggal_agenda`, `isi_agenda`, `gambar`, `dibaca`, `terlaksana`) VALUES
(15, 'Pembentukan Struktur Organisasi FUM 2016', '2016-08-12', 'Pembentukan Struktur Organisasi FUM 2016', '80business-meeting-to-be-productive.jpg', 0, 'sudah'),
(22, 'Pelatihan UKM di Citeureup 2016', '2016-08-19', 'membentuk kebersamaan (team work). Jika rasa kebersamaan sudah tertanam di masing – masing individu maka akan ada rasa tanggung jawab, kepedulian, rasa setia kawan, saling membantu, problem solving dll', '42berita2.jpg', 74, 'belum'),
(23, 'Gathering', '2016-08-19', 'Perusahaan atau instansi dengan tingkat tekanan tinggi, persaingan yang makin ketat, tuntutan pelayanan maksimal kepada masyarakat, proses produksi yang cepat tanpa henti membuat karyawan berada dalam tekanan atau tingkat stress yang tinggi pula. Untuk itu banyak perusahaan atau isntansi dengan karyawan skala kecil maupun banyak memerlukan kegiatan gathering ini', '695.jpg', 165, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE IF NOT EXISTS `tb_anggota` (
  `id_anggota` int(7) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto_user` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_anggota`),
  KEY `id_user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=212 ;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama_lengkap`, `alamat`, `foto_user`, `user_id`) VALUES
(188, 'Rahmah Fadhillah', 'Jln. Cipageran No 88', '86.jpg', 3),
(190, 'Ihsan Saeful', 'Jln Ciburu No 82 Kp Cibiru ', '3913903241_10155107171314167_6039946500597299306_n.jpg', 4),
(192, 'Jiwa Setiawan', 'Jln Cibinong No 85', '295.jpg', 5),
(193, 'Deni Hardianto', 'Jln Sukarasa No 85', 'kosong.jpg', 6),
(194, 'Agus Suryana', 'Jln Cempaka no 51', 'kosong.jpg', 7),
(196, 'Nandi', 'jln bojong koneng no 26 RT 05 RW 12', '97nandi.jpg', 9),
(197, 'Iyan setiadi', 'Jln. Cempaka no 81 RT05/RW15', 'kosong.jpg', 10),
(198, 'Diela', 'Jln baleendah no76', '46.jpg', 11),
(203, 'Asep Mulyana', 'Jln Cempaka no 87', 'kosong.jpg', 12),
(205, 'admin', 'admin', 'yorke.jpg', 1),
(206, 'Eep Cuhaya', 'Jln Pangalengan No 766', '7314102483_10208664788850403_3409174275060784908_n.jpg', 13),
(210, 'Reza Adithia', 'Jln Sriwijaya No 16 , Cimahi', '36download.jpg', 17),
(211, 'Gerdi Tristanto', 'Jln Permana No 81 Kel Citeurep Kec Cimahi Utara', 'kosong.jpg', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cat_produk`
--

CREATE TABLE IF NOT EXISTS `tb_cat_produk` (
  `id_cat_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_cat` varchar(20) NOT NULL,
  `deskripsi_cat_produk` text NOT NULL,
  `tanggal_cat` date NOT NULL,
  PRIMARY KEY (`id_cat_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `tb_cat_produk`
--

INSERT INTO `tb_cat_produk` (`id_cat_produk`, `nama_cat`, `deskripsi_cat_produk`, `tanggal_cat`) VALUES
(50, 'Kerajinan', 'Berbagai Macam Kerajinann', '2016-08-12'),
(51, 'Makanan', 'Makanan', '2016-08-12'),
(53, 'Fashion', 'Fashion', '2016-08-14'),
(54, 'Aksesoris PC', 'Aksesoris PC', '2016-09-14'),
(55, 'Furniture', 'Furniture', '2016-09-14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_forum_kategori`
--

CREATE TABLE IF NOT EXISTS `tb_forum_kategori` (
  `kategori_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kat_nama_kategori` varchar(20) NOT NULL,
  `kat_desk_kategori` varchar(80) NOT NULL,
  `gambar` text NOT NULL,
  `tanggal_kategori` date NOT NULL,
  PRIMARY KEY (`kategori_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_forum_kategori`
--

INSERT INTO `tb_forum_kategori` (`kategori_id`, `user_id`, `kat_nama_kategori`, `kat_desk_kategori`, `gambar`, `tanggal_kategori`) VALUES
(1, 1, 'News & Info', 'Forum diskusi dan berbagi tentang Berita seputar bisnis', '20logobisnis.jpg', '2016-08-30'),
(2, 1, 'Kasak-Kusuk', 'Forum Diskusi santai sesama pembisnis, bertukar ide dan pendapat', '84logothelounge.jpg', '2016-08-30'),
(3, 1, 'Hobby & Community', 'Forum diskusi dan berbagi informasi seputar hobi dan komunitas', '78gmbar.jpg', '2016-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_forum_reply`
--

CREATE TABLE IF NOT EXISTS `tb_forum_reply` (
  `id_reply` int(11) NOT NULL,
  `id_topik` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal_reply` text NOT NULL,
  `reply` text NOT NULL,
  PRIMARY KEY (`id_reply`),
  KEY `id_topik` (`id_topik`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_forum_reply`
--

INSERT INTO `tb_forum_reply` (`id_reply`, `id_topik`, `user_id`, `tanggal_reply`, `reply`) VALUES
(15, 6, 12, '6 September 2016, 1:20 AM', 'Semoga komunitas UMKM cimahi semakin baju, sebagaimana yg walikota janjikan sebelumnya'),
(20, 6, 5, '7 September 2016, 12:47 AM', 'Semoga makin ke sini, makin banyak fasilitas yang dapat di manfaatkan oleh para pelaku bisnis ukm dalam mempromosikan produk mereka'),
(22, 6, 4, '7 September 2016, 3:15 AM', 'Mantap FK-PEL!!'),
(23, 6, 1, '7 September 2016, 3:35 AM', '@Asepmul : Dari pihak pemkot nya sendiri sudah mengadakan pelatihan-pelatihan bagi komunitas UMKM itu sendiri\r\n@Jiwas : iya aamiin\r\n@IhsanS : Terima kasih '),
(24, 9, 4, '7 September 2016, 9:59 AM', 'nice posting. keep it up mang'),
(25, 9, 3, '8 September 2016, 10:06 AM', 'numpang di pejwan gan'),
(28, 9, 17, '14 September 2016, 6:51 PM', ':sup :sup'),
(29, 9, 13, '16 September 2016, 6:32 PM', 'alm. bob sadino mah inspirasi sayah atuh'),
(30, 6, 17, '17 September 2016, 1:38 PM', 'mantap'),
(31, 9, 5, '21 September 2016, 12:01 PM', 'keren mang'),
(33, 4, 4, '25 September 2016, 7:17 AM', 'mntap');

-- --------------------------------------------------------

--
-- Table structure for table `tb_forum_topik`
--

CREATE TABLE IF NOT EXISTS `tb_forum_topik` (
  `id_topik` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul_topik` varchar(50) NOT NULL,
  `isi_topik` text NOT NULL,
  `dilihat` int(11) NOT NULL,
  `tanggal_topik` date NOT NULL,
  PRIMARY KEY (`id_topik`),
  KEY `user_id` (`user_id`),
  KEY `kategori_id` (`kategori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_forum_topik`
--

INSERT INTO `tb_forum_topik` (`id_topik`, `kategori_id`, `user_id`, `judul_topik`, `isi_topik`, `dilihat`, `tanggal_topik`) VALUES
(4, 1, 3, 'Bisnis Jamur Basah kian di gemari Petani Lokal', 'Bisnis Jamur Basah 2016', 640, '2016-09-05'),
(5, 1, 5, 'Peluang Usaha Modal Kecil di bawah 5 juta', 'Usaha jasa seperti potong rambut semakin banyak peminatnya, hanya membutuhkan tempat atau kios kecil Anda sudah dapat menjalankan bisnis ini. Bisnis inipun juga cukup potensial untuk mendatangkan keuntungan besar setiap bulan untuk memenuhi kebutuhan sehari-hari atau sebagai usaha sampingan. Jika sehari saja mampu melayani jasa potong rambut, rata-rata sebanyak 10 orang dan tarif setiap potong rambut Rp 10.000,- dikalikan sebulan, itu sudah mempu menopang biaya hidup keluarga.', 291, '2016-09-06'),
(6, 3, 1, 'Kegiatan Fokus UMKM', 'Forum Komunitas UMKM telah tersebar di berbagai daerah. Usaha mikro kecil yang bergabung dalam FOKUS UMKM memanfaatkan social media Facebook sebagai sarana komunikasi dan pembelajaran diantara mereka. selain FB, tentu saja anggota FOKUS UMKM melalukan diskusi, pelatihan, mentoring, magang, dan upaya', 239, '2016-09-06'),
(8, 2, 3, 'Tips membangun usaha rumah makan', '1.Tentukan Bisnis Rumah Makan\r\nMulailah dari menghitung kemampuan diri, keterampilan yang dimiliki yang menyangkut bidang pekerjaan itu, untuk usaha rumah makan minimal harus mengerti masakan. Namun, untuk menjadi pengusaha kuliner&amp;nbsp;tidak harus menjadi ahli memasak dulu, tetapi yang terpenting adalah mampu mengelola usaha itu, tenaga ahli yang bisa memasak bisa direkrut. Yang tenpenting, tentukan konsep bisnis yang akan Anda rintis dan pilih menu andalah di rumah makan tersebut. Jika Anda bingung menentukan konsep dan menu, mulailah dari apa yang Anda suka.</p>\r\n\r\n<p>2.Tentukan Lokasi Dan Perizinanya</p>\r\n\r\n<p>Dalam memulai bisnis restoran atau tempat makan, tersedianya sarana dan prasarana menjadi modal utama Anda. Pengertian tersedianya bukan berarti harus menjadi miliknya, tetapi bisa diperoleh dari menyewa terlebih dahulu.&amp;nbsp;Dan yang termasuk sarana serta prasarana disini adalah perabot masak dan alat makan, perlengkapan lain seperti meja kursi, interior desain dan yang tak boleh dilupakan adalah memilih&amp;nbsp;lokasi usaha yang strategis serta mengantongi izin usaha dari pejabat setempat.<br />\r\n&nbsp;</p>\r\n', 39, '2016-09-07'),
(9, 2, 12, '5 Rahasia Sukses berbisnis ala bob sadino', 'Assalammualaikum.. kali ini saya akan membagikan artikel yaitu 3&nbsp;Rahasia Sukses berbisnis ala bob sadino\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Pertama, harus berani memulai</strong><br />\r\nDalam menjalankan roda bisnis yang terpenting adalah harus berani&nbsp;<em>action</em>&nbsp;dan berusaha dengan totalitas penuh serta jangan takut untuk gagal. Walaupun pada waktu itu ayam kampung masih mendominasi pasar di Indonesia, namun dengan keberaniannya Om Bob tetap berusaha untuk memperkenalkan ayam negeri dengan telurnya ke pasar bebas. Meskipun tak jarang Ia menemui beberapa kegagalan dalam bisnisnya,</p>\r\n\r\n<p><strong>Kedua, jangan terlalu banyak analisis</strong><br />\r\nSebagian besar orang terlalu banyak berpikir dan menganalisa sebelum akhirnya melangkah terjun di dunia usaha.&nbsp;</p>\r\n\r\n<p><strong>Ketiga, memiliki mimpi besar</strong><br />\r\nDalam hal ini tentunya Om Bob telah membuktikan kepada kita semua bahwasannya bermodalkan tekad, niat, dan juga semangat yang kuat, Beliau mampu meraih mimpi besar yang telah Ia citakan.</p>\r\n', 116, '2016-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_info_produk`
--

CREATE TABLE IF NOT EXISTS `tb_info_produk` (
  `id_info_produk` int(10) NOT NULL AUTO_INCREMENT,
  `id_cat_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `foto_produk` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `dibaca` int(11) NOT NULL,
  `disetujui` varchar(10) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat_workshop` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_info_produk`),
  KEY `id_cat_produk` (`id_cat_produk`),
  KEY `id_user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `tb_info_produk`
--

INSERT INTO `tb_info_produk` (`id_info_produk`, `id_cat_produk`, `nama_produk`, `deskripsi_produk`, `foto_produk`, `tanggal`, `dibaca`, `disetujui`, `no_telp`, `alamat_workshop`, `user_id`) VALUES
(13, 53, 'Jaket FILA INDONESIA', 'Jaket FILA INDONESIA Ori kini Ukuran tersedia : S / M / L / XL tidak ori uang kembali', '47FILA_Shop.jpg', '2016-08-20', 101, 'Ya', '08987600122', 'Jln Ciburu No 82 Kp Cibiru , Bandung selatan', 4),
(18, 53, 'PUMKINS | Sepatu Kulit', 'Sepatu Kulit Khas Cimahi, cocok di pakai untuk ke kantor ataupun sehari-hari.Tersedia dalam ukuran 40 s/d 46 .', '28sepatu-kulit.jpg', '2016-08-23', 152, 'Ya', '08560098711', 'Jln Cibinong No 85', 5),
(19, 53, 'PUMKINS | Jaket Kulit Asli', 'Catalog terbaru dari PUMKINS yaitu jaket kulis asli\r\nTersedia dalam warna hitam dan coklat\r\nUkuran S/M/L/XL', '35Sevilla-71.jpg', '2016-08-24', 97, 'Tidak', '08982008761', 'Jln Cibinong No 87 Cimahi', 5),
(51, 53, 'Zaira Shop | Kerudung', 'Kerudung dengan berbagai macam bentuk, warna serta murah segera kunjungi toko kami guys', '62Hijab-Story.jpg', '2016-09-04', 11, 'Ya', '08987650122', 'Jln Cempaka No 81', 3),
(54, 50, 'Zairaa | Book Store', 'Kami menyediakan berbagai macam buku dengan harga yang mampu bersaing', '126.jpg', '2016-09-04', 318, 'Ya', '08987662001', 'Jln Cempaka no 81', 3),
(77, 51, 'Eep | Kue Lebaran', 'Kue lebaran untuk keluarga anda ', '14usaha4.jpg', '2016-09-09', 18, 'Ya', '081321865700', 'pangalengan', 13),
(78, 51, 'MABASA | Makaroni', 'Mabasa Makaroni murah kini hadir dengan dengan 6 varian rasa, dengan pembuatan dari bahan terbaik di kelasnya , tidak basi , tidak empuk , tidak renyah , hanjakal heras.', '61logo-mabasa copy.jpg', '2016-09-10', 6, 'Belum', '08280098871', 'Jln Cihanjuang No 87', 4),
(79, 51, 'BIKINI | Bihun Kekinian', 'Remas aku <3', '39bikini.jpg', '2016-09-10', 14, 'Ya', '089876788253', 'Jln Cihanjuang No 87', 4),
(81, 54, 'Reza | Gaming Headshet', 'Toko kami menjual berbagai macam headset sebagai pelengkap stuff gaming anda. Di jamin harga murah dan kualitas nomer wahid', '9kraken.jpg', '2016-09-14', 15, 'Ya', '087200876691', 'Jln Sriwijaya No 16 , Cimahi', 17),
(84, 54, 'Deni Shop | Pomade', 'ni dia salah satu bagian penting tren rambut pria masa kini. Pomade atau Hair Pomade. Hair Pomade, membuat kalian para pria bisa menata rambut dengan gaya apapun dengan lebih mudah. Rambut terlihat rapi sepanjang hari tanpa takut terlihat berantakan. Menunjang penampilan kalian di segala kondisi (meeting, pergi ke kantor, pergi jalan-jalan, pergi sekolah atau pergi ke kampus). Ekstra kuat dan tahan lama, untuk menunjang kegiatanmu si super sibuk! Di Tokopedia kamu bisa menemukan berbagai merk Hair Pomade dengan harga terjangkau. Mulai dari pomade lokal hingga pomade luar tersedia disini. ', '58water-based-pomade-ft-1080x720.jpg', '2016-09-15', 18, 'Ya', '089876565520', 'Jln Cijagra No 81', 6),
(85, 50, 'PUMKINS | Hiasan Lego', 'Hiasan Lego ini terbuat dari kayu pilihan, dan di ukir dengan ahlinya. kami menerima desain sesuai permintaan anda , harga satuanya yaitu Rp.150.000. jika anda berminat silahkan kunjungi toko kami di alamat yang sudah tercantum dan hubungi kami', '9UMKM.jpg', '2016-09-26', 0, 'Belum', '081321865877', 'Jln Citeurep No 81 Kel Citeureup Kec Cimahi Utara', 5),
(86, 51, 'Zairaa | Madu Manis ', 'Madu manis asli berkhasiat untuk pertumbuhan anak, 1 botol madu manis yaitu 1,5 liter. di jual dengan harga Rp.25.000 / botol.\r\nJika anda berminat silahkan hubungi atau kunjungi toko kami langsung di alamat yg sudah tertera', '54usaha3.jpg', '2016-09-26', 0, 'Belum', '087654367781', 'Jln Cempaka no 82 Kel Citeurep Cimahi', 3),
(87, 54, 'Reza | Gaming stuff', 'Kami menghadirkan sebuah stuff gaming di kelasna dengan 1 set terdiri dari\r\n-Keyboard Razer \r\n-Cerberus vs headshet\r\n-Dart Vadder mouse\r\nHarga 1 set yang kami tawarkan Rp.2.500.000 untuk nego bisa hubungi di no telp yang sudah tercantum', '12razergear.jpg', '2016-09-26', 0, 'Belum', '081321876800', 'Jln Cihanjuang no 44 Kel Citeureup Cimahi Utara', 17),
(88, 50, 'Gerdi | UNIXCASE', 'Menjual Perlengkapan casing untuk iphone kesayangan anda.Kami menjual beberapa merk case seperti Ipaky dll.Hdir dengan berbagai macam pilihanKet. Harga : Rp.75.000Setiap Pembelian lebih dari 3 bonus Anti Gores', '92case.jpg', '2016-09-26', 2, 'Ya', '081321876677', 'Jln Permana No 81 Kel Citeurep Kec Cimahi Utara', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `member_date` date NOT NULL,
  `status` enum('Anggota UKM','Admin','Non Anggota UKM') NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `email`, `member_date`, `status`) VALUES
(1, 'Admin', 'payungteduh', 'salmanagustian@gmail.com', '2016-08-03', 'Admin'),
(3, 'RahmahF', 'payung', 'rahmah@gmail.com', '2016-08-14', 'Anggota UKM'),
(4, 'IhsanS', '2', 'ihsan@gmail.com', '2016-08-20', 'Anggota UKM'),
(5, 'Jiwas', '2', 'jiwa@gmail.com', '2016-08-23', 'Anggota UKM'),
(6, 'Deni', 'payung', 'deni@gmail.com', '2016-08-29', 'Anggota UKM'),
(7, 'AgusSuryana02', '2', 'agusuryana@gmail.com', '2016-08-29', 'Anggota UKM'),
(9, 'nandibordir', 'cbr.2015', 'nandibordir@gmail.com', '2016-09-02', 'Anggota UKM'),
(10, 'iyanS', '2', 'iyan@gmail.com', '2016-09-04', 'Anggota UKM'),
(11, 'dielaC', '2', 'diela@gmail.com', '2016-09-05', 'Anggota UKM'),
(12, 'Asepmul', '3', 'asep@gmail.com', '2016-09-06', 'Non Anggota UKM'),
(13, 'Bencul', '2', 'eep@gmail.com', '2016-09-09', 'Anggota UKM'),
(17, 'RezaAdit', '2', 'reza@gmail.com', '2016-09-14', 'Anggota UKM'),
(18, 'Gerdi', '2', 'gerdi@gmail.com', '2016-09-26', 'Anggota UKM');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`);

--
-- Constraints for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_forum_kategori`
--
ALTER TABLE `tb_forum_kategori`
  ADD CONSTRAINT `tb_forum_kategori_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`);

--
-- Constraints for table `tb_forum_reply`
--
ALTER TABLE `tb_forum_reply`
  ADD CONSTRAINT `tb_forum_reply_ibfk_1` FOREIGN KEY (`id_topik`) REFERENCES `tb_forum_topik` (`id_topik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_forum_reply_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_forum_topik`
--
ALTER TABLE `tb_forum_topik`
  ADD CONSTRAINT `tb_forum_topik_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_forum_topik_ibfk_4` FOREIGN KEY (`kategori_id`) REFERENCES `tb_forum_kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_info_produk`
--
ALTER TABLE `tb_info_produk`
  ADD CONSTRAINT `tb_info_produk_ibfk_1` FOREIGN KEY (`id_cat_produk`) REFERENCES `tb_cat_produk` (`id_cat_produk`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_info_produk_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
