
--
-- Table structure for table `#__mywalks`
--

CREATE TABLE IF NOT EXISTS `#__mywalks` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `distance` decimal(10,0) NOT NULL,
  `toilets` tinyint(1) NOT NULL DEFAULT '0',
  `cafe` tinyint(1) NOT NULL DEFAULT '0',
  `hills` int(11) NOT NULL DEFAULT '0',
  `bogs` int(11) NOT NULL DEFAULT '0',
  `picture` varchar(128) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `alt` varchar(64) DEFAULT NULL,
  `state` TINYINT NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;

--
-- Dumping data for table `#__mywalks`
--

INSERT IGNORE INTO `#__mywalks` (`id`, `title`, `description`, `distance`, `toilets`, `cafe`, `hills`, `bogs`, `picture`, `width`, `height`, `alt`) VALUES
(1, 'City Centre', 'Highligts of Anycity', '5', 1, 1, 0, 0, NULL, NULL, NULL, ''),
(2, 'Woods', 'Woodland walk on hard paths', '4', 0, 0, 1, 1, NULL, NULL, NULL, ''),
(3, 'Hills', 'Hill walk with good views on established path.', '6', 0, 0, 3, 2, NULL, NULL, NULL, ''),
(4, 'Lake Thingy', 'Walk around the lake on an accessible path.', '2', 1, 1, 0, 0, NULL, NULL, NULL, ''),
(5, 'Castle Railway Track', 'Walk along the line of the old railway track from start point car park to Thing castle', '2', 1, 1, 0, 0, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `#__mywalk_dates`
--

CREATE TABLE IF NOT EXISTS `#__mywalk_dates` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `walk_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `weather` varchar(256) DEFAULT NULL,
  `state` TINYINT NOT NULL DEFAULT '1',
  KEY `idx_walk` (`walk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;

--
-- Dumping data for table `#__mywalk_dates`
--

INSERT IGNORE INTO `#__mywalk_dates` (`id`, `walk_id`, `date`, `weather`) VALUES
(1, 1, '2019-05-12', 'Dry and Sunny'),
(2, 2, '2019-06-09', 'Wet and Windy'),
(3, 3, '2019-01-01', 'Cold and wet'),
(4, 4, '2019-01-20', 'Bright but frosty'),
(5, 5, '2019-04-28', 'Dry and warm'),
(6, 1, '2019-05-12', 'Wet and windy'),
(7, 3, '2019-06-09', 'Hot and dry'),
(8, 5, '2019-07-21', 'Overcast but warm and humid');
