create table users (
   user_id  serial    PRIMARY KEY
  ,email    text
  ,password text
  ,token text
);

create table sellers (
   seller_id  SERIAL    PRIMARY KEY
  ,email      text
  ,password   text
  ,token text
);

create TABLE items (
  item_id       SERIAL  PRIMARY KEY
  ,seller_id    INT     REFERENCES sellers(seller_id)
  ,name         text    NOT NULL
  ,description  text
  ,cost         NUMERIC(9,2)   NOT NULL
  ,category_id int    REFERENCES categories(id)
);

CREATE TABLE address (
  address_id  SERIAL   PRIMARY KEY
  ,user_id    INT      REFERENCES users(user_id)
  ,name       text     NOT NULL
  ,address    text    NOT NULL
);

CREATE TABLE cards (
  card_id       SERIAL  PRIMARY KEY
  ,user_id      INT     REFERENCES users(user_id)
  ,card_name    text    NOT NULL
  ,holder_name  text    NOT NULL
  ,card_number  INT     NOT NULL
  ,expire_month INT  NOT NULL
  ,expire_year  INT  NOT NULL
);

create TABLE orders (
  order_id    SERIAL  PRIMARY KEY
  ,user_id    INT     REFERENCES users(user_id)
  ,address_id INT     REFERENCES address(address_id)
  ,card_id    INT     REFERENCES cards(card_id)
);

CREATE TABLE ordered_items (
  ordered_item_id SERIAL  PRIMARY KEY
  ,item_id        INT     REFERENCES items(item_id)
  ,order_id       INT     REFERENCES orders(order_id)
);

create table categories (
  id serial PRIMARY KEY
  ,category TEXT NOT NULL
);

create table profile (
  id serial PRIMARY KEY
  ,user_id INT REFERENCES users(user_id)
  ,full_name text
  ,f_name text
  ,l_name text
  ,pic_url text
  ,email text
);