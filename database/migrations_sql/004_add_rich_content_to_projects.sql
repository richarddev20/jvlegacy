-- Add rich content fields to projects table
-- Note: Columns will be added at the end of the table. If a column already exists, you'll get an error which you can ignore.

ALTER TABLE `projects` ADD COLUMN `map_embed_code` text DEFAULT NULL;
ALTER TABLE `projects` ADD COLUMN `latitude` decimal(10,8) DEFAULT NULL;
ALTER TABLE `projects` ADD COLUMN `longitude` decimal(11,8) DEFAULT NULL;
ALTER TABLE `projects` ADD COLUMN `surrounding_area` text DEFAULT NULL;
ALTER TABLE `projects` ADD COLUMN `proposed_designs` text DEFAULT NULL;
ALTER TABLE `projects` ADD COLUMN `drawings` text DEFAULT NULL;
ALTER TABLE `projects` ADD COLUMN `location_details` text DEFAULT NULL;
ALTER TABLE `projects` ADD COLUMN `neighborhood_info` text DEFAULT NULL;
ALTER TABLE `projects` ADD COLUMN `development_plans` text DEFAULT NULL;
ALTER TABLE `projects` ADD COLUMN `show_to_investors` tinyint(1) DEFAULT 1;
ALTER TABLE `projects` ADD COLUMN `show_map` tinyint(1) DEFAULT 1;
ALTER TABLE `projects` ADD COLUMN `show_surrounding_area` tinyint(1) DEFAULT 1;
ALTER TABLE `projects` ADD COLUMN `show_designs` tinyint(1) DEFAULT 1;
ALTER TABLE `projects` ADD COLUMN `show_drawings` tinyint(1) DEFAULT 1;
ALTER TABLE `projects` ADD COLUMN `show_location_details` tinyint(1) DEFAULT 1;
ALTER TABLE `projects` ADD COLUMN `show_neighborhood_info` tinyint(1) DEFAULT 1;
ALTER TABLE `projects` ADD COLUMN `show_development_plans` tinyint(1) DEFAULT 1;

