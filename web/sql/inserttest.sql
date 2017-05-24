insert into users (email, password) VALUES ('test', 'test');

insert into sellers (email, password) VALUES ('test', 'test');

insert into items (seller_id, name, description, cost, category_id) VALUES ((select seller_id from sellers), 'item1', 'a short description of item 1', 12.00, 13)
  ,((select seller_id from sellers), 'item 2', 'a short description of item 2', 13.00, 13)
  ,((select seller_id from sellers), 'item 3', 'a short description of item 3', 14.00, 13)
  ,((select seller_id from sellers), 'item 4', 'a short description of item 4', 15.00, 14)
  ,((select seller_id from sellers), 'item 5', 'a short description of item 5', 16.00, 15)
  ,((select seller_id from sellers), 'item 6', 'a short description of item 6', 17.00, 16)
  ,((select seller_id from sellers), 'item 7', 'a short description of item 7', 18.00, 17)
  ,((select seller_id from sellers), 'item 8', 'a short description of item 8', 19.00, 15)
  ,((select seller_id from sellers), 'item 9', 'a short description of item 9', 20.00, 13)
  ,((select seller_id from sellers), 'item 10', 'a short description of item 10', 21.00, 14)
  ,((select seller_id from sellers), 'item 11', 'a short description of item 11', 22.00, 15);

insert into categories (category) VALUES ('Chalkboard Art')
,('Painted Heirlooms')
,('Herblore Classes')
,('Home Remedies')
,('Custom Orders')
,('Misc');

delete from items where item_id > 0;

select name ,description ,cost ,category FROM items inner join categories on items.category_id = categories.id;
select item_id, name ,description ,cost ,category, category_id FROM items inner join categories on items.category_id = categories.id WHERE categories.category = 'Painted Heirlooms' ORDER BY category_id;