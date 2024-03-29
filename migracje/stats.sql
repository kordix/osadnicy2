CREATE TABLE `stats` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `wood` double(8,2) NOT NULL DEFAULT 100,
  `stone` double(8,2) NOT NULL DEFAULT 100,
  `iron` double(8,2) NOT NULL DEFAULT 100,
  `gold` double(8,2) NOT NULL DEFAULT 100,
  `woodLevel` double(8,2) NOT NULL DEFAULT 1,
  `stoneLevel` double(8,2) NOT NULL DEFAULT 1,
  `ironLevel` double(8,2) NOT NULL DEFAULT 1,
  `woodStore` int(11) NOT NULL DEFAULT 1,
  `stoneStore` int(11) NOT NULL DEFAULT 1,
  `ironStore` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stonefactor` double(8,2) NOT NULL DEFAULT 0.01,
  `woodfactor` double(8,2) NOT NULL DEFAULT 0.01,
  `goldfactor` double(8,2) NOT NULL DEFAULT 0.01,
  `ironfactor` double(8,2) NOT NULL DEFAULT 0.01,
  `heroLevel` int(11) NOT NULL DEFAULT 1,
  `heroQuest` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `questTime` timestamp NULL DEFAULT NULL,
  `questDTime` timestamp NULL DEFAULT NULL,
   PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;