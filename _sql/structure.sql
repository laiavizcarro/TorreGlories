CREATE TABLE "products" (
  "id" int(50) NOT NULL,
  "name" varchar(50) NOT NULL,
  "category_id" int(50) NOT NULL,
  "stock" int(100) NOT NULL,
  "iva" int(2) NOT NULL,
  "base_price" decimal(5,2) NOT NULL,
  "total_price" decimal(5,2) NOT NULL,
  "is_offer" tinyint(1) NOT NULL,
  "offer_price" decimal(5,2) NOT NULL,
  "total_offer_price" decimal(5,2) NOT NULL,
  "img_path" varchar(255) DEFAULT NULL
) /*ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;*/

INSERT INTO products ('id', 'name', 'category_id', 'stock', 'iva', 'base_price', 'total_price', 'is_offer', 'offer_price', 'total_offer_price', 'img_path') VALUES
(1, 'Canelons de rostit', 1, 50, 4, 10.00, 12.00, 0, 0.00, 0.00, 'images/uploads/canelons.jpg'),
(2, 'Canelons despinacs i pinyons', 1, 50, 4, 8.00, 10.00, 0, 0.00, 0.00, 'images/uploads/canelonsespinacs.jpg'),
(3, 'Amanida variada amb panses', 1, 50, 4, 10.00, 15.00, 0, 0.00, 0.00, 'images/uploads/amanida.jpg'),
(4, 'Spaghetti a la bolonyesa', 1, 50, 4, 10.00, 12.10, 0, 0.00, 0.00, 'images/uploads/spagettis.jpg'),
(5, 'Macedonia', 2, 50, 4, 10.00, 12.10, 0, 0.00, 0.00, 'images/uploads/macedonia.jpg'),
(6, 'Pastís de formatge', 2, 50, 4, 4.13, 5.00, 0, 0.00, 0.00, 'images/uploads/pastis-formatge.webp'),
(7, 'Iogurt natural', 2, 50, 4, 2.64, 3.20, 0, 0.00, 0.00, 'images/uploads/iogurt.jpg'),
(8, 'CocaCola', 3, 50, 4, 1.10, 1.50, 0, 0.00, 0.00, 'images/uploads/cocacola.jpg'),
(9, 'Arros del senyoret', 1, 50, 4, 25.00, 30.25, 0, 0.00, 0.00, 'images/uploads/arros-senyoret.jpeg'),
(10, 'Hamburguesa de vedella acompanyada de patates', 1, 50, 4, 10.00, 12.00, 0, 0.00, 0.00, 'images/uploads/hamburguesa.jpeg'),
(11, 'Saltejat de verdures i xampinyons', 1, 50, 4, 8.00, 10.00, 0, 0.00, 0.00, 'images/uploads/saltejat-verdures.jpg'),
(12, 'Rotllets vietnamites', 1, 50, 4, 10.00, 15.00, 0, 0.00, 0.00, 'images/uploads/rollitos.webp'),
(13, 'Xai al forn', 1, 50, 4, 10.00, 12.10, 0, 0.00, 0.00, 'images/uploads/xai.jpg'),
(14, 'Fingers de pollastre i patates', 1, 50, 4, 10.00, 12.10, 0, 0.00, 0.00, 'images/uploads/fingers.jpg'),
(15, 'Sushi de salmó i tonyina', 1, 50, 4, 4.13, 5.00, 0, 0.00, 0.00, 'images/uploads/nigiris.jpg'),
(16, 'Dorada al forn i acompanyament', 1, 50, 4, 2.64, 3.20, 0, 0.00, 0.00, 'images/uploads/daurada.jpg'),
(17, 'Dues boles de gelat', 2, 50, 4, 1.10, 1.50, 0, 0.00, 0.00, 'images/uploads/gelat.webp'),
(18, 'Flam dou', 2, 50, 4, 10.00, 12.00, 0, 0.00, 0.00, 'images/uploads/flam.webp'),
(19, 'Crema catalana', 2, 50, 4, 8.00, 10.00, 0, 0.00, 0.00, 'images/uploads/crema-catalana.jpg'),
(20, 'Pastís de Santiago', 2, 50, 4, 10.00, 15.00, 0, 0.00, 0.00, 'images/uploads/pastis-santiago.jpg'),
(21, 'Milfulls de crema', 2, 50, 4, 10.00, 12.10, 0, 0.00, 0.00, 'images/uploads/milfulls.jpg'),
(22, 'Macarons', 2, 50, 4, 10.00, 12.10, 0, 0.00, 0.00, 'images/uploads/macaron.jpg'),
(23, 'Aigua 1L', 3, 50, 4, 4.13, 5.00, 0, 0.00, 0.00, 'images/uploads/aigua.jpg'),
(24, 'Coca Cola Zero', 3, 50, 4, 2.64, 3.20, 0, 0.00, 0.00, 'images/uploads/cocacolazero.jpeg'),
(25, 'Fanta taronja', 3, 50, 4, 1.10, 1.50, 0, 0.00, 0.00, 'images/uploads/fanta-taronja.jpg');

insert into allergens ('id', 'code', 'name', 'description', 'img_path') VALUES 
();
