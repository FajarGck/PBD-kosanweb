/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.22-MariaDB : Database - kost_23sa31a065
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kost_23sa31a065` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `kost_23sa31a065`;

/*Table structure for table `kamar` */

DROP TABLE IF EXISTS `kamar`;

CREATE TABLE `kamar` (
  `IdKamar` varchar(255) NOT NULL,
  `NamaKamar` varchar(255) DEFAULT NULL,
  `JenisKamar` enum('tipeA','tipeB') DEFAULT NULL,
  `Fasilitas` varchar(255) DEFAULT NULL,
  `HargaBulanan` int(11) DEFAULT NULL,
  `ketersediaan` enum('disewa','belum disewa') DEFAULT NULL,
  PRIMARY KEY (`IdKamar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kamar` */

insert  into `kamar`(`IdKamar`,`NamaKamar`,`JenisKamar`,`Fasilitas`,`HargaBulanan`,`ketersediaan`) values 
('kmr-1','kmr-1A','tipeA','wifi, kamar mandi dalam, dapur',850000,'disewa'),
('kmr-10','kmr-5B','tipeB','wifi, kamar mandi luar',600000,'belum disewa'),
('kmr-2','kmr-2A','tipeA','wifi, kamar mandi dalam, dapur',850000,'disewa'),
('kmr-3','kmr-3A','tipeA','wifi, kamar mandi dalam, dapur',850000,'disewa'),
('kmr-4','kmr-1B','tipeB','wifi, kamar mandi luar',600000,'disewa'),
('kmr-5','kmr-2B','tipeB','wifi, kamar mandi luar',600000,'belum disewa'),
('kmr-6','kmr-4A','tipeA','wifi, kamar mandi dalam, dapur',850000,'disewa'),
('kmr-7','kmr-5A','tipeA','wifi, kamar mandi dalam, dapur',850000,'disewa'),
('kmr-8','kmr-6A','tipeA','wifi, kamar mandi dalam, dapur',850000,'belum disewa'),
('kmr-9','kmr-4B','tipeB','wifi, kamar mandi luar',600000,'disewa');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `IdPembayaran` varchar(255) NOT NULL,
  `IdPenghuni` varchar(255) DEFAULT NULL,
  `IdPengelola` varchar(255) DEFAULT NULL,
  `TanggalPembayaran` date DEFAULT NULL,
  `JumlahPembayaran` int(11) DEFAULT NULL,
  `MetodePembayaran` enum('ewallet','cash') DEFAULT NULL,
  `Catatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IdPembayaran`),
  KEY `IdPenghuni` (`IdPenghuni`),
  KEY `IdPengelola` (`IdPengelola`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`IdPenghuni`) REFERENCES `penghuni` (`IdPenghuni`),
  CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`IdPengelola`) REFERENCES `pengelola` (`IdPengelola`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`IdPembayaran`,`IdPenghuni`,`IdPengelola`,`TanggalPembayaran`,`JumlahPembayaran`,`MetodePembayaran`,`Catatan`) values 
('byr-1','ph-1','p-2','2024-01-09',850000,'cash','Diberikan ke pak samsul'),
('byr-2','ph-2','p-2','2024-01-04',850000,'ewallet','Diberikan ke pak samsul'),
('byr-3','ph-3','p-1','2024-02-19',850000,'ewallet','Diberikan ke pak yono'),
('byr-4','ph-4','p-1','2024-02-09',600000,'cash','Diberikan ke pak yono'),
('byr-5','ph-5','p-1','2024-01-09',850000,'cash','Diberikan ke pak yono'),
('byr-6','ph-6','p-2','2024-02-09',850000,'ewallet','Diberikan ke pak samsul'),
('byr-7','ph-7','p-1','2024-02-02',300000,'cash','Bayar setengah dulu');

/*Table structure for table `pengelola` */

DROP TABLE IF EXISTS `pengelola`;

CREATE TABLE `pengelola` (
  `IdPengelola` varchar(255) NOT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `Jabatan` varchar(255) DEFAULT NULL,
  `NomorTelepon` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`IdPengelola`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengelola` */

