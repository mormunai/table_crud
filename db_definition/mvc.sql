-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-02-2014 a las 00:21:26
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mvc`
--
CREATE DATABASE IF NOT EXISTS `mvc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mvc`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mvc_libros`
--

CREATE TABLE IF NOT EXISTS `mvc_libros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `genero` varchar(60) NOT NULL,
  `precio` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `mvc_libros`
--

INSERT INTO `mvc_libros` (`id`, `titulo`, `autor`, `fecha_lanzamiento`, `genero`, `precio`) VALUES
(1, 'Los juegos del hambre', 'Suzanne Collins', '2008-09-14', 'Novela de aventura y ciencia ficción', '15.95'),
(2, 'Los pilares de la Tierra', 'Ken Follett', '1989-03-24', 'Novela histórica', '23.15'),
(3, 'El nombre del viento', 'Patrick Rothfuss', '2007-03-27', 'Novela de fantasía épica', '37.90'),
(4, 'Harry Potter y la piedra filosofal', 'J. K. Rowling', '1997-06-30', 'Bloomsbury', '19.90');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
