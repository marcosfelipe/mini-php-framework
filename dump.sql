CREATE TABLE IF NOT EXISTS users (
  id integer auto_increment primary key,
  name varchar(255) NOT NULL,
  login varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  created_at datetime  NOT NULL
);

insert into users(name, login, password, created_at) values ('admin', 'admin', '123', now());

CREATE TABLE IF NOT EXISTS contacts (
	id int auto_increment primary key, 
	name varchar(100) not null, 
	phone varchar(13) not null,
	email varchar(30) not null,
	comment text not null
);

insert into contacts(name, phone, email, comment) values ('Admin', '123', 'admin@admin.com', 'Bem vindo!');

CREATE TABLE IF NOT EXISTS categories (
  id int primary key auto_increment,
  title varchar(255) NOT NULL,
  description varchar(255),
  created_at datetime NOT NULL,
  actived boolean default 1,
  user_id int(11) NOT NULL
);

insert into categories (title, created_at, user_id) values ('Graduação', now(), 1);

CREATE TABLE IF NOT EXISTS contents(
	id int primary key auto_increment, 
	title varchar(255) not null, 
	body text not null, 
	created_at datetime not null, 
	actived boolean default true, 
	user_id int not null, 
	category_id int not null
);

insert into contents (title, body, created_at, user_id, category_id) values ('Graduação 1', 'conteudo da graduação...', now(), 1, 1);
