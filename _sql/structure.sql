--
-- Base de dades: `torreglories`
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS torreglories;   
USE torreglories;

START TRANSACTION;

DROP TABLE IF EXISTS reviews;
DROP TABLE IF EXISTS order_products;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS product_allergens;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS allergens;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS roles;


--
-- Estructura de la taula `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,

  CONSTRAINT PK_ROLES PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estructura de la taula `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `incorporation_date` date DEFAULT NULL,

  CONSTRAINT PK_USERS PRIMARY KEY (id),
  CONSTRAINT FK_USERS_ROLE_ID FOREIGN KEY (role_id) REFERENCES roles(id),
  CONSTRAINT UK_USERS_EMAIL UNIQUE KEY (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estructura de la taula `allergens`
--

CREATE TABLE `allergens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `img_path` varchar(255) DEFAULT NULL,

  CONSTRAINT PK_ALLERGENS PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estructura de la taula `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,

  CONSTRAINT PK_CATEGORIES PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estructura de la taula `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category_id` int(50) NOT NULL,
  `iva` int(2) NOT NULL,
  `base_price` decimal(5,2) NOT NULL,
  `total_price` decimal(5,2) NOT NULL,
  `is_offer` tinyint(1) NOT NULL,
  `offer_price` decimal(5,2),
  `total_offer_price` decimal(5,2),
  `img_path` varchar(255) DEFAULT NULL,

  CONSTRAINT PK_PRODUCTS PRIMARY KEY (id),
  CONSTRAINT FK_PRODUCTS_CATEGORY_ID FOREIGN KEY (category_id) REFERENCES categories (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estructura de la taula `product_allergens`
--

CREATE TABLE `product_allergens` (
  `product_id` int NOT NULL,
  `allergen_id` int NOT NULL,

  CONSTRAINT PK_PRODUCT_ALLERGENS PRIMARY KEY (product_id, allergen_id),
  CONSTRAINT FK_PRODUCT_ALLERGENS_PRODUCT_ID FOREIGN KEY (product_id) REFERENCES products (id),
  CONSTRAINT FK_PRODUCT_ALLERGENS_ALLERGEN_ID FOREIGN KEY (allergen_id) REFERENCES allergens (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Estructura de la taula `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `is_paid` tinyint(1) NOT NULL,
  `tip` decimal(5,2),
  `total_price` decimal(5,2) NOT NULL,
  
  CONSTRAINT PK_ORDERS PRIMARY KEY (id),
  CONSTRAINT FK_ORDERS_USER_ID FOREIGN KEY (user_id) REFERENCES users (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estructura de la taula `order_products`
--

CREATE TABLE `order_products` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `quantity` int(5) NOT NULL,
  `iva` int(2) NOT NULL,
  `base_price` decimal(5,2) NOT NULL,
  `total_price` decimal(5,2) NOT NULL,
  `is_offer` tinyint(1) NOT NULL,
  `offer_price` decimal(5,2),
  `total_offer_price` decimal(5,2),

  CONSTRAINT PK_ORDER_PRODUCTS PRIMARY KEY (order_id, product_id),
  CONSTRAINT FK_ORDER_PRODUCTS_PRODUCT_ID FOREIGN KEY (product_id) REFERENCES products (id),
  CONSTRAINT FK_ORDER_PRODUCTS_ORDER_ID FOREIGN KEY (order_id) REFERENCES orders (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estructura de la taula `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` VARCHAR (100) NOT NULL,
  `review` VARCHAR (500) NOT NULL,
  `rate` INT (1) NOT NULL, 
  `order_id` INT (11) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),

  CONSTRAINT PK_REVIEWS PRIMARY KEY (id),
  CONSTRAINT FK_REVIEWS_ORDERS_ORDER_ID FOREIGN KEY (order_id) REFERENCES orders (id),
  CONSTRAINT UK_REVIEWS_ORDER_ID UNIQUE KEY (order_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
