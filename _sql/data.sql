USE torreglories;

--
-- Bolcament de dades per a la taula 'allergens'
--
INSERT INTO allergens (id, code, name, description, img_path) VALUES
(1, 'AC', 'Crustacis', 'Crustacis i els seus derivats', '/images/allergens/AC.png'),
(2, 'AE', 'Ous', 'Ous i els seus derivats', '/images/allergens/AE.png'),
(3, 'AF', 'Peix', 'Peix i els seus derivats', '/images/allergens/AF.png'),
(4, 'AM', 'Lactis', 'Llet i els seus derivats', '/images/allergens/AM.png'),
(5, 'AN', 'Fruits de closca', 'Fruits secs i els seus derivats', '/images/allergens/AN.png'),
(6, 'AP', 'Cacauets', 'Cacauets i els seus derivats', '/images/allergens/AP.png'),
(7, 'AS', 'Sèsam', 'Llavors de sèsam i els seus derivats', '/images/allergens/AS.png'),
(8, 'AU', 'Sulfits', 'Diòxid de sofre i sulfits en el producte', '/images/allergens/AU.png'),
(9, 'AW', 'Gluten', 'Cereals amb gluten i els seus derivats', '/images/allergens/AW.png'),
(10, 'AY', 'Soja', 'Soja i els seus derivats', '/images/allergens/AY.png'),
(11, 'BC', 'Api', 'Api i els seus derivats', '/images/allergens/BC.png'),
(12, 'BM', 'Mostassa', 'Mostassa i els seus derivats', '/images/allergens/BM.png'),
(13, 'NL', 'Tramussos', 'Tramussos o lupino i els seus derivats', '/images/allergens/NL.png'),
(14, 'UM', 'Mol·luscs', 'Mol·luscs i els seus derivats', '/images/allergens/UM.png');

--
-- Bolcament de dades per a la taula 'categories'
--
INSERT INTO categories (id, name) VALUES
(1, 'Plats'),
(2, 'Postres'),
(3, 'Begudes'),
(4, 'Esmorzars');

--
-- Bolcament de dades per a la taula 'products'
--
INSERT INTO products (id, name, category_id, iva, base_price, total_price, is_offer, offer_price, total_offer_price, img_path) VALUES
(1, 'Canelons de rostit', 1, 4, 10.00, 12.00, 0, null, null, 'images/uploads/canelons.jpg'),
(2, "Canelons d\'espinacs i pinyons", 1, 4, 8.00, 8.32, 1, 6.75, 7.02, 'images/uploads/canelonsespinacs.jpg'),
(3, 'Amanida variada amb panses', 1, 4, 10.00, 15.00, 0, null, null, 'images/uploads/amanida.jpg'),
(4, 'Spaghetti a la bolonyesa', 1, 4, 10.00, 12.10, 0, null, null, 'images/uploads/spagettis.jpg'),
(5, 'Macedonia', 2, 4, 10.00, 12.10, 0, null, null, 'images/uploads/macedonia.jpg'),
(6, 'Pastís de formatge', 2, 4, 4.13, 5.00, 0, null, null, 'images/uploads/pastis-formatge.webp'),
(7, 'Iogurt natural', 2, 4, 2.64, 3.20, 0, null, null, 'images/uploads/iogurt.jpg'),
(8, 'CocaCola', 3, 4, 1.10, 1.0, 0, null, null, 'images/uploads/cocacola.jpg'),
(9, 'Arros del senyoret', 1, 4, 25.00, 30.25, 0, null, null, 'images/uploads/arros-senyoret.jpeg'),
(10, 'Hamburguesa de vedella acompanyada de patates', 1, 4, 10.00, 12.00, 0, null, null, 'images/uploads/hamburguesa.jpeg'),
(11, 'Saltejat de verdures i xampinyons', 1, 4, 8.00, 10.00, 0, null, null, 'images/uploads/saltejat-verdures.jpg'),
(12, 'Rotllets vietnamites', 1, 4, 10.00, 15.00, 0, null, null, 'images/uploads/rollitos.webp'),
(13, 'Xai al forn', 1, 4, 10.00, 12.10, 0, null, null, 'images/uploads/xai.jpg'),
(14, 'Fingers de pollastre i patates', 1, 4, 10.00, 12.10, 0, null, null, 'images/uploads/fingers.jpg'),
(15, 'Sushi de salmó i tonyina', 1, 4, 4.13, 5.00, 0, null, null, 'images/uploads/nigiris.jpg'),
(16, 'Dorada al forn i acompanyament', 1, 4, 2.64, 3.20, 0, null, null, 'images/uploads/daurada.jpg'),
(17, 'Dues boles de gelat', 2, 4, 1.10, 1.0, 0, null, null, 'images/uploads/gelat.webp'),
(18, 'Flam dou', 2, 4, 10.00, 12.00, 0, null, null, 'images/uploads/flam.webp'),
(19, 'Crema catalana', 2, 4, 8.00, 10.00, 0, null, null, 'images/uploads/crema-catalana.jpg'),
(20, 'Pastís de Santiago', 2, 4, 10.00, 15.00, 0, null, null, 'images/uploads/pastis-santiago.jpg'),
(21, 'Milfulls de crema', 2, 4, 10.00, 12.10, 0, null, null, 'images/uploads/milfulls.jpg'),
(22, 'Macarons', 2, 4, 10.00, 12.10, 0, null, null, 'images/uploads/macaron.jpg'),
(23, 'Aigua 1L', 3, 4, 4.13, 4.29, 1, 3.50, 3.64, 'images/uploads/aigua.jpg'),
(24, 'Coca Cola Zero', 3, 4, 2.64, 3.20, 0, null, null, 'images/uploads/cocacolazero.jpeg'),
(25, 'Fanta taronja', 3, 4, 1.10, 1.0, 0, null, null, 'images/uploads/fanta-taronja.jpg'),
(26, 'Entrepà vegetal + beguda', 4, 4, 4.50, 4.68, 0, null, null, 'images/uploads/offer_breakfast.jpg'),
(27, 'Plat de pasta i postre', 1, 4, 7, 7.28, 0, null, null, 'images/uploads/offer_pasta.webp'),
(28, 'Torrades amb melmelada', 4, 4, 4, 4.16, 0, null, null, 'images/uploads/offer_toast.webp');


