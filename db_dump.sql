-- --------------------------------------------------------
-- Хост:                         DCODE
-- Версия сервера:               10.1.25-MariaDB - MariaDB Server
-- Операционная система:         Linux
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных kalenyuk-mysql-task-db
CREATE DATABASE IF NOT EXISTS `kalenyuk-mysql-task-db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `kalenyuk-mysql-task-db`;

-- Дамп структуры для таблица kalenyuk-mysql-task-db.interests
CREATE TABLE IF NOT EXISTS `interests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы kalenyuk-mysql-task-db.interests: ~7 rows (приблизительно)
DELETE FROM `interests`;
/*!40000 ALTER TABLE `interests` DISABLE KEYS */;
INSERT INTO `interests` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'programming', NULL, NULL),
	(2, 'sports', NULL, NULL),
	(3, 'computers', NULL, NULL),
	(4, 'gaming', NULL, NULL),
	(5, 'music', NULL, NULL),
	(6, 'driving', NULL, NULL),
	(7, 'alcohol', NULL, NULL);
/*!40000 ALTER TABLE `interests` ENABLE KEYS */;

-- Дамп структуры для таблица kalenyuk-mysql-task-db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы kalenyuk-mysql-task-db.users: ~8 rows (приблизительно)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `age`, `created_at`, `updated_at`) VALUES
	(1, 'boroda', 'korobko', 'boroda@example.com', 20, '2017-12-20 12:00:00', NULL),
	(2, 'kate', 'ivasishina', 'kate@example.com', 21, '2017-12-20 12:00:00', NULL),
	(3, 'sidor', 'sidorov', 'sidorov@example.com', 32, '2017-12-20 12:00:00', NULL),
	(4, 'vasya', 'pupkin', 'pupkin@example.com', 22, '2017-12-20 12:00:00', NULL),
	(5, 'vlad', 'chernysh', 'chernysh@example.com', 21, '2017-12-20 12:00:00', NULL),
	(6, 'picachu', 'pokemon', 'pikapika@example.com', 25, '2017-12-20 12:00:00', NULL),
	(7, 'darth', 'vader', 'vader@empire.com', 46, '2017-12-20 12:00:00', NULL),
	(8, 'ololo', 'ololoev', 'ololo@example.com', 9, '2017-12-20 12:00:00', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Дамп структуры для таблица kalenyuk-mysql-task-db.user_interests
CREATE TABLE IF NOT EXISTS `user_interests` (
  `user_id` int(11) NOT NULL,
  `interests_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  KEY `interests_id` (`interests_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы kalenyuk-mysql-task-db.user_interests: ~10 rows (приблизительно)
DELETE FROM `user_interests`;
/*!40000 ALTER TABLE `user_interests` DISABLE KEYS */;
INSERT INTO `user_interests` (`user_id`, `interests_id`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, NULL),
	(1, 3, NULL, NULL),
	(2, 2, NULL, NULL),
	(2, 3, NULL, NULL),
	(1, 5, NULL, NULL),
	(8, 2, NULL, NULL),
	(9, 2, NULL, NULL),
	(10, 2, NULL, NULL),
	(1, 4, NULL, NULL),
	(1, 6, NULL, NULL);
/*!40000 ALTER TABLE `user_interests` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
