SELECT * from items;


INSERT INTO items(item_name, item_type, item_price, item_quantity, photo_desc)
VALUES('Jersey Aus', 'sports_clothing', 100, 50, 'n') RETURNING item_id;

DELETE FROM items
WHERE item_name = 'Nokia 6600';

SELECT item_id FROM items;

SELECT * FROM customers;
SELECT * FROM identification;

SELECT * FROM customers c, identification i WHERE c.customer_id = i.login_id;

Select * from address;

WHERE user_name = '$username' AND password = '$password';

ALTER TABLE "address" ADD ext_home_number int;

SELECT * FROM identification WHERE email = 'idsm_2000@hotmail.com' and password = '1234';
SELECT * FROM identification;
SELECT * FROM items;

UPDATE address SET ext_home_number = 245 WHERE address_id=2;


DELETE FROM customers WHERE address_id = 3;



SELECT *FROM admin;

SELECT  id.login_id, cu.customer_id, ad.ext_home_number, ad.street, ad.city, ad.state, ad.country, ad.zip, ad.telephone, id.email, cu.first_name, cu.middle_name, cu.last_name
FROM address ad, identification id, customers cu
WHERE cu.customer_id = ad.address_id and cu.customer_id = id.login_id;


ALTER TABLE orders
  ALTER COLUMN num_of_order_id TYPE bigint;


INSERT INTO orders(order_id, num_of_order_id, customer_id, to_street, ext_home_number, to_city, to_state, to_zip, ship_date, item_id, item_quantity, item_name)
VALUES(1, 21855052, 21855052, 'wake', 527, 'dw','Boston' ,'54454', '2019/06/08', 2, '2', 'Nokia 1100' );



SELECT * from items;
select * from identification
select * from address
select * from customers
SELECT *FROM admin
SELECT * FROM orders;



CREATE TABLE "orders" (
  "order_id" SERIAL NOT NULL,
  "num_of_order_id" int,
  "customer_id" int,
  "to_street" varchar(50),
  "ext_home_number" int,
  "to_city" varchar(90),
  "to_state" varchar(90),
  "to_zip" varchar(20),
  "ship_date" date,
  "item_id" int,
  "item_name" varchar(800),
  "item_quantity" varchar(800),
  PRIMARY KEY ("order_id")
);







SELECT order_id, num_of_order_id, customer_id, to_street, ext_home_number, to_city, to_state, to_zip, ship_date, item_id, item_quantity, item_name
FROM orders;

SELECT * from orders;

ALTER TABLE orders
  RENAME COLUMN To_zip TO to_zip;


DROP TABLE IF EXISTS orders;


ALTER TABLE "orders" ADD num_of_order_id int;
ALTER TABLE "orders" ADD item_quantity varchar(800);


UPDATE items
SET photo_desc = 'https://http2.mlstatic.com/playera-seleccion-mexicana-personalizada-hombre-mujer-nino-D_NQ_NP_769962-MLM27510986821_062018-F.jpg'
WHERE item_name = 'La Seleccion Jersey MEX';





select * from customers c ,address a ,identification i where
     c.login_id = i.login_id and a.address_id = c.address_id;



SELECT  DISTINCT  id.login_id, cu.customer_id, ad.ext_home_number, ad.street, ad.city, ad.state, ad.country, ad.zip, ad.telephone, id.email, cu.first_name, cu.middle_name, cu.last_name
from identification id, customers cu, address ad WHERE id.email = 'idsm_2000@hotmail.com';


Select * FROM identification;


DELETE FROM admin WHERE admin_id = 2;

UPDATE "admin" SET admin_id = 1 WHERE admin_id=3;


UPDATE items
SET photo_desc = 'https://http2.mlstatic.com/playera-seleccion-mexicana-personalizada-hombre-mujer-nino-D_NQ_NP_769962-MLM27510986821_062018-F.jpg'
WHERE item_name = 'La Seleccion Jersey MEX';


ALTER SEQUENCE orders_order_id_seq RESTART;


SELECT  cu.customer_id, ad.ext_home_number, ad.street, ad.city, ad.state, ad.country, ad.zip, ad.telephone, id.email, cu.first_name, cu.middle_name, cu.last_name
FROM address ad, identification id, customers cu
WHERE cu.customer_id = ad.address_id and cu.customer_id = id.login_id and  = id.email and  = id.password;

