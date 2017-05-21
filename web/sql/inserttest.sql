insert into users (email, password) VALUES ('test', 'test');

insert into sellers (email, password) VALUES ('test', 'test');

insert into items (seller_id, name, description, cost, category_id) VALUES (1, 'item1', 'a short description of item 1', 12.00, 1)
  ,(1, 'item 2', 'a short description of item 2', 13.00, 1)
  ,(1, 'item 3', 'a short description of item 3', 14.00, 2)
  ,(1, 'item 4', 'a short description of item 4', 15.00, 3)
  ,(1, 'item 5', 'a short description of item 5', 16.00, 4)
  ,(1, 'item 6', 'a short description of item 6', 17.00, 5)
  ,(1, 'item 7', 'a short description of item 7', 18.00, 6)
  ,(1, 'item 8', 'a short description of item 8', 19.00, 1)
  ,(1, 'item 9', 'a short description of item 9', 20.00, 2)
  ,(1, 'item 10', 'a short description of item 10', 21.00, 3)
  ,(1, 'item 11', 'a short description of item 11', 22.00, 4);

insert into categories (category) VALUES ('Chalkboard Art')
,('Painted Heirlooms')
,('Herblore Classes')
,('Home Remedies')
,('Custom Orders')
,('Misc');


select (name ,description ,cost ,category) FROM items inner join categories on items.category_id = categories.id;
select item_id, name ,description ,cost ,category, category_id FROM items inner join categories on items.category_id = categories.id WHERE categories.category = 'Painted Heirlooms' ORDER BY category_id;