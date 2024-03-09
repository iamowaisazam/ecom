ALTER TABLE `product_categories` ADD `is_featured` INT NULL DEFAULT '0' AFTER `is_enable`;





INSERT INTO `settings` (`id`, `field`, `value`, `type`, `sort`, `grouping`) VALUES (NULL, 'site_currency', 'Erha Wear', 'text', '5', 'site_settings');