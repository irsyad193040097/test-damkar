/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.28-MariaDB : Database - website_damkarv2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`website_damkarv2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `website_damkarv2`;

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `contact` */

/*Table structure for table `dat_pages` */

DROP TABLE IF EXISTS `dat_pages`;

CREATE TABLE `dat_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `page_type` varchar(10) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `dat_pages` */

insert  into `dat_pages`(`id`,`title`,`slug`,`description`,`type`,`page_type`,`url`,`parent_id`,`active`,`order`,`created_by`,`created_at`,`updated_at`) values 
(1,'Beranda','beranda',NULL,'static','link',NULL,0,1,1,2,NULL,'2023-05-15 23:12:57'),
(110,'Berita','berita',NULL,'static','page','/news',0,1,3,1,'2023-05-18 11:28:41','2023-06-19 03:24:06'),
(111,'Profile','profile',NULL,'dynamic','page',NULL,0,1,2,1,'2023-06-19 03:24:02','2023-06-19 03:24:06'),
(112,'Struktur Organisasi','struktur-organisasi','<p><img class=\"img-fluid\" src=\"http://localhost/web_damkar_v2/public/storage/uploads/16891501661687122350.png\" alt=\"\" width=\"789\" height=\"561\" /></p>','dynamic','page',NULL,111,1,1,1,'2023-06-19 03:24:20','2023-07-12 15:22:49'),
(113,'Visi Misi','visi-misi','<p><strong>V I S I</strong></p>\r\n\r\n<p><strong>&ldquo;Bandung Barat yang AKUR (Aspiratif, Kreatif, Unggul dan Religius), dan berbasis pada pengembangan ekonomi, optimalisasi sumber daya alam dan kualitas sumber daya manusia&rdquo;.</strong></p>\r\n\r\n<p>Bandung Barat yang hendak diwujudkan merupakan sebuah kondisi Bandung Barat yang Aspiratif, Kreatif, Unggul dan Religius, dengan pengertian sebagai berikut :</p>\r\n\r\n<p>1. Aspiratif Pemerintah Bandung Barat yang aspiratif akan selalu mendengarkan dan menghargai menghargai harapan, keinginan, cita-cita, dan kemampuan masyarakat, sehingga kemudian pemerintahan dijalankan dengan berpihak pada kebutuhan dan suara masyarakat. Masyarakat dapat menyampaikan suaranya secara langsung, dan juga dapat melalui perwakilannya di DPRD maupun lembaga lainnya seperti lembaga pendidikan dan lembaga sosial kemasyarakatan</p>\r\n\r\n<p>2. Kreatif Penyelenggaraan pemerintahan di Bandung Barat dilaksanakan dengan terobosan dan menggunakan gagasan yang out of the box dan orisinil dalam rangka memenuhi kepentingan masyarakat melalui melalui pembangunan yang ramah lingkungan serta mematuhi seluruh peraturan yang berlaku</p>\r\n\r\n<p>3. Unggulan Bandung Barat harus diarahkan agar memiliki kemampuan dan kekuatan berdasarkan potensi yang ada untuk bersaing, memiliki kekelebihan komparatif dan kompetitif. Dalam konteks pembangunan Kabupaten Bandung Barat sarana prasarana dibangun dengan kualitas baik, SDM pengelola yang 198 Draft Rancangan Awal RPJMD Kabupaten Bandung Barat 2018-2023 berkualitas, pelayanan yang diberikan dengan kualitas terbaik, dan produk yang dihasil unggul secara kualitas dan dapat bersaing di tingkat regional, nasional dan internasional</p>\r\n\r\n<p>4. Religius Masyarakat Kabupaten Bandung Barat diharapkan memiliki dan terikat dengan nilai-nilai, norma, semangat dan kaidah agama. Nilai, norma dan semangat keagamaan ini harus senantiasa menjiwai, mewarnai dan menjadi ruh atau jiwa bagi seluruh aktivitas kehidupan, termasuk pembinaan sumberdaya manusia, penyelenggaraan pemerintahan, pelayanan, dan pelaksanaan pembangunan. Kehidupan bermasyarakat di Bandung Barat dijalankan dengan tetap menjunjung tinggi toleransi dan kerukunan hidup beragama, serta berbhineka tunggal ika.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>M I S I</strong></p>\r\n\r\n<p>Misi pembangunan Kabupaten Bandung Barat 2018 &ndash; 2023 disusun berdasarkan janji Bupati terpilih. Prinsip-prinsip sebagaimana janji Bupati terpilih yang digunakan sebagai dasar penyusunan misi ini adalah Kabupaten Bandung Barat yang mengarahkan pembangunan dalam jangka waktu 5 (lima) tahun ke depan sebagai berikut :</p>\r\n\r\n<p>1. Meningkatkan cakupan dan kualitas layanan pendidikan, kesehatan dan pelayanan dasar bagi masyarakat luas lainnya dalam rangka membangun sumber daya manusia yang berkualitas</p>\r\n\r\n<p>2. Mewujudkan agroindustri dan pariwisata sebagai sektor unggulan beserta sektor dan potensi sumber daya lainnya untuk menghasilkan pertumbuhan ekonomi yang berkeadilan, berkelanjutan dan berdaya saing</p>\r\n\r\n<p>3. Meningkatkan kualitas dan kuantitas infrastruktur fisik, sosial, dan ekonomi</p>\r\n\r\n<p>4. Mewujudkan tata kelola pemerintahan yang baik berbasis pengembangan teknologi informasi dan inovasi</p>','dynamic','page',NULL,111,1,2,1,'2023-06-19 03:24:39','2023-06-19 03:25:07'),
(114,'Tupoksi','tupoksi','<p><strong>Tugas Pokok dari Dinas Pemadam Kebakaran Kabupaten Bandung Barat:</strong></p>\r\n','dynamic','page',NULL,111,1,3,1,'2023-06-19 03:24:45','2023-06-19 03:25:07'),
(115,'Program dan Kegiatan','program-dan-kegiatan','<p><strong>Program dari Dinas Pemadam Kebakaran Kabupaten Bandung Barat</strong></p>\r\n','dynamic','page',NULL,111,1,4,1,'2023-06-19 03:24:59','2023-06-19 03:25:07'),
(117,'Kontak Kami','kontak-kami','<p>Alamat : Bale Seni Barli Kota Baru Parahyangan, Kertajaya, Kec. Padalarang, Kabupaten Bandung Barat, Jawa Barat 40553\r\n<p> \r\n022 87782113 -Padalarang-\r\n</p>\r\n<p> \r\n022 6940113 -Cililin-\r\n</p>\r\n<p> \r\n022 86866113 -Cikalong-\r\n</p>\r\n<p> \r\n022 2788292 -Lembang-\r\n</p>','dynamic','page',NULL,0,1,5,1,'2023-06-19 03:25:31','2023-06-19 03:25:37'),
(118,'Galeri','galeri',NULL,'static','page','/gallery',0,1,4,1,'2023-06-19 03:25:59','2023-06-19 03:26:03');

