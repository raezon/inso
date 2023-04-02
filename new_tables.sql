CREATE TABLE `journey` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_displayed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `agency` ( `id` bigint(20) UNSIGNED NOT NULL, `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `address_displayed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `address_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `wilaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `commune` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `created_at` timestamp NULL DEFAULT NULL, `updated_at` timestamp NULL DEFAULT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `clinical` ( `id` bigint(20) UNSIGNED NOT NULL, `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `address_displayed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `address_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `wilaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `commune` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `created_at` timestamp NULL DEFAULT NULL, `updated_at` timestamp NULL DEFAULT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `university` ( `id` bigint(20) UNSIGNED NOT NULL, `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `address_displayed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `address_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `wilaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `commune` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `created_at` timestamp NULL DEFAULT NULL, `updated_at` timestamp NULL DEFAULT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `crib` ( `id` bigint(20) UNSIGNED NOT NULL, `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `address_displayed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `address_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `wilaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `commune` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, `created_at` timestamp NULL DEFAULT NULL, `updated_at` timestamp NULL DEFAULT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;