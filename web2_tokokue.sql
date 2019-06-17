-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2019 at 12:20 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web2_tokokue`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(8) NOT NULL,
  `id_position` varchar(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_status` tinyint(1) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `photo_profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `id_position`, `firstname`, `lastname`, `username`, `email`, `password`, `admin_status`, `date_created`, `photo_profile`) VALUES
('ADMIN131', 'POS01', 'admin', '', 'admin', 'admin@cakefactory.com', '$2y$10$gyyJtqRuUrky8Pi80phLn.lakC1iF4/.QG5.bb8IqA6Y/0co4bInS', 1, '2019-05-24 05:31:19', 'default-user.png'),
('ADMIN197', 'POS02', 'Salast Putri', 'Ramadhani', 'salastputri', 'salastputri@gmail.com', '$2y$10$jcAuaeI4E1cEqIy5fNaEf.bYBP80Mir7BucrP13VNyUWPNT.90Fxi', 1, '2019-04-24 04:40:33', '1dd4df484da0fee4dfee98cef6073052.jpg'),
('ADMIN320', 'POS01', 'Muhammad', 'Faturrahman', 'mfaturrahman97', 'mfaturrahman97@gmail.com', '$2y$10$oU4HKfkiRMg/sBVjv82bhuaKpDAPDb4FdGylP0rcTqLkNAEd.cBiW', 1, '2019-04-19 03:06:35', '2a78aa3c2ae23b33ed8bce59248b4f45.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin_position`
--

