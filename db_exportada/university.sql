-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2023 a las 06:03:43
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `university`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `alumnosinscritosporid` (IN `id_maestro` INT)   BEGIN
  select c.nombre , ac.alumno_id, u.nombres ,u.apellidos 
from clases_maestros cm  
inner join clases c on cm.clase_id = c.id 
inner join alumnos_clases ac on ac.clase_id = c.id
inner join usuarios u on u.id  = ac.alumno_id
where cm.maestro_id = id_maestro;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUsuarioInfoByEmail` (IN `userEmail` VARCHAR(255))   BEGIN
    SELECT u.*, r.id as rol_id , r.nombre
    FROM usuarios u
    INNER JOIN roles r ON r.id = u.rol_id
	WHERE u.email = userEmail;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `materiasdealumnosporid` (IN `id_alumno` INT)   BEGIN
  select ac.* , c.id as id_clase , c.nombre
from alumnos_clases ac 
inner join clases c on ac.clase_id = c.id 
where ac.alumno_id = id_alumno;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerClaseConMaestroYAlumnosId` (IN `clase_id` INT)   BEGIN
    SELECT c.id AS clase_id, c.nombre AS nombre_clase,
           u.nombres AS nombre_maestro,
           
          
COUNT(ac.alumno_id) AS total_alumnos
    FROM clases c
    
   
LEFT JOIN clases_maestros cm ON c.id = cm.clase_id
    LEFT JOIN usuarios u ON cm.maestro_id = u.id
    
   
LEFT JOIN alumnos_clases ac ON c.id = ac.clase_id
    WHERE c.id = clase_id
    GROUP BY c.id, c.nombre, u.nombres;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerClasesConMaestrosYAlumnos` ()   BEGIN
    SELECT c.id AS clase_id, c.nombre AS nombre_clase,
           u.nombres AS nombre_maestro,
           COUNT(ac.alumno_id) AS total_alumnos
    FROM clases c
    LEFT JOIN clases_maestros cm ON c.id = cm.clase_id
    LEFT JOIN usuarios u ON cm.maestro_id = u.id
    LEFT JOIN alumnos_clases ac ON c.id = ac.clase_id
    GROUP BY c.id, c.nombre, u.nombres;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_maestro_clase` ()   BEGIN
    SELECT cm.maestro_id, c.id AS clase_id, c.nombre AS nombre_clase, u.nombres, u.apellidos, u.email, u.direccion, u.nacimiento
    FROM clases_maestros cm
    
   
INNER JOIN clases c ON cm.clase_id = c.id
    INNER JOIN usuarios u ON cm.maestro_id = u.id
    WHERE cm.maestro_id = maestro_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_maestro_claseid` (IN `maestro_id` INT)   BEGIN
    SELECT cm.maestro_id, c.id AS clase_id, c.nombre AS nombre_clase, u.nombres, u.apellidos, u.email, u.direccion, u.nacimiento
    FROM clases_maestros cm
    INNER JOIN clases c ON cm.clase_id = c.id
    INNER JOIN usuarios u ON cm.maestro_id = u.id
    WHERE cm.maestro_id = maestro_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `usuariopermiso` ()   begin
SELECT u.id, u.email, u.active, r.nombre
FROM usuarios u
INNER JOIN roles r ON r.id = u.rol_id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `usuariopermisoid` (IN `usuario_id` INT)   BEGIN
    SELECT u.id, u.email, u.active, r.nombre, r.id as role_id
    FROM usuarios u
    INNER JOIN roles r ON r.id = u.rol_id
    WHERE u.id = usuario_id;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_clases`
--

CREATE TABLE `alumnos_clases` (
  `id` int(11) NOT NULL,
  `alumno_id` int(11) DEFAULT NULL,
  `clase_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos_clases`
--

INSERT INTO `alumnos_clases` (`id`, `alumno_id`, `clase_id`) VALUES
(39, 77, 3),
(41, 77, 1),
(42, 77, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id`, `nombre`) VALUES
(1, 'Matematicas'),
(3, 'Quimica'),
(6, 'Sociales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases_maestros`
--

CREATE TABLE `clases_maestros` (
  `id` int(11) NOT NULL,
  `clase_id` int(11) DEFAULT NULL,
  `maestro_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clases_maestros`
--

INSERT INTO `clases_maestros` (`id`, `clase_id`, `maestro_id`) VALUES
(19, 3, 78);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Admin'),
(2, 'Maestro'),
(3, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombres` varchar(250) DEFAULT NULL,
  `apellidos` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `contrasena` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombres`, `apellidos`, `email`, `contrasena`, `direccion`, `nacimiento`, `rol_id`, `active`) VALUES
(2, 0, 'Jean Pierre', 'Ramos Gomez', 'admin@admin', '$2y$10$TmiLq0g4x4Euj.Im.PqTDe1y5WaIcGj0w6AJa3j6lfbAfDM9gOcLC', 'Embudo', '1996-06-28', 1, 1),
(76, 0, 'Quaerat eaque non co', 'Nulla dolore tempor ', 'tejucotut@mailinator.com', '$2y$10$yTDzq5n1iNWTYZKObP3vjOJ9DUoGiHgUnptO0qCPjTUlQ.RGyHVqe', 'Obcaecati est elige', '2001-06-08', 2, 1),
(77, 123456, 'Jean Pierre', 'Ramos Gomez', 'jampis9@hotmail.com', '$2y$10$HbJVZBDP68hYuCGeaghPzunzTEZul8e/aJHpF18RC1f2uEnUK/.Au', 'Barrio Regocijo', '2023-10-30', 3, 1),
(78, 0, 'Voluptatem laborios', 'Ut et pariatur Impe', 'jota@jota', '$2y$10$auoWWITejU54uNJzBFJOOOMLafRMtSou4ZNYz/FBhxTSmpGlNB3aK', 'Rerum pariatur Proi', '2005-04-03', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos_clases`
--
ALTER TABLE `alumnos_clases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno_id` (`alumno_id`),
  ADD KEY `clase_id` (`clase_id`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clases_maestros`
--
ALTER TABLE `clases_maestros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clase_id` (`clase_id`),
  ADD KEY `maestro_id` (`maestro_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos_clases`
--
ALTER TABLE `alumnos_clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clases_maestros`
--
ALTER TABLE `clases_maestros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos_clases`
--
ALTER TABLE `alumnos_clases`
  ADD CONSTRAINT `alumnos_clases_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `alumnos_clases_ibfk_2` FOREIGN KEY (`clase_id`) REFERENCES `clases` (`id`);

--
-- Filtros para la tabla `clases_maestros`
--
ALTER TABLE `clases_maestros`
  ADD CONSTRAINT `clases_maestros_ibfk_1` FOREIGN KEY (`clase_id`) REFERENCES `clases` (`id`),
  ADD CONSTRAINT `clases_maestros_ibfk_2` FOREIGN KEY (`maestro_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
