-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 20, 2018 lúc 12:25 PM
-- Phiên bản máy phục vụ: 10.1.33-MariaDB
-- Phiên bản PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cates`
--

CREATE TABLE `cates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cates`
--

INSERT INTO `cates` (`id`, `name`, `alias`, `order`, `parent_id`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(19, 'Bánh sinh nhật', 'banh-sinh-nhat', 1, 0, 'Bánh sinh nhật', 'Bánh sinh nhật', '2018-07-07 09:16:27', '2018-07-07 09:16:27'),
(20, 'Bánh pizza', 'banh-pizza', 2, 0, 'Bánh pizza', 'Bánh pizza', '2018-07-07 09:16:48', '2018-07-07 09:16:48'),
(21, 'Bánh Crepe', 'banh-crepe', 3, 0, 'Bánh Crepe', 'Bánh Crepe', '2018-07-07 09:17:06', '2018-07-07 09:17:06'),
(22, 'Bánh su kem', 'banh-su-kem', 4, 0, 'Bánh su kem', 'Bánh su kem', '2018-07-07 09:17:46', '2018-07-07 09:17:46'),
(23, 'Bánh bông lan', 'banh-bong-lan', 5, 0, 'Bánh bông lan', 'Bánh bông lan', '2018-07-07 09:18:01', '2018-07-07 09:18:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_23_151537_create_cates_table', 1),
(4, '2018_06_23_152240_create_products_table', 2),
(6, '2018_06_23_153125_create_product_images_table', 3),
(7, '2018_07_07_085805_create_slides_table', 4),
(11, '2018_07_09_014346_create_orders_table', 5),
(12, '2018_07_09_015019_create_order_details_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL COMMENT '1-Nam | 2-Nữ',
  `phone` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `code`, `fullname`, `gender`, `phone`, `email`, `address`, `note`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'UWcpCoJ63w', 'Nguyễn Lê', 1, 1931313, 'lek57@gmail.com', 'Ha Noi', NULL, 1, '2018-07-09 03:51:31', '2018-07-09 03:51:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `pay` tinyint(4) NOT NULL COMMENT '1-COD | 2-ATM',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `quantity`, `product_id`, `order_id`, `pay`, `created_at`, `updated_at`) VALUES
(1, 2, 16, 1, 1, '2018-07-09 03:51:31', '2018-07-09 03:51:31'),
(2, 1, 17, 1, 1, '2018-07-09 03:51:31', '2018-07-09 03:51:31'),
(3, 1, 15, 1, 1, '2018-07-09 03:51:31', '2018-07-09 03:51:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `alias`, `price`, `intro`, `content`, `image`, `keywords`, `description`, `user_id`, `cate_id`, `created_at`, `updated_at`) VALUES
(11, 'Bánh sinh nhật size M', 'banh-sinh-nhat-size-m', 350000, 'Bánh sinh nhật cho 4 người', 'Bánh sinh nhật cho 4 người', 'banh-kem-dau.jpeg', 'Bánh sinh nhật cho 4 người', 'Bánh sinh nhật cho 4 người', 1, 19, '2018-07-07 09:18:48', '2018-07-07 09:18:48'),
(12, 'Bánh sinh nhật size L', 'banh-sinh-nhat-size-l', 500000, 'Bánh sinh nhật cho 6 người', 'Bánh sinh nhật size L', 'kem-size-l.jpg', 'Bánh sinh nhật size L', 'Bánh sinh nhật size L', 1, 19, '2018-07-07 09:19:43', '2018-07-07 09:19:43'),
(13, 'Bánh pizza hải sản', 'banh-pizza-hai-san', 550000, 'Bánh pizza hải sản', 'Bánh pizza hải sản', 'pizza-sea-1.jpg', 'Bánh pizza hải sản', 'Bánh pizza hải sản', 1, 20, '2018-07-07 09:22:29', '2018-07-07 09:22:29'),
(14, 'Bánh pizza chay', 'banh-pizza-chay', 400000, 'Bánh pizza chay', 'Bánh pizza chay', 'pizzarau1.jpg', 'Bánh pizza chay', 'Bánh pizza chay', 1, 20, '2018-07-07 09:23:51', '2018-07-07 09:23:51'),
(15, 'Bánh crepe mini', 'banh-crepe-mini', 80000, 'Bánh crepe mini', 'Bánh crepe mini', 'crepe-2.jpg', 'Bánh crepe mini', 'Bánh crepe mini', 1, 21, '2018-07-07 09:25:53', '2018-07-07 09:25:53'),
(16, 'Bánh su kem', 'banh-su-kem', 120000, 'Bánh su kem', 'Bánh su kem', 'sukem-1.jpg', 'Bánh su kem', 'Bánh su kem', 1, 22, '2018-07-07 09:28:00', '2018-07-07 09:28:00'),
(17, 'Bánh bông lan', 'banh-bong-lan', 200000, 'Bánh bông lan', 'Bánh bông lan', 'bonglan-1.jpg', 'Bánh bông lan', 'Bánh bông lan', 1, 23, '2018-07-07 09:29:52', '2018-07-07 09:29:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(13, 'banh-kem-kitty.jpg', 11, '2018-07-07 09:18:48', '2018-07-07 09:18:48'),
(14, 'banh-kem-kiwi.jpg', 11, '2018-07-07 09:18:48', '2018-07-07 09:18:48'),
(15, 'kem-size-l-1.jpg', 12, '2018-07-07 09:19:43', '2018-07-07 09:19:43'),
(16, 'kem-size-l-2.jpg', 12, '2018-07-07 09:19:44', '2018-07-07 09:19:44'),
(17, 'kem-size-l-3.jpg', 12, '2018-07-07 09:19:44', '2018-07-07 09:19:44'),
(18, 'pizza-sea-2.jpg', 13, '2018-07-07 09:22:29', '2018-07-07 09:22:29'),
(19, 'pizza-sea-3.jpg', 13, '2018-07-07 09:22:29', '2018-07-07 09:22:29'),
(20, 'pizzaga.jpg', 14, '2018-07-07 09:23:51', '2018-07-07 09:23:51'),
(21, 'pizza_rau.jpg', 14, '2018-07-07 09:23:51', '2018-07-07 09:23:51'),
(22, 'crepe-1.jpg', 15, '2018-07-07 09:25:53', '2018-07-07 09:25:53'),
(23, 'crepe-3.jpg', 15, '2018-07-07 09:25:53', '2018-07-07 09:25:53'),
(24, 'sukem-2.jpg', 16, '2018-07-07 09:28:00', '2018-07-07 09:28:00'),
(25, 'sukem-3.jpg', 16, '2018-07-07 09:28:00', '2018-07-07 09:28:00'),
(26, 'sukem-4.jpg', 16, '2018-07-07 09:28:00', '2018-07-07 09:28:00'),
(27, 'bonglan-2.jpg', 17, '2018-07-07 09:29:52', '2018-07-07 09:29:52'),
(28, 'bonglan-3.jpg', 17, '2018-07-07 09:29:52', '2018-07-07 09:29:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `link`, `image`, `created_at`, `updated_at`) VALUES
(1, NULL, 'banner1.jpg', '2018-07-07 02:35:28', '2018-07-07 02:46:04'),
(2, NULL, 'banner2.jpg', '2018-07-07 02:25:11', '2018-07-07 02:25:11'),
(3, NULL, 'banner3.jpg', '2018-07-07 02:25:22', '2018-07-07 02:25:22'),
(4, NULL, 'banner4.jpg', '2018-07-07 02:25:26', '2018-07-07 02:25:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `level` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `address`, `phone`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin01', '$2y$10$2IO3hGntnRkexVTNYEabuOuKUCJNibZRluyNxmYQ3WH/efeU5FN7G', 'admin01@gmail.com', NULL, NULL, NULL, 1, 'yShOayn3etV3NJvamv7vTmRWGZmPVZuVTENxTZFjiBhlSS11B6Bmv1JTbEuD', NULL, '2018-07-06 02:10:57'),
(2, 'admin02', '$2y$10$/.6P5dkyOq0nNpnYxm7.neURhMmiPdd1Sm1LX.rYr/dcPfYtURUxS', 'admin02@gmail.com', NULL, NULL, NULL, 1, 'ln9nQwMghUobeulJvMo4MBPwWR360ikgTotvMvd35L5WkfdvAZb2vC9QB873', NULL, '2018-07-06 02:15:25'),
(3, 'member01', '$2y$10$dlJh9E23KZfjIaaAlaB27ufK/wVLNdPPgcQB/Q82PFw8syv8e.rRO', 'member01@gmail.com', 'Nguyễn Tuấn', 'Hà Nội', 16454, 2, 'KVLhotvRENSgU8QodqlB7yeDkC0pDNcCbtJRzH2u', NULL, '2018-07-06 01:55:02'),
(4, 'member02', '$2y$10$jr8Geht2/Z1APLmCHE3z8uDL4iHGzuOUEHzyCigrVeyOr57fT6j9e', 'member02@gmail.com', 'Nguyễn Tiến Linh', 'Ha Noi', 131131, 2, 'Eht6Q7r80BEaIJK3gpDs3GLeJq7xaww7hLczvrtL', '2018-07-07 20:08:46', '2018-07-07 20:08:46');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cates`
--
ALTER TABLE `cates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cates_name_unique` (`name`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_images_image_unique` (`image`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cates`
--
ALTER TABLE `cates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `cates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
