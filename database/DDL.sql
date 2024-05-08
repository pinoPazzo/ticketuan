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
                        Password TEXT NOT NULL,
                        PRIMARY KEY (IdCliente)
);

DROP TABLE IF EXISTS eventi;
CREATE TABLE eventi(
                       IdEvento int(11) NOT NULL AUTO_INCREMENT,
                       Artista VARCHAR(30),
                       NomeEvento VARCHAR(30) NOT NULL,
                       Localita VARCHAR(50) NOT NULL,
                       Citta VARCHAR(20) NOT NULL,
                       DataOra DATETIME NOT NULL,
                       Costo double NOT NULL,
                       Categoria enum('Concerto', 'Sport', 'Teatro') NOT NULL,
                       PRIMARY KEY (IdEvento),
                       KEY (Costo)
);

DROP TABLE IF EXISTS biglietti;
CREATE TABLE biglietti(
                          IdBiglietto int(11) NOT NULL AUTO_INCREMENT,
                          ImportoPagato double NOT NULL,
                          Posto VARCHAR(4) NOT NULL,
                          DataAcquisto DATE NOT NULL,
                          IdC int(11) NOT NULL,
                          IdE int(11) NOT NULL,
                          PRIMARY KEY (IdBiglietto),
                          FOREIGN KEY (IdC) REFERENCES clienti(IdCliente),
                          FOREIGN KEY (IdE) REFERENCES eventi(IdEvento),
                          FOREIGN KEY (ImportoPagato) REFERENCES eventi(Costo)
);

INSERT INTO eventi(Artista, NomeEvento, Localita, Citta, DataOra, Costo, Categoria) VALUES ('Marracash', 'Marra Stadi 25', 'Stadio San Siro', 'Milano', '2025-06-25', 59, 'Concerto'),
                                                                                           ('Annalisa', 'Tutti nel Vortice Outdoor', 'Arena del Mare', 'Genova', '2024-07-17 21:30:00', 40, 'Concerto'),
                                                                                           ('Marracash', 'Marra Stadi 25', 'Stadio Diego Armando Maradona', 'Napoli', '2025-06-10 21:00:00', 69, 'Concerto'),
                                                                                           ('Pinguini Tattici Nucleari', 'Hello Word', 'Ippodromo di Visarno', 'Firenze', '2025-06-25 21:00:00', 49, 'Concerto'),
                                                                                           ('Ultimo', 'Stadi 2024', 'Stadio Olimpico', 'Roma', '2024-06-22 21:00:00', 69, 'Concerto'),
                                                                                           ('Roberto Bolle', 'Roberto Bolle and Friends', 'Teatro degli Arcimboldi', 'Milano', '2024-05-24 21:00:00', 33.50, 'Teatro'),
                                                                                           ('Andrea Pucci', 'C\'è sempre qualcosa che non va', 'Palazzo del Turismo', 'Jesolo', '2024-06-15 21:15:00', 54, 'Teatro'),
                                                                                           ('Awed, Dadda, Dose', 'Esperienze D.M.', 'Teatro Ariston', 'Sanremo', '2024-10-04 21:00:00', 26, 'Teatro'),
                                                                                           (NULL, 'Gran Premio d\'Italia 2024', 'Autodromo Internazionale di Mugello', 'Firenze', '2024-06-01 00:01:00', 75, 'Sport'),
                                                                                           (NULL, 'Davis Cup', 'Unipol Arena', 'Casalecchio di Reno', '2024-09-10 15:00:00', 44, 'Sport');

SELECT * FROM clienti;