/*Table structure for table `dat_post_authors` */

DROP TABLE IF EXISTS `dat_post_authors`;

CREATE TABLE `dat_post_authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `dat_post_authors` */

/*Table structure for table `dat_post_categories` */

DROP TABLE IF EXISTS `dat_post_categories`;

CREATE TABLE `dat_post_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_category_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `dat_post_categories` */

/*Table structure for table `dat_posts` */

DROP TABLE IF EXISTS `dat_posts`;

CREATE TABLE `dat_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `uploaded_at` datetime DEFAULT NULL,
  `date_post` date DEFAULT NULL,
  `thumbnail` varchar(150) NOT NULL,
  `description` longtext NOT NULL,
  `published_at` datetime DEFAULT NULL,
  `is_published` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `dat_posts` */

insert  into `dat_posts`(`id`,`category_id`,`title`,`slug`,`uploaded_at`,`date_post`,`thumbnail`,`description`,`published_at`,`is_published`,`created_by`,`created_at`,`updated_at`) values 
(1,1,'KBB Juara Umum di Kejuaran Skill Competition Petugas Pemadam Kebakaran Tingkat Jawa Barat','kbb-juara-umum-di-kejuaran-skill-competition-petugas-pemadam-kebakaran-tingkat-jawa-barat','2023-08-05 00:00:00','2023-06-21','','<p>\r\nKabupaten Bandung Barat (KBB) borong piala. Kejuaran Skill Competition Petugas Pemadam Kebakaran dan Penyelamatan tingkat Jawa Barat 2023 keluar jauara umum. Kejuaran yang digelar BPBD Jawa Barat di Stadion Si Jalak Harupat, Rabu 21 Juni 2023.\r\n</p>\r\n<p>\r\nKategori diraih juara pertama Fire Fighter untuk Tim Damkar, juara pertama Reaksi Cepat untuk Tim Indofood NSF. Keluar menjadi juara umum boyong piala bergilir Gubernur Jawa Barat.\r\n</p>\r\n<p>\r\nKepala Pelaksana (Kalak) BPBD Jawa Barat, Dr. Dani Ramdan, MT mengucapkan selamat kepada para pemenang lomba, baik kategori “Fire Fighter Skill Competition (FFSC)” untuk petugas damkar maupun kategori “Emergency Response Team (ERT) Competition” untuk petugas HSE perusahaan.\r\n</p>\r\n<p>\r\n“Menang bukan berarti berhenti, tapi dorongan untuk berlari lebih kencang lagi,” ujar Dani.\r\n</p>\r\n<p>\r\nKepala Dinas Pemadam Kebakaran KBB, Siti Anshoriah mengatakan, timnya berhasil menyisihkan 19 kota/kabupaten yang ikut dalam kompotisi tersebut. “Kami ucapkan terimakasih untuk semua tim, pelatih, pemain, official, juri dan tim hore yang sudah memeriahkan  dan memberi support kepada para peserta. Hasil ini bukan akhir dari segalanya tapi awal dari perjuangan selanjutnya. Semoga Damkar KBB dapat mempertahankan yang sudah diraih,” pungkasnya.\r\n</p>','2023-08-05 00:00:00',1,1,'2023-08-05 00:00:00','2023-08-05 00:00:00');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `failed_jobs` */

/*Table structure for table `gallery` */

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `gallery` */

/*Table structure for table `homes` */

DROP TABLE IF EXISTS `homes`;

CREATE TABLE `homes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ket` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `homes` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `migrations` */

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`) USING BTREE,
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`) USING BTREE,
  CONSTRAINT `model_has_permissions_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`) USING BTREE,
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`) USING BTREE,
  CONSTRAINT `model_has_roles_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `model_has_roles` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `password_resets` */

/*Table structure for table `pengumuman` */

DROP TABLE IF EXISTS `pengumuman`;

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `isi_pengumuman` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `pengumuman` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'Create Post','web','2022-10-25 20:30:21','2022-10-25 20:30:21'),
(2,'Edit Post','web','2022-10-25 20:30:45','2022-10-25 20:30:45'),
(3,'View Post','web','2022-10-25 20:30:55','2022-10-25 20:30:55'),
(4,'Delete Post','web','2022-10-25 20:31:15','2022-10-25 20:31:15'),
(5,'Create Menu','web','2022-10-25 20:31:46','2022-10-25 20:31:46'),
(6,'Edit Menu','web','2022-10-25 20:31:55','2022-10-25 20:31:55'),
(7,'View Menu','web','2022-10-25 20:32:03','2022-10-25 20:32:03'),
(8,'Delete Menu','web','2022-10-25 20:32:11','2022-10-25 20:32:11'),
(9,'Create Post Category','web','2022-10-25 20:33:46','2022-10-25 20:33:46'),
(10,'Edit Post Category','web','2022-10-25 20:33:57','2022-10-25 20:33:57'),
(11,'View Post Category','web','2022-10-25 20:34:14','2022-10-25 20:34:14'),
(12,'Delete Post Category','web','2022-10-25 20:34:25','2022-10-25 20:34:25');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`) USING BTREE,
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `ref_authors` */

