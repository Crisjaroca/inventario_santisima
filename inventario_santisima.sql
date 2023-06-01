create database inventario_santisima;
use inventario_santisima;

create table producto (
    id int not null auto_increment,
    nombre varchar(255) not null,
    descripcion varchar(300) not null,
    marca varchar(255) not null,
    primary key (id)
);

create table salida (
    id int not null auto_increment,
    producto_id int not null,
    cantidad int not null,
    fechaSalida varchar(15) not null,
    valorUnitario float not null,
    valorTotal float not null,
    foreign key (producto_id) references producto(id),
    primary key (id)
);

create table ciudad (
    id int not null auto_increment,
    nombre varchar(255) not null,
    primary key (id)
);

create table proveedor (
    id int not null auto_increment,
    ciudad_id int not null,
    nombreProveedor varchar(255) not null,
    direccion varchar(255) not null,
    correoElectronico varchar(255) not null,
    telefono  varchar(255) not null,
    primary key (id),
    foreign key (ciudad_id) references ciudad(id)
);

create table pedido (
    id int not null auto_increment,
    proveedor_id int not null,
    producto_id int not null,
    cantidad int not null,
    fechaIngreso varchar(15) not null,
    valorUnitario float not null,
    valorTotal float not null,
    primary key (id),
    foreign key (proveedor_id) references proveedor(id),
    foreign key (producto_id) references producto(id)
);

create table inventario (
    id int not null auto_increment,
    producto_id int not null,
    cantidad int not null,
    primary key (id),
    foreign key (producto_id) references producto(id)
);

create table rol (
    id int not null auto_increment,
    nombreRol  varchar(255) not null,
    primary key (id)
);

create table usuario (
    id int not null auto_increment,
    rol_id int not null,
    nombreUsuario  varchar(255) not null,
    correoElectronico varchar(255) not null,
    passwordUser   varchar(255) not null,
    telefono  varchar(255) not null,
    primary key (id),
    foreign key (rol_id) references rol(id)
);


insert into rol (nombreRol) value ('Administrador');
insert into rol (nombreRol) value ('bartender');

insert into producto (nombre,descripcion,marca) value ('wisky','tequila','vodka');
insert into producto (nombre,descripcion,marca) value ('vinos','vinotinto','vino blanco');
insert into producto (nombre,descripcion,marca) value ('cerveza','nacional. importada','Nexans');

insert into ciudad (nombre) value ('Armenia'),('Barranquilla'),('Bogota'),('Bucaramanga'),('Cali'),('Cartagena'),('Cucuta'),('Florencia'),('Ibague'),('Leticia'),('Manizales'),('Medellin'),('Mocoa'),('Monteria'),('Neiva'),('Pasto'),('Pereira'),('Popayan'),('Puerto Carreño'),('Puerto Inirida'),('Quibdo'),('Riohacha'),('San Jose del Guaviare'),('Sincelejo'),('Tunja'),('Valledupar'),('Villavicencio'),('Yopal');