ALTER TABLE "address" ADD country varchar(255);
UPDATE address SET country = 'Mexico' WHERE address_id=1;


CREATE TABLE "customers" (
  "customer_id" SERIAL NOT NULL,
  "first_name" varchar(50),
  "middle_name" varchar(50),
  "last_name" varchar(50),
  "address_id" int,
  "login_id" int,
  PRIMARY KEY ("customer_id")
);

CREATE INDEX "FK" ON  "customers" ("address_id", "login_id");

CREATE TABLE "orders" (
  "order_id" SERIAL NOT NULL,
  "num_of_order_id" int,
  "customer_id" int,
  "to_street" varchar(50),
  "ext_home_number" int,
  "to_zip" varchar(20),
  "ship_date" date,
  "item_id" int,
  "item_name" varchar(800),
  "item_quantity" varchar(800),
  PRIMARY KEY ("order_id")
);

CREATE INDEX "FK" ON  "orders" ("customer_id", "item_id");

ALTER TABLE "orders" DROP "customer_name";

CREATE TABLE "address" (
  "address_id" SERIAL NOT NULL,
  "street" varchar(50),
  "city" varchar(50),
  "state" varchar(2),
  "zip" varchar(5),
  "telephone" varchar(10),
  "cellphone" varchar(10),
  PRIMARY KEY ("address_id")
);

ALTER TABLE "address" DROP "cellphone";
ALTER TABLE "address" ADD ext_home_number varchar(800);

CREATE TABLE "items" (
  "item_id" SERIAL NOT NULL,
  "item_barcode" int,
  "item_name" varchar(50),
  "item_type" varchar(50),
  "item_price" float,
  "item_quantity" int,
  PRIMARY KEY ("item_id")
);

ALTER TABLE items ADD photo_desc varchar(800);

CREATE TABLE "identification" (
  "login_id" SERIAL NOT NULL,
  "email" varchar(50),
  "password" varchar(6),
  PRIMARY KEY ("login_id")
);

CREATE TABLE "admin"(
"admin_id" SERIAL NOT NULL,
"name" varchar(50),
"last_name" varchar(50),
"user_name" varchar(50) NOT NULL,
"email" varchar(50) NOT NULL,
"password" varchar(50) NOT NULL,
PRIMARY KEY ("admin_id")
); 



             
_____________USER INSERTS________________________
INSERT INTO customers(customer_id, first_name, middle_name, last_name, address_id, login_id) VALUES
(1,'Isaac','David','Sanchez', 0001, 0001),
(2,'Abraham','A','Sanchez', 0002, 0002);

INSERT INTO address(address_id, street, city, state, zip, telephone) VALUES
(0001, 'Wake st', 'CDMX', 'DF', '02050', 5567023556),
(0002, 'Wake st', 'CDMX', 'DF', '02050', 5567023556);

INSERT INTO identification(login_id, email, password) VALUES
(0001, 'idsm_2000@hotmail.com', '1234'),
(0002, 'some_email@hotmail.com', '1234');
_______________________________________________


________________ITEMS INSERT_____________________
INSERT INTO items(item_id, item_barcode, item_name, item_type, item_price, item_quantity)VALUES
(0000001, 0000001, 'Moto RAZR V3', 'phone', '175.00', 50),
(0000002, 0000002, 'Nokia 1100', 'phone', '105.00', 50),
(0000003, 0000003, 'Nokia 6600', 'phone', '20.00', 50),
(0000004, 0000004, 'La Seleccion Jersey MEX', 'sports_clothing', '100.00', 50),
(0000005, 0000005, 'Jersey USA', 'sports_clothing', '100.00', 50);

 UPDATE items
 SET photo_desc = 'https://'
 WHERE item_name = 'REDM';
___________________________________________________


_______________ADMIN INSERTS_____________________
INSERT INTO admin(admin_id, name, last_name, user_name, email, password) VALUES
(1,'Isaac','Sanchez', 'isaako1', 'san16044@byui.edu','san16044');
__________________________________________________________
