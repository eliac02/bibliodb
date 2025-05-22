CREATE SCHEMA biblioteca; -- per creare lo schema dove andranno le relazioni
SET search_path TO biblioteca; -- per impostare il search path di default con lo schema appena creato

CREATE TABLE biblioteca (
    id_biblioteca SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    paese VARCHAR(100) NOT NULL,
    via VARCHAR(100) NOT NULL,
    civico VARCHAR(10) NOT NULL,
    cap VARCHAR(5) NOT NULL,
    provincia VARCHAR(2) NOT NULL,
    CONSTRAINT unico_indirizzo UNIQUE (paese, via, civico)
);
-- per creare la tabella biblioteca

CREATE TABLE utente (
    codice_fiscale VARCHAR(16) PRIMARY KEY UNIQUE,
    nome VARCHAR(100) NOT NULL,
    cognome VARCHAR(100) NOT NULL,
    data_nascita DATE NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    data_registrazione DATE NOT NULL,
    CHECK (data_nascita <= CURRENT_DATE AND data_registrazione <= CURRENT_DATE)
);
-- per creare la tabella utente

CREATE TABLE lettore (
    codice_fiscale VARCHAR(16) PRIMARY KEY,
    ritardi INTEGER,
    categoria VARCHAR(10) NOT NULL DEFAULT 'base',
    FOREIGN KEY (codice_fiscale) REFERENCES utente(codice_fiscale) ON DELETE CASCADE,
    CHECK (categoria IN ('base', 'premium'))
);
-- per creare la tabella lettore

CREATE TABLE bibliotecario (
    codice_fiscale VARCHAR(16) PRIMARY KEY,
    data_assunzione DATE NOT NULL,
    id_biblioteca INTEGER NOT NULL,
    FOREIGN KEY (codice_fiscale) REFERENCES utente(codice_fiscale) ON DELETE CASCADE,
    FOREIGN KEY (id_biblioteca) REFERENCES biblioteca(id_biblioteca) ON DELETE CASCADE,
    CHECK (data_assunzione <= CURRENT_DATE)
);
-- per creare la tabella bibliotecario

CREATE TABLE libro (
    isbn VARCHAR(13) PRIMARY KEY UNIQUE,
    titolo VARCHAR(255) NOT NULL,
    lingua VARCHAR(3) NOT NULL,
    trama TEXT,
    casa_editrice VARCHAR(100) NOT NULL,
    classificazione INTEGER NOT NULL,
    pagine INTEGER NOT NULL,
    CHECK (classificazione BETWEEN 0 AND 18)
);
-- per creare la tabella libro

CREATE TABLE autore (
        id_autore SERIAL PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        cognome VARCHAR(100) NOT NULL,
        paese VARCHAR(3) NOT NULL,
        data_nascita DATE NOT NULL,
        data_morte DATE,
        biografia TEXT,
        CHECK (data_nascita <= CURRENT_DATE),
        CHECK (data_morte IS NULL OR (data_morte <= CURRENT_DATE AND data_morte > data_nascita))
);
-- per creare tabella autore

CREATE TABLE libroautore (
    isbn VARCHAR(13),
    id_autore INTEGER,
    PRIMARY KEY (isbn, id_autore),
    FOREIGN KEY (isbn) REFERENCES libro(isbn) ON DELETE CASCADE,
    FOREIGN KEY (id_autore) REFERENCES autore(id_autore) ON DELETE CASCADE
);
-- per creare la tabella libro_autore

CREATE TABLE copia (
    id_copia SERIAL PRIMARY KEY,
    disponibile BOOLEAN DEFAULT TRUE,
    isbn_libro VARCHAR(13) NOT NULL,
    id_biblioteca INTEGER NOT NULL,
    FOREIGN KEY (isbn_libro) REFERENCES libro(isbn) ON DELETE CASCADE,
    FOREIGN KEY (id_biblioteca) REFERENCES biblioteca(id_biblioteca)
);
-- per creare tabella copia

CREATE TABLE prestito (
    id_prestito SERIAL PRIMARY KEY,
    data_prestito DATE NOT NULL,
    data_scadenza DATE NOT NULL,
    codice_fiscale VARCHAR(16) NOT NULL,
    id_copia INTEGER NOT NULL,
    FOREIGN KEY (codice_fiscale) REFERENCES lettore(codice_fiscale),
    FOREIGN KEY (id_copia) REFERENCES copia(id_copia)
);
-- per creare la tabella prestito
