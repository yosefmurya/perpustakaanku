-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 26. Oktober 2010 jam 18:52
-- Versi Server: 5.1.30
-- Versi PHP: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_media`
--

CREATE TABLE IF NOT EXISTS `jenis_media` (
  `id_jenis_media` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(30) NOT NULL,
  PRIMARY KEY (`id_jenis_media`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `jenis_media`
--

INSERT INTO `jenis_media` (`id_jenis_media`, `nama_jenis`) VALUES
(1, 'Buku'),
(2, 'Majalah'),
(3, 'Microfilm'),
(4, 'CD'),
(5, 'VCD'),
(6, 'DVD'),
(7, 'DVD Windows'),
(8, 'DVD Mac OSX'),
(9, 'Koran'),
(10, 'Tabloid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(300) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `id_jenis_media` int(11) NOT NULL,
  PRIMARY KEY (`id_media`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `media`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `media_isbn`
--

CREATE TABLE IF NOT EXISTS `media_isbn` (
  `id_media_isbn` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(30) NOT NULL,
  `id_media` int(11) NOT NULL,
  `id_penulis` int(11) NOT NULL,
  PRIMARY KEY (`id_media_isbn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `media_isbn`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `media_stok_info`
--

CREATE TABLE IF NOT EXISTS `media_stok_info` (
  `id_media_stok_info` int(11) NOT NULL AUTO_INCREMENT,
  `id_media` int(11) NOT NULL,
  `tahun_pembelian` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_media_stok_info`),
  KEY `id_media` (`id_media`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `media_stok_info`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE IF NOT EXISTS `penerbit` (
  `id_penerbit` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penerbit` varchar(300) NOT NULL,
  `alamat_penerbit` varchar(300) NOT NULL,
  PRIMARY KEY (`id_penerbit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `penerbit`
--

