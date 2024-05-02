DROP DATABASE IF EXISTS ticketuan;
CREATE DATABASE ticketuan;

USE ticketuan;

DROP TABLE IF EXISTS clienti;
CREATE TABLE clienti(
                        IdCliente int(11) NOT NULL AUTO_INCREMENT,
                        Nome VARCHAR(30) NOT NULL,
                        Cognome VARCHAR(30) NOT NULL,
                        DataNascita DATE NOT NULL,
                        Residenza VARCHAR(30) NOT NULL,
                        Mail VARCHAR(40) NOT NULL,
                        Password VARCHAR(30) NOT NULL,
                        PRIMARY KEY (IdCliente)
);

DROP TABLE IF EXISTS eventi;
CREATE TABLE eventi(
                       IdEvento int(11) NOT NULL AUTO_INCREMENT,
                       NomeEvento VARCHAR(30) NOT NULL,
                       Localita VARCHAR(20) NOT NULL,
                       DataOra DATETIME NOT NULL,
                       Categoria enum('Concerto', 'Sport', 'Teatro') NOT NULL,
                       PRIMARY KEY (IdEvento)
);

DROP TABLE IF EXISTS biglietti;
CREATE TABLE biglietti(
                          IdBiglietto int(11) NOT NULL AUTO_INCREMENT,
                          Costo double NOT NULL,
                          Posto VARCHAR(4) NOT NULL,
                          DataAcquisto DATE NOT NULL,
                          IdC int(11) NOT NULL,
                          IdE int(11) NOT NULL,
                          PRIMARY KEY (IdBiglietto),
                          FOREIGN KEY (IdC) REFERENCES clienti(IdCliente),
                          FOREIGN KEY (IdE) REFERENCES eventi(IdEvento)
);