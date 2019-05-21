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

CREATE TABLE "items" (
  "item_id" SERIAL NOT NULL,
  "item_barcode" int,
  "item_name" varchar(50),
  "item_type" varchar(50),
  "item_price" float,
  "item_quantity" int,
  PRIMARY KEY ("item_id")
);

CREATE TABLE "identification" (
  "login_id" SERIAL NOT NULL,
  "email" varchar(50),
  "password" varchar(6),
  PRIMARY KEY ("login_id")
);

