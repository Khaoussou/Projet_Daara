-- Active: 1683403013258@@127.0.0.1@3306@Gestion_Ecole
DROP DATABASE Gestion_Ecole;
CREATE DATABASE Gestion_Ecole;
USE Gestion_Ecole;

CREATE TABLE Student (
	idEleve int PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(50) NOT NULL,
	prenom varchar(50) NOT NULL,
	bornDay DATE NOT NULL,
	placeDay TEXT NOT NULL,
	numero INT,
	phoneNumb VARCHAR(30),
	sexe ENUM('M','F') NOT NULL, 
	type ENUM('EleveInterne','EleveExterne') DEFAULT 'EleveExterne',
	photo VARCHAR(255)
); 

ALTER TABLE `Student` ADD placeDay VARCHAR(50) NOT NULL;

ALTER TABLE `Student` ADD idClasseRoom INT NOT NULL;

ALTER TABLE `Student` ADD Foreign Key (idClasseRoom) REFERENCES `Classe`(idClasse);

DESC `Student`;

DELETE FROM `Student` WHERE `idEleve` = 8;

CREATE TABLE GroupeNiveau (
	idGroupeNiveau int PRIMARY KEY AUTO_INCREMENT
);

ALTER TABLE `GroupeNiveau` ADD libelle VARCHAR(50) NOT NULL;

DESC GroupeNiveau;

CREATE TABLE Niveau (
	idNiveau int PRIMARY KEY AUTO_INCREMENT,
	idGroupeNiveau INT NOT NULL,
	nomNiveau VARCHAR(50) NOT NULL,
	Foreign Key (idGroupeNiveau) REFERENCES GroupeNiveau(idGroupeNiveau)
);	

DESC Niveau;

CREATE TABLE Classe (
	idClasse int PRIMARY KEY AUTO_INCREMENT,
	nomClasse VARCHAR(50) NOT NULL,
	effectif int NOT NULL,
	idNiveau int NOT NULL,
	FOREIGN KEY(idNiveau) REFERENCES Niveau(idNiveau)
);

ALTER TABLE `Classe` CHANGE idNiveau idClasseNiveau INT NOT NULL;

DESC Classe;

SELECT * FROM `Classe`;

CREATE TABLE Year (
	idYear int PRIMARY KEY AUTO_INCREMENT,
	libelle VARCHAR(50) NOT NULL,
	status ENUM('En cours','Terminée')
);

DESC Year;

ALTER TABLE `Year` ADD status ENUM('En cours','Terminée') DEFAULT 'Terminée';

CREATE TABLE Inscription (
	idInscrit INT PRIMARY KEY AUTO_INCREMENT,
	idCurrentYear INT NOT NULL,
	idStudentClasse INT NOT NULL,
	idStudent INT NOT NULL UNIQUE,
	Foreign Key (idCurrentYear) REFERENCES Year(idYear),
	Foreign Key (idStudentClasse) REFERENCES Classe(idClasse),
	Foreign Key (idStudent) REFERENCES Student(idEleve)
);

DESC Inscription;

CREATE TABLE YearClassRoom (
	idYearClassRoom INT PRIMARY KEY AUTO_INCREMENT,
	idAn INT NOT NULL,
	idclasse INT NOT NULL,
	Foreign Key (idclasse) REFERENCES Classe(idClasse),
	Foreign Key (idAn) REFERENCES Year(idYear)
);

DROP TABLE YearClassRoom;

CREATE TABLE LevelGroupYear (
	idLevelGroupYear int PRIMARY KEY AUTO_INCREMENT,
	idGroupLevel int NOT NULL,
	idAnnée INT NOT NULL,
	Foreign Key (idAnnée) REFERENCES Year(idYear),
	Foreign Key (idGroupLevel) REFERENCES GroupeNiveau(idGroupeNiveau)
);

DESC LevelGroupYear;

CREATE TABLE AdminConnexion (
	idAdminConnexion INT PRIMARY KEY AUTO_INCREMENT,
	login VARCHAR(50) not null,
	password VARCHAR(50) not null
);

