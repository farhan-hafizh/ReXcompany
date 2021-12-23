-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 03:28 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rexcompany`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_detail_id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `slug`, `game_detail_id`, `genre_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'grand_theft_auto_v', 2, 6, 'Grand Theft Auto V', '2021-12-07 20:08:40', '2021-12-07 20:08:40'),
(3, 'euro_truck_simulator2', 3, 8, 'Euro Truck Simulator 2', '2021-12-07 20:21:40', '2021-12-07 20:21:40'),
(4, 'forza_horizon4', 4, 4, 'Forza Horizon 4', '2021-12-07 20:24:51', '2021-12-07 20:24:51'),
(6, 'g_t_f_o', 6, 3, 'GTFO', '2021-12-07 23:22:21', '2021-12-07 23:22:21'),
(7, 'apex_legend', 7, 3, 'Apex Legend', '2021-12-07 23:24:33', '2021-12-07 23:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `game_details`
--

CREATE TABLE `game_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `developer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `forAdult` tinyint(1) NOT NULL,
  `game_cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_trailer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_details`
--

INSERT INTO `game_details` (`id`, `developer`, `publisher`, `price`, `forAdult`, `game_cover`, `game_trailer`, `description`, `long_description`, `created_at`, `updated_at`) VALUES
(2, 'Rockstar North', 'Rockstar Game', 300000, 1, '1638932920_header.jpg', '1638932920_movie480.webm', 'Grand Theft Auto V for PC offers players the option to explore the award-winning world of Los Santos and Blaine County in resolutions of up to 4k and beyond, as well as the chance to experience the game running at 60 frames per second.', 'When a young street hustler, a retired bank robber and a terrifying psychopath find themselves entangled with some of the most frightening and deranged elements of the criminal underworld, the U.S. government and the entertainment industry, they must pull off a series of dangerous heists to survive in a ruthless city in which they can trust nobody, least of all each other.\r\n\r\nGrand Theft Auto V for PC offers players the option to explore the award-winning world of Los Santos and Blaine County in resolutions of up to 4k and beyond, as well as the chance to experience the game running at 60 frames per second.\r\n\r\nThe game offers players a huge range of PC-specific customization options, including over 25 separate configurable settings for texture quality, shaders, tessellation, anti-aliasing and more, as well as support and extensive customization for mouse and keyboard controls. Additional options include a population density slider to control car and pedestrian traffic, as well as dual and triple monitor support, 3D compatibility, and plug-and-play controller support.\r\n\r\nGrand Theft Auto V for PC also includes Grand Theft Auto Online, with support for 30 players and two spectators. Grand Theft Auto Online for PC will include all existing gameplay upgrades and Rockstar-created content released since the launch of Grand Theft Auto Online, including Heists and Adversary modes.\r\n\r\nThe PC version of Grand Theft Auto V and Grand Theft Auto Online features First Person Mode, giving players the chance to explore the incredibly detailed world of Los Santos and Blaine County in an entirely new way.', '2021-12-07 20:08:40', '2021-12-07 20:08:40'),
(3, 'SCS Software', 'SCS Software', 170000, 0, '1638933700_header-1.jpg', '1638933700_movie480_vp91.webm', 'Travel across Europe as king of the road, a trucker who delivers important cargo across impressive distances! With dozens of cities to explore, your endurance, skill and speed will all be pushed to their limits.', 'Travel across Europe as king of the road, a trucker who delivers important cargo across impressive distances! With dozens of cities to explore from the UK, Belgium, Germany, Italy, the Netherlands, Poland, and many more, your endurance, skill and speed will all be pushed to their limits. If you’ve got what it takes to be part of an elite trucking force, get behind the wheel and prove it!\r\nKey Features:\r\n\r\n    Transport a vast variety of cargo across more than 60 European cities.\r\n    Run your own business which continues to grow even as you complete your freight deliveries.\r\n    Build your own fleet of trucks, buy garages, hire drivers, manage your company for maximum profits.\r\n    A varied amount of truck tuning that range from performance to cosmetic changes.\r\n    Customize your vehicles with optional lights, bars, horns, beacons, smoke exhausts, and more.\r\n    Thousands of miles of real road networks with hundreds of famous landmarks and structures.\r\n\r\nWorld of Trucks\r\nTake advantage of additional features of Euro Truck Simulator 2 by joining our online community on World of Trucks, our center for virtual truckers all around the world interested in Euro Truck Simulator 2 and future SCS Software\'s truck simulators.\r\n\r\n    Use in-game Photo Mode to capture the best moments and share them with thousands of people who love trucks.\r\n    Favorite the images you like the most and return to them anytime in the future.\r\n    Discuss the screenshots with everyone using World of Trucks.\r\n    See the best images hand-picked by the game creators in Editor\'s Pick updated almost every day. Try to get your own screenshot on this list!\r\n    Upload and use your custom avatar and license plate in the game.\r\n    More features coming soon!\r\n\r\n\r\nTo join World of Trucks, simply sign up with your Steam account on the join page.\r\n\r\nWorld of Trucks is an optional service, registration on World of Trucks isn\'t required to play the game.', '2021-12-07 20:21:40', '2021-12-07 20:21:40'),
(4, 'Playground Games', 'Xbox Game Studios', 250000, 0, '1638933891_forza.jpg', '1638933891_forza.webm', 'Dynamic seasons change everything at the world’s greatest automotive festival. Go it alone or team up with others to explore beautiful and historic Britain in a shared open world.', 'Dynamic seasons change everything at the world’s greatest automotive festival. Go it alone or team up with others to explore beautiful and historic Britain in a shared open world. Collect, modify and drive over 450 cars. Race, stunt, create and explore – choose your own path to become a Horizon Superstar.\r\n\r\n\r\nCollect Over 450 Cars\r\nEnjoy the largest and most diverse Horizon car roster yet, including over 100 licensed manufacturers.\r\n\r\nRace. Stunt. Create. Explore.\r\nIn the new open-ended campaign, everything you do progresses your game.\r\n\r\nExplore a Shared World\r\nReal players populate your world. When time of day, weather and seasons change, everyone playing the game experiences it at the same time.\r\n\r\nExplore Beautiful, Historic Britain\r\nThis is Britain Like You’ve Never Seen it. Discover lakes, valleys, castles, and breathtaking scenery all in spectacular native 4K and HDR.', '2021-12-07 20:24:51', '2021-12-07 20:24:51'),
(6, '10 Chambers', '10 Chambers', 487000, 0, '1638944541_gtfo.jpg', '1638944541_gtfo.webm', 'GTFO is a hardcore co-op FPS horror with high-intensity combat, tension-filled stealth, and team-based puzzle-solving for up to 4 players. In GTFO, you need to work together in order not to die together.', 'You and your team of prisoners must scavenge for tools and resources while looking for valuable artifacts in the depths of an abandoned underground Complex that is overrun by terrifying creatures. In GTFO, you must work together to complete the orders set down by a mysterious entity called The Warden - to make it out alive.\r\nWork Together or Die Together\r\nBuilt specifically as a 4-player co-operative experience, GTFO emphasizes working together to complete the Warden’s tasks and get out alive. As a team of prisoners, you must coordinate together as you move through the horrors that have infested a vast underground Complex.\r\nPrepare, Explore, Survive\r\nExploring the Complex takes planning before you even drop. Knowing what gear to take, what boosters to use, and how each prisoner will function within the team is vital to success. A strategic approach is needed if anyone is going to emerge from the Complex alive.\r\nHolster and Move Quiet\r\nStealth is key to surviving the Complex. You will have to procure ammunition and other essential survival tools onsite. Go quietly or face an onslaught of monsters who will stop at nothing to kill you.\r\nThe Rundown- Big Content Drops Delivered Over The Year\r\nThe Rundown is the work order mandated by The Warden, delivered as updates with new scenarios, monsters, weapons, and more. These updates override the old expeditions as The Warden sees they are no longer useful. The Rundown updates will be dropped over the lifetime of the game. Here is a video explaining the Rundown system.', '2021-12-07 23:22:21', '2021-12-07 23:22:21'),
(7, 'Respawn Entertaiment', 'Electronics Art', 0, 0, '1638944673_apex.jpg', '1638944673_movie480_vp9.webm', 'Apex Legends is the award-winning, free-to-play Hero shooter from Respawn Entertainment. Master an ever-growing roster of legendary characters with powerful abilities and experience strategic squad play and innovative gameplay in the next evolution of Hero Shooter and Battle Royale.', 'Conquer with character in Apex Legends, a free-to-play Hero shooter where legendary characters with powerful abilities team up to battle for fame & fortune on the fringes of the Frontier.\r\n\r\nMaster an ever-growing roster of diverse Legends, deep tactical squad play and bold new innovations that go beyond the Battle Royale experience—all within a rugged world where anything goes. Welcome to the next evolution of Hero Shooter.\r\nKEY FEATURES\r\n\r\n    A Roster of Legendary Characters -Master a growing roster of powerful Legends, each with their own unique personality, strengths and abilities that are easy to pick up but challenging to truly master.\r\n    Build Your Crew -Choose your Legend and combine their unique skills together with other players to form the ultimate crew.\r\n    Strategic Squad Play- Whether you\'re battling on a massive floating city in Battle Royale or dueling in close-quarters Arenas, you\'ll need to think fast. Master your Legend\'s unique abilities and coordinate with your teammates to discover new tactics and powerful combinations.\r\n    Innovative Combat - Master an expanding assortment of powerful weapons and equipment. You\'ll need to move fast and learn the rhythms of each weapon to get the most of your arsenal. Plus change it up in limited-time modes, and get ready for a boatload of new content each season.\r\n    Ever-Expanding Universe - Apex Legends takes place in an immersive universe where the story continues to evolve, maps change each season, and new Legends keep joining the fight. Make your mark on the Apex Games with a multitude of distinctive outfits and join the adventure!', '2021-12-07 23:24:33', '2021-12-07 23:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Idle', 'idle', NULL, NULL),
(2, 'Horror', 'horror', NULL, NULL),
(3, 'Action', 'action', NULL, NULL),
(4, 'Sports', 'sports', NULL, NULL),
(5, 'Strategy', 'strategy', NULL, NULL),
(6, 'Role-playing', 'role-playing', NULL, NULL),
(7, 'Puzzle', 'puzzle', NULL, NULL),
(8, 'Simulation', 'simulation', NULL, NULL),
(9, 'Adventure', 'adventure', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2021_12_02_080900_create_games_table', 1),
(5, '2021_12_02_080910_create_game_details_table', 1),
(7, '2021_12_02_084543_create_genres_table', 1),
(10, '2021_12_02_083855_create_transactions_table', 2),
(11, '2021_12_02_120147_create_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0.cart 1.paid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_id`, `user_id`, `game_id`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 2, 7, 0, '2021-12-09 01:17:18', '2021-12-09 01:17:18'),
(2, NULL, 2, 2, 0, '2021-12-09 06:23:02', '2021-12-09 06:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `password`, `role`, `slug`, `profile_picture`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'farhan', 'Farhan Novyan Hafizh', '$2y$10$4KtEVr2RLMm9my/VQieADO.1zP4h686syhiT3TpiBMdNw9CzxpWX6', 'admin', 'farhan-novyan-hafizh', 'default_profile.png', 0, 'lng8iR9QR8nEJR0DGaDrY1QOAH9FWl6vY9692LoxNIO1PTRjxJHpG0vU7XcA', '2021-12-08 00:50:49', '2021-12-08 00:50:49'),
(2, 'farhan_nov', 'Farhan Novyan Hafizh', '$2y$10$n9Cly5cIz9YSTR3RJcWMJ.AJaT3bNzhe9gAjY7whkIz/z/ehx3D6S', 'member', 'farhan-novyan-hafizh', 'default_profile.png', 0, NULL, '2021-12-09 01:17:04', '2021-12-09 01:17:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_details`
--
ALTER TABLE `game_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_transaction_id_unique` (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `game_details`
--
ALTER TABLE `game_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
