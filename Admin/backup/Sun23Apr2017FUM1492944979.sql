DROP TABLE kelurahan;

CREATE TABLE `kelurahan` (
  `id_kel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kel` varchar(25) NOT NULL,
  PRIMARY KEY (`id_kel`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO kelurahan VALUES("1","Cibabat");
INSERT INTO kelurahan VALUES("2","Cibeurem");
INSERT INTO kelurahan VALUES("3","Cipageran");
INSERT INTO kelurahan VALUES("4","Melong");
INSERT INTO kelurahan VALUES("5","Cigugur Tengah");
INSERT INTO kelurahan VALUES("6","Karangmekar");
INSERT INTO kelurahan VALUES("7","Setiamanah");
INSERT INTO kelurahan VALUES("8","Leuwigajah");
INSERT INTO kelurahan VALUES("9","Citeureup");
INSERT INTO kelurahan VALUES("10","PasirKaliki");
INSERT INTO kelurahan VALUES("11","Cibeber");
INSERT INTO kelurahan VALUES("13","Utama");



DROP TABLE tb_admin;

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `foto_user` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_admin`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE tb_agenda;

CREATE TABLE `tb_agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `judul_agenda` varchar(50) NOT NULL,
  `tanggal_agenda` date NOT NULL,
  `isi_agenda` text NOT NULL,
  `gambar` text NOT NULL,
  `dibaca` int(11) NOT NULL,
  `terlaksana` varchar(10) NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

INSERT INTO tb_agenda VALUES("15","Pembentukan Struktur Organisasi FUM 2016","2016-08-12","Pembentukan Struktur Organisasi FUM 2016","80business-meeting-to-be-productive.jpg","0","sudah");
INSERT INTO tb_agenda VALUES("22","Pelatihan UKM di Citeureup 2016","2016-08-19","membentuk kebersamaan (team work). Jika rasa kebersamaan sudah tertanam di masing – masing individu maka akan ada rasa tanggung jawab, kepedulian, rasa setia kawan, saling membantu, problem solving dll","42berita2.jpg","75","belum");
INSERT INTO tb_agenda VALUES("23","Gathering","2016-08-19","Mini gathering Forum Usaha Mandiri 2016","695.jpg","166","belum");



DROP TABLE tb_anggota;

CREATE TABLE `tb_anggota` (
  `id_anggota` int(7) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto_user` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_anggota`),
  KEY `id_user` (`user_id`),
  CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=latin1;

INSERT INTO tb_anggota VALUES("188","Rahmah","Jln. Cipageran No 88","86.jpg","3");
INSERT INTO tb_anggota VALUES("190","Ihsan Saeful","Jln Ciburu No 82 Kp Cibiru ","3913903241_10155107171314167_6039946500597299306_n.jpg","4");
INSERT INTO tb_anggota VALUES("192","Jiwa Setiawan","Jln Cibinong No 85","295.jpg","5");
INSERT INTO tb_anggota VALUES("193","Deni Hardianto","Jln Sukarasa No 85","kosong.jpg","6");
INSERT INTO tb_anggota VALUES("194","Agus Suryana","Jln Cempaka no 51","kosong.jpg","7");
INSERT INTO tb_anggota VALUES("196","Nandi","jln bojong koneng no 26 RT 05 RW 12","97nandi.jpg","9");
INSERT INTO tb_anggota VALUES("197","Iyan setiadi","Jln. Cempaka no 81 RT05/RW15","kosong.jpg","10");
INSERT INTO tb_anggota VALUES("198","Diela","Jln baleendah no76","46.jpg","11");
INSERT INTO tb_anggota VALUES("203","Asep Mulyana","Jln Cempaka no 87","kosong.jpg","12");
INSERT INTO tb_anggota VALUES("205","admin","admin","yorke.jpg","1");
INSERT INTO tb_anggota VALUES("206","Eep Cuhaya","Jln Pangalengan No 766","7314102483_10208664788850403_3409174275060784908_n.jpg","13");
INSERT INTO tb_anggota VALUES("210","Reza Adithia","Jln Sriwijaya No 16 , Cimahi","36download.jpg","17");
INSERT INTO tb_anggota VALUES("211","Gerdi Tristanto","Jln Permana No 81 Kel Citeurep Kec Cimahi Utara","kosong.jpg","18");
INSERT INTO tb_anggota VALUES("212","ahmad rizaldi","Soreang","3814102483_10208664788850403_3409174275060784908_n.jpg","19");
INSERT INTO tb_anggota VALUES("213","Emi Ritawati","Jln Kerkof 88 Kec. Cimahi Selatan, Kelurahan Cigugur","kosong.jpg","20");
INSERT INTO tb_anggota VALUES("214","Yuli Yoels","Jln Cisangkan Girang Kec Cimahi Tengah, Cisangkan","75588baa0d68219f18f2359d2365ebd54c.jpg","21");
INSERT INTO tb_anggota VALUES("215","Hanifa Azizah","Cimahi","kosong.jpg","22");
INSERT INTO tb_anggota VALUES("218","Sri Minarti","Jln Permana Timur no 108 E","kosong.jpg","25");
INSERT INTO tb_anggota VALUES("219","Asep Yoghurt","JL BP AMPI 57 E RT 02 RW 05 , Kec . Cimahi Tengah , Kelurahan Baros Cimahi RT 05 RW 02","kosong.jpg","26");
INSERT INTO tb_anggota VALUES("221","RUKUN IHTIAR ","JL. RANCABENTANG UTARA , Kec Cimahi Selatan Kel.Cibeurem . RT 15 RW 04","kosong.jpg","28");
INSERT INTO tb_anggota VALUES("222","Yudi Susandi","JL CIHANJUANG RT 02 RW 18 , Kec Cimahi utara Kel. Cibabat . Kota Cimahi","kosong.jpg","29");
INSERT INTO tb_anggota VALUES("224","sasasa","sasa","kosong.jpg","30");
INSERT INTO tb_anggota VALUES("225","FITRI","PERMANA GG SAUYUNAN NO 64 , Kec imahi Utara, Kel Citeurep. Cimahi","kosong.jpg","31");
INSERT INTO tb_anggota VALUES("226","Aep DanurWijaya","BLOK CISEGEL , Kec Cimahi Selatan Kel. Melong . Cimahi","105.jpg","32");
INSERT INTO tb_anggota VALUES("227","ANDIYANA TAILOR","RANCABALI RT02/10 , Kec Cimahi Utara , Kel Ranca Bali, Cimahi","kosong.jpg","33");
INSERT INTO tb_anggota VALUES("228","WINS BAG","JL CIHANJUANG KP JATI Kec, Cimahi Utara , Kel Cibabat, Kota Cimahi","kosong.jpg","34");
INSERT INTO tb_anggota VALUES("233","sas","sasa","kosong.jpg","35");
INSERT INTO tb_anggota VALUES("234","sasasa","sasas","kosong.jpg","36");
INSERT INTO tb_anggota VALUES("235","Riki Family","JL KADEMANGAN","kosong.jpg","37");
INSERT INTO tb_anggota VALUES("236","Andy victor","jln pojok","kosong.jpg","38");
INSERT INTO tb_anggota VALUES("242","adi widiaa","jln cempakaaa","kosong.jpg","39");
INSERT INTO tb_anggota VALUES("243","asep mulyanaa","jln maleber","kosong.jpg","40");
INSERT INTO tb_anggota VALUES("244","muhammad slaman agustian","jln cempaka","kosong.jpg","41");
INSERT INTO tb_anggota VALUES("245","Titin Sunarti","jln cempaka","kosong.jpg","42");
INSERT INTO tb_anggota VALUES("246","gun gun guntara","komp GBI","kosong.jpg","43");



DROP TABLE tb_cat_produk;

CREATE TABLE `tb_cat_produk` (
  `id_cat_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_cat` varchar(20) NOT NULL,
  `deskripsi_cat_produk` text NOT NULL,
  `tanggal_cat` date NOT NULL,
  PRIMARY KEY (`id_cat_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

INSERT INTO tb_cat_produk VALUES("50","Kerajinan","Berbagai Macam Kerajinann","2016-08-12");
INSERT INTO tb_cat_produk VALUES("51","Makanan","Makanan","2016-08-12");
INSERT INTO tb_cat_produk VALUES("53","Fashion","Fashion","2016-08-14");
INSERT INTO tb_cat_produk VALUES("56","Minuman","Minuman","2016-10-02");



DROP TABLE tb_forum_kategori;

CREATE TABLE `tb_forum_kategori` (
  `kategori_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kat_nama_kategori` varchar(20) NOT NULL,
  `kat_desk_kategori` varchar(80) NOT NULL,
  `gambar` text NOT NULL,
  `tanggal_kategori` date NOT NULL,
  PRIMARY KEY (`kategori_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tb_forum_kategori_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_forum_kategori VALUES("1","1","News & Info","Forum diskusi dan berbagi tentang Berita seputar bisnis","20logobisnis.jpg","2016-08-30");
INSERT INTO tb_forum_kategori VALUES("3","1","Hobby & Community","Forum diskusi dan berbagi informasi seputar hobi dan komunitas","78gmbar.jpg","2016-09-02");



DROP TABLE tb_forum_reply;

CREATE TABLE `tb_forum_reply` (
  `id_reply` int(11) NOT NULL,
  `id_topik` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal_reply` text NOT NULL,
  `reply` text NOT NULL,
  PRIMARY KEY (`id_reply`),
  KEY `id_topik` (`id_topik`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tb_forum_reply_ibfk_1` FOREIGN KEY (`id_topik`) REFERENCES `tb_forum_topik` (`id_topik`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_forum_reply_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_forum_reply VALUES("15","6","12","6 September 2016, 1:20 AM","Semoga komunitas UMKM cimahi semakin baju, sebagaimana yg walikota janjikan sebelumnya");
INSERT INTO tb_forum_reply VALUES("20","6","5","7 September 2016, 12:47 AM","Semoga makin ke sini, makin banyak fasilitas yang dapat di manfaatkan oleh para pelaku bisnis ukm dalam mempromosikan produk mereka");
INSERT INTO tb_forum_reply VALUES("23","6","1","7 September 2016, 3:35 AM","@Asepmul : Dari pihak pemkot nya sendiri sudah mengadakan pelatihan-pelatihan bagi komunitas UMKM itu sendiri\n@Jiwas : iya aamiin\n@IhsanS : Terima kasih ");
INSERT INTO tb_forum_reply VALUES("30","6","17","17 September 2016, 1:38 PM","mantap");
INSERT INTO tb_forum_reply VALUES("33","4","4","25 September 2016, 7:17 AM","mntap");
INSERT INTO tb_forum_reply VALUES("34","4","21","24 October 2016, 6:04 AM","informasi yang bermanfaat");
INSERT INTO tb_forum_reply VALUES("35","4","12","24 October 2016, 6:06 AM"," saya tertarik memulai bisnis ini");
INSERT INTO tb_forum_reply VALUES("36","5","1","2 November 2016, 5:52 PM","nice post");
INSERT INTO tb_forum_reply VALUES("37","6","21","5 January 2017, 2:41 PM","anda saya mau berjualan bagaimana pak caranya >?");
INSERT INTO tb_forum_reply VALUES("38","5","21","10 January 2017, 8:55 AM","keren pak");
INSERT INTO tb_forum_reply VALUES("39","5","21","23 January 2017, 7:26 PM","mantap\n");



DROP TABLE tb_forum_topik;

CREATE TABLE `tb_forum_topik` (
  `id_topik` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul_topik` varchar(50) NOT NULL,
  `isi_topik` text NOT NULL,
  `dilihat` int(11) NOT NULL,
  `tanggal_topik` date NOT NULL,
  PRIMARY KEY (`id_topik`),
  KEY `user_id` (`user_id`),
  KEY `kategori_id` (`kategori_id`),
  CONSTRAINT `tb_forum_topik_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_forum_topik_ibfk_4` FOREIGN KEY (`kategori_id`) REFERENCES `tb_forum_kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_forum_topik VALUES("4","1","3","Bisnis Jamur Basah kian di gemari Petani Lokal","Bisnis Jamur Basah 2016","650","2016-09-05");
INSERT INTO tb_forum_topik VALUES("5","1","5","Peluang Usaha Modal Kecil di bawah 5 juta","Ussaha jasa seperti potong rambut semakin banyak peminatnya, hanya membutuhkan tempat atau kios kecil Anda sudah dapat menjalankan bisnis ini. Bisnis inipun juga cukup potensial untuk mendatangkan keuntungan besar setiap bulan untuk memenuhi kebutuhan sehari-hari atau sebagai usaha sampingan. Jika sehari saja mampu melayani jasa potong rambut, rata-rata sebanyak 10 orang dan tarif setiap potong rambut Rp 10.000,- dikalikan sebulan, itu sudah mempu menopang biaya hidup keluarga.","310","2016-09-06");
INSERT INTO tb_forum_topik VALUES("6","3","1","Kegiatan Fokus UMKM","Forum Komunitas UMKM telah tersebar di berbagai daerah. Usaha mikro kecil yang bergabung dalam FOKUS UMKM memanfaatkan social media Facebook sebagai sarana komunikasi dan pembelajaran diantara mereka. selain FB, tentu saja anggota FOKUS UMKM melalukan diskusi, pelatihan, mentoring, magang, dan upaya","291","2016-09-06");
INSERT INTO tb_forum_topik VALUES("7","1","12","kripik balsem","<p>mohon tanggapan</p>\n","1","2016-10-31");



DROP TABLE tb_info_produk;

CREATE TABLE `tb_info_produk` (
  `id_info_produk` int(10) NOT NULL AUTO_INCREMENT,
  `id_cat_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi_produk` varchar(50) NOT NULL,
  `foto_produk` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `dibaca` int(11) NOT NULL,
  `disetujui` varchar(10) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat_workshop` varchar(100) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `nopos` int(11) NOT NULL,
  `kelurahan` varchar(20) NOT NULL,
  `klasifikasi` varchar(10) NOT NULL,
  `siup` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_info_produk`),
  KEY `id_cat_produk` (`id_cat_produk`),
  KEY `id_user` (`user_id`),
  CONSTRAINT `tb_info_produk_ibfk_1` FOREIGN KEY (`id_cat_produk`) REFERENCES `tb_cat_produk` (`id_cat_produk`) ON DELETE CASCADE,
  CONSTRAINT `tb_info_produk_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=latin1;

INSERT INTO tb_info_produk VALUES("18","53","PUMKINS | Sepatu Kulit","Produksi Sepatu Kulit","28sepatu-kulit.jpg","2016-08-23","17","Ya","08560098711","Jln Cibinong No 85","Cimahi Utara","0","Citeureup","Kecil","","5");
INSERT INTO tb_info_produk VALUES("19","53","PUMKINS | Jaket Kulit Asli","Produksi Jaket Kulit","35Sevilla-71.jpg","2016-08-24","97","Tidak","08982008761","Jln Cibinong No 87 Cimahi","Cimahi Utara","0","Citeureup","Kecil","","5");
INSERT INTO tb_info_produk VALUES("86","51","Zairaa | Madu Manis ","Pembuatan Madu Manis","54usaha3.jpg","2016-09-26","0","Tidak","087654367781","Jln Cempaka no 82 Kel Citeurep Cimahi","Cimahi Utara","0","Citeurep","Menengah","","3");
INSERT INTO tb_info_produk VALUES("89","50","Ochiku Bantal Sofa","Produksi Bantal dan Sofa","96sarung.jpg","2016-10-02","5","Ya","08882306470","Jln Kerkof 88 ","Cimahi Selatan","0","Cigugur","Kecil","","20");
INSERT INTO tb_info_produk VALUES("90","51","Yoels | Batagor Instan","Menjual Makanan Olahan","31yo.jpg","2016-10-02","8","Belum","082321949855","Jln Cisangkan ","Cimahi Tengah","0","Cisangkan","Kecil","","21");
INSERT INTO tb_info_produk VALUES("91","51","Yoels | Pie Strowberry","Menjual Kue Basah","89s.jpg","2016-10-02","71","Ya","082321949855","Jln Cisangkan","Cimahi Tengah","0","Cisangkan","Kecil","","21");
INSERT INTO tb_info_produk VALUES("92","51","Nasi Jarambah","Menjual Makanan ","60nasi.jpg","2016-10-02","70","Ya","082115226212","Jln Cisangkan ","Cimahi Tengah","0","Cisangkan","Kecil","","21");
INSERT INTO tb_info_produk VALUES("93","51","Yoels | PieKacang Coklat","Menjual Kue Basah","56piemini.jpg","2016-10-02","0","Tidak","082115226212","Jln Cisangkan Girang Kec Cimahi Tengah, Cisangkan","Cimahi Tengah","0","Cisangkan","Kecil","","21");
INSERT INTO tb_info_produk VALUES("94","53","Nuraini shop","Produksi Pasmina","32nuraini.jpg","2016-10-02","12","Ya","087876655441","Cimahi","Cimahi Utara","0","Cipageran","Kecil","","22");
INSERT INTO tb_info_produk VALUES("95","51","Yoels | Pie Mini","Menjual Kue Basah","39pie.jpg","2016-10-02","25","Ya","08232194985","Jln Cisangkan Girang","Cimahi Tengah","0","Cisangkan","Kecil","","21");
INSERT INTO tb_info_produk VALUES("97","51","Basreng NeuEuis","Membuat Makanan olahan","12basreng.jpg","2016-10-02","60","Ya","081723322442","JL PERMANA TIMUR NO 108 E","Cimahi Utara","0","Citeureup","Kecil","","25");
INSERT INTO tb_info_produk VALUES("98","56","Asep Yoghurt","PENGOLAHAN SUSU MENJADI YOGHURT","29artikel-001.jpg","2016-10-10","73","Ya","0813213455677","JL BP AMPI 57 E RT 05 RW 02","Cimahi Tengah","0","Baros","Kecil","","26");
INSERT INTO tb_info_produk VALUES("100","53","RUKUN IHTIAR","PRODUKSI BAJU SERAGAM KANTOR","92seragam-kerja-wanita-bintang-baut-1.jpg","2016-10-10","8","Ya","081321864700","JL. RANCABENTANG UTARA RT 15 RW 04","Cimahi Selatan","0","Cibeurem","Kecil","","28");
INSERT INTO tb_info_produk VALUES("101","53","CHI&DOUG","Screen Printing Kaos","41AO5lM_ok.jpeg","2016-10-10","2","Tidak","081210060512","JL CIHANJUANG RT 02 RW 18","Cimahi Utara","0","Cibabat","Kecil","","29");
INSERT INTO tb_info_produk VALUES("104","50","Fitri Collection","Boneka","7img_3583.jpg","2016-10-17","0","Belum","081321846200","PERMANA GG SAUYUNAN NO 64 ","Cimahi Utara","0","Citeureup","Kecil","","31");
INSERT INTO tb_info_produk VALUES("105","50","AEP DANURWIJAYA","Boneka","65img_3583.jpg","2016-10-17","73","Ya","081321455002","BLOK CISEGEL","Cimahi Selatan","0","Melong","Kecil","","32");
INSERT INTO tb_info_produk VALUES("106","53","ANDIYANA TAILOR","TUKANG JAHIT PAKAIAN","837674356_20150311095248.jpg","2016-10-17","0","Tidak","081321200012","RANCABALI RT02/10","Cimahi Utara","0","Ranca Bali","Mikro","","33");
INSERT INTO tb_info_produk VALUES("107","53","WIN\'S BAG","TERIMA PESANAN TAS ANAK SEKOLAH","48dd.JPG","2016-10-17","1","Belum","081321872000","JL CIHANJUANG KP JATI RT 02 RW 15","Cimahi Utara","14056","Cibabat","Mikro","0096/P/1.824.271","34");
INSERT INTO tb_info_produk VALUES("108","51","KRIPIK PD RIKI FAMILY","PRODUKSI KRIPIK - BASRENG","28159.jpg","2016-10-31","0","Belum","08132184500","JL KADEMANGAN RT 16, RW 01","Cimahi Tengah","0","Setiamanah","Besar","","37");
INSERT INTO tb_info_produk VALUES("110","53","yoghurt","jual keripik","965.jpg","2016-10-31","5","Ya","0857","bandung","Cimahi Tengah","0","cigadung","Besar","","38");
INSERT INTO tb_info_produk VALUES("111","53","baso ikan","jualan baso ikan","466.jpg","2016-11-04","0","Belum","08132186400","jln maleber","Cimahi Utara","0","Cibabat","Besar","","40");
INSERT INTO tb_info_produk VALUES("112","53","salman computer","KOMPITER","655.jpg","2016-11-04","0","Belum","081321349000","jln cempaka","Cimahi Utara","0","Cibabat","Besar","KKKKKSSS2","41");
INSERT INTO tb_info_produk VALUES("129","53","ddd","TERIMA PESANAN TAS ANAK SEKOLAH","5106-smart-dashboard-ui-login-profile.jpg","2016-11-05","0","Belum","081321872000","JL CIHANJUANG KP JATI RT 02 RW 15","Cimahi Utara","14056","Cibabat","Mikro","0096/P/1.824.271","34");
INSERT INTO tb_info_produk VALUES("130","53","se2232","TERIMA PESANAN TAS ANAK SEKOLAH","3906-smart-dashboard-ui-login-profile.jpg","2016-11-05","0","Belum","081321872000","JL CIHANJUANG KP JATI RT 02 RW 15","Cimahi Utara","14056","Cibabat","Mikro","0096/P/1.824.271","34");
INSERT INTO tb_info_produk VALUES("132","51","Warung Sagala aya","Warung","6306-smart-dashboard-ui-login-profile.jpg","2016-11-05","0","Belum","08132187600","jln cempaka","Cimahi Utara","14045","Citeureup","Besar","KUUUHK/P/1.8772.111","42");
INSERT INTO tb_info_produk VALUES("133","53","guns cloth","jual baju","83LOGO-02-01.jpg","2017-01-05","1","Ya","085722278882","jalan trunojoyo","Cimahi Selatan","40287","Citeureup","Menengah","hhgmbbb/","43");



DROP TABLE tb_user;

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `member_date` date NOT NULL,
  `status` enum('Anggota UKM','Admin','Non Anggota UKM') NOT NULL,
  `terverifikasi` enum('Belum','Sudah','Tidak') NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_user VALUES("1","Admin","payungteduh","admin@gmail.com","2016-08-03","Admin","Sudah");
INSERT INTO tb_user VALUES("3","RahmahF","payung","rahmah@gmail.com","2016-08-14","Anggota UKM","");
INSERT INTO tb_user VALUES("4","IhsanS","2","ihsan@gmail.com","2016-08-20","Anggota UKM","Sudah");
INSERT INTO tb_user VALUES("5","Jiwas","2","jiwa@gmail.com","2016-08-23","Anggota UKM","Belum");
INSERT INTO tb_user VALUES("6","Deni","payung","deni@gmail.com","2016-08-29","Anggota UKM","");
INSERT INTO tb_user VALUES("7","AgusSuryana02","2","agusuryana@gmail.com","2016-08-29","Anggota UKM","");
INSERT INTO tb_user VALUES("9","nandibordir","cbr.2015","nandibordir@gmail.com","2016-09-02","Anggota UKM","");
INSERT INTO tb_user VALUES("10","iyanS","2","iyan@gmail.com","2016-09-04","Anggota UKM","");
INSERT INTO tb_user VALUES("11","dielaC","2","diela@gmail.com","2016-09-05","Anggota UKM","");
INSERT INTO tb_user VALUES("12","Asepmul","3","asep@gmail.com","2016-09-06","Non Anggota UKM","Sudah");
INSERT INTO tb_user VALUES("13","Bencul","2","eep@gmail.com","2016-09-09","Anggota UKM","");
INSERT INTO tb_user VALUES("17","RezaAdit","2","reza@gmail.com","2016-09-14","Anggota UKM","");
INSERT INTO tb_user VALUES("18","Gerdi","2","gerdi@gmail.com","2016-09-26","Anggota UKM","");
INSERT INTO tb_user VALUES("19","rizal","smegol","ahmad@gmail.com","2016-09-30","Non Anggota UKM","");
INSERT INTO tb_user VALUES("20","Emi","payung","emi22@gmail.com","2016-10-02","Anggota UKM","");
INSERT INTO tb_user VALUES("21","YuliY","payung","yuli884@gmail.com","2016-10-02","Anggota UKM","Sudah");
INSERT INTO tb_user VALUES("22","Hanifa","london","hanifanur@gmail.com","2016-10-02","Anggota UKM","");
INSERT INTO tb_user VALUES("25","SriM","2","sri@gmail.com","2016-10-02","Anggota UKM","");
INSERT INTO tb_user VALUES("26","AsepYoghurt","2","asepyoghurt@gmail.com","2016-10-10","Anggota UKM","");
INSERT INTO tb_user VALUES("28","RUKUN IHTIAR ","2","RukunIhtiar@gmail.com","2016-10-10","Anggota UKM","");
INSERT INTO tb_user VALUES("29","Yudi Susandi","2","YudiSusandi@gmail.com","2016-10-10","Anggota UKM","");
INSERT INTO tb_user VALUES("30","sasasadd","2","dd@gmail.com","2016-10-15","Anggota UKM","");
INSERT INTO tb_user VALUES("31","FITRI","2","fitri@gmail.com","2016-10-17","Anggota UKM","");
INSERT INTO tb_user VALUES("32","AEP DANURWIJAYA","2","AEPDANURWIJAYA@gmail.com","2016-10-17","Anggota UKM","");
INSERT INTO tb_user VALUES("33","ANDIYANA TAILOR","2","ANDIYANATAILOR@gmail.com","2016-10-17","Anggota UKM","Sudah");
INSERT INTO tb_user VALUES("34","WINS BAG","2","winsbag@gmail.com","2016-10-17","Anggota UKM","Sudah");
INSERT INTO tb_user VALUES("35","sasas","2","asasasa@gmail.com","2016-10-30","Anggota UKM","");
INSERT INTO tb_user VALUES("36","sasasasasarff","2","sss@gmail.com","2016-10-30","Anggota UKM","");
INSERT INTO tb_user VALUES("37","Riki","2","riki@gmail.com","2016-10-31","Anggota UKM","");
INSERT INTO tb_user VALUES("38","Andy","2","andivictor@gmail.com","2016-10-31","Anggota UKM","");
INSERT INTO tb_user VALUES("39","adiiiiv","2","","2016-11-04","Non Anggota UKM","Belum");
INSERT INTO tb_user VALUES("40","asepbos","2","","2016-11-04","Anggota UKM","Belum");
INSERT INTO tb_user VALUES("41","salmans","2","","2016-11-04","Anggota UKM","Belum");
INSERT INTO tb_user VALUES("42","titin","2","","2016-11-05","Anggota UKM","Sudah");
INSERT INTO tb_user VALUES("43","gungun","sinta","","2017-01-05","Anggota UKM","Sudah");