insert  into `pengelola`(`IdPengelola`,`Nama`,`Jabatan`,`NomorTelepon`) values 
('p-1','yono','Pemilik','085123456789'),
('p-2','samsul','wakil pemilik','085123456788'),
('p-3','siti','Pengurus','085123456787'),
('p-4','surti','Pengurus','085123456786'),
('p-5','asep','Satpam','085123456785');

/*Table structure for table `penghuni` */

DROP TABLE IF EXISTS `penghuni`;

CREATE TABLE `penghuni` (
  `IdPenghuni` varchar(255) NOT NULL,
  `NamaPenghuni` varchar(255) DEFAULT NULL,
  `JenisKelamin` enum('pria','perempuan') DEFAULT NULL,
  `TanggalMasuk` date DEFAULT NULL,
  `IdKamar` varchar(255) DEFAULT NULL,
  `TanggalKeluar` date DEFAULT NULL,
  PRIMARY KEY (`IdPenghuni`),
  KEY `IdKamar` (`IdKamar`),
  CONSTRAINT `penghuni_ibfk_1` FOREIGN KEY (`IdKamar`) REFERENCES `kamar` (`IdKamar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `penghuni` */

insert  into `penghuni`(`IdPenghuni`,`NamaPenghuni`,`JenisKelamin`,`TanggalMasuk`,`IdKamar`,`TanggalKeluar`) values 
('ph-1','Sandika','pria','2024-01-10','kmr-4','2024-02-10'),
('ph-2','Riska','perempuan','2024-01-05','kmr-1','2024-02-05'),
('ph-3','Santi','perempuan','2024-02-20','kmr-2','2024-03-20'),
('ph-4','Fulan','pria','2024-02-10','kmr-3','2024-02-10'),
('ph-5','John','pria','2024-01-10','kmr-6','2024-02-10'),
('ph-6','Angel','perempuan','2024-02-10','kmr-7','2024-03-10'),
('ph-7','Supri','pria','2024-02-01','kmr-9','2024-03-01');

/* Trigger structure for table `pengelola` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `t_update` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `t_update` BEFORE UPDATE ON `pengelola` FOR EACH ROW BEGIN
IF NEW.Jabatan = 'Pemilik' THEN
SIGNAL SQLSTATE '10001' SET MESSAGE_TEXT = 'TIDAK BOLEH ADA YANG NAIK JABATAN JADI PEMILIK!';
END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `penghuni` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `T4` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `T4` BEFORE INSERT ON `penghuni` FOR EACH ROW 
BEGIN
declare ckamar varchar(10);
SELECT ketersediaan INTO ckamar FROM kamar WHERE IdKamar = NEW.IdKamar;
IF ckamar='disewa' THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'kamar telah disewa';
END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `penghuni` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `t_cekKamar` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `t_cekKamar` BEFORE INSERT ON `penghuni` FOR EACH ROW 
BEGIN
declare ckamar varchar(10);
SELECT ketersediaan INTO ckamar FROM kamar WHERE IdKamar = NEW.IdKamar;
IF ckamar='disewa' THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'kamar telah disewa';
END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `penghuni` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `t_ceckIn` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `t_ceckIn` AFTER INSERT ON `penghuni` FOR EACH ROW 
BEGIN
UPDATE kamar SET ketersediaan = 'disewa' WHERE IdKamar = NEW.IdKamar;
END */$$


DELIMITER ;

/* Trigger structure for table `penghuni` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `t_hapus` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `t_hapus` AFTER DELETE ON `penghuni` FOR EACH ROW BEGIN
update kamar set ketersediaan='belum disewa'
where IdKamar=OLD.IdKamar;
END */$$


DELIMITER ;

/* Function  structure for function  `Data_Penghuni` */

/*!50003 DROP FUNCTION IF EXISTS `Data_Penghuni` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `Data_Penghuni`(bulan VARCHAR(10)) RETURNS int(11)
BEGIN 
DECLARE orang INT;
SELECT count(*) INTO orang FROM penghuni 
WHERE MONTHNAME(TanggalMasuk) = bulan;
RETURN orang;
END */$$
DELIMITER ;

/* Function  structure for function  `pemasukan` */

/*!50003 DROP FUNCTION IF EXISTS `pemasukan` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `pemasukan`(bulan varchar(10)) RETURNS int(11)
begin 
declare pemasukan int;
select sum(JumlahPembayaran) into pemasukan from pembayaran 
where MONTHNAME(TanggalPembayaran) = bulan;
return pemasukan;
end */$$
DELIMITER ;

/* Function  structure for function  `Pembayaran_Cash` */

/*!50003 DROP FUNCTION IF EXISTS `Pembayaran_Cash` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `Pembayaran_Cash`(method varchar (5)) RETURNS int(11)
begin 
declare databayar int;
select count(*) into databayar from pembayaran where MetodePembayaran= method;
return databayar;
end */$$
DELIMITER ;

/* Procedure structure for procedure `cariGenap` */

/*!50003 DROP PROCEDURE IF EXISTS  `cariGenap` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `cariGenap`(batas int)
BEGIN
   DECLARE i INT;
   DECLARE hasil VARCHAR(30) DEFAULT '';
   SET i = 0;
   REPEAT
	IF MOD(i, 2) = 0 THEN
	SET hasil = CONCAT(hasil, i, ',');
	END IF;
	SET i = i + 1;
   UNTIL i > batas END REPEAT;
   SELECT hasil;
 END */$$
DELIMITER ;

/* Procedure structure for procedure `c_cariPenghuni` */

/*!50003 DROP PROCEDURE IF EXISTS  `c_cariPenghuni` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `c_cariPenghuni`(id varchar(10))
BEGIN
 declare nama varchar(50);
 declare kamar varchar(10);
 declare c3 cursor for
  select NamaPenghuni, IdKamar from penghuni
  where IdPenghuni = id;
  
  declare exit handler for 1329
  begin
   select concat('data penghuni dengan', id, 'tak ditemukan') as messsage;
  end;
  
  open c3;
  fetch c3 into nama,kamar;
  select nama,kamar;
  close c3;
  end */$$
DELIMITER ;

/* Procedure structure for procedure `c_namaPenghuni` */

/*!50003 DROP PROCEDURE IF EXISTS  `c_namaPenghuni` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `c_namaPenghuni`()
begin 
declare nama varchar(50);
declare exit_loop boolean;
declare c1 cursor for
 select NamaPenghuni from penghuni
 where NamaPenghuni like 's%';
 
declare continue handler for not found set exit_loop = true;

open c1;

ulang: loop
 fetch c1 into nama;
  SELECT NamaPenghuni as 'Nama penghuni dimulai dari S' FROM penghuni
  WHERE NamaPenghuni LIKE 's%';
  
  if exit_loop then
   close c1;
   leave ulang;
  end if;
 end loop ulang;
end */$$
DELIMITER ;

/* Procedure structure for procedure `c_pembayaran` */

/*!50003 DROP PROCEDURE IF EXISTS  `c_pembayaran` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `c_pembayaran`()
BEGIN 
DECLARE id VARCHAR(10);
DECLARE exit_loop BOOLEAN;
DECLARE c2 CURSOR FOR
 SELECT IdPenghuni FROM pembayaran
 WHERE JumlahPembayaran between 600000 and 850000;
 
DECLARE CONTINUE HANDLER FOR NOT FOUND SET exit_loop = TRUE;

OPEN c2;

ulang: LOOP
 FETCH c2 INTO id;
  SELECT IdPenghuni FROM pembayaran
  WHERE JumlahPembayaran BETWEEN 600000 AND 850000;
  
  IF exit_loop THEN
   CLOSE c2;
   LEAVE ulang;
  END IF;
 END LOOP ulang;
END */$$
DELIMITER ;

/* Procedure structure for procedure `c_penghuniKamar` */

/*!50003 DROP PROCEDURE IF EXISTS  `c_penghuniKamar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `c_penghuniKamar`()
begin
 declare namaKamar varchar(10);
 declare jenisKamar varchar(10);
 declare namaPenghuni varchar(10);
 declare kelamin varchar(10);
 declare exit_loop boolean;
 declare cur cursor for
  SELECT penghuni.NamaPenghuni, penghuni.JenisKelamin, kamar.NamaKamar, kamar.JenisKamar
FROM penghuni INNER JOIN kamar
ON penghuni.IdKamar = kamar.IdKamar;

  
 declare continue handler for not found set exit_loop = true;
 
 open cur;
 mulai: loop
  fetch cur into namaKamar, jenisKamar, namaPenghuni, kelamin;
  SELECT penghuni.NamaPenghuni, penghuni.JenisKelamin, kamar.NamaKamar, kamar.JenisKamar
FROM penghuni INNER JOIN kamar
ON penghuni.IdKamar = kamar.IdKamar;
  
  if exit_loop then 
   close cur;
   leave mulai;
  end if;
 end loop mulai;
 end */$$
DELIMITER ;

/* Procedure structure for procedure `Edit_Pengelola` */

/*!50003 DROP PROCEDURE IF EXISTS  `Edit_Pengelola` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Edit_Pengelola`(nama varchar(50), pangkat varchar(50))
BEGIN 
update pengelola set Jabatan = pangkat
where Nama = nama;
END */$$
DELIMITER ;

/* Procedure structure for procedure `ganjil` */

/*!50003 DROP PROCEDURE IF EXISTS  `ganjil` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ganjil`(batas int)
begin
  declare i int;
  declare hasil varchar(30) default '';
  set i = 1;
  repeat 
	if mod(i, 2) != 0 then
	   set hasil = concat(hasil, i, ',');
	end if;
	set i = i + 1;
  until i > batas 
  end repeat;
  select hasil;
end */$$
DELIMITER ;

/* Procedure structure for procedure `Hapus_Kamar` */

/*!50003 DROP PROCEDURE IF EXISTS  `Hapus_Kamar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Hapus_Kamar`(nama VARCHAR(50))
BEGIN 
delete from kamar where NamaKamar = nama;
END */$$
DELIMITER ;

/* Procedure structure for procedure `jumlah_Kamar` */

/*!50003 DROP PROCEDURE IF EXISTS  `jumlah_Kamar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlah_Kamar`(out hasil int)
begin 
select count(*) into hasil from kamar;
end */$$
DELIMITER ;

/* Procedure structure for procedure `Jumlah_Penghuni` */

/*!50003 DROP PROCEDURE IF EXISTS  `Jumlah_Penghuni` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Jumlah_Penghuni`(out hasil int)
begin 
select count(*) into hasil from kamar;
end */$$
DELIMITER ;

/* Procedure structure for procedure `kelipatan` */

/*!50003 DROP PROCEDURE IF EXISTS  `kelipatan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `kelipatan`(batas int)
begin 
   declare i int;
   declare hasil varchar(30) default '';
   set i = 0;
   while i <= batas do
	    if i % 5 = 0 then
	    set hasil = concat(hasil, i, ',');
	    end if ;
	    set i = i + 1;
   end while ;
   select hasil;
  end */$$
DELIMITER ;

/* Procedure structure for procedure `kelipatanLima` */

/*!50003 DROP PROCEDURE IF EXISTS  `kelipatanLima` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `kelipatanLima`(batas int)
begin 
   declare i int;
   declare hasil varchar(30) default '';
   set i = 1;
   while i <= batas do
	    if mod(i, 5) = 0 then
	    set hasil = concat(hasil, i, ',');
	    end if ;
	    set i = i + 1;
   end while ;
   select hasil;
  end */$$
DELIMITER ;

/* Procedure structure for procedure `tambah_Kamar` */

/*!50003 DROP PROCEDURE IF EXISTS  `tambah_Kamar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_Kamar`(id varchar(10), nama varchar(10), jenis varchar(10), 
fasility varchar(50), harga int)
begin 
insert into kamar values 
(id, nama, jenis, fasility, harga);
select * from kamar;
end */$$
DELIMITER ;

/* Procedure structure for procedure `TampilPenghuniByKelamin` */

/*!50003 DROP PROCEDURE IF EXISTS  `TampilPenghuniByKelamin` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `TampilPenghuniByKelamin`(kelamin varchar(5))
begin 
select * from penghuni
where JenisKelamin = kelamin;
end */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
