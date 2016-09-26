CREATE TABLE IF NOT EXISTS users (
  id int auto_increment primary key,
  name varchar(255) NOT NULL,
  login varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  created_at datetime NOT NULL,
  actived boolean NOT NULL
);

CREATE TABLE IF NOT EXISTS contacts (
	id int auto_increment primary key, 
	name varchar(100), 
	phone varchar(13),
	email varchar(30),
	comment text
);

CREATE TABLE IF NOT EXISTS categories (
  id int primary key auto_increment,
  title varchar(255) NOT NULL,
  description varchar(255),
  created_at datetime NOT NULL,
  actived boolean default 1,
  user_id int(11) NOT NULL
);

CREATE TABLE IF NOT EXISTS contents(
	id int primary key auto_increment, 
	title varchar(255) not null, 
	body text not null, 
	created_at datetime not null, 
	actived boolean default true, 
	user_id int not null, 
	category_id int not null
);
