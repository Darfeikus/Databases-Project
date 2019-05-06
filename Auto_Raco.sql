-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2019 at 06:47 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Auto_Raco`
--

-- --------------------------------------------------------

--
-- Table structure for table `Clientes`
--

CREATE TABLE `Clientes` (
  `id` int(11) NOT NULL,
  `clave` varchar(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Clientes`
--

INSERT INTO `Clientes` (`id`, `clave`, `nombre`, `direccion`, `telefono`) VALUES
(6, '132', 'Benjamin', 'dir2', '2147483647');

-- --------------------------------------------------------

--
-- Table structure for table `Compras`
--

CREATE TABLE `Compras` (
  `id` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Compras`
--

INSERT INTO `Compras` (`id`, `id_proveedor`, `fecha`) VALUES
(63, 3, '2019-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `DescuentosClientes`
--

CREATE TABLE `DescuentosClientes` (
  `id_cliente` int(11) NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `HistorialCompras`
--
-- Error reading structure for table Auto_Raco.HistorialCompras: #1932 - Table 'Auto_Raco.HistorialCompras' doesn't exist in engine
-- Error reading data for table Auto_Raco.HistorialCompras: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `Auto_Raco`.`HistorialCompras`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `HistorialVentas`
--

CREATE TABLE `HistorialVentas` (
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `precioPrevio` float NOT NULL,
  `porcentajeDescuento` int(11) NOT NULL,
  `precioNeto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `HistorialVentas`
--

INSERT INTO `HistorialVentas` (`id_venta`, `id_producto`, `precioPrevio`, `porcentajeDescuento`, `precioNeto`) VALUES
(4, 2, 400, 10, 360);

-- --------------------------------------------------------

--
-- Table structure for table `Productos`
--

CREATE TABLE `Productos` (
  `id` int(11) NOT NULL,
  `clave` varchar(11) NOT NULL,
  `descripcion` text NOT NULL,
  `costoPromedio` float NOT NULL,
  `costoUltimo` float NOT NULL,
  `ultimaCompra` date NOT NULL,
  `precioPromedio` float NOT NULL,
  `precioUltimo` float NOT NULL,
  `ultimaVenta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Productos`
--

INSERT INTO `Productos` (`id`, `clave`, `descripcion`, `costoPromedio`, `costoUltimo`, `ultimaCompra`, `precioPromedio`, `precioUltimo`, `ultimaVenta`) VALUES
(2, 'SH', 'Aceite', 256, 250, '2019-05-03', 123, 123, '2019-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `Proveedores`
--

CREATE TABLE `Proveedores` (
  `id` int(11) NOT NULL,
  `clave` varchar(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Proveedores`
--

INSERT INTO `Proveedores` (`id`, `clave`, `nombre`, `direccion`, `telefono`) VALUES
(3, 'XOD', 'Bimbo', 'dir', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `Ventas`
--

CREATE TABLE `Ventas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ventas`
--

INSERT INTO `Ventas` (`id`, `id_cliente`, `fecha`) VALUES
(4, 6, '2019-05-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Clientes`
--
ALTER TABLE `Clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clave` (`clave`),
  ADD UNIQUE KEY `telefono` (`telefono`);

--
-- Indexes for table `Compras`
--
ALTER TABLE `Compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Compra-Proveedor` (`id_proveedor`);

--
-- Indexes for table `DescuentosClientes`
--
ALTER TABLE `DescuentosClientes`
  ADD KEY `cliente-descuento` (`id_cliente`),
  ADD KEY `producto-descuento` (`id_producto`);

--
-- Indexes for table `HistorialVentas`
--
ALTER TABLE `HistorialVentas`
  ADD KEY `historial-venta` (`id_venta`),
  ADD KEY `historial-productoV` (`id_producto`);

--
-- Indexes for table `Productos`
--
ALTER TABLE `Productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clave` (`clave`);

--
-- Indexes for table `Proveedores`
--
ALTER TABLE `Proveedores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clave` (`clave`,`telefono`);

--
-- Indexes for table `Ventas`
--
ALTER TABLE `Ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Venta-Cliente` (`id_cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Clientes`
--
ALTER TABLE `Clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Compras`
--
ALTER TABLE `Compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `Productos`
--
ALTER TABLE `Productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Proveedores`
--
ALTER TABLE `Proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Ventas`
--
ALTER TABLE `Ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Compras`
--
ALTER TABLE `Compras`
  ADD CONSTRAINT `Compra-Proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `Proveedores` (`id`);

--
-- Constraints for table `DescuentosClientes`
--
ALTER TABLE `DescuentosClientes`
  ADD CONSTRAINT `cliente-descuento` FOREIGN KEY (`id_cliente`) REFERENCES `Clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto-descuento` FOREIGN KEY (`id_producto`) REFERENCES `Productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `HistorialVentas`
--
ALTER TABLE `HistorialVentas`
  ADD CONSTRAINT `historial-productoV` FOREIGN KEY (`id_producto`) REFERENCES `Productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historial-venta` FOREIGN KEY (`id_venta`) REFERENCES `Ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Ventas`
--
ALTER TABLE `Ventas`
  ADD CONSTRAINT `Venta-Cliente` FOREIGN KEY (`id_cliente`) REFERENCES `Clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
