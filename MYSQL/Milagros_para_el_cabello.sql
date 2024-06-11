-- Se crea la base de datos
CREATE DATABASE `Milagros_para_el_cabello`;
USE `Milagros_para_el_cabello`;

-- Se crea tabla Usuarios
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre_completo` varchar(50) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contraseña` decimal(20,0) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` decimal(10,0) DEFAULT NULL,
  `imagen` varchar(30) NOT NULL DEFAULT 'USUARIOS_FOTOS/nf.jpg',
  `fecha_registro` datetime NOT NULL,
  `id_rol` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Se crea tabla Roles
CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Se crea tabla Productos
CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre_producto` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Se crea tabla Pedidos
CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Se crea tabla Detalle_pedidos
CREATE TABLE `detalle_pedidos` (
  `id_detalle` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `producto` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Inserción de roles
INSERT INTO Roles (id_rol, nombre_rol) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- Inserción de usuarios
INSERT INTO `usuarios` (`id_usuario`, `nombre_completo`, `correo_electronico`, `usuario`, `contraseña`, `direccion`, `telefono`, `imagen`, `fecha_registro`, `id_rol`) VALUES
(1, 'Andrés Gutiérrez Hurtado', 'andres52885241@gmail.com', 'AndresJajaa', 1111, '68 D SUR 70 C 31', 3209202177, 'USUARIOS_FOTOS/1.jpg', '2023-09-07 19:33:21', 1),
(2, 'Samuel Useche Chaparro', 'samuel@gmail.com', 'SamuUseche', 1111, 'El valle de la sierra', 3209207777, 'USUARIOS_FOTOS/2.jpg', '2023-09-07 20:59:42', 2),
(3, 'Alisson', 'alison@gmail.com', 'Alisson', 1111, 'Dirección', 3109999999, 'USUARIOS_FOTOS/3.jpg', '2023-10-03 19:33:21', 1);

-- Inserción de productos
INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion`, `precio`, `stock`, `imagen`) VALUES
(1, 'Lápiz labial rojo', 'Lápiz labial de color rojo intenso', 19000, 50, ''),
(2, 'Crema hidratante', 'Crema facial hidratante para pieles secas', 26000, 20, 'PRODUCTOS_FOTOS/2.jpg'),
(3, 'Base de maquillaje', 'Base de maquillaje de larga duración', 30000, 40, 'PRODUCTOS_FOTOS/3.jpg'),
(4, 'Máscara de pestañas', 'Máscara de pestañas resistente al agua', 19000, 20, 'PRODUCTOS_FOTOS/4.jpg'),
(5, 'Sombra de ojos', 'Sombra de ojos en tonos neutros', 13000, 70, 'PRODUCTOS_FOTOS/5.jpg'),
(6, 'Rubor en polvo', 'Rubor en polvo de color rosa', 15000, 30, 'PRODUCTOS_FOTOS/6.jpg'),
(7, 'Esmalte de uñas', 'Esmalte de uñas de secado rápido', 8000, 15, 'PRODUCTOS_FOTOS/7.jpg'),
(8, 'Desmaquillante', 'Desmaquillante suave para ojos y labios', 10000, 50, 'PRODUCTOS_FOTOS/8.jpg'),
(9, 'Perfume floral', 'Perfume con aroma a flores frescas', 45000, 30, 'PRODUCTOS_FOTOS/9.jpg'),
(10, 'Serum facial', 'Serum facial rejuvenecedor', 36000, 25, 'PRODUCTOS_FOTOS/10.jpg'),
(11, 'Bálsamo labial', 'Bálsamo labial hidratante', 6000, 57, 'PRODUCTOS_FOTOS/11.jpg'),
(12, 'Aceite de coco', 'Aceite de coco natural para el cabello', 23000, 10, 'PRODUCTOS_FOTOS/12.jpg'),
(13, 'Paleta de sombras de colores', 'Paleta de sombras con una amplia gama de colores', 28000, 15, 'PRODUCTOS_FOTOS/13.jpg'),
(14, 'Lápiz de cejas', 'Lápiz de cejas de larga duración', 12000, 40, 'PRODUCTOS_FOTOS/14.jpg'),
(15, 'Mascarilla facial de arcilla', 'Mascarilla facial purificante con arcilla natural', 18000, 25, 'PRODUCTOS_FOTOS/15.jpg'),
(16, 'Delineador de ojos líquido', 'Delineador de ojos con punta de precisión', 15000, 30, 'PRODUCTOS_FOTOS/16.jpg'),
(17, 'Brillo labial', 'Brillo labial con efecto voluminizador', 8000, 50, 'PRODUCTOS_FOTOS/17.jpg'),
(18, 'Loción corporal hidratante', 'Loción corporal para una piel suave y sedosa', 22000, 35, 'PRODUCTOS_FOTOS/18.jpg'),
(19, 'Esmalte de uñas de gel', 'Esmalte de uñas de larga duración con efecto de gel', 12000, 20, 'PRODUCTOS_FOTOS/19.jpg'),
(20, 'Aceite esencial de lavanda', 'Aceite esencial de lavanda para aromaterapia', 16000, 60, 'PRODUCTOS_FOTOS/20.jpg'),
(21, 'Máscara facial de colágeno', 'Máscara facial rejuvenecedora de colágeno', 14000, 45, 'PRODUCTOS_FOTOS/21.jpg'),
(22, 'Cepillo de maquillaje profesional', 'Cepillo de maquillaje de alta calidad', 25000, 10, 'PRODUCTOS_FOTOS/22.jpg'),
(23, 'Cremas de manos', 'Crema hidratante para manos secas', 9000, 60, 'PRODUCTOS_FOTOS/23.jpg'),
(24, 'Lápiz delineador de labios', 'Lápiz delineador de labios de larga duración', 11000, 40, 'PRODUCTOS_FOTOS/24.jpg'),
(25, 'Mascarilla capilar reparadora', 'Mascarilla capilar para cabello dañado', 19000, 20, 'PRODUCTOS_FOTOS/25.jpg'),
(26, 'Perfume de verano', 'Perfume con aroma a frutas tropicales', 48000, 15, 'PRODUCTOS_FOTOS/26.jpg'),
(27, 'Crema antiarrugas', 'Crema facial antiarrugas de alta calidad', 32000, 30, 'PRODUCTOS_FOTOS/27.jpg'),
(28, 'Esmalte de uñas mate', 'Esmalte de uñas con acabado mate', 10000, 25, 'PRODUCTOS_FOTOS/28.jpg'),
(29, 'Aceite de rosa mosqueta', 'Aceite de rosa mosqueta para cuidado de la piel', 15000, 50, 'PRODUCTOS_FOTOS/29.jpg');

-- Inserción de pedidos y sus detalles
INSERT INTO `pedidos` (`id_pedido`, `id_usuario`, `fecha_pedido`) VALUES
(1, 1, '2023-10-03');

INSERT INTO `detalle_pedidos` (`id_detalle`, `id_pedido`, `producto`, `cantidad`, `subtotal`) VALUES
(1, 1, 'Base de maquillaje', 1, 30000.00),
(2, 1, 'Máscara de pestañas', 2, 19000.00);

-- Se crean relaciones

ALTER TABLE `Usuarios`
ADD CONSTRAINT `fk_id_rol`
FOREIGN KEY (`id_rol`) REFERENCES `Roles`(`id_rol`)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE `Pedidos`
ADD CONSTRAINT `fk_id_usuario`
FOREIGN KEY (`id_usuario`) REFERENCES `Usuarios`(`id_usuario`)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE `detalle_pedidos`
ADD CONSTRAINT `fk_id_pedido`
FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`)
ON DELETE CASCADE
ON UPDATE CASCADE;
