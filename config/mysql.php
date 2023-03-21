<?php 

require 'config.php';

mysqli_query ($link, "
	CREATE TABLE IF NOT EXISTS `clients` (
	  `id` int(255) NOT NULL AUTO_INCREMENT,
	  `name` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `tax` char(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
");


mysqli_query ($link, "
	INSERT INTO `clients` (`id`, `name`, `tax`, `created_at`) VALUES
	  (1, 'კოლიბრი', '404885585', '2023-03-21 21:34:44'),
	  (2, 'ბეჭდვითი სახლი', '123456789', '2023-03-21 21:35:38');
");

echo 'Table clients created';


