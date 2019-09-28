-- phpMyAdmin SQL Dump
-- version 4.1.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2017 at 06:39 PM
-- Server version: 5.1.67-andiunpam
-- PHP Version: 5.6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aluguel`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--
CREATE TABLE `periodo` (
    `nome` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `tipo_carro` (
    `id` int(99) NOT NULL AUTO_INCREMENT,
    `nome` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `carro` (
    `id` int(99) NOT NULL AUTO_INCREMENT,
    `nome` varchar(50) NOT NULL,
    `id_tipo`int(99) NOT NULL,
    CONSTRAINT fk_carro_tipo FOREIGN KEY (id_tipo) REFERENCES tipo_carro (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `pacote` (
    `id` int(99) NOT NULL AUTO_INCREMENT,
    `nome` varchar(50) NOT NULL,
    `valor` varchar(50) NOT NULL,
    `id_tipo` int(99) NOT NULL,
    `periodo` varchar(250) NOT NULL,
    CONSTRAINT fk_pacote_tipo FOREIGN KEY (id_tipo) REFERENCES tipo_carro (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `pacote_cliente` (
    `id` int(99) NOT NULL AUTO_INCREMENT,
    `id_pacote` int(99) NOT NULL,
    `id_cliente` int(99) NOT NULL,
    `id_carro` int(99) NOT NULL,
    CONSTRAINT fk_pacote_cliente FOREIGN KEY (id_cliente) REFERENCES cliente (id),
    CONSTRAINT fk_pacote_pacote FOREIGN KEY (id_pacote) REFERENCES pacote (id),
    CONSTRAINT fk_pacote_carro FOREIGN KEY (id_carro) REFERENCES carro (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE `cliente` (
    `id` int(99) NOT NULL AUTO_INCREMENT,
    `nome` varchar(50) NOT NULL,
    `email` varchar(25) NOT NULL,
    `cpf` varchar(11) NOT NULL,
    `telefone` varchar(11) NOT NULL,
    `id_pacote` int(99) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

insert into periodo
    VALUES
        ('1 dia'),
        ('2 dias'),
        ('3 dias'),
        ('5 dias'),
        ('1 semana'),
        ('2 semanas'),
        ('1 mês');