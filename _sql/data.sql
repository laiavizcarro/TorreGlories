CREATE DATABASE IF NOT EXISTS torreglories;

USE torreglories;

DROP TABLE order_products;
DROP TABLE orders;
DROP TABLE product_allergens;
DROP TABLE products;
DROP TABLE categories;
DROP TABLE allergens;
DROP TABLE roles;
DROP TABLE users;

CREATE TABLE roles (
    "id" NOT NULL TINYINT(1),
    "name" NOT NULL VARCHAR2(50)
)