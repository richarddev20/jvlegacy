-- Add rich content fields to projects table
-- Note: Run each ALTER statement separately. If a column already exists, you'll get an error which you can ignore.

ALTER TABLE `projects` ADD COLUMN `map_embed_code` text DEFAULT NULL AFTER `description`;
ALTER TABLE `projects` ADD COLUMN `latitude` decimal(10,8) DEFAULT NULL AFTER `map_embed_code`;
ALTER TABLE `projects` ADD COLUMN `longitude` decimal(11,8) DEFAULT NULL AFTER `latitude`;
ALTER TABLE `projects` ADD COLUMN `surrounding_area` text DEFAULT NULL AFTER `longitude`;
ALTER TABLE `projects` ADD COLUMN `proposed_designs` text DEFAULT NULL AFTER `surrounding_area`;
ALTER TABLE `projects` ADD COLUMN `drawings` text DEFAULT NULL AFTER `proposed_designs`;
ALTER TABLE `projects` ADD COLUMN `location_details` text DEFAULT NULL AFTER `drawings`;
ALTER TABLE `projects` ADD COLUMN `neighborhood_info` text DEFAULT NULL AFTER `location_details`;
ALTER TABLE `projects` ADD COLUMN `development_plans` text DEFAULT NULL AFTER `neighborhood_info`;
ALTER TABLE `projects` ADD COLUMN `show_to_investors` tinyint(1) DEFAULT 1 AFTER `development_plans`;
ALTER TABLE `projects` ADD COLUMN `show_map` tinyint(1) DEFAULT 1 AFTER `show_to_investors`;
ALTER TABLE `projects` ADD COLUMN `show_surrounding_area` tinyint(1) DEFAULT 1 AFTER `show_map`;
ALTER TABLE `projects` ADD COLUMN `show_designs` tinyint(1) DEFAULT 1 AFTER `show_surrounding_area`;
ALTER TABLE `projects` ADD COLUMN `show_drawings` tinyint(1) DEFAULT 1 AFTER `show_drawings`;
ALTER TABLE `projects` ADD COLUMN `show_location_details` tinyint(1) DEFAULT 1 AFTER `show_drawings`;
ALTER TABLE `projects` ADD COLUMN `show_neighborhood_info` tinyint(1) DEFAULT 1 AFTER `show_location_details`;
ALTER TABLE `projects` ADD COLUMN `show_development_plans` tinyint(1) DEFAULT 1 AFTER `show_neighborhood_info`;

