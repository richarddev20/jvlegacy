-- Create system_status table
CREATE TABLE IF NOT EXISTS `system_status` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status_type` varchar(50) DEFAULT 'info',
  `is_active` tinyint(1) DEFAULT 1,
  `show_on_login` tinyint(1) DEFAULT 1,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `idx_is_active` (`is_active`),
  KEY `idx_show_on_login` (`show_on_login`),
  KEY `idx_status_type` (`status_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

