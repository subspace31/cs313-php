create table users (
   user_id  serial    PRIMARY KEY NOT NULL
  ,email    char(80)  NOT NULL
  ,password char(80)  NOT NULL
);

create table sellers (
   seller_id  SERIAL    PRIMARY KEY NOT NULL
  ,email      char(80)  NOT NULL
  ,password   char(80)  NOT NULL
);

create TABLE items (
  item_id       SERIAL  PRIMARY KEY NOT NULL
  ,seller_id    INT     REFERENCES sellers(seller_id) NOT NULL
  ,name         text    NOT NULL
  ,description  text
  ,cost         FLOAT   NOT NULL
);

CREATE TABLE address (
  address_id  SERIAL   PRIMARY KEY NOT NULL
  ,user_id    INT      REFERENCES users(user_id) NOT NULL
  ,name       text     NOT NULL
  ,address    text    NOT NULL
);

CREATE TABLE cards (
  card_id       SERIAL  PRIMARY KEY NOT NULL
  ,user_id      INT     REFERENCES users(user_id) NOT NULL
  ,card_name    text    NOT NULL
  ,holder_name  text    NOT NULL
  ,card_number  INT     NOT NULL
  ,expire_month INT  NOT NULL
  ,expire_year  INT  NOT NULL
);

create TABLE orders (
  order_id    SERIAL  PRIMARY KEY NOT NULL
  ,user_id    INT     REFERENCES users(user_id)
  ,address_id INT     REFERENCES address(address_id)
  ,card_id    INT     REFERENCES cards(card_id)
);

CREATE TABLE ordered_items (
  ordered_item_id SERIAL  PRIMARY KEY NOT NULL
  ,item_id        INT     REFERENCES items(item_id)
  ,order_id       INT     REFERENCES orders(order_id)
);

ALTER TABLE categories ADD CONSTRAINT categories_id_pk PRIMARY KEY (id);

create table categories (
  id serial
  ,category TEXT NOT NULL
);

DELETE FROM items where items.item_id > 0;