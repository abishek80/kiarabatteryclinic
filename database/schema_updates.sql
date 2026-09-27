-- Schema Fixes & Updates for Kiara Battery Clinic Database
-- Purpose: Adds default values and allows NULL for optional/audit columns to ensure full compatibility with MySQL Strict Mode.
-- Run this script if you have an existing database imported from kiarabatteryclinic.sql.

SET FOREIGN_KEY_CHECKS = 0;

-- --------------------------------------------------------
-- 1. Contact Enquiry
-- --------------------------------------------------------
ALTER TABLE `contact_enquiry` 
  MODIFY `delete_status` int(5) NOT NULL DEFAULT 0;

-- Service the customer is enquiring about (contact page / service page / quote popup)
ALTER TABLE `contact_enquiry`
  ADD COLUMN `service_name` varchar(200) DEFAULT NULL AFTER `mobile_number`;

-- Customer's city / area, stored on its own instead of inside the message
ALTER TABLE `contact_enquiry`
  ADD COLUMN `location` varchar(150) DEFAULT NULL AFTER `service_name`;

-- Move "Location: ..." out of messages saved before the column existed
UPDATE `contact_enquiry`
  SET `location` = TRIM(SUBSTRING_INDEX(SUBSTRING(`message`, 11), '\n', 1)),
      `message`  = TRIM(BOTH '\n' FROM IF(LOCATE('\n', `message`) > 0, SUBSTRING(`message`, LOCATE('\n', `message`) + 1), ''))
  WHERE `location` IS NULL AND `message` LIKE 'Location: %';

-- --------------------------------------------------------
-- 2. Product Enquiry
-- --------------------------------------------------------
ALTER TABLE `product_enquiry` 
  MODIFY `delete_status` int(5) NOT NULL DEFAULT 0;

-- --------------------------------------------------------
-- 3. Invoice
-- --------------------------------------------------------
ALTER TABLE `invoice` 
  MODIFY `delete_status` int(11) NOT NULL DEFAULT 0,
  MODIFY `updated_by` int(11) NULL DEFAULT NULL,
  MODIFY `updated_at` datetime NULL DEFAULT NULL;

-- --------------------------------------------------------
-- 4. Invoice Items
-- --------------------------------------------------------
ALTER TABLE `invoice_items` 
  MODIFY `deleted_status` int(11) NOT NULL DEFAULT 0,
  MODIFY `created_by` int(11) NULL DEFAULT NULL;

-- --------------------------------------------------------
-- 5. Vendor
-- --------------------------------------------------------
ALTER TABLE `vendor` 
  MODIFY `delete_status` int(11) NOT NULL DEFAULT 0,
  MODIFY `updated_by` int(11) NULL DEFAULT NULL,
  MODIFY `updated_at` datetime NULL DEFAULT NULL;

-- --------------------------------------------------------
-- 6. Vendor Transaction
-- --------------------------------------------------------
ALTER TABLE `vendor_transaction` 
  MODIFY `delete_status` int(11) NOT NULL DEFAULT 0,
  MODIFY `updated_by` int(11) NULL DEFAULT NULL,
  MODIFY `updated_at` datetime NULL DEFAULT NULL;

-- --------------------------------------------------------
-- 7. Blog
-- --------------------------------------------------------
ALTER TABLE `blog` 
  MODIFY `delete_status` int(5) NOT NULL DEFAULT 0,
  MODIFY `updated_by` int(11) NULL DEFAULT NULL,
  MODIFY `updated_at` datetime NULL DEFAULT NULL;

-- --------------------------------------------------------
-- 8. Category
-- --------------------------------------------------------
ALTER TABLE `category` 
  MODIFY `delete_status` int(5) NOT NULL DEFAULT 0,
  MODIFY `updated_by` int(11) NULL DEFAULT NULL,
  MODIFY `updated_at` datetime NULL DEFAULT NULL;

-- --------------------------------------------------------
-- 9. Gallery
-- --------------------------------------------------------
ALTER TABLE `gallery` 
  MODIFY `delete_status` int(5) NOT NULL DEFAULT 0,
  MODIFY `updated_by` int(11) NULL DEFAULT NULL,
  MODIFY `updated_at` datetime NULL DEFAULT NULL;

-- --------------------------------------------------------
-- 10. Product
-- --------------------------------------------------------
ALTER TABLE `product` 
  MODIFY `delete_status` int(5) NOT NULL DEFAULT 0,
  MODIFY `updated_by` int(11) NULL DEFAULT NULL,
  MODIFY `updated_at` datetime NULL DEFAULT NULL;

-- --------------------------------------------------------
-- 11. Service
-- --------------------------------------------------------
ALTER TABLE `service` 
  MODIFY `delete_status` int(5) NOT NULL DEFAULT 0,
  MODIFY `updated_by` int(11) NULL DEFAULT NULL,
  MODIFY `updated_at` datetime NULL DEFAULT NULL;

-- --------------------------------------------------------
-- 12. SEO
-- --------------------------------------------------------
ALTER TABLE `seo` 
  MODIFY `updated_by` int(11) NULL DEFAULT NULL,
  MODIFY `updated_at` datetime NULL DEFAULT NULL;

-- --------------------------------------------------------
-- 13. General Info
-- --------------------------------------------------------
ALTER TABLE `general_info` 
  MODIFY `updated_by` int(11) NULL DEFAULT NULL,
  MODIFY `updated_at` datetime NULL DEFAULT NULL;

-- --------------------------------------------------------
-- 14. Brand Master Table
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(500) NOT NULL,
  `brand_name` varchar(500) NOT NULL,
  `brand_img` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `delete_status` int(5) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- 15. Service Additional Detail Fields
-- --------------------------------------------------------
ALTER TABLE `service` ADD COLUMN `card1_title` VARCHAR(500) NULL AFTER `description`;
ALTER TABLE `service` ADD COLUMN `card1_description` TEXT NULL AFTER `card1_title`;
ALTER TABLE `service` ADD COLUMN `card2_title` VARCHAR(500) NULL AFTER `card1_description`;
ALTER TABLE `service` ADD COLUMN `card2_description` TEXT NULL AFTER `card2_title`;
ALTER TABLE `service` ADD COLUMN `process_steps` TEXT NULL AFTER `card2_description`;
ALTER TABLE `service` ADD COLUMN `faqs` LONGTEXT NULL AFTER `process_steps`;

-- --------------------------------------------------------
-- 16. Testimonial Master Table
-- Required by Webmodel::testimonialList() / Testimonialmodel — loaded on
-- EVERY frontend page via Web::__construct(). Without this table the whole
-- site hard-crashes with a DB error on every request.
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `reviewer_name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  `star` tinyint(1) NOT NULL DEFAULT 5,
  `reviewer_img` varchar(500) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `delete_status` int(5) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- 17. FAQ Master Table
-- Required by Webmodel::getFaqsByPage() — called on nearly every frontend
-- page (home, about, services, contact, testimonials, gallery, policy pages).
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) DEFAULT NULL,
  `page_name` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `delete_status` int(5) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS = 1;
