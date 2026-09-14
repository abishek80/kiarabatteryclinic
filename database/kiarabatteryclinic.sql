-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2025 at 08:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--  
-- Database: `kiarabatteryclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `token` varchar(500) NOT NULL,
  `blog_date` date NOT NULL,
  `blog_name` varchar(500) NOT NULL,
  `blog_img` text DEFAULT NULL,
  `short_description` longtext NOT NULL,
  `description` longtext NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `delete_status` int(5) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `token` varchar(500) NOT NULL,
  `category_name` varchar(500) NOT NULL,
  `category_img` text DEFAULT NULL,
  `short_description` longtext NOT NULL,
  `description` longtext NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `delete_status` int(5) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiry`
--

CREATE TABLE `contact_enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_number` varchar(50) DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `delete_status` int(5) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `token` varchar(500) NOT NULL,
  `gallery_name` varchar(500) NOT NULL,
  `description` longtext NOT NULL,
  `gallery_img` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL,
  `delete_status` int(5) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_info`
--

CREATE TABLE `general_info` (
  `id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `gst_number` varchar(50) NOT NULL,
  `email` text DEFAULT NULL,
  `mobile_number` varchar(100) DEFAULT NULL,
  `phone_number` varchar(50) NOT NULL,
  `address` longtext NOT NULL,
  `map_link` longtext DEFAULT NULL,
  `iframe_link` text NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `declaration_note` text NOT NULL,
  `whatsapp_number` varchar(100) NOT NULL,
  `whatsapp_link` longtext DEFAULT NULL,
  `facebook_link` longtext NOT NULL,
  `instagram_link` longtext NOT NULL,
  `youtube_link` longtext DEFAULT NULL,
  `twitter_link` longtext DEFAULT NULL,
  `linkedin_link` longtext DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `general_info`
--

INSERT INTO `general_info` (`id`, `company_name`, `gst_number`, `email`, `mobile_number`, `phone_number`, `address`, `map_link`, `iframe_link`, `bank_name`, `account_number`, `branch_name`, `ifsc_code`, `declaration_note`, `whatsapp_number`, `whatsapp_link`, `facebook_link`, `instagram_link`, `youtube_link`, `twitter_link`, `linkedin_link`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Kiara Battery Clinic', '33BOVPC5682NrZ8', 'kiarabatteryclinic@gmail.com', '+91 900381 1107', '+91 967783 7107', '36/1, 9th Street, Tatabad, Coimbatore - 641 012', 'https://google.com', 'https://google.com', 'City Union Bank', '510909010196784', 'Sai Baba Colony Branch', 'CIUB0000486', 'We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct', '1234123412', 'https://google.com', 'https://google.com', 'https://google.com', 'https://google.com', 'https://google.com', 'https://google.com', 1, '2025-09-19 13:06:02', 1, '2025-10-18 19:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `token` varchar(100) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `invoice_date` date NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `supplier_ref` varchar(100) NOT NULL,
  `other_reference` varchar(50) NOT NULL,
  `subtotal_amount` varchar(100) NOT NULL,
  `overall_product_quantity` varchar(30) NOT NULL,
  `overall_cgst_amount` varchar(50) NOT NULL,
  `overall_sgst_amount` varchar(50) NOT NULL,
  `overall_gst_amount` varchar(50) NOT NULL,
  `total_amount` varchar(50) NOT NULL,
  `discount_amount` varchar(50) NOT NULL,
  `roundoff_amount` varchar(50) NOT NULL,
  `invoice_amount` varchar(50) NOT NULL,
  `gst_amount_in_word` text NOT NULL,
  `invoice_amount_in_word` text NOT NULL,
  `status` enum('paid','not_paid') NOT NULL DEFAULT 'not_paid',
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_specification` text DEFAULT NULL,
  `product_quantity` varchar(20) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `cgst_percentage` varchar(50) NOT NULL,
  `cgst_amount` varchar(50) NOT NULL,
  `sgst_percentage` varchar(50) NOT NULL,
  `sgst_amount` varchar(50) NOT NULL,
  `gst_amount` varchar(50) NOT NULL,
  `subtotal_amount` varchar(50) NOT NULL,
  `total_amount` varchar(50) NOT NULL,
  `deleted_status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `token` varchar(500) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `mrp_price` varchar(30) NOT NULL,
  `product_price` varchar(30) NOT NULL,
  `hsn_number` varchar(50) NOT NULL,
  `per_value` varchar(50) NOT NULL,
  `cgst_percentage` varchar(50) NOT NULL,
  `sgst_percentage` varchar(50) NOT NULL,
  `short_description` text NOT NULL,
  `description` longtext NOT NULL,
  `product_img` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL,
  `delete_status` int(5) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_enquiry`
--

CREATE TABLE `product_enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_number` varchar(50) DEFAULT NULL,
  `quantity` varchar(100) NOT NULL,
  `product_name` text NOT NULL,
  `subject` text NOT NULL,
  `message` longtext DEFAULT NULL,
  `delete_status` int(5) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` int(11) NOT NULL,
  `header_link` longtext NOT NULL,
  `body_link` longtext DEFAULT NULL,
  `footer_link` longtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `token` varchar(500) NOT NULL,
  `service_name` varchar(500) NOT NULL,
  `service_img` text DEFAULT NULL,
  `short_description` longtext NOT NULL,
  `description` longtext NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `delete_status` int(5) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `is_admin` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `delete_status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile_number`, `password`, `is_admin`, `status`, `delete_status`, `created_by`, `created_at`) VALUES
(1, 'admin', 'admin@kiarabatteryclinic.com', '1234567890', '202cb962ac59075b964b07152d234b70', 1, 'active', 0, 1, '2024-06-11 16:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `token` text NOT NULL,
  `vendor_name` text NOT NULL,
  `vendor_address_1` text NOT NULL,
  `vendor_address_2` text NOT NULL,
  `vendor_gst_number` varchar(50) NOT NULL,
  `vendor_email` varchar(50) NOT NULL,
  `vendor_mobile_number` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_transaction`
--

CREATE TABLE `vendor_transaction` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `transaction_number` varchar(50) NOT NULL,
  `transaction_amount` varchar(50) NOT NULL,
  `transaction_method` varchar(50) NOT NULL,
  `transaction_type` varchar(50) NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_enquiry`
--
ALTER TABLE `contact_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_info`
--
ALTER TABLE `general_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_enquiry`
--
ALTER TABLE `product_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_transaction`
--
ALTER TABLE `vendor_transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_enquiry`
--
ALTER TABLE `contact_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_info`
--
ALTER TABLE `general_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_enquiry`
--
ALTER TABLE `product_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_transaction`
--
ALTER TABLE `vendor_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
