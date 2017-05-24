create table  topic (
  id serial PRIMARY KEY
  ,name text NOT NULL
);

insert into topic (name) values ('Faith'), ('Sacrifice'), ('Charity');

create table links (
   id serial PRIMARY KEY
  ,scripture_id INT REFERENCES scriptures(id)
  ,topic_id INT REFERENCES topic(id)
);