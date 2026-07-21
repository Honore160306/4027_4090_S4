PRAGMA foreign_keys = ON;

CREATE TABLE operateurs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL UNIQUE,
    pourcentage NUMERIC NOT NULL
);

CREATE TABLE prefixes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    prefixe TEXT NOT NULL UNIQUE,
    id_operateur INTEGER,
    FOREIGN KEY (id_operateur) REFERENCES operateurs(id)
);

CREATE TABLE types_operation (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL UNIQUE
);

CREATE TABLE baremes_frais (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    type_operation_id INTEGER NOT NULL,
    montant_min NUMERIC NOT NULL,
    montant_max NUMERIC NOT NULL,
    frais NUMERIC NOT NULL,
    FOREIGN KEY (type_operation_id) REFERENCES types_operation(id)
);

CREATE TABLE clients (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    numero_telephone TEXT NOT NULL UNIQUE,
    solde NUMERIC NOT NULL DEFAULT 0,
    date_creation TEXT DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE operations (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    client_id INTEGER NOT NULL,
    client_destinataire_id INTEGER,
    type_operation_id INTEGER NOT NULL,
    montant NUMERIC NOT NULL,
    frais NUMERIC NOT NULL DEFAULT 0,
    date_operation TEXT DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(id),
    FOREIGN KEY (client_destinataire_id) REFERENCES clients(id),
    FOREIGN KEY (type_operation_id) REFERENCES types_operation(id)
);

CREATE VIEW situation_gains AS
SELECT
    op.nom AS operateur,
    t.nom AS type_operation,
    COUNT(o.id) AS nombre_operations,
    SUM(o.montant * op.pourcentage / 100.0) AS gain_total
FROM operations o
JOIN types_operation t ON t.id = o.type_operation_id
JOIN clients c ON c.id = o.client_id
JOIN prefixes p ON SUBSTR(c.numero_telephone, 1, LENGTH(p.prefixe)) = p.prefixe
JOIN operateurs op ON op.id = p.id_operateur
WHERE t.nom IN ('retrait', 'transfert')
GROUP BY op.id, op.nom, t.nom;

CREATE TRIGGER trg_operations_after_insert
AFTER INSERT ON operations
BEGIN
    UPDATE clients
    SET solde = solde + NEW.montant
    WHERE id = NEW.client_id
      AND NEW.type_operation_id =
      (SELECT id FROM types_operation WHERE nom='depot');

    UPDATE clients
    SET solde = solde - (NEW.montant + NEW.frais)
    WHERE id = NEW.client_id
      AND NEW.type_operation_id =
      (SELECT id FROM types_operation WHERE nom='retrait');

    UPDATE clients
    SET solde = solde - (NEW.montant + NEW.frais)
    WHERE id = NEW.client_id
      AND NEW.type_operation_id =
      (SELECT id FROM types_operation WHERE nom='transfert');

    UPDATE clients
    SET solde = solde + NEW.montant
    WHERE id = NEW.client_destinataire_id
      AND NEW.type_operation_id =
      (SELECT id FROM types_operation WHERE nom='transfert');
END;

INSERT INTO operateurs (nom, pourcentage) VALUES ('Yas',10);
INSERT INTO operateurs (nom, pourcentage) VALUES ('Orange',10);
INSERT INTO operateurs (nom, pourcentage) VALUES ('Airtel',10);

INSERT INTO prefixes (prefixe,id_operateur) VALUES ('033',3);
INSERT INTO prefixes (prefixe,id_operateur) VALUES ('034',1);
INSERT INTO prefixes (prefixe,id_operateur) VALUES ('032',2);
INSERT INTO prefixes (prefixe,id_operateur) VALUES ('038',2);

INSERT INTO types_operation (nom) VALUES ('depot');
INSERT INTO types_operation (nom) VALUES ('retrait');
INSERT INTO types_operation (nom) VALUES ('transfert');

INSERT INTO baremes_frais(type_operation_id,montant_min,montant_max,frais)
VALUES (2,0,5000,100);
INSERT INTO baremes_frais(type_operation_id,montant_min,montant_max,frais)
VALUES (2,5001,20000,300);
INSERT INTO baremes_frais(type_operation_id,montant_min,montant_max,frais)
VALUES (2,20001,50000,600);
INSERT INTO baremes_frais(type_operation_id,montant_min,montant_max,frais)
VALUES (2,50001,200000,1500);

INSERT INTO baremes_frais(type_operation_id,montant_min,montant_max,frais)
VALUES (3,5001,20000,200);
INSERT INTO baremes_frais(type_operation_id,montant_min,montant_max,frais)
VALUES (3,20001,50000,500);
INSERT INTO baremes_frais(type_operation_id,montant_min,montant_max,frais)
VALUES (3,50001,200000,1200);

INSERT INTO clients(numero_telephone,solde)
VALUES ('0331234567',15000);
INSERT INTO clients(numero_telephone,solde)
VALUES ('0337654321',42000);
INSERT INTO clients(numero_telephone,solde)
VALUES ('0339876543',8000);
INSERT INTO clients(numero_telephone,solde)
VALUES ('0341112222',140000);

INSERT INTO operations(client_id,client_destinataire_id,type_operation_id,montant,frais)
VALUES (1,NULL,1,10000,0);
INSERT INTO operations(client_id,client_destinataire_id,type_operation_id,montant,frais)
VALUES (2,NULL,2,15000,300);
INSERT INTO operations(client_id,client_destinataire_id,type_operation_id,montant,frais)
VALUES (4,NULL,2,60000,1500);
INSERT INTO operations(client_id,client_destinataire_id,type_operation_id,montant,frais)
VALUES (1,3,3,3000,50);
INSERT INTO operations(client_id,client_destinataire_id,type_operation_id,montant,frais)
VALUES (4,2,3,25000,500);