CREATE TABLE `tb_admin_position` (
  `id_position` varchar(5) NOT NULL,
  `position_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin_position`
--

INSERT INTO `tb_admin_position` (`id_position`, `position_name`) VALUES
('POS01', 'Super Admin'),
('POS02', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_kue`
--

CREATE TABLE `tb_kategori_kue` (
  `kd_kategori_kue` varchar(5) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori_kue`
--

INSERT INTO `tb_kategori_kue` (`kd_kategori_kue`, `nama_kategori`) VALUES
('KC001', 'Signature Cakes'),
('KC002', 'Chocolate Cakes'),
('KC003', 'Cheesecakes'),
('KC004', 'Snack'),
('KC005', 'Birthday Cakes');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` varchar(36) NOT NULL,
  `id_user` varchar(8) NOT NULL,
  `kd_kue` varchar(8) NOT NULL,
  `status_keranjang` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id_keranjang`, `id_user`, `kd_kue`, `status_keranjang`) VALUES
('7a52bce7-d609-4cc0-b212-34d18b6bb647', 'USR21242', 'CAKE3965', 0),
('d8984e50-825d-49a0-8e11-34ecfe6521af', 'USR21242', 'CAKE1478', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kue`
--

CREATE TABLE `tb_kue` (
  `kd_kue` varchar(8) NOT NULL,
  `kd_kategori_kue` varchar(5) NOT NULL,
  `id_toko` varchar(8) NOT NULL,
  `nama_kue` varchar(100) NOT NULL,
  `deskripsi_kue` text,
  `harga_kue` double NOT NULL,
  `rating_kue` int(11) DEFAULT NULL,
  `photo_path` varchar(100) DEFAULT NULL,
  `tanggal_ditambah` datetime DEFAULT NULL,
  `status_kue` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kue`
--

INSERT INTO `tb_kue` (`kd_kue`, `kd_kategori_kue`, `id_toko`, `nama_kue`, `deskripsi_kue`, `harga_kue`, `rating_kue`, `photo_path`, `tanggal_ditambah`, `status_kue`) VALUES
('CAKE1065', 'KC001', 'STR15893', 'Galaxy Cake', '<p>Step into another world with our multi colored galaxy cake.</p>\r\n\r\n<p>It&#39;s the perfect cake for stargazers and dreamers alike. If you want to be the talk of the party then enchant your friends with this glitter sparkling galaxy cake topped with our signature galaxy swirl macarons.<br />\r\n<br />\r\n<strong>Occasion:</strong>&nbsp;Adults/Kids Birthday Parties, Office Parties and Other Celebrations</p>\r\n\r\n<p><strong>Ingredients:</strong><em><strong>&nbsp;</strong>&nbsp;chocolate sponge, dark couverture chocolate ganache.</em></p>\r\n\r\n<p>Size can vary depending on your needs, below is our recommend portions for each cake size</p>\r\n\r\n<ul>\r\n	<li>Round 20cm (diameter): 8-12 slices</li>\r\n	<li>20cm x 30cm: 24 slices</li>\r\n	<li>30cm x 40cm: 48 slices</li>\r\n</ul>', 400000, NULL, 'fe07d363625f0d9b39fa834a6bcf8912.jpg', '2019-06-05 02:04:26', 1),
('CAKE1396', 'KC002', 'STR84640', 'Opera Cake 05', '<p>20x20 square : Rp. 265,000</p>\r\n\r\n<p>15x15 square : Rp. 160,000</p>\r\n\r\n<p>10x10 square : Rp. 85,000</p>', 85000, NULL, 'a6d165f5c1116f8c21d05c86ab092d52.jpg', '2019-06-10 03:05:32', 1),
('CAKE1478', 'KC002', 'STR15893', 'Chocolate Sunday', '<p>Meet our redefined &#39;Chocolate Sunday&#39;.</p>\r\n\r\n<p>A rich chocolate ganache finish with contrasting sprinkles playfully covering the top &amp; base.</p>\r\n\r\n<p>Paired with the same &#39;Chocolate Sunday&#39; recipe inside, but more of it!</p>\r\n\r\n<p>This one will take you back to your childhood birthday cakes, just like Mom used to make.</p>\r\n\r\n<p><strong>Ingredients</strong>:<em>&nbsp;chocolate sponge, dark couverture chocolate ganache, sprinkles.</em></p>\r\n\r\n<p>Size can vary depending on your needs, below is our recommend portions for each cake size</p>\r\n\r\n<ul>\r\n	<li>Round 20cm (diameter): 8-12 slices</li>\r\n	<li>20cm x 30cm: 24 slices</li>\r\n	<li>30cm x 40cm: 48 slices</li>\r\n</ul>', 350000, NULL, '2d223e9da9371f5320e493bdc65defb8.jpg', '2019-05-16 01:55:43', 1),
('CAKE1671', 'KC001', 'STR15893', 'Love, Sweet Love', '<p>Love is indefinite. Be it for your crush, your pet, your teacher, your family or even for yourself, show how much you love with this &ldquo;Love, Sweet Love&rdquo; Cake.</p>\r\n\r\n<p>This cake is made with Chocolate sponge coated with Chocolate ganache, buttercream and glazed with a Chocolate drip. Decorated on top are pink macarons, meringue kisses, a sugar cookie &amp; fondant hearts.&nbsp;</p>\r\n\r\n<p><strong>Ingredients</strong>:<em> chocolate ganache, butter Cream, meringue, macaron.</em></p>\r\n\r\n<p>Size can vary depending on your needs, below is our recommend portions for each cake size</p>\r\n\r\n<ul>\r\n	<li>Round 20cm (diameter): 8-12 slices</li>\r\n	<li>20cm x 30cm: 24 slices</li>\r\n	<li>30cm x 40cm: 48 slices</li>\r\n</ul>', 400000, NULL, '0ff8ef4166431a94f5025652ef701a9f.jpg', '2019-06-05 01:57:26', 1),
('CAKE1739', 'KC002', 'STR15893', 'Ovo Milo', '<p>Our ultimate bestseller and signature cake.</p>\r\n\r\n<p>Our Ovomilo has the perfect balance of Ovomaltine and Milo which has a nice bite of&nbsp;crispy cereal topped with fresh Bavarian&nbsp;cream, milk chocolate ganache and a fluffy chocolate chiffon sponge. The outside shell&nbsp;has&nbsp;a delectable Ovomaltine glaze, which makes this cake a true favorite amongst our cake lover customers.</p>\r\n\r\n<p><strong>Ingredients</strong>:<em> Elmer chocomaltine, Milo, chocolate sponge cake, fresh cream, crispy wafer, dark chocolate.</em></p>\r\n\r\n<p>Size can vary depending on your needs, below is our recommend portions for each cake size</p>\r\n\r\n<ul>\r\n	<li>Round 20cm (diameter): 8-12 slices</li>\r\n	<li>20cm x 30cm: 24 slices</li>\r\n	<li>30cm x 40cm: 48 slices</li>\r\n</ul>', 600000, NULL, 'a0afe547c04bf2d5976fe4bfeee515bf.jpg', '2019-06-04 12:08:08', 1),
('CAKE2005', 'KC001', 'STR15893', 'Mermaid', '<p>Add a touch of fantasy and take a dive under the sea with our Magical Mermaid cake.</p>\r\n\r\n<p>Made with our special edible pearls, chocolate mermaid tail and shiny seas stars. This cake will whisk you away from reality and remind you of why you loved cartoons as a child.</p>\r\n\r\n<p>Paired with our signature&nbsp;Chocolate Sunday&nbsp;cake inside</p>\r\n\r\n<p><strong>Occasions:</strong>&nbsp;Adults/Kids Birthday Parties, Baby Showers, Office Parties<br />\r\n<br />\r\n<strong>Ingredients:<em>&nbsp;</em></strong><em>chocolate sponge, Belgian dark chocolate ganache, crunchy wafer, chocolate crack.</em></p>\r\n\r\n<p>Size can vary depending on your needs, below is our recommend portions for each cake size</p>\r\n\r\n<ul>\r\n	<li>Round 20cm (diameter): 8-12 slices</li>\r\n	<li>20cm x 30cm: 24 slices</li>\r\n	<li>30cm x 40cm: 48 slices</li>\r\n</ul>', 400000, NULL, '93eacd7eeea396eadebe72b8d57a46d0.jpg', '2019-06-05 02:00:21', 1),
('CAKE2014', 'KC002', 'STR15893', 'Chocolate Amber', '<p>Chocolate &amp; Peanut Butter got all dressed up for a special occasion.&nbsp;</p>\r\n\r\n<p>Our rich Lola Bar cake gets covered in dark chocolate ganache and is decorated with peanut studded chocolate shards, handcrafted macarons, meringues and golden chocolate biscuit buttons. The perfect cake to gift or to celebrate with!&nbsp;</p>\r\n\r\n<p><strong>Ingredients</strong>:<em>&nbsp;chocolate sponge, crunchy wafer, caramel peanut,milk chocolate cream,chocolate glaze,peanut.</em></p>\r\n\r\n<p>Size can vary depending on your needs, below is our recommend portions for each cake size</p>\r\n\r\n<ul>\r\n	<li>Round 20cm (diameter): 8-12 slices</li>\r\n	<li>20cm x 30cm: 24 slices</li>\r\n	<li>30cm x 40cm: 48 slices</li>\r\n</ul>', 400000, NULL, 'eb79a3a9753f3937d10a2e45fcc9d7ca.jpg', '2019-06-04 12:13:35', 1),
('CAKE2073', 'KC002', 'STR84640', 'Black Forest Fresh Cream Cherry Ajc 08', '<p>Black Forest Fresh Cream Cherry Ajc 08</p>', 285000, NULL, 'c380243d345d974c76fb6ef6557e1634.jpg', '2019-06-05 02:46:14', 1),
('CAKE2131', 'KC002', 'STR84640', 'Black Forest Cherry Ajc 03', '<p>20 round : Rp. 275,000</p>\r\n\r\n<p>24 round : Rp. 355,000</p>\r\n\r\n<p>30 round : Rp. 540,000</p>\r\n\r\n<p>22x22 square : Rp. 440,000</p>\r\n\r\n<p>30x30 square : Rp. 830,000</p>\r\n\r\n<p>30x40 square : Rp. 1,025,000</p>\r\n\r\n<p>40x60 square : Rp. 1,920,000</p>', 275000, NULL, '2d17638ba340df644c38d4bf5077d431.jpg', '2019-06-05 02:43:11', 1),
('CAKE2199', 'KC002', 'STR15893', 'Lola Signature', '<p>Packed with even more chocolate.</p>\r\n\r\n<p>It&#39;s nuts!</p>\r\n\r\n<p>Snicker&#39;s lovers out there will love our signature Lola Bar.</p>\r\n\r\n<p>Layers of decadent caramel butterscotch crunch, milk chocolate cremeux, chocolate, and peanut butter glaze. Drizzled with both dark and milk chocolate and surrounded by crushed peanuts.</p>\r\n\r\n<p><em><em>Chocolate sponge, milk chocolate, dark chocolate, fresh milk, fresh cream, peanut butter, caramel, nuts, crispy wafer.</em></em></p>\r\n\r\n<p>Size can vary depending on your needs, below is our recommend portions for each cake size</p>\r\n\r\n<ul>\r\n	<li>Round 20cm (diameter): 8-12 slices</li>\r\n	<li>20cm x 30cm: 24 slices</li>\r\n	<li>30cm x 40cm: 48 slices</li>\r\n</ul>', 350000, NULL, '3647dcb7dacd76a0260555b2b5710ebc.jpg', '2019-06-04 12:16:56', 1),
('CAKE3965', 'KC001', 'STR15893', 'Popcorn Caramello', '<p>The iconic movie treat is re-imagined.</p>\r\n\r\n<p>Featuring a caramel popcorn overload arrangement from two waffle cones that are brushed with edible gold lustre.</p>\r\n\r\n<p>Inside is a silky caramel buttercream with almond crunch nestling between 3 layers of fluffy vanilla cake.</p>\r\n\r\n<p>An eye-catching crowd pleaser!&nbsp;</p>\r\n\r\n<p><strong>Ingredients</strong>: <em>vanilla sponge, salty butter cream,nougatine, caramel glaze, popcorn.</em></p>\r\n\r\n<p>Size can vary depending on your needs, below is our recommend portions for each cake size</p>\r\n\r\n<ul>\r\n	<li>Round 20cm (diameter): 8-12 slices</li>\r\n	<li>20cm x 30cm: 24 slices</li>\r\n	<li>30cm x 40cm: 48 slices</li>\r\n</ul>', 400000, NULL, '97c5fd831919e0b21a304bc1f1203b63.jpg', '2019-05-16 09:03:36', 1),
('CAKE6528', 'KC002', 'STR15893', 'Chocolate Madness', '<p>Same look with a more chocolate-y taste.</p>\r\n\r\n<p>We&rsquo;ve upgraded our signature Chocolate Madness and changed the inside to that of our Chocolate Sunday. A rich chocolate cake with luscious Belgian chocolate ganache paired with a multitude of chocolate Candyland on top&nbsp;to make this the ultimate chocolate lover&rsquo;s cake.</p>\r\n\r\n<p><strong>Ingredients</strong>:<em>&nbsp;chocolate sponge, dark couverture chocolate ganache, sprinkles, Oreo cookies, Take-It, Bueno, Chik Chok, chocolate macaron.</em></p>\r\n\r\n<p>Size can vary depending on your needs, below is our recommend portions for each cake size</p>\r\n\r\n<ul>\r\n	<li>Round 20cm (diameter): 8-12 slices</li>\r\n	<li>20cm x 30cm: 24 slices</li>\r\n	<li>30cm x 40cm: 48 slices</li>\r\n</ul>', 385000, NULL, '8a0eff257ebfe98bfc14ecf03ee672ef.jpg', '2019-05-16 01:53:21', 1),
('CAKE7175', 'KC001', 'STR15893', 'Unicorn Cake', '<p>Bring a little bit of magic into your days.</p>\r\n\r\n<p>This dreamy cake will definitely whisk you away to a world where wishes comes true &amp; Unicorns exist.</p>\r\n\r\n<p>Iced with pastel colored gradients and decorated with macarons, meringue kisses to highlight the gold Unicorn centerpiece.</p>\r\n\r\n<p><strong>New Flavor:</strong>&nbsp;now paired with our delightful Banana Split&nbsp;cake inside. For ages 2-92.</p>\r\n\r\n<p><strong>Occasions:</strong>&nbsp;Kids Birthday Parties, Baby Showers, Office Parties</p>\r\n\r\n<p><strong>Ingredients:</strong><em><strong>&nbsp;</strong>&nbsp;banana sponge,cream cheese frosting strawberry flavor, strawberry&nbsp;jelly, chocolate cream, chocolate crack, butter cream, peanut royal.</em></p>\r\n\r\n<p>Size can vary depending on your needs, below is our recommend portions for each cake size</p>\r\n\r\n<ul>\r\n	<li>Round 20cm (diameter): 8-12 slices</li>\r\n	<li>20cm x 30cm: 24 slices</li>\r\n	<li>30cm x 40cm: 48 slices</li>\r\n</ul>', 385000, NULL, '6b119c4f711b27c096fb1d5d3651f28e.jpg', '2019-06-05 02:08:56', 1),
('CAKE8295', 'KC002', 'STR84640', 'Chocho Fruit Tart 14', '<p>Chocho Fruit Tart 14</p>', 215000, NULL, '845df9a5e72ad26dda0cc9ebfa6da4b2.jpg', '2019-06-10 03:07:14', 1),
('CAKE8566', 'KC002', 'STR84640', 'AJ Chocolate 2', '<p>Have you thought about enjoying bath with the sweet and rich taste of chocolate? This chocolate cake is a forever cake that lasting through the century just by its smooth cocoa flavor and taste.</p>', 310000, NULL, '622e7675fd8d7648d2842fee4b061608.jpg', '2019-06-05 02:37:44', 1),
('CAKE9715', 'KC002', 'STR84640', 'AJ Chocolate 3', '<p>Have you thought about enjoying bath with the sweet and rich taste of chocolate? This chocolate cake is a forever cake that lasting through the century just by its smooth cocoa flavor and taste.</p>', 310000, NULL, 'c38f40f5e8a317380c198affab2eb3a9.jpg', '2019-06-05 02:39:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_r_transaksi`
--

CREATE TABLE `tb_r_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(100) NOT NULL,
  `id_user` varchar(8) NOT NULL,
  `id_toko` varchar(8) NOT NULL,
  `kd_kue` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_r_transaksi`
--

INSERT INTO `tb_r_transaksi` (`id`, `id_transaksi`, `id_user`, `id_toko`, `kd_kue`) VALUES
(2, '43d71b72-e764-4e85-9057-2378f8e5402e', 'USR21242', 'STR15893', 'CAKE1478'),
(3, '9cd59bba-2ec4-4cfb-970c-9fb8151733ec', 'USR21242', 'STR15893', 'CAKE3965');

-- --------------------------------------------------------

--
-- Table structure for table `tb_toko`
--

CREATE TABLE `tb_toko` (
  `id_toko` varchar(8) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `tentang_toko` text,
  `alamat_toko` text,
  `no_telp` varchar(15) DEFAULT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `toko_buka` time DEFAULT NULL,
  `toko_tutup` time DEFAULT NULL,
  `photo_path` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tanggal_pendaftaran` datetime DEFAULT NULL,
  `status_toko` tinyint(1) DEFAULT NULL,
  `facebook_link` varchar(100) DEFAULT NULL,
  `instagram_link` varchar(100) DEFAULT NULL,
  `twitter_link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_toko`
--

INSERT INTO `tb_toko` (`id_toko`, `nama_toko`, `tentang_toko`, `alamat_toko`, `no_telp`, `no_handphone`, `toko_buka`, `toko_tutup`, `photo_path`, `email`, `password`, `tanggal_pendaftaran`, `status_toko`, `facebook_link`, `instagram_link`, `twitter_link`) VALUES
('STR15893', 'Colette &amp; Lola', '', 'West Mall Lt. 3a Jl. MH. Thamrin No. 1 Jakarta Pusat 10310', '', '02123580617', '08:00:00', '20:00:00', 'a2c526020e5a774357fd0518e0ad2ca6.png', 'admin@colettelola.com', '$2y$10$SsVYbKlGI2Nxm0tNQbU6ZOLy0UHwKDOAB.79ldnlC6oyTELDRCWda', '2019-05-13 10:42:46', 1, NULL, NULL, NULL),
('STR84640', 'AJ Bakery', '', 'Jl. Summagung III blok KR No. 22, Kelapa Gading Permai, Jakarta Utara', '0214523956', '0214523956', '08:00:00', '21:00:00', '6ad95ef6f56f91ed30810fd2fc47d408.jpg', 'admin@ajbakery.com', '$2y$10$11DclABxooe/6lSlR3w48eCMLsJWitXaoJOAnkyQDPDXz3sSr7rWa', '2019-04-30 03:07:37', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(100) NOT NULL,
  `tanggal_transaksi` datetime DEFAULT NULL,
  `quantitiy` int(11) NOT NULL,
  `total_harga` double NOT NULL,
  `status_transaksi` tinyint(1) DEFAULT NULL,
  `status_penerimaan` tinyint(1) DEFAULT NULL,
  `status_pengiriman` tinyint(1) DEFAULT NULL,
  `status_sampai` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `tanggal_transaksi`, `quantitiy`, `total_harga`, `status_transaksi`, `status_penerimaan`, `status_pengiriman`, `status_sampai`) VALUES
('43d71b72-e764-4e85-9057-2378f8e5402e', '2019-05-27 02:36:19', 1, 350000, 1, 1, 1, 1),
('9cd59bba-2ec4-4cfb-970c-9fb8151733ec', '2019-05-29 11:42:02', 1, 400000, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` varchar(8) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(15) DEFAULT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `photo_path` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tanggal_pendaftaran` datetime DEFAULT NULL,
  `status_user` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama_depan`, `nama_belakang`, `alamat`, `no_telp`, `no_handphone`, `photo_path`, `email`, `password`, `tanggal_pendaftaran`, `status_user`) VALUES
('USR21242', 'Muhammad', 'Faturrahman', 'Bekasi Timur', '083879272266', '083879272266', '0ea0be8ef5ba9ef56cf94b682b8816ba.jpg', 'fr62190@gmail.com', '$2y$10$56yqauMyvi5Q/CD6lEYS6OYwFnf6pJNCPSS5s/klMyQHkdtinGp2S', '2019-04-24 10:29:09', 1),
('USR94419', 'Salast Putri', 'Ramadhani', 'Bekasi Kota', NULL, '085243215678', 'default-user.png', 'salastputri@gmail.com', '$2y$10$6H3DKZwyeSxS5zVUIAoD/.S3BOkLI3vZQkfXa7StMX91wzfMCymCa', '2019-05-31 06:12:02', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_position` (`id_position`);

--
-- Indexes for table `tb_admin_position`
--
ALTER TABLE `tb_admin_position`
  ADD PRIMARY KEY (`id_position`);

--
-- Indexes for table `tb_kategori_kue`
--
ALTER TABLE `tb_kategori_kue`
  ADD PRIMARY KEY (`kd_kategori_kue`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kd_kue` (`kd_kue`);

--
-- Indexes for table `tb_kue`
--
ALTER TABLE `tb_kue`
  ADD PRIMARY KEY (`kd_kue`),
  ADD KEY `kd_kategori_kue` (`kd_kategori_kue`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indexes for table `tb_r_transaksi`
--
ALTER TABLE `tb_r_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_toko` (`id_toko`),
  ADD KEY `kd_kue` (`kd_kue`);

--
-- Indexes for table `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_r_transaksi`
--
ALTER TABLE `tb_r_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`id_position`) REFERENCES `tb_admin_position` (`id_position`);

--
-- Constraints for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD CONSTRAINT `tb_keranjang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`),
  ADD CONSTRAINT `tb_keranjang_ibfk_2` FOREIGN KEY (`kd_kue`) REFERENCES `tb_kue` (`kd_kue`);

--
-- Constraints for table `tb_kue`
--
ALTER TABLE `tb_kue`
  ADD CONSTRAINT `tb_kue_ibfk_1` FOREIGN KEY (`kd_kategori_kue`) REFERENCES `tb_kategori_kue` (`kd_kategori_kue`),
  ADD CONSTRAINT `tb_kue_ibfk_2` FOREIGN KEY (`id_toko`) REFERENCES `tb_toko` (`id_toko`);

--
-- Constraints for table `tb_r_transaksi`
--
ALTER TABLE `tb_r_transaksi`
  ADD CONSTRAINT `tb_r_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`),
  ADD CONSTRAINT `tb_r_transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`),
  ADD CONSTRAINT `tb_r_transaksi_ibfk_3` FOREIGN KEY (`id_toko`) REFERENCES `tb_toko` (`id_toko`),
  ADD CONSTRAINT `tb_r_transaksi_ibfk_4` FOREIGN KEY (`kd_kue`) REFERENCES `tb_kue` (`kd_kue`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
