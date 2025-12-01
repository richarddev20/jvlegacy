-- Create changelog_entries table
CREATE TABLE IF NOT EXISTS `changelog_entries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `idx_version` (`version`),
  KEY `idx_created_on` (`created_on`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


