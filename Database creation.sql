drop database if exists webshop;

create database webshop;

use webshop;

create table category (
  	category_num int primary key auto_increment,
  	name varchar(50) not null
);

insert into category (name) values ('processor'), ('motherboard'), ('graphic_card'), ('hard_disk'), ('power_supply'), ('memory'), ('cooler'), ('case'), ('screen'), ('keyboard'), ('mouse');

create table product (
  	product_id int primary key auto_increment,
  	name varchar(200) not null,
  	price double (10,2) not null,
  	image varchar(250),
  	category_num int not null,
  	index category_num(category_num),
	constraint name_un unique (name),
  	foreign key (category_num) references category(category_num)
	on delete restrict
);

insert into product (name, price, image, category_num) values ('AMD Ryzen 5 7600X, AM5, 4.7 GHz, 6-Core', 284.90, 'Ryzen 5 7600X CPU.png', 1), ('AMD Ryzen 7 7700X, AM5, 4.5 GHz, 8-Core', 399.90, 'Ryzen 7 7700X CPU.png', 1), ('AMD Ryzen 9 7900X, AM5, 4.7 GHz, 12-Core', 489.90, 'Ryzen 9 7900X CPU.png', 1), ('Intel Core i5-13600K, LGA1700, 3.50 GHz, 14-Core', 369.90, 'Intel Core i5-13600K CPU.png', 1),
('Intel Core i7-13700K, LGA1700, 3.40 GHz, 16-Core', 489.90, 'Intel Core i7-13700K CPU.png', 1), ('Intel Core i9-13900K, LGA1700, 3.00 GHz, 24-Core', 689.90, 'Intel Core i9-13900K CPU.png', 1), ('Asus TUF Gaming, B650-PLUS, AM5, DDR5, ATX-emolevy', 279.90, 'Asus Tuf Gaming B650-Plus MB.png', 2), ('Gigabyte Gaming X AX, X670, AM5, DDR5, ATX-emolevy', 289.90, 'Gigabyte Gaming X670 MB.png', 2), ('Gigabyte Gaming X AX, Z790, LGA1700, DDR5, ATX-emolevy', 299.90, 'Gigabyte Gaming Z790 MB.png', 2), ('Asus PRIME, Z790-P, ATX-emolevy', 309.90, 'Asus Prime Z790-P MB.png', 2), ('Asus GeForce RTX 4070 Ti TUF Gaming, GDDR6X, 12GB', 939.90, 'Asus Geforce RTX 4070Ti GPU.png', 3), ('MSI GeForce RTX 4080 ROG Strix White OC Edition, GDDR6X, 16GB', 1799.90, 'Msi Geforce RTX 4080 GPU.png', 3), ('Asus GeForce RTX 4090 TUF Gaming OC Edition, GDDR6X, 24GB', 2179.90, 'Asus Geforce RTX 4090 GPU.png', 3), ('Sapphire Radeon RX 7900 XT, GDDR6X, 20GB', 1069.90, 'Sapphire Radeon RX 7900XT GPU.png', 3), ('Powercolor Radeon RX 7900 XTX Red Devil, GDDR6X, 24GB', 1349.90, 'Noctua NH-U14S Air Cooler.png', 3), ('Kingston 480GB A400, 2.5", SATA 3, 500/450MB/s', 34.90, 'Kingston 480GB SSD.png', 4), (' Samsung 1TB 870 QVO, 2.5", SATA 3, 560/530MB/s', 89.90, 'Samsung 1TB SSD.png', 4), ('Seagate 1TB BarraCuda, 3.5",  SATA 3, 7200rpm, 64MB', 46.90, 'Seagate 1TB HDD.png', 4), ('Seagate 2TB BarraCuda, 3.5", SATA 3, 72000rpm, 256MB', 59.90, 'Seagate 2TB HDD.png', 4), ('Seagate 4TB BarraCuda, 3.5", SATA 3, 5400rpm, 256MB', 89.90, 'Seagate 4TB HDD.png', 4), ('Samsung 1TB 980 PRO, M.2 2280, PCIe 4.0, NVMe, 7000/5000MB/s', 129.90, 'Samsung 1TB M2 SSD.png', 4), ('Western Digital 2TB WD_Black SN850X, M.2 2280, PCIe 4.0, NVMe, 7300/6600MB/s', 199.90, 'WD 2TB M2 SSD.png', 4), ('Seasonic Focus PX-750, 750w, modulaarinen, ATX-virtalähde, 80 Plus Platinum, musta', 184.90, 'Seasonic Focus PX-750 PS.png', 5), ('Gigabyte UD850GM PG5(rev. 2.0), 850w, modulaarinen, ATX-virtalähde, PCIe 5.0, 80 Plus Gold, musta', 149.90, 'Gigabyte UD850GM PS.png', 5), ('Corsair RM1000x (2021), 1000w, modulaarinen, ATX-virtalähde, 80 Plus Gold, musta', 229.90, 'Corsair RM1000x PS.png', 5), ('Kingston 16GB (2 x 8GB) Fury Beast, DDR5, 52000MHz, CL40, 1.25V, musta', 85.90, 'Kingston 16GB Fury Beast.png', 6), ('Kingston 32GB (2 x 16GB) Fury Beast, DDR5, 6000MHz, CL36, 1.35V, musta', 169.90, '', 6), ('Noctua Prosessorijäähdytin, NH-U14S, Air Cooler', 89.90, 'Noctua NH-U14S Air Cooler.png', 7), ('Asus ROG Strix LC II 240, 240mm, AIO-liquidcooler', 179.90, 'Asus ROG Strix LC II 240.png', 7), ('Fractal Design Lumen S28 v2 RGB, 280mm, AIO-liquidcooler', 159.90, 'Fractal Design Lumen S28 v2 RGB.png', 7), ('Corsair iCUE H150i Elite LCD Display, 360mm, AIO-liquidcooler', 329.00, 'Corsair iCUE H150i Elite LCD Display.png', 7), ('Lian Li O11D EVO, ikkunallinen tornikotelo, valkoinen', 189.90, 'Lian Li O11D EVO.png', 8), ('Fractal Design Pop XL Air RGB Black - TG Clear Tint, ikkunallinen tornikotelo, musta', 159.90, 'Fractal Design Pop XL Air RGB Black.png', 8), ('Asus TUF Gaming VG249Q1A, 23.8", 165Hz, FullHD, musta', 199.90, 'Asus TUF Gaming VG249Q1A.png', 9), ('Samsung Odyssey G5, 27", 144Hz, kaareva, WQHD, musta', 299.00, 'Samsung Odyssey G5.png', 9), ('Asus ROG Strix Scope RX, optinen mekaaninen pelinäppäimistö, langallinen, RGB, musta', 139.90, 'Asus ROG Strix Scope RX.png', 10), ('Logitech G513 Carbon, mekaaninen pelinäppäimistö, langallinen, RGB, GX Red linear, musta', 149.00, 'Logitech G513 Carbon.png', 10), ('Logitech G502 X, optinen pelihiiri, 25600 DPI, musta', 79.90, 'Logitech G502 X.png', 11), ('Steelseries Rival 3, optinen pelihiiri, 8500 CPI, musta', 39.90, 'Steelseries Rival 3.png', 11);



create table customer (
	id int primary key auto_increment,
	firstname varchar(50) not null,
	lastname varchar(50) not null,
	address varchar(50) not null,
	zip varchar(10) not null,
	city varchar(30) not null
);

insert into customer (firstname, lastname, address, zip, city) values 
	('Pekka', 'Pakkanen', 'suotie 102', '90100', 'Oulu'),
 	('Jussi', 'Makinen', 'kedonkuja 98', '64100', 'Kristiinankaupunki'),
  	('Kaarina', 'Kalliopera', 'metsatie 29', '00100', 'Helsinki'),
   	('Joni', 'Pontius', 'jarvioja 11', '33700', 'Tampere'),
    ('Susanna', 'suolajarvi', 'korvenkangas 306', '90580', 'Oulu');

create table orders (
	id int primary key auto_increment,
	order_date timestamp default current_timestamp,
	customer_id int not null,
	index customer_id(customer_id),
	foreign key (customer_id) references customer(id)
	on delete restrict
);
	
create table order_row (
	order_id int not null,
	index order_id(order_id),
	foreign key (order_id) references orders (id)
	on delete restrict,
	product_id int not null,
	index product_id(product_id),
	foreign key (product_id) references product(product_id)
	on delete restrict
);

