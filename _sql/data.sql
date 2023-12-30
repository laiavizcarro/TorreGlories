USE torreglories;

--
-- Bolcament de dades per a la taula 'allergens'
--
INSERT INTO allergens (code, name, description, img_path) VALUES
('AC', 'Crustacis', 'Crustacis i els seus derivats', '/images/allergens/AC.png'),
('AE', 'Ous', 'Ous i els seus derivats', '/images/allergens/AE.png'),
('AF', 'Peix', 'Peix i els seus derivats', '/images/allergens/AF.png'),
('AM', 'Lactis', 'Llet i els seus derivats', '/images/allergens/AM.png'),
('AN', 'Fruits de closca', 'Fruits secs i els seus derivats', '/images/allergens/AN.png'),
('AP', 'Cacauets', 'Cacauets i els seus derivats', '/images/allergens/AP.png'),
('AS', 'Sèsam', 'Llavors de sèsam i els seus derivats', '/images/allergens/AS.png'),
('AU', 'Sulfits', 'Diòxid de sofre i sulfits en el producte', '/images/allergens/AU.png'),
('AW', 'Gluten', 'Cereals amb gluten i els seus derivats', '/images/allergens/AW.png'),
('AY', 'Soja', 'Soja i els seus derivats', '/images/allergens/AY.png'),
('BC', 'Api', 'Api i els seus derivats', '/images/allergens/BC.png'),
('BM', 'Mostassa', 'Mostassa i els seus derivats', '/images/allergens/BM.png'),
('NL', 'Tramussos', 'Tramussos o lupino i els seus derivats', '/images/allergens/NL.png'),
('UM', 'Mol·luscs', 'Mol·luscs i els seus derivats', '/images/allergens/UM.png');

--
-- Bolcament de dades per a la taula 'categories'
--
INSERT INTO categories (name) VALUES
('menu'),
('dessert'),
('drinkCoffee'),
('breakfastSnack');

--
-- Bolcament de dades per a la taula 'products'
--
INSERT INTO products (name, category_id, stock, iva, base_price, total_price, is_offer, offer_price, total_offer_price, img_path) VALUES
('Canelons de rostit', 1, 50, 4, 10.00, 12.00, 0, 0.00, 0.00, 'images/uploads/canelons.jpg'),
("Canelons d\'espinacs i pinyons", 1, 50, 4, 8.00, 10.00, 0, 0.00, 0.00, 'images/uploads/canelonsespinacs.jpg'),
('Amanida variada amb panses', 1, 50, 4, 10.00, 15.00, 0, 0.00, 0.00, 'images/uploads/amanida.jpg'),
('Spaghetti a la bolonyesa', 1, 50, 4, 10.00, 12.10, 0, 0.00, 0.00, 'images/uploads/spagettis.jpg'),
('Macedonia', 2, 50, 4, 10.00, 12.10, 0, 0.00, 0.00, 'images/uploads/macedonia.jpg'),
('Pastís de formatge', 2, 50, 4, 4.13, 5.00, 0, 0.00, 0.00, 'images/uploads/pastis-formatge.webp'),
('Iogurt natural', 2, 50, 4, 2.64, 3.20, 0, 0.00, 0.00, 'images/uploads/iogurt.jpg'),
('CocaCola', 3, 50, 4, 1.10, 1.50, 0, 0.00, 0.00, 'images/uploads/cocacola.jpg'),
('Arros del senyoret', 1, 50, 4, 25.00, 30.25, 0, 0.00, 0.00, 'images/uploads/arros-senyoret.jpeg'),
('Hamburguesa de vedella acompanyada de patates', 1, 50, 4, 10.00, 12.00, 0, 0.00, 0.00, 'images/uploads/hamburguesa.jpeg'),
('Saltejat de verdures i xampinyons', 1, 50, 4, 8.00, 10.00, 0, 0.00, 0.00, 'images/uploads/saltejat-verdures.jpg'),
('Rotllets vietnamites', 1, 50, 4, 10.00, 15.00, 0, 0.00, 0.00, 'images/uploads/rollitos.webp'),
('Xai al forn', 1, 50, 4, 10.00, 12.10, 0, 0.00, 0.00, 'images/uploads/xai.jpg'),
('Fingers de pollastre i patates', 1, 50, 4, 10.00, 12.10, 0, 0.00, 0.00, 'images/uploads/fingers.jpg'),
('Sushi de salmó i tonyina', 1, 50, 4, 4.13, 5.00, 0, 0.00, 0.00, 'images/uploads/nigiris.jpg'),
('Dorada al forn i acompanyament', 1, 50, 4, 2.64, 3.20, 0, 0.00, 0.00, 'images/uploads/daurada.jpg'),
('Dues boles de gelat', 2, 50, 4, 1.10, 1.50, 0, 0.00, 0.00, 'images/uploads/gelat.webp'),
('Flam dou', 2, 50, 4, 10.00, 12.00, 0, 0.00, 0.00, 'images/uploads/flam.webp'),
('Crema catalana', 2, 50, 4, 8.00, 10.00, 0, 0.00, 0.00, 'images/uploads/crema-catalana.jpg'),
('Pastís de Santiago', 2, 50, 4, 10.00, 15.00, 0, 0.00, 0.00, 'images/uploads/pastis-santiago.jpg'),
('Milfulls de crema', 2, 50, 4, 10.00, 12.10, 0, 0.00, 0.00, 'images/uploads/milfulls.jpg'),
('Macarons', 2, 50, 4, 10.00, 12.10, 0, 0.00, 0.00, 'images/uploads/macaron.jpg'),
('Aigua 1L', 3, 50, 4, 4.13, 5.00, 0, 0.00, 0.00, 'images/uploads/aigua.jpg'),
('Coca Cola Zero', 3, 50, 4, 2.64, 3.20, 0, 0.00, 0.00, 'images/uploads/cocacolazero.jpeg'),
('Fanta taronja', 3, 50, 4, 1.10, 1.50, 0, 0.00, 0.00, 'images/uploads/fanta-taronja.jpg');

--
-- Bolcament de dades per a la taula 'product_allergens'
--
INSERT INTO product_allergens (allergen_id, product_id) VALUES
(4, 1),
(9, 1),
(4, 2),
(9, 2),
(3, 15);

--
-- Bolcament de dades per a la taula 'roles'
--
INSERT INTO roles (name) VALUES
('admin'),
('basic');

--
-- Bolcament de dades per a la taula 'users'
--
INSERT INTO users (name, surname, email, phone_number, password, role_id, incorporation_date) VALUES
('Admin', 'Admin', 'admin@torreglories.com', '123456789', '21232f297a57a5a743894a0e4a801fc3', 1, NULL), -- password: admin
('Laia', 'Vizcarro', 'laia@torreglories.com', '123456789', '81dc9bdb52d04dc20036dbd8313ed055', 2, NULL); -- password: 1234