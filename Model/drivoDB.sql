CREATE DATABASE IF NOT EXISTS `drivo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `drivo`;

-- --------------------------------------------------------
-- Tabla: clientes
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL UNIQUE,
  `passw` varchar(255) NOT NULL, -- 255 es ideal para guardar hashes como BCRYPT (password_hash de PHP)
  `email` varchar(100) NOT NULL UNIQUE,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `rol` enum('admin', 'cliente') NOT NULL DEFAULT 'cliente',
  `fecha_registro` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------
-- Tabla: flota
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `flota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(15) NOT NULL UNIQUE,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `motor` varchar(100) NOT NULL,
  `cambios` varchar(50) NOT NULL,
  `traccion` varchar(50) NOT NULL,
  `llantas` int(2) NOT NULL DEFAULT 17, 
  `anio` int(4) NOT NULL,
  `precio_dia` decimal(8,2) NOT NULL DEFAULT 0.00,
  `imagen` varchar(255) DEFAULT 'default.jpg', 
  `disponible` tinyint(1) NOT NULL DEFAULT 1, 
  `oferta` tinyint(1) NOT NULL DEFAULT 0, -- Novedad: 1 = en oferta, 0 = precio normal
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------
-- Tabla: reservas
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_vehiculo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL, 
  `fecha_reserva` timestamp DEFAULT CURRENT_TIMESTAMP,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `sancion_km` decimal(8,2) NOT NULL DEFAULT 0.00,
  `sancion_tiempo` decimal(8,2) NOT NULL DEFAULT 0.00,
  `precio_total` decimal(10,2) NOT NULL,
  `estado` enum('Pendiente', 'Activa', 'Finalizada', 'Cancelada') NOT NULL DEFAULT 'Pendiente',
  PRIMARY KEY (`id`),
  KEY `idx_vehiculo` (`id_vehiculo`),
  KEY `idx_cliente` (`id_cliente`),
  CONSTRAINT `fk_reserva_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT `fk_reserva_vehiculo` FOREIGN KEY (`id_vehiculo`) REFERENCES `flota` (`id`) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------
-- DATOS DE EJEMPLO (Mock Data)
-- --------------------------------------------------------

-- 1. Clientes (La contraseña es '1234' encriptada con BCRYPT, ideal para usar password_verify() en PHP)
INSERT INTO `clientes` (`usuario`, `passw`, `email`, `nombre`, `apellidos`, `rol`) VALUES
('admin', '$2y$10$Y1/YgO.5B/5Xf2v2L7aOVeS3o/H1R5J8tLgA91hL4rM/w9bVn28eO', 'admin@drivo.es', 'Admin', 'Principal', 'admin'),
('alumno', '$2y$10$Y1/YgO.5B/5Xf2v2L7aOVeS3o/H1R5J8tLgA91hL4rM/w9bVn28eO', 'alumno@drivo.es', 'Estudiante', 'DAW', 'cliente');

-- 2. Vehículos
INSERT INTO `flota` (`matricula`, `marca`, `modelo`, `motor`, `cambios`, `traccion`, `llantas`, `anio`, `precio_dia`, `imagen`, `oferta`) VALUES
('1111-AAA', 'Audi', 'A4', 'Gasolina 2.0 TFSI 197cv', 'Automática', 'a las 4 ruedas', 19, 2019, 75.00, 'audi_a4.avif', 1),
('2222-BBB', 'Porsche', 'Cayenne', 'Gasolina V6 Biturbo 500cv', 'Automática', 'a las 4 ruedas', 21, 2023, 145.00, 'porsche_cayenne.avif', 1),
('3333-CCC', 'Volkswagen', 'Tiguan', 'Diésel 2.0 TDI 150cv', 'Automática', 'a las 4 ruedas', 19, 2018, 115.00, 'vw_tiguan.avif', 1),
('4444-DDD', 'Volkswagen', 'Golf', 'Gasolina 2.0 TFSI 241cv', 'Automática', 'a las 4 ruedas', 19, 2025, 99.00, 'vw_golf.avif', 1),
('5555-EEE', 'Ford', 'Explorer', 'Gasolina 2.3 EcoBoost 300cv', 'Automática', 'a las 4 ruedas', 19, 2025, 69.00, 'ford_explorer.avif', 1),
('6666-FFF', 'Mazda', 'CX-5', 'Gasolina 2.0 165cv', 'Manual 6v', 'Delantera', 19, 2021, 55.00, 'mazda_cx5.avif', 1),
('7777-GGG', 'Renault', 'Arkana', 'E-TECH Híbrido 140 CV', 'Automática', 'Delantera', 18, 2021, 65.00, 'renault_arkana.avif', 0),
('8888-HHH', 'Peugeot', '3008', 'Diésel 1.5 BlueHDi 130cv', 'Automática', 'Delantera', 18, 2022, 35.00, 'peugeot_3008.avif', 0),
('9999-JJJ', 'Citroën', 'C3', 'Gasolina 1.2 PureTech 82cv', 'Manual 6v', 'Delantera', 17, 2020, 29.00, 'citroen_c3.avif', 0);

-- 3. Reservas (Se hace una reserva de prueba para el alumno con el Mazda CX-5)
INSERT INTO `reservas` (`id_vehiculo`, `id_cliente`, `fecha_inicio`, `fecha_fin`, `precio_total`, `estado`) VALUES
(6, 2, CURDATE(), DATE_ADD(CURDATE(), INTERVAL 3 DAY), 165.00, 'Activa');