DROP TABLE IF EXISTS `ref_authors`;

CREATE TABLE `ref_authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(150) DEFAULT NULL,
  `place_of_birth` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `bio` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `ref_authors` */

/*Table structure for table `ref_post_categories` */

DROP TABLE IF EXISTS `ref_post_categories`;

CREATE TABLE `ref_post_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `ref_post_categories` */

insert  into `ref_post_categories`(`id`,`category_name`,`slug`,`created_by`,`created_at`,`updated_at`) values 
(1,'Bandung Barat','bandung-barat',1,'2023-08-05 00:00:00','2023-08-05 00:00:00'),
(2,'Dinas Pemadam Kebakaran Kabupaten Bandung Barat','dinas-pemadam-kebakaran',1,NULL,NULL);

/*Table structure for table `ref_settings` */

DROP TABLE IF EXISTS `ref_settings`;

CREATE TABLE `ref_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appname` varchar(255) DEFAULT NULL,
  `logo_1` varchar(50) DEFAULT NULL,
  `logo_2` varchar(50) DEFAULT NULL,
  `logo_3` varchar(50) DEFAULT NULL,
  `office_address` text DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `theme_color` varchar(50) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `ref_settings` */

insert  into `ref_settings`(`id`,`appname`,`logo_1`,`logo_2`,`logo_3`,`office_address`,`phone`,`email`,`fax`,`facebook`,`twitter`,`instagram`,`theme_color`,`meta_description`,`meta_keywords`,`created_at`,`updated_at`) values 
(1,'Website Damkar KBB',NULL,NULL,NULL,'Bale Seni Barli Kota Baru Parahyangan, Kertajaya, Kec. Padalarang, Kabupaten Bandung Barat, Jawa Barat 40553',NULL,'(022) 87782113',NULL,NULL,NULL,'https://www.instagram.com/damkar_bandungbarat/','#0405ff','Website Damkar KBB','Pemadam, Kebakaran, Damkar, Bandung, Barat, KBB, Dinas',NULL,NULL);

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`) USING BTREE,
  KEY `role_has_permissions_role_id_foreign` (`role_id`) USING BTREE,
  CONSTRAINT `role_has_permissions_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `role_has_permissions` */

