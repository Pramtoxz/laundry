/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.24-MariaDB : Database - laundry
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `detail_transaksi` */

DROP TABLE IF EXISTS `detail_transaksi`;

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nofak_detail` varchar(20) DEFAULT NULL,
  `kode_detail` varchar(30) DEFAULT NULL,
  `berat_detail` int(11) DEFAULT NULL,
  `harga_detail` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `detail_transaksi` */

insert  into `detail_transaksi`(`id`,`nofak_detail`,`kode_detail`,`berat_detail`,`harga_detail`) values (1,'20220824090619','A001',2,7000),(2,'20220824090619','A003',4,15000),(3,'20220824090746','A002',4,9000),(4,'20220824090746','A003',2,15000),(21,'20220917035932','A002',4,9000),(22,'20220917044119','A002',3,9000),(23,'20220917044119','A003',2,15000),(24,'20220917044243','A001',1,30000),(25,'20220917044355','A001',2,30000);

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kodekaryawan` varchar(50) NOT NULL,
  `namakaryawan` varchar(20) DEFAULT NULL,
  `alamatkaryawan` varchar(30) DEFAULT NULL,
  `notelpkaryawan` varchar(20) DEFAULT NULL,
  `jeniskelamin` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `karyawan` */

insert  into `karyawan`(`id`,`kodekaryawan`,`namakaryawan`,`alamatkaryawan`,`notelpkaryawan`,`jeniskelamin`) values (4,'KR01','Yora','PADANG','081234122346','Laki-Laki'),(5,'KR02','monic','PADANG','089898787865','Laki-Laki'),(6,'KR03','Sintia','padang','085646645481','Perempuan');

/*Table structure for table `konsumen` */

DROP TABLE IF EXISTS `konsumen`;

CREATE TABLE `konsumen` (
  `kodekonsumen` char(20) NOT NULL,
  `namakonsumen` varchar(30) DEFAULT NULL,
  `alamatkonsumen` varchar(40) DEFAULT NULL,
  `notelpkonsumen` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kodekonsumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `konsumen` */

insert  into `konsumen`(`kodekonsumen`,`namakonsumen`,`alamatkonsumen`,`notelpkonsumen`) values ('K01','yaya','Lubuk Tarok','081234563554'),('K02','dancur','Lubuk Tarok','081234563554'),('K03','yora','basuong','084362789098'),('K04','ani','padang','081234563554'),('K05','suci','sijunjung','0986755342');

/*Table structure for table `leveluser` */

DROP TABLE IF EXISTS `leveluser`;

CREATE TABLE `leveluser` (
  `id` int(11) NOT NULL,
  `level` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `leveluser` */

insert  into `leveluser`(`id`,`level`) values (1,'pimpinan'),(2,'kasir');

/*Table structure for table `tbl_kategori` */

DROP TABLE IF EXISTS `tbl_kategori`;

CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_kategori` */

insert  into `tbl_kategori`(`id`,`kode`,`nama`,`jenis`,`harga`) values (1,'A001','Baju','exspres',30000),(2,'A002','Celana','ekonomi',9000),(3,'A003','Selimut','ekonomi',15000),(6,'A-004','Celana Levis','ekonimi',7000);

/*Table structure for table `temp` */

DROP TABLE IF EXISTS `temp`;

CREATE TABLE `temp` (
  `kdtemp` varchar(20) NOT NULL,
  `namatemp` varchar(50) NOT NULL,
  `jenistemp` varchar(50) NOT NULL,
  `hargatemp` int(11) DEFAULT NULL,
  `berattemp` int(11) DEFAULT NULL,
  PRIMARY KEY (`kdtemp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `temp` */

insert  into `temp`(`kdtemp`,`namatemp`,`jenistemp`,`hargatemp`,`berattemp`) values ('A001','Baju','exspres',30000,2);

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `idtransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `notransaksi` varchar(15) DEFAULT NULL,
  `tanggaltransaksi` date DEFAULT NULL,
  `kdkonsumen_transaksi` char(20) DEFAULT NULL,
  `tanggalselesai` date DEFAULT NULL,
  `status` enum('1','2','3') DEFAULT NULL,
  PRIMARY KEY (`idtransaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`idtransaksi`,`notransaksi`,`tanggaltransaksi`,`kdkonsumen_transaksi`,`tanggalselesai`,`status`) values (1,'20220824090619','2023-07-12','K03','2023-07-12','3'),(2,'20220824090619','2023-07-12','K03','2023-07-12','1'),(3,'20220824090619','2023-07-12','K03','2023-07-12','1'),(4,'20220824090746','2023-07-12','K03','2023-07-12','1'),(26,'20220917044119','2023-07-12','','2023-07-12','1'),(27,'20220917044243','2023-07-12','K03','2023-07-12','1');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `namauser` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`iduser`,`namauser`,`username`,`password`,`level`) values (5,'dito','kasir1','$2y$10$p57QViTi83UYGSHKCE.ii.CrJ47Zw31ipCVQ8iAWqRSa55K7kdCNG',2),(6,'dini','admin','$2y$10$PtP5N/Hx887ogHWSbyF84eYUd3C44yDhUi22Y7mPGoBYwHOJAFDy6',1),(7,'tiwi','kasir2','$2y$10$PtP5N/Hx887ogHWSbyF84eYUd3C44yDhUi22Y7mPGoBYwHOJAFDy6',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
