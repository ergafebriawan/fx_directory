-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 11, 2023 at 07:56 AM
-- Server version: 5.7.33
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fx_dir_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `fx_library`
--

CREATE TABLE `fx_library` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `path` varchar(250) NOT NULL,
  `uploaded_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_library`
--

INSERT INTO `fx_library` (`id`, `name`, `path`, `uploaded_at`) VALUES
(1, 'test file', 'storage/library/fx_library-test file-Tutorial Program Raspberry PI 4.docx', '2023-08-10 14:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `fx_project`
--

CREATE TABLE `fx_project` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_project`
--

INSERT INTO `fx_project` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Nidavellir', '<p>this project monitoring the riddler</p>\r\n<p>xxxxxxxxxxxxxxxxxxxxxx</p>', '2023-08-04 02:15:07', '2023-08-04 02:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `fx_set`
--

CREATE TABLE `fx_set` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_set`
--

INSERT INTO `fx_set` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'pengantar', 'selamat datang di directory kami, disini kami hanya ingin membagikan pengalaman kami untuk pencinta retro, kami selalu update dan dilihat update terbaru melalui kanal youtube kami @fx_directory. jangan lupa untuk saling berbagi sesama, salam people power.', '2023-07-15 02:09:00', '2023-07-15 02:09:00'),
(2, 'tentang', 'selamat datang di halaman kami, fx_directory ada kanal non profit, kanal dan halaman ini untuk kegiatan berbagi ilmu pengetahuan yang janggal, kami bukan organisasi jadi maklumi kalo update terlambat.\r\nregard fx_directory', '2023-07-15 02:11:25', '2023-07-15 02:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `fx_update`
--

CREATE TABLE `fx_update` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_update`
--

INSERT INTO `fx_update` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'Breaking news', '<p>this line number one</p>\r\n<p><strong>this line number two with bold</strong></p>\r\n<p><em>this line number three with italic</em></p>', '2023-08-02 10:13:18'),
(3, 'Lorem Ipsum', '<p>Lorem ipsum dolor sit amet. Ex soluta veniam non itaque sequi non maxime molestiae est harum sapiente qui eius omnis ab praesentium quas. Id omnis harum ut animi voluptatem nam quia unde aut aperiam nostrum.&nbsp;</p>\r\n<p>Quo voluptatum temporibus est enim aperiam sit ducimus ratione id fugiat voluptas ex perspiciatis error. Rem atque maiores est porro voluptatem a cumque unde qui ipsam nulla a natus galisum vel molestias mollitia ut ullam laborum.&nbsp;</p>\r\n<p>Sit fugit quas eos sint iste id velit temporibus qui dolorem galisum et minus distinctio. Qui voluptas distinctio qui consequatur reprehenderit ea possimus eaque!&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet. Ex soluta veniam non itaque sequi non maxime molestiae est harum sapiente qui eius omnis ab praesentium quas. Id omnis harum ut animi voluptatem nam quia unde aut aperiam nostrum.&nbsp;</p>\r\n<p>Quo voluptatum temporibus est enim aperiam sit ducimus ratione id fugiat voluptas ex perspiciatis error. Rem atque maiores est porro voluptatem a cumque unde qui ipsam nulla a natus galisum vel molestias mollitia ut ullam laborum.&nbsp;</p>\r\n<p>Sit fugit quas eos sint iste id velit temporibus qui dolorem galisum et minus distinctio. Qui voluptas distinctio qui consequatur reprehenderit ea possimus eaque!&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet. Ex soluta veniam non itaque sequi non maxime molestiae est harum sapiente qui eius omnis ab praesentium quas. Id omnis harum ut animi voluptatem nam quia unde aut aperiam nostrum.&nbsp;</p>\r\n<p>Quo voluptatum temporibus est enim aperiam sit ducimus ratione id fugiat voluptas ex perspiciatis error. Rem atque maiores est porro voluptatem a cumque unde qui ipsam nulla a natus galisum vel molestias mollitia ut ullam laborum.&nbsp;</p>\r\n<p>Sit fugit quas eos sint iste id velit temporibus qui dolorem galisum et minus distinctio. Qui voluptas distinctio qui consequatur reprehenderit ea possimus eaque!&nbsp;</p>', '2023-08-03 07:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `fx_user`
--

CREATE TABLE `fx_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fx_user`
--

INSERT INTO `fx_user` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'riddler', 'ad4b707159746ee2d0669a494439fb56', '2023-08-06 11:19:02', '2023-08-10 14:56:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fx_library`
--
ALTER TABLE `fx_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_project`
--
ALTER TABLE `fx_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_set`
--
ALTER TABLE `fx_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_update`
--
ALTER TABLE `fx_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fx_user`
--
ALTER TABLE `fx_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fx_library`
--
ALTER TABLE `fx_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fx_project`
--
ALTER TABLE `fx_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fx_set`
--
ALTER TABLE `fx_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fx_update`
--
ALTER TABLE `fx_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fx_user`
--
ALTER TABLE `fx_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
