create table categoria(
	IDcategory int not null auto_increment primary key,
	category varchar(255)

);

insert into categoria(category) value ("bebidas");
insert into categoria(category) value ("snacks");
insert into categoria(category) value ("completos");
insert into categoria(category) value ("cafe");
insert into categoria(category) value ("sandwiches");
insert into categoria(category) value ("Wraps");




create table productos(
	id int not null auto_increment primary key,
	name varchar(255),
	price float,
	IDcategory int,
	stock float,
	FOREIGN KEY (`IDcategory`) REFERENCES `categoria`(`IDcategory`)
);
insert into productos(name,price,IDcategory,stock) value ("bebida lata 350cc",1000,1,10);
insert into productos(name,price,IDcategory,stock) value ("agua mineral cachantun",1000,1,10);
insert into productos(name,price,IDcategory,stock) value ("agua mineral benedictino",1000,1,10);
insert into productos(name,price,IDcategory,stock) value ("agua mineral sabores",1200,1,10);
insert into productos(name,price,IDcategory,stock) value ("nectar boca ancha",850,1,10);
insert into productos(name,price,IDcategory,stock) value ("energetica",2000,1,10);


insert into productos(name,price,IDcategory,stock) value ("papas fritas",2000,2,10);
insert into productos(name,price,IDcategory,stock) value ("salchipapas",2500,2,10);
insert into productos(name,price,IDcategory,stock) value ("chorrillana",3500,2,10);
insert into productos(name,price,IDcategory,stock) value ("chickenpops",3000,2,10);


insert into productos(name,price,IDcategory,stock) value ("mak italiano",2500,3,10);
insert into productos(name,price,IDcategory,stock) value ("mak llanquihue italiano",2500,3,10);


insert into productos(name,price,IDcategory,stock) value ("cafe mediano",1700,4,10);


insert into productos(name,price,IDcategory,stock) value ("mak italiano",4000,5,10);
insert into productos(name,price,IDcategory,stock) value ("mak chacarero",4000,5,10);
insert into productos(name,price,IDcategory,stock) value ("mak barros lucos ",4000,5,10);
insert into productos(name,price,IDcategory,stock) value ("mak tocino",4000,5,10);


insert into productos(name,price,IDcategory,stock) value ("Wraps italiano",4000,6,10);
insert into productos(name,price,IDcategory,stock) value ("Wraps chacarero",4000,6,10);
insert into productos(name,price,IDcategory,stock) value ("Wraps barros lucos",4000,6,10);


create table cart(
	id int not null auto_increment primary key,
	client_email varchar(255),
	created_at datetime not null
);

create table ProductCart (
	id int not null auto_increment primary key,
	product_id int not null,
	q float,
	cart_id int not null
);