ALTER TABLE `AdminConnexion` ADD photo VARCHAR(255);

DESC AdminConnexion;

INSERT INTO `AdminConnexion` (login,password)
VALUES
	('Khaoussou','Diaz2002'),
	('Cheikh','Bapbapbap'),
	('Babacar','Yesyyesyyes'),
	('Khadija','Yaseyda');

SELECT * FROM `AdminConnexion`;

INSERT INTO `Student` (nom,prenom,`bornDay`,`placeDay`,`phoneNumb`,sexe,photo,`idClasseRoom`)
VALUES
	('Seye','Bassirou','1998-02-20','Foire','770986755','M',NULL,2),
	('NDIAYE','Nabouta','1999-11-30','Ndar','771234567','F',NULL,2),
	('NDIAYE','Adja','2002-01-20','Parcelle','770286766','F',NULL,3);


INSERT INTO `Student` (nom,prenom,`bornDay`,`placeDay`,`phoneNumb`,sexe,photo,`idClasseRoom`) 
VALUES
	('NDIAYE','Adja','2002-01-20','Parcelle','770286766','F',NULL,3);
SELECT * FROM `Student`;

SELECT LAST_INSERT_ID();

DELETE FROM `Student` WHERE `idEleve`= 16;

INSERT INTO `Niveau` (idGroupeNiveau,`nomNiveau`)
VALUES
	(1,'CI'),
	(2,'6iem'),
	(1,'CM2'),
	(3,'Seconde');

INSERT INTO `Niveau` (`idNiveauGroupe`,`nomNiveau`)
VALUES
	(3,'Premiere'),
	(3,'Terminal');

SELECT * FROM `Niveau`;

INSERT INTO `Classe` (`nomClasse`,effectif,`idClasseNiveau`)
VALUES
	('CI A',50,1),
	('CI B',40,1),
	('CP C',50,1),
	('CM1 B',50,1),
	('CM1 A',50,1),
	('CM1 B',50,1),
	('6iem A',50,2),
	('6iem B',40,2);

SELECT * FROM `Classe`;

DELETE FROM `Classe` WHERE `idClasse` = 10;

INSERT INTO `GroupeNiveau` (libelle)
VALUES
	('Primaire'),
	('Secondaire inferieur'),
	('Secondaire superieur');

SELECT * FROM `GroupeNiveau`;

DELETE FROM `GroupeNiveau` WHERE `idGroupeNiveau` = 5;

UPDATE `GroupeNiveau` SET libelle = 'Secondaire' WHERE idGroupeNiveau = 3;

INSERT INTO `Year` (libelle)
VALUES
	('2017-2018'),
	('2018-2019'),
	('2019-2020'),
	('2020-2021');

INSERT INTO `Year` (libelle)
VALUES
	('2021-2022');

SELECT * FROM `Year` ORDER BY libelle ASC ;

SHOW TABLES;

SELECT `nomClasse`,effectif FROM `Niveau`
JOIN `Classe` ON Classe.`idClasseNiveau` = Niveau.`idNiveau`
WHERE `idNiveau` = 1;

SELECT `nomClasse`,effectif FROM `Classe`
JOIN `Niveau` ON Niveau.`idNiveau` = Classe.`idClasseNiveau`
JOIN `GroupeNiveau` ON GroupeNiveau.`idGroupeNiveau` = Niveau.`idNiveauGroupe`
WHERE `idGroupeNiveau` = 1
ORDER BY `nomClasse` ASC;

SELECT password FROM `AdminConnexion`;

SELECT nom, prenom, `bornDay`, sexe, `type`, photo FROM `Student`
JOIN `Classe` ON Classe.`idClasse` = Student.`idClasseRoom`
WHERE `idClasse` = 3;

SELECT `idNiveau` FROM `Niveau` WHERE `nomNiveau` LIKE 'CP';

SELECT `idYear` FROM `Year` WHERE status LIKE 'En cours';

SELECT `idEleve` FROM `Student` WHERE `idEleve` LIKE LAST_INSERT_ID();

SELECT * FROM `Inscription`;