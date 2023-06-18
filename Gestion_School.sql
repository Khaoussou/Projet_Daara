-- Active: 1683403013258@@127.0.0.1@3306@Gestion_Ecole

DROP DATABASE Gestion_Ecole;

CREATE DATABASE Gestion_Ecole;

USE Gestion_Ecole;

CREATE TABLE
    Student (
        idEleve int PRIMARY KEY AUTO_INCREMENT,
        nom VARCHAR(50) NOT NULL,
        prenom varchar(50) NOT NULL,
        bornDay DATE NOT NULL,
        placeDay TEXT NOT NULL,
        numero INT,
        phoneNumb VARCHAR(30),
        sexe ENUM('M', 'F') NOT NULL,
        type ENUM(
            'EleveInterne',
            'EleveExterne'
        ) DEFAULT 'EleveExterne',
        photo VARCHAR(255)
    );

ALTER TABLE `Student` ADD placeDay VARCHAR(50) NOT NULL;

ALTER TABLE `Student` ADD idClasseRoom INT NOT NULL;

ALTER TABLE `Student`
ADD
    Foreign Key (idClasseRoom) REFERENCES `Classe`(idClasse);

DESC `Student`;

DELETE FROM `Student` WHERE `idEleve` = 8;

CREATE TABLE
    GroupeNiveau (
        idGroupeNiveau int PRIMARY KEY AUTO_INCREMENT
    );

ALTER TABLE `GroupeNiveau` ADD libelle VARCHAR(50) NOT NULL;

DESC GroupeNiveau;

CREATE TABLE
    Niveau (
        idNiveau int PRIMARY KEY AUTO_INCREMENT,
        idGroupeNiveau INT NOT NULL,
        nomNiveau VARCHAR(50) NOT NULL,
        Foreign Key (idGroupeNiveau) REFERENCES GroupeNiveau(idGroupeNiveau)
    );

DESC Niveau;

CREATE TABLE
    Classe (
        idClasse int PRIMARY KEY AUTO_INCREMENT,
        nomClasse VARCHAR(50) NOT NULL,
        effectif int NOT NULL,
        idNiveau int NOT NULL,
        FOREIGN KEY(idNiveau) REFERENCES Niveau(idNiveau)
    );

ALTER TABLE `Classe` CHANGE idNiveau idClasseNiveau INT NOT NULL;

DESC Classe;

INSERT INTO
    `Classe` (
        `nomClasse`,
        effectif,
        `idClasseNiveau`
    )
VALUES ('CM1 A', 45, 46), ('CM1 B', 35, 46), ('5iem A', 30, 49), ('4iem A', 45, 50), ('3iem A', 50, 51);

SELECT * FROM `Classe`;

SELECT `nomClasse` FROM `Classe` WHERE `nomClasse` LIKE 'CM1 A';

CREATE TABLE
    GroupeDiscipline (
        idGroupeDiscip INT PRIMARY KEY AUTO_INCREMENT,
        libelleGroupe VARCHAR(50) NOT NULL
    );

DESC GroupeDiscipline;

INSERT INTO
    `GroupeDiscipline` (`libelleGroupe`)
VALUES ('Les ssciences');

SELECT * FROM `GroupeDiscipline`;

CREATE TABLE
    Discipline (
        idDiscipline INT PRIMARY KEY AUTO_INCREMENT,
        libelleDiscipline VARCHAR(50) NOT NULL,
        idDiscipGroup INT NOT NULL,
        Foreign Key (idDiscipGroup) REFERENCES GroupeDiscipline (idGroupeDiscip)
    );

ALTER TABLE `Discipline` ADD code VARCHAR(50) not NULL;

INSERT INTO
    `Discipline` (
        `libelleDiscipline`,
        `code`,
        `idDiscipGroup`
    )
VALUES ('Mathematique', 'MAT', 3), ('Science Physique', 'SP', 3), ('Français', 'FRA', 1), ('Anglais', 'ANG', 1);

SELECT * FROM `Discipline`;

SELECT code FROM Discipline WHERE code like 'AN';

DELETE FROM `Discipline` WHERE `idDiscipline` = 4;

DESC Discipline;

UPDATE `ClasseDiscip`
SET
    `noteRessource` = NULL,
    noteExamen = NULL
WHERE
    `idClassDissip` = 42
    AND `idDissip` = 2;

SELECT `noteExamen`
FROM `ClasseDiscip`
WHERE
    `idClassDissip` = 48
    AND `idDissip` = 16;

TRUNCATE Discipline;

CREATE TABLE
    ClasseDiscip (
        id INT PRIMARY KEY AUTO_INCREMENT,
        idClassDissip INT NOT NULL,
        idDissip INT NOT NULL,
        Foreign Key (idClassDissip) REFERENCES Classe(idClasse),
        Foreign Key (idDissip) REFERENCES Discipline(idDiscipline)
    );

INSERT INTO
    `ClasseDiscip` (`idClassDissip`, `idDissip`)
VALUES (47, 5), (47, 6), (47, 9), (47, 10), (47, 11), (47, 12), (48, 5), (48, 6), (48, 9), (48, 10), (48, 11), (48, 12);

INSERT INTO
    `ClasseDiscip` (`idClassDissip`, `idDissip`)
VALUES (43, 11), (43, 12);

SELECT * FROM `ClasseDiscip`;

DELETE FROM `ClasseDiscip` WHERE `id` = 19;

