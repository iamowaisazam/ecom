ALTER TABLE `blog_categories` ADD `sort` INT NOT NULL DEFAULT '0' AFTER `is_enable`;
ALTER TABLE `blog_categories` ADD `alt` TEXT NULL DEFAULT NULL AFTER `sort`;
ALTER TABLE `blog_categories` ADD `meta_keywords` TEXT NULL DEFAULT NULL AFTER `sort`;



ALTER TABLE `blogs` 
ADD `sort` INT NOT NULL DEFAULT '0' AFTER `banner`, 
ADD `banner_alt` TEXT NULL DEFAULT NULL AFTER `sort`, 
ADD `alt` TEXT NULL DEFAULT NULL AFTER `banner_alt`;

ALTER TABLE `stores` ADD `alt` TEXT NULL DEFAULT NULL AFTER `is_enable`;

-- _______________________________________________________________________________
ALTER TABLE `store_categories` ADD `alt` TEXT NULL DEFAULT NULL AFTER `is_enable`;
ALTER TABLE `blog_categories` CHANGE `sort` `sort` INT(11) NULL DEFAULT NULL;

ALTER TABLE `blogs` 
ADD `featured1` INT NULL DEFAULT '0' AFTER `id`, 
ADD `featured2` INT NULL DEFAULT '0' AFTER `featured1`, 
ADD `featured3` INT NULL DEFAULT '0' AFTER `featured2`;
ALTER TABLE `coupons` ADD `image` TEXT NULL DEFAULT NULL AFTER `sort`;
ALTER TABLE `coupons` ADD `alt` TEXT NULL DEFAULT NULL AFTER `sort`;