--
-- Bolcament de dades per a la taula 'product_allergens'
--
INSERT INTO product_allergens (product_id, allergen_id) VALUES
(1, 4),
(1, 9),
(2, 4),
(2, 9),
(15, 13);

--
-- Bolcament de dades per a la taula 'roles'
--
INSERT INTO roles (id, name) VALUES
(1, 'admin'),
(2, 'basic');

--
-- Bolcament de dades per a la taula 'users'
--
INSERT INTO users (id, name, surname, email, phone_number, password, role_id, incorporation_date) VALUES
(1, 'Admin', 'Admin', 'admin@torreglories.com', NULL, '21232f297a57a5a743894a0e4a801fc3', 1, '2021-05-04'), -- password: admin
(2, 'Laia', 'Vizcarro', 'laia@torreglories.com', '123456789', '81dc9bdb52d04dc20036dbd8313ed055', 2, NULL), -- password: 1234
(3, 'Jhon', 'Doe', 'jhondoe@gmail.com', '123456789', '81dc9bdb52d04dc20036dbd8313ed055', 2, NULL), -- password: 1234
(4, 'Jane', 'Doe', 'janedoe@gmail.com', '123456789', '81dc9bdb52d04dc20036dbd8313ed055', 2, NULL); -- password: 1234

--
-- Bolcament de dades per a la taula `orders`
--
INSERT INTO `orders` (`id`, `user_id`, `date`, `is_paid`, `tip`, `total_price`, `generated_points`) VALUES
(1, 2, '2023-12-27 01:53:06.941755', 1, NULL, 12.00, 60),
(2, 2, '2023-12-27 03:33:14.520434', 1, NULL, 31.29, 156),
(3, 2, '2024-01-05 15:04:29.988165', 1, NULL, 12.00, 60),
(4, 2, '2024-01-05 15:07:06.485001', 1, NULL, 14.04, 70),
(5, 2, '2024-02-06 15:23:32.171415', 1, 22.24, 74.14, 371);

--
-- Bolcament de dades per a la taula `order_products`
--
INSERT INTO `order_products` (`order_id`, `product_id`, `name`, `quantity`, `iva`, `base_price`, `total_price`, `is_offer`, `offer_price`, `total_offer_price`) VALUES
(1, 1, 'Canelons de rostit', 1, 4, 10.00, 12.00, 0, NULL, NULL),
(2, 1, 'Canelons de rostit', 1, 4, 10.00, 12.00, 0, NULL, NULL),
(2, 3, 'Amanida variada amb panses', 1, 4, 10.00, 15.00, 0, NULL, NULL),
(2, 23, 'Aigua 1L', 1, 4, 4.13, 4.29, 1, 3.50, 3.50),
(3, 1, 'Canelons de rostit', 1, 4, 10.00, 12.00, 0, NULL, NULL),
(4, 2, 'Canelons d\'espinacs i pinyons', 2, 4, 8.00, 8.32, 1, 6.75, 6.75);

--
-- Bolcament de dades per a la taula `reviews`
--

INSERT INTO `reviews` (`id`, `title`, `review`, `rate`, `order_id`, `date`) VALUES 
(1, 'Experiència Encantadora', 'No puc deixar de compartir la meva recent visita al restaurant. Vaig quedar impressionat amb la varietat i la qualitat dels plats.', 5, 2, '2024-01-30 15:07:06.485001'),
(2, 'Sorprenent', 'Experiència sorprenent al restaurant. Plats deliciosos!', 4, 4, '2024-02-03 09:15:10.567001');



