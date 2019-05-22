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
  "customer_id" int,
  "customer_name" varchar(50),
  "to_street" varchar(50),
  "to_city" varchar(50),
  "to_state" varchar(2),
  "To_zip" varchar(5),
  "item_id" int,
  "ship_date" date,
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