insert  into `role_has_permissions`(`permission_id`,`role_id`) values 
(1,1),
(2,1),
(3,1),
(4,1),
(5,1),
(6,1),
(7,1),
(8,1),
(9,1),
(10,1),
(11,1),
(12,1);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'Admin','web',NULL,NULL),
(2,'Author','web',NULL,NULL);

/*Table structure for table `sliders` */

DROP TABLE IF EXISTS `sliders`;

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `sliders` */

insert  into `sliders`(`id`,`gambar`,`created_at`,`updated_at`) values 
(1,'sliders/1689146616.jpg','2023-08-05 00:00:00','2023-08-05 00:00:00'),
(2,'sliders/1689146617.jpg','2023-08-05 00:00:00','2023-08-05 00:00:00');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `place_of_birth` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`address`,`place_of_birth`,`date_of_birth`,`avatar`,`bio`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Superadmin','superadmin@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL);

/*Table structure for table `views` */

DROP TABLE IF EXISTS `views`;

CREATE TABLE `views` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `viewable_type` varchar(255) NOT NULL,
  `viewable_id` bigint(20) unsigned NOT NULL,
  `visitor` text DEFAULT NULL,
  `collection` varchar(255) DEFAULT NULL,
  `viewed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  KEY `views_viewable_type_viewable_id_index` (`viewable_type`,`viewable_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `views` */

/*Table structure for table `visitlogs` */

DROP TABLE IF EXISTS `visitlogs`;

CREATE TABLE `visitlogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL DEFAULT '0.0.0.0',
  `browser` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `region_name` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `time_zone` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `is_banned` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4596 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `visitlogs` */

insert  into `visitlogs`(`id`,`ip`,`browser`,`os`,`user_id`,`user_name`,`country_code`,`country_name`,`region_name`,`city`,`zip_code`,`time_zone`,`latitude`,`longitude`,`is_banned`,`created_at`,`updated_at`) values 
(4595,'127.0.0.1','Firefox (115.0)','Windows','0','Guest',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'2023-08-05 20:08:47','2023-08-05 20:44:51');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
