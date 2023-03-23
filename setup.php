<?php
require 'config/config.php';

$sql = "CREATE TABLE IF NOT EXISTS `clients` (
`id` int(255) NOT NULL AUTO_INCREMENT,
	  `name` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `tax` char(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

//$sql2 = "INSERT INTO `clients` (`id`, `name`, `tax`, `created_at`) VALUES
//(1, 'კოლიბრი', '404885585', '2023-03-21 21:34:44'),
//	  (2, 'ბეჭდვითი სახლი', '123456789', '2023-03-21 21:35:38')";

echo CreateTable($sql, 'clients');



function CreateTable($sql, $table)
{
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) {
        die("ბაზასთან დაკავშირება ვერ მოხერხდა - შეცდომა N: " . $conn->connect_error);
    } else {

        if ($result = $conn->query("SHOW TABLES LIKE '" . $table . "'")) {
            if ($result->num_rows == 1) {
                return $table . " ცხრილი უკვე არსებობს <br>";
            } else {
                if ($conn->query($sql) === TRUE) {
                    return "ცხრილი " . $table . " წარმატებით შეიქმნა <br>";
                } else {
                    return "ცხრილი " . $table . " ვერ შეიქმნა - შეცდომა N: " . $conn->error;
                }
            }
        }
        $conn->close();
    }
}
