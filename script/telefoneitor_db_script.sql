CREATE DATABASE `telefoneitor_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
# Contraseñas admin - admin
#             empleado - empleado
CREATE USER 'admin'@'localhost' IDENTIFIED VIA mysql_native_password USING '*4ACFE3202A5FF5CF467898FC58AAB1D615029441';
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
CREATE USER 'empleado'@'localhost' IDENTIFIED VIA mysql_native_password USING '*7F324EE6FDAF1A668A8B16C048C801CBF7FE245E';
GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO 'empleado'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;

# Tablas
CREATE TABLE Clientes (
  cliente_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(150) NOT NULL,
  dni VARCHAR(9) NOT NULL,
  email VARCHAR(50),
  telefono VARCHAR(9),
  fechaDeRegistro TIMESTAMP
);

CREATE TABLE Reparaciones
(
  reparacion_id INT(10) UNSIGNED AUTO_INCREMENT,
  cliente_id INT(6) UNSIGNED,
  marcamodelo VARCHAR(80) NOT NULL,
  imei VARCHAR(100),
  sim boolean not null default 0,
  funda boolean not null default 0,
  sd boolean not null default 0,
  cargador boolean not null default 0,
  observaciones_previas VARCHAR(2000),
  presupuesto DOUBLE(5,2),
  estado_de_presupuesto BOOLEAN not null default 0,
  plazoentrega ENUM('Urgente', '12 horas', '24 horas', '36 horas', '48 horas', '72 horas', '1 semana'),
  estado ENUM('No reparado', 'Reparado', 'Faltan piezas', 'A reparar'),
  operaciones_efectuadas VARCHAR(2000),
  piezas_a_comprar VARCHAR(1000),
  fecha_fin_de_reparacion TIMESTAMP,
  observaciones_y_recomendaciones VARCHAR(2000),
  creado_por ENUM ('admin', 'empleado')
  PRIMARY KEY (reparacion_id),
  FOREIGN KEY (cliente_id) REFERENCES Clientes(cliente_id)
);

# Datos
INSERT INTO Clientes VALUES (1, 'Yo', '11111111X', 'elcorreosexy@gmail.com', '666666666', NOW());
INSERT INTO Clientes VALUES (2, 'Cris', '11111111X', 'elcorreosexy@gmail.com', '666666666', NOW());
INSERT INTO Clientes VALUES (3, 'Omar', '11111111X', 'elcorreosexy@gmail.com', '666666666', NOW());
INSERT INTO Clientes VALUES (4, 'Acha Tío', '11111111X', 'elcorreosexy@gmail.com', '666666666', NOW());
INSERT INTO Clientes VALUES (5, 'Sexy Joaquín Peña', '11111111X', 'elcorreosexy@gmail.com', '666666666', NOW());
INSERT INTO Clientes VALUES (6, 'Sexy Hijo de Joaquín Peña', '11111111X', 'elcorreosexy@gmail.com', '666666666', NOW());

INSERT INTO Reparaciones VALUES (1, 1, 'Galaxy S4','imei', TRUE, FALSE, TRUE, TRUE, 'Sin observaciones', 50.50,  True, '12 horas', 'No reparado', 'Nada', 'Ninguna', '2016-01-30 21:24:15', 'Sin observaciones', 'admin');
INSERT INTO Reparaciones VALUES (2, 2, 'iFone', 'imei',TRUE, FALSE, TRUE, TRUE, 'Sin observaciones', 150.50,  True, '12 horas', 'No reparado', 'Nada', 'Ninguna', '2016-01-30 21:24:15', 'Sin observaciones', 'admin');
INSERT INTO Reparaciones VALUES (3, 2, 'BQ Full HD','imei', TRUE, FALSE, TRUE, TRUE, 'Sin observaciones', 69.69,  True, '12 horas', 'No reparado', 'Nada', 'Ninguna', '2016-01-30 21:24:15', 'Sin observaciones', 'admin');
INSERT INTO Reparaciones VALUES (4, 3, 'Iphone', 'imei',TRUE, FALSE, TRUE, TRUE, 'Sin observaciones', 50.50,  True, '12 horas', 'No reparado', 'Nada', 'Ninguna', '2016-01-30 21:24:15', 'Sin observaciones', 'admin');
INSERT INTO Reparaciones VALUES (5, 4, 'Achaaaa Iphone', 'imei',TRUE, FALSE, TRUE, TRUE, 'Sin observaciones', 50.50,  True, '12 horas', 'No reparado', 'Nada', 'Ninguna', '2016-01-30 21:24:15', 'Sin observaciones', 'admin');
INSERT INTO Reparaciones VALUES (6, 5, 'Joaquinito Peña iPhone', 'imei',TRUE, FALSE, TRUE, TRUE, 'Sin observaciones', 50.50,  True, '12 horas', 'No reparado', 'Nada', 'Ninguna', '2016-01-30 21:24:15', 'Sin observaciones', 'admin');
INSERT INTO Reparaciones VALUES (7, 6, 'Note 4', 'imei',TRUE, FALSE, TRUE, TRUE, 'Sin observaciones', 50.50,  True, '12 horas', 'No reparado', 'Nada', 'Ninguna', '2016-01-30 21:24:15', 'Sin observaciones', 'admin');