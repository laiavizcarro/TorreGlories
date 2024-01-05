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
('Plats'),
('Postres'),
('Begudes'),
('Esmorzars');

--
-- Bolcament de dades per a la taula 'products'
--
INSERT INTO products (name, category_id, iva, base_price, total_price, is_offer, offer_price, total_offer_price, img_path) VALUES
('Canelons de rostit', 1, 4, 10.00, 12.00, 0, null, null, 'images/uploads/canelons.jpg'),
("Canelons d\'espinacs i pinyons", 1, 4, 8.00, 8.32, 1, 6.75, 7.02, 'images/uploads/canelonsespinacs.jpg'),
('Amanida variada amb panses', 1, 4, 10.00, 15.00, 0, null, null, 'images/uploads/amanida.jpg'),
('Spaghetti a la bolonyesa', 1, 4, 10.00, 12.10, 0, null, null, 'images/uploads/spagettis.jpg'),
('Macedonia', 2, 4, 10.00, 12.10, 0, null, null, 'images/uploads/macedonia.jpg'),
('Pastís de formatge', 2, 4, 4.13, 5.00, 0, null, null, 'images/uploads/pastis-formatge.webp'),
('Iogurt natural', 2, 4, 2.64, 3.20, 0, null, null, 'images/uploads/iogurt.jpg'),
('CocaCola', 3, 4, 1.10, 1.0, 0, null, null, 'images/uploads/cocacola.jpg'),
('Arros del senyoret', 1, 4, 25.00, 30.25, 0, null, null, 'images/uploads/arros-senyoret.jpeg'),
('Hamburguesa de vedella acompanyada de patates', 1, 4, 10.00, 12.00, 0, null, null, 'images/uploads/hamburguesa.jpeg'),
('Saltejat de verdures i xampinyons', 1, 4, 8.00, 10.00, 0, null, null, 'images/uploads/saltejat-verdures.jpg'),
('Rotllets vietnamites', 1, 4, 10.00, 15.00, 0, null, null, 'images/uploads/rollitos.webp'),
('Xai al forn', 1, 4, 10.00, 12.10, 0, null, null, 'images/uploads/xai.jpg'),
('Fingers de pollastre i patates', 1, 4, 10.00, 12.10, 0, null, null, 'images/uploads/fingers.jpg'),
('Sushi de salmó i tonyina', 1, 4, 4.13, 5.00, 0, null, null, 'images/uploads/nigiris.jpg'),
('Dorada al forn i acompanyament', 1, 4, 2.64, 3.20, 0, null, null, 'images/uploads/daurada.jpg'),
('Dues boles de gelat', 2, 4, 1.10, 1.0, 0, null, null, 'images/uploads/gelat.webp'),
('Flam dou', 2, 4, 10.00, 12.00, 0, null, null, 'images/uploads/flam.webp'),
('Crema catalana', 2, 4, 8.00, 10.00, 0, null, null, 'images/uploads/crema-catalana.jpg'),
('Pastís de Santiago', 2, 4, 10.00, 15.00, 0, null, null, 'images/uploads/pastis-santiago.jpg'),
('Milfulls de crema', 2, 4, 10.00, 12.10, 0, null, null, 'images/uploads/milfulls.jpg'),
('Macarons', 2, 4, 10.00, 12.10, 0, null, null, 'images/uploads/macaron.jpg'),
('Aigua 1L', 3, 4, 4.13, 4.29, 1, 3.50, 3.64, 'images/uploads/aigua.jpg'),
('Coca Cola Zero', 3, 4, 2.64, 3.20, 0, null, null, 'images/uploads/cocacolazero.jpeg'),
('Fanta taronja', 3, 4, 1.10, 1.0, 0, null, null, 'images/uploads/fanta-taronja.jpg'),
('Entrepà vegetal més suc', 4, 4, 4.50, 4.68, 0, null, null, 'images/uploads/offer_breakfast.jpg'),
('Plat de pasta i postre', 1, 4, 7, 7.28, 0, null, null, 'images/uploads/offer_pasta.webp'),
('Torrades amb melmelada', 4, 4, 4, 4.16, 0, null, null, 'images/uploads/offer_toast.webp');


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
('Admin', 'Admin', 'admin@torreglories.com', NULL, '21232f297a57a5a743894a0e4a801fc3', 1, '2021-05-04'), -- password: admin
('Laia', 'Vizcarro', 'laia@torreglories.com', '123456789', '81dc9bdb52d04dc20036dbd8313ed055', 2, NULL); -- password: 1234