SELECT
    `libelleDiscipline`,
    code
FROM `Discipline`
    JOIN `ClasseDiscip` ON ClasseDiscip.`idDissip` = Discipline.`idDiscipline`
WHERE `idClassDissip` = 43
ORDER BY
    `libelleDiscipline` ASC;

SELECT `noteRessource`
FROM `ClasseDiscip`
WHERE
    `idClassDissip` = 43
    AND `idDissip` = 42;

DESC ClasseDiscip;

DELETE FROM `ClasseDiscip`
WHERE
    `idClassDissip` = 43
    AND `idDissip` = 9
CREATE TABLE
    Year (
        idYear int PRIMARY KEY AUTO_INCREMENT,
        libelle VARCHAR(50) NOT NULL,
        status ENUM('En cours', 'Terminée')
    );

DESC Year;

ALTER TABLE `Year`
ADD
    status ENUM('En cours', 'Terminée') DEFAULT 'Terminée';

CREATE TABLE
    Inscription (
        idInscrit INT PRIMARY KEY AUTO_INCREMENT,
        idCurrentYear INT NOT NULL,
        idStudentClasse INT NOT NULL,
        idStudent INT NOT NULL UNIQUE,
        Foreign Key (idCurrentYear) REFERENCES Year(idYear),
        Foreign Key (idStudentClasse) REFERENCES Classe(idClasse),
        Foreign Key (idStudent) REFERENCES Student(idEleve)
    );

DESC Inscription;

CREATE TABLE
    YearClassRoom (
        idYearClassRoom INT PRIMARY KEY AUTO_INCREMENT,
        idAn INT NOT NULL,
        idclasse INT NOT NULL,
        Foreign Key (idclasse) REFERENCES Classe(idClasse),
        Foreign Key (idAn) REFERENCES Year(idYear)
    );

DROP TABLE YearClassRoom;

CREATE TABLE
    LevelGroupYear (
        idLevelGroupYear int PRIMARY KEY AUTO_INCREMENT,
        idGroupLevel int NOT NULL,
        idAnnee INT NOT NULL,
        Foreign Key (idAnnee) REFERENCES Year(idYear),
        Foreign Key (idGroupLevel) REFERENCES GroupeNiveau(idGroupeNiveau)
    );

DESC LevelGroupYear;

CREATE TABLE
    AdminConnexion (
        idAdminConnexion INT PRIMARY KEY AUTO_INCREMENT,
        login VARCHAR(50) not null,
        password VARCHAR(50) not null
    );

ALTER TABLE `AdminConnexion` ADD photo VARCHAR(255);

DESC AdminConnexion;

INSERT INTO
    `AdminConnexion` (login, password)
VALUES ('Khaoussou', 'Diaz2002'), ('Cheikh', 'Bapbapbap'), ('Babacar', 'Yesyyesyyes'), ('Khadija', 'Yaseyda');

SELECT * FROM `AdminConnexion`;

SELECT * FROM `Student`;

SELECT LAST_INSERT_ID();

DELETE FROM `Student`;

INSERT INTO
    `Niveau` (idNiveauGroupe, `nomNiveau`)
VALUES (25, 'CI'), (25, 'CP'), (25, 'CE1'), (25, 'CE2'), (25, 'CM1'), (25, 'CM2'), (26, '6iem'), (26, '5iem'), (26, '4iem'), (26, '3iem'), (27, 'Seconde'), (27, 'Premiere'), (27, 'Terminal');

DELETE FROM `Niveau` WHERE `idNiveau`=56;

SELECT * FROM `Niveau`;

SELECT * FROM `Classe`;

DELETE FROM `Classe`;

INSERT INTO
    `GroupeNiveau` (libelle)
VALUES ('Elementaire'), ('Moyen'), ('Secondaire');

SELECT LAST_INSERT_ID();

SELECT * FROM `GroupeNiveau`;

DELETE FROM `GroupeNiveau` WHERE `idGroupeNiveau`=29;

INSERT INTO `Year` (libelle)
VALUES ('2017-2018'), ('2018-2019'), ('2019-2020'), ('2020-2021');

INSERT INTO `Year` (libelle) VALUES ('2021-2022');

SELECT * FROM `Year` ORDER BY libelle ASC ;

DELETE FROM `Year`;

SHOW TABLES;

SELECT `nomClasse`, effectif
FROM `Niveau`
    JOIN `Classe` ON Classe.`idClasseNiveau` = Niveau.`idNiveau`
WHERE `idNiveau` = 1;

SELECT `nomClasse`, effectif
FROM `Classe`
    JOIN `Niveau` ON Niveau.`idNiveau` = Classe.`idClasseNiveau`
    JOIN `GroupeNiveau` ON GroupeNiveau.`idGroupeNiveau` = Niveau.`idNiveauGroupe`
WHERE `idGroupeNiveau` = 1
ORDER BY `nomClasse` ASC;

SELECT password FROM `AdminConnexion`;

SELECT
    nom,
    prenom,
    `bornDay`,
    sexe,
    `type`,
    photo
FROM `Student`
    JOIN `Classe` ON Classe.`idClasse` = Student.`idClasseRoom`
WHERE `idClasse` = 3;

SELECT `idYear` FROM `Year` WHERE status LIKE 'En cours';

SELECT * FROM `Inscription`;

DELETE FROM `Inscription`;

SELECT `idNiveauGroupe` FROM `Niveau` WHERE `idNiveau`